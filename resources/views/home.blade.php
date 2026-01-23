@extends('layouts.app')

@section('title', 'Innovior | Digital Innovation Company')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

<main class="home">

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            @php
                $slider = \App\Models\Slider::where('is_active', true)->orderBy('order')->first();
            @endphp
            
            @if($slider)
                <span class="badge fade-up">{{ $slider->title }}</span>
                <h1 class="fade-up" style="transition-delay: 0.1s">
                    {!! nl2br(e($slider->description)) !!}
                </h1>

                @if($slider->button_text && $slider->button_link)
                    <div class="hero-btns fade-up" style="transition-delay: 0.3s">
                        <a href="{{ $slider->button_link }}" class="btn primary">{{ $slider->button_text }}</a>
                    </div>
                @endif
            @else
                <span class="badge fade-up">Innovating Tomorrow</span>
                <h1 class="fade-up" style="transition-delay: 0.1s">
                    Innovating the Future with <br>
                    <span class="gradient-text">Smart Digital Solutions</span>
                </h1>

                <p class="fade-up" style="transition-delay: 0.2s">
                    We design and build scalable software systems that empower
                    businesses to grow, automate, and lead in the digital era.
                </p>

                <div class="hero-btns fade-up" style="transition-delay: 0.3s">
                    <a href="{{ route('contact') }}" class="btn primary">Start Your Project</a>
                    <a href="{{ route('works') }}" class="btn outline">View Our Work</a>
                </div>
            @endif
        </div>

        <div class="scroll-down fade-up" style="transition-delay: 0.5s">
            <span>Scroll</span>
            <div class="mouse"></div>
        </div>
    </section>

    <section class="about section-spacing">
        <div class="container">
            <div class="about-grid">
                <div class="about-text fade-up">
                    <h4 class="sub-heading">{{ $about->sub_heading ?? 'Who We Are' }}</h4>
                    <h2>{{ $about->heading ?? 'Building Long-Term Value Through Innovation' }}</h2>
                    
                    <p>
                        {{ $about->paragraph_1 ?? 'Innovior is a technology-driven software company delivering modern, secure, and intelligent solutions for startups, enterprises, and institutions.' }}
                    </p>
                    @if($about && $about->paragraph_2)
                    <p>
                        {{ $about->paragraph_2 }}
                    </p>
                    @endif
                    
                    <div class="stats-row">
                        <div class="stat-mini">
                            <strong>{{ $about->stat_1_number ?? '50+' }}</strong> <span>{{ $about->stat_1_label ?? 'Projects' }}</span>
                        </div>
                        <div class="stat-mini">
                            <strong>{{ $about->stat_2_number ?? '100%' }}</strong> <span>{{ $about->stat_2_label ?? 'Success' }}</span>
                        </div>
                    </div>
                </div>

                <div class="about-image-wrapper fade-up" style="transition-delay:0.2s">
                    <div class="image-bg"></div>
                    <img src="{{ $about && $about->image ? asset('storage/' . $about->image) : asset('images/about.jpeg') }}" alt="Innovior Team" class="about-img">
                </div>
            </div>
        </div>
    </section>

    <section class="services section-spacing">
        <div class="container">
            <div class="section-header center fade-up">
                <h4 class="sub-heading">Our Expertise</h4>
                <h2>Core Services</h2>
                <p>Comprehensive technology solutions tailored to your business needs.</p>
            </div>

            <div class="service-grid">
                @forelse($services as $index => $service)
                <div class="service-card fade-up" style="transition-delay:{{ $index * 0.1 }}s">
                    <div class="card-icon">
                        @if(str_contains($service->icon, 'images/'))
                        <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}">
                        @else
                        <span style="font-size:48px;">{{ $service->icon }}</span>
                        @endif
                    </div>
                    <div class="card-content">
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->description }}</p>
                        @if($service->link)
                        <a href="{{ $service->link }}" class="learn-more">Learn more &rarr;</a>
                        @endif
                    </div>
                </div>
                @empty
                <div class="service-card fade-up">
                    <div class="card-icon">
                        <img src="{{ asset('images/service-web.jpeg') }}" alt="Web">
                    </div>
                    <div class="card-content">
                        <h3>Web Development</h3>
                        <p>High-performance web platforms using modern frameworks and cloud-ready architectures.</p>
                        <a href="#" class="learn-more">Learn more &rarr;</a>
                    </div>
                </div>

                <div class="service-card fade-up" style="transition-delay:0.1s">
                    <div class="card-icon">
                        <img src="{{ asset('images/service-mobile.jpeg') }}" alt="Mobile">
                    </div>
                    <div class="card-content">
                        <h3>Mobile Applications</h3>
                        <p>Scalable Android and iOS applications built for speed, security, and native user experience.</p>
                        <a href="#" class="learn-more">Learn more &rarr;</a>
                    </div>
                </div>

                <div class="service-card fade-up" style="transition-delay:0.2s">
                    <div class="card-icon">
                        <img src="{{ asset('images/service-enterprise.jpeg') }}" alt="Enterprise">
                    </div>
                    <div class="card-content">
                        <h3>Enterprise Systems</h3>
                        <p>Powerful dashboards, internal systems, and automation platforms for large businesses.</p>
                        <a href="#" class="learn-more">Learn more &rarr;</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="process section-spacing">
        <div class="container">
            <div class="section-header center fade-up">
                <h4 class="sub-heading">Workflow</h4>
                <h2>How We Work</h2>
            </div>

            <div class="process-steps">
                @forelse($processSteps as $index => $step)
                <div class="step-item fade-up" style="transition-delay:{{ $index * 0.1 }}s">
                    <div class="step-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="step-img">
                        <img src="{{ asset('images/process-' . ($index + 1) . '.jpeg') }}" alt="{{ $step->title }}">
                    </div>
                    <h4>{{ $step->title }}</h4>
                    <p>{{ $step->description }}</p>
                </div>
                @empty
                <div class="step-item fade-up">
                    <div class="step-num">01</div>
                    <div class="step-img">
                        <img src="{{ asset('images/process-1.jpeg') }}" alt="Discover">
                    </div>
                    <h4>Discover</h4>
                    <p>Understanding your goals and challenges.</p>
                </div>

                <div class="step-item fade-up" style="transition-delay:0.1s">
                    <div class="step-num">02</div>
                    <div class="step-img">
                        <img src="{{ asset('images/process-2.jpeg') }}" alt="Design">
                    </div>
                    <h4>Design</h4>
                    <p>Crafting scalable and user-focused solutions.</p>
                </div>

                <div class="step-item fade-up" style="transition-delay:0.2s">
                    <div class="step-num">03</div>
                    <div class="step-img">
                        <img src="{{ asset('images/process-3.jpeg') }}" alt="Develop">
                    </div>
                    <h4>Develop</h4>
                    <p>Building secure and optimized systems.</p>
                </div>

                <div class="step-item fade-up" style="transition-delay:0.3s">
                    <div class="step-num">04</div>
                    <div class="step-img">
                        <img src="{{ asset('images/process-4.jpeg') }}" alt="Deploy">
                    </div>
                    <h4>Deploy</h4>
                    <p>Launching, monitoring, and scaling.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="stats-banner">
        <div class="container">
            <div class="stats-flex">
                @forelse($stats as $index => $stat)
                <div class="stat-box fade-up" style="transition-delay:{{ $index * 0.1 }}s">
                    <h3>{{ $stat->number }}</h3>
                    <p>{{ $stat->label }}</p>
                </div>
                @if(!$loop->last)
                <div class="stat-divider"></div>
                @endif
                @empty
                <div class="stat-box fade-up">
                    <h3>50+</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-box fade-up" style="transition-delay:0.1s">
                    <h3>100%</h3>
                    <p>Client Satisfaction</p>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-box fade-up" style="transition-delay:0.2s">
                    <h3>24/7</h3>
                    <p>Support</p>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-box fade-up" style="transition-delay:0.3s">
                    <h3>5+</h3>
                    <p>Years Innovation</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="cta section-spacing">
        <div class="container">
            <div class="cta-box fade-up">
                <h2>{{ $cta->heading ?? "Let's Build Something Powerful" }}</h2>
                <p>{{ $cta->description ?? 'Partner with Innovior and transform your ideas into scalable digital products.' }}</p>
                <a href="{{ $cta->button_link ?? route('contact') }}" class="btn white-btn">{{ $cta->button_text ?? 'Start Your Project' }}</a>
            </div>
        </div>
    </section>

</main>

@push('scripts')
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
@endpush

@endsection