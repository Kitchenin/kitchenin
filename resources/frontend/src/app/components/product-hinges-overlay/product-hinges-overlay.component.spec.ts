import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductHingesOverlayComponent } from './product-hinges-overlay.component';

describe('ProductHingesOverlayComponent', () => {
  let component: ProductHingesOverlayComponent;
  let fixture: ComponentFixture<ProductHingesOverlayComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProductHingesOverlayComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductHingesOverlayComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
