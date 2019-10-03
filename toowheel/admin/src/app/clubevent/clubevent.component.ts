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
    result_four_wheel:any[];
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

  openDialog(id, res): void  {
    var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.event_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(ClubEventForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getEvent();
        }
    });
}

        confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
                    data = id;
          }
        const dialogRef = this.dialog.open(ClubEventDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                 this.getEvent();
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
    categories:any[];
    clubs:any[];
    cover_image: string = 'Choose Event Picture';
    thumb_image: string = 'Choose Thumb Image';
    cover_image_path: string;
    thumb_image_path: string;
    constructor(
    public dialogRef: MatDialogRef<ClubEventForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.clubeventForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'club_id': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'event_date': new FormControl('', Validators.required),
      'location': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required)
        });
        if(this.data != null) {
                this.clubeventForm.patchValue({
           type: this.data.type,
           category_id: this.data.category_id,
           club_id: this.data.club_id,
           title: this.data.title,
           event_date: this.data.event_date,
           location: this.data.location,
           description: this.data.description
        });
        this.getCategory();
        }
    }
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_'+this.clubeventForm.value.type+'_category').subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.categories = res["result"]["data"];
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
    getClub(): void {
       this.loading = true;
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_club_by_category/'+this.clubeventForm.value.category_id).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.clubs = res["result"]["data"];
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
    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this[field] = res["result"]["data"];
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
          formData.append('type', this.clubeventForm.value.type);
          formData.append('category_id', this.clubeventForm.value.category_id);
          formData.append('club_id', this.clubeventForm.value.club_id);
          formData.append('cover_image', this.cover_image_path);
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('title', this.clubeventForm.value.title);
          formData.append('event_date', this.clubeventForm.value.event_date);
          formData.append('location', this.clubeventForm.value.location);
          formData.append('description', this.clubeventForm.value.description);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_event', formData).subscribe(
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
                this._snackBar.open(error.statusText, '', {
          duration: 2000,
        });
            }
            );
      }
}


@Component({
  selector: 'clubevent-delete-confirmation',
  templateUrl: 'clubevent-delete-confirmation.html',
})
export class ClubEventDelete {
    loading = false;
    event_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ClubEventForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.event_id = this.data;
    }
}

  confirmDelete() {
      if (this.event_id == null || this.event_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/delete_record/event/event_id='+this.event_id).subscribe(
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