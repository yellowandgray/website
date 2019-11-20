import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-task',
  templateUrl: './task.component.html',
  styleUrls: ['./task.component.css']
})
export class TaskComponent implements OnInit {
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getTask();
  }
    getTask(): void {
    this.httpClient.get<any>('https://localhost/project/thirukkural/api/v1/get_task')
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

    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
            data = id;
          }
        const dialogRef = this.dialog.open(TaskDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                 this.getTask();
           }
        });
    }
}


@Component({
  selector: 'task-delete-confirmation',
  templateUrl: 'task-delete-confirmation.html',
})
export class TaskDelete {
    loading = false;
    task_id = 0;
    constructor(
    public dialogRef: MatDialogRef<TaskDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.task_id = this.data;
    }
}

  confirmDelete() {
      if (this.task_id == null || this.task_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://localhost/project/thirukkural/api/v1/delete_record/task/task_id='+this.task_id).subscribe(
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