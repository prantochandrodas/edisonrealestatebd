<?php

use App\Http\Controllers\Backend\HomePage\FeaturedProjectController;
use App\Http\Controllers\Backend\HomePage\HomeAboutusController;
use App\Http\Controllers\Backend\HomePage\SliderController;
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


