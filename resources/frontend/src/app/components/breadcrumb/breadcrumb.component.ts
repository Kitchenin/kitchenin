import {Component, OnInit, Input} from '@angular/core';
import { Category } from '../../models/category';

@Component({
    selector: 'app-breadcrumb',
    templateUrl: './breadcrumb.component.html',
    styleUrls: ['./breadcrumb.component.scss']
})
export class BreadcrumbComponent implements OnInit {
    @Input() category: Category;

    constructor() {
    }

    ngOnInit() {
    }

}
