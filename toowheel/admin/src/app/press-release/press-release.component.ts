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
  selector: 'app-press-release',
  templateUrl: './press-release.component.html',
  styleUrls: ['./press-release.component.css']
})
export class PressReleaseComponent implements OnInit {
    searchTermTW: string = '';
  searchTermFW: string = '';
  sortdata_tw: string = '';
  sortdata_fw: string = '';
    result = [];  
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getPressRelease();
  }
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    getPressRelease(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_press_release')
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
        openDialog(id, res): void  {
            var data = null;
      if(id != 0) {
      this[res].forEach(val=> {
           if(parseInt(val.press_release_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
        const dialogRef = this.dialog.open(PressReleaseForm, {
            minWidth: "80%",
            maxWidth: "80%",
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result !== false && result !== 'false') {
            this.getPressRelease();
             }
          });
    }

        openView(id, res): void  {
                    var data = null;
              if(id != 0) {
              this[res].forEach(val=> {
                   if(parseInt(val.press_release_id) === parseInt(id)) {
                        data = val;
                        return false;
                   }
                 });
              }
                const dialogRef = this.dialog.open(PressreleaseViewFrom, {
                    minWidth: "80%",
                    maxWidth: "80%",
                    data: data
                });

                dialogRef.afterClosed().subscribe(result => {

                  });
            }
    
      

    confirmDialog(id, action): void  {
    var data = null;
      if(id != 0) { 
        data = id;
      }
    const dialogRef = this.dialog.open(PictureViewPress, {
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
    const dialogRef = this.dialog.open(PressreleaseDelete, {
        minWidth: "40%",
        maxWidth: "40%",
        data: data
    });

   dialogRef.afterClosed().subscribe(result => {
       if(result !== false && result !== 'false') {
      this.getPressRelease();
       }
    });
    }  
    sortRecords(arr, sort): void {
        switch(sort) {
            case 'title_a_z':
                (this[arr]).sort((a,b) => a.title.localeCompare(b.title));
            break;
            case 'title_z_a':
            (this[arr]).sort((a,b) => b.title.localeCompare(a.title));
            break;
            case 'created_a_z':
                (this[arr]).sort((a,b) => a.press_release_date.localeCompare(b.press_release_date));
            break;
            case 'created_z_a':
                (this[arr]).sort((a,b) => b.press_release_date.localeCompare(a.press_release_date));
            break;
            default:
            break;
        }
    }
}

@Component({
  selector: 'press-release-form',
  templateUrl: 'press-release-form.html',
})
export class PressReleaseForm {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    pressreleaseForm: FormGroup;
    loading = false;
    press_release_id = 0;
    medias:any[];
    cover_image: string = 'Choose Cover Image';
    thumb_image: string = 'Choose Thumb Image';
    banner_image_1: string = 'Choose Image 1';
    banner_image_2: string = 'Choose Image 2';
    cover_image_path: string='';
    thumb_image_path: string='';
    banner_image_1_path: string='';
    banner_image_2_path: string='';
    constructor(
    public dialogRef: MatDialogRef<PressReleaseForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.pressreleaseForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'description_1': new FormControl('', Validators.required),
      'youtube_id': new FormControl()
        });
        if(this.data != null) {
           this.pressreleaseForm.patchValue({
           type: this.data.type,
           title: this.data.title,
           date: this.data.press_release_date,
           media: this.data.media_id,
           author_name: this.data.author_name,
           description: this.data.description_1,
           description_1: this.data.description_2,
           youtube_id: this.data.youtube_id
        });
        this.press_release_id = this.data.press_release_id;
        this.cover_image_path = this.data.cover_image;
        this.thumb_image_path = this.data.thumb_image;
        this.banner_image_1_path = this.data.banner_1;
        this.banner_image_2_path = this.data.banner_2;
    }else {
        this.pressreleaseForm.patchValue({
                date: new Date()
            });
    }
    this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_medias').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.medias = res["result"]["data"];
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
      if (this.pressreleaseForm.invalid) {
            return;
      }
      this.loading = true;
      var formData = new FormData();
      var url = '';
          if(this.press_release_id != 0) {
        formData.append('type', this.pressreleaseForm.value.type);
          if(this.cover_image_path && this.cover_image_path != '') {
          formData.append('cover_image', this.cover_image_path);
          }
          formData.append('title', this.pressreleaseForm.value.title);
          formData.append('media_id', this.pressreleaseForm.value.media);
          formData.append('author_name', this.pressreleaseForm.value.author_name);
          formData.append('press_release_date', moment(this.pressreleaseForm.value.date).format('YYYY-MM-DD'));
          if(this.thumb_image_path && this.thumb_image_path != '') {
          formData.append('thumb_image', this.thumb_image_path);
          }
          if(this.banner_image_1_path && this.banner_image_1_path != '') {
              formData.append('banner_1', this.banner_image_1_path);
          }
          if(this.banner_image_2_path && this.banner_image_2_path != '') {
               formData.append('banner_2', this.banner_image_2_path); 
          }
          formData.append('description_1', this.pressreleaseForm.value.description);
          formData.append('description_2', this.pressreleaseForm.value.description_1);
          formData.append('youtube_id', this.pressreleaseForm.value.youtube_id);
        url = 'update_record/press_release/press_release_id = '+this.press_release_id;
      } else {
        formData.append('type', this.pressreleaseForm.value.type);
          formData.append('cover_image', this.cover_image_path);
          formData.append('title', this.pressreleaseForm.value.title);
          formData.append('media_id', this.pressreleaseForm.value.media);
          formData.append('author_name', this.pressreleaseForm.value.author_name);
          formData.append('date', moment(this.pressreleaseForm.value.date).format('YYYY-MM-DD'));
          formData.append('thumb_image', this.thumb_image_path);
          formData.append('banner_image_1', this.banner_image_1_path);
          formData.append('banner_image_2', this.banner_image_2_path);
          formData.append('description', this.pressreleaseForm.value.description);
          formData.append('description_1', this.pressreleaseForm.value.description_1);
          formData.append('youtube_id', this.pressreleaseForm.value.youtube_id);
        url = 'insert_press_release';
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
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
        });
            }
            );
  }
removeMedia(url) {
      this[url] = '';
      if(url === 'cover_image_path') {
          this.cover_image= 'Choose Cover Image';
      }
      if(url === 'thumb_image_path') {
          this.thumb_image= 'Choose Thumb Image';
      }
      if(url === 'banner_image_1_path') {
          this.banner_image_1= 'Choose Image 1';
      }
      if(url === 'banner_image_2_path') {
          this.banner_image_2= 'Choose Image 2';
      }
  }
}


@Component({
  selector: 'press-release-delete-confirmation',
  templateUrl: 'press-release-delete-confirmation.html',
})
export class PressreleaseDelete {
    loading = false;
    press_release_id = 0;
    constructor(
    public dialogRef: MatDialogRef<PressreleaseDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.press_release_id = this.data;
    }
}

  confirmDelete() {
      if (this.press_release_id == null || this.press_release_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/delete_record/press_release/press_release_id='+this.press_release_id).subscribe(
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
 
  export class PictureViewPress {
    image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    action: string = '';
    loading = false;
    member_id = 0;
    data: any;
    constructor(
    public dialogRef: MatDialogRef<PictureViewPress>,
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
  selector: 'pressrelease-view-form',
  templateUrl: 'pressrelease-view-form.html',
})
export class PressreleaseViewFrom {
image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
    pressreleaseForm: FormGroup;
    loading = false;
    press_release_id = 0;
    medias:any[];
    cover_image: string = 'Choose Cover Image';
    thumb_image: string = 'Choose Thumb Image';
    banner_image_1: string = 'Choose Image 1';
    banner_image_2: string = 'Choose Image 2';
    cover_image_path: string='';
    thumb_image_path: string='';
    banner_image_1_path: string='';
    banner_image_2_path: string='';
    constructor(
    public dialogRef: MatDialogRef<PressreleaseViewFrom>,
    private sanitizer: DomSanitizer,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.pressreleaseForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'title': new FormControl('', Validators.required),
      'date': new FormControl('', Validators.required),
      'media': new FormControl('', Validators.required),
      'author_name': new FormControl('', Validators.required),
      'description': new FormControl('', Validators.required),
      'description_1': new FormControl('', Validators.required),
      'youtube_id': new FormControl()
        });
        if(this.data != null) {
           this.pressreleaseForm.patchValue({
           type: this.data.type,
           title: this.data.title,
           date: this.data.press_release_date,
           media: this.data.media_id,
           author_name: this.data.author_name,
           description: this.data.description_1,
           description_1: this.data.description_2,
           youtube_id: this.data.youtube_id
        });
        this.press_release_id = this.data.press_release_id;
        this.cover_image_path = this.data.cover_image;
        this.thumb_image_path = this.data.thumb_image;
        this.banner_image_1_path = this.data.banner_1;
        this.banner_image_2_path = this.data.banner_2;
    }else {
        this.pressreleaseForm.patchValue({
                date: new Date()
            });
    }
    this.httpClient.get('https://www.toowheel.com/beta/toowheel/api/v1/get_medias').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.medias = res["result"]["data"];
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
getYoutubeLink(yid) {
return this.sanitizer.bypassSecurityTrustResourceUrl('https://www.youtube.com/embed/'+yid);
}
}
   