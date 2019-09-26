import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClublandingComponent } from './clublanding.component';

describe('ClublandingComponent', () => {
  let component: ClublandingComponent;
  let fixture: ComponentFixture<ClublandingComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClublandingComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClublandingComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
