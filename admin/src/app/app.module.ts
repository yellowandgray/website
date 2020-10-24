import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import {MatToolbarModule} from '@angular/material/toolbar';
import {MatButtonModule} from '@angular/material/button';
import {MatIconModule} from '@angular/material/icon';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatTooltipModule} from '@angular/material/tooltip';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatListModule} from '@angular/material/list';
import { FlexLayoutModule } from '@angular/flex-layout';
import {MatCardModule} from '@angular/material/card';
import {MatProgressBarModule} from '@angular/material/progress-bar';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {MatSnackBarModule} from '@angular/material/snack-bar';
import {HttpClientModule} from '@angular/common/http';
import {MatDialogModule} from '@angular/material/dialog';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {MatSelectModule} from '@angular/material/select';
import { AngularEditorModule } from '@kolkov/angular-editor';
import {MatRadioModule} from '@angular/material/radio';
import {MatDatepickerModule} from '@angular/material/datepicker';
import {MatNativeDateModule} from '@angular/material/core';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatBadgeModule} from '@angular/material/badge';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { LoginComponent } from './login/login.component';
import { TestimonialComponent, TestimonialForm, TestimonialDelete } from './testimonial/testimonial.component';
import { ProductComponent, ProductForm, ProductDelete, ProductImageView } from './product/product.component';
import { MemberComponent, MemberForm, MemberDelete } from './member/member.component';
import { OrderComponent, OrderViewForm, DeliveryStatusForm, OrderDelete } from './order/order.component';
import { BannerComponent, BannerForm, BannerImageView, BannerDelete } from './banner/banner.component';
import { NewsletterComponent, NewsletterDelete } from './newsletter/newsletter.component';
import { CouponComponent, CouponForm, CouponDelete } from './coupon/coupon.component';
import { ContactInfoComponent } from './contact-info/contact-info.component';
import { ApplicationComponent, ApplicationForm, ApplicationGalleryForm, ImageView, ApplicationDelete } from './application/application.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SidenavComponent,
    LoginComponent,
    TestimonialComponent,
    TestimonialForm,
    TestimonialDelete,
    ProductComponent,
    ProductForm,
    ProductImageView,
    ProductDelete,
    MemberComponent,
    MemberForm,
    MemberDelete,
    OrderComponent,
    OrderViewForm,
    DeliveryStatusForm,
    OrderDelete,
    BannerComponent,
    BannerForm,
    BannerImageView,
    BannerDelete,
    NewsletterComponent,
    NewsletterDelete,
    CouponComponent,
    CouponForm,
    CouponDelete,
    ContactInfoComponent,
    ApplicationComponent,
    ApplicationForm,
    ApplicationGalleryForm,
    ImageView,
    ApplicationDelete
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MatToolbarModule,
    MatButtonModule,
    MatIconModule,
    BrowserAnimationsModule,
    MatTooltipModule,
    MatSidenavModule,
    MatListModule,
    FlexLayoutModule,
    MatCardModule,
    MatProgressBarModule,
    MatFormFieldModule,
    MatInputModule,
    FormsModule,
    ReactiveFormsModule,
    MatSnackBarModule,
    HttpClientModule,
    MatDialogModule,
    MatProgressSpinnerModule,
    MatSelectModule,
    AngularEditorModule,
    MatRadioModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatExpansionModule,
    MatBadgeModule,
    MatSlideToggleModule  
  ],
  entryComponents: [TestimonialComponent, TestimonialForm, TestimonialDelete, ProductComponent, ProductForm, ProductImageView, ProductDelete, MemberComponent, MemberForm, MemberDelete, OrderComponent, OrderViewForm, DeliveryStatusForm, OrderDelete, BannerComponent, BannerForm, BannerImageView, BannerDelete, NewsletterComponent, NewsletterDelete, CouponComponent, CouponForm, CouponDelete, ApplicationComponent, ApplicationForm, ApplicationGalleryForm, ImageView, ApplicationDelete],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
