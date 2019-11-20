import { Component, OnInit, Inject } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import * as moment from 'moment';

@Component({
  selector: 'app-member',
  templateUrl: './member.component.html',
  styleUrls: ['./member.component.css']
})
export class MemberComponent implements OnInit {
    result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getMember();
  }
    getMember(): void {
    this.httpClient.get<any>('https://localhost/project/thirukkural/api/v1/get_member')
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
    openDialog(id, res): void {
        var data = null;
        if(id != 0) {
        this[res].forEach(val=> {
           if(parseInt(val.member_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
        }
        const dialogRef = this.dialog.open(MemberForm, {
          minWidth: "50%",
          maxWidth: "50%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
            this.getMember();
          }
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
        const dialogRef = this.dialog.open(MemberDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                 this.getMember();
           }
        });
    }
}

@Component({
  selector: 'member-form',
  templateUrl: 'member-form.html',
})
export class MemberForm {
    memberForm: FormGroup;
    loading = false;
    member_id = 0;
    constructor(
    public dialogRef: MatDialogRef<MemberForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.memberForm = new FormGroup({
      'lid': new FormControl('', Validators.required),
      'name': new FormControl('', Validators.required),
      'dob': new FormControl('', Validators.required),
      'gender': new FormControl('', Validators.required),
      'email': new FormControl('', Validators.required),
      'mobile': new FormControl('', Validators.required),
      'country': new FormControl('', Validators.required),
      }); 
      if(this.data != null) {
           this.memberForm.patchValue({
           lid: this.data.lid,
           name: this.data.name,
           dob: this.data.dob,
           gender: this.data.gender,
           email: this.data.email,
           mobile: this.data.mobile,
           country: this.data.country,
        });
        this.member_id = this.data.member_id;
        } else {
            this.memberForm.patchValue ({
            date: new Date()
        });
        }  
    }
    
    onSubmit() {
        if (this.memberForm.invalid) {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          var url = '';
          if(this.member_id != 0) {
          formData.append('lid', this.memberForm.value.lid);
          formData.append('name', this.memberForm.value.name);
          formData.append('dob', moment(this.memberForm.value.dob).format('YYYY-MM-DD'));
          formData.append('gender', this.memberForm.value.gender);
          formData.append('mobile', this.memberForm.value.mobile);
          formData.append('email', this.memberForm.value.email);
          formData.append('country', this.memberForm.value.country);
          url = 'update_record/member/member_id = '+this.member_id;
        }else{
          formData.append('lid', this.memberForm.value.lid);
          formData.append('name', this.memberForm.value.name);
          formData.append('dob', moment(this.memberForm.value.dob).format('YYYY-MM-DD'));
          formData.append('gender', this.memberForm.value.gender);
          formData.append('mobile', this.memberForm.value.mobile);
          formData.append('email', this.memberForm.value.email);
          formData.append('country', this.memberForm.value.country);
          url = 'insert_member';
        }
        this.httpClient.post('https://localhost/project/thirukkural/api/v1/'+url, formData).subscribe(
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
  selector: 'member-delete-confirmation',
  templateUrl: 'member-delete-confirmation.html',
})
export class MemberDelete {
    loading = false;
    member_id = 0;
    constructor(
    public dialogRef: MatDialogRef<MemberDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.member_id = this.data;
    }
}

  confirmDelete() {
      if (this.member_id == null || this.member_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://localhost/project/thirukkural/api/v1/delete_record/member/member_id='+this.member_id).subscribe(
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