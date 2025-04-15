import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductImageOverlayComponent } from './product-image-overlay.component';

describe('ProductImageOverlayComponent', () => {
  let component: ProductImageOverlayComponent;
  let fixture: ComponentFixture<ProductImageOverlayComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProductImageOverlayComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductImageOverlayComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
