import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-clublanding',
  templateUrl: './clublanding.component.html',
  styleUrls: ['./clublanding.component.css']
})
export class ClublandingComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }
openDialog(): void  {
    const dialogRef = this.dialog.open(LandingAboutForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}
}

@Component({
  selector: 'landing-about-form',
  templateUrl: 'landing-about-form.html',
})
export class LandingAboutForm {
    constructor(
    public dialogRef: MatDialogRef<LandingAboutForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}
