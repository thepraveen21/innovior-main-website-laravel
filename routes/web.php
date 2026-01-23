<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Models\Slider;
use App\Models\AboutSection;
use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\StatsBanner;
use App\Models\CtaSection;

Route::get('/', function () {
    $sliders = Slider::where('is_active', true)->orderBy('order')->get();
    $about = AboutSection::first();
    $services = Service::where('is_active', true)->orderBy('order')->get();
    $processSteps = ProcessStep::orderBy('order')->get();
    $stats = StatsBanner::orderBy('order')->get();
    $cta = CtaSection::first();
    
    return view('home', compact('sliders', 'about', 'services', 'processSteps', 'stats', 'cta'));
})->name('home');

Route::get('/services', function () {
    return view('services');
});

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::view('/services', 'services')->name('services');
Route::view('/industries', 'industries')->name('industries');
Route::view('/about', 'about')->name('about');
Route::view('/careers', 'careers')->name('careers');
Route::view('/resources', 'resources')->name('resources');
Route::view('/contact', 'contact')->name('contact');
Route::view('/news', 'news')->name('news');
Route::view('/works', 'works')->name('works');
Route::get('/careers', fn () => view('careers'))->name('careers');


// Admin Dashboard Route
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\SliderController;
use App\Http\Controllers\Admin\HomeContentController;

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('pages', PageController::class);
    Route::resource('sliders', SliderController::class);
    
    // Home Content Management
    Route::get('/home-content', [HomeContentController::class, 'index'])->name('home-content.index');
    Route::post('/home-content/update-about', [HomeContentController::class, 'updateAbout'])->name('home-content.update-about');
    Route::post('/home-content/update-cta', [HomeContentController::class, 'updateCta'])->name('home-content.update-cta');
    
    // Services
    Route::post('/home-content/service', [HomeContentController::class, 'storeService'])->name('home-content.service.store');
    Route::put('/home-content/service/{service}', [HomeContentController::class, 'updateService'])->name('home-content.service.update');
    Route::delete('/home-content/service/{service}', [HomeContentController::class, 'deleteService'])->name('home-content.service.delete');
    
    // Process Steps
    Route::post('/home-content/process-step', [HomeContentController::class, 'storeProcessStep'])->name('home-content.process-step.store');
    Route::put('/home-content/process-step/{processStep}', [HomeContentController::class, 'updateProcessStep'])->name('home-content.process-step.update');
    Route::delete('/home-content/process-step/{processStep}', [HomeContentController::class, 'deleteProcessStep'])->name('home-content.process-step.delete');
    
    // Stats Banner
    Route::post('/home-content/stats-banner', [HomeContentController::class, 'storeStatsBanner'])->name('home-content.stats-banner.store');
    Route::put('/home-content/stats-banner/{statsBanner}', [HomeContentController::class, 'updateStatsBanner'])->name('home-content.stats-banner.update');
    Route::delete('/home-content/stats-banner/{statsBanner}', [HomeContentController::class, 'deleteStatsBanner'])->name('home-content.stats-banner.delete');
    
    // Sliders
    Route::post('/home-content/slider', [HomeContentController::class, 'storeSlider'])->name('home-content.slider.store');
    Route::put('/home-content/slider/{slider}', [HomeContentController::class, 'updateSlider'])->name('home-content.slider.update');
    Route::delete('/home-content/slider/{slider}', [HomeContentController::class, 'deleteSlider'])->name('home-content.slider.delete');
});


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
