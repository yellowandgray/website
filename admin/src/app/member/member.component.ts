import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
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
     this.httpClient.get<any>('http://localhost/project/fresche/api/v1/get_member')
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
        this.memberForm = new FormGroup ({
            'fname': new FormControl('', Validators.required),
            'lname': new FormControl('', Validators.required),
            'gender': new FormControl('', Validators.required),
            'age': new FormControl('', Validators.required),
            'email': new FormControl('', Validators.required),
            'mobile': new FormControl('', Validators.required),
            'dob': new FormControl('', Validators.required),
            'member_list_id': new FormControl('', Validators.required),
            'address': new FormControl('', Validators.required),
        }); 
            
        if(this.data != null) {
           this.memberForm.patchValue({
           fname: this.data.fname,
           lname: this.data.lname,
           gender: this.data.gender,
           age: this.data.age,
           email: this.data.email,
           mobile: this.data.mobile,
           dob: this.data.dob,
           member_list_id: this.data.member_list_id,
           address: this.data.address,
        });
            this.member_id = this.data.member_id;
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
        formData.append('fname', this.memberForm.value.fname);
        formData.append('lname', this.memberForm.value.lname);
        formData.append('gender', this.memberForm.value.gender);
        formData.append('age', this.memberForm.value.age);
        formData.append('email', this.memberForm.value.email);
        formData.append('mobile', this.memberForm.value.mobile);
        formData.append('dob', this.memberForm.value.dob);
        formData.append('member_list_id', this.memberForm.value.member_list_id);
        formData.append('address', this.memberForm.value.address);
        url = 'update_record/member/member_id = '+this.member_id;
      } else {
        formData.append('fname', this.memberForm.value.fname);
        formData.append('lname', this.memberForm.value.lname);
        formData.append('gender', this.memberForm.value.gender);
        formData.append('age', this.memberForm.value.age);
        formData.append('email', this.memberForm.value.email);
        formData.append('mobile', this.memberForm.value.mobile);
        formData.append('dob', this.memberForm.value.dob);
        formData.append('member_list_id', this.memberForm.value.member_list_id);
        formData.append('address', this.memberForm.value.address);
        url = 'insert_member';
      }
      this.httpClient.post('http://localhost/project/fresche/api/v1/'+url, formData).subscribe(
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
      this.httpClient.get('http://localhost/project/fresche/api/v1/delete_record/member/member_id='+this.member_id).subscribe(
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