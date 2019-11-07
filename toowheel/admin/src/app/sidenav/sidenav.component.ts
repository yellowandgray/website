import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {
  isExpanded1 = false;
  isExpanded2 = false;
  isExpanded3 = false;
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  data: any = {name: sessionStorage.getItem("toowheel_name"), role: sessionStorage.getItem("toowheel_role"), avatar: sessionStorage.getItem("toowheel_media_path"), last_login: sessionStorage.getItem("toowheel_last_login"), gender: sessionStorage.getItem("toowheel_gender")};
  constructor() { }

  ngOnInit() {
   
  }
    expendfun(valueurl) {
        if(this["isExpanded"+valueurl]==true) {
        this["isExpanded"+valueurl]=false
        } else {
         this["isExpanded"+valueurl]=true
        }
    }
  
}
