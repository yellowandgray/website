import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-press-release',
  templateUrl: './press-release.component.html',
  styleUrls: ['./press-release.component.css']
})
export class PressReleaseComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }
        openDialog(): void  {
        const dialogRef = this.dialog.open(PressReleaseForm, {
            minWidth: "40%",
            maxWidth: "40%"
        });

        dialogRef.afterClosed().subscribe(result => {
        console.log(`Dialog result: ${result}`);
        });
    }

}

@Component({
  selector: 'press-release-form',
  templateUrl: 'press-release-form.html',
})
export class PressReleaseForm {
    constructor(
    public dialogRef: MatDialogRef<PressReleaseForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}