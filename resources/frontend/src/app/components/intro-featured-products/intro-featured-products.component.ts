import { Component, OnInit } from '@angular/core';
import { Category } from "../../models/category";
import { Product } from "../../models/product";
import { CategoryProvider } from "../../providers/category-provider";
import { ApiService } from '../../services/api.service';

@Component({
  selector: 'app-intro-featured-products',
  templateUrl: './intro-featured-products.component.html',
  styleUrls: ['./intro-featured-products.component.scss']
})
export class IntroFeaturedProductsComponent implements OnInit {
  categories: Category[];
  selectedCategory: Category;
  products: Product[];
  featuredProducts = {
    2: [28, 85, 108, 221, 100],
    3: [37, 40, 43, 46],
    4: [118, 121, 405],
    5: [135, 137, 376, 349, 344]
  };

  constructor(
    private categoryProvider: CategoryProvider,
    private api: ApiService
  ) { }

  ngOnInit() {
    this.categories = this.categoryProvider.getCategories();

    if (this.categories && this.categories.length) {
      this.selectedCategory = this.categories[0];
    }

    this.getProducts();
  }

  private onClick(category) {
    this.selectedCategory = category;
    this.getProducts();
  }

  private getProducts() {
    var self = this;

    this.api.getProductsByCategory(this.selectedCategory.id)
      .subscribe(products => this.products = products.filter(function (product) {
        return self.featuredProducts[self.selectedCategory.id].indexOf(product.id) !== -1;
      }));
  }
}
