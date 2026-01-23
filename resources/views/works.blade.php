@extends('layouts.app')

@section('title', 'Our Works - Projects & Case Studies')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/works.css') }}">
@endpush

@section('content')

<main class="works-page">

    <!-- ================= HERO ================= -->
    <section class="works-hero" style="background: url('{{ asset('images/works/works-hero.jpeg') }}') center/cover no-repeat;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Our Works</h1>
            <p>
                Explore the innovative projects and transformative solutions
                we've delivered to businesses worldwide.
            </p>
        </div>
    </section>

    <!-- ================= FILTER ================= -->
    <section class="works-filter">
        <div class="container">
            <div class="filter-container">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="software">Software Development</button>
                <button class="filter-btn" data-filter="iot">IoT Solutions</button>
                <button class="filter-btn" data-filter="ai">AI & ML</button>
                <button class="filter-btn" data-filter="enterprise">Enterprise</button>
            </div>
        </div>
    </section>

    <!-- ================= PROJECTS GRID ================= -->
    <section class="works-grid-section">
        <div class="container">
            <!-- Project 1 -->
            <div class="project-card" data-category="software">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-1.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">Software Development</span>
                    <h3>E-Commerce Platform Redesign</h3>
                    <p>Complete redesign and modernization of a large-scale e-commerce platform resulting in 40% increase in conversion rates.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Fortune 500 Company
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            6 Months
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card" data-category="iot">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-2.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">IoT Solutions</span>
                    <h3>Smart Agriculture Management System</h3>
                    <p>IoT-based smart farming solution with real-time monitoring, reducing crop loss by 35% and increasing yield efficiency.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Agricultural Company
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            4 Months
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card" data-category="ai">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-3.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">AI & ML</span>
                    <h3>Predictive Analytics Engine</h3>
                    <p>Machine learning-based predictive analytics platform enabling data-driven decision making and business intelligence.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Tech Startup
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            8 Months
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="project-card" data-category="enterprise">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-4.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">Enterprise</span>
                    <h3>Digital Transformation Initiative</h3>
                    <p>Comprehensive digital transformation strategy and implementation for global enterprise improving operational efficiency by 45%.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Global Enterprise
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            12 Months
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="project-card" data-category="software">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-5.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">Software Development</span>
                    <h3>Mobile Banking Application</h3>
                    <p>Secure, user-friendly mobile banking app with advanced features serving 500K+ active users daily.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Financial Institution
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            9 Months
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project 6 -->
            <div class="project-card" data-category="iot">
                <div class="project-image">
                    <img src="{{ asset('images/works/project-6.jpeg') }}" alt="Project">
                    <div class="project-overlay">
                        <a href="#" class="view-btn">View Project</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">IoT Solutions</span>
                    <h3>Industrial IoT Infrastructure</h3>
                    <p>Enterprise-grade IoT infrastructure for manufacturing with real-time analytics and predictive maintenance capabilities.</p>
                    <div class="project-meta">
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            Manufacturing Co.
                        </span>
                        <span class="meta-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            10 Months
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="load-more-container">
            <button class="load-more-btn">Load More Projects</button>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="works-stats">
        <div class="container">
            <h2>Our Impact</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Successful Projects</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon red">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">40%</div>
                        <div class="stat-label">Avg. Efficiency Gain</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon blue">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Team Hours Invested</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CTA ================= -->
    <section class="works-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Transform Your Business?</h2>
                <p>Let's discuss how we can deliver similar results for your organization.</p>
                <a href="{{ route('contact') }}" class="cta-btn">Start Your Project</a>
            </div>
        </div>
    </section>

</main>

@endsection
