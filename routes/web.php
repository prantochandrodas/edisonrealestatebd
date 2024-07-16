<?php

use App\Http\Controllers\Backend\AboutUsPage\AboutChairmanController;
use App\Http\Controllers\Backend\AboutUsPage\AboutUsBannerController;
use App\Http\Controllers\Backend\AboutUsPage\AboutUsInformationController;
use App\Http\Controllers\Backend\AboutUsPage\DreamTeamController;
use App\Http\Controllers\Backend\AboutUsPage\OurValueController;
use App\Http\Controllers\Backend\AboutUsPage\PrivacyPolicyController;
use App\Http\Controllers\Backend\AboutUsPage\PurposeController;
use App\Http\Controllers\Backend\AboutUsPage\TeamController;
use App\Http\Controllers\Backend\AboutUsPage\TimelineController;
use App\Http\Controllers\Backend\AboutUsPage\visionController;
use App\Http\Controllers\Backend\BlogPage\BlogBannerController;
use App\Http\Controllers\Backend\BlogPage\BlogPostController;
use App\Http\Controllers\Backend\HomePage\CompanyVideoController;
use App\Http\Controllers\Backend\HomePage\FeaturedProjectController;
use App\Http\Controllers\Backend\HomePage\FeaturedProjectPostController;
use App\Http\Controllers\Backend\HomePage\InvestorInformationController;
use App\Http\Controllers\Backend\HomePage\ScheduleMettingController;
use App\Http\Controllers\Backend\HomePage\SliderController;
use App\Http\Controllers\Backend\HomePage\TestimonialPostController;
use App\Http\Controllers\Backend\Project\ProjectController;
use App\Http\Controllers\Backend\Project\ProjectPageBannerController;
use App\Http\Controllers\Backend\Property\PropertyController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\AboutUsPrivacyPolicyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutUsTeamController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ProjectsController;
use App\Models\CompanyVideo;
use App\Models\InvestorInformation;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('backend.home.slider.index');
// });
//font end route 
Route::get('/',[HomeController::class,'index']);
Route::get('/about-us',[AboutUsController::class,'index']);
Route::get('/about-us/team',[AboutUsTeamController::class,'index']);
Route::get('/about-us/privacy-policy',[AboutUsPrivacyPolicyController::class,'index']);
Route::get('/projects/{category?}', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/project/{name}',[ProjectsController::class,'projectDetails'])->name('projects.details'); 
Route::get('/blogs',[BlogController::class,'index'])->name('blog.index'); 
Route::get('/blogs/{name}',[BlogController::class,'details'])->name('blogs.details'); 


// home slider route start 
Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
Route::get('/slider/get-sliders',[SliderController::class,'getSliders'])->name('slider.get-sliders');
Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::put('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::delete('/slider/distory/{id}',[SliderController::class,'distory'])->name('slider.distory');



// featured-projects route start 

Route::get('/featured-projects',[FeaturedProjectController::class,'index'])->name('featured-project.index');
Route::get('/featured-projects/getdata',[FeaturedProjectController::class,'getdata'])->name('featured-project.getdata');
Route::get('/featured-projects/create',[FeaturedProjectController::class,'create'])->name('featured-project.create');
Route::post('/featured-projects/store',[FeaturedProjectController::class,'store'])->name('featured-project.store');
Route::get('/featured-projects/edit/{id}',[FeaturedProjectController::class,'edit'])->name('featured-project.edit');
Route::put('/featured-projects/update/{id}',[FeaturedProjectController::class,'update'])->name('featured-project.update');
Route::delete('/featured-projects/distory/{id}',[FeaturedProjectController::class,'distory'])->name('featured-project.distory');
Route::get('/featured-projects/view/{id}',[FeaturedProjectController::class,'view'])->name('featured-project.view');
 
// featured-projects route end 

// featured-projects-post start 

Route::get('/featured-projects-post',[FeaturedProjectPostController::class,'index'])->name('featured-project-posts.index');
Route::get('/featured-projects-post/getdata',[FeaturedProjectPostController::class,'getdata'])->name('featured-project-posts.getdata');
Route::get('/featured-projects-post/create',[FeaturedProjectPostController::class,'create'])->name('featured-project-posts.create');
Route::post('/featured-projects-post/store',[FeaturedProjectPostController::class,'store'])->name('featured-project-posts.store');
Route::get('/featured-projects-post/edit/{id}',[FeaturedProjectPostController::class,'edit'])->name('featured-project-posts.edit');
Route::put('/featured-projects-post/update/{id}',[FeaturedProjectPostController::class,'update'])->name('featured-project-posts.update');
Route::delete('/featured-projects-post/distory/{id}',[FeaturedProjectPostController::class,'distroy'])->name('featured-project-posts.distory');
Route::get('/featured-projects-post/view/{id}',[FeaturedProjectPostController::class,'view'])->name('featured-project-posts.view');

// featured-projects-post route end



// testimonial-post route start  

Route::get('/testimonial',[TestimonialPostController::class,'index'])->name('testimonials.index');
Route::get('/testimonial/getdata',[TestimonialPostController::class,'getdata'])->name('testimonials.getdata');
Route::get('/testimonial/create',[TestimonialPostController::class,'create'])->name('testimonials.create');
Route::post('/testimonial/store',[TestimonialPostController::class,'store'])->name('testimonials.store');
Route::get('/testimonial/edit/{id}',[TestimonialPostController::class,'edit'])->name('testimonials.edit');
Route::put('/testimonial/update/{id}',[TestimonialPostController::class,'update'])->name('testimonials.update');
Route::delete('/testimonial/distory/{id}',[TestimonialPostController::class,'distroy'])->name('testimonials.distory');


// testimonial-post route end 
// CompanyVideo
Route::get('/investor-information',[InvestorInformationController::class,'index'])->name('investor-informations.index');
Route::put('/investor-information/update/{id}',[InvestorInformationController::class,'update'])->name('investor-informations.update');

// schedule-metting route start

Route::get('/schedule-metting',[ScheduleMettingController::class,'index'])->name('schedule-mettings.index');
Route::put('/schedule-metting/update/{id}',[ScheduleMettingController::class,'update'])->name('schedule-mettings.update');


// Schedule-metting route end


// blog banner route start 

Route::get('/blog-banner',[BlogBannerController::class,'index'])->name('blog-banners.index');
Route::put('/blog-banner/update/{id}',[BlogBannerController::class,'update'])->name('blog-banners.update');

// blog banner route end 

// blog post start 

Route::get('/blog-post',[BlogPostController::class,'index'])->name('blog-posts.index');
Route::get('/blog-post/getdata',[BlogPostController::class,'getdata'])->name('blog-posts.getdata');
Route::get('/blog-post/create',[BlogPostController::class,'create'])->name('blog-posts.create');
Route::post('/blog-post/store',[BlogPostController::class,'store'])->name('blog-posts.store');
Route::get('/blog-post/edit/{id}',[BlogPostController::class,'edit'])->name('blog-posts.edit');
Route::put('/blog-post/update/{id}',[BlogPostController::class,'update'])->name('blog-posts.update');
Route::delete('/blog-post/distory/{id}',[BlogPostController::class,'distroy'])->name('blog-posts.distroy');
Route::get('/blog-post/view/{id}',[BlogPostController::class,'view'])->name('blog-posts.view');

// blog post end 

// start  about us page banner 
Route::get('/about-us-banner',[AboutUsBannerController::class,'index'])->name('about-us-banners.index');
Route::put('/about-us-banner/update/{id}',[AboutUsBannerController::class,'update'])->name('about-us-banners.update');



//end of  about us page  banner 


// about us page about information 
Route::get('/about-company',[AboutUsInformationController::class,'index'])->name('about-companys.index');
Route::put('/about-company-update',[AboutUsInformationController::class,'update'])->name('about-companys.update');
// end of about us page about information 

// purpose route 

Route::get('/purpose',[PurposeController::class,'index'])->name('purposes.index');
Route::put('/purpose/update/{id}',[PurposeController::class,'update'])->name('purposes.update');



// end purpose 


// vision route 
Route::get('/vision',[visionController::class,'index'])->name('visions.index');
Route::put('/vision/update/{id}',[visionController::class,'update'])->name('visions.update');
// end vision

//our-value route start
Route::get('/our-value',[OurValueController::class,'index'])->name('our-values.index');
Route::get('/our-value/getdata',[OurValueController::class,'getdata'])->name('our-values.getdata');
Route::get('/our-value/create',[OurValueController::class,'create'])->name('our-values.create');
Route::post('/our-value/store',[OurValueController::class,'store'])->name('our-values.store');
Route::get('/our-value/edit/{id}',[OurValueController::class,'edit'])->name('our-values.edit');
Route::put('/our-value/update/{id}',[OurValueController::class,'update'])->name('our-values.update');
Route::delete('/our-value/distory/{id}',[OurValueController::class,'distroy'])->name('our-values.distroy');
Route::get('/our-value/view/{id}',[OurValueController::class,'view'])->name('our-values.view');
// end of our-value 

// about chairman route start
Route::get('/about-chairman',[AboutChairmanController::class,'index'])->name('about-chairmans.index');
Route::put('/about-chairman/update/{id}',[AboutChairmanController::class,'update'])->name('about-chairmans.update');


//end about-chairman route 

// start timeline route
Route::get('/timeline',[TimelineController::class,'index'])->name('timelines.index');
Route::get('/timeline/getdata',[TimelineController::class,'getdata'])->name('timelines.getdata');
Route::get('/timeline/create',[TimelineController::class,'create'])->name('timelines.create');
Route::post('/timeline/store',[TimelineController::class,'store'])->name('timelines.store');
Route::get('/timeline/edit/{id}',[TimelineController::class,'edit'])->name('timelines.edit');
Route::put('/timeline/update/{id}',[TimelineController::class,'update'])->name('timelines.update');
Route::delete('/timeline/distory/{id}',[TimelineController::class,'distroy'])->name('timelines.distroy');
Route::get('/timeline/view/{id}',[TimelineController::class,'view'])->name('timelines.view');
// end timeline route

// start team route 
Route::get('/team',[TeamController::class,'index'])->name('teams.index');
Route::get('/team/getdata',[TeamController::class,'getdata'])->name('teams.getdata');
Route::get('/team/create',[TeamController::class,'create'])->name('teams.create');
Route::post('/team/store',[TeamController::class,'store'])->name('teams.store');
Route::get('/team/edit/{id}',[TeamController::class,'edit'])->name('teams.edit');
Route::put('/team/update/{id}',[TeamController::class,'update'])->name('teams.update');
Route::delete('/team/distory/{id}',[TeamController::class,'distroy'])->name('teams.distroy');
Route::get('/team/view/{id}',[TeamController::class,'view'])->name('teams.view');
// end team route

// dream-team  route start 
Route::get('/dream-team',[DreamTeamController::class,'index'])->name('dream-teams.index');
Route::put('/dream-team/update/{id}',[DreamTeamController::class,'update'])->name('dream-teams.update');
// end privacy policy

// privacy policy route start 
Route::get('/privacy-policy',[PrivacyPolicyController::class,'index'])->name('privacy-policys.index');
Route::put('/privacy-policy/update/{id}',[PrivacyPolicyController::class,'update'])->name('privacy-policys.update');
// end privacy policy 

// projectpage-banner  route start 
Route::get('/projectpage-banner',[ProjectPageBannerController::class,'index'])->name('projectpage-banners.index');
Route::put('/projectpage-banner/update/{id}',[ProjectPageBannerController::class,'update'])->name('projectpage-banners.update');
// end privacy policy

// start team PropertyController 
Route::get('/projects-information', [ProjectController::class, 'index'])->name('projects-information.index');
Route::get('/projects-information/getdata', [ProjectController::class, 'getdata'])->name('projects.getdata');
Route::get('/projects-information/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects-information/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects-information/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects-information/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects-information/distroy/{id}', [ProjectController::class, 'distroy'])->name('projects.distroy');
Route::get('/projects-information/view/{id}', [ProjectController::class, 'view'])->name('projects.view');
Route::delete('projects/delete-image/{id}', [ProjectController::class, 'deleteImage'])->name('projects.delete-image');
// end property route