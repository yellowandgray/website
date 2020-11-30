import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SubproductComponent } from './subproduct.component';

describe('SubproductComponent', () => {
  let component: SubproductComponent;
  let fixture: ComponentFixture<SubproductComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SubproductComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SubproductComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
