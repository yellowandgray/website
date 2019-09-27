import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

@Component({
  selector: 'app-advertisment',
  templateUrl: './advertisment.component.html',
  styleUrls: ['./advertisment.component.css']
})
export class AdvertismentComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {
  }
  openDialog(id): void  {
      
    const dialogRef = this.dialog.open(AdvertismentForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            
        }
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}

}

@Component({
  selector: 'advertisment-form',
  templateUrl: 'advertisment-form.html',
})
export class AdvertismentForm {
    constructor(
    public dialogRef: MatDialogRef<AdvertismentForm>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}