import {Component, OnInit, HostListener} from '@angular/core';
import {ApiService} from "../../services/api.service";
import {environment} from "../../../environments/environment";
import {Order} from "../../models/order";
import {CartService} from "../../services/cart.service";
import {Router} from "@angular/router";

@Component({
    selector: 'app-checkout',
    templateUrl: './checkout.component.html',
    styleUrls: ['./checkout.component.scss']
})
export class CheckoutComponent implements OnInit {
    userCart: any;
    order: Order;
    handler: any;
    sameAsShipping: Boolean;

    paypalConfig = {
        env: 'sandbox',
        client: {
            sandbox: 'AXA6hBVHK5T6OSBFJzvlAsFXV09yi-XWAQxEA2SijIZTSQN5foQEcew2wq8mBDyLppMgGOOuSetrbAza',
            production: ''
        },
        locale: 'en_GB',
        style: {
            label: 'paypal',
            size:  'responsive',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },
        payment: (data, actions) => {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {amount: {total: this.userCart.totalPrice, currency: 'GBP'}}
                    ]
                }
            })
        },
        onAuthorize: (data, actions) => {

            this.api.pendingOrder(this.order, this.userCart.items).subscribe(res => {
                var pending_order_id = res.pending_order_id;
                return actions.payment.execute().then((payment) => {
                    this.api.confirmOrder(pending_order_id, payment.id).subscribe(res => {
                        this.completeOrder();
                    });

                })
            })
        }
    };

    constructor(private api: ApiService, private cart: CartService, private router: Router) {
        this.order = new Order({
            delivery_price: this.cart.calculateDeliveryPrice()
        });
    }

    ngOnInit() {
        this.cart.userCart.subscribe(res => {
            this.userCart = res;
            if (Object.keys(this.userCart.items).length == 0) {
                this.router.navigate(['/cart']);
            }
            this.order.delivery_price = this.cart.calculateDeliveryPrice();
        });
        this.cart.refreshCart();

        this.handler = StripeCheckout.configure({
            key: environment.stripeKey,
            image: '/assets/img/logo-black.png',
            locale: 'auto',
            token: token => {
                this.api.stripePayment(token, this.order, this.userCart).subscribe(res => this.completeOrder());
            }
        });

        paypal.Button.render(this.paypalConfig, '#paypal-button-container');

    }

    setBillingEqualToShipping() {
        this.order.billing_first_name = this.order.shipping_first_name;
        this.order.billing_last_name = this.order.shipping_last_name;
        this.order.billing_address1 = this.order.shipping_address1;
        this.order.billing_address2 = this.order.shipping_address2;
        this.order.billing_company_name = this.order.shipping_company_name;
        this.order.billing_county = this.order.shipping_county;
        this.order.billing_city = this.order.shipping_city;
        this.order.billing_postcode = this.order.shipping_postcode;
        this.order.billing_phone = this.order.shipping_phone;
    }

    validate() {
        if (this.sameAsShipping) {
            this.setBillingEqualToShipping();
        }

        this.api.validateOrder(this.order).subscribe(res => {
            this.order.validated = true;
        });
    }

    handleStripePayment() {
        this.handler.open({
            name: 'KitchenIn',
            excerpt: 'Order payment',
            amount: this.userCart.totalPrice * 100,
            currency: 'GBP'
        });
    }

    completeOrder() {
        this.cart.flushCart();
        this.router.navigate(['/thankyou']);
    }

    @HostListener('window:popstate')
    onPopstate() {
        this.handler.close()
    }

}
