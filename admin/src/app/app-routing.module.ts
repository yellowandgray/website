import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { EnquiryComponent } from './enquiry/enquiry.component';
import { EnquiryCountComponent } from './enquiry-count/enquiry-count.component';
import { YearComponent } from './year/year.component';


const routes: Routes = [
  {path: '', component: LoginComponent},
  {path: 'inquiry', component: EnquiryComponent},
  {path: 'inquiry_count', component: EnquiryCountComponent},
  {path: 'year', component: YearComponent},
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
