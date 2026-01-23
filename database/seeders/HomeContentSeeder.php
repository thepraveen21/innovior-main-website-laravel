<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;
use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\StatsBanner;
use App\Models\CtaSection;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        // About Section
        AboutSection::create([
            'sub_heading' => 'Who We Are',
            'heading' => 'Building Long-Term Value Through Innovation',
            'paragraph_1' => 'Innovior is a technology-driven software company delivering modern, secure, and intelligent solutions for startups, enterprises, and institutions.',
            'paragraph_2' => 'We don\'t just write code; we architect solutions that stand the test of time, ensuring performance and reliability.',
            'stat_1_number' => '50+',
            'stat_1_label' => 'Projects',
            'stat_2_number' => '100%',
            'stat_2_label' => 'Success',
        ]);

        // Services
        Service::create([
            'icon' => 'images/service-web.jpeg',
            'title' => 'Web Development',
            'description' => 'High-performance web platforms using modern frameworks and cloud-ready architectures.',
            'link' => '#',
            'order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'icon' => 'images/service-mobile.jpeg',
            'title' => 'Mobile Applications',
            'description' => 'Scalable Android and iOS applications built for speed, security, and native user experience.',
            'link' => '#',
            'order' => 2,
            'is_active' => true,
        ]);

        Service::create([
            'icon' => 'images/service-enterprise.jpeg',
            'title' => 'Enterprise Systems',
            'description' => 'Powerful dashboards, internal systems, and automation platforms for large businesses.',
            'link' => '#',
            'order' => 3,
            'is_active' => true,
        ]);

        // Process Steps
        ProcessStep::create([
            'title' => 'Discover',
            'description' => 'Understanding your goals and challenges.',
            'order' => 1,
        ]);

        ProcessStep::create([
            'title' => 'Design',
            'description' => 'Crafting scalable and user-focused solutions.',
            'order' => 2,
        ]);

        ProcessStep::create([
            'title' => 'Develop',
            'description' => 'Building secure and optimized systems.',
            'order' => 3,
        ]);

        ProcessStep::create([
            'title' => 'Deploy',
            'description' => 'Launching, monitoring, and scaling.',
            'order' => 4,
        ]);

        // Stats Banner
        StatsBanner::create([
            'number' => '50+',
            'label' => 'Projects Completed',
            'order' => 1,
        ]);

        StatsBanner::create([
            'number' => '100%',
            'label' => 'Client Satisfaction',
            'order' => 2,
        ]);

        StatsBanner::create([
            'number' => '24/7',
            'label' => 'Support',
            'order' => 3,
        ]);

        StatsBanner::create([
            'number' => '5+',
            'label' => 'Years Innovation',
            'order' => 4,
        ]);

        // CTA Section
        CtaSection::create([
            'heading' => 'Let\'s Build Something Powerful',
            'description' => 'Partner with Innovior and transform your ideas into scalable digital products.',
            'button_text' => 'Start Your Project',
            'button_link' => '/contact',
        ]);
    }
}
