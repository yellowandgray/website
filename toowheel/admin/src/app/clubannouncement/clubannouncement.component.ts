import { Component, OnInit, Inject } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import * as moment from 'moment';

@Component({
  selector: 'app-clubannouncement',
  templateUrl: './clubannouncement.component.html',
  styleUrls: ['./clubannouncement.component.css']
})
export class ClubannouncementComponent implements OnInit {
  searchTerm: string = '';
  sortdata: string = '';
  result = [];
  club_id = sessionStorage.getItem("toowheel_club_id");  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient, private route: ActivatedRoute) { }

  ngOnInit() {
      this.getAnnouncement();
  }
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
       getAnnouncement(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_announcement/'+this.club_id)
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
openDialog(id): void  {
    var data = null;
      if(id != 0) {
      this.result.forEach(val=> {
           if(parseInt(val.announcement_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(ClubAnnouncementForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: {
            data: data,
            club_id: this.club_id
        }
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getAnnouncement();
       }
    });
}

confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(ClubAnnouncementDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getAnnouncement();
       }
    });
}
sortRecords(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result).sort((a,b) => a.title.localeCompare(b.title));
            break;
            case 'title_z_a':
            (this.result).sort((a,b) => b.title.localeCompare(a.title));
            break;
            case 'created_a_z':
                (this.result).sort((a,b) => a.created_at.localeCompare(b.created_at));
            break;
            case 'created_z_a':
                (this.result).sort((a,b) => b.created_at.localeCompare(a.created_at));
            break;
            default:
            break;
        }
    }
}
@Component({
  selector: 'clubannouncement-form',
  templateUrl: 'clubannouncement-form.html',
})
export class ClubAnnouncementForm {
    announcementForm: FormGroup;
    loading = false;
    club_id = '0';
    announcement_id = 0;
    thumb_image: string = 'Choose Thumb Image';
    thumb_image_path: string;
    constructor(
    public dialogRef: MatDialogRef<ClubAnnouncementForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.club_id = this.data.club_id;
    }
    ngOnInit() {
      this.announcementForm = new FormGroup({
      'title': new FormControl('', Validators.required),
      'announcement_date': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      });
        if(this.data.data != null) {
           this.announcementForm.patchValue({
           title: this.data.data.title,
           announcement_date: new Date(this.data.data.announcement_date),
           description: this.data.data.description
        });
        this.announcement_id = this.data.data.announcement_id;
        }
    }
    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/upload_file', formData).subscribe(
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
      if (this.announcementForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
        var formData = new FormData();
      var url = '';
      if(this.announcement_id != 0) {
        formData.append('club_id', this.club_id);
          formData.append('title', this.announcementForm.value.title);
          formData.append('announcement_date', moment(this.announcementForm.value.announcement_date).format('YYYY-MM-DD'));
          if(this.thumb_image_path && this.thumb_image_path != '') {
          formData.append('thumb_image', this.thumb_image_path);
          }
          formData.append('description', this.announcementForm.value.description);
        url = 'update_record/announcement/announcement_id = '+this.announcement_id;
      } else {
        formData.append('club_id', this.club_id);
          formData.append('title', this.announcementForm.value.title);
          formData.append('announcement_date', moment(this.announcementForm.value.announcement_date).format('YYYY-MM-DD'));
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('description', this.announcementForm.value.description);
        url = 'insert_announcement';
      }
      this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/'+url, formData).subscribe(
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

@Component({
  selector: 'clubannouncement-delete-confirmation',
  templateUrl: 'clubannouncement-delete-confirmation.html',
})
export class ClubAnnouncementDelete {
    loading = false;
    announcement_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ClubAnnouncementDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.announcement_id = this.data;
    }
}

  confirmDelete() {
      if (this.announcement_id == null || this.announcement_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/announcement/announcement_id='+this.announcement_id).subscribe(
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