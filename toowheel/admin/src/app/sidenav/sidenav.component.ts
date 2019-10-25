import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {
  image_url: string = 'https://www.toowheel.com/beta/toowheel/api/v1/';
  data: any = {name: sessionStorage.getItem("toowheel_name"), role: sessionStorage.getItem("toowheel_role"), avatar: sessionStorage.getItem("toowheel_media_path")};
  constructor() { }

  ngOnInit() {
  }

}
