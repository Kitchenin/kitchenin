import { Component, OnInit } from '@angular/core';
import { Category } from "../../models/category";
import { CategoryProvider } from "../../providers/category-provider";

@Component({
  selector: 'app-intro-categories',
  templateUrl: './intro-categories.component.html',
  styleUrls: ['./intro-categories.component.scss']
})
export class IntroCategoriesComponent implements OnInit {
  categories: Category[];
  descriptions: any;

  constructor(private categoryProvider: CategoryProvider) { }

  ngOnInit() {
    this.categories = this.categoryProvider.getCategories();
    this.descriptions = {
      '2': '',
      '3': 'Four colours to choose, from our brand new clic box range: base, wall and tall cabinets',
      '4': '',
      '5': 'Choose your new handles, hinges, drawer systems and internal storages'
    }
  }

  getImageStyles(category) {
    if (category.photos.length) {
      return {
        'background-image': 'url(/images/categories/' + encodeURI(category.photos[0].filename) + ')'
      };
    }
  }
}
