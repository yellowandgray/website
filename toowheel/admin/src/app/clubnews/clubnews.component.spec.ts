import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubnewsComponent } from './clubnews.component';

describe('ClubnewsComponent', () => {
  let component: ClubnewsComponent;
  let fixture: ComponentFixture<ClubnewsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubnewsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubnewsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
