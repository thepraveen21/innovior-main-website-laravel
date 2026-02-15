@extends('layouts.app')

@section('title', 'Industries We Empower | Innovior')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/industries.css') }}">
@endpush

@section('content')

<main class="industries-page">

    <section class="industries-hero" @if($hero && $hero->hero_image)style="background: url('{{ asset('storage/' . $hero->hero_image) }}') center/cover no-repeat;"@endif>
        <div class="hero-overlay"></div>
        <div class="hero-content fade-up">
            <span class="badge">{{ $hero->badge ?? 'Sectors We Serve' }}</span>
            <h1>{!! $hero ? nl2br(e($hero->heading)) : 'Technology Built for<br>Real-World Impact' !!}</h1>
            <p>
                {{ $hero->description ?? 'Innovior delivers tailored software solutions across diverse industries, helping organizations scale, innovate, and lead in their markets.' }}
            </p>
        </div>
    </section>

    <section class="industries-intro section-spacing">
        <div class="container">
            <div class="intro-grid">
                <div class="intro-text fade-right">
                    <h2>{{ $intro->heading ?? 'Understanding Your Challenges' }}</h2>
                    <p>
                        {{ $intro->description ?? 'Every industry operates differently. We don\'t believe in one-size-fits-all. Our domain experts dive deep into your sector\'s regulations, workflows, and customer expectations to build software that actually works.' }}
                    </p>
                </div>
                <div class="intro-stats fade-left">
                    <div class="stat-card">
                        <h3>{{ $intro->stat_1_number ?? '8+' }}</h3>
                        <p>{{ $intro->stat_1_label ?? 'Industries Served' }}</p>
                    </div>
                    <div class="stat-card">
                        <h3>{{ $intro->stat_2_number ?? '100%' }}</h3>
                        <p>{{ $intro->stat_2_label ?? 'Compliance Ready' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="industries-grid-section section-spacing">
        <div class="container">
            <div class="section-header center">
                <h4 class="sub-heading">Sectors</h4>
                <h2>Industries We Transform</h2>
            </div>

            <div class="industries-grid">

                @foreach($industries as $index => $industry)
                <a href="{{ $industry->link ?? '#' }}" class="industry-card fade-up" style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                    <div class="card-bg" style="background-image: url('{{ asset('storage/' . $industry->image) }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>{{ $industry->title }}</h3>
                        <p>{{ $industry->description }}</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </section>

    <section class="industries-why section-spacing">
        <div class="container">
            <div class="why-layout">
                <div class="why-content">
                    <h2>{{ $why->heading ?? 'Why Innovior for Your Industry?' }}</h2>
                    <p>{{ $why->description ?? 'We don\'t just write code. We understand the specific regulatory and operational demands of your sector.' }}</p>
                    
                    <div class="why-list">
                        @foreach($whyItems as $item)
                        <div class="why-item">
                            <h4>{{ $item->heading }}</h4>
                            <p>{{ $item->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="why-image">
                    <img src="{{ $why && $why->image ? asset('storage/' . $why->image) : asset('images/industries/why-us.jpg') }}" alt="Why Innovior">
                </div>
            </div>
        </div>
    </section>

    <section class="industries-cta">
        <div class="container">
            <div class="cta-content">
                <h2>{{ $cta->heading ?? 'Innovate Within Your Sector' }}</h2>
                <p>{{ $cta->description ?? 'Discuss your industry-specific challenges with our consultants today.' }}</p>
                <a href="{{ $cta->button_link ?? route('contact') }}" class="btn-glow">{{ $cta->button_text ?? 'Schedule a Consultation' }}</a>
            </div>
        </div>
    </section>

</main>

@endsection