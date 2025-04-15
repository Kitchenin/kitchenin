import { Component, OnInit, Input, Inject } from '@angular/core';
import { Category } from '../../models/category';
import { Product } from '../../models/product';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material';
import { ApiService } from '../../services/api.service';
import { BasketItem } from '../../models/basket-item';
import { Colour } from '../../models/colour';
import { CartService } from '../../services/cart.service';
import { Option } from '../../models/options';

@Component({
  selector: 'app-product-overlay',
  templateUrl: './product-overlay.component.html',
  styleUrls: ['./product-overlay.component.scss']
})
export class ProductOverlayComponent implements OnInit {
  private ref = MAT_DIALOG_DATA;
  basketItem: BasketItem;
  mode: string;
  selectedSize: Option;
  isLoggedIn: boolean = (window as any).isLoggedIn;

  selectedColour: Colour;

  encodeURI = encodeURI;

  @Input() product: Product;
  @Input() category: Category;


  constructor(
    private api: ApiService,
    private cart: CartService,
    private dialogRef: MatDialogRef<ProductOverlayComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {
    this.basketItem = new BasketItem();
    this.basketItem.quantity = 1;
  }

  ngOnInit() {
    this.product = this.data.product;
    this.category = this.data.category;

    this.api.getProductDetails(this.data.product.id).subscribe(product => {
        this.product = product;
        this.basketItem.product_id = this.product.id;
        this.getBasketItem();
    });

    //TODO:###
    this.mode = 'standard';
  }

  getBasketItem() {
    this.api.getBasketItem(this.basketItem).subscribe(res => this.basketItem = res);
  }

  onSelectColour() {
      this.basketItem.colour_id = this.basketItem.colour.id;

      this.getBasketItem();
  }

  addToBasket(form) {
    if (form.valid) {
      this.cart.addItem(this.basketItem);
      this.dialogRef.close();
    }

    // this.message = this.cart.addItem(this.basketItem);
    // var self = this;

    // if (this.message.success) {
      // setTimeout(function () {
        // self.dialogRef.close();
      // }, 600);
    // }
  }

  onSelectedSize() {
    this.basketItem.size = this.selectedSize;
    this.basketItem.size_id = this.selectedSize.id;

    this.getBasketItem();
  }
}
