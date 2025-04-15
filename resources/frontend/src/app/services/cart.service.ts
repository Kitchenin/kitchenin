import {Inject, Injectable} from '@angular/core';
import {SESSION_STORAGE, StorageService} from 'angular-webstorage-service';
import {BasketItem} from "../models/basket-item";
import {Subject} from "rxjs/index";
import {SettingsProvider} from "../providers/settings-provider";

const STORAGE_KEY = 'cart';

@Injectable({
    providedIn: 'root'
})
export class CartService {

    userCart = new Subject();

    constructor(@Inject(SESSION_STORAGE) private storage: StorageService, private settings: SettingsProvider) {
        this.refreshCart();
    }

    refreshCart() {
        this.setItems(this.getItems());
    }

    flushCart() {
        this.setItems({});
    }

    getItems(): BasketItem[] {
        return this.storage.get(STORAGE_KEY) || {};
    }

    setItems(cart) {
        this.storage.set(STORAGE_KEY, cart);

        this.userCart.next({
            items: cart,
            subtotalPrice: this.calculateSubTotalPrice(),
            deliveryPrice: this.calculateDeliveryPrice(),
            totalPrice: this.calculateTotalPrice(),
            totalCount: this.calculateTotalCount()
        })
    }

    addItem(item: BasketItem): any {
        const cart = this.getItems();

        if (item.price < 0) {
            return {
                success: false,
                message: 'Please select an option'
            }
        }

        item.price = Math.round(item.price * 100) / 100;
        let itemKey = item.product_id + '_' + item.size_id + '_' + item.colour_id + '_' + item.ending_id + '_' + item.width + '_' + item.height + '_' + item.depth;
        if (cart[itemKey]) {
            cart[itemKey].quantity += item.quantity;
        } else {
            cart[itemKey] = item;
        }

        this.setItems(cart);

        return {
            success: true,
            message: 'Item is added to cart'
        }

    }

    removeItem(id): void {
        const cart = this.getItems();

        delete cart[id];

        this.setItems(cart);
    }

    calculateSubTotalPrice() {
        const cart = this.getItems();
        var total = 0;
        Object.keys(cart).forEach(key => {
            total += cart[key].quantity * cart[key].price;
        });

        return total;
    }

    containsOnlySampleItems() {
        const cart = this.getItems();
        let sampleFound = false;
        Object.keys(cart).forEach(key => {
            if (typeof cart[key].isSample == 'undefined' || !cart[key].isSample) {
                sampleFound = true;
            }
        });
        return !sampleFound;
    }

    calculateDeliveryPrice() {
        var total = this.calculateSubTotalPrice();
        if (total == 0 || total >= this.settings.getFreeDelivery() || this.containsOnlySampleItems()) {
            return 0;
        } else {
            return this.settings.getDeliveryPrice();
        }

    }

    calculateTotalPrice() {
        return this.calculateDeliveryPrice() + this.calculateSubTotalPrice();
    }

    calculateTotalCount() {
        const cart = this.getItems();
        var count = 0;
        Object.keys(cart).forEach(key => {
            count += cart[key].quantity;
        });

        return count;
    }
}
