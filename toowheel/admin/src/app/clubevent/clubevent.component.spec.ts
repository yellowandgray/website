import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubeventComponent } from './clubevent.component';

describe('ClubeventComponent', () => {
  let component: ClubeventComponent;
  let fixture: ComponentFixture<ClubeventComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubeventComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubeventComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
