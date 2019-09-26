import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';


@Component({
  selector: 'app-club',
  templateUrl: './club.component.html',
  styleUrls: ['./club.component.css']
})
export class ClubComponent implements OnInit {
  result = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getClub();
  }
  image_url: string = 'http://localhost/twowheel-frontend/toowheel/api/v1/';
  getClub(): void {
  this.httpClient.get<any>('http://localhost/twowheel-frontend/toowheel/api/v1/get_landing_configs')
  .subscribe(
          (res)=>{
              this.result = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  openDialog(): void  {
    const dialogRef = this.dialog.open(ClubForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
}

}

@Component({
  selector: 'club-form',
  templateUrl: 'club-form.html',
})
export class ClubForm {
    constructor(
    public dialogRef: MatDialogRef<ClubForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) {}

  onNoClick(): void {
    this.dialogRef.close();
  }
}