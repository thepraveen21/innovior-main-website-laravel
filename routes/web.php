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
use App\Models\ServicesHero;
use App\Models\ServiceDetail;
use App\Models\ServicesCta;
use App\Models\IndustriesHero;
use App\Models\IndustriesIntro;
use App\Models\IndustryCard;
use App\Models\IndustriesWhy;
use App\Models\IndustriesWhyItem;
use App\Models\IndustriesCta;

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


Route::get('/services', function () {
    $hero = ServicesHero::first();
    $services = ServiceDetail::with('features')->where('is_active', true)->orderBy('order')->get();
    $cta = ServicesCta::first();
    
    return view('services', compact('hero', 'services', 'cta'));
})->name('services');
Route::get('/industries', function () {
    $hero = IndustriesHero::first();
    $intro = IndustriesIntro::first();
    $industries = IndustryCard::where('is_active', true)->orderBy('order')->get();
    $why = IndustriesWhy::first();
    $whyItems = IndustriesWhyItem::orderBy('order')->get();
    $cta = IndustriesCta::first();
    
    return view('industries', compact('hero', 'intro', 'industries', 'why', 'whyItems', 'cta'));
})->name('industries');
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
use App\Http\Controllers\Admin\ServicesContentController;
use App\Http\Controllers\Admin\IndustriesContentController;

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
    
    // Services Content Management
    Route::get('/services-content', [ServicesContentController::class, 'index'])->name('services-content.index');
    Route::post('/services-content/update-hero', [ServicesContentController::class, 'updateHero'])->name('services-content.update-hero');
    Route::post('/services-content/update-cta', [ServicesContentController::class, 'updateCta'])->name('services-content.update-cta');
    Route::post('/services-content/service', [ServicesContentController::class, 'storeService'])->name('services-content.service.store');
    Route::put('/services-content/service/{service}', [ServicesContentController::class, 'updateService'])->name('services-content.service.update');
    Route::delete('/services-content/service/{service}', [ServicesContentController::class, 'deleteService'])->name('services-content.service.delete');
    Route::post('/services-content/feature', [ServicesContentController::class, 'storeFeature'])->name('services-content.feature.store');
    Route::delete('/services-content/feature/{feature}', [ServicesContentController::class, 'deleteFeature'])->name('services-content.feature.delete');
    
    // Industries Content Management
    Route::get('/industries-content', [IndustriesContentController::class, 'index'])->name('industries-content.index');
    Route::post('/industries-content/update-hero', [IndustriesContentController::class, 'updateHero'])->name('industries-content.update-hero');
    Route::post('/industries-content/update-intro', [IndustriesContentController::class, 'updateIntro'])->name('industries-content.update-intro');
    Route::post('/industries-content/industry', [IndustriesContentController::class, 'storeIndustry'])->name('industries-content.industry.store');
    Route::put('/industries-content/industry/{industry}', [IndustriesContentController::class, 'updateIndustry'])->name('industries-content.industry.update');
    Route::delete('/industries-content/industry/{industry}', [IndustriesContentController::class, 'deleteIndustry'])->name('industries-content.industry.delete');
    Route::post('/industries-content/update-why', [IndustriesContentController::class, 'updateWhy'])->name('industries-content.update-why');
    Route::post('/industries-content/why-item', [IndustriesContentController::class, 'storeWhyItem'])->name('industries-content.why-item.store');
    Route::delete('/industries-content/why-item/{whyItem}', [IndustriesContentController::class, 'deleteWhyItem'])->name('industries-content.why-item.delete');
    Route::post('/industries-content/update-cta', [IndustriesContentController::class, 'updateCta'])->name('industries-content.update-cta');
});


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
