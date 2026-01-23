<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndustriesHero;
use App\Models\IndustriesIntro;
use App\Models\IndustryCard;
use App\Models\IndustriesWhy;
use App\Models\IndustriesWhyItem;
use App\Models\IndustriesCta;

class IndustriesContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        IndustriesHero::create([
            'badge' => 'Sectors We Serve',
            'heading' => 'Technology Built for<br>Real-World Impact',
            'description' => 'Innovior delivers tailored software solutions across diverse industries, helping organizations scale, innovate, and lead in their markets.',
        ]);

        // Intro Section
        IndustriesIntro::create([
            'heading' => 'Understanding Your Challenges',
            'description' => 'Every industry operates differently. We don\'t believe in one-size-fits-all. Our domain experts dive deep into your sector\'s regulations, workflows, and customer expectations to build software that actually works.',
            'stat_1_number' => '8+',
            'stat_1_label' => 'Industries Served',
            'stat_2_number' => '100%',
            'stat_2_label' => 'Compliance Ready',
        ]);

        // Industry Cards
        IndustryCard::create([
            'title' => 'Healthcare',
            'description' => 'Secure telemedicine, patient management systems, and HIPAA-compliant data solutions.',
            'image' => 'industries/healthcare.jpeg',
            'link' => '#',
            'order' => 1,
            'is_active' => true,
        ]);

        IndustryCard::create([
            'title' => 'Finance & Fintech',
            'description' => 'High-frequency trading platforms, secure payment gateways, and fraud detection AI.',
            'image' => 'industries/finance.jpeg',
            'link' => '#',
            'order' => 2,
            'is_active' => true,
        ]);

        IndustryCard::create([
            'title' => 'Manufacturing',
            'description' => 'IoT-enabled factory automation, supply chain tracking, and predictive maintenance.',
            'image' => 'industries/manufacturing.jpeg',
            'link' => '#',
            'order' => 3,
            'is_active' => true,
        ]);

        IndustryCard::create([
            'title' => 'Education',
            'description' => 'LMS platforms, student portals, and virtual classrooms for modern learning.',
            'image' => 'industries/education.jpeg',
            'link' => '#',
            'order' => 4,
            'is_active' => true,
        ]);

        IndustryCard::create([
            'title' => 'Retail & E-Commerce',
            'description' => 'Omnichannel shopping experiences, inventory management, and customer loyalty apps.',
            'image' => 'industries/ecommerce.jpeg',
            'link' => '#',
            'order' => 5,
            'is_active' => true,
        ]);

        IndustryCard::create([
            'title' => 'Logistics',
            'description' => 'Fleet management, route optimization, and real-time shipment tracking systems.',
            'image' => 'industries/logistics.jpeg',
            'link' => '#',
            'order' => 6,
            'is_active' => true,
        ]);

        // Why Section
        IndustriesWhy::create([
            'heading' => 'Why Innovior for Your Industry?',
            'description' => 'We don\'t just write code. We understand the specific regulatory and operational demands of your sector.',
            'image' => 'industries/why-us.jpg',
        ]);

        // Why Items
        IndustriesWhyItem::create([
            'heading' => 'Enterprise Security',
            'description' => 'Built-in compliance with GDPR, HIPAA, and ISO standards.',
            'order' => 1,
        ]);

        IndustriesWhyItem::create([
            'heading' => 'Scalable Architecture',
            'description' => 'Systems designed to handle millions of users and transactions.',
            'order' => 2,
        ]);

        IndustriesWhyItem::create([
            'heading' => 'Domain Expertise',
            'description' => 'Our team includes experts who have worked in your specific field.',
            'order' => 3,
        ]);

        // CTA Section
        IndustriesCta::create([
            'heading' => 'Innovate Within Your Sector',
            'description' => 'Discuss your industry-specific challenges with our consultants today.',
            'button_text' => 'Schedule a Consultation',
            'button_link' => '/contact',
        ]);
    }
}
