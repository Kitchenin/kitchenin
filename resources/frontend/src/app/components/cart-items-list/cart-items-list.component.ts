import { Component, OnInit } from '@angular/core';
import {CartService} from "../../services/cart.service";
import {BasketItem} from "../../models/basket-item";
import { Product } from '../../models/product';

@Component({
  selector: 'app-cart-items-list',
  templateUrl: './cart-items-list.component.html',
  styleUrls: ['./cart-items-list.component.scss']
})
export class CartItemsListComponent implements OnInit {
  userCart: any;
  Object = Object;

  constructor(private cart: CartService) {
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

  getProductImage(productObj) {
    var product =  new Product(productObj);
    var productImage = product.getProductImage();

    return productImage ? 'url(/images/products/' + encodeURI(productImage.filename) + ')' : '';
  }
}
