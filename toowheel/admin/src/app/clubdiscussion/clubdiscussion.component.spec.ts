import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubdiscussionComponent } from './clubdiscussion.component';

describe('ClubdiscussionComponent', () => {
  let component: ClubdiscussionComponent;
  let fixture: ComponentFixture<ClubdiscussionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubdiscussionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubdiscussionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
