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
use App\Models\AboutHero;
use App\Models\AboutOverview;
use App\Models\AboutMvv;
use App\Models\AboutWhy;
use App\Models\AboutWhyItem;
use App\Models\AboutCulture;
use App\Models\AboutCultureHighlight;
use App\Models\AboutOffices;
use App\Models\AboutOfficeLocation;
use App\Models\AboutPartners;
use App\Models\AboutPartnerItem;
use App\Models\WorksHero;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\WorksStats;
use App\Models\WorksStatItem;
use App\Models\WorksCta;
use App\Models\NewsHero;
use App\Models\NewsCategory;
use App\Models\NewsArticle;
use App\Models\NewsLatestSection;
use App\Models\NewsNewsletter;

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
Route::get('/about', function () {
    $hero = AboutHero::first();
    $overview = AboutOverview::first();
    $mvv = AboutMvv::first();
    $why = AboutWhy::first();
    $whyItems = AboutWhyItem::orderBy('order')->get();
    $culture = AboutCulture::first();
    $cultureHighlights = AboutCultureHighlight::orderBy('order')->get();
    $offices = AboutOffices::first();
    $officeLocations = AboutOfficeLocation::orderBy('order')->get();
    $partners = AboutPartners::first();
    $partnerItems = AboutPartnerItem::orderBy('order')->get();
    
    return view('about', compact('hero', 'overview', 'mvv', 'why', 'whyItems', 'culture', 'cultureHighlights', 'offices', 'officeLocations', 'partners', 'partnerItems'));
})->name('about');
Route::view('/careers', 'careers')->name('careers');
Route::view('/resources', 'resources')->name('resources');
Route::view('/contact', 'contact')->name('contact');
Route::get('/news', function () {
    $hero = NewsHero::first();
    $categories = NewsCategory::where('is_active', true)->orderBy('order')->get();
    $featuredArticle = NewsArticle::with('category')->where('is_featured', true)->where('is_active', true)->first();
    $articles = NewsArticle::with('category')->where('is_featured', false)->where('is_active', true)->orderBy('published_date', 'desc')->get();
    $latestSection = NewsLatestSection::first();
    $newsletter = NewsNewsletter::first();
    
    return view('news', compact('hero', 'categories', 'featuredArticle', 'articles', 'latestSection', 'newsletter'));
})->name('news');
Route::get('/works', function () {
    $hero = WorksHero::first();
    $categories = ProjectCategory::where('is_active', true)->orderBy('order')->get();
    $projects = Project::with('category')->where('is_active', true)->orderBy('order')->get();
    $stats = WorksStats::first();
    $statItems = WorksStatItem::orderBy('order')->get();
    $cta = WorksCta::first();
    
    return view('works', compact('hero', 'categories', 'projects', 'stats', 'statItems', 'cta'));
})->name('works');
Route::get('/careers', fn () => view('careers'))->name('careers');


// Admin Dashboard Route
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\SliderController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\ServicesContentController;
use App\Http\Controllers\Admin\IndustriesContentController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\WorksContentController;
use App\Http\Controllers\Admin\NewsContentController;

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
    
    // About Content Management
    Route::get('/about-content', [AboutContentController::class, 'index'])->name('about-content.index');
    Route::post('/about-content/update-hero', [AboutContentController::class, 'updateHero'])->name('about-content.update-hero');
    Route::post('/about-content/update-overview', [AboutContentController::class, 'updateOverview'])->name('about-content.update-overview');
    Route::post('/about-content/update-mvv', [AboutContentController::class, 'updateMvv'])->name('about-content.update-mvv');
    Route::post('/about-content/update-why', [AboutContentController::class, 'updateWhy'])->name('about-content.update-why');
    Route::post('/about-content/why-item', [AboutContentController::class, 'storeWhyItem'])->name('about-content.why-item.store');
    Route::put('/about-content/why-item/{whyItem}', [AboutContentController::class, 'updateWhyItem'])->name('about-content.why-item.update');
    Route::delete('/about-content/why-item/{whyItem}', [AboutContentController::class, 'deleteWhyItem'])->name('about-content.why-item.delete');
    Route::post('/about-content/update-culture', [AboutContentController::class, 'updateCulture'])->name('about-content.update-culture');
    Route::post('/about-content/culture-highlight', [AboutContentController::class, 'storeCultureHighlight'])->name('about-content.culture-highlight.store');
    Route::delete('/about-content/culture-highlight/{highlight}', [AboutContentController::class, 'deleteCultureHighlight'])->name('about-content.culture-highlight.delete');
    Route::post('/about-content/update-offices', [AboutContentController::class, 'updateOffices'])->name('about-content.update-offices');
    Route::post('/about-content/office-location', [AboutContentController::class, 'storeOfficeLocation'])->name('about-content.office-location.store');
    Route::put('/about-content/office-location/{location}', [AboutContentController::class, 'updateOfficeLocation'])->name('about-content.office-location.update');
    Route::delete('/about-content/office-location/{location}', [AboutContentController::class, 'deleteOfficeLocation'])->name('about-content.office-location.delete');
    Route::post('/about-content/update-partners', [AboutContentController::class, 'updatePartners'])->name('about-content.update-partners');
    Route::post('/about-content/partner-item', [AboutContentController::class, 'storePartnerItem'])->name('about-content.partner-item.store');
    Route::put('/about-content/partner-item/{item}', [AboutContentController::class, 'updatePartnerItem'])->name('about-content.partner-item.update');
    Route::delete('/about-content/partner-item/{item}', [AboutContentController::class, 'deletePartnerItem'])->name('about-content.partner-item.delete');
    
    // Works Content Management
    Route::get('/works-content', [WorksContentController::class, 'index'])->name('works-content.index');
    Route::post('/works-content/update-hero', [WorksContentController::class, 'updateHero'])->name('works-content.update-hero');
    Route::post('/works-content/category', [WorksContentController::class, 'storeCategory'])->name('works-content.category.store');
    Route::put('/works-content/category/{category}', [WorksContentController::class, 'updateCategory'])->name('works-content.category.update');
    Route::delete('/works-content/category/{category}', [WorksContentController::class, 'deleteCategory'])->name('works-content.category.delete');
    Route::post('/works-content/project', [WorksContentController::class, 'storeProject'])->name('works-content.project.store');
    Route::put('/works-content/project/{project}', [WorksContentController::class, 'updateProject'])->name('works-content.project.update');
    Route::delete('/works-content/project/{project}', [WorksContentController::class, 'deleteProject'])->name('works-content.project.delete');
    Route::post('/works-content/update-stats', [WorksContentController::class, 'updateStats'])->name('works-content.update-stats');
    Route::post('/works-content/stat-item', [WorksContentController::class, 'storeStatItem'])->name('works-content.stat-item.store');
    Route::put('/works-content/stat-item/{statItem}', [WorksContentController::class, 'updateStatItem'])->name('works-content.stat-item.update');
    Route::delete('/works-content/stat-item/{statItem}', [WorksContentController::class, 'deleteStatItem'])->name('works-content.stat-item.delete');
    Route::post('/works-content/update-cta', [WorksContentController::class, 'updateCta'])->name('works-content.update-cta');
    
    // News Content Management
    Route::get('/news-content', [NewsContentController::class, 'index'])->name('news-content.index');
    Route::post('/news-content/update-hero', [NewsContentController::class, 'updateHero'])->name('news-content.update-hero');
    Route::post('/news-content/category', [NewsContentController::class, 'storeCategory'])->name('news-content.category.store');
    Route::put('/news-content/category/{category}', [NewsContentController::class, 'updateCategory'])->name('news-content.category.update');
    Route::delete('/news-content/category/{category}', [NewsContentController::class, 'deleteCategory'])->name('news-content.category.delete');
    Route::post('/news-content/article', [NewsContentController::class, 'storeArticle'])->name('news-content.article.store');
    Route::put('/news-content/article/{article}', [NewsContentController::class, 'updateArticle'])->name('news-content.article.update');
    Route::delete('/news-content/article/{article}', [NewsContentController::class, 'deleteArticle'])->name('news-content.article.delete');
    Route::post('/news-content/update-latest-section', [NewsContentController::class, 'updateLatestSection'])->name('news-content.update-latest-section');
    Route::post('/news-content/update-newsletter', [NewsContentController::class, 'updateNewsletter'])->name('news-content.update-newsletter');
});


Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
