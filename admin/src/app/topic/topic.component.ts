import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-topic',
  templateUrl: './topic.component.html',
  styleUrls: ['./topic.component.css']
})
export class TopicComponent implements OnInit {
    topic = [];
    subject = [];
    selectedsubind = 0;
    constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }

    ngOnInit() {
        this.getsubject();
    }
    getsubject(): void {
    this.httpClient.get<any>('http://localhost/project/examhorse/api/v1/get_subject')
      .subscribe(
        (res) => {
          this.subject = res["result"]["data"];
        },
        (error) => {
          this._snackBar.open(error["statusText"], '', {
            duration: 2000,
          });
        }
      );
  }
    gettopic(ev): void {
        this.selectedsubind = ev.index;
        this.httpClient.get<any>('http://localhost/project/examhorse/api/v1/get_topic_by_subject/'+this.subject[ev.index].subject_id)
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
               if(parseInt(val.topic_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(TopicForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
                this.gettopic({index: this.selectedsubind});
            }
        });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(TopicDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.gettopic({index: this.selectedsubind});
       }
    });
    }
}

@Component({
  selector: 'topic-form',
  templateUrl: 'topic-form.html',
})
export class TopicForm {
    topicForm: FormGroup;
    loading = false;
    topic_id = 0;
    subject:any[];
    constructor(
    public dialogRef: MatDialogRef<TopicForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.topicForm = new FormGroup ({
            'subject_id': new FormControl('', Validators.required),
            'name': new FormControl('', Validators.required),
        });
        if(this.data != null) {
           this.topicForm.patchValue({
           name: this.data.name,
           subject_id: this.data.subject_id,
        });
            this.topic_id = this.data.topic_id;
        }
        this.httpClient.get('http://localhost/project/examhorse/api/v1/get_subject').subscribe(
            (res) => {
                if (res["result"]["error"] === false) {
                    this.subject = res["result"]["data"];
                } else {
                    this._snackBar.open(res["result"]["message"], '', {
                        duration: 2000,
                    });
                }
            },
            (error) => {
                this._snackBar.open(error["statusText"], '', {
                    duration: 2000,
                });
            });
    }

    onSubmit() {
      if (this.topicForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.topic_id != 0) {
        formData.append('name', this.topicForm.value.name);
        formData.append('subject_id', this.topicForm.value.subject_id);
        url = 'update_record/topic/topic_id = '+this.topic_id;
      } else {
        formData.append('name', this.topicForm.value.name);
        formData.append('subject_id', this.topicForm.value.subject_id);
        url = 'insert_topic';
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
  selector: 'topic-delete-confirmation',
  templateUrl: 'topic-delete-confirmation.html',
})
export class TopicDelete {
    loading = false;
    topic_id = 0;
    constructor(
    public dialogRef: MatDialogRef<TopicDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.topic_id = this.data;
    }
}

  confirmDelete() {
      if (this.topic_id == null || this.topic_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/examhorse/api/v1/delete_record/topic/topic_id='+this.topic_id).subscribe(
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
