/**
 * Dark Mode Toggle Functionality
 * Allows users to switch between light and dark themes
 */

document.addEventListener('DOMContentLoaded', function() {
    // Create theme toggle button
    const themeToggle = document.createElement('button');
    themeToggle.className = 'theme-toggle';
    themeToggle.title = 'Toggle Dark Mode';
    themeToggle.innerHTML = '🌙';
    themeToggle.setAttribute('aria-label', 'Toggle dark mode');
    document.body.appendChild(themeToggle);

    // Get saved theme preference or check system preference
    const savedTheme = localStorage.getItem('theme') || 'light';
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const preferredTheme = savedTheme === 'auto' ? (systemPrefersDark ? 'dark' : 'light') : savedTheme;

    // Apply saved theme
    if (preferredTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
        themeToggle.innerHTML = '☀️';
    }

    // Toggle dark mode on button click
    themeToggle.addEventListener('click', function() {
        const isDarkMode = document.documentElement.classList.toggle('dark-mode');
        
        // Update button icon
        themeToggle.innerHTML = isDarkMode ? '☀️' : '🌙';
        
        // Save preference
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        
        // Trigger smooth transition
        document.body.style.transition = 'background-color 0.3s ease, color 0.3s ease';
    });

    // Update button icon if system preference changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem('theme') === 'auto') {
            if (e.matches) {
                document.documentElement.classList.add('dark-mode');
                themeToggle.innerHTML = '☀️';
            } else {
                document.documentElement.classList.remove('dark-mode');
                themeToggle.innerHTML = '🌙';
            }
        }
    });

    // Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    
    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', function() {
            mobileToggle.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
        });

        // Close mobile menu when clicking a link
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }
});
