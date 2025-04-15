import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { IntroBlocksComponent } from './intro-blocks.component';

describe('IntroBlocksComponent', () => {
  let component: IntroBlocksComponent;
  let fixture: ComponentFixture<IntroBlocksComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IntroBlocksComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IntroBlocksComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
