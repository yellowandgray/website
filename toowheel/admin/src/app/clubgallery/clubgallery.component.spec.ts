import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClubgalleryComponent } from './clubgallery.component';

describe('ClubgalleryComponent', () => {
  let component: ClubgalleryComponent;
  let fixture: ComponentFixture<ClubgalleryComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClubgalleryComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClubgalleryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
