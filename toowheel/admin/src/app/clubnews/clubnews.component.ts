import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-clubnews',
  templateUrl: './clubnews.component.html',
  styleUrls: ['./clubnews.component.css']
})
export class ClubnewsComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }
  
  openDialog(): void  {
    const dialogRef = this.dialog.open(ClubNewsForm, {
        minWidth: "80%",
        maxWidth: "80%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}

}

@Component({
  selector: 'club-news-form',
  templateUrl: 'club-news-form.html',
})
export class ClubNewsForm {
    constructor(
    public dialogRef: MatDialogRef<ClubNewsForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}