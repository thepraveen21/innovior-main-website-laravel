<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsHero;
use App\Models\NewsCategory;
use App\Models\NewsArticle;
use App\Models\NewsLatestSection;
use App\Models\NewsNewsletter;

class NewsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        NewsHero::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'News & Updates',
                'description' => 'Stay informed about the latest developments, innovations, and success stories from Innovior.',
                'background_image' => null,
            ]
        );

        // Categories
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology', 'order' => 1, 'is_active' => true],
            ['name' => 'Company', 'slug' => 'company', 'order' => 2, 'is_active' => true],
            ['name' => 'Product Launch', 'slug' => 'product-launch', 'order' => 3, 'is_active' => true],
        ];

        foreach ($categories as $categoryData) {
            NewsCategory::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Get categories for reference
        $technology = NewsCategory::where('slug', 'technology')->first();
        $company = NewsCategory::where('slug', 'company')->first();
        $productLaunch = NewsCategory::where('slug', 'product-launch')->first();

        // Featured Article
        NewsArticle::updateOrCreate(
            ['slug' => 'innovior-launches-next-gen-ai-integration-platform'],
            [
                'category_id' => $technology->id,
                'title' => 'Innovior Launches Next-Gen AI Integration Platform',
                'excerpt' => "We're excited to announce the release of our revolutionary AI integration platform that simplifies machine learning implementation for enterprises of all sizes. This breakthrough solution combines our years of expertise in AI implementation with user-friendly design.",
                'content' => null,
                'image' => null,
                'author' => 'Innovior Team',
                'published_date' => '2026-01-02',
                'read_time' => 8,
                'is_featured' => true,
                'is_active' => true,
                'order' => 0,
            ]
        );

        // Regular Articles
        $articles = [
            [
                'category_id' => $company->id,
                'title' => "Expanding Our Engineering Team: We're Hiring!",
                'slug' => 'expanding-our-engineering-team-were-hiring',
                'excerpt' => "Join our growing team of talented engineers and innovators. We're looking for passionate developers to help us build the future of digital solutions.",
                'published_date' => '2026-01-05',
                'read_time' => 4,
                'order' => 1,
            ],
            [
                'category_id' => $technology->id,
                'title' => 'Cloud Migration Best Practices: A Complete Guide',
                'slug' => 'cloud-migration-best-practices-complete-guide',
                'excerpt' => 'Discover proven strategies for migrating your business applications to the cloud. Our experts share insights from working with Fortune 500 companies.',
                'published_date' => '2025-12-28',
                'read_time' => 6,
                'order' => 2,
            ],
            [
                'category_id' => $productLaunch->id,
                'title' => 'IoT Solutions Suite v2.0 Now Available',
                'slug' => 'iot-solutions-suite-v2-now-available',
                'excerpt' => "We've released the latest version of our IoT solutions suite with enhanced security features, improved performance, and new integrations.",
                'published_date' => '2025-12-20',
                'read_time' => 5,
                'order' => 3,
            ],
            [
                'category_id' => $technology->id,
                'title' => 'The Future of Cybersecurity in 2026',
                'slug' => 'the-future-of-cybersecurity-in-2026',
                'excerpt' => 'Explore emerging cybersecurity trends and threats as we head into 2026. Our security experts discuss zero-trust architecture and AI-powered threat detection.',
                'published_date' => '2025-12-15',
                'read_time' => 7,
                'order' => 4,
            ],
            [
                'category_id' => $company->id,
                'title' => 'Innovior Wins Industry Excellence Award 2025',
                'slug' => 'innovior-wins-industry-excellence-award-2025',
                'excerpt' => "We're honored to receive the Industry Excellence Award for our outstanding contributions to digital transformation and innovation in enterprise solutions.",
                'published_date' => '2025-12-10',
                'read_time' => 3,
                'order' => 5,
            ],
            [
                'category_id' => $productLaunch->id,
                'title' => 'Advanced Analytics Dashboard Launch',
                'slug' => 'advanced-analytics-dashboard-launch',
                'excerpt' => 'Introducing our new advanced analytics dashboard with real-time insights, custom reporting, and predictive analytics for data-driven decision making.',
                'published_date' => '2025-12-05',
                'read_time' => 5,
                'order' => 6,
            ],
        ];

        foreach ($articles as $articleData) {
            NewsArticle::updateOrCreate(
                ['slug' => $articleData['slug']],
                [
                    'category_id' => $articleData['category_id'],
                    'title' => $articleData['title'],
                    'excerpt' => $articleData['excerpt'],
                    'content' => null,
                    'image' => null,
                    'author' => 'Innovior Team',
                    'published_date' => $articleData['published_date'],
                    'read_time' => $articleData['read_time'],
                    'is_featured' => false,
                    'is_active' => true,
                    'order' => $articleData['order'],
                ]
            );
        }

        // Latest News Section
        NewsLatestSection::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Latest News',
                'description' => null,
            ]
        );

        // Newsletter Section
        NewsNewsletter::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Stay Updated',
                'description' => 'Subscribe to our newsletter and get the latest news, insights, and updates delivered directly to your inbox.',
                'button_text' => 'Subscribe',
            ]
        );
    }
}
