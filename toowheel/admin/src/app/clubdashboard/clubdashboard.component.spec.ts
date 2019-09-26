import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubdashboardComponent } from './clubdashboard.component';

describe('ClubdashboardComponent', () => {
  let component: ClubdashboardComponent;
  let fixture: ComponentFixture<ClubdashboardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubdashboardComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubdashboardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
