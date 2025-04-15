import {Injectable} from '@angular/core';
import {environment} from "../../environments/environment";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Category} from "../models/category";
import {Observable} from "rxjs/internal/Observable";
import {Product} from "../models/product";
import {Setting} from "../models/setting";
import {Page} from "../models/page";
import {map, tap} from "rxjs/operators";
import {BasketItem} from "../models/basket-item";
import {Order} from "../models/order";
import {Group} from "../models/group";

@Injectable({
    providedIn: 'root'
})
export class ApiService {

    httpOptions = {
        headers: new HttpHeaders({'Content-Type': 'application/json'})
    }

    constructor(private http: HttpClient) {
    }

    getSettings(): Observable<Setting> {
        return this.http.get<Setting>(environment.apiUrl + 'settings')
            .pipe(
                map(res => new Setting(res))
            );
    }

    getCategories(): Observable<Category[]> {
        return this.http.get<Category[]>(environment.apiUrl + 'categories')
            .pipe(
                map(res => res.map(category => new Category(category)))
            );
    }

    getGroups(): Observable<Group[]> {
        return this.http.get<Group[]>(environment.apiUrl + 'groups')
            .pipe(
                map(res => res.map(group => new Group(group)))
            );
    }

    getProductsByCategory(id: number): Observable<Product[]> {
        return this.http.get<Product[]>(environment.apiUrl + 'category/' + id)
            .pipe(
                map(res => res.map(product => new Product(product)))
            );
    }

    getProductDetails(id: number): Observable<Product> {
        return this.http.get<Product>(environment.apiUrl + 'product/' + id)
            .pipe(
                map(res => new Product(res))
            );
    }

    getPage(title: string): Observable<Page> {
        return this.http.get<Page>(environment.apiUrl + 'pages/' + title)
            .pipe(
                map(res => new Page(res))
            );
    }

    getBasketItem(item: BasketItem): Observable<BasketItem> {
        return this.http.post<BasketItem>(environment.apiUrl + 'basket/getItem', item, this.httpOptions)
            .pipe(
                map(res => new BasketItem(res))
            );
    }

    validateOrder(order: Order): Observable<any> {
        return this.http.post(environment.apiUrl + 'checkout/validate', order, this.httpOptions)
    }

    pendingOrder(order: Order, cart: any): Observable<any> {
        return this.http.post(environment.apiUrl + 'checkout/pending', {order: order, cart: cart}, this.httpOptions);
    }

    confirmOrder(order_id: number, payment_id: string): Observable<any> {
        return this.http.post(environment.apiUrl + 'checkout/confirm', {
            id: order_id,
            payment_id: payment_id
        }, this.httpOptions);
    }

    stripePayment(token: any, order: Order, cart: any): Observable<any> {
        return this.http.post(environment.apiUrl + 'checkout/stripe', {
            token: token.id,
            email: token.email,
            order: order,
            cart: cart.items,
            amount: cart.totalPrice
        }, this.httpOptions);
    }
}
