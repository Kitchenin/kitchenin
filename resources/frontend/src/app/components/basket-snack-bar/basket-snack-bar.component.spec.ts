import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BasketSnackBarComponent } from './basket-snack-bar.component';

describe('BasketSnackBarComponent', () => {
  let component: BasketSnackBarComponent;
  let fixture: ComponentFixture<BasketSnackBarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BasketSnackBarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BasketSnackBarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
