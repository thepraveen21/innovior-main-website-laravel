@extends('layouts.app')

@section('title', 'Our Works - Projects & Case Studies')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/works.css') }}">
@endpush

@section('content')

<main class="works-page">

    <!-- ================= HERO ================= -->
    <section class="works-hero" style="background: url('{{ $hero && $hero->background_image ? asset('storage/' . $hero->background_image) : asset('images/works/works-hero.jpeg') }}') center/cover no-repeat;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>{{ $hero->heading ?? 'Our Works' }}</h1>
            <p>
                {{ $hero->description ?? 'Explore the innovative projects and transformative solutions we\'ve delivered to businesses worldwide.' }}
            </p>
        </div>
    </section>

    <!-- ================= FILTER ================= -->
    <section class="works-filter">
        <div class="container">
            <div class="filter-container">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                @foreach($categories as $category)
                    <button class="filter-btn" data-filter="{{ $category->slug }}">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= PROJECTS GRID ================= -->
    <section class="works-grid-section">
        <div class="container">
            @forelse($projects as $project)
                <div class="project-card" data-category="{{ $project->category->slug ?? 'all' }}">
                    <div class="project-image">
                        <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/works/project-1.jpeg') }}" alt="{{ $project->title }}">
                        <div class="project-overlay">
                            <a href="{{ $project->link ?? '#' }}" class="view-btn">View Project</a>
                        </div>
                    </div>
                    <div class="project-info">
                        <span class="project-category">{{ $project->category->name ?? 'Project' }}</span>
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                        <div class="project-meta">
                            @if($project->client)
                                <span class="meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <path d="M12 1v6m0 6v6"></path>
                                    </svg>
                                    {{ $project->client }}
                                </span>
                            @endif
                            @if($project->duration)
                                <span class="meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    {{ $project->duration }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No projects available.</p>
            @endforelse
        </div>

        <!-- Load More Button -->
        <div class="load-more-container">
            <button class="load-more-btn">Load More Projects</button>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="works-stats">
        <div class="container">
            <h2>{{ $stats->heading ?? 'Our Impact' }}</h2>
            <div class="stats-grid">
                @forelse($statItems as $item)
                    <div class="stat-card">
                        <div class="stat-icon {{ $item->color }}">
                            @if($item->icon_svg)
                                {!! $item->icon_svg !!}
                            @else
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            @endif
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">{{ $item->number }}</div>
                            <div class="stat-label">{{ $item->label }}</div>
                        </div>
                    </div>
                @empty
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
                @endforelse
            </div>
        </div>
    </section>

    <!-- ================= CTA ================= -->
    <section class="works-cta">
        <div class="container">
            <div class="cta-content">
                <h2>{{ $cta->heading ?? 'Ready to Transform Your Business?' }}</h2>
                <p>{{ $cta->description ?? 'Let\'s discuss how we can deliver similar results for your organization.' }}</p>
                <a href="{{ $cta->button_link ?? route('contact') }}" class="cta-btn">{{ $cta->button_text ?? 'Start Your Project' }}</a>
            </div>
        </div>
    </section>

</main>

@endsection
