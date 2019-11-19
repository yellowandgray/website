import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { KuralComponent } from './kural.component';

describe('KuralComponent', () => {
  let component: KuralComponent;
  let fixture: ComponentFixture<KuralComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ KuralComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(KuralComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
