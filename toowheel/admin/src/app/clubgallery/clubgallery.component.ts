import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-clubgallery',
  templateUrl: './clubgallery.component.html',
  styleUrls: ['./clubgallery.component.css']
})
export class ClubgalleryComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }
  openDialog(): void  {
    const dialogRef = this.dialog.open(ClubGalleryForm, {
        minWidth: "80%",
        maxWidth: "80%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}

}

@Component({
  selector: 'club-gallery-form',
  templateUrl: 'club-gallery-form.html',
})
export class ClubGalleryForm {
    constructor(
    public dialogRef: MatDialogRef<ClubGalleryForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}