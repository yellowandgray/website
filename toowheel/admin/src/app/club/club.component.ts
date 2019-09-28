import { Component, OnInit, Inject } from '@angular/core';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

export interface DialogData {
  animal: string;
  name: string;
}

@Component({
  selector: 'app-club',
  templateUrl: './club.component.html',
  styleUrls: ['./club.component.css']
})
export class ClubComponent implements OnInit {
  result:any[];
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getClub();
  }
    image_url: string = 'http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/';
    getClub(): void {
  this.httpClient.get<any>('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/get_club')
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
  openDialog(): void  {
    const dialogRef = this.dialog.open(ClubForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
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
    image: string;
    file_name: string = 'Select Picture';
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
    }

    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://ec2-13-233-145-114.ap-south-1.compute.amazonaws.com/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.image = res["result"]["data"];
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
        if (this.clubForm.invalid || this.image === '') {
                  return;
        }
        this.loading = true;
        var formData = new FormData();
          formData.append('name', this.clubForm.value.title);
          formData.append('type', this.clubForm.value.type);
          formData.append('cover_image', this.image);
          formData.append('logo', this.image);
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