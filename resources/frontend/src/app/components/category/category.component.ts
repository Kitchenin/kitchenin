import {Component, OnInit } from '@angular/core';
import {Product} from "../../models/product";
import {ApiService} from "../../services/api.service";
import {ActivatedRoute} from "@angular/router";
import {CategoryProvider} from "../../providers/category-provider";
import {Category} from "../../models/category";
import { SafeHtml, DomSanitizer } from '@angular/platform-browser';

@Component({
    selector: 'app-category',
    templateUrl: './category.component.html',
    styleUrls: ['./category.component.scss']
})
export class CategoryComponent implements OnInit {
    groups: any = {};
    products: Product[];
    category: Category;
    description: SafeHtml;
    groupNames = {
        '1': 'Vivo',
        '2': 'Zurfiz',
        '5': 'Bella',
        '6': 'Valore',
        '7': 'Pronto',
        '8': 'Portland / Richmond',
        '9': 'Cambridge / Windsor',
        '10': 'Cartmel',
        '11': 'Lucente',
        'null': 'Other'
    }

    Object = Object;
    isLoggedIn: boolean = (window as any).isLoggedIn;

    constructor(
        private api: ApiService,
        private route: ActivatedRoute,
        private categoryProvider: CategoryProvider,
        private sanitizer: DomSanitizer
    ) {
        route.params.subscribe(val => {
            this.groups = {};
            this.products = [];

            this.category = this.categoryProvider.getCategoryById(val.category_id);

            if (!this.category.hasChildren()) {
                this.getProducts(val.category_id);
            }

            this.description = this.sanitizer.bypassSecurityTrustHtml(this.category.description);
        });
    }

    ngOnInit() {
    }

    getProducts(id) {
        this.api.getProductsByCategory(id).subscribe(products => {
            if (id === '4') {
                this.groups = this.groupProducts(products);
            } else {
                this.products = products;
            }
        });
    }

    private groupProducts(products) {
        const groups = {};

        for (let i in products) {
            groups[products[i].group_id] = groups[products[i].group_id] || [];
            groups[products[i].group_id].push(products[i]);
        }

        return groups;
    }

    private categoryCoverImage(category) {
        var filename = '';

        if (category.photos.length) {
            filename = category.photos[0].filename;
        }

        if (filename) {
            return 'url(/images/categories/' + encodeURI(filename) + ')';
        }

        return '';
    }

    private productCoverImage(product) {
        var filename = '';

        if (product.getFeaturedPhoto()) {
            filename = product.getFeaturedPhoto().filename;
        } else if (product.photos.length) {
            product.bgFallback = true;
            filename = product.photos[0].filename;
        }

        if (filename) {
            return 'url(/images/products/' + encodeURI(filename) + ')';
        }

        return '';
    }
}
