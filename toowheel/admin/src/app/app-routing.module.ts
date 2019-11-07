import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DashboardComponent } from './dashboard/dashboard.component';
import { CategoryComponent } from './category/category.component';
import { MediaComponent } from './media/media.component';
import { ClubComponent } from './club/club.component';
import { MemberComponent } from './member/member.component';
import { NewsComponent } from './news/news.component';
import { AdvertismentComponent } from './advertisment/advertisment.component';
import { GalleryComponent } from './gallery/gallery.component';
import { ConfigComponent } from './config/config.component';
import { ClubdashboardComponent } from './clubdashboard/clubdashboard.component';
import { ClublandingComponent } from './clublanding/clublanding.component';
import { ClubeventComponent } from './clubevent/clubevent.component';
import { ClubdiscussionComponent} from './clubdiscussion/clubdiscussion.component';
import { ClubgalleryComponent } from './clubgallery/clubgallery.component';
import { ClubnewsComponent } from './clubnews/clubnews.component';
import { LoginComponent } from './login/login.component';
import { AnnouncementComponent } from './announcement/announcement.component';
import { PressReleaseComponent } from './press-release/press-release.component';
import { NewsletterComponent } from './newsletter/newsletter.component';
import { UsersComponent } from './users/users.component';
import { WorkshopComponent } from './workshop/workshop.component';
import { AssetComponent } from './asset/asset.component';
import { ClubannouncementComponent } from './clubannouncement/clubannouncement.component';
import { MyclubComponent } from './myclub/myclub.component';

const routes: Routes = [
    {path: '', component: LoginComponent},
    {path: 'dashboard', component: DashboardComponent},
    {path: 'category', component: CategoryComponent},
    {path: 'media', component: MediaComponent},
    {path: 'club', component: ClubComponent},
    {path: 'member', component: MemberComponent},
    {path: 'news', component: NewsComponent},
    {path: 'advertisement', component: AdvertismentComponent},
    {path: 'gallery', component: GalleryComponent},
    {path: 'config', component: ConfigComponent},
    {path: 'clubdashboard', component: ClubdashboardComponent},
    {path: 'clublanding', component: ClublandingComponent},
    {path: 'clubevent', component: ClubeventComponent},
    {path: 'clubdiscussion', component: ClubdiscussionComponent},
    {path: 'clubgallery', component: ClubgalleryComponent},
    {path: 'clubnews', component: ClubnewsComponent},
    {path: 'announcement/:cid', component: AnnouncementComponent},
    {path: 'newsletter', component: NewsletterComponent},
    {path: 'press-release', component: PressReleaseComponent},
    {path: 'users', component: UsersComponent},
    {path: 'workshop', component: WorkshopComponent},
    {path: 'asset', component: AssetComponent},
    {path: 'clubannouncement', component: ClubannouncementComponent},
    {path: 'myclub', component: MyclubComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
