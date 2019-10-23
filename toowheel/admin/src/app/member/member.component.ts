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
searchTerm: string = '';
    sortdata: string = '';
  result = [];
  result_fw = [];
  image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMember();
      this.getFourWheelMember();
  }
  getMember(): void {
  this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_two_wheel_member')
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
  this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_four_wheel_member')
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
      this.httpClient.post<any>('https://www.toowheel.com/toowheel/api/v1/update_record/member/member_id = '+id, formData)
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

    openView(): void  {
      const dialogRef = this.dialog.open(MemberViewForm, {
          minWidth: "80%",
          maxWidth: "80%"
      });

      dialogRef.afterClosed().subscribe(result => {
            console.log(`Dialog result: ${result}`);
        });
    }
    openTshirt(): void  {
      const dialogRef = this.dialog.open(MemberTshirtForm, {
          minWidth: "80%",
          maxWidth: "80%"
      });

      dialogRef.afterClosed().subscribe(result => {
            console.log(`Dialog result: ${result}`);
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
    sortRecords1(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result_fw).sort((a,b) => a.first_name.localeCompare(b.first_name));
            break;
            case 'title_z_a':
            (this.result_fw).sort((a,b) => b.first_name.localeCompare(a.first_name));
            break;
            case 'created_a_z':
                (this.result_fw).sort((a,b) => a.created_at.localeCompare(b.created_at));
            break;
            case 'created_z_a':
                (this.result_fw).sort((a,b) => b.created_at.localeCompare(a.created_at));
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
    memberForm: FormGroup;
    loading = false;
    profile_image: string = "Profile Picture";
    image_path: string = "";
    member_id = 0;
    clubs = [];
    states = [];
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
            'contact_number': new FormControl(),
            'license_category': new FormControl(),
            'address': new FormControl(),
            'country': new FormControl('Malaysia'),
            'state': new FormControl(),
            'referral_member_id': new FormControl(),
            'referral_club_id': new FormControl(),
            'marital_status': new FormControl(),
            'zip_code': new FormControl(),
            'email': new FormControl(),
            'password': new FormControl(),
            'club_id': new FormControl()
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
            'state': this.data.state,
            'referral_member_id': this.data.referral_member_id,
            'referral_club_id': this.data.referral_club_id,
            'marital_status': this.data.marital_status,
            'zip_code': this.data.zip_code,
            'password': this.data.password,
            'email': this.data.email,
            'club_id': this.data.email
        })
        this.member_id = this.data.member_id;
    }
    this.getClub();
    }
        fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/upload_file', formData).subscribe(
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
          this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/get_club_by_type/'+this.memberForm.value.type).subscribe(
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
          this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/get_states').subscribe(
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
          formData.append('password', this.memberForm.value.password);
          formData.append('club_id', this.memberForm.value.club_id);
          formData.append('payment_type', 'receipt');
          formData.append('paypal_response', '');
          formData.append('paypal_transaction_id', '');
          formData.append('fund_transfer_file', '');
          formData.append('activated', 1);
      if(this.member_id != 0) {
        url = 'update_record/member/member_id = '+this.member_id;
      } else {
        url = 'insert_member';
      }
      this.httpClient.post('https://www.toowheel.com/toowheel/api/v1/'+url, formData).subscribe(
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
    image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
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
      this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/delete_record/member/member_id='+this.member_id).subscribe(
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
  selector: 'member-view-form',
  templateUrl: 'member-view-form.html',
})
 
export class MemberViewForm {
    constructor(
    public dialogRef: MatDialogRef<MemberViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    
    onNoClick(): void {
        this.dialogRef.close();
    }
}  

  @Component({
  selector: 'member-tshirt-form',
  templateUrl: 'member-tshirt-form.html',
})
 
export class MemberTshirtForm {
    constructor(
    public dialogRef: MatDialogRef<MemberTshirtForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    
    onNoClick(): void {
        this.dialogRef.close();
    }
}  
