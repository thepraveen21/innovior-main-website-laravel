<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CareersHero;
use App\Models\CareersCulture;
use App\Models\CareersCultureCard;
use App\Models\CareersOpening;
use App\Models\CareersWhySection;
use App\Models\CareersWhyItem;
use App\Models\CareersProcess;
use App\Models\CareersProcessStep;
use App\Models\CareersCta;

class CareersContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        CareersHero::updateOrCreate(
            ['id' => 1],
            [
                'tag' => 'Careers at Innovior',
                'heading' => 'Shape the Future of Digital Innovation',
                'description' => 'At Innovior, we build intelligent, scalable, and future-ready solutions that empower businesses worldwide. Join us and be part of a team that turns ideas into impact.',
                'button_text' => 'Explore Opportunities',
                'button_link' => '#openings',
            ]
        );

        // Culture Section
        CareersCulture::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Life at Innovior',
                'description' => 'We are a technology-driven organization built on innovation, collaboration, and continuous growth. Our teams work with cutting-edge technologies while maintaining a strong focus on quality, ethics, and long-term value.',
            ]
        );

        // Culture Cards
        $cultureCards = [
            [
                'title' => 'Innovation-Driven',
                'description' => 'We constantly explore new technologies in AI, IoT, robotics, and cloud computing.',
                'order' => 1,
            ],
            [
                'title' => 'People-Centric',
                'description' => 'Our culture values respect, diversity, and open collaboration across teams.',
                'order' => 2,
            ],
            [
                'title' => 'Growth Focused',
                'description' => 'Structured learning paths, mentorship, and real career advancement.',
                'order' => 3,
            ],
        ];

        foreach ($cultureCards as $index => $cardData) {
            CareersCultureCard::updateOrCreate(
                ['order' => $cardData['order']],
                $cardData
            );
        }

        // Job Openings
        $openings = [
            [
                'title' => 'Software Engineer',
                'description' => 'Develop high-performance web and enterprise applications using modern frameworks and architectures.',
                'job_type' => 'Full-Time',
                'location' => 'Hybrid',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'AI / Machine Learning Engineer',
                'description' => 'Design and implement intelligent systems powered by data, analytics, and machine learning.',
                'job_type' => 'Full-Time',
                'location' => 'On-site',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'UI / UX Designer',
                'description' => 'Create intuitive, elegant, and user-focused digital experiences.',
                'job_type' => 'Full-Time',
                'location' => 'On-site',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Software Engineering Intern',
                'description' => 'Gain hands-on experience by working alongside senior engineers on real projects.',
                'job_type' => 'Internship',
                'location' => 'On-site',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($openings as $index => $openingData) {
            CareersOpening::updateOrCreate(
                ['order' => $openingData['order']],
                $openingData
            );
        }

        // Why Join Section
        CareersWhySection::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Why Join Innovior?',
            ]
        );

        // Why Join Items
        $whyItems = [
            [
                'title' => 'Meaningful Work',
                'description' => 'Solve real business challenges with measurable impact.',
                'order' => 1,
            ],
            [
                'title' => 'Global Exposure',
                'description' => 'Work with international clients and diverse teams.',
                'order' => 2,
            ],
            [
                'title' => 'Modern Tech Stack',
                'description' => 'Use industry-leading tools, frameworks, and platforms.',
                'order' => 3,
            ],
            [
                'title' => 'Long-Term Growth',
                'description' => 'We invest in people, not just positions.',
                'order' => 4,
            ],
        ];

        foreach ($whyItems as $index => $itemData) {
            CareersWhyItem::updateOrCreate(
                ['order' => $itemData['order']],
                $itemData
            );
        }

        // Hiring Process Section
        CareersProcess::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Our Hiring Process',
            ]
        );

        // Process Steps
        $processSteps = [
            ['title' => 'Application Review', 'order' => 1],
            ['title' => 'Technical Interview', 'order' => 2],
            ['title' => 'Final Discussion', 'order' => 3],
            ['title' => 'Offer & Onboarding', 'order' => 4],
        ];

        foreach ($processSteps as $index => $stepData) {
            CareersProcessStep::updateOrCreate(
                ['order' => $stepData['order']],
                $stepData
            );
        }

        // CTA Section
        CareersCta::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Take the Next Step in Your Career',
                'description' => 'Send your CV and portfolio to',
                'email' => 'careers@innovior.com',
                'button_text' => 'Contact Recruitment',
                'button_link' => '/contact',
            ]
        );
    }
}
