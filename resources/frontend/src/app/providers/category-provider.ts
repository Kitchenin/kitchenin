import {Injectable} from '@angular/core';
import {Category} from "../models/category";
import {ApiService} from "../services/api.service";

@Injectable()

export class CategoryProvider {

    private categories: Category[];

    constructor(private api: ApiService) {

    }

    public getCategories(): Category[] {
        return this.categories;
    }

    public getCategoryById(id): Category {
        for (let category of this.categories) {
            if (category.id == id) {
                return category;
            }

            for (let child of category.children) {
                if (child.id == id) {
                    child.parentCategory = new Category(category);
                    return child;
                }
            }
        }
    }

    load() {
        return new Promise((resolve, reject) => {
            this.api.getCategories()
                .subscribe(categories => {
                    this.categories = categories;
                    resolve(true);
                });

        })
    }
}
