import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginComponent } from './login/login.component';
import { ProductComponent } from './product/product.component';
import { TrainComponent } from './train/train.component';
import { FloorComponent } from './floor/floor.component';
import { StaffComponent } from './staff/staff.component';


const routes: Routes = [
  {path: '', component: LoginComponent},
  {path: 'product', component: ProductComponent},
  {path: 'train', component: TrainComponent},
  {path: 'floor', component: FloorComponent},
  {path: 'staff', component: StaffComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
