import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { IntroFeaturedProductsComponent } from './intro-featured-products.component';

describe('IntroFeaturedProductsComponent', () => {
  let component: IntroFeaturedProductsComponent;
  let fixture: ComponentFixture<IntroFeaturedProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IntroFeaturedProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IntroFeaturedProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
