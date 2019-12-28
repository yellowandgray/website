import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatDialogModule} from '@angular/material/dialog';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-sub-topic',
  templateUrl: './sub-topic.component.html',
  styleUrls: ['./sub-topic.component.css']
})
export class SubTopicComponent implements OnInit {

  constructor(public dialog: MatDialog, private httpClient: HttpClient, private _snackBar: MatSnackBar) { }
    sub_topic = [];
  ngOnInit() {
        this.getsubtopic();
  }
    getsubtopic(): void {
        this.httpClient.get<any>('http://localhost/project/mekana_new/api/v1/get_sub_topic')
        .subscribe(
                (res)=>{
                    this.sub_topic = res["result"]["data"];
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
               if(parseInt(val.sub_topic_id) === parseInt(id)) {
                    data = val;
                    return false;
                }
            });
        }
        const dialogRef = this.dialog.open(SubTopicForm, {
          minWidth: "40%",
          maxWidth: "40%",
          data: data
        });

        dialogRef.afterClosed().subscribe(result => {
          if(result !== false && result !== 'false') {
                this.getsubtopic();
            }
        });
    }
    
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
    const dialogRef = this.dialog.open(SubTopicDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });
   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
          this.getsubtopic();
       }
    });
    }
}


@Component({
  selector: 'sub-topic-form',
  templateUrl: 'sub-topic-form.html',
})
export class SubTopicForm {
    subtopicForm: FormGroup;
    loading = false;
    sub_topic_id = 0;
    topic:any[];
    constructor(
    public dialogRef: MatDialogRef<SubTopicForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.subtopicForm = new FormGroup ({
            'topic_id': new FormControl('', Validators.required),
            'name': new FormControl('', Validators.required)
        });
        if(this.data != null) {
           this.subtopicForm.patchValue({
           name: this.data.name,
           topic_id: this.data.topic_id,
        });
            this.sub_topic_id = this.data.sub_topic_id;
        }
        this.httpClient.get('http://localhost/project/mekana_new/api/v1/get_topic').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.topic = res["result"]["data"];
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
        });
    }

    onSubmit() {
      if (this.subtopicForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.sub_topic_id != 0) {
        formData.append('name', this.subtopicForm.value.name);
        formData.append('topic_id', this.subtopicForm.value.topic_id);
        url = 'update_record/sub_topic/sub_topic_id = '+this.sub_topic_id;
      } else {
        formData.append('name', this.subtopicForm.value.name);
        formData.append('topic_id', this.subtopicForm.value.topic_id);
        url = 'insert_sub_topic';
      }
      this.httpClient.post('http://localhost/project/mekana_new/api/v1/'+url, formData).subscribe(
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
  selector: 'sub-topic-delete-confirmation',
  templateUrl: 'sub-topic-delete-confirmation.html',
})
export class SubTopicDelete {
    loading = false;
    sub_topic_id = 0;
    constructor(
    public dialogRef: MatDialogRef<SubTopicDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
    if(this.data != null) { 
        this.sub_topic_id = this.data;
    }
}

  confirmDelete() {
      if (this.sub_topic_id == null || this.sub_topic_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('http://localhost/project/mekana_new/api/v1/delete_record/sub_topic/sub_topic_id='+this.sub_topic_id).subscribe(
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