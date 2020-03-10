import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { LoginComponent } from './login/login.component';
import { SnacksComponent, SnacksForm, SnacksDelete, SnacksImageView } from './snacks/snacks.component';
import { CooldrinkComponent, CoolDrinkForm, CooldrinkDelete, CooldrinkImageView } from './cooldrink/cooldrink.component';
import { UserComponent, UserForm, UserDelete, UserImageView } from './user/user.component';
import { OrderComponent, OrderView } from './order/order.component';
import { UnitComponent, UnitForm, UnitDelete } from './unit/unit.component';
import { BannerComponent, BannerForm, BannerDelete, BannerImageView } from './banner/banner.component';
import { DeliveryBoyComponent, DeliveryBoyForm, DeliveryBoyDelete, PictureViewUser } from './delivery-boy/delivery-boy.component';
import { PincodeComponent, PincodeForm, PincodeDelete } from './pincode/pincode.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import {MatToolbarModule} from '@angular/material/toolbar';
import {MatButtonModule} from '@angular/material/button';
import {MatIconModule} from '@angular/material/icon';
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
import {MatRadioModule} from '@angular/material/radio';
import {MatDatepickerModule} from '@angular/material/datepicker';
import {MatNativeDateModule} from '@angular/material/core';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatBadgeModule} from '@angular/material/badge';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    SidenavComponent,
    LoginComponent,
    SnacksComponent,
    SnacksForm,
    SnacksDelete,
    SnacksImageView,
    CooldrinkComponent,
    CoolDrinkForm,
    CooldrinkDelete,
    CooldrinkImageView,
    UserComponent,
    UserForm,
    UserDelete,
    UserImageView,
    OrderComponent,
    UnitComponent,
    UnitForm,
    UnitDelete,
    BannerComponent,
    BannerForm,
    BannerDelete,
    BannerImageView,
    DeliveryBoyComponent,
    DeliveryBoyForm,
    DeliveryBoyDelete,
    PictureViewUser,
    OrderView,
    PincodeComponent,
    PincodeForm,
    PincodeDelete
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatToolbarModule,
    MatButtonModule,
    MatIconModule,
    MatTooltipModule,
    MatSidenavModule,
    MatListModule,
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
    MatRadioModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatExpansionModule,
    MatBadgeModule,
    FlexLayoutModule,
    MatSlideToggleModule
  ],
  entryComponents: [
    SnacksComponent, 
    SnacksForm, 
    SnacksDelete, 
    SnacksImageView, 
    CooldrinkComponent, 
    CoolDrinkForm, 
    CooldrinkDelete, 
    CooldrinkImageView, 
    UserComponent, 
    UserForm, 
    UserDelete, 
    UserImageView,
    UnitComponent, 
    UnitForm, 
    UnitDelete,
    BannerComponent, 
    BannerForm, 
    BannerDelete,
    BannerImageView,
    DeliveryBoyComponent,
    DeliveryBoyForm,
    DeliveryBoyDelete,
    PictureViewUser,
    OrderView,
    PincodeComponent,
    PincodeForm,
    PincodeDelete
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
