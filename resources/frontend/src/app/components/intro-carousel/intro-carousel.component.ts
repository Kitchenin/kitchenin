import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-intro-carousel',
  templateUrl: './intro-carousel.component.html',
  styleUrls: ['./intro-carousel.component.scss']
})
export class IntroCarouselComponent implements OnInit {
  wrapperStyles: any;
  aimationTimer: any;
  currentIndex: number;

  slides = [
    {
      title: "Vivo High Gloss",
      subtitle: "White Door",
      price: "9.03",
      path: "/product/499",
      imageUrl: "/images/products/SJXt5-1.Vivo%20Gloss%20White_CMYK.jpg"
    },

    {
      title: "Cartmel Shaker",
      subtitle: "Cashmere Door",
      price: "6.99",
      path: "/product/506",
      imageUrl: "/images/products/Apu5a-Cartmel-Cashmere.jpg"
    },

    {
      title: "Lucente Handleless",
      subtitle: "High Gloss Stone Door",
      price: "6.99",
      path: "/product/104",
      imageUrl: "/images/products/1Dv9a-3.Lucente%20Gloss%20%20Stone_CMYK.jpg"
    },

    {
      title: "Bella Gloss",
      subtitle: "Lincoln Style Door",
      price: "9.27",
      path: "/product/198",
      imageUrl: "/images/products/cnJK2-b3c382bad2.jpg"
    },

    {
      title: "",
      subtitle: "",
      price: "",
      path: "",
      imageUrl: "/images/static/5_Oxford_White_Main.jpg"
    }
  ]
  constructor() { }

  ngOnInit() {
    this.currentIndex = 0;

    this.wrapperStyles = {
      'left': 0
    };

    this.startAnimation();
  }

  setCurrentSlideTo(i) {
    // debugger;
    this.currentIndex = i;

    this.wrapperStyles = {
      'left': this.currentIndex * -100 + '%'
    };

    this.startAnimation();
  }

  startAnimation() {
    clearInterval(this.aimationTimer);

    this.aimationTimer = setInterval(() => {
      this.currentIndex++;
      this.currentIndex = this.currentIndex === this.slides.length ? 0 : this.currentIndex;

      this.wrapperStyles = {
        'left': this.currentIndex * -100 + '%'
      };

    }, 4000);
  }
}
