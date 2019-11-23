import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-myclub',
  templateUrl: './myclub.component.html',
  styleUrls: ['./myclub.component.css']
})
export class MyclubComponent implements OnInit {
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';  
     loading = false;
    value: string='';
    field_type: string;
    field_name: string;
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
    
  ngOnInit() {
      this.getClub();
  }
  data = {logo: '', cover_image: '', about: '', phone: '', email_id: '', address: '', landmark: '', facebook_link: '', youtube_link: '', twitter_link: '', instagram_link: '', leader_name: ''};
  getClub(): void {
  this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_club_by_id/'+sessionStorage.getItem("toowheel_club_id"))
  .subscribe(
          (res)=>{
              this.data = res["result"]["data"];
        },
        (error)=>{
            this.data = {logo: '', cover_image: '', about: '', phone: '', email_id: '', address: '', landmark: '', facebook_link: '', youtube_link: '', twitter_link: '', instagram_link: '', leader_name: ''};
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
    onSubmit(field, value) {          
          this.loading = true;
          var formData = new FormData();
          formData.append(field, value);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/update_record/club/club_id='+sessionStorage.getItem("toowheel_club_id"), formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    console.log("test");
                     
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
  openDialog(val, typ, fld): void  {
      var data = {field_name: fld, field_type: typ, value: val};
    const dialogRef = this.dialog.open(MyClubForm, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getClub();
        }
    });
}
}
@Component({
  selector: 'myclub-form',
  templateUrl: 'myclub-form.html',
})
export class MyClubForm {    
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    configForm: FormGroup;
    loading = false;
    value: string='';
    field_type: string;
    field_name: string;
    file_name ='Select file';
    constructor(
    public dialogRef: MatDialogRef<MyClubForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.value = this.data.value;
        this.field_type = this.data.field_type;
        this.field_name = this.data.field_name;
    }
  ngOnInit() {
    }
    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        console.log(fileData);
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/upload_file', formData).subscribe(
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
          this.loading = true;
          var formData = new FormData();
          formData.append(this.field_name, this.value);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/update_record/club/club_id='+sessionStorage.getItem("toowheel_club_id"), formData).subscribe(
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
   removeMedia(url) {
      this[url] = '';
      if(url === 'value') {
          this.file_name= 'Select Picture';
      }     
   }

}
