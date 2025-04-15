import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { IntroCategoriesComponent } from './intro-categories.component';

describe('IntroCategoriesComponent', () => {
  let component: IntroCategoriesComponent;
  let fixture: ComponentFixture<IntroCategoriesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IntroCategoriesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IntroCategoriesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
