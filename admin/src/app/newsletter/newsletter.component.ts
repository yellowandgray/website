import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-newsletter',
  templateUrl: './newsletter.component.html',
  styleUrls: ['./newsletter.component.css']
})
export class NewsletterComponent implements OnInit {
  result = [];
  constructor(private _snackBar: MatSnackBar, private httpClient: HttpClient) { }

  ngOnInit() {
    this.getNewsletter();
  }
    getNewsletter(): void {
     this.httpClient.get<any>('http://localhost/project/fresche/api/v1/get_newsletter')
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
}
