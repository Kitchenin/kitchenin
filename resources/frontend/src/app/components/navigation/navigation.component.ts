import {Component, OnInit} from '@angular/core';
import {Category} from "../../models/category";
import {CategoryProvider} from "../../providers/category-provider";
import {CartService} from "../../services/cart.service";
import {SettingsProvider} from "../../providers/settings-provider";


@Component({
    selector: 'app-navigation',
    templateUrl: './navigation.component.html',
    styleUrls: ['./navigation.component.scss']
})
export class NavigationComponent implements OnInit {
    categories: Category[];

    cartTotalPrice: number;
    cartTotalCount: number;
    freeDelivery: number;

    constructor(private categoryProvider: CategoryProvider, private cart: CartService, private settings: SettingsProvider) {
        this.freeDelivery = this.settings.getFreeDelivery();
    }

    ngOnInit() {
        this.categories = this.categoryProvider.getCategories();
        this.cart.userCart.subscribe(res => {
            if (res) {
                this.cartTotalPrice = res['totalPrice'];
                this.cartTotalCount = res['totalCount'];
            }
        });
        this.cart.refreshCart();
    }
}
