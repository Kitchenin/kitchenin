import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-intro-blocks',
  templateUrl: './intro-blocks.component.html',
  styleUrls: ['./intro-blocks.component.scss']
})
export class IntroBlocksComponent implements OnInit {
  blocks = [
    {
      img: "/assets/img/icon-delivery.png",
      title: "Free delivery",
      text: "over £300 across UK and Ireland"
    },
    {
      img: "/assets/img/icon-custom-size.png",
      title: "Made to measure",
      text: ""
    },
    {
      img: "/assets/img/icon-uk.png",
      title: "Made in UK",
      text: ""
    },
  ];

  constructor() { }

  ngOnInit() {
  }
}
