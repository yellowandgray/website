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
  result = [];  
  constructor(public dialog: MatDialog, private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
      this.getMember();
  }
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  getMember(): void {
     this.httpClient.get<any>('https://www.toowheel.com/beta/toowheel/api/v1/get_member_by_club/' + sessionStorage.getItem("toowheel_club_id"))
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
}
