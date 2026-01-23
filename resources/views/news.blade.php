@extends('layouts.app')

@section('title', 'News & Updates')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endpush

@section('content')

<main class="news-page">

    <!-- ================= HERO ================= -->
    <section class="news-hero" style="background: url('{{ asset('images/news-hero.jpeg') }}') center/cover no-repeat;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>News & Updates</h1>
            <p>
                Stay informed about the latest developments, innovations,
                and success stories from Innovior.
            </p>
        </div>
    </section>

    <!-- ================= SEARCH & FILTER ================= -->
    <section class="news-search">
        <div class="container">
            <div class="search-container">
                <input type="text" placeholder="Search news and updates..." class="search-input">
                <div class="filter-buttons">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Technology</button>
                    <button class="filter-btn">Company</button>
                    <button class="filter-btn">Product Launch</button>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FEATURED NEWS ================= -->
    <section class="news-featured">
        <div class="container">
            <h2>Featured Story</h2>
            <div class="featured-news-card">
                <div class="featured-image">
                    <img src="{{ asset('images/featured-news.jpeg') }}" alt="Featured News">
                    <span class="featured-badge">Featured</span>
                </div>
                <div class="featured-content">
                    <div class="news-meta">
                        <span class="news-category">Technology</span>
                        <span class="news-date">January 2, 2026</span>
                    </div>
                    <h3>Innovior Launches Next-Gen AI Integration Platform</h3>
                    <p>
                        We're excited to announce the release of our revolutionary AI integration platform that simplifies machine learning implementation for enterprises of all sizes. This breakthrough solution combines our years of expertise in AI implementation with user-friendly design.
                    </p>
                    <a href="#" class="read-more">Read Full Story →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= NEWS GRID ================= -->
    <section class="news-grid-section">
        <div class="container">
            <h2>Latest News</h2>
            <div class="news-grid">
                <!-- News Card 1 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-1.jpeg') }}" alt="News">
                        <span class="news-tag">Company</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">January 5, 2026</span>
                            <span class="read-time">4 min read</span>
                        </div>
                        <h3>Expanding Our Engineering Team: We're Hiring!</h3>
                        <p>
                            Join our growing team of talented engineers and innovators. We're looking for passionate developers to help us build the future of digital solutions.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-2.jpeg') }}" alt="News">
                        <span class="news-tag">Technology</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">December 28, 2025</span>
                            <span class="read-time">6 min read</span>
                        </div>
                        <h3>Cloud Migration Best Practices: A Complete Guide</h3>
                        <p>
                            Discover proven strategies for migrating your business applications to the cloud. Our experts share insights from working with Fortune 500 companies.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-3.jpeg') }}" alt="News">
                        <span class="news-tag">Product Launch</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">December 20, 2025</span>
                            <span class="read-time">5 min read</span>
                        </div>
                        <h3>IoT Solutions Suite v2.0 Now Available</h3>
                        <p>
                            We've released the latest version of our IoT solutions suite with enhanced security features, improved performance, and new integrations.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>

                <!-- News Card 4 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-4.jpeg') }}" alt="News">
                        <span class="news-tag">Technology</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">December 15, 2025</span>
                            <span class="read-time">7 min read</span>
                        </div>
                        <h3>The Future of Cybersecurity in 2026</h3>
                        <p>
                            Explore emerging cybersecurity trends and threats as we head into 2026. Our security experts discuss zero-trust architecture and AI-powered threat detection.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>

                <!-- News Card 5 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-5.jpeg') }}" alt="News">
                        <span class="news-tag">Company</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">December 10, 2025</span>
                            <span class="read-time">3 min read</span>
                        </div>
                        <h3>Innovior Wins Industry Excellence Award 2025</h3>
                        <p>
                            We're honored to receive the Industry Excellence Award for our outstanding contributions to digital transformation and innovation in enterprise solutions.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>

                <!-- News Card 6 -->
                <article class="news-card">
                    <div class="news-card-image">
                        <img src="{{ asset('images/news-6.jpeg') }}" alt="News">
                        <span class="news-tag">Product Launch</span>
                    </div>
                    <div class="news-card-content">
                        <div class="news-meta-small">
                            <span class="news-date-small">December 5, 2025</span>
                            <span class="read-time">5 min read</span>
                        </div>
                        <h3>Advanced Analytics Dashboard Launch</h3>
                        <p>
                            Introducing our new advanced analytics dashboard with real-time insights, custom reporting, and predictive analytics for data-driven decision making.
                        </p>
                        <a href="#" class="news-link">Learn More →</a>
                    </div>
                </article>
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
                    <h2>Stay Updated</h2>
                    <p>Subscribe to our newsletter and get the latest news, insights, and updates delivered directly to your inbox.</p>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>

@endsection
