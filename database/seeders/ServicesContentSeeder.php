<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicesHero;
use App\Models\ServiceDetail;
use App\Models\ServiceFeature;
use App\Models\ServicesCta;

class ServicesContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Section
        ServicesHero::create([
            'badge' => 'Our Expertise',
            'heading' => 'Digital Solutions for<br>Modern Enterprises',
            'description' => 'We build intelligent, scalable, and secure systems that drive business growth and operational excellence.',
        ]);

        // IT Consultancy
        $itConsultancy = ServiceDetail::create([
            'slug' => 'it-consultancy',
            'nav_title' => 'IT Consultancy',
            'heading' => 'IT Consultancy',
            'description' => 'Align your technology with your business goals. We provide strategic guidance to help you navigate digital transformation, optimize infrastructure, and reduce operational risks.',
            'image' => 'services/it-consultancy.jpeg',
            'order' => 1,
            'is_active' => true,
        ]);

        ServiceFeature::create(['service_detail_id' => $itConsultancy->id, 'feature_text' => 'Digital Strategy & Roadmaps', 'order' => 1]);
        ServiceFeature::create(['service_detail_id' => $itConsultancy->id, 'feature_text' => 'Cloud & Infrastructure Audits', 'order' => 2]);
        ServiceFeature::create(['service_detail_id' => $itConsultancy->id, 'feature_text' => 'Cybersecurity Assessment', 'order' => 3]);
        ServiceFeature::create(['service_detail_id' => $itConsultancy->id, 'feature_text' => 'Tech Stack Modernization', 'order' => 4]);

        // Software Development
        $softwareDev = ServiceDetail::create([
            'slug' => 'software-development',
            'nav_title' => 'Software Dev',
            'heading' => 'Software Development',
            'description' => 'We engineer high-performance software tailored to your specific needs. From consumer-facing apps to complex enterprise ERPs, we build code that scales.',
            'image' => 'services/software-development.jpeg',
            'order' => 2,
            'is_active' => true,
        ]);

        ServiceFeature::create(['service_detail_id' => $softwareDev->id, 'feature_text' => 'Custom Web Applications', 'order' => 1]);
        ServiceFeature::create(['service_detail_id' => $softwareDev->id, 'feature_text' => 'Mobile Apps (iOS & Android)', 'order' => 2]);
        ServiceFeature::create(['service_detail_id' => $softwareDev->id, 'feature_text' => 'SaaS Product Development', 'order' => 3]);
        ServiceFeature::create(['service_detail_id' => $softwareDev->id, 'feature_text' => 'API Development & Integration', 'order' => 4]);

        // IoT & Robotics
        $iot = ServiceDetail::create([
            'slug' => 'iot-robotics',
            'nav_title' => 'IoT & Robotics',
            'heading' => 'IoT & Robotics',
            'description' => 'Bridge the physical and digital worlds. We develop smart IoT ecosystems and robotic automation systems that improve efficiency and provide real-time data.',
            'image' => 'services/iot-robotics.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        ServiceFeature::create(['service_detail_id' => $iot->id, 'feature_text' => 'Industrial Automation', 'order' => 1]);
        ServiceFeature::create(['service_detail_id' => $iot->id, 'feature_text' => 'Smart Agriculture Solutions', 'order' => 2]);
        ServiceFeature::create(['service_detail_id' => $iot->id, 'feature_text' => 'IoT Sensor Networks', 'order' => 3]);
        ServiceFeature::create(['service_detail_id' => $iot->id, 'feature_text' => 'Robotic Process Control', 'order' => 4]);

        // AI & Machine Learning
        $ai = ServiceDetail::create([
            'slug' => 'ai-implementation',
            'nav_title' => 'AI Solutions',
            'heading' => 'AI & Machine Learning',
            'description' => 'Turn data into decisions. We implement AI models that automate complex tasks, predict trends, and personalize customer experiences.',
            'image' => 'services/ai.jpg',
            'order' => 4,
            'is_active' => true,
        ]);

        ServiceFeature::create(['service_detail_id' => $ai->id, 'feature_text' => 'Predictive Analytics', 'order' => 1]);
        ServiceFeature::create(['service_detail_id' => $ai->id, 'feature_text' => 'Computer Vision Systems', 'order' => 2]);
        ServiceFeature::create(['service_detail_id' => $ai->id, 'feature_text' => 'NLP & Chatbots', 'order' => 3]);
        ServiceFeature::create(['service_detail_id' => $ai->id, 'feature_text' => 'Automated Decision Engines', 'order' => 4]);

        // Training & Education
        $training = ServiceDetail::create([
            'slug' => 'training-education',
            'nav_title' => 'Education',
            'heading' => 'Training & Education',
            'description' => 'Through Innovior Institute (IITS), we empower the next generation of tech leaders. Our industry-focused curriculum bridges the gap between theory and practice.',
            'image' => 'services/training.jpeg',
            'order' => 5,
            'is_active' => true,
        ]);

        ServiceFeature::create(['service_detail_id' => $training->id, 'feature_text' => 'Corporate Tech Training', 'order' => 1]);
        ServiceFeature::create(['service_detail_id' => $training->id, 'feature_text' => 'Full-Stack Bootcamps', 'order' => 2]);
        ServiceFeature::create(['service_detail_id' => $training->id, 'feature_text' => 'IoT & AI Workshops', 'order' => 3]);
        ServiceFeature::create(['service_detail_id' => $training->id, 'feature_text' => 'Certification Programs', 'order' => 4]);

        // CTA Section
        ServicesCta::create([
            'heading' => 'Ready to Transform Your Business?',
            'description' => 'Let\'s discuss how Innovior can build the perfect solution for you.',
            'button_text' => 'Get a Free Consultation',
            'button_link' => '/contact',
        ]);
    }
}
