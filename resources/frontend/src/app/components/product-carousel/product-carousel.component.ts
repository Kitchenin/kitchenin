import {Component, OnInit, Input} from '@angular/core';
import {ApiService} from "../../services/api.service";
import {Product} from "../../models/product";
import { Category } from '../../models/category';

@Component({
    selector: 'app-product-carousel',
    templateUrl: './product-carousel.component.html',
    styleUrls: ['./product-carousel.component.scss']
})
export class ProductCarouselComponent implements OnInit {

    @Input() groupId: string;

    products: Product[];

    constructor(private api: ApiService) {
    }

    ngOnInit() {
        this.getProducts();
    }

    getProducts() {
        var essentialComponentsCategoryId = 4;
        var self = this;

        this.api.getProductsByCategory(essentialComponentsCategoryId).subscribe(products => {
                self.products = products.filter(product => product.group_id == self.groupId);

                // .sort((a, b) => {
                //     var priceA = (+a.price) !== 0 ? (+a.price) : (+a.minPrice);
                //     var priceB = (+b.price) !== 0 ? (+b.price) : (+b.minPrice);

                //     return priceA - priceB;
                // });
            });
    }
}
