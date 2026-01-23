<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorksHero;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\WorksStats;
use App\Models\WorksStatItem;
use App\Models\WorksCta;

class WorksContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        WorksHero::create([
            'heading' => 'Our Works',
            'description' => 'Explore the innovative projects and transformative solutions we\'ve delivered to businesses worldwide.',
            'background_image' => null, // Will use default from public/images/works/works-hero.jpeg
        ]);

        // Project Categories
        $categories = [
            ['name' => 'Software Development', 'slug' => 'software', 'order' => 1, 'is_active' => true],
            ['name' => 'IoT Solutions', 'slug' => 'iot', 'order' => 2, 'is_active' => true],
            ['name' => 'AI & ML', 'slug' => 'ai', 'order' => 3, 'is_active' => true],
            ['name' => 'Enterprise', 'slug' => 'enterprise', 'order' => 4, 'is_active' => true],
        ];

        foreach ($categories as $categoryData) {
            ProjectCategory::create($categoryData);
        }

        // Projects
        $projects = [
            [
                'category_id' => 1, // Software Development
                'title' => 'E-Commerce Platform Redesign',
                'description' => 'Complete redesign and modernization of a large-scale e-commerce platform resulting in 40% increase in conversion rates.',
                'image' => null, // Will use default from public/images/works/project-1.jpeg
                'client' => 'Fortune 500 Company',
                'duration' => '6 Months',
                'link' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'category_id' => 2, // IoT Solutions
                'title' => 'Smart Agriculture Management System',
                'description' => 'IoT-based smart farming solution with real-time monitoring, reducing crop loss by 35% and increasing yield efficiency.',
                'image' => null,
                'client' => 'Agricultural Company',
                'duration' => '4 Months',
                'link' => '#',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'category_id' => 3, // AI & ML
                'title' => 'Predictive Analytics Engine',
                'description' => 'Machine learning-based predictive analytics platform enabling data-driven decision making and business intelligence.',
                'image' => null,
                'client' => 'Tech Startup',
                'duration' => '8 Months',
                'link' => '#',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'category_id' => 4, // Enterprise
                'title' => 'Digital Transformation Initiative',
                'description' => 'Comprehensive digital transformation strategy and implementation for global enterprise improving operational efficiency by 45%.',
                'image' => null,
                'client' => 'Global Enterprise',
                'duration' => '12 Months',
                'link' => '#',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'category_id' => 1, // Software Development
                'title' => 'Mobile Banking Application',
                'description' => 'Secure, user-friendly mobile banking app with advanced features serving 500K+ active users daily.',
                'image' => null,
                'client' => 'Financial Institution',
                'duration' => '9 Months',
                'link' => '#',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'category_id' => 2, // IoT Solutions
                'title' => 'Industrial IoT Infrastructure',
                'description' => 'Enterprise-grade IoT infrastructure for manufacturing with real-time analytics and predictive maintenance capabilities.',
                'image' => null,
                'client' => 'Manufacturing Co.',
                'duration' => '10 Months',
                'link' => '#',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        // Stats Section
        $stats = WorksStats::create([
            'heading' => 'Our Impact',
        ]);

        // Stat Items
        $statItems = [
            [
                'icon_svg' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"></path>
                </svg>',
                'color' => 'blue',
                'number' => '100+',
                'label' => 'Successful Projects',
                'order' => 1,
            ],
            [
                'icon_svg' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>',
                'color' => 'purple',
                'number' => '50+',
                'label' => 'Happy Clients',
                'order' => 2,
            ],
            [
                'icon_svg' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                </svg>',
                'color' => 'red',
                'number' => '40%',
                'label' => 'Avg. Efficiency Gain',
                'order' => 3,
            ],
            [
                'icon_svg' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>',
                'color' => 'blue',
                'number' => '500+',
                'label' => 'Team Hours Invested',
                'order' => 4,
            ],
        ];

        foreach ($statItems as $item) {
            WorksStatItem::create(array_merge($item, ['works_stats_id' => $stats->id]));
        }

        // CTA Section
        WorksCta::create([
            'heading' => 'Ready to Transform Your Business?',
            'description' => 'Let\'s discuss how we can deliver similar results for your organization.',
            'button_text' => 'Start Your Project',
            'button_link' => '/contact',
        ]);
    }
}
