import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-scroll-to-top',
  templateUrl: './scroll-to-top.component.html',
  styleUrls: ['./scroll-to-top.component.scss']
})
export class ScrollToTopComponent implements OnInit {
  cssClass: string = '';

  constructor() { }

  ngOnInit() {
    var self = this;
    window.addEventListener('scroll', function() {
      if (window.scrollY > 100) {
        self.cssClass = 'scrollToTop--fadeIn';
      } else {
        self.cssClass = 'scrollToTop--fadeOut';
      }
    });
  }

  scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
}
