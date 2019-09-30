import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-clubevent',
  templateUrl: './clubevent.component.html',
  styleUrls: ['./clubevent.component.css']
})
export class ClubeventComponent implements OnInit {
    result = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getEvent();
  }
image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
       getEvent(): void {
     this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_event')
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
    const dialogRef = this.dialog.open(ClubEventForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getClubEvent();
        }
    });
}

}

@Component({
  selector: 'clubevent-form',
  templateUrl: 'clubevent-form.html',
})
export class ClubEventForm {
    clubeventForm: FormGroup;
    loading = false;
    constructor(
    public dialogRef: MatDialogRef<ClubEventForm>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}

  ngOnInit() {
      this.clubeventForm = new FormGroup({
      'club_type': new FormControl('', Validators.required),
      'club_category': new FormControl('', Validators.required),
      'club_name': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'location': new FormControl('', Validators.required),
      'address': new FormControl('', Validators.required)
        });
    }

    onSubmit() {
          if (this.clubeventForm.invalid) {
                return;
          }
          this.loading = true;
          this.httpClient.post('http://localhost:3000/clubevent', {club_type: this.clubeventForm.value.name, club_category: this.clubeventForm.value.name, club_name: this.clubeventForm.value.name, event_banner: this.clubeventForm.value.name, title: this.clubeventForm.value.name, date: this.clubeventForm.value.name, location: this.clubeventForm.value.name, address: this.clubeventForm.value.name, created_by: 'Admin', updated_by: 'Admin'}).subscribe(
              (res)=>{
                this.loading = false;
                this.dialogRef.close(true);
            },
            (error)=>{
                this.loading = false;
                this._snackBar.open(error.statusText, '', {
          duration: 2000,
        });
            }
            );
      }
}