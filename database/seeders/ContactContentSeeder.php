<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactHero;
use App\Models\ContactInfo;
use App\Models\ContactInfoCard;
use App\Models\ContactFormSettings;
use App\Models\ContactMap;

class ContactContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        ContactHero::updateOrCreate(
            ['id' => 1],
            [
                'heading' => "Let's Build Something Great Together",
                'description' => 'Have an idea? Need expert guidance? Our team is ready to turn your vision into reality with scalable, secure digital solutions.'
            ]
        );

        // Contact Info Section
        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Get in Touch',
                'description' => 'Reach out to us for partnerships, project inquiries, or any questions. We typically respond within 24 hours.'
            ]
        );

        // Info Cards
        $infoCards = [
            [
                'title' => 'Address',
                'content' => '67/7/8,Nattaranpotha,Kundasale,Kandy',
                'icon_color' => '#3498db',
                'order' => 1
            ],
            [
                'title' => 'Email',
                'content' => 'innoviorinfo@gmail.com',
                'icon_color' => '#9b59b6',
                'order' => 2
            ],
            [
                'title' => 'Phone',
                'content' => '+94 778 778 828',
                'icon_color' => '#e74c3c',
                'order' => 3
            ],
            [
                'title' => 'Business Hours',
                'content' => 'Mon – Sun, 9:00 AM – 6:00 PM',
                'icon_color' => '#3498db',
                'order' => 4
            ]
        ];

        foreach ($infoCards as $card) {
            ContactInfoCard::updateOrCreate(
                ['title' => $card['title']],
                $card
            );
        }

        // Form Settings
        ContactFormSettings::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Send Us a Message',
                'submit_button_text' => 'Send Message',
                'success_message' => 'Thank you! Your message has been sent successfully.'
            ]
        );

        // Map Section
        ContactMap::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'Find Us Here',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.664091987287!2d80.67781337405115!3d7.27900831392492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36742fb1bfb79%3A0xd5c20febb4af49d0!2sInnovior%20institute%20of%20technology%20studies!5e0!3m2!1sen!2slk!4v1768102576611!5m2!1sen!2slk'
            ]
        );
    }
}
