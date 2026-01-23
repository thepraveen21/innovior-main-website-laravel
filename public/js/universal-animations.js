/**
 * Universal Animations for All Pages
 * Applies professional scroll animations to all sections across the website
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Create Intersection Observer for all sections
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const universalObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                animateElement(element);
            }
        });
    }, observerOptions);

    // Function to animate any element
    function animateElement(element) {
        // Get animation type from class
        let animationType = 'fadeUp';
        
        if (element.classList.contains('fade-up')) animationType = 'fadeUp';
        else if (element.classList.contains('slide-in-left')) animationType = 'slideInLeft';
        else if (element.classList.contains('slide-in-right')) animationType = 'slideInRight';
        else if (element.classList.contains('scale-in')) animationType = 'scaleIn';
        else if (element.tagName === 'H1' || element.tagName === 'H2') animationType = 'fadeUp';
        else if (element.tagName === 'P' && element.closest('.hero')) animationType = 'fadeUp';
        else if (element.closest('section') && element.tagName === 'IMG') animationType = 'slideInRight';
        
        // Apply animation
        applyAnimation(element, animationType);
    }

    function applyAnimation(element, animationType) {
        // Skip if already animated or has fade-up class (handled by CSS)
        if (element.getAttribute('data-animated') === 'true' || element.classList.contains('fade-up')) {
            return;
        }
        
        // Skip hero elements - they have their own animations
        if (element.closest('.hero')) {
            return;
        }
        
        const duration = '0.8s';
        const easing = 'cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        const delay = element.getAttribute('data-delay') || '0s';
        
        let animationName = 'fadeUp';
        switch(animationType) {
            case 'slideInLeft':
                animationName = 'slideInLeft';
                break;
            case 'slideInRight':
                animationName = 'slideInRight';
                break;
            case 'scaleIn':
                animationName = 'scaleIn';
                break;
        }
        
        element.style.animation = `${animationName} ${duration} ${easing} ${delay} forwards`;
        element.setAttribute('data-animated', 'true');
    }

    // Selectors for elements to animate on all pages
    const universalSelectors = [
        // Text elements
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'p',
        
        // Components
        '.card', '.item', '.section-item',
        '.work-item', '.news-item', '.service-item',
        '.team-member', '.process-item',
        '.testimonial', '.feature',
        
        // Lists and grid items
        '.grid > *', '.row > *',
        'ul li', 'ol li',
        
        // Buttons and links
        '.btn', 'button:not(.dropdown-toggle)',
        '.cta', '.action',
        
        // Images
        'img:not(.logo)',
        
        // Specific sections
        '.about-text', '.about-image',
        '.contact-form', '.form-group',
        '.hero-content',
        '.section h2', '.section-title',
        '.fade-up', '.slide-in-left', '.slide-in-right', '.scale-in'
    ];

    // Apply observer to all matching elements
    universalSelectors.forEach(selector => {
        document.querySelectorAll(selector).forEach((element) => {
            // Skip if already has animation
            if (element.style.animation || element.classList.contains('no-animate')) {
                return;
            }
            
            // Skip navbar and footer elements
            if (element.closest('.navbar') || element.closest('.footer-bottom')) {
                return;
            }
            
            universalObserver.observe(element);
        });
    });

    // Setup staggered animations for grid/list items
    setupStaggerAnimations();

    function setupStaggerAnimations() {
        // Work grid items
        const workItems = document.querySelectorAll('.work-grid > div, .works-grid > div, .portfolio-grid > div');
        workItems.forEach((item, index) => {
            item.setAttribute('data-delay', (index * 0.12) + 's');
        });

        // News items
        const newsItems = document.querySelectorAll('.news-grid > div, .news-items > div');
        newsItems.forEach((item, index) => {
            item.setAttribute('data-delay', (index * 0.12) + 's');
        });

        // Team members
        const teamMembers = document.querySelectorAll('.team-grid > div, .team-members > div');
        teamMembers.forEach((member, index) => {
            member.setAttribute('data-delay', (index * 0.15) + 's');
        });

        // Contact form fields
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach((group, index) => {
            group.setAttribute('data-delay', (index * 0.08) + 's');
        });

        // Industry cards
        const industryCards = document.querySelectorAll('.industry-card, .industry-item');
        industryCards.forEach((card, index) => {
            card.setAttribute('data-delay', (index * 0.12) + 's');
        });

        // Career positions
        const careerItems = document.querySelectorAll('.career-item, .job-item, .vacancy');
        careerItems.forEach((item, index) => {
            item.setAttribute('data-delay', (index * 0.1) + 's');
        });
    }

    // Enhanced 3D hover effect for cards (desktop only)
    if (window.innerWidth > 768) {
        setupCardHovers();
    }

    function setupCardHovers() {
        const cardSelectors = [
            '.card', '.work-item', '.news-item', '.team-member',
            '.service-item', '.industry-card', '.career-item'
        ];

        cardSelectors.forEach(selector => {
            document.querySelectorAll(selector).forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    const rotateX = (y / rect.height) * 6;
                    const rotateY = -(x / rect.width) * 6;
                    
                    this.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.01)`;
                    this.style.boxShadow = `0 25px 70px rgba(59, 130, 246, 0.35)`;
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'perspective(1200px) rotateX(0) rotateY(0) scale(1)';
                    this.style.boxShadow = '0 10px 30px rgba(59, 130, 246, 0.08)';
                });
            });
        });
    }

    // Smooth scroll for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Parallax effect for hero sections on any page
    const heroSections = document.querySelectorAll('.hero, [class*="hero"], .banner, [class*="banner"]');
    heroSections.forEach(hero => {
        const content = hero.querySelector('[class*="content"], h1, h2');
        if (content) {
            window.addEventListener('scroll', () => {
                const scrollPos = window.scrollY;
                const heroHeight = hero.offsetHeight;
                
                if (scrollPos < heroHeight) {
                    content.style.opacity = Math.max(0.3, 1 - (scrollPos / 1000));
                }
            }, { passive: true });
        }
    });
});
