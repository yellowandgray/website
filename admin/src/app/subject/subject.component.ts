import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-subject',
  templateUrl: './subject.component.html',
  styleUrls: ['./subject.component.css']
})
export class SubjectComponent implements OnInit {
  
    subject = [];
    topic = [];

    constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

    ngOnInit() {
        this.getsubject();
        this.gettopic();
    }
    getsubject(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_subject')
        .subscribe(
                (res)=>{
                    this.subject = res["result"]["data"];
              },
              (error)=>{
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            }
        );
    }
    gettopic(): void {
        this.httpClient.get<any>('http://localhost/project/mekana/api/v1/get_topic')
        .subscribe(
                (res)=>{
                    this.topic = res["result"]["data"];
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
               if(parseInt(val.subject_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(SubjectForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
                this.getsubject();
            }
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(SubjectDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getsubject();
       }
    });
    }
}

@Component({
  selector: 'subject-form',
  templateUrl: 'subject-form.html',
})
export class SubjectForm {
    subjectForm: FormGroup;
    loading = false;
    subject_id = 0;
  constructor(
    public dialogRef: MatDialogRef<SubjectForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.subjectForm = new FormGroup ({
            'name': new FormControl('', Validators.required)
        });
        if(this.data != null) {
           this.subjectForm.patchValue({
           name: this.data.name,
        });
            this.subject_id = this.data.subject_id;
        }
    }

    onSubmit() {
      if (this.subjectForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.subject_id != 0) {
        formData.append('name', this.subjectForm.value.name);
        url = 'update_record/subject/subject_id = '+this.subject_id;
      } else {
        formData.append('name', this.subjectForm.value.name);
        url = 'insert_subject';
      }
      this.httpClient.post('http://localhost/project/mekana/api/v1/'+url, formData).subscribe(
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
  selector: 'subject-delete-confirmation',
  templateUrl: 'subject-delete-confirmation.html',
})
export class SubjectDelete {
    loading = false;
    subject_id = 0;
    constructor(
    public dialogRef: MatDialogRef<SubjectDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.subject_id = this.data;
    }
}

  confirmDelete() {
      if (this.subject_id == null || this.subject_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/mekana/api/v1/delete_record/subject/subject_id='+this.subject_id).subscribe(
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