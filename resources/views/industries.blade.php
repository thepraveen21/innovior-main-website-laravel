@extends('layouts.app')

@section('title', 'Industries We Empower | Innovior')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/industries.css') }}">
@endpush

@section('content')

<main class="industries-page">

    <section class="industries-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content fade-up">
            <span class="badge">Sectors We Serve</span>
            <h1>Technology Built for<br>Real-World Impact</h1>
            <p>
                Innovior delivers tailored software solutions across diverse industries,
                helping organizations scale, innovate, and lead in their markets.
            </p>
        </div>
    </section>

    <section class="industries-intro section-spacing">
        <div class="container">
            <div class="intro-grid">
                <div class="intro-text fade-right">
                    <h2>Understanding Your Challenges</h2>
                    <p>
                        Every industry operates differently. We don't believe in one-size-fits-all. 
                        Our domain experts dive deep into your sector's regulations, workflows, 
                        and customer expectations to build software that actually works.
                    </p>
                </div>
                <div class="intro-stats fade-left">
                    <div class="stat-card">
                        <h3>8+</h3>
                        <p>Industries Served</p>
                    </div>
                    <div class="stat-card">
                        <h3>100%</h3>
                        <p>Compliance Ready</p>
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

                <a href="#" class="industry-card fade-up">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/healthcare.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Healthcare</h3>
                        <p>Secure telemedicine, patient management systems, and HIPAA-compliant data solutions.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

                <a href="#" class="industry-card fade-up" style="transition-delay: 0.1s">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/finance.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Finance & Fintech</h3>
                        <p>High-frequency trading platforms, secure payment gateways, and fraud detection AI.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

                <a href="#" class="industry-card fade-up" style="transition-delay: 0.2s">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/manufacturing.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Manufacturing</h3>
                        <p>IoT-enabled factory automation, supply chain tracking, and predictive maintenance.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

                <a href="#" class="industry-card fade-up">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/education.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Education</h3>
                        <p>LMS platforms, student portals, and virtual classrooms for modern learning.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

                <a href="#" class="industry-card fade-up" style="transition-delay: 0.1s">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/ecommerce.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Retail & E-Commerce</h3>
                        <p>Omnichannel shopping experiences, inventory management, and customer loyalty apps.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

                <a href="#" class="industry-card fade-up" style="transition-delay: 0.2s">
                    <div class="card-bg" style="background-image: url('{{ asset('images/industries/logistics.jpeg') }}')"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon"></div>
                        <h3>Logistics</h3>
                        <p>Fleet management, route optimization, and real-time shipment tracking systems.</p>
                        <span class="arrow">&rarr;</span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section class="industries-why section-spacing">
        <div class="container">
            <div class="why-layout">
                <div class="why-content">
                    <h2>Why Innovior for Your Industry?</h2>
                    <p>We don't just write code. We understand the specific regulatory and operational demands of your sector.</p>
                    
                    <div class="why-list">
                        <div class="why-item">
                            <h4> Enterprise Security</h4>
                            <p>Built-in compliance with GDPR, HIPAA, and ISO standards.</p>
                        </div>
                        <div class="why-item">
                            <h4> Scalable Architecture</h4>
                            <p>Systems designed to handle millions of users and transactions.</p>
                        </div>
                        <div class="why-item">
                            <h4> Domain Expertise</h4>
                            <p>Our team includes experts who have worked in your specific field.</p>
                        </div>
                    </div>
                </div>
                <div class="why-image">
                    <img src="{{ asset('images/industries/why-us.jpg') }}" alt="Why Innovior">
                </div>
            </div>
        </div>
    </section>

    <section class="industries-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Innovate Within Your Sector</h2>
                <p>Discuss your industry-specific challenges with our consultants today.</p>
                <a href="{{ route('contact') }}" class="btn-glow">Schedule a Consultation</a>
            </div>
        </div>
    </section>

</main>

@endsection