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
            <span class="badge">Our Expertise</span>
            <h1>Digital Solutions for<br>Modern Enterprises</h1>
            <p>
                We build intelligent, scalable, and secure systems that drive 
                business growth and operational excellence.
            </p>
        </div>
    </section>

    <div class="service-nav-wrapper">
        <div class="container">
            <nav class="service-nav">
                <a href="#it-consultancy" class="nav-pill">IT Consultancy</a>
                <a href="#software-development" class="nav-pill">Software Dev</a>
                <a href="#iot-robotics" class="nav-pill">IoT & Robotics</a>
                <a href="#ai-implementation" class="nav-pill">AI Solutions</a>
                <a href="#training-education" class="nav-pill">Education</a>
            </nav>
        </div>
    </div>

    <section id="it-consultancy" class="service-section">
        <div class="container service-grid">
            <div class="service-text fade-right">
               
                <h2>IT Consultancy</h2>
                <p>
                    Align your technology with your business goals. We provide strategic 
                    guidance to help you navigate digital transformation, optimize infrastructure, 
                    and reduce operational risks.
                </p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Digital Strategy & Roadmaps</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Cloud & Infrastructure Audits</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Cybersecurity Assessment</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Tech Stack Modernization</span>
                    </div>
                </div>
            </div>

            <div class="service-image fade-left">
                <div class="image-bg"></div>
                <img src="{{ asset('images/services/it-consultancy.jpeg') }}" alt="IT Consultancy">
            </div>
        </div>
    </section>

    <section id="software-development" class="service-section alt">
        <div class="container service-grid reverse-grid">
            <div class="service-image fade-right">
                <div class="image-bg"></div>
                <img src="{{ asset('images/services/software-development.jpeg') }}" alt="Software Development">
            </div>

            <div class="service-text fade-left">
               
                <h2>Software Development</h2>
                <p>
                    We engineer high-performance software tailored to your specific needs. 
                    From consumer-facing apps to complex enterprise ERPs, we build code that scales.
                </p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Custom Web Applications</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Mobile Apps (iOS & Android)</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>SaaS Product Development</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>API Development & Integration</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="iot-robotics" class="service-section">
        <div class="container service-grid">
            <div class="service-text fade-right">
            
                <h2>IoT & Robotics</h2>
                <p>
                    Bridge the physical and digital worlds. We develop smart IoT ecosystems 
                    and robotic automation systems that improve efficiency and provide real-time data.
                </p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Industrial Automation</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Smart Agriculture Solutions</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>IoT Sensor Networks</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Robotic Process Control</span>
                    </div>
                </div>
            </div>

            <div class="service-image fade-left">
                <div class="image-bg"></div>
                <img src="{{ asset('images/services/iot-robotics.jpg') }}" alt="IoT & Robotics">
            </div>
        </div>
    </section>

    <section id="ai-implementation" class="service-section alt">
        <div class="container service-grid reverse-grid">
            <div class="service-image fade-right">
                <div class="image-bg"></div>
                <img src="{{ asset('images/services/ai.jpg') }}" alt="AI Implementation">
            </div>

            <div class="service-text fade-left">
                
                <h2>AI & Machine Learning</h2>
                <p>
                    Turn data into decisions. We implement AI models that automate complex tasks, 
                    predict trends, and personalize customer experiences.
                </p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Predictive Analytics</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Computer Vision Systems</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>NLP & Chatbots</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Automated Decision Engines</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="training-education" class="service-section">
        <div class="container service-grid">
            <div class="service-text fade-right">
                
                <h2>Training & Education</h2>
                <p>
                    Through Innovior Institute (IITS), we empower the next generation of tech leaders. 
                    Our industry-focused curriculum bridges the gap between theory and practice.
                </p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Corporate Tech Training</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Full-Stack Bootcamps</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>IoT & AI Workshops</span>
                    </div>
                    <div class="feature-item">
                        <span class="check">✔</span> <span>Certification Programs</span>
                    </div>
                </div>
            </div>

            <div class="service-image fade-left">
                <div class="image-bg"></div>
                <img src="{{ asset('images/services/training.jpeg') }}" alt="Training">
            </div>
        </div>
    </section>

    <section class="services-cta">
        <div class="container">
            <h2>Ready to Transform Your Business?</h2>
            <p>Let's discuss how Innovior can build the perfect solution for you.</p>
            <a href="{{ route('contact') }}" class="btn-glow">Get a Free Consultation</a>
        </div>
    </section>

</main>

@push('scripts')
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
@endpush

@endsection