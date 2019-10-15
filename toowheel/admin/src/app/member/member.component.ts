import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-member',
  templateUrl: './member.component.html',
  styleUrls: ['./member.component.css']
})
export class MemberComponent implements OnInit {
  result = [];
  result_fw = [];
  image_url: string = '../toowheel/api/v1/';
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMember();
      this.getFourWheelMember();
  }
  getMember(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_two_wheel_member')
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
  getFourWheelMember(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_four_wheel_member')
  .subscribe(
          (res)=>{
              this.result_fw = res["result"]["data"];
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  changeStatus(id, status): void {
      var formData = new FormData();
      formData.append('activated', status);
      this.httpClient.post<any>('../toowheel/api/v1/update_record/member/member_id = '+id, formData)
  .subscribe(
          (res)=>{
              this.getMember();
            this.getFourWheelMember();
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
           if(parseInt(val.member_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(MemberForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getMember();
            this.getFourWheelMember();
       }
    });
}
confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(MemberDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getMember();
      this.getFourWheelMember();
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
    @Inject(MAT_DIALOG_DATA) public data: any,private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.memberForm = new FormGroup({
            'type': new FormControl(),
            'first_name': new FormControl(),
            'last_name': new FormControl(),
            'gender': new FormControl(),
            'age': new FormControl(),
            'ic_passport': new FormControl(),
            'dob': new FormControl(),
            'club': new FormControl(),
            'contact_number': new FormControl(),
            'license_category': new FormControl(),
            'address': new FormControl(),
            'country': new FormControl(),
            'state': new FormControl(),
            'referral_member_id': new FormControl(),
            'referral_club_id': new FormControl(),
            'coverage_full_name': new FormControl(),
            'coverage_contact_number': new FormControl(),
            'coverage_address': new FormControl(),
            'email': new FormControl()
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
            'club': this.data.club,
            'contact_number': this.data.contact_number,
            'license_category': this.data.license_category,
            'address': this.data.address,
            'country': this.data.country,
            'state': this.data.state,
            'referral_member_id': this.data.referral_member_id,
            'referral_club_id': this.data.referral_club_id,
            'coverage_full_name': this.data.coverage_full_name,
            'coverage_contact_number': this.data.coverage_contact_number,
            'coverage_address': this.data.coverage_address,
            'email': this.data.email
        })
        this.member_id = this.data.member_id;
    }
    }
}

@Component({
  selector: 'member-delete-confirmation',
  templateUrl: 'member-delete-confirmation.html',
})
export class MemberDelete {
    image_url: string = '../toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<MemberDelete>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.datapopup != null) { 
            this.action = this.datapopup.action;
            this.data = this.datapopup.data;
            if(this.datapopup.action == 'delete') {
                this.member_id = this.datapopup.data;
            }
    }
}

  confirmDelete() {
      if (this.member_id == null || this.member_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../toowheel/api/v1/delete_record/member/member_id='+this.member_id).subscribe(
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