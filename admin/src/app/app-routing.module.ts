import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { SnacksComponent } from './snacks/snacks.component';
import { CooldrinkComponent } from './cooldrink/cooldrink.component';
import { UserComponent } from './user/user.component';
import { OrderComponent } from './order/order.component';
import { UnitComponent } from './unit/unit.component';
import { BannerComponent } from './banner/banner.component';


const routes: Routes = [
  {path: '', component: LoginComponent},
  {path: 'banner', component: BannerComponent},
  {path: 'snacks', component: SnacksComponent},
  {path: 'cooldrink', component: CooldrinkComponent},
  {path: 'user', component: UserComponent},
  {path: 'order', component: OrderComponent},
  {path: 'unit', component: UnitComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
