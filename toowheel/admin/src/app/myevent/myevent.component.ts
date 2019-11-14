import { Component, OnInit, Inject } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { AngularEditorConfig } from '@kolkov/angular-editor';
import * as moment from 'moment';

@Component({
  selector: 'app-myevent',
  templateUrl: './myevent.component.html',
  styleUrls: ['./myevent.component.css']
})
export class MyeventComponent implements OnInit {
  searchTerm: string = '';
  sortdata: string = '';
  result = [];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getEvent();
  }
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  getEvent(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_event_by_club/' + sessionStorage.getItem("toowheel_club_id"))
     .subscribe(
             (res)=>{
                 if(res["result"]["error"] == false) {
                 this.result = res["result"]["data"];
                 }else {
                     this.result = [];
                 }
           },
           (error)=>{
               this._snackBar.open(error["statusText"], '', {
         duration: 2000,
       });
           }
           );
     }
     openDialog(id): void  {
        var data = null;
        if(id != 0) {
        this.result.forEach(val=> {
           if(parseInt(val.event_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
        }
        const dialogRef = this.dialog.open(MyEventForm, {
            minWidth: "80%",
            maxWidth: "80%",
            data: data
        });
        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
                this.getEvent();
            }
        });
    }
 confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureViewMyEvent, {
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
    openView(id): void  {
        var data = null;
        if(id != 0) {
        this.result.forEach(val=> {
           if(parseInt(val.event_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
        }
        const dialogRef = this.dialog.open(MyEventViewFrom, {
            minWidth: "80%",
            maxWidth: "80%",
            data: data,
            autoFocus: false
        });
        dialogRef.afterClosed().subscribe(result => {
            
        });
    }
        confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
                    data = id;
          }
        const dialogRef = this.dialog.open(MyEventDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
                 this.getEvent();
           }
        });
    }
sortRecords(): void {
        switch(this.sortdata) {
            case 'title_a_z':
                (this.result).sort((a,b) => a.title.localeCompare(b.title));
            break;
            case 'title_z_a':
            (this.result).sort((a,b) => b.title.localeCompare(a.title));
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
}
@Component({
  selector: 'myevent-form',
  templateUrl: 'myevent-form.html',
})
export class MyEventForm {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    clubeventForm: FormGroup;
    loading = false;
    event_id = 0;
    categories:any[];
    clubs:any[];
    cover_image: string = 'Choose Event Picture';
    thumb_image: string = 'Choose Thumb Image';
    cover_image_path: string='';
    thumb_image_path: string='';
    constructor(
    public dialogRef: MatDialogRef<MyEventForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.clubeventForm = new FormGroup({
      'type': new FormControl(''),
      'category_id': new FormControl(''),
      'club_id': new FormControl(''),
      'title': new FormControl('', Validators.required),
      'event_from_date': new FormControl('', Validators.required),
      'event_to_date': new FormControl('', Validators.required),
      'location': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'sponsor': new FormControl()
        });
        if(this.data != null) {
           this.clubeventForm.patchValue({
           type: this.data.type,
           category_id: this.data.category_id,
           club_id: this.data.club_id,
           title: this.data.title,
           event_from_date: this.data.event_from_date,
           event_to_date: this.data.event_to_date,
           location: this.data.location,
           description: this.data.description,
           sponsor: this.data.sponsor
        });
        this.event_id = this.data.event_id;
        this.cover_image_path = this.data.cover_image;
        this.thumb_image_path= this.data.thumb_image;
        this.getCategory();
        this.getClub();
        } else {
            this.clubeventForm.patchValue({
                event_date: new Date()
            });
        }
    }
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_'+this.clubeventForm.value.type+'_category').subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.categories = res["result"]["data"];
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
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_club_by_category/'+this.clubeventForm.value.category_id).subscribe(
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
    fileProgress(fileInput: any, name:string, field: string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/upload_file', formData).subscribe(
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
          if (this.clubeventForm.invalid) {
                return;
          }
          this.loading = true;
          var formData = new FormData();
          var url = '';
          if(this.event_id != 0) {
formData.append('type', this.clubeventForm.value.type);
          formData.append('category_id', this.clubeventForm.value.category_id);
          formData.append('club_id', this.clubeventForm.value.club_id);
          if(this.cover_image_path && this.cover_image_path != '') {
          formData.append('cover_image', this.cover_image_path);
          }
          if(this.thumb_image_path && this.thumb_image_path != '') {
          formData.append('thumb_image', this.thumb_image_path);
          }
          formData.append('title', this.clubeventForm.value.title);
          formData.append('event_from_date', moment(this.clubeventForm.value.event_from_date).format('YYYY-MM-DD'));
          formData.append('event_to_date', moment(this.clubeventForm.value.event_to_date).format('YYYY-MM-DD'));
          formData.append('location', this.clubeventForm.value.location);
          formData.append('description', this.clubeventForm.value.description);
          formData.append('sponsor', this.clubeventForm.value.sponsor);
          url = 'update_record/event/event_id = '+this.event_id;
          }else {
formData.append('type', sessionStorage.getItem("toowheel_type"));
          formData.append('category_id', sessionStorage.getItem("toowheel_category_id"));
          formData.append('club_id', sessionStorage.getItem("toowheel_club_id"));
          formData.append('cover_image', this.cover_image_path);
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('title', this.clubeventForm.value.title);
          formData.append('event_from_date', moment(this.clubeventForm.value.event_from_date).format('YYYY-MM-DD'));
          formData.append('event_to_date', moment(this.clubeventForm.value.event_to_date).format('YYYY-MM-DD'));
          formData.append('location', this.clubeventForm.value.location);
          formData.append('description', this.clubeventForm.value.description);
          formData.append('sponsor', '');
          url = 'insert_event';
          }
          this.httpClient.post('https://www.toowheel.com/beta/toowheel/api/v1/'+url, formData).subscribe(
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
                this._snackBar.open(error.statusText, '', {
          duration: 2000,
        });
            }
            );
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

 removeMedia(url) {
      this[url] = '';
      if(url === 'cover_image_path') {
          this.cover_image= 'Choose Event Picture';
      }
      if(url === 'thumb_image_path') {
          this.thumb_image= 'Choose Thumb Image';
      }
      
  }
}


@Component({
  selector: 'myevent-delete-confirmation',
  templateUrl: 'myevent-delete-confirmation.html',
})
export class MyEventDelete {
    loading = false;
    event_id = 0;
    constructor(
    public dialogRef: MatDialogRef<MyEventDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.event_id = this.data;
    }
}

  confirmDelete() {
      if (this.event_id == null || this.event_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/event/event_id='+this.event_id).subscribe(
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
 
export class PictureViewMyEvent {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureViewMyEvent>,
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
  selector: 'myevent-view-form',
  templateUrl: 'myevent-view-form.html',
})
export class MyEventViewFrom {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    clubeventForm: FormGroup;
    loading = false;
    event_id = 0;
    categories:any[];
    clubs:any[];
    cover_image: string = 'Choose Event Picture';
    thumb_image: string = 'Choose Thumb Image';
    cover_image_path: string;
    thumb_image_path: string;
    constructor(
    public dialogRef: MatDialogRef<MyEventViewFrom>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.clubeventForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'club_id': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'event_date': new FormControl('', Validators.required),
      'location': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'sponsor': new FormControl()
        });
        if(this.data != null) {
                this.clubeventForm.patchValue({
           type: this.data.type,
           category_id: this.data.category_id,
           club_id: this.data.club_id,
           title: this.data.title,
           event_date: this.data.event_date,
           location: this.data.location,
           description: this.data.description,
           sponsor: this.data.sponsor
        });
        this.event_id = this.data.event_id;     
        this.cover_image_path = this.data.cover_image;
        this.thumb_image_path= this.data.thumb_image;  
        this.getCategory();
        this.getClub();
        } else {
            this.clubeventForm.patchValue({
                event_date: new Date()
            });
        }
    }
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_'+this.clubeventForm.value.type+'_category').subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.categories = res["result"]["data"];
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
          this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_club_by_category/'+this.clubeventForm.value.category_id).subscribe(
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
}