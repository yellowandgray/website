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
import { ClubComponent, ClubForm, ClubDelete, ClubPhotosForm,PictureViewClub } from './club/club.component';
import { filterEventClub } from './club/filter-event.pipe';
import { ClubComponent, ClubForm, ClubDelete, ClubPhotosForm,PictureViewClub, ClubViewFrom } from './club/club.component';
import { MemberComponent, MemberForm, MemberDelete } from './member/member.component';
import { filterEventMember } from './member/filter-event.pipe';
import { HeaderComponent } from './header/header.component';
import { VendorComponent, VendorForm } from './vendor/vendor.component';
import { filterEventNews } from './news/filter-event.pipe';
import { NewsComponent, NewsForm, NewsGalleryForm, NewsDelete,PictureViewNews, NewsViewForm} from './news/news.component';
import { BusinessComponent } from './business/business.component';
import { AdvertismentComponent, AdvertismentForm, AdvertismentDelete } from './advertisment/advertisment.component';
import { filterEventAdvertisment } from './advertisment/filter-event.pipe';
import { GalleryComponent, GalleryForm, GalleryDelete } from './gallery/gallery.component';
import { filterEventgallery } from './gallery/filter-event.pipe';
import { PointComponent } from './point/point.component';
import { ConfigComponent, ConfigForm } from './config/config.component';
import { filterEventconfig } from './config/filter-event.pipe';
import { ClubdashboardComponent } from './clubdashboard/clubdashboard.component';
import { ClublandingComponent, LandingAboutForm } from './clublanding/clublanding.component';
import { ClubeventComponent, ClubEventForm, ClubEventDelete,PictureView, ClubEventViewFrom } from './clubevent/clubevent.component';
import { filterEvent } from './clubevent/filter-event.pipe';
import { ClubgalleryComponent, ClubGalleryForm } from './clubgallery/clubgallery.component';
import { ClubnewsComponent, ClubNewsForm } from './clubnews/clubnews.component';
import { ClubdiscussionComponent } from './clubdiscussion/clubdiscussion.component';
import { LoginComponent } from './login/login.component';
import {HttpClientModule} from '@angular/common/http';
import { SidenavComponent } from './sidenav/sidenav.component';
import { AnnouncementComponent, AnnouncementForm, AnnouncementDelete } from './announcement/announcement.component';
import { filterEventPress } from './press-release/filter-event.pipe';
import { PressReleaseComponent, PressReleaseForm, PressreleaseDelete,PictureViewPress, PressreleaseViewFrom } from './press-release/press-release.component';
import { MediaComponent, MediaForm, MediaDelete } from './media/media.component';
import { filterEventmedia } from './media/filter-event.pipe';
import { NewsletterComponent, NewsletterForm, NewsletterDelete } from './newsletter/newsletter.component';
import { filterEventnewsletter } from './newsletter/filter-event.pipe';
import { UsersComponent, UsersForm } from './users/users.component';
import { filterEventusers } from './users/filter-event.pipe';
import { UsersComponent, UsersForm, UsersViewFrom } from './users/users.component';
import { Ng2GoogleChartsModule } from 'ng2-google-charts';
import {MatSortModule} from '@angular/material/sort';
import { filterEventworkshop } from './workshop/filter-event.pipe';
import { WorkshopComponent, WorkshopForm, WorkshopDelete,PictureViewWorkshop, WorkshopViewFrom } from './workshop/workshop.component';

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
    ClubViewFrom,
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
    ClubEventViewFrom,
    ClubgalleryComponent,
    ClubGalleryForm,
    ClubnewsComponent,
    ClubNewsForm,
    NewsViewForm,
    ClubdiscussionComponent,
    LoginComponent,
    SidenavComponent,
    AnnouncementComponent,
    AnnouncementForm,
    AnnouncementDelete,
    PressReleaseComponent,
    PressReleaseForm,
    PressreleaseDelete,
    PressreleaseViewFrom,
    MediaComponent,
    MediaForm, 
    MediaDelete, 
    NewsletterComponent,
    NewsletterForm, 
    NewsletterDelete, 
    UsersComponent, 
    UsersForm,
    UsersViewFrom,
    PictureView,
    PictureViewNews,
    PictureViewPress,
    PictureViewClub,
    WorkshopComponent, 
    WorkshopForm,
    WorkshopDelete,
    PictureViewWorkshop,
    filterEvent,
    filterEventClub,
    filterEventMember,
    filterEventNews,
    filterEventPress,
    filterEventnewsletter,
    filterEventworkshop,
    filterEventconfig,
    filterEventmedia,
    filterEventusers,
    filterEventAdvertisment,
    filterEventgallery,
    WorkshopViewFrom,
    filterEvent,

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
  entryComponents: [ClubComponent, ClubForm, ClubDelete, ClubPhotosForm, CategoryComponent, CategoryForm, CategoryDelete, VendorComponent, VendorForm, MemberComponent, MemberForm, MemberDelete, NewsComponent, NewsForm, NewsGalleryForm, NewsDelete, AdvertismentComponent, AdvertismentForm, AdvertismentDelete, GalleryComponent, GalleryForm, ConfigComponent, ConfigForm, ClublandingComponent, LandingAboutForm, ClubgalleryComponent, ClubGalleryForm, ClubnewsComponent, ClubNewsForm, ClubeventComponent, ClubEventForm, ClubEventDelete, PressReleaseComponent, PressReleaseForm, PressreleaseDelete, GalleryDelete, AnnouncementComponent, AnnouncementForm,AnnouncementDelete, MediaComponent, MediaForm, MediaDelete, NewsletterComponent, NewsletterForm, NewsletterDelete, UsersComponent, UsersForm, UsersViewFrom, PictureView,PictureViewNews,PictureViewPress,PictureViewClub, WorkshopComponent, WorkshopForm, WorkshopDelete,PictureViewWorkshop, WorkshopViewFrom, ClubViewFrom, NewsViewForm, ClubEventViewFrom, PressreleaseViewFrom],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
