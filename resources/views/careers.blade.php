@extends('layouts.app')

@section('title', 'Careers | Innovior')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/careers.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="careers-hero" @if($hero && $hero->hero_image)style="background: url('{{ asset('storage/' . $hero->hero_image) }}') center/cover no-repeat;"@endif>
    <div class="hero-inner">
        <span class="hero-tag">{{ $hero->tag ?? 'Careers at Innovior' }}</span>
        <h1>{{ $hero->heading ?? 'Shape the Future of Digital Innovation' }}</h1>
        <p>
            {{ $hero->description ?? 'At Innovior, we build intelligent, scalable, and future-ready solutions that empower businesses worldwide. Join us and be part of a team that turns ideas into impact.' }}
        </p>
        <a href="{{ $hero->button_link ?? '#openings' }}" class="btn-primary">{{ $hero->button_text ?? 'Explore Opportunities' }}</a>
    </div>
</section>

<!-- COMPANY CULTURE -->
<section class="careers-culture">
    <div class="culture-content">
        <h2>{{ $culture->heading ?? 'Life at Innovior' }}</h2>
        <p>
            {{ $culture->description ?? 'We are a technology-driven organization built on innovation, collaboration, and continuous growth. Our teams work with cutting-edge technologies while maintaining a strong focus on quality, ethics, and long-term value.' }}
        </p>
    </div>

    <div class="culture-grid">
        @forelse($cultureCards as $card)
        <div class="culture-card">
            <h3>{{ $card->title }}</h3>
            <p>
                {{ $card->description }}
            </p>
        </div>
        @empty
        <div class="culture-card">
            <h3>Innovation-Driven</h3>
            <p>
                We constantly explore new technologies in AI, IoT, robotics,
                and cloud computing.
            </p>
        </div>

        <div class="culture-card">
            <h3>People-Centric</h3>
            <p>
                Our culture values respect, diversity, and open collaboration
                across teams.
            </p>
        </div>

        <div class="culture-card">
            <h3>Growth Focused</h3>
            <p>
                Structured learning paths, mentorship, and real career
                advancement.
            </p>
        </div>
        @endforelse
    </div>
</section>

<!-- OPEN POSITIONS -->
<section class="careers-openings" id="openings">
    <h2>Current Openings</h2>

    <div class="openings-list">
        @forelse($openings as $opening)
        <div class="opening-card">
            <div>
                <h3>{{ $opening->title }}</h3>
                <p>
                    {{ $opening->description }}
                </p>
            </div>
            <div class="opening-meta">
                <span>{{ $opening->job_type }}</span>
                <span>{{ $opening->location }}</span>
            </div>
        </div>
        @empty
        <div class="opening-card">
            <div>
                <h3>Software Engineer</h3>
                <p>
                    Develop high-performance web and enterprise applications
                    using modern frameworks and architectures.
                </p>
            </div>
            <div class="opening-meta">
                <span>Full-Time</span>
                <span>Hybrid</span>
            </div>
        </div>
        @endforelse
    </div>
</section>

<!-- WHY JOIN -->
<section class="careers-why">
    <h2>{{ $whySection->heading ?? 'Why Join Innovior?' }}</h2>

    <div class="why-grid">
        @forelse($whyItems as $item)
        <div class="why-item">
            <h4>{{ $item->title }}</h4>
            <p>
                {{ $item->description }}
            </p>
        </div>
        @empty
        <div class="why-item">
            <h4>Meaningful Work</h4>
            <p>
                Solve real business challenges with measurable impact.
            </p>
        </div>

        <div class="why-item">
            <h4>Global Exposure</h4>
            <p>
                Work with international clients and diverse teams.
            </p>
        </div>

        <div class="why-item">
            <h4>Modern Tech Stack</h4>
            <p>
                Use industry-leading tools, frameworks, and platforms.
            </p>
        </div>

        <div class="why-item">
            <h4>Long-Term Growth</h4>
            <p>
                We invest in people, not just positions.
            </p>
        </div>
        @endforelse
    </div>
</section>

<!-- HIRING PROCESS -->
<section class="careers-process">
    <h2>{{ $process->heading ?? 'Our Hiring Process' }}</h2>

    <div class="process-timeline">
        @forelse($processSteps as $step)
        <div class="process-step">{{ $step->title }}</div>
        @empty
        <div class="process-step">Application Review</div>
        <div class="process-step">Technical Interview</div>
        <div class="process-step">Final Discussion</div>
        <div class="process-step">Offer & Onboarding</div>
        @endforelse
    </div>
</section>

<!-- CTA -->
<section class="careers-cta">
    <h2>{{ $cta->heading ?? 'Take the Next Step in Your Career' }}</h2>
    <p>
        {{ $cta->description ?? 'Send your CV and portfolio to' }}  
        <strong>{{ $cta->email ?? 'careers@innovior.com' }}</strong>
    </p>
    <a href="{{ $cta->button_link ?? route('contact') }}" class="btn-secondary">{{ $cta->button_text ?? 'Contact Recruitment' }}</a>
</section>

@endsection
