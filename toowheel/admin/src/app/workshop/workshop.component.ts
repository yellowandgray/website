import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import * as moment from 'moment';

@Component({
  selector: 'app-workshop',
  templateUrl: './workshop.component.html',
  styleUrls: ['./workshop.component.css']
})
export class WorkshopComponent implements OnInit {
 searchTerm: string = '';
    sortdata: string = '';
  result = [];
  result_fw = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getWorkshop();
    this.getFourWheelWorkshop();
  }
  getWorkshop(): void {
  this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_two_wheel_workshop')
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
  getFourWheelWorkshop(): void {
  this.httpClient.get<any>('https://www.toowheel.com/toowheel/api/v1/get_four_wheel_workshop')
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
    image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
    openDialog(id, res) {
        var data = null;
      if(id != 0) { 
      this[res].forEach(val=> {
           if(parseInt(val.workshop_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(WorkshopForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
          this.getWorkshop();
          this.getFourWheelWorkshop();
       }
    });
}

confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureViewWorkshop, {
        minWidth: "40%",
        maxWidth: "40%",
        data: {
            data: data,
            action: action
        }
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      //this.getMember();
      //this.getFourWheelMember();
       }
    });
}


confirmDelete(id): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(WorkshopDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getWorkshop();
          this.getFourWheelWorkshop();
       }
    });
}
sortRecords(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result).sort((a,b) => a.name.localeCompare(b.name));
            break;
            case 'title_z_a':
            (this.result).sort((a,b) => b.name.localeCompare(a.name));
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
                (this.result_fw).sort((a,b) => a.name.localeCompare(b.name));
            break;
            case 'title_z_a':
            (this.result_fw).sort((a,b) => b.name.localeCompare(a.name));
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

    openView(): void  {
        const dialogRef = this.dialog.open(WorkshopViewFrom, {
            minWidth: "40%",
            maxWidth: "40%"
        });

       dialogRef.afterClosed().subscribe(result => {
            console.log(`Dialog result: ${result}`);
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
    workshop_id = 0;
    workshop_image_path: string = 'Choose Photo';
    image_path: string = '';
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
            'description': new FormControl('')
        });
        if(this.data != null) { 
            this.workshopForm.patchValue({ 
                name: this.data.name,
                type: this.data.type,
                mobile: this.data.mobile,
                email: this.data.email,
                incharge: this.data.incharge,
                description: this.data.description
        })
        this.workshop_id = this.data.workshop_id;
    }
    }

        editorConfig: AngularEditorConfig = {
    editable: true,
      spellcheck: true,
      height: '600px',
      minHeight: '600px',
      maxHeight: '600px',
      width: 'auto',
      minWidth: '0',
      translate: 'yes',
      enableToolbar: true,
      showToolbar: true,
      placeholder: 'Enter text here...',
      defaultParagraphSeparator: '',
      defaultFontName: '',
      defaultFontSize: '',
      fonts: [
        {class: 'arial', name: 'Arial'},
        {class: 'times-new-roman', name: 'Times New Roman'},
        {class: 'calibri', name: 'Calibri'},
        {class: 'comic-sans-ms', name: 'Comic Sans MS'}
      ],
      customClasses: [
      {
        name: 'quote',
        class: 'quote',
      },
      {
        name: 'redText',
        class: 'redText'
      },
      {
        name: 'titleText',
        class: 'titleText',
        tag: 'h1',
      },
    ],
    uploadUrl: 'v1/image',
    sanitize: true,
    toolbarPosition: 'top',
};
        
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
          formData.append('description', this.workshopForm.value.description);
          if(this.image_path && this.image_path != '') {
              formData.append('image_path', this.image_path);
          }
        url = 'update_record/workshop/workshop_id = '+this.workshop_id;
      } else {
        formData.append('name', this.workshopForm.value.name);
          formData.append('type', this.workshopForm.value.type);
          formData.append('mobile', this.workshopForm.value.mobile);
          formData.append('email', this.workshopForm.value.email);
          formData.append('incharge', this.workshopForm.value.incharge);
          formData.append('description', this.workshopForm.value.description);
          formData.append('image_path', this.image_path);
        url = 'insert_workshop';
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
  selector: 'workshop-delete-confirmation',
  templateUrl: 'workshop-delete-confirmation.html',
})
export class WorkshopDelete {
    loading = false;
    workshop_id = 0;
    constructor(
    public dialogRef: MatDialogRef<WorkshopDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.workshop_id = this.data;
    }
}

  confirmDelete() {
      if (this.workshop_id == null || this.workshop_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/toowheel/api/v1/delete_record/workshop/workshop_id='+this.workshop_id).subscribe(
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
  selector: 'picture-view',
  templateUrl: 'picture-view.html',
})
 
export class PictureViewWorkshop {
    image_url: string = 'https://www.toowheel.com/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureViewWorkshop>,
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
        }

  @Component({
  selector: 'workshop-view-form',
  templateUrl: 'workshop-view-form.html',
})
 
export class WorkshopViewFrom {
    constructor(
    public dialogRef: MatDialogRef<WorkshopViewFrom>,
    @Inject(MAT_DIALOG_DATA) public datapopup: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {}
    
    onNoClick(): void {
        this.dialogRef.close();
    }
}  
