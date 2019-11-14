import { Component, OnInit, Inject } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import * as moment from 'moment';

@Component({
  selector: 'app-mymember',
  templateUrl: './mymember.component.html',
  styleUrls: ['./mymember.component.css']
})
export class MymemberComponent implements OnInit {
  searchTerm: string = '';
  sortdata: string = '';
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMember();
  }
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  getMember(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_member_by_club/' + sessionStorage.getItem("toowheel_club_id"))
     .subscribe(
             (res)=>{
                 if(res["result"]["error"] == false) {
                 this.result = res["result"]["data"];
                 }else {
                     this.result = [];
                 }
           },
           (error)=>{
               this._snackBar.open(error["statusText"], '', {
         duration: 2000,
       });
           }
           );
     }
     confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(MyMemberDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
       }
    });
}
openView(id): void  {
        var data = null;
      if(id != 0) { 
      this.result.forEach(val=> {
           if(parseInt(val.member_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
      const dialogRef = this.dialog.open(MyMemberViewForm, {
          minWidth: "80%",
          maxWidth: "80%",
          data: data
      });

      dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            }
        });
    }
    sortRecords(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result).sort((a,b) => a.first_name.localeCompare(b.first_name));
            break;
            case 'title_z_a':
            (this.result).sort((a,b) => b.first_name.localeCompare(a.first_name));
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
  selector: 'mymember-delete-confirmation',
  templateUrl: 'mymember-delete-confirmation.html',
})
export class MyMemberDelete {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
blockreason: string = "";
    data: any;
    constructor(
    public dialogRef: MatDialogRef<MyMemberDelete>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.datapopup != null) { 
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if(this.datapopup.action == 'delete') {
                this.member_id = this.datapopup.data;
            }
           if(this.datapopup.action == 'block') {
                this.member_id = this.datapopup.data;                
            }
    }
}

  confirmDelete() {
      if (this.member_id == null || this.member_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/member/member_id='+this.member_id).subscribe(
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
        changeStatus(): void {
        var formData = new FormData();
        formData.append('activated', '0');
        formData.append('block_reason', this.blockreason);
        formData.append('blocked_by', sessionStorage.getItem("toowheel_users_id"));
        formData.append('blocked_at', moment().format('YYYY-MM-DD'));
        this.httpClient.post<any>('https://www.toowheel.com/beta/toowheel/api/v1/update_user_status/member/member_id = '+this.member_id, formData)
    .subscribe(
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
              this._snackBar.open(error["statusText"], '', {
        duration: 2000,
      });
          }
          );
    }
}
@Component({
  selector: 'mymember-view-form',
  templateUrl: 'mymember-view-form.html',
})
 
export class MyMemberViewForm {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    memberForm: FormGroup;
    loading = false;
    member_id = 0;
    clubs = [];
    states = [];
    constructor(
    public dialogRef: MatDialogRef<MyMemberViewForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.memberForm = new FormGroup({
            'type': new FormControl('two_wheel'),
            'first_name': new FormControl('', Validators.required),
            'last_name': new FormControl('', Validators.required),
            'gender': new FormControl('male'),
            'age': new FormControl('20'),
            'ic_passport': new FormControl(''),
            'dob': new FormControl(new Date()),
            'contact_number': new FormControl(''),
            'license_category': new FormControl(''),
            'address': new FormControl(''),
            'country': new FormControl('Malaysia'),
            'state': new FormControl('', Validators.required),
            'referral_member_id': new FormControl(''),
            'referral_club_id': new FormControl(''),
            'marital_status': new FormControl('single'),
            'zip_code': new FormControl(''),
            'email': new FormControl('', [Validators.required, Validators.email]),
            'password': new FormControl(''),
            'club_id': new FormControl('')
        });
        if(this.data != null) {
            this.memberForm.patchValue({ 
            'type': this.data.type,
            'first_name': this.data.first_name,
            'last_name': this.data.last_name,
            'gender': this.data.gender,
            'age': this.data.age,
            'ic_passport': this.data.ic_passport,
            'dob': this.data.dob_year +'-'+this.data.dob_month +'-'+this.data.dob_date,
            'contact_number': this.data.contact_number,
            'license_category': this.data.license_category,
            'address': this.data.address,
            'country': this.data.country,
            'state': this.data.state_id,
            'referral_member_id': this.data.referral_member_id,
            'referral_club_id': this.data.referral_club_id,
            'marital_status': this.data.marital_status,
            'zip_code': this.data.zip_code,
            'password': this.data.password,
            'email': this.data.email,
            'club_id': this.data.club_id
        })
            this.member_id = this.data.member_id;
        }
    }
}