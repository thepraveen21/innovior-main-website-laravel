<footer class="footer">
    <div class="container">
        <div class="footer-top">
            
            <div class="footer-column brand-column">
                <a href="{{ route('home') }}" class="footer-logo">{{ $footer && $footer->company_name ? $footer->company_name : 'Innovior' }}</a>
                <p class="brand-desc">
                    {{ $footer && $footer->company_description ? $footer->company_description : 'Leading technology company specializing in innovative solutions for the digital age. Transforming businesses through cutting-edge technology and expert consultation.' }}
                </p>
                <div class="social-links">
                    @if($footer && $footer->facebook_url)
                    <a href="{{ $footer->facebook_url }}" target="_blank" class="social-icon" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    @else
                    <a href="https://www.facebook.com/innovior" target="_blank" class="social-icon" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    @endif
                    @if($footer && $footer->linkedin_url)
                    <a href="{{ $footer->linkedin_url }}" target="_blank" class="social-icon" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                    @else
                    <a href="https://www.linkedin.com/company/innovior" target="_blank" class="social-icon" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                    @endif
                    @if($footer && $footer->instagram_url)
                    <a href="{{ $footer->instagram_url }}" target="_blank" class="social-icon" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    @else
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    @endif
                </div>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Our Services</h4>
                <ul class="footer-links">
                    <li><a href="#">IT Consultancy</a></li>
                    <li><a href="#">Software Development</a></li>
                    <li><a href="#">IoT & Robotics</a></li>
                    <li><a href="#">AI Implementation</a></li>
                    <li><a href="#">System Integration</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Education (IITS)</h4>
                <ul class="footer-links">
                    <li><a href="#">Professional Training</a></li>
                    <li><a href="#">Certificate Courses</a></li>
                    <li><a href="#">Workshops</a></li>
                    <li><a href="#">Corporate Training</a></li>
                    <li><a href="#">Careers @ Innovior</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4 class="footer-heading">Contact Us</h4>
                <ul class="contact-list">
                    @if($footer && $footer->address)
                    <li>
                        <span class="icon"></span>
                        <span>{{ $footer->address }}</span>
                        <br>
                    </li>
                    @else
                    <li>
                        <span class="icon"></span>
                        <span>67/7/8, Nattaranpotha,<br>Kundasale, Kandy</span>
                        <br>
                    </li>
                    @endif
                    @if($footer && $footer->phone)
                    <li>
                        <span class="icon"></span>
                        <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                    </li>
                    @else
                    <li>
                        <span class="icon"></span>
                        <a href="tel:+94778778828">+94 778 778 828</a>
                    </li>
                    @endif
                    @if($footer && $footer->email)
                    <li>
                        <span class="icon"></span>
                        <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                    </li>
                    @else
                    <li>
                        <span class="icon"></span>
                        <a href="mailto:info@innovior.lk">info@innovior.lk</a>
                    </li>
                    @endif
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>
                @if($footer && $footer->copyright_text)
                    {{ $footer->copyright_text }}
                @else
                    &copy; {{ date('Y') }} Innovior Software Solutions. All Rights Reserved.
                @endif
            </p>
        </div>
    </div>
</footer>