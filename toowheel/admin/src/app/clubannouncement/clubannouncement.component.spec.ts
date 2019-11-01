import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubannouncementComponent } from './clubannouncement.component';

describe('ClubannouncementComponent', () => {
  let component: ClubannouncementComponent;
  let fixture: ComponentFixture<ClubannouncementComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubannouncementComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubannouncementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
