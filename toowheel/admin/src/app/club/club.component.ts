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
    image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
    getClub(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_two_wheel_club')
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
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_four_wheel_club')
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
  openDialog(): void  {
    const dialogRef = this.dialog.open(ClubForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });
    dialogRef.afterClosed().subscribe(result => {
      if(result !== false && result !== 'false') {
      this.getClub();
      this.getFourWheelClub();
       }
    });
}
}
@Component({
  selector: 'club-form',
  templateUrl: 'club-form.html',
})
export class ClubForm {
    clubForm: FormGroup;
    loading = false;
    club_id: string;
    categories:any[];
    states:any[];
    cities:any[];
    file_cover_name: string = 'Choose Cover Image';
    file_logo_name: string = 'Choose Club Logo';
    cover_image: string;
    logo_image: string;
    constructor(
    public dialogRef: MatDialogRef<ClubForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        this.clubForm = new FormGroup({
            'name': new FormControl('', Validators.required),
            'type': new FormControl('', Validators.required),
            'category_id': new FormControl('', Validators.required),
            'state': new FormControl('', Validators.required),
            'city': new FormControl('', Validators.required),
            'zip': new FormControl('', Validators.required),
            'landmark': new FormControl('', Validators.required),
            'address': new FormControl('', Validators.required),
            'club_leader_name': new FormControl('', Validators.required),
            'no_of_member': new FormControl('', Validators.required),
            'email': new FormControl('', Validators.required),
            'mobile': new FormControl('', Validators.required),
            'about': new FormControl('', Validators.required)
        });
        this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_states').subscribe(
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
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
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
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_'+this.clubForm.value.type+'_category').subscribe(
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
          this.httpClient.get('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_city_by_state/'+this.clubForm.value.state).subscribe(
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
        var formData = new FormData();
          formData.append('name', this.clubForm.value.title);
          formData.append('type', this.clubForm.value.type);
          formData.append('cover_image', this.cover_image);
          formData.append('logo', this.logo_image);
          formData.append('category_id', this.clubForm.value.url);
          formData.append('state', this.clubForm.value.name);
          formData.append('city', this.clubForm.value.name);
          formData.append('zip', this.clubForm.value.name);
          formData.append('landmark', this.clubForm.value.name);
          formData.append('address', this.clubForm.value.name);
          formData.append('club_leader_name', this.clubForm.value.name);
          formData.append('no_of_member', this.clubForm.value.name);
          formData.append('club_leader_name', this.clubForm.value.name);
          formData.append('email', this.clubForm.value.name);
          formData.append('mobile', this.clubForm.value.name);
          formData.append('about', this.clubForm.value.name);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/insert_club', formData).subscribe(
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