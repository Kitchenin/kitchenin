import {Component, OnInit} from '@angular/core';
import {CartService} from "../../services/cart.service";
import {BasketItem} from "../../models/basket-item";
import {SettingsProvider} from "../../providers/settings-provider";

@Component({
    selector: 'app-cart',
    templateUrl: './cart.component.html',
    styleUrls: ['./cart.component.scss']
})
export class CartComponent implements OnInit {
    vat: string;
    userCart: any;
    Object = Object;

    constructor(
        private cart: CartService,
        private settings: SettingsProvider
    ) {
        this.vat = this.settings.getVat() + '%';
    }

    ngOnInit() {
        this.cart.userCart.subscribe(res => {
            this.userCart = res;
        });
        this.cart.refreshCart();
    }

    saveCart() {
        this.cart.setItems(this.userCart.items);
    }

    removeItem(id) {
        this.cart.removeItem(id);
    }

}
