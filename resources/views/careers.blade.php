@extends('layouts.app')

@section('title', 'Careers | Innovior')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/careers.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="careers-hero">
    <div class="hero-inner">
        <span class="hero-tag">Careers at Innovior</span>
        <h1>Shape the Future of Digital Innovation</h1>
        <p>
            At Innovior, we build intelligent, scalable, and future-ready
            solutions that empower businesses worldwide. Join us and be part
            of a team that turns ideas into impact.
        </p>
        <a href="#openings" class="btn-primary">Explore Opportunities</a>
    </div>
</section>

<!-- COMPANY CULTURE -->
<section class="careers-culture">
    <div class="culture-content">
        <h2>Life at Innovior</h2>
        <p>
            We are a technology-driven organization built on innovation,
            collaboration, and continuous growth. Our teams work with
            cutting-edge technologies while maintaining a strong focus on
            quality, ethics, and long-term value.
        </p>
    </div>

    <div class="culture-grid">
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
    </div>
</section>

<!-- OPEN POSITIONS -->
<section class="careers-openings" id="openings">
    <h2>Current Openings</h2>

    <div class="openings-list">

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

        <div class="opening-card">
            <div>
                <h3>AI / Machine Learning Engineer</h3>
                <p>
                    Design and implement intelligent systems powered by data,
                    analytics, and machine learning.
                </p>
            </div>
            <div class="opening-meta">
                <span>Full-Time</span>
                <span>On-site</span>
            </div>
        </div>

        <div class="opening-card">
            <div>
                <h3>UI / UX Designer</h3>
                <p>
                    Create intuitive, elegant, and user-focused digital
                    experiences.
                </p>
            </div>
            <div class="opening-meta">
                <span>Full-Time</span>
                <span>On-site</span>
            </div>
        </div>

        <div class="opening-card">
            <div>
                <h3>Software Engineering Intern</h3>
                <p>
                    Gain hands-on experience by working alongside senior
                    engineers on real projects.
                </p>
            </div>
            <div class="opening-meta">
                <span>Internship</span>
                <span>On-site</span>
            </div>
        </div>

    </div>
</section>

<!-- WHY JOIN -->
<section class="careers-why">
    <h2>Why Join Innovior?</h2>

    <div class="why-grid">
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
    </div>
</section>

<!-- HIRING PROCESS -->
<section class="careers-process">
    <h2>Our Hiring Process</h2>

    <div class="process-timeline">
        <div class="process-step">Application Review</div>
        <div class="process-step">Technical Interview</div>
        <div class="process-step">Final Discussion</div>
        <div class="process-step">Offer & Onboarding</div>
    </div>
</section>

<!-- CTA -->
<section class="careers-cta">
    <h2>Take the Next Step in Your Career</h2>
    <p>
        Send your CV and portfolio to  
        <strong>careers@innovior.com</strong>
    </p>
    <a href="{{ route('contact') }}" class="btn-secondary">Contact Recruitment</a>
</section>

@endsection
