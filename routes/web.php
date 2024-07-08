<?php

use App\Http\Controllers\Backend\AboutUsPage\AboutChairmanController;
use App\Http\Controllers\Backend\AboutUsPage\AboutUsBannerController;
use App\Http\Controllers\Backend\AboutUsPage\AboutUsInformationController;
use App\Http\Controllers\Backend\AboutUsPage\OurValueController;
use App\Http\Controllers\Backend\AboutUsPage\PurposeController;
use App\Http\Controllers\Backend\AboutUsPage\visionController;
use App\Http\Controllers\Backend\BlogPage\BlogBannerController;
use App\Http\Controllers\Backend\BlogPage\BlogPostController;
use App\Http\Controllers\Backend\HomePage\FeaturedProjectController;
use App\Http\Controllers\Backend\HomePage\FeaturedProjectPostController;
use App\Http\Controllers\Backend\HomePage\HomeAboutusController;
use App\Http\Controllers\Backend\HomePage\ScheduleMettingController;
use App\Http\Controllers\Backend\HomePage\SliderController;
use App\Http\Controllers\Backend\HomePage\TestimonialController;
use App\Http\Controllers\Backend\HomePage\TestimonialPostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('backend.home.slider.index');
// });

// home slider route start 
Route::get('/',[SliderController::class,'index'])->name('slider.index');
Route::get('/slider/get-sliders',[SliderController::class,'getSliders'])->name('slider.get-sliders');
Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::put('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::delete('/slider/distory/{id}',[SliderController::class,'distory'])->name('slider.distory');

// home slider route end 

// home about route start

Route::get('/home-about',[HomeAboutusController::class,'index'])->name('home-about.index');
Route::get('/home-about/get_about',[HomeAboutusController::class,'getAbout'])->name('home-about.get_about');
Route::get('/home-about/create',[HomeAboutusController::class,'create'])->name('home-about.create');
Route::post('/home-about/store',[HomeAboutusController::class,'store'])->name('home-about.store');
Route::get('/home-about/edit/{id}',[HomeAboutusController::class,'edit'])->name('home-about.edit');
Route::put('/home-about/update/{id}',[HomeAboutusController::class,'update'])->name('home-about.update');
Route::delete('/home-about/distory/{id}',[HomeAboutusController::class,'distroy'])->name('home-about.distory');
Route::get('/home-about/view/{id}',[HomeAboutusController::class,'view'])->name('home-about.view');

// home about route end 

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

//testimonial route start

Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonials.index');
Route::get('/testimonial/getdata',[TestimonialController::class,'getdata'])->name('testimonials.getdata');
Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonials.create');
Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonials.store');
Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('testimonials.edit');
Route::put('/testimonial/update/{id}',[TestimonialController::class,'update'])->name('testimonials.update');
Route::delete('/testimonial/distory/{id}',[TestimonialController::class,'distory'])->name('testimonials.distory');
Route::get('/testimonial/view/{id}',[TestimonialController::class,'view'])->name('testimonials.view');

// testimonial route end 

// testimonial-post route start  

Route::get('/testimonial-post',[TestimonialPostController::class,'index'])->name('testimonial-posts.index');
Route::get('/testimonial-post/getdata',[TestimonialPostController::class,'getdata'])->name('testimonial-posts.getdata');
Route::get('/testimonial-post/create',[TestimonialPostController::class,'create'])->name('testimonial-posts.create');
Route::post('/testimonial-post/store',[TestimonialPostController::class,'store'])->name('testimonial-posts.store');
Route::get('/testimonial-post/edit/{id}',[TestimonialPostController::class,'edit'])->name('testimonial-posts.edit');
Route::put('/testimonial-post/update/{id}',[TestimonialPostController::class,'update'])->name('testimonial-posts.update');
Route::delete('/testimonial-post/distory/{id}',[TestimonialPostController::class,'distroy'])->name('testimonial-posts.distory');
Route::get('/testimonial-post/view/{id}',[TestimonialPostController::class,'view'])->name('testimonial-posts.view');

// testimonial-post route end 

// schedule-metting route start

Route::get('/schedule-metting',[ScheduleMettingController::class,'index'])->name('schedule-mettings.index');
Route::get('/schedule-metting/getdata',[ScheduleMettingController::class,'getdata'])->name('schedule-mettings.getdata');
Route::get('/schedule-metting/create',[ScheduleMettingController::class,'create'])->name('schedule-mettings.create');
Route::post('/schedule-metting/store',[ScheduleMettingController::class,'store'])->name('schedule-mettings.store');
Route::get('/schedule-metting/edit/{id}',[ScheduleMettingController::class,'edit'])->name('schedule-mettings.edit');
Route::put('/schedule-metting/update/{id}',[ScheduleMettingController::class,'update'])->name('schedule-mettings.update');
Route::delete('/schedule-metting/distory/{id}',[ScheduleMettingController::class,'distroy'])->name('schedule-mettings.distory');
Route::get('/schedule-metting/view/{id}',[ScheduleMettingController::class,'view'])->name('schedule-mettings.view');

// Schedule-metting route end


// blog banner route start 

Route::get('/blog-banner',[BlogBannerController::class,'index'])->name('blog-banners.index');
Route::get('/blog-banner/getdata',[BlogBannerController::class,'getdata'])->name('blog-banners.getdata');
Route::get('/blog-banner/create',[BlogBannerController::class,'create'])->name('blog-banners.create');
Route::post('/blog-banner/store',[BlogBannerController::class,'store'])->name('blog-banners.store');
Route::get('/blog-banner/edit/{id}',[BlogBannerController::class,'edit'])->name('blog-banners.edit');
Route::put('/blog-banner/update/{id}',[BlogBannerController::class,'update'])->name('blog-banners.update');
Route::delete('/blog-banner/distory/{id}',[BlogBannerController::class,'distroy'])->name('blog-banners.distroy');
Route::get('/blog-banner/view/{id}',[BlogBannerController::class,'view'])->name('blog-banners.view');

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
Route::get('/about-us-banner/getdata',[AboutUsBannerController::class,'getdata'])->name('about-us-banners.getdata');
Route::get('/about-us-banner/create',[AboutUsBannerController::class,'create'])->name('about-us-banners.create');
Route::post('/about-us-banner/store',[AboutUsBannerController::class,'store'])->name('about-us-banners.store');
Route::get('/about-us-banner/edit/{id}',[AboutUsBannerController::class,'edit'])->name('about-us-banners.edit');
Route::put('/about-us-banner/update/{id}',[AboutUsBannerController::class,'update'])->name('about-us-banners.update');
Route::delete('/about-us-banner/distory/{id}',[AboutUsBannerController::class,'distroy'])->name('about-us-banners.distroy');
Route::get('/about-us-banner/view/{id}',[AboutUsBannerController::class,'view'])->name('about-us-banners.view');


//end of  about us page  banner 


// about us page about information 
Route::get('/about-us-info',[AboutUsInformationController::class,'index'])->name('about-us-infos.index');
Route::get('/about-us-info/getdata',[AboutUsInformationController::class,'getdata'])->name('about-us-infos.getdata');
Route::get('/about-us-info/create',[AboutUsInformationController::class,'create'])->name('about-us-infos.create');
Route::post('/about-us-info/store',[AboutUsInformationController::class,'store'])->name('about-us-infos.store');
Route::get('/about-us-info/edit/{id}',[AboutUsInformationController::class,'edit'])->name('about-us-infos.edit');
Route::put('/about-us-info/update/{id}',[AboutUsInformationController::class,'update'])->name('about-us-infos.update');
Route::delete('/about-us-info/distory/{id}',[AboutUsInformationController::class,'distroy'])->name('about-us-infos.distroy');
Route::get('/about-us-info/view/{id}',[AboutUsInformationController::class,'view'])->name('about-us-infos.view');
// end of about us page about information 

// purpose route 

Route::get('/purpose',[PurposeController::class,'index'])->name('purposes.index');
Route::get('/purpose/getdata',[PurposeController::class,'getdata'])->name('purposes.getdata');
Route::get('/purpose/create',[PurposeController::class,'create'])->name('purposes.create');
Route::post('/purpose/store',[PurposeController::class,'store'])->name('purposes.store');
Route::get('/purpose/edit/{id}',[PurposeController::class,'edit'])->name('purposes.edit');
Route::put('/purpose/update/{id}',[PurposeController::class,'update'])->name('purposes.update');
Route::delete('/purpose/distory/{id}',[PurposeController::class,'distroy'])->name('purposes.distroy');
Route::get('/purpose/view/{id}',[PurposeController::class,'view'])->name('purposes.view');

// end purpose 


// vision route 

Route::get('/vision',[visionController::class,'index'])->name('visions.index');
Route::get('/vision/getdata',[visionController::class,'getdata'])->name('visions.getdata');
Route::get('/vision/create',[visionController::class,'create'])->name('visions.create');
Route::post('/vision/store',[visionController::class,'store'])->name('visions.store');
Route::get('/vision/edit/{id}',[visionController::class,'edit'])->name('visions.edit');
Route::put('/vision/update/{id}',[visionController::class,'update'])->name('visions.update');
Route::delete('/vision/distory/{id}',[visionController::class,'distroy'])->name('visions.distroy');
Route::get('/vision/view/{id}',[visionController::class,'view'])->name('visions.view');

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
Route::get('/about-chairman/getdata',[AboutChairmanController::class,'getdata'])->name('about-chairmans.getdata');
Route::get('/about-chairman/create',[AboutChairmanController::class,'create'])->name('about-chairmans.create');
Route::post('/about-chairman/store',[AboutChairmanController::class,'store'])->name('about-chairmans.store');
Route::get('/about-chairman/edit/{id}',[AboutChairmanController::class,'edit'])->name('about-chairmans.edit');
Route::put('/about-chairman/update/{id}',[AboutChairmanController::class,'update'])->name('about-chairmans.update');
Route::delete('/about-chairman/distory/{id}',[AboutChairmanController::class,'distroy'])->name('about-chairmans.distroy');
Route::get('/about-chairman/view/{id}',[AboutChairmanController::class,'view'])->name('about-chairmans.view');


