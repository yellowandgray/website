import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EnquiryCountComponent } from './enquiry-count.component';

describe('EnquiryCountComponent', () => {
  let component: EnquiryCountComponent;
  let fixture: ComponentFixture<EnquiryCountComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EnquiryCountComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EnquiryCountComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
