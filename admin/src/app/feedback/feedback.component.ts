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
  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

  ngOnInit() {
    this.getfeedback();
    this.getstudent();
  }
    image_url: string = 'http://localhost/project/examhorse/api/v1/';
    getfeedback(): void {
    this.httpClient.get<any>('http://localhost/project/examhorse/api/v1/get_feedback')
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
    this.httpClient.get<any>('http://localhost/project/examhorse/api/v1/get_student')
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
    AssignFeedback(): void {
        const dialogRef = this.dialog.open(AssignFeedbackForm, {
          minWidth: "40%",
          maxWidth: "40%"
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
  selector: 'feedback-form',
  templateUrl: 'feedback-form.html',
})
export class FeedbackForm {
    feedbackForm: FormGroup;
    loading = false;
    feedback_id = 0;
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
      this.httpClient.post('http://localhost/project/examhorse/api/v1/'+url, formData).subscribe(
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
      this.httpClient.get('http://localhost/project/examhorse/api/v1/delete_record/feedback/feedback_id='+this.feedback_id).subscribe(
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
    //assignfeedbackForm: FormGroup;
    loading = false;
    feedback = [];
    constructor(
    public dialogRef: MatDialogRef<AssignFeedbackForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.httpClient.get<any>('http://localhost/project/examhorse/api/v1/get_feedback')
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
}
