import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatButtonModule} from '@angular/material/button';
import {MatIconModule} from '@angular/material/icon';
import {MatTabsModule} from '@angular/material/tabs';
import {MatCardModule} from '@angular/material/card';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatTooltipModule} from '@angular/material/tooltip';
import {MatListModule} from '@angular/material/list';
import {MatDialogModule} from '@angular/material/dialog';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {MatSelectModule} from '@angular/material/select';
import {MatRadioModule} from '@angular/material/radio';
import {MatDividerModule} from '@angular/material/divider';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatDatepickerModule} from '@angular/material/datepicker';
import { FlexLayoutModule } from '@angular/flex-layout';
import {MatProgressBarModule} from '@angular/material/progress-bar';
import {MatSnackBarModule} from '@angular/material/snack-bar';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {MatNativeDateModule} from '@angular/material/core';

import { DashboardComponent } from './dashboard/dashboard.component';
import { CategoryComponent, CategoryForm } from './category/category.component';
import { ClubComponent, ClubForm } from './club/club.component';
import { MemberComponent, MemberForm } from './member/member.component';
import { HeaderComponent } from './header/header.component';
import { VendorComponent, VendorForm } from './vendor/vendor.component';
import { NewsComponent, NewsForm } from './news/news.component';
import { BusinessComponent } from './business/business.component';
import { AdvertismentComponent, AdvertismentForm } from './advertisment/advertisment.component';
import { GalleryComponent, GalleryForm } from './gallery/gallery.component';
import { PointComponent } from './point/point.component';
import { ConfigComponent, ConfigForm } from './config/config.component';
import { ClubdashboardComponent } from './clubdashboard/clubdashboard.component';
import { ClublandingComponent, LandingAboutForm } from './clublanding/clublanding.component';
import { ClubeventComponent, ClubEventForm } from './clubevent/clubevent.component';
import { ClubgalleryComponent, ClubGalleryForm } from './clubgallery/clubgallery.component';
import { ClubnewsComponent, ClubNewsForm } from './clubnews/clubnews.component';
import { ClubdiscussionComponent } from './clubdiscussion/clubdiscussion.component';
import { LoginComponent } from './login/login.component';
import {HttpClientModule} from '@angular/common/http';
import { SidenavComponent } from './sidenav/sidenav.component';
import { AnnouncementComponent } from './announcement/announcement.component';

@NgModule({
  declarations: [
    AppComponent,
    DashboardComponent,
    CategoryComponent,
    ClubComponent,
    MemberComponent,
    HeaderComponent,
    VendorComponent,
    NewsComponent,
    BusinessComponent,
    AdvertismentComponent,
    GalleryComponent,
    ClubForm,
    CategoryForm,
    VendorForm,
    MemberForm,
    NewsForm,
    AdvertismentForm,
    GalleryForm,
    PointComponent,
    ConfigComponent,
    ConfigForm,
    ClubdashboardComponent,
    ClublandingComponent,
    LandingAboutForm,
    ClubeventComponent,
    ClubEventForm,
    ClubgalleryComponent,
    ClubGalleryForm,
    ClubnewsComponent,
    ClubNewsForm,
    ClubdiscussionComponent,
    LoginComponent,
    SidenavComponent,
    AnnouncementComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FlexLayoutModule,
    MatSidenavModule,
    MatToolbarModule,
    MatIconModule,
    MatButtonModule,
    MatTooltipModule,
    MatListModule,
    MatTabsModule,
    MatCardModule,
    MatGridListModule,
    MatDialogModule,
    MatFormFieldModule,
    MatInputModule,
    MatSelectModule,
    MatRadioModule,
    MatDividerModule,
    MatExpansionModule,
    MatDatepickerModule,
    MatProgressBarModule,
    MatSnackBarModule,
    MatProgressSpinnerModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    MatNativeDateModule
  ],
  entryComponents: [ClubComponent, ClubForm, CategoryComponent, CategoryForm, VendorComponent, VendorForm, MemberComponent, MemberForm, NewsComponent, NewsForm, AdvertismentComponent, AdvertismentForm, GalleryComponent, GalleryForm, ConfigComponent, ConfigForm, ClublandingComponent, LandingAboutForm, ClubgalleryComponent, ClubGalleryForm, ClubnewsComponent, ClubNewsForm, ClubeventComponent, ClubEventForm],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
