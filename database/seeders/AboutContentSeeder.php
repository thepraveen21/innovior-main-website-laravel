<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutHero;
use App\Models\AboutOverview;
use App\Models\AboutMvv;
use App\Models\AboutWhy;
use App\Models\AboutWhyItem;
use App\Models\AboutCulture;
use App\Models\AboutCultureHighlight;
use App\Models\AboutOffices;
use App\Models\AboutOfficeLocation;
use App\Models\AboutPartners;
use App\Models\AboutPartnerItem;

class AboutContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        AboutHero::create([
            'subtitle' => 'Our Story',
            'heading' => 'About Innovior',
            'description' => 'Driving digital transformation through innovation, expertise, and cutting-edge technology solutions. We build the future, today.',
        ]);

        // Overview Section
        AboutOverview::create([
            'heading' => 'Who We Are',
            'description' => "Innovior is a forward-thinking software development company delivering high-quality digital solutions to businesses worldwide. We specialize in building scalable, secure, and intelligent systems that help organizations transform, innovate, and lead in their industries.\n\nWith a team of passionate engineers, architects, and strategists, we've partnered with startups, enterprises, and institutions to shape the future of technology. We believe in the power of code to solve complex problems and create meaningful impact.",
            'button_text' => 'Work With Us',
            'button_link' => '#contact',
            'stat1_number' => '100+',
            'stat1_label' => 'Projects Delivered',
            'stat2_number' => '50+',
            'stat2_label' => 'Happy Clients',
            'stat3_number' => '15+',
            'stat3_label' => 'Team Members',
            'stat4_number' => '5+',
            'stat4_label' => 'Years Experience',
        ]);

        // Mission, Vision, Values
        AboutMvv::create([
            'mission_title' => 'Our Mission',
            'mission_description' => 'To empower businesses through innovative technology, reliable digital solutions, and strategic partnerships that drive sustainable growth and digital excellence.',
            'mission_icon' => 'fas fa-bullseye',
            'vision_title' => 'Our Vision',
            'vision_description' => 'To become a globally trusted technology partner, renowned for delivering transformative solutions that shape the future landscape of digital innovation.',
            'vision_icon' => 'fas fa-eye',
            'values_title' => 'Our Values',
            'values_description' => 'Innovation, integrity, collaboration, and excellence are at our core. We are committed to quality, transparency, and the unwavering success of our clients.',
            'values_icon' => 'fas fa-heart',
        ]);

        // Why Choose Section
        $why = AboutWhy::create([
            'heading' => 'Why Choose Innovior',
            'subtitle' => 'We bring more than just code to the table.',
        ]);

        // Why Items
        $whyItems = [
            ['icon' => 'fas fa-users', 'title' => 'Expert Team', 'description' => 'Experienced engineers and architects with proven expertise in modern technologies and methodologies.', 'order' => 1],
            ['icon' => 'fas fa-layer-group', 'title' => 'Scalable Solutions', 'description' => 'Building robust systems designed to grow seamlessly with your business and adapt to future challenges.', 'order' => 2],
            ['icon' => 'fas fa-handshake', 'title' => 'Client-Centric', 'description' => 'Your success is our priority. We listen, collaborate deeply, and deliver solutions tailored specifically to your needs.', 'order' => 3],
            ['icon' => 'fas fa-shield-alt', 'title' => 'Security First', 'description' => 'Enterprise-grade security and strict compliance standards are integrated to protect your critical data and systems.', 'order' => 4],
            ['icon' => 'fas fa-code', 'title' => 'Latest Technologies', 'description' => 'We stay ahead of the curve, utilizing modern frameworks, tools, and best practices to deliver cutting-edge results.', 'order' => 5],
            ['icon' => 'fas fa-headset', 'title' => 'Ongoing Support', 'description' => 'Dedicated support and proactive maintenance ensure your solutions run smoothly for the long term.', 'order' => 6],
        ];

        foreach ($whyItems as $item) {
            AboutWhyItem::create(array_merge($item, ['about_why_id' => $why->id]));
        }

        // Culture Section
        $culture = AboutCulture::create([
            'heading' => 'Our Team & Culture',
            'description' => 'We believe the best technology comes from talented, passionate people who collaborate, innovate, and push boundaries. Our diverse team brings expertise in web development, mobile apps, cloud architecture, IoT, and business consulting.',
        ]);

        // Culture Highlights
        $highlights = [
            ['title' => 'Innovation', 'order' => 1],
            ['title' => 'Collaboration', 'order' => 2],
            ['title' => 'Excellence', 'order' => 3],
            ['title' => 'Continuous Learning', 'order' => 4],
            ['title' => 'Integrity', 'order' => 5],
        ];

        foreach ($highlights as $highlight) {
            AboutCultureHighlight::create(array_merge($highlight, ['about_culture_id' => $culture->id]));
        }

        // Offices Section
        $offices = AboutOffices::create([
            'heading' => 'Our Presence',
            'subtitle' => 'Connecting with clients locally and globally.',
        ]);

        // Office Locations
        $locations = [
            [
                'icon' => 'fas fa-map-marker-alt',
                'title' => 'Sri Lanka (HQ)',
                'role' => 'Innovation & Development Hub',
                'address' => 'Colombo, Sri Lanka',
                'description' => 'Our main office serves as the heart of our software development operations, housing our engineering teams, architects, and strategists.',
                'contact1_icon' => 'fas fa-envelope',
                'contact1_text' => 'info@innovior.com',
                'contact2_icon' => 'fas fa-phone',
                'contact2_text' => '+94 77 123 4567',
                'order' => 1,
            ],
            [
                'icon' => 'fas fa-globe-americas',
                'title' => 'Global Operations',
                'role' => 'Client Support & Delivery',
                'address' => 'Asia, Europe, Americas',
                'description' => 'Serving clients across multiple continents with distributed teams providing round-the-clock support and development services.',
                'contact1_icon' => 'fas fa-clock',
                'contact1_text' => '24/7 Support Available',
                'contact2_icon' => 'fas fa-briefcase',
                'contact2_text' => 'Dev, Consulting & Support',
                'order' => 2,
            ],
        ];

        foreach ($locations as $location) {
            AboutOfficeLocation::create(array_merge($location, ['about_offices_id' => $offices->id]));
        }

        // Partners Section
        $partners = AboutPartners::create([
            'heading' => 'Strategic Partners',
            'subtitle' => 'Collaborating with industry leaders to deliver world-class solutions.',
        ]);

        // Partner Items
        $partnerItems = [
            ['icon' => 'fas fa-microchip', 'title' => 'Technology Partner', 'description' => 'Cutting-edge frameworks & infrastructure.', 'order' => 1],
            ['icon' => 'fas fa-cloud', 'title' => 'Cloud Services', 'description' => 'Scalable cloud deployments & management.', 'order' => 2],
            ['icon' => 'fas fa-lock', 'title' => 'Security Partner', 'description' => 'Enterprise-grade security & compliance.', 'order' => 3],
            ['icon' => 'fas fa-plug', 'title' => 'Integration Partner', 'description' => 'Seamless system & platform integration.', 'order' => 4],
        ];

        foreach ($partnerItems as $item) {
            AboutPartnerItem::create(array_merge($item, ['about_partners_id' => $partners->id]));
        }
    }
}
