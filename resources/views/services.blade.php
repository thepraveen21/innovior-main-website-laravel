@extends('layouts.app')

@section('title', 'Services | Innovior')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/services.css') }}">
@endpush

@section('content')

<main class="services-page">

    <section class="services-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content fade-up">
            <span class="badge">{{ $hero->badge ?? 'Our Expertise' }}</span>
            <h1>{!! $hero ? nl2br(e($hero->heading)) : 'Digital Solutions for<br>Modern Enterprises' !!}</h1>
            <p>
                {{ $hero->description ?? 'We build intelligent, scalable, and secure systems that drive business growth and operational excellence.' }}
            </p>
        </div>
    </section>

    <div class="service-nav-wrapper">
        <div class="container">
            <nav class="service-nav">
                @foreach($services as $service)
                <a href="#{{ $service->slug }}" class="nav-pill">{{ $service->nav_title }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    @foreach($services as $index => $service)
    <section id="{{ $service->slug }}" class="service-section {{ $index % 2 == 1 ? 'alt' : '' }}">
        <div class="container service-grid {{ $index % 2 == 1 ? 'reverse-grid' : '' }}">
            @if($index % 2 == 0)
            <div class="service-text fade-right">
               
                <h2>{{ $service->heading }}</h2>
                <p>{{ $service->description }}</p>
                
                <div class="feature-list">
                    @foreach($service->features->sortBy('order') as $feature)
                    <div class="feature-item">
                        <span class="check">✔</span> <span>{{ $feature->feature_text }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="service-image fade-left">
                <div class="image-bg"></div>
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->heading }}">
            </div>
            @else
            <div class="service-image fade-right">
                <div class="image-bg"></div>
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->heading }}">
            </div>

            <div class="service-text fade-left">
               
                <h2>{{ $service->heading }}</h2>
                <p>{{ $service->description }}</p>
                
                <div class="feature-list">
                    @foreach($service->features->sortBy('order') as $feature)
                    <div class="feature-item">
                        <span class="check">✔</span> <span>{{ $feature->feature_text }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endforeach

    <section class="services-cta">
        <div class="container">
            <h2>{{ $cta->heading ?? 'Ready to Transform Your Business?' }}</h2>
            <p>{{ $cta->description ?? 'Let\'s discuss how Innovior can build the perfect solution for you.' }}</p>
            <a href="{{ $cta->button_link ?? route('contact') }}" class="btn-glow">{{ $cta->button_text ?? 'Get a Free Consultation' }}</a>
        </div>
    </section>

</main>

@push('scripts')
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
@endpush

@endsection