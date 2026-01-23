@extends('layouts.app')

@section('title', 'Contact Us')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')

<main class="contact-page">

    <!-- ================= HERO ================= -->
    <section class="contact-hero">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Let's Build Something Great Together</h1>
            <p>
                Have an idea? Need expert guidance? Our team is ready to turn your vision 
                into reality with scalable, secure digital solutions.
            </p>
        </div>
    </section>

    <!-- ================= CONTACT SECTION ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">

                <!-- LEFT: CONTACT INFO -->
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>
                        Reach out to us for partnerships, project inquiries, or any questions.
                        We typically respond within 24 hours.
                    </p>

                    <div class="info-card">
                        <div class="info-icon blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <strong>Address</strong>
                            <p>67/7/8,Nattaranpotha,Kundasale,Kandy</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon purple">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <path d="m22 7-10 5L2 7"></path>
                            </svg>
                        </div>
                        <div>
                            <strong>Email</strong>
                            <p><a href="mailto:info@innovior.lk">innoviorinfo@gmail.com</a></p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon red">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <strong>Phone</strong>
                            
                            <a href="tel:+94 778 778 828">+94 778 778 828</a>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <strong>Business Hours</strong>
                            <p>Mon – Sun, 9:00 AM – 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: CONTACT FORM -->
                <div class="contact-form-container">
                    <h2>Send Us a Message</h2>
                    
                    @if (session('status'))
                        <div style="background-color: #d4edda; color: #155724; padding: 12px 16px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="form-group">
                            <select name="service" required>
                                <option value="">Select Service</option>
                                <option value="consultation">IT Consultancy</option>
                                <option value="development">Software Development</option>
                                <option value="iot">IoT & Robotics</option>
                                <option value="maintenance">Support & Maintenance</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea name="message" rows="6" placeholder="Tell us about your project..." required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            Send Message
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= MAP SECTION ================= -->
    <section class="map-section">
        <h2>Find Us Here</h2>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.664091987287!2d80.67781337405115!3d7.27900831392492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36742fb1bfb79%3A0xd5c20febb4af49d0!2sInnovior%20institute%20of%20technology%20studies!5e0!3m2!1sen!2slk!4v1768102576611!5m2!1sen!2slk"
                loading="lazy"
                allowfullscreen=""
                referrerpolicy="no-referrer-when-downgrade"
                aria-hidden="false"
                tabindex="0">
            </iframe>
        </div>
    </section>

</main>

@endsection
