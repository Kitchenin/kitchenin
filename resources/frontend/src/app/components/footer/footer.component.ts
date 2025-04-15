import {Component, OnInit} from '@angular/core';
import {Category} from "../../models/category";
import {CategoryProvider} from "../../providers/category-provider";

@Component({
    selector: 'app-footer',
    templateUrl: './footer.component.html',
    styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

    categories: Category[];

    constructor(private categoryProvider: CategoryProvider) {
    }

    ngOnInit() {
        this.categories = this.categoryProvider.getCategories();

        var trustbox = document.getElementById('trustbox');

        (window as any).Trustpilot.loadFromElement(trustbox);
    }

}
