import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ConfigComponent } from './config/config.component';
import { ProductsComponent } from './products/products.component';
import { VendorManagementComponent } from './vendor-management/vendor-management.component';
import { OrderComponent } from './order/order.component';
import { CustomerComponent } from './customer/customer.component';
import { DashboardComponent } from './dashboard/dashboard.component';


const routes: Routes = [
    {path: 'dashboard', component: DashboardComponent},
    {path: 'config', component: ConfigComponent},
    {path: 'products', component: ProductsComponent},
    {path: 'vendor_management', component: VendorManagementComponent},
    {path: 'order', component: OrderComponent},
    {path: 'customer', component: CustomerComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
