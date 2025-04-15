import { Component, OnInit, Input, HostListener } from '@angular/core';
import { Product } from '../../models/product';
import { Router } from '@angular/router';
import { Category } from '../../models/category';
import { ProductOverlayComponent } from '../product-overlay/product-overlay.component';
import { MatDialog } from '@angular/material';

@Component({
  selector: 'app-product-box',
  templateUrl: './product-box.component.html',
  styleUrls: ['./product-box.component.scss']
})
export class ProductBoxComponent implements OnInit {
  doorCategories: String[] = ['2', '7', '8', '9', '10', '11', '12'];
  newTabKeyHolded: boolean;

  @Input() product: Product;
  @Input() category: Category;

  constructor(
    private router: Router,
    private dialog: MatDialog
  ) { }

  ngOnInit() {
    this.category = this.category || new Category();
    this.category.id = this.category.id || this.product.category_id;
  }

  @HostListener('window:keydown', ['$event'])
  keyDownEvent(event: KeyboardEvent) {
    // TODO: Test on Windows
    // console.log(event.keyCode);

    if (
      event.keyCode === 91 // command
      || event.keyCode === 16 // shift
    ) {
      this.newTabKeyHolded = true;
    }
  }

  @HostListener('window:keyup', ['$event'])
  keyUpEvent(event: KeyboardEvent) {
    this.newTabKeyHolded = false; //###
  }

  getPrice() {
    return this.product.minPrice ? this.product.minPrice : this.product.price;
  }

  productCoverImage() {
    var productImage = this.product.getProductImage();

    if (productImage) {
       return {
            'background-image': 'url(/images/products/' + encodeURI(productImage.filename) + ')',
            'background-size': 'contain'
          };
    } else {
      //TODO: default image
    }
  }

  ctaClick(e) {
    if (this.isLink() && this.newTabKeyHolded) {
      return;
    }

    e.preventDefault();

    if (this.isLink()) {
      this.router.navigate(['/product/' + this.product.id]);
    } else {
      const dialogRef = this.dialog.open(ProductOverlayComponent, {
        width: '1000px',
        data: {
          product: this.product,
          category: this.category
        }
      });

      dialogRef.afterClosed().subscribe(result => {
        // console.log('The dialog was closed');
        // this.animal = result;
      });
    }
  }

  isLink() {
    return this.doorCategories.indexOf(this.category.id.toString()) !== -1 ;
  }
}
