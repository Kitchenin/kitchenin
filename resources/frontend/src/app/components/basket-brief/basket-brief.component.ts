import { Component, OnInit } from '@angular/core';
import { CartService } from "../../services/cart.service";
import { Product } from '../../models/product';
import { Router, NavigationEnd } from '@angular/router';

@Component({
  selector: 'app-basket-brief',
  templateUrl: './basket-brief.component.html',
  styleUrls: ['./basket-brief.component.scss']
})
export class BasketBriefComponent implements OnInit {
  userCart: any;
  Object = Object;
  isExpanded: boolean = false;
  cssClass: string;
  timer: any;
  visible: boolean = true;

  constructor(
      private cart: CartService,
      private router: Router
  ) {
  }

  ngOnInit() {
      this.cart.userCart.subscribe(res => {
          this.userCart = res;

          // this.cssClass = 'basketBrief__toggle--onAdd';

          // window.clearTimeout(this.timer);

          // this.timer = window.setTimeout(() => {
          //   this.cssClass = '';
          // }, 350);

      });
      this.cart.refreshCart();

      this.router.events.subscribe(event => {
        if (event instanceof NavigationEnd) {
            this.visible = event.url !== '/cart';
        }
      });
  }

  saveCart() {
      this.cart.setItems(this.userCart.items);
  }

  removeItem(id) {
      this.cart.removeItem(id);
  }

  // getProductImage(productObj) {
  //   var product =  new Product(productObj);
  //   var productImage = product.getProductImage();

  //   return productImage ? 'url(/images/products/' + encodeURI(productImage.filename) + ')' : '';
  // }

  // toggle() {
  //   this.isExpanded = !this.isExpanded;
  // }
}
