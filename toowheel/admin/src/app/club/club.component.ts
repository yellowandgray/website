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
  result = [];
    constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getClub();
  }
  image_url: string = 'http://localhost/twowheel-frontend/toowheel/api/v1/';
  getClub(): void {
  this.httpClient.get<any>('http://localhost/twowheel-frontend/toowheel/api/v1/get_clubevent')
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
  openDialog(id): void  {
  var data = null;
    this.result.forEach(val=> {
        if(parseInt(val.category_id) === parseInt(id)) {
             data = val;
             return false;
        }
      });
    const dialogRef = this.dialog.open(ClubForm, {
        minWidth: "40%",
        maxWidth: "40%"
    });

    dialogRef.afterClosed().subscribe(result => {
        if(result !== false && result !== 'false') {
            this.getClub();
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
    club_name: string;
    field_type: string;
    file_name: string = 'Select Picture';
    category_id: string;
    value: string;
    type_value: string;
    constructor(
    public dialogRef: MatDialogRef<ClubForm>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private _snackBar: MatSnackBar,
    private httpClient: HttpClient) {
        
    }

  ngOnInit() {
      this.clubForm = new FormGroup({
      'type': new FormControl('', Validators.required),
      'category_id': new FormControl('', Validators.required),
      'club_name': new FormControl('', Validators.required),
      'state': new FormControl('', Validators.required),
      'city': new FormControl('', Validators.required),
      'zip': new FormControl('', Validators.required),
      'address': new FormControl('', Validators.required),
      'club_leader_name': new FormControl('', Validators.required),
      'no_of_member': new FormControl('', Validators.required),
      'email': new FormControl('', Validators.required),
      'phone': new FormControl('', Validators.required),
      'contact_person': new FormControl('', Validators.required),
      'mobile_number': new FormControl('', Validators.required),
      'year_of_established': new FormControl('', Validators.required),
      'activity': new FormControl('', Validators.required),
      'club_secretary': new FormControl('', Validators.required),
      'competition_secretary': new FormControl('', Validators.required),
      'chairman': new FormControl('', Validators.required),
      'treasurer': new FormControl('', Validators.required),
      'about_club': new FormControl('', Validators.required)
        });
    }
    fileProgress(fileInput: any) {
        var fileData = <File>fileInput.target.files[0];
        this.file_name = fileData.name;
        this.loading = true;
          var formData = new FormData();
          formData.append('file', fileData);
          this.httpClient.post('http://localhost/twowheel-frontend/toowheel/api/v1/upload_file', formData).subscribe(
              (res)=>{
                this.loading = false;
                if(res["result"]["error"] === false) {
                    this.value = res["result"]["data"];
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
          formData.append('type', this.type_value);
          formData.append('category_id', this.category_id);
          formData.append('club_name', this.club_name);
          formData.append('banner', this.banner);
          formData.append('state', this.state);
          formData.append('city', this.city);
          formData.append('zip', this.zip);
          formData.append('address', this.address);
          formData.append('club_leader_name', this.club_leader_name);
          formData.append('no_of_member', this.no_of_member);
          formData.append('email', this.email);
          formData.append('phone', this.phone);
          formData.append('contact_person', this.contact_person);
          formData.append('mobile_number', this.mobile_number);
          formData.append('year_of_established', this.year_of_established);
          formData.append('activity', this.activity);
          formData.append('club_secretary', this.club_secretary);
          formData.append('competition_secetary', this.competition_secetary);
          formData.append('chairman', this.chairman);
          formData.append('treasurer', this.treasurer);
          formData.append('about_club', this.about_club);
          this.httpClient.post('http://localhost/twowheel-frontend/toowheel/api/v1/insert_club', formData).subscribe(
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