<header class="navbar">
    <div class="container">
        
        <div class="logo">
            <a href="{{ route('home') }}">
             &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <img src="{{ asset('images/logo.jpg') }}" alt="Innovior Logo">
            </a>
        </div>

        <nav class="nav-menu">

            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

            <div class="navietm mega-dropdown">
                <button class="dropdown-toggle">Services</button>
                <div class="mega-menu">
                    <div class="mega-left">
                        <a href="{{ route('services') }}#it-consultancy">IT Consultancy</a>
                        <a href="{{ route('services') }}#software-development">Software Development</a>
                        <a href="{{ route('services') }}#iot-robotics">IoT & Robotics</a>
                        <a href="{{ route('services') }}#ai-implementation">AI Implementation</a>
                        <a href="{{ route('services') }}#training-education">Training & Education</a>
                        <a href="{{ route('services') }}#system-integration">System Integration</a>
                    </div>
                    <div class="mega-right">
                        <h3>Digital Solutions</h3>
                        <p>End-to-end technology services.</p>
                        <img src="{{ asset('images/services-illustration.png') }}" onerror="this.style.display='none'" alt="Services">
                        <a href="{{ route('services') }}" style="color:var(--primary-blue); font-weight:600; text-decoration:none;">View All &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="nav-item mega-dropdown">
                <button class="dropdown-toggle">Industries</button>
                <div class="mega-menu industries-mega">
                    <div class="industries-left">
                        <a href="{{ route('industries') }}#smart-agriculture">Smart Agriculture</a>
                        <a href="{{ route('industries') }}#manufacturing-retail">Manufacturing & Retail</a>
                        <a href="{{ route('industries') }}#commercial">Commercial</a>
                        <a href="{{ route('industries') }}#data-analytics">Data Analytics</a>
                    </div>
                </div>
            </div>

            <div class="nav-item mega-dropdown">
                <button class="dropdown-toggle">About</button>
                <div class="mega-menu about-mega">
                    <div class="about-links">
                        <a href="{{ route('about') }}">About Us</a>
                        <a href="{{ route('about') }}#partners">Our Partners</a>
                        <a href="{{ route('works') }}">Our Works</a>
                        <a href="{{ route('news') }}">News & Updates</a>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </div>
                    <div class="mega-right">
                        <h3>Careers</h3>
                        <p>Join the future of tech.</p>
                        <a href="{{ route('careers') }}" style="color:var(--primary-blue); font-weight:600; text-decoration:none;">View Openings &rarr;</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('careers') }}" class="nav-link">Careers</a>
            
            <a href="{{ route('contact') }}" class="contact-btn">Contact Us</a>

            @if(Auth::check())
                <div class="nav-item dropdown" style="display:inline-block;">
                    <button class="dropdown-toggle">{{ Auth::user()->name }}</button>
                    <div class="dropdown-menu">
                        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                            @csrf
                            <button type="submit" style="background:none;border:none;padding:0 1em;cursor:pointer;width:100%;text-align:left;">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif

        </nav>

        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('industries') }}">Industries</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('works') }}">Our Works</a>
        <a href="{{ route('news') }}">News & Updates</a>
        <a href="{{ route('careers') }}">Careers</a>
        <a href="{{ route('contact') }}" style="background: var(--primary-blue); color: white; margin-top: 20px; border-radius: 8px;">Contact Us</a>

        @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" style="background:none;border:none;padding:0 1em;cursor:pointer;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endif
    </nav>
</header>