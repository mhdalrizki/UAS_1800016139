import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GunungComponent } from './gunung.component';

describe('GunungComponent', () => {
  let component: GunungComponent;
  let fixture: ComponentFixture<GunungComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GunungComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GunungComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
