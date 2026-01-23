/**
 * Professional Scroll & Load Animations
 * Animates all sections when page loads and when scrolling into view
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Create Intersection Observer for scroll-triggered animations
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Skip if element already has inline animation
                if (element.getAttribute('data-animated') === 'true') {
                    return;
                }
                
                // Skip hero elements - they have their own animations
                if (element.closest('.hero')) {
                    return;
                }
                
                // Get animation type from class or data attribute
                const animationType = getAnimationType(element);
                const delay = element.getAttribute('data-delay') || '0s';
                
                // Apply animation based on type
                let animationName = 'fadeUp';
                switch(animationType) {
                    case 'slideInLeft':
                        animationName = 'slideInLeft';
                        break;
                    case 'slideInRight':
                        animationName = 'slideInRight';
                        break;
                    case 'slideInUp':
                        animationName = 'slideInUp';
                        break;
                    case 'scaleIn':
                        animationName = 'scaleIn';
                        break;
                }
                
                element.style.animation = `${animationName} 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) ${delay} forwards`;
                element.setAttribute('data-animated', 'true');
            }
        });
    }, observerOptions);

    function getAnimationType(element) {
        if (element.classList.contains('slide-in-left')) return 'slideInLeft';
        if (element.classList.contains('slide-in-right')) return 'slideInRight';
        if (element.classList.contains('fade-up')) return 'fadeUp';
        if (element.classList.contains('scale-in')) return 'scaleIn';
        if (element.closest('.about') && element.tagName === 'IMG') return 'slideInRight';
        if (element.closest('.about h2')) return 'slideInLeft';
        if (element.closest('.about p')) return 'fadeUp';
        if (element.closest('.services') && element.tagName === 'H2') return 'fadeUp';
        if (element.closest('.service-card')) return 'fadeUp';
        if (element.closest('.process') && element.tagName === 'H2') return 'fadeUp';
        if (element.closest('.process-grid') || element.closest('.process-item')) return 'slideInUp';
        if (element.closest('.stats') && element.tagName === 'H2') return 'fadeUp';
        if (element.closest('.stats-grid') || element.closest('.stat-item')) return 'scaleIn';
        if (element.closest('.cta') && element.tagName === 'H2') return 'slideInUp';
        if (element.closest('.cta') && element.tagName === 'P') return 'fadeUp';
        if (element.classList.contains('cta-btn')) return 'scaleIn';
        return 'fadeUp';
    }

    // Setup elements to observe
    const elementsToAnimate = [
        // About section
        '.about h2',
        '.about p',
        '.about img',
        '.about-text',
        '.about-image',
        
        // Services section
        '.services h2',
        '.service-card',
        
        // Process section
        '.process h2',
        '.process-item',
        '.process-grid > div',
        
        // Stats section
        '.stats h2',
        '.stat-item',
        '.stats-grid > div',
        
        // CTA section
        '.cta h2',
        '.cta p',
        '.cta-btn'
    ];

    elementsToAnimate.forEach(selector => {
        document.querySelectorAll(selector).forEach((element) => {
            animationObserver.observe(element);
        });
    });

    // Stagger animations for grid items
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach((card, index) => {
        const delay = 0.2 + (index * 0.12);
        card.style.animationDelay = delay + 's';
        card.style.opacity = '0';
    });

    const processItems = document.querySelectorAll('.process-grid > div, .process-item');
    processItems.forEach((item, index) => {
        const delay = 0.15 + (index * 0.1);
        item.style.animationDelay = delay + 's';
        item.style.opacity = '0';
    });

    const statsItems = document.querySelectorAll('.stats-grid > div, .stat-item');
    statsItems.forEach((item, index) => {
        const delay = 0.15 + (index * 0.15);
        item.style.animationDelay = delay + 's';
        item.style.opacity = '0';
    });

    // Add delays to about elements that don't have them
    const aboutText = document.querySelector('.about-text');
    const aboutImage = document.querySelector('.about-image');
    
    if (aboutText) {
        const h2 = aboutText.querySelector('h2');
        const paragraphs = aboutText.querySelectorAll('p');
        
        if (h2) h2.style.animationDelay = '0s';
        paragraphs.forEach((p, idx) => {
            p.style.animationDelay = (0.15 + (idx * 0.1)) + 's';
        });
    }
    
    if (aboutImage && aboutImage.querySelector('img')) {
        aboutImage.querySelector('img').style.animationDelay = '0.2s';
    }

    // Hero parallax effect (optional subtle effect)
    const hero = document.querySelector('.hero');
    const heroContent = document.querySelector('.hero-content');

    if (hero && heroContent) {
        window.addEventListener('scroll', () => {
            const scrollPos = window.scrollY;
            if (scrollPos < window.innerHeight) {
                heroContent.style.opacity = Math.max(0.3, 1 - (scrollPos / 1000));
            }
        }, { passive: true });
    }

    // Smooth scroll for anchor links
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

    // Enhanced 3D hover effect for cards (desktop only)
    if (window.innerWidth > 768) {
        const setupCardHover = (selector) => {
            document.querySelectorAll(selector).forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    const rotateX = (y / rect.height) * 8;
                    const rotateY = -(x / rect.width) * 8;
                    
                    this.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
                    this.style.boxShadow = `0 30px 80px rgba(59, 130, 246, 0.4)`;
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'perspective(1200px) rotateX(0) rotateY(0) scale(1)';
                    this.style.boxShadow = '0 10px 30px rgba(59, 130, 246, 0.08)';
                });
            });
        };

        setupCardHover('.service-card');
        setupCardHover('.process-grid > div');
    }
});



