<?php

use App\Http\Controllers\Backend\HomePage\FeaturedProjectController;
use App\Http\Controllers\Backend\HomePage\FeaturedProjectPostController;
use App\Http\Controllers\Backend\HomePage\HomeAboutusController;
use App\Http\Controllers\Backend\HomePage\SliderController;
use App\Http\Controllers\Backend\HomePage\TestimonialController;
use App\Http\Controllers\Backend\HomePage\TestimonialPostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('backend.home.slider.index');
// });

// home slider
Route::get('/',[SliderController::class,'index'])->name('slider.index');
Route::get('/slider/get_sliders',[SliderController::class,'getSliders'])->name('slider.get_sliders');
Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
Route::put('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::delete('/slider/distory/{id}',[SliderController::class,'distory'])->name('slider.distory');


// home about 

Route::get('/home_about',[HomeAboutusController::class,'index'])->name('home_about.index');
Route::get('/home_about/get_about',[HomeAboutusController::class,'getAbout'])->name('home_about.get_about');
Route::get('/home_about/create',[HomeAboutusController::class,'create'])->name('home_about.create');
Route::post('/home_about/store',[HomeAboutusController::class,'store'])->name('home_about.store');
Route::get('/home_about/edit/{id}',[HomeAboutusController::class,'edit'])->name('home_about.edit');
Route::put('/home_about/update/{id}',[HomeAboutusController::class,'update'])->name('home_about.update');
Route::delete('/home_about/distory/{id}',[HomeAboutusController::class,'distory'])->name('home_about.distory');
Route::get('/home_about/view/{id}',[HomeAboutusController::class,'view'])->name('home_about.view');




Route::get('/featured_projects',[FeaturedProjectController::class,'index'])->name('featured_project.index');
Route::get('/featured_projects/getdata',[FeaturedProjectController::class,'getdata'])->name('featured_project.getdata');
Route::get('/featured_projects/create',[FeaturedProjectController::class,'create'])->name('featured_project.create');
Route::post('/featured_projects/store',[FeaturedProjectController::class,'store'])->name('featured_project.store');
Route::get('/featured_projects/edit/{id}',[FeaturedProjectController::class,'edit'])->name('featured_project.edit');
Route::put('/featured_projects/update/{id}',[FeaturedProjectController::class,'update'])->name('featured_project.update');
Route::delete('/featured_projects/distory/{id}',[FeaturedProjectController::class,'distory'])->name('featured_project.distory');
Route::get('/featured_projects/view/{id}',[FeaturedProjectController::class,'view'])->name('featured_project.view');


Route::get('/featured_projects_post',[FeaturedProjectPostController::class,'index'])->name('featured_project_post.index');
Route::get('/featured_projects_post/getdata',[FeaturedProjectPostController::class,'getdata'])->name('featured_project_post.getdata');
Route::get('/featured_projects_post/create',[FeaturedProjectPostController::class,'create'])->name('featured_project_post.create');
Route::post('/featured_projects_post/store',[FeaturedProjectPostController::class,'store'])->name('featured_project_post.store');
Route::get('/featured_projects_post/edit/{id}',[FeaturedProjectPostController::class,'edit'])->name('featured_project_post.edit');
Route::put('/featured_projects_post/update/{id}',[FeaturedProjectPostController::class,'update'])->name('featured_project_post.update');
Route::delete('/featured_projects_post/distory/{id}',[FeaturedProjectPostController::class,'distroy'])->name('featured_project_post.distory');
Route::get('/featured_projects_post/view/{id}',[FeaturedProjectPostController::class,'view'])->name('featured_project_post.view');


Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonials.index');
Route::get('/testimonial/getdata',[TestimonialController::class,'getdata'])->name('testimonials.getdata');
Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonials.create');
Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonials.store');
Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('testimonials.edit');
Route::put('/testimonial/update/{id}',[TestimonialController::class,'update'])->name('testimonials.update');
Route::delete('/testimonial/distory/{id}',[TestimonialController::class,'distory'])->name('testimonials.distory');
Route::get('/testimonial/view/{id}',[TestimonialController::class,'view'])->name('testimonials.view');


Route::get('/testimonial_post',[TestimonialPostController::class,'index'])->name('testimonial_posts.index');
Route::get('/testimonial_post/getdata',[TestimonialPostController::class,'getdata'])->name('testimonial_posts.getdata');
Route::get('/testimonial_post/create',[TestimonialPostController::class,'create'])->name('testimonial_posts.create');
Route::post('/testimonial_post/store',[TestimonialPostController::class,'store'])->name('testimonial_posts.store');
Route::get('/testimonial_post/edit/{id}',[TestimonialPostController::class,'edit'])->name('testimonial_posts.edit');
Route::put('/testimonial_post/update/{id}',[TestimonialPostController::class,'update'])->name('testimonial_posts.update');
Route::delete('/testimonial_post/distory/{id}',[TestimonialPostController::class,'distroy'])->name('testimonial_posts.distory');
Route::get('/testimonial_post/view/{id}',[TestimonialPostController::class,'view'])->name('testimonial_posts.view');
