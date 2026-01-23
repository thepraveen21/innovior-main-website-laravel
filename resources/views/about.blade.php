@extends('layouts.app')

@section('title', 'About Innovior | Driving Digital Transformation')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    {{-- Ideally, FontAwesome should be loaded in your main layout, but adding here just in case for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<main class="about-page">

    <section class="about-hero">
        <div class="hero-overlay"></div>
        <div class="container hero-container">
            <div class="hero-content">
                <span class="hero-subtitle">{{ $hero->subtitle ?? 'Our Story' }}</span>
                <h1>{{ $hero->heading ?? 'About Innovior' }}</h1>
                <p>
                    {{ $hero->description ?? 'Driving digital transformation through innovation, expertise, and cutting-edge technology solutions. We build the future, today.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="about-overview section-padding">
        <div class="container">
            <div class="overview-grid">
                <div class="overview-text">
                    <h2 class="section-title">{{ $overview->heading ?? 'Who We Are' }}</h2>
                    <div class="overview-description">
                        {!! nl2br(e($overview->description ?? 'Innovior is a forward-thinking software development company delivering high-quality digital solutions to businesses worldwide. We specialize in building scalable, secure, and intelligent systems that help organizations transform, innovate, and lead in their industries.

With a team of passionate engineers, architects, and strategists, we\'ve partnered with startups, enterprises, and institutions to shape the future of technology. We believe in the power of code to solve complex problems and create meaningful impact.')) !!}
                    </div>
                    <a href="{{ $overview->button_link ?? '#contact' }}" class="btn btn-primary">{{ $overview->button_text ?? 'Work With Us' }}</a>
                </div>
                <div class="overview-stats">
                    <div class="stat-card">
                        <div class="stat-number">{{ $overview->stat1_number ?? '100+' }}</div>
                        <div class="stat-label">{{ $overview->stat1_label ?? 'Projects Delivered' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $overview->stat2_number ?? '50+' }}</div>
                        <div class="stat-label">{{ $overview->stat2_label ?? 'Happy Clients' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $overview->stat3_number ?? '15+' }}</div>
                        <div class="stat-label">{{ $overview->stat3_label ?? 'Team Members' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $overview->stat4_number ?? '5+' }}</div>
                        <div class="stat-label">{{ $overview->stat4_label ?? 'Years Experience' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-mvv section-padding bg-light">
        <div class="container">
            <div class="mvv-grid">
                <div class="mvv-card">
                    <div class="mvv-icon-wrapper blue">
                        <i class="{{ $mvv->mission_icon ?? 'fas fa-bullseye' }} mvv-icon"></i>
                    </div>
                    <h3>{{ $mvv->mission_title ?? 'Our Mission' }}</h3>
                    <p>
                        {{ $mvv->mission_description ?? 'To empower businesses through innovative technology, reliable digital solutions, and strategic partnerships that drive sustainable growth and digital excellence.' }}
                    </p>
                </div>

                <div class="mvv-card">
                    <div class="mvv-icon-wrapper purple">
                        <i class="{{ $mvv->vision_icon ?? 'fas fa-eye' }} mvv-icon"></i>
                    </div>
                    <h3>{{ $mvv->vision_title ?? 'Our Vision' }}</h3>
                    <p>
                        {{ $mvv->vision_description ?? 'To become a globally trusted technology partner, renowned for delivering transformative solutions that shape the future landscape of digital innovation.' }}
                    </p>
                </div>

                <div class="mvv-card">
                    <div class="mvv-icon-wrapper red">
                        <i class="{{ $mvv->values_icon ?? 'fas fa-heart' }} mvv-icon"></i>
                    </div>
                    <h3>{{ $mvv->values_title ?? 'Our Values' }}</h3>
                    <p>
                        {{ $mvv->values_description ?? 'Innovation, integrity, collaboration, and excellence are at our core. We are committed to quality, transparency, and the unwavering success of our clients.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-why section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $why->heading ?? 'Why Choose Innovior' }}</h2>
                <p class="section-subtitle">{{ $why->subtitle ?? 'We bring more than just code to the table.' }}</p>
            </div>

            <br>
            
            <div class="why-grid">
                @forelse($whyItems as $item)
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="{{ $item->icon }}"></i>
                        </div>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                @empty
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Expert Team</h4>
                        <p>Experienced engineers and architects with proven expertise in modern technologies and methodologies.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h4>Scalable Solutions</h4>
                        <p>Building robust systems designed to grow seamlessly with your business and adapt to future challenges.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4>Client-Centric</h4>
                        <p>Your success is our priority. We listen, collaborate deeply, and deliver solutions tailored specifically to your needs.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Security First</h4>
                        <p>Enterprise-grade security and strict compliance standards are integrated to protect your critical data and systems.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h4>Latest Technologies</h4>
                        <p>We stay ahead of the curve, utilizing modern frameworks, tools, and best practices to deliver cutting-edge results.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Ongoing Support</h4>
                        <p>Dedicated support and proactive maintenance ensure your solutions run smoothly for the long term.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="about-culture section-padding dark-mode">
        <div class="container">
            <div class="culture-content text-center">
                <h2 class="section-title text-white">{{ $culture->heading ?? 'Our Team & Culture' }}</h2>
                <p class="culture-description">
                    {{ $culture->description ?? 'We believe the best technology comes from talented, passionate people who collaborate, innovate, and push boundaries. Our diverse team brings expertise in web development, mobile apps, cloud architecture, IoT, and business consulting.' }}
                </p>
                <div class="culture-highlights">
                    @forelse($cultureHighlights as $highlight)
                        <div class="highlight">{{ $highlight->title }}</div>
                    @empty
                        <div class="highlight">Innovation</div>
                        <div class="highlight">Collaboration</div>
                        <div class="highlight">Excellence</div>
                        <div class="highlight">Continuous Learning</div>
                        <div class="highlight">Integrity</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="about-offices section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $offices->heading ?? 'Our Presence' }}</h2>
                <p class="section-subtitle">{{ $offices->subtitle ?? 'Connecting with clients locally and globally.' }}</p>
            </div>

            <br>
            

            <div class="offices-grid">
                @forelse($officeLocations as $location)
                    <div class="office-card">
                        <div class="office-map-visual">
                            <i class="{{ $location->icon }}"></i>
                        </div>
                        <div class="office-info">
                            <h4>{{ $location->title }}</h4>
                            @if($location->role)
                                <p class="office-role">{{ $location->role }}</p>
                            @endif
                            @if($location->address)
                                <p class="office-address">{{ $location->address }}</p>
                            @endif
                            @if($location->description)
                                <p class="office-desc">{{ $location->description }}</p>
                            @endif
                            <div class="office-contact">
                                @if($location->contact1_icon && $location->contact1_text)
                                    <div class="contact-item">
                                        <i class="{{ $location->contact1_icon }}"></i> <span>{{ $location->contact1_text }}</span>
                                    </div>
                                @endif
                                @if($location->contact2_icon && $location->contact2_text)
                                    <div class="contact-item">
                                        <i class="{{ $location->contact2_icon }}"></i> <span>{{ $location->contact2_text }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="office-card">
                        <div class="office-map-visual">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="office-info">
                            <h4>Sri Lanka (HQ)</h4>
                            <p class="office-role">Innovation & Development Hub</p>
                            <p class="office-address">Colombo, Sri Lanka</p>
                            <p class="office-desc">
                                Our main office serves as the heart of our software development operations, housing our engineering teams, architects, and strategists.
                            </p>
                            <div class="office-contact">
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i> <span>info@innovior.com</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i> <span>+94 77 123 4567</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="office-card">
                        <div class="office-map-visual">
                            <i class="fas fa-globe-americas"></i>
                        </div>
                        <div class="office-info">
                            <h4>Global Operations</h4>
                            <p class="office-role">Client Support & Delivery</p>
                            <p class="office-address">Asia, Europe, Americas</p>
                            <p class="office-desc">
                                Serving clients across multiple continents with distributed teams providing round-the-clock support and development services.
                            </p>
                            <div class="office-contact">
                                <div class="contact-item">
                                    <i class="fas fa-clock"></i> <span>24/7 Support Available</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-briefcase"></i> <span>Dev, Consulting & Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="about-partners section-padding bg-light" id="partners">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $partners->heading ?? 'Strategic Partners' }}</h2>
                <p class="section-subtitle">{{ $partners->subtitle ?? 'Collaborating with industry leaders to deliver world-class solutions.' }}</p>
            </div>

            <br>
            
            
            <div class="partners-grid">
                @forelse($partnerItems as $item)
                    <div class="partner-card">
                        <div class="partner-logo">
                            <i class="{{ $item->icon }} fa-3x"></i>
                        </div>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                @empty
                    <div class="partner-card">
                        <div class="partner-logo">
                           <i class="fas fa-microchip fa-3x"></i> </div>
                        <h4>Technology Partner</h4>
                        <p>Cutting-edge frameworks & infrastructure.</p>
                    </div>
                    <div class="partner-card">
                        <div class="partner-logo">
                            <i class="fas fa-cloud fa-3x"></i> </div>
                        <h4>Cloud Services</h4>
                        <p>Scalable cloud deployments & management.</p>
                    </div>
                    <div class="partner-card">
                        <div class="partner-logo">
                            <i class="fas fa-lock fa-3x"></i> </div>
                        <h4>Security Partner</h4>
                        <p>Enterprise-grade security & compliance.</p>
                    </div>
                    <div class="partner-card">
                        <div class="partner-logo">
                            <i class="fas fa-plug fa-3x"></i> </div>
                        <h4>Integration Partner</h4>
                        <p>Seamless system & platform integration.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</main>

@endsection