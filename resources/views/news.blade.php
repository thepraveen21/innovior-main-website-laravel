@extends('layouts.app')

@section('title', 'News & Updates')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endpush

@section('content')

<main class="news-page">

    <!-- ================= HERO ================= -->
    <section class="news-hero" style="background: url('{{ $hero && $hero->background_image ? asset('storage/' . $hero->background_image) : asset('images/news-hero.jpeg') }}') center/cover no-repeat;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>{{ $hero->heading ?? 'News & Updates' }}</h1>
            <p>
                {{ $hero->description ?? 'Stay informed about the latest developments, innovations, and success stories from Innovior.' }}
            </p>
        </div>
    </section>

    <!-- ================= SEARCH & FILTER ================= -->
    <section class="news-search">
        <div class="container">
            <div class="search-container">
                <input type="text" placeholder="Search news and updates..." class="search-input">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-category="all">All</button>
                    @foreach($categories as $category)
                    <button class="filter-btn" data-category="{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FEATURED NEWS ================= -->
    @if($featuredArticle)
    <section class="news-featured">
        <div class="container">
            <h2>Featured Story</h2>
            <div class="featured-news-card">
                <div class="featured-image">
                    <img src="{{ $featuredArticle->image ? asset('storage/' . $featuredArticle->image) : asset('images/featured-news.jpeg') }}" alt="{{ $featuredArticle->title }}">
                    <span class="featured-badge">Featured</span>
                </div>
                <div class="featured-content">
                    <div class="news-meta">
                        <span class="news-category">{{ $featuredArticle->category->name }}</span>
                        <span class="news-date">{{ $featuredArticle->published_date->format('F j, Y') }}</span>
                    </div>
                    <h3>{{ $featuredArticle->title }}</h3>
                    <p>
                        {{ $featuredArticle->excerpt }}
                    </p>
                    <a href="#" class="read-more">Read Full Story →</a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ================= NEWS GRID ================= -->
    <section class="news-grid-section">
        <div class="container">
            <h2>{{ $latestSection->heading ?? 'Latest News' }}</h2>
            <div class="news-grid">
                @forelse($articles as $article)
                <!-- News Card -->
                <article class="news-card" data-category="{{ $article->category->slug }}">
                    <div class="news-card-image">
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/news-1.jpeg') }}" alt="{{ $article->title }}">
                        <span class="news-tag">{{ $article->category->name }}</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">{{ $article->published_date->format('F j, Y') }}</span>
                            <span class="read-time">{{ $article->read_time }} min read</span>
                        </div>
                        <h3>{{ $article->title }}</h3>
                        <p>
                            {{ $article->excerpt }}
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>
                @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No news articles available at the moment.</p>
                </div>
                @endforelse
            </div>

            <!-- Load More Button -->
            <div class="load-more-container">
                <button class="load-more-btn">Load More Stories</button>
            </div>
        </div>
    </section>

    <!-- ================= NEWSLETTER ================= -->
    <section class="news-newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>{{ $newsletter->heading ?? 'Stay Updated' }}</h2>
                    <p>{{ $newsletter->description ?? 'Subscribe to our newsletter and get the latest news, insights, and updates delivered directly to your inbox.' }}</p>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">{{ $newsletter->button_text ?? 'Subscribe' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>

@endsection
