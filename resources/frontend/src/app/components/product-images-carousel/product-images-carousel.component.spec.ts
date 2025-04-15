import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductImagesCarouselComponent } from './product-images-carousel.component';

describe('ProductImagesCarouselComponent', () => {
  let component: ProductImagesCarouselComponent;
  let fixture: ComponentFixture<ProductImagesCarouselComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProductImagesCarouselComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductImagesCarouselComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
