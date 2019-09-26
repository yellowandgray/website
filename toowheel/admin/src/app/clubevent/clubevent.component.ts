import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-clubevent',
  templateUrl: './clubevent.component.html',
  styleUrls: ['./clubevent.component.css']
})
export class ClubeventComponent implements OnInit {
    result = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getClubEvent();
  }
  image_url: string = 'http://localhost/twowheel-frontend/toowheel/api/v1/';
  getClubEvent(): void {
  this.httpClient.get<any>('http://localhost/twowheel-frontend/toowheel/api/v1/get_club')
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
    var data = null;
    this.result.forEach(val=> {
        if(parseInt(val.category_id) === parseInt(id)) {
             data = val;
             return false;
        }
      });
    const dialogRef = this.dialog.open(ClubEventForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getClub();
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
    private httpClient: HttpClient) {
        this.type = this.data.type;
        this.category_id = this.data.category_id;
        this.club_name_id = this.data.club_name_id;
        this.event_title = this.data.event_title;
        this.date = this.data.date;
        this.location = this.data.location;
        this.address = this.data.address;
    }

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

    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        console.log(fileData);
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://localhost/twowheel-frontend/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.value = res["result"]["data"];
                }else{
this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
            (error)=>{
                this.loading = false;
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
            });
    }

    onSubmit() {
          if (this.clubeventForm.invalid) {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          formData.append('type', this.type);
          formData.append('category_id', this.category_id);
          formData.append('club_name_id', this.club_name_id);
          formData.append('banner', this.banner);
          formData.append('event_title', this.event_title);
          formData.append('date', this.date);
          formData.append('location', this.location);
          formData.append('address', this.address);
          this.httpClient.post('http://localhost/twowheel-frontend/toowheel/api/v1/insert_clubevent', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.dialogRef.close(true);
                }else{
this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
                }
            },
            (error)=>{
                this.loading = false;
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
            }
            );
      }
}