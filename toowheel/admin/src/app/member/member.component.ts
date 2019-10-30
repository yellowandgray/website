import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import * as moment from 'moment';

@Component({
  selector: 'app-member',
  templateUrl: './member.component.html',
  styleUrls: ['./member.component.css']
})
export class MemberComponent implements OnInit {
  searchTermTWP: string = '';
  searchTermTWM: string = '';
  searchTermFWP: string = '';
  searchTermFWM: string = '';
  sortdata_twp: string = '';
  sortdata_twm: string = '';
  sortdata_fwp: string = '';
  sortdata_fwm: string = '';

    sortdata_twtp: string = '';
    sortdata_twta: string = '';
    sortdata_twtb: string = '';

    sortdata_fwtp: string = '';
    sortdata_fwta: string = '';
    sortdata_fwtb: string = '';
    
    tw_p_membercount = 0;
    tw_a_membercount = 0;
    tw_b_membercount = 0;
    fw_p_membercount = 0;
    fw_a_membercount = 0;
    fw_b_membercount = 0;
  result = [];
  result_fw = [];
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMember();
      this.getFourWheelMember();
  }
  getMember(): void {
  this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_two_wheel_member')
  .subscribe(
          (res)=>{
              this.result = res["result"]["data"];
              this.result.forEach(val=> {
           if(val.activated == 0 && val.activated_at == '0000-00-00') {
                this.tw_p_membercount = this.tw_p_membercount + 1;
           }
           if(val.activated == 1) {
                this.tw_a_membercount = this.tw_a_membercount + 1;
           }
           if(val.activated == 0 && val.activated_at != '0000-00-00') {
                this.tw_b_membercount = this.tw_b_membercount + 1;
           }
         });
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
  getFourWheelMember(): void {
  this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_four_wheel_member')
  .subscribe(
          (res)=>{
              this.result_fw = res["result"]["data"];
              this.result_fw.forEach(val=> {
           if(val.activated == 0 && val.activated_at == '0000-00-00') {
                this.fw_p_membercount = this.fw_p_membercount + 1;
           }
           if(val.activated == 1) {
                this.fw_a_membercount = this.fw_a_membercount + 1;
           }
           if(val.activated == 0 && val.activated_at != '0000-00-00') {
                this.fw_b_membercount = this.fw_b_membercount + 1;
           }
         });
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
      if(status == 1) {
      formData.append('activated_by', sessionStorage.getItem("toowheel_users_id"));
      formData.append('activated_at', moment().format('YYYY-MM-DD'));
      }
      if(status == 0) {
      formData.append('blocked_by', sessionStorage.getItem("toowheel_users_id"));
      formData.append('blocked_at', moment().format('YYYY-MM-DD'));
      }
      this.httpClient.post<any>('https://www.toowheel.com/beta/toowheel/api/v1/update_user_status/member/member_id = '+id, formData)
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
 openPasswordDialog(id, res): void  {
      var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.member_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(MemberPasswordChange, {
        minWidth: "40%",
        maxWidth: "40%",
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

    openView(id, res): void  {
        var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.member_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
      const dialogRef = this.dialog.open(MemberViewForm, {
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
    openTshirt(id, res): void  {
            var data = null;
        if(id != 0) { 
        this[res].forEach(val=> {
             if(parseInt(val.member_id) === parseInt(id)) {
                  data = val;
                  return false;
             }
           });
        }
      const dialogRef = this.dialog.open(MemberTshirtForm, {
          minWidth: "60%",
          maxWidth: "60%",
          data: data
      });

      dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
            this.getMember();
            this.getFourWheelMember();
            }
        });
    }
    
    sortRecords(arr, sort): void {
        switch(sort) {
            case 'title_a_z':
                (this[arr]).sort((a,b) => a.first_name.localeCompare(b.first_name));
            break;
            case 'title_z_a':
            (this[arr]).sort((a,b) => b.first_name.localeCompare(a.first_name));
            break;
            case 'created_a_z':
                (this[arr]).sort((a,b) => a.created_at.localeCompare(b.created_at));
            break;
            case 'created_z_a':
                (this[arr]).sort((a,b) => b.created_at.localeCompare(a.created_at));
            break;
            case 'pendind_a_z':
                (this[arr]).sort((a,b) => b.t_shirt_status.localeCompare(a.t_shirt_status));
            break;
            case 'pendind_z_a':
                (this[arr]).sort((a,b) => b.t_shirt_status.localeCompare(a.t_shirt_status));
            break;
            case 'shiped_a':
                (this[arr]).sort((a,b) => b.t_shirt_status.localeCompare(a.t_shirt_status));
            break;
            default:
            break;
        }
    }


}

@Component({
  selector: 'member-form',
  templateUrl: 'member-form.html',
})
export class MemberForm {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    passwordhide: string = '';
    memberForm: FormGroup;
    loading = false;
    profile_image: string = "Profile Picture";
    image_path: string = '';
    member_id = 0;
    clubs = [];
    states = [];
    constructor(
    public dialogRef: MatDialogRef<MemberForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.memberForm = new FormGroup({
            'type': new FormControl('two_wheel'),
            'first_name': new FormControl('', Validators.required),
            'last_name': new FormControl('', Validators.required),
            'gender': new FormControl('male'),
            'age': new FormControl('20'),
            'ic_passport': new FormControl(''),
            'dob': new FormControl(''),
            'contact_number': new FormControl(''),
            'license_category': new FormControl(''),
            'address': new FormControl(''),
            'country': new FormControl('Malaysia'),
            'state': new FormControl('', Validators.required),
            'referral_member_id': new FormControl(''),
            'referral_club_id': new FormControl(''),
            'marital_status': new FormControl('single'),
            'zip_code': new FormControl(''),
            'email': new FormControl('', Validators.required),
            'password': new FormControl('', Validators.required),
            'email_id': new FormControl(''),
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
            'dob': this.data.dob_year +'-'+ this.pad(this.data.dob_month, 2) +'-'+ this.pad(this.data.dob_date, 2),
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
            'email_id': this.data.email_id,
            'club_id': this.data.club_id
        })
        this.member_id = this.data.member_id;
        this.image_path= this.data.profile_picture;
        this.passwordhide=this.data.password;
    }
    this.getClub();
    this.getState();
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
    getClub(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_club_by_type/'+this.memberForm.value.type).subscribe(
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
    getState(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_states').subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.states = res["result"]["data"];
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
      if (this.memberForm.invalid) {
            return;
      }
      this.loading = true;
      var url = '';
      var formData = new FormData();
      formData.append('type', this.memberForm.value.type);
          formData.append('first_name', this.memberForm.value.first_name);
          formData.append('last_name', this.memberForm.value.last_name);
          if(this.image_path && this.image_path != '') {
          formData.append('profile_picture', this.image_path);
          }else {
              formData.append('profile_picture', '');
          }
          formData.append('gender', this.memberForm.value.gender);
          formData.append('age', this.memberForm.value.age);
          formData.append('ic_passport', this.memberForm.value.ic_passport);
          formData.append('dob_date', moment(this.memberForm.value.dob).format('DD'));
          formData.append('dob_month', moment(this.memberForm.value.dob).format('MM'));
          formData.append('dob_year', moment(this.memberForm.value.dob).format('YYYY'));
          formData.append('contact_number', this.memberForm.value.contact_number); 
          formData.append('address', this.memberForm.value.address);
          formData.append('country', 'Malaysia');
          formData.append('state_id', this.memberForm.value.state);
          formData.append('referral_member_id', this.memberForm.value.referral_member_id);
          formData.append('referral_club_id', this.memberForm.value.referral_club_id);
          formData.append('marital_status', this.memberForm.value.marital_status);
          formData.append('zip_code', this.memberForm.value.zip_code);
          formData.append('email', this.memberForm.value.email);
          formData.append('email_id', this.memberForm.value.email_id);
          if(this.passwordhide == '')
          {
          formData.append('password', this.memberForm.value.password);
          }
          formData.append('club_id', this.memberForm.value.club_id);
          formData.append('payment_type', 'receipt');
          formData.append('paypal_response', '');
          formData.append('paypal_transaction_id', '');
          formData.append('fund_transfer_file', '');
          formData.append('activated', '1');
          formData.append('activated_at', moment().format('YYYY-MM-DD'));
      if(this.member_id != 0) {
        url = 'update_record/member/member_id = '+this.member_id;
      } else {
        formData.append('activated_by', sessionStorage.getItem("toowheel_users_id"));
        url = 'insert_member';
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
  removeMedia(url) {
      this[url] = '';
      if(url === 'image_path') {
          this.profile_image= "Profile Picture";
      }     
  }
    pad(num:number, size:number): string {
    let s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}
}

@Component({
  selector: 'member-delete-confirmation',
  templateUrl: 'member-delete-confirmation.html',
})
export class MemberDelete {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
blockreason: string = "";
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
  selector: 'member-view-form',
  templateUrl: 'member-view-form.html',
})
 
export class MemberViewForm {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    memberForm: FormGroup;
    loading = false;
    member_id = 0;
    clubs = [];
    states = [];
    constructor(
    public dialogRef: MatDialogRef<MemberViewForm>,
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

  @Component({
  selector: 'member-tshirt-form',
  templateUrl: 'member-tshirt-form.html',
})
 
export class MemberTshirtForm {
    delivery_status = 1;
    constructor(
    public dialogRef: MatDialogRef<MemberTshirtForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.delivery_status = this.data.t_shirt_status;
    }
    changeStatus(id, status): void {
      var formData = new FormData();
      formData.append('t_shirt_status', status);
      if(status == 2) {
      formData.append('shipped_at', moment().format('YYYY-MM-DD'));
      }
      if(status == 3) {
      formData.append('delivered_at', moment().format('YYYY-MM-DD'));
      }
      this.httpClient.post<any>('https://www.toowheel.com/beta/toowheel/api/v1/update_tshirt_status/member/member_id = '+id, formData)
  .subscribe(
          (res)=>{
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
  selector: 'member-password',
  templateUrl: 'member-password.html',
})
export class MemberPasswordChange {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    passwordhide: string = '';
    memberForm: FormGroup;
    loading = false;
    profile_image: string = "Profile Picture";
    image_path: string = '';
    member_id = 0;
    clubs = [];
    states = [];
    constructor(
    public dialogRef: MatDialogRef<MemberPasswordChange>,
    @Inject(MAT_DIALOG_DATA) public data: any,private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.memberForm = new FormGroup({
            'password': new FormControl('')
        });
        if(this.data != null) {
        this.image_path= this.data.profile_picture;
        this.member_id=this.data.member_id;
    }
    }

    onSubmit() {
      if (this.memberForm.invalid) {
            return;
      }
      this.loading = true;
      var url = '';
      var formData = new FormData();
      formData.append('password', this.memberForm.value.password);
      if(this.member_id != 0) {
        url = 'update_record/member/member_id = '+this.member_id;
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
