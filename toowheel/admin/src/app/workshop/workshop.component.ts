import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';

@Component({
  selector: 'app-workshop',
  templateUrl: './workshop.component.html',
  styleUrls: ['./workshop.component.css']
})
export class WorkshopComponent implements OnInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit() {

  }

    openWorkshopForm()  {
    const dialogRef = this.dialog.open(WorkshopForm, {
        minWidth: "80%",
        maxWidth: "80%"
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
       }
    });
}

}

@Component({
  selector: 'workshop-form',
  templateUrl: 'workshop-form.html',
})
export class WorkshopForm {}