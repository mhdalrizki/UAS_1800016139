import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TambahGunungComponent } from './tambah-gunung.component';

describe('TambahGunungComponent', () => {
  let component: TambahGunungComponent;
  let fixture: ComponentFixture<TambahGunungComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TambahGunungComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TambahGunungComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
