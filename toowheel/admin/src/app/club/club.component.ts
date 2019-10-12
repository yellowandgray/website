import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-club',
  templateUrl: './club.component.html',
  styleUrls: ['./club.component.css']
})
export class ClubComponent implements OnInit {
  result:any[];
  result_four_wheel:any[];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }
  ngOnInit() {
      this.getClub();
      this.getFourWheelClub();
  }
    image_url: string = '../toowheel/api/v1/';
    getClub(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_two_wheel_club')
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
    getFourWheelClub(): void {
  this.httpClient.get<any>('../toowheel/api/v1/get_four_wheel_club')
  .subscribe(
          (res)=>{
              this.result_four_wheel = res["result"]["data"];
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
           if(parseInt(val.club_id) === parseInt(id)) {
                data = val;
                return false;
           }
         });
      }
    const dialogRef = this.dialog.open(ClubForm, {
        minWidth: "80%",
        maxWidth: "80%",
        data: data
    });
    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getClub();
      this.getFourWheelClub();
       }
    });
    }
    confirmDelete(id): void  {
        var data = null;
          if(id != 0) { 
                    data = id;
          }
        const dialogRef = this.dialog.open(ClubDelete, {
            minWidth: "40%",
            maxWidth: "40%",
            data: data
        });

       dialogRef.afterClosed().subscribe(result => {
           if(result !== false && result !== 'false') {
          this.getClub();
          this.getFourWheelClub();
           }
        });
    }


    openGalleryDialog(id): void  {
        const dialogRef = this.dialog.open(ClubPhotosForm, {
            minWidth: "80%",
            maxWidth: "80%",
            data: {
            club_id: id
        }
        });

        dialogRef.afterClosed().subscribe(result => {
            console.log('Closed');
        });
    }
    
    changeStatus(id, status): void {
      var formData = new FormData();
      formData.append('published', status);
      this.httpClient.post<any>('../toowheel/api/v1/update_record/club/club_id = '+id, formData)
  .subscribe(
          (res)=>{
              this.getClub();
          this.getFourWheelClub();
        },
        (error)=>{
            this._snackBar.open(error["statusText"], '', {
      duration: 2000,
    });
        }
        );
  }
}
@Component({
  selector: 'club-form',
  templateUrl: 'club-form.html',
})
export class ClubForm {
    clubForm: FormGroup;
    loading = false;
    club_id = 0;
    categories:any[];
    states:any[];
    cities:any[];
    file_cover_name: string = 'Cover Image';
    file_logo_name: string = 'Club Logo';
    club_video_name: string = 'Club Video';
    cover_image: string;
    logo_image: string;
    club_video: string;
    constructor(
    public dialogRef: MatDialogRef<ClubForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.clubForm = new FormGroup({
            'name': new FormControl(),
            'type': new FormControl(),
            'category_id': new FormControl(),
            'state': new FormControl(),
            'city': new FormControl(),
            'zip': new FormControl(),
            'landmark': new FormControl(),
            'address': new FormControl(),
            'club_leader_name': new FormControl(),
            'no_of_member': new FormControl(),
            'email': new FormControl(),
            'mobile': new FormControl(),
            'about': new FormControl(),
            'facebook_link': new FormControl(),
            'youtube_link': new FormControl(),
            'twitter_link': new FormControl(),
            'instagram_link': new FormControl(),
            'rank': new FormControl()
        });
        if(this.data != null) {
                this.clubForm.patchValue({
           name: this.data.name,
           type: this.data.type,
           category_id: this.data.category_id,
           state: this.data.state_id,
           city: this.data.city,
           zip: this.data.zipcode,
           landmark: this.data.landmark,
           address: this.data.address,
           club_leader_name: this.data.leader_name,
           no_of_member: this.data.no_of_member,
           email: this.data.email,
           mobile: this.data.phone,
           about: this.data.about,
           facebook_link: this.data.facebook_link,
           youtube_link: this.data.youtube_link,
           twitter_link: this.data.twitter_link,
           instagram_link: this.data.instagram_link,
           rank: this.data.rank
        });
        this.club_id = this.data.club_id;
        this.getCategory();
        }
        this.httpClient.get('../toowheel/api/v1/get_states').subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.states = res["result"]["data"];
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
    fileProgress(fileInput: any, name:string, path:string) {
        var fileData = <File>fileInput.target.files[0];
        this[name] = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('../toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this[path] = res["result"]["data"];
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
    getCategory(): void {
       this.loading = true;
          this.httpClient.get('../toowheel/api/v1/get_'+this.clubForm.value.type+'_category').subscribe(
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
    getCityByState(): void {
       this.loading = true;
          this.httpClient.get('../toowheel/api/v1/get_city_by_state/'+this.clubForm.value.state).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.cities = res["result"]["data"];
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
        if (this.clubForm.invalid) {
                  return;
        }
        this.loading = true;
        var url = '';
        var formData = new FormData();
      if(this.club_id != 0) {
        formData.append('name', this.clubForm.value.name);
          formData.append('type', this.clubForm.value.type);
          if(this.cover_image && this.cover_image!= '') {
              formData.append('cover_image', this.cover_image);
          }
          if(this.logo_image && this.logo_image!= '') {
              formData.append('logo', this.logo_image);
          }
          if(this.club_video && this.club_video!= '') {
              formData.append('club_video', this.club_video);
          }
          formData.append('category_id', this.clubForm.value.category_id);
          formData.append('state_id', this.clubForm.value.state);
          formData.append('city', this.clubForm.value.city);
          formData.append('zipcode', this.clubForm.value.zip);
          formData.append('landmark', this.clubForm.value.landmark);
          formData.append('address', this.clubForm.value.address);
          formData.append('leader_name', this.clubForm.value.club_leader_name);
          formData.append('no_of_member', this.clubForm.value.no_of_member);
          formData.append('email', this.clubForm.value.email);
          formData.append('phone', this.clubForm.value.mobile);
          formData.append('about', this.clubForm.value.about);
          formData.append('facebook_link', this.clubForm.value.facebook_link);
          formData.append('youtube_link', this.clubForm.value.youtube_link);
          formData.append('twitter_link', this.clubForm.value.twitter_link);
          formData.append('instagram_link', this.clubForm.value.instagram_link);
          formData.append('rank', this.clubForm.value.rank);
        url = 'update_record/club/club_id = '+this.club_id;
      } else {
        formData.append('name', this.clubForm.value.name);
          formData.append('type', this.clubForm.value.type);
          formData.append('cover_image', this.cover_image);
          formData.append('logo', this.logo_image);
          formData.append('category_id', this.clubForm.value.category_id);
          formData.append('state', this.clubForm.value.state);
          formData.append('city', this.clubForm.value.city);
          formData.append('zip', this.clubForm.value.zip);
          formData.append('landmark', this.clubForm.value.landmark);
          formData.append('address', this.clubForm.value.address);
          formData.append('club_leader_name', this.clubForm.value.club_leader_name);
          formData.append('no_of_member', this.clubForm.value.no_of_member);
          formData.append('email', this.clubForm.value.email);
          formData.append('mobile', this.clubForm.value.mobile);
          formData.append('about', this.clubForm.value.about);
          formData.append('facebook_link', this.clubForm.value.facebook_link);
          formData.append('youtube_link', this.clubForm.value.youtube_link);
          formData.append('twitter_link', this.clubForm.value.twitter_link);
          formData.append('instagram_link', this.clubForm.value.instagram_link);
          formData.append('rank', this.clubForm.value.rank);
          formData.append('published', '1');
          formData.append('source', 'admin');
          formData.append('club_video', this.club_video);
        url = 'insert_club';
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


@Component({
  selector: 'club-delete-confirmation',
  templateUrl: 'club-delete-confirmation.html',
})
export class ClubDelete {
    loading = false;
    club_id = 0;
    constructor(
    public dialogRef: MatDialogRef<ClubDelete>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        if(this.data != null) { 
            this.club_id = this.data;
    }
}

  confirmDelete() {
      if (this.club_id == null || this.club_id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../toowheel/api/v1/delete_record/club/club_id='+this.club_id).subscribe(
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
  selector: 'club-gallery-form',
  templateUrl: 'club-gallery-form.html',
})
export class ClubPhotosForm {
  loading = false;
    club_id:any;
    result:any[];
    image_url: string = '../toowheel/api/v1/';  
  constructor(
    public dialogRef: MatDialogRef<ClubPhotosForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.club_id = this.data.club_id;
    }

  ngOnInit() {
      this.getImages();
    }
    getImages(){
        this.httpClient.get('../toowheel/api/v1/get_club_gallery_by_club/'+this.club_id).subscribe(
              (res)=>{
                if(res["result"]["error"] === false) {
                    this.result = res["result"]["data"];
                }else{
    this._snackBar.open(res["result"]["message"], '', {
          duration: 2000,
        });
        this.result = [];
                }
            },
            (error)=>{
                this._snackBar.open(error["statusText"], '', {
          duration: 2000,
            });
        });
    }

  submitPhotos(fileInput: any) {
      if (!fileInput.target.files[0]) {
            return;
      }
      for(var i = 0; i < (fileInput.target.files).length; i++) {
          this.loading = true;
      var formData = new FormData();
          formData.append('club_id', this.club_id);
          formData.append('file', <File>fileInput.target.files[i]);
      this.httpClient.post('../toowheel/api/v1/insert_club_gallery', formData).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    if(i == (((fileInput.target.files).length) - 1)){
                    this.getImages();
                    }
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
  
  deleteGallery(id) {
      if (id == null || id == 0) {
            return;
      }
      this.loading = true;
      this.httpClient.get('../toowheel/api/v1/delete_record/club_gallery/club_gallery_id='+id).subscribe(
          (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.getImages();
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