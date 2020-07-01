import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatDialogModule } from '@angular/material/dialog';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';
declare const applyMathAjax: any;

@Component({
  selector: 'app-members',
  templateUrl: './members.component.html',
  styleUrls: ['./members.component.css']
})
export class MembersComponent implements OnInit {
  searchTerm: string = '';
  student = [];
  student_count = 0;
  free_user = [];
  datayear = [];
  datayear_free = [];
  datatopic_free = [];

  stud_year_result = [];  
  image_url: string = '../api/v1/';
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getuser();
    this.getfreeuser();
  }
    getuser(): void {
    this.httpClient.get<any>('../api/v1/get_student')
      .subscribe(
        (res) => {
          this.student = res["result"]["data"];
          this.student_count = res["result"]["total"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }

    getfreeuser(): void {
    this.httpClient.get<any>('../api/v1/get_free_user')
      .subscribe(
        (res) => {
          this.free_user = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
    
  openDialog(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.student_register_id) === parseInt(id)) {
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
      if (result !== false && result !== 'false') {
        this.getuser();
      }
    });
  }

    openFreeMemberView(id, res): void {
    var data = null;
    if (id != 0) {
      this[res].forEach(val => {
        if (parseInt(val.free_user_login_id) === parseInt(id)) {
          data = val;
          return false;
        }
      });
    }
    const dialogRef = this.dialog.open(FreeMemberViewForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getfreeuser();
      }
    });
  }

    openView(id, res): void {
    var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.student_register_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(MemberViewForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
            }
        });
    }

    confirmDialog(id, action): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(PictureViewMember, {
      minWidth: "40%",
      maxWidth: "40%",
      data: {
        data: data,
        action: action
      }
    });

    dialogRef.afterClosed().subscribe(result => {
    });
  }




openFreeUserResult(sid): void {

    this.httpClient.get<any>('../api/v1/get_free_user_year_result/'+sid)
      .subscribe(
        (res) => {
          this.datayear_free = res["result"]["data"];

           this.httpClient.get<any>('../api/v1/get_free_user_topic_result/'+sid)
      .subscribe(
        (res1) => {
            console.log(res1["result"]["data"]);
            if(res1["result"]["error"] == false || (this.datayear_free)) {

                 const dialogRef = this.dialog.open(FreeUserResultForm, {
                    minWidth: "60%",
                    maxWidth: "60%",
                    height: "100%",
                    data: {
                      datatopic: res1["result"]["data"],
                      data: this.datayear_free
                    }
                  });
                  dialogRef.afterClosed().subscribe(result => {
                    if (result !== false && result !== 'false') {
                      console.log('Result closed');
                    }
                  });
         
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );

        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );

     

      
   
     


     
}





openStudYearResult(sid): void {



this.httpClient.get<any>('../api/v1/get_student_year_result/'+sid)
      .subscribe(
        (res) => {
          this.datayear = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );




       this.httpClient.get<any>('../api/v1/get_student_topic_result/'+sid)
      .subscribe(
        (res) => {
            console.log(res["result"]["data"]);
            if(res["result"]["error"] == false) {
          const dialogRef = this.dialog.open(MemberResultForm, {
      minWidth: "60%",
      maxWidth: "60%",
height: "100%",
      data: {
        datatopic: res["result"]["data"],
        data: this.datayear
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
}

confirmDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(MemberDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getuser();
      }
    });
  }
  

confirmFreeUserDelete(id): void {
    var data = null;
    if (id != 0) {
      data = id;
    }
    const dialogRef = this.dialog.open(FreeUserDelete, {
      minWidth: "40%",
      maxWidth: "40%",
      data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        this.getfreeuser();
      }
    });
  }

}



@Component({
  selector: 'member-delete-confirmation',
  templateUrl: 'member-delete-confirmation.html',
})
export class MemberDelete {
  loading = false;
  student_register_id = 0;
  constructor(
    public dialogRef: MatDialogRef<MemberDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.student_register_id = this.data;
    }
  }





  confirmDelete() {
    if (this.student_register_id == null || this.student_register_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/student_register/student_register_id=' + this.student_register_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}





@Component({
  selector: 'freeuser-delete-confirmation',
  templateUrl: 'freeuser-delete-confirmation.html',
})
export class FreeUserDelete {
  loading = false;
  student_register_id = 0;
  constructor(
    public dialogRef: MatDialogRef<FreeUserDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.data != null) {
      this.student_register_id = this.data;
    }
  }





  confirmDelete() {
    if (this.student_register_id == null || this.student_register_id == 0) {
      return;
    }
    this.loading = true;
    this.httpClient.get('../api/v1/delete_record/free_user_login/free_user_login_id=' + this.student_register_id).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }
}


@Component({
  selector: 'member-form',
  templateUrl: 'member-form.html',
})
export class MemberForm {
  image_url: string = '../api/v1/';
  userForm: FormGroup;
  loading = false;
  student_register_id = 0;
  profile_picture: string = 'Profile Image';
  profile_image: string = '';
  constructor(
    public dialogRef: MatDialogRef<MemberForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.userForm = new FormGroup({
      'user_name': new FormControl('', Validators.required),
      'student_name': new FormControl('', Validators.required),
      'gender': new FormControl('', Validators.required),
      'parent_name': new FormControl('', Validators.required),
      'mobile': new FormControl('', Validators.required),
      'city': new FormControl('', Validators.required),
      'pin': new FormControl('', Validators.required),
      'school_name': new FormControl('', Validators.required),
      'standard': new FormControl('', Validators.required),
      'password': new FormControl('', Validators.required),
      'confirm_password': new FormControl('', Validators.required),
      'email': new FormControl('')
    });
    if (this.data != null) {
      this.userForm.patchValue({
        user_name: this.data.user_name,
        student_name: this.data.student_name,
        gender: this.data.gender,
        parent_name: this.data.parent_name,
        mobile: this.data.mobile,
        city: this.data.city,
        pin: this.data.pin,
        school_name: this.data.school_name,
        standard: this.data.standard,
        password: this.data.password,
        confirm_password: this.data.confirm_password,
        email: this.data.email,
      });
      this.student_register_id = this.data.student_register_id;
      this.profile_image = this.data.profile_image;
    }
  }

  onSubmit() {
    if (this.userForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.student_register_id != 0) {
      formData.append('user_name', this.userForm.value.user_name);
      formData.append('student_name', this.userForm.value.student_name);
      formData.append('parent_name', this.userForm.value.parent_name);
      formData.append('gender', this.userForm.value.gender);
      formData.append('profile_image', this.profile_image);
      formData.append('mobile', this.userForm.value.mobile);
      formData.append('city', this.userForm.value.city);
      formData.append('pin', this.userForm.value.pin);
      formData.append('school_name', this.userForm.value.school_name);
      formData.append('standard', this.userForm.value.standard);
      formData.append('password', this.userForm.value.password);
      formData.append('confirm_password', this.userForm.value.confirm_password);
      formData.append('email', this.userForm.value.email);
      url = 'update_record/student_register/student_register_id = ' + this.student_register_id;
    } else {
      formData.append('user_name', this.userForm.value.user_name);
      formData.append('student_name', this.userForm.value.student_name);
      formData.append('gender', this.userForm.value.gender);
      formData.append('profile_picture', this.profile_image);
      formData.append('parent_name', this.userForm.value.parent_name);
      formData.append('mobile', this.userForm.value.mobile);
      formData.append('city', this.userForm.value.city);
      formData.append('pin', this.userForm.value.pin);
      formData.append('school_name', this.userForm.value.school_name);
      formData.append('standard', this.userForm.value.standard);
      formData.append('password', this.userForm.value.password);
      formData.append('confirm_password', this.userForm.value.confirm_password);
      formData.append('email', this.userForm.value.email);
      url = 'insert_student';
    }
    this.httpClient.post('../api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }

  fileProgress(fileInput: any, name: string, path: string) {
    var fileData = <File>fileInput.target.files[0];
    this[name] = fileData.name;
    this.loading = true;
    var formData = new FormData();
    formData.append('file', fileData);
    this.httpClient.post('../api/v1/upload_file', formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this[path] = res["result"]["data"];
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      });
  }

  removeMedia(url) {
    this[url] = '';
    if (url === 'profile_image') {
      this.profile_picture = 'Profile Image';
    }
  }
}

/*
@Component({
  selector: 'free-member-form',
  templateUrl: 'free-member-form.html',
})
export class FreeMemberForm {
  freeuserForm: FormGroup;
  loading = false;
  free_user_login_id = 0;
  constructor(
    public dialogRef: MatDialogRef<FreeMemberForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    this.freeuserForm = new FormGroup({
      'name': new FormControl('', Validators.required),
      'email': new FormControl('', Validators.required),
      'phone': new FormControl('', Validators.required),
      'practice_medium': new FormControl('', Validators.required),
    });
    if (this.data != null) {
      this.freeuserForm.patchValue({
        name: this.data.name,
        phone: this.data.phone,
        email: this.data.email,
        practice_medium: this.data.practice_medium,
      });
      this.free_user_login_id = this.data.free_user_login_id;
    }
  }

  onSubmit() {
    if (this.freeuserForm.invalid) {
      return;
    }
    this.loading = true;
    var formData = new FormData();
    var url = '';
    if (this.free_user_login_id != 0) {
      formData.append('name', this.freeuserForm.value.name);
      formData.append('phone', this.freeuserForm.value.phone);
      formData.append('email', this.freeuserForm.value.email);
      formData.append('practice_medium', this.freeuserForm.value.practice_medium);
      url = 'update_record/free_user_login/free_user_login_id = ' + this.free_user_login_id;
    } else {
      formData.append('name', this.freeuserForm.value.name);
      formData.append('mobile', this.freeuserForm.value.mobile);
      formData.append('email', this.freeuserForm.value.email);
      formData.append('practice_medium', this.freeuserForm.value.practice_medium);
      url = 'insert_free_member';
    }
    this.httpClient.post('../api/v1/' + url, formData).subscribe(
      (res) => {
        this.loading = false;
        if (res["result"]["error"] === false) {
          this.dialogRef.close(true);
        } else {
          this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });
        }
      },
      (error) => {
        this.loading = false;
        this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
      }
    );
  }

}
*/


@Component({
  selector: 'member-view',
  templateUrl: 'member-view.html',
})

export class MemberViewForm {
  image_url: string = '../api/v1/';
  loading = false;
  student = [];
  student_register_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<MemberViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        this.data = this.datapopup;
    }
}


@Component({
  selector: 'free-member-view',
  templateUrl: 'free-member-view.html',
})

export class FreeMemberViewForm {
  image_url: string = '../api/v1/';
  loading = false;
  student = [];
  student_register_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<FreeMemberViewForm>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) { 
        this.data = this.datapopup;
    }
}


@Component({
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})

export class PictureViewMember {
  image_url: string = '../api/v1/';
  action: string = '';
  loading = false;
  student_register_id = 0;
  data: any;
  constructor(
    public dialogRef: MatDialogRef<PictureViewMember>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if (this.datapopup != null) {
      this.action = this.datapopup.action;
      this.data = this.datapopup.data;
      if (this.datapopup.action == 'delete') {
        this.student_register_id = this.datapopup.data;
      }
    }
  }
}




@Component({
  selector: 'member-result-form',
  templateUrl: 'member-result-form.html',
})
export class MemberResultForm {
  resultForm: FormGroup;
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<MemberResultForm>,public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {  }

     openMemberYearResult(logid): void {        
      this.dialogRef.close();

 this.httpClient.get('../api/v1/get_result_detail/' +logid).subscribe(
        (res) => {
            this.loading = false;
            if(res["result"]["error"] == false) {
            
            setTimeout(() => {
                            applyMathAjax();
                        }, 600);

          const dialogRef = this.dialog.open(MemberYearResultForm, {
      minWidth: "60%",
      maxWidth: "60%",
      height: "100%",
      data: {
        data: res["result"]["data"]
        
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );


  }  


openMemberTopicResult(logid,topicid): void {        
      this.dialogRef.close();

 this.httpClient.get('../api/v1/get_result_detail_by_topic/' +logid+'/'+topicid).subscribe(
        (res) => {
            this.loading = false;
            if(res["result"]["error"] == false) {

            setTimeout(() => {
                            applyMathAjax();
                        }, 600);

            console.log(res["result"]["data"]);
          const dialogRef = this.dialog.open(MemberTopicResultForm, {
      minWidth: "60%",
      maxWidth: "60%",
      height: "100%",
      data: {
        data: res["result"]["data"]
        
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );


  }
}



@Component({
  selector: 'freeuser-result-form',
  templateUrl: 'freeuser-result-form.html',
})
export class FreeUserResultForm {
  resultForm: FormGroup;
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<FreeUserResultForm>,public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {  }

     openFreeUserYearResult(logid): void {        
      this.dialogRef.close();

 this.httpClient.get('../api/v1/get_free_user_result_detail/' +logid).subscribe(
        (res) => {
            this.loading = false;
            if(res["result"]["error"] == false) {
            

setTimeout(() => {
                            applyMathAjax();
                        }, 600);

          const dialogRef = this.dialog.open(FreeUserYearResultForm, {
      minWidth: "60%",
      maxWidth: "60%",
      height: "100%",
      data: {
        data: res["result"]["data"]
        
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );


  }  


openFreeUserTopicResult(logid,topicid): void {        
      this.dialogRef.close();

 this.httpClient.get('../api/v1/get_free_user_result_detail_by_topic/' +logid+'/'+topicid).subscribe(
        (res) => {
            this.loading = false;
            if(res["result"]["error"] == false) {

setTimeout(() => {
                            applyMathAjax();
                        }, 600);

            console.log(res["result"]["data"]);
          const dialogRef = this.dialog.open(FreeUserTopicResultForm, {
      minWidth: "60%",
      maxWidth: "60%",
       height: "100%",
      data: {
        data: res["result"]["data"]
        
      }
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result !== false && result !== 'false') {
        console.log('Result closed');
      }
    });
            }else {
             this._snackBar.open(res["result"]["message"], '', {
            duration: 2000,
          });   
            }
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );


  }

}



 @Component({
  selector: 'member-year-result-view',
  templateUrl: 'member-year-result-view.html',
})

export class MemberYearResultForm {
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<MemberYearResultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}


 
@Component({
  selector: 'member-topic-result-view',
  templateUrl: 'member-topic-result-view.html',
})

export class MemberTopicResultForm {
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<MemberTopicResultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}


@Component({
  selector: 'freeuser-year-result-view',
  templateUrl: 'freeuser-year-result-view.html',
})

export class FreeUserYearResultForm {
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<FreeUserYearResultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}




@Component({
  selector: 'freeuser-topic-result-view',
  templateUrl: 'freeuser-topic-result-view.html',
})

export class FreeUserTopicResultForm {
  loading = false;
  constructor(
    public dialogRef: MatDialogRef<FreeUserTopicResultForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
}