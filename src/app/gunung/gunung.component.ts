import { Component, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { TambahGunungComponent } from '../tambah-gunung/tambah-gunung.component';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-gunung',
  templateUrl: './gunung.component.html',
  styleUrls: ['./gunung.component.css']
})
export class GunungComponent implements OnInit{

  constructor(
  public dialog: MatDialog,
  public api: ApiService ) {
  this.getData()
  }
  dataGunung: any = []
  getData() {
    this.api.baca().subscribe(res => {
      this.dataGunung = res
    })
  }
  ngOnInit(): void {
  }
  namaGunung() {const dialogRef = this.dialog.open(TambahGunungComponent, {
      width: '450px',
      data: null
    });
    dialogRef.afterClosed().subscribe(res => {
      this.getData() // menampilkan data setelah diperbarui
    });
}
editGunung(data) {
    const dialogRef = this.dialog.open(TambahGunungComponent, {
      width: '450px',
      data: data
    });
    dialogRef.afterClosed().subscribe(res => {
      this.getData() // menampilkan data setelah diperbarui
    });
  }
  hapusGunung(id) {
    console.log('data dihapus')
    this.api.hapus(id).subscribe(res => {
      this.getData()
    })
  }
}
