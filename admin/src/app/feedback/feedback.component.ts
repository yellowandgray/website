import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-feedback',
  templateUrl: './feedback.component.html',
  styleUrls: ['./feedback.component.css']
})
export class FeedbackComponent implements OnInit {
    feedback = [];
    student = [];
    sortdata: string = "login_at";
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getfeedback();
    this.getstudent();
  }
image_url: string = 'http://localhost/project/feringo/api/v1/';
    getfeedback(): void {
    this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_feedback')
      .subscribe(
        (res) => {
          this.feedback = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
    getstudent(): void {
    this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_student/'+this.sortdata)
      .subscribe(
        (res) => {
          this.student = res["result"]["data"];
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
          if(id != 0) {
          this[res].forEach(val=> {
               if(parseInt(val.feedback_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(FeedbackForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
                this.getfeedback();
            }
        });
    }


     
    openAssignedDialog(id): void {

 this.httpClient.get('http://localhost/project/feringo/api/v1/get_assigned_feedback/' +id).subscribe(
        (res) => {
            //this.loading = false;
            
            if(res["result"]["error"] == false) {
            
          const dialogRef = this.dialog.open(AssignedFeedbackForm, {
      minWidth: "40%",
      maxWidth: "40%",
      data: res["result"]["data"],
       
       
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

    



    AssignFeedback(id): void {
         
        const dialogRef = this.dialog.open(AssignFeedbackForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: {student_id: id}
        });
       
        
        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
                this.getfeedback();
            }
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(FeedbackDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getfeedback();
       }
    });
    }
}


    @Component({
 selector: 'assigned-feedback-form',
  templateUrl: 'assigned-feedback-form.html'
})

export class AssignedFeedbackForm {
  loading = false;
  constructor(
    public dialog: MatDialog,
    public dialogRef: MatDialogRef<AssignedFeedbackForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}

    
confirmAssignedDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(AssignedFeedbackDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
           this.dialogRef.close();
       }
    });
    }
    
}


@Component({
  selector: 'feedback-form',
  templateUrl: 'feedback-form.html',
})
export class FeedbackForm {
    feedbackForm: FormGroup;
    loading = false;
    feedback_id = 0;
    feedback_type = [];
    subject:any[];
    constructor(
    public dialogRef: MatDialogRef<FeedbackForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.feedbackForm = new FormGroup ({
            'name': new FormControl('', Validators.required),
            'feedback_type': new FormControl('', Validators.required),
            'option_1': new FormControl(''),
            'option_2': new FormControl(''),
            'option_3': new FormControl(''),
        });
        if(this.data != null) {
           this.feedbackForm.patchValue({
           name: this.data.name,
           feedback_type: this.data.feedback_type,
            option_1: this.data.option_1,
           option_2: this.data.option_2,
           option_3: this.data.option_3,
        });
            this.feedback_id = this.data.feedback_id;
        }

        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_feedback_type_master')
          .subscribe(
            (res) => {
              this.feedback_type = res["result"]["data"];              
            },
            (error) => {
              this._snackBar.open(error["statusText"], '', {
                duration: 2000,
              });
            }
          );

          
        
    }

    onSubmit() {
      if (this.feedbackForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.feedback_id != 0) {
        formData.append('name', this.feedbackForm.value.name);
        formData.append('feedback_type', this.feedbackForm.value.feedback_type);       
        formData.append('option_1', this.feedbackForm.value.option_1);
        formData.append('option_2', this.feedbackForm.value.option_2);
        formData.append('option_3', this.feedbackForm.value.option_3);
        url = 'update_record/feedback/feedback_id = '+this.feedback_id;
      } else {
        formData.append('name', this.feedbackForm.value.name);
        formData.append('feedback_type', this.feedbackForm.value.feedback_type);       
        formData.append('option_1', this.feedbackForm.value.option_1);
        formData.append('option_2', this.feedbackForm.value.option_2);
        formData.append('option_3', this.feedbackForm.value.option_3);
        url = 'insert_feedback';
      }
      this.httpClient.post('http://localhost/project/feringo/api/v1/'+url, formData).subscribe(
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
  selector: 'feedback-delete-confirmation',
  templateUrl: 'feedback-delete-confirmation.html',
})
export class FeedbackDelete {
    loading = false;
    feedback_id = 0;
    constructor(
    public dialogRef: MatDialogRef<FeedbackDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.feedback_id = this.data;
    }
}

  confirmDelete() {
      if (this.feedback_id == null || this.feedback_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/feringo/api/v1/delete_record/feedback/feedback_id='+this.feedback_id).subscribe(
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
  selector: 'assignedfeedback-delete-confirmation',
  templateUrl: 'assignedfeedback-delete-confirmation.html',
})
export class AssignedFeedbackDelete {
    loading = false;
    user_assign_feedback_id = 0;
    constructor(
    public dialogRef: MatDialogRef<AssignedFeedbackDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.user_assign_feedback_id = this.data;
    }
}

  confirmDelete():void {
      if (this.user_assign_feedback_id == null || this.user_assign_feedback_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/feringo/api/v1/delete_record/user_assign_feedback/user_assign_feedback_id='+this.user_assign_feedback_id).subscribe(
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
  selector: 'assign-feedback-form',
  templateUrl: 'assign-feedback-form.html',
})
export class AssignFeedbackForm {
    assignfeedbackForm: FormGroup;
    loading = false;
    feedback = [];
    feedback_type = [];
    feedback_timing = [];
    selected_type : any;
    selected_timing : any;
    user_assign_feedback_id = 0;
    student_id = "0";
    constructor(
    public dialogRef: MatDialogRef<AssignFeedbackForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {

        this.assignfeedbackForm = new FormGroup ({
            'feedback_type': new FormControl(''),
            'feedback_timing': new FormControl('', Validators.required),
            'selectfeedback': new FormControl('') ,   
        });
        if(this.data != null) {
           this.assignfeedbackForm.patchValue({
           feedback_type: this.data.feedback_type,
           feedback_timing: this.data.feeback_timing,
        });
            this.user_assign_feedback_id = this.data.user_assign_feedback_id;
            this.student_id   = this.data.student_id; 
        }
        
        this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_feedback')
          .subscribe(
            (res) => {
              this.feedback = res["result"]["data"];
            },
            (error) => {
              this._snackBar.open(error["statusText"], '', {
                duration: 2000,
              });
            }
          );


          this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_feedback_type_master')
          .subscribe(
            (res) => {
              this.feedback_type = res["result"]["data"];              
            },
            (error) => {
              this._snackBar.open(error["statusText"], '', {
                duration: 2000,
              });
            }
          );

          
         this.httpClient.get<any>('http://localhost/project/feringo/api/v1/get_feedback_timing_master')
          .subscribe(
            (res) => {
              this.feedback_timing = res["result"]["data"];              
            },
            (error) => {
              this._snackBar.open(error["statusText"], '', {
                duration: 2000,
              });
            }
          );

    }





    getFeedbackbyType(ev): void {    
    var ftype = ev.value;
    this.httpClient
      .get<any>(
        "http://localhost/project/feringo/api/v1/get_feedback_by_type/" +ftype 
      )
      .subscribe(
        res => {
          this.feedback= res["result"]["data"];
        },
        error => {
          this._snackBar.open(error["statusText"], "", {
            duration: 2000
          });
        }
      );

  }    
   
  onSubmit() {

      if (this.assignfeedbackForm.invalid) {
         
            return;
      }

   
      this.loading = true;
      var formData = new FormData();
      var url = '';


        formData.append('student_id', this.student_id);
        formData.append('feedback_timing', this.assignfeedbackForm.value.feedback_timing);
        
         if(this.assignfeedbackForm.value.selectfeedback && this.assignfeedbackForm.value.selectfeedback!='') {
           var selectfeedback = JSON.stringify(this.assignfeedbackForm.value.selectfeedback);
           formData.append('feedback', selectfeedback);       

            url = 'insert_user_assign_feedback';
            this.httpClient.post('http://localhost/project/feringo/api/v1/'+url, formData).subscribe(
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
        }else {
            this.loading = false;
        }
        
    
       

  }
}
