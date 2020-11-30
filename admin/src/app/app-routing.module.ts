import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginComponent } from './login/login.component';
import { TestimonialComponent } from './testimonial/testimonial.component';
import { ProductComponent } from './product/product.component';
import { SubproductComponent } from './subproduct/subproduct.component';
import { MemberComponent } from './member/member.component';
import { OrderComponent } from './order/order.component';
import { BannerComponent } from './banner/banner.component';
import { NewsletterComponent } from './newsletter/newsletter.component';
import { CouponComponent } from './coupon/coupon.component';
import { ApplicationComponent } from './application/application.component';


const routes: Routes = [
        {path: '', component: LoginComponent},
        {path: 'testimonial', component: TestimonialComponent},
        {path: 'product', component: ProductComponent},
        {path: 'subproduct', component: SubproductComponent},
        {path: 'order', component: OrderComponent},
        {path: 'member', component: MemberComponent},
        {path: 'banner', component: BannerComponent},
        {path: 'newsletter', component: NewsletterComponent},
        {path: 'coupon', component: CouponComponent},
        {path: 'application', component: ApplicationComponent},
    ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
