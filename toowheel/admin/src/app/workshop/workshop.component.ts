import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-workshop',
  templateUrl: './workshop.component.html',
  styleUrls: ['./workshop.component.css']
})
export class WorkshopComponent implements OnInit {

  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {

  }
    image_url: string = '../toowheel/api/v1/';
    openWorkshopForm()  {
    const dialogRef = this.dialog.open(WorkshopForm, {
        minWidth: "80%",
        maxWidth: "80%"
    });

    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
       }
    });
}

}

@Component({
  selector: 'workshop-form',
  templateUrl: 'workshop-form.html',
})
export class WorkshopForm {
    workshopForm: FormGroup;
    loading = false;
    workshop_image_path: string = 'Choose Photo';
    constructor(
    public dialogRef: MatDialogRef<WorkshopForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
       this.workshopForm = new FormGroup({
            'name': new FormControl('', Validators.required),
            'type': new FormControl('', Validators.required),
            'mobile': new FormControl('', Validators.required),
            'email': new FormControl('', Validators.required),
            'incharge': new FormControl('', Validators.required),
            'description': new FormControl('', Validators.required)
        });
    }

    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('../toowheel/api/v1/upload_file', formData).subscribe(
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

    onSubmit() {
      if (this.workshopForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
        if(this.workshop_id != 0) {
          formData.append('name', this.workshopForm.value.name);
          formData.append('type', this.workshopForm.value.type);
          formData.append('mobile', this.workshopForm.value.mobile);
          formData.append('email', this.workshopForm.value.email);
          formData.append('incharge', this.workshopForm.value.incharge);
          if(this.workshop_image_path && this.workshop_image_path != '') {
              formData.append('image_path', this.workshop_image_path);
          }
        url = 'update_record/workshop/workshop_id = '+this.workshop_id;
      } else {
        formData.append('name', this.workshopForm.value.name);
          formData.append('type', this.workshopForm.value.type);
          formData.append('mobile', this.workshopForm.value.mobile);
          formData.append('email', this.workshopForm.value.email);
          formData.append('incharge', this.workshopForm.value.incharge);
          formData.append('image_path', this.workshop_image_path);
        url = 'insert_workshop';
      }
      this.httpClient.post('../toowheel/api/v1/'+url, formData).subscribe(
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