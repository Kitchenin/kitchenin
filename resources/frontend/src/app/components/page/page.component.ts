import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from "@angular/router";
import {ApiService} from "../../services/api.service";
import {Page} from "../../models/page";
import { SafeHtml, DomSanitizer } from '@angular/platform-browser';

@Component({
    selector: 'app-page',
    templateUrl: './page.component.html',
    styleUrls: ['./page.component.scss']
})
export class PageComponent implements OnInit {
    page: Page;
    content: SafeHtml;

    constructor(
        private api: ApiService,
        private route: ActivatedRoute,
        private sanitizer: DomSanitizer
    ) {
        route.params.subscribe(val => {
            this.getPage(val.page_title);
        });
    }

    ngOnInit() {
    }

    getPage(title) {
        var self = this;

        this.api.getPage(title).subscribe(function (page) {
            self.page = page;
            self.content = self.sanitizer.bypassSecurityTrustHtml(self.page.content);
        });
    }

}
