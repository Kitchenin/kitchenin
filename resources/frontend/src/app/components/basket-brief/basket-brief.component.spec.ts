import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BasketBriefComponent } from './basket-brief.component';

describe('BasketBriefComponent', () => {
  let component: BasketBriefComponent;
  let fixture: ComponentFixture<BasketBriefComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BasketBriefComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BasketBriefComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
