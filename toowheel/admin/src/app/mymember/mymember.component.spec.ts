import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MymemberComponent } from './mymember.component';

describe('MymemberComponent', () => {
  let component: MymemberComponent;
  let fixture: ComponentFixture<MymemberComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MymemberComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MymemberComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
