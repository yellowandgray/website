import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CooldrinkComponent } from './cooldrink.component';

describe('CooldrinkComponent', () => {
  let component: CooldrinkComponent;
  let fixture: ComponentFixture<CooldrinkComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CooldrinkComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CooldrinkComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
