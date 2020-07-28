import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-tambah-gunung',
  templateUrl: './tambah-gunung.component.html',
  styleUrls: ['./tambah-gunung.component.css']
})
export class TambahGunungComponent implements OnInit { 

  data: any = {}
  constructor(
  public api: ApiService,
    public dialogRef: MatDialogRef<TambahGunungComponent>,
    @Inject(MAT_DIALOG_DATA) public itemData: any
  ) {
    if (itemData != null) {
      this.data = itemData;
    } 
}

  ngOnInit(): void {
  }
  
  insert(data) {
     if (data.id == undefined) {
      this.api.simpan(data).subscribe(res => {
        this.dialogRef.close(true)
      })
    } else {
      this.api.ubah(data).subscribe(res => {
        this.dialogRef.close(true)
      })
  }
}
}