import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MyclubComponent } from './myclub.component';

describe('MyclubComponent', () => {
  let component: MyclubComponent;
  let fixture: ComponentFixture<MyclubComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyclubComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MyclubComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
