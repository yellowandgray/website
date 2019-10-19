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
import { AngularEditorModule } from '@kolkov/angular-editor';

import { DashboardComponent } from './dashboard/dashboard.component';
import { CategoryComponent, CategoryForm, CategoryDelete } from './category/category.component';
import { ClubComponent, ClubForm, ClubDelete, ClubPhotosForm } from './club/club.component';
import { MemberComponent, MemberForm, MemberDelete } from './member/member.component';
import { HeaderComponent } from './header/header.component';
import { VendorComponent, VendorForm } from './vendor/vendor.component';
import { NewsComponent, NewsForm, NewsGalleryForm, NewsDelete } from './news/news.component';
import { BusinessComponent } from './business/business.component';
import { AdvertismentComponent, AdvertismentForm, AdvertismentDelete } from './advertisment/advertisment.component';
import { GalleryComponent, GalleryForm, GalleryDelete } from './gallery/gallery.component';
import { PointComponent } from './point/point.component';
import { ConfigComponent, ConfigForm } from './config/config.component';
import { ClubdashboardComponent } from './clubdashboard/clubdashboard.component';
import { ClublandingComponent, LandingAboutForm } from './clublanding/clublanding.component';
import { ClubeventComponent, ClubEventForm, ClubEventDelete } from './clubevent/clubevent.component';
import { ClubgalleryComponent, ClubGalleryForm } from './clubgallery/clubgallery.component';
import { ClubnewsComponent, ClubNewsForm } from './clubnews/clubnews.component';
import { ClubdiscussionComponent } from './clubdiscussion/clubdiscussion.component';
import { LoginComponent } from './login/login.component';
import {HttpClientModule} from '@angular/common/http';
import { SidenavComponent } from './sidenav/sidenav.component';
import { AnnouncementComponent, AnnouncementForm, AnnouncementDelete } from './announcement/announcement.component';
import { PressReleaseComponent, PressReleaseForm, PressreleaseDelete } from './press-release/press-release.component';
import { MediaComponent, MediaForm, MediaDelete } from './media/media.component';
import { NewsletterComponent, NewsletterForm, NewsletterDelete } from './newsletter/newsletter.component';
import { UsersComponent, UsersForm } from './users/users.component';
import { Ng2GoogleChartsModule } from 'ng2-google-charts';
import {MatSortModule} from '@angular/material/sort';
import { WorkshopComponent } from './workshop/workshop.component';


@NgModule({
  declarations: [
    AppComponent,
    DashboardComponent,
    CategoryComponent,
    CategoryDelete,
    ClubDelete,
    ClubComponent,
    MemberComponent,
    HeaderComponent,
    VendorComponent,
    NewsComponent,
    NewsDelete,
    BusinessComponent,
    AdvertismentComponent,
    GalleryComponent,
    ClubForm,
    ClubPhotosForm,
    CategoryForm,
    VendorForm,
    MemberForm,
    MemberDelete,
    NewsForm,
    NewsGalleryForm,
    AdvertismentForm,
    AdvertismentDelete,
    GalleryForm,
    GalleryDelete,
    PointComponent,
    ConfigComponent,
    ConfigForm,
    ClubdashboardComponent,
    ClublandingComponent,
    LandingAboutForm,
    ClubeventComponent,
    ClubEventForm,
    ClubEventDelete,
    ClubgalleryComponent,
    ClubGalleryForm,
    ClubnewsComponent,
    ClubNewsForm,
    ClubdiscussionComponent,
    LoginComponent,
    SidenavComponent,
    AnnouncementComponent,
    AnnouncementForm,
    AnnouncementDelete,
    PressReleaseComponent,
    PressReleaseForm,
    PressreleaseDelete,
    MediaComponent,
    MediaForm, 
    MediaDelete, 
    NewsletterComponent,
    NewsletterForm, 
    NewsletterDelete, 
    UsersComponent, 
    UsersForm, WorkshopComponent
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
    MatNativeDateModule,
    Ng2GoogleChartsModule,
    AngularEditorModule,
    MatSortModule
  ],
  entryComponents: [ClubComponent, ClubForm, ClubDelete, ClubPhotosForm, CategoryComponent, CategoryForm, CategoryDelete, VendorComponent, VendorForm, MemberComponent, MemberForm, MemberDelete, NewsComponent, NewsForm, NewsGalleryForm, NewsDelete, AdvertismentComponent, AdvertismentForm, AdvertismentDelete, GalleryComponent, GalleryForm, ConfigComponent, ConfigForm, ClublandingComponent, LandingAboutForm, ClubgalleryComponent, ClubGalleryForm, ClubnewsComponent, ClubNewsForm, ClubeventComponent, ClubEventForm, ClubEventDelete, PressReleaseComponent, PressReleaseForm, PressreleaseDelete, GalleryDelete, AnnouncementComponent, AnnouncementForm,AnnouncementDelete, MediaComponent, MediaForm, MediaDelete, NewsletterComponent, NewsletterForm, NewsletterDelete, UsersComponent, UsersForm],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
