<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\CompanySetting;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Company Settings
        CompanySetting::create([
            'company_name' => 'Nexus Digital',
            'tagline' => 'Transforming Ideas Into Digital Reality',
            'description' => 'We are a leading digital agency specializing in web development, mobile apps, and digital marketing solutions. Our team of experts helps businesses thrive in the digital landscape.',
            'email' => 'hello@nexusdigital.com',
            'phone' => '+1 (555) 123-4567',
            'address' => '123 Innovation Street, Tech District, San Francisco, CA 94102',
            'facebook' => 'https://facebook.com/nexusdigital',
            'twitter' => 'https://twitter.com/nexusdigital',
            'instagram' => 'https://instagram.com/nexusdigital',
            'linkedin' => 'https://linkedin.com/company/nexusdigital',
            'youtube' => 'https://youtube.com/@nexusdigital',
            'whatsapp' => '+15551234567',
        ]);

        // Hero Section
        HeroSection::create([
            'title' => 'We Build Digital Experiences That Matter',
            'subtitle' => 'Award-Winning Digital Agency',
            'description' => 'Transform your business with cutting-edge web solutions, stunning designs, and powerful digital strategies that drive growth and engagement.',
            'button_text' => 'Start Your Project',
            'button_link' => '/contact',
            'button_text_secondary' => 'View Our Work',
            'button_link_secondary' => '/portfolio',
            'is_active' => true,
        ]);

        // About Section
        AboutSection::create([
            'title' => 'About Our Company',
            'content' => 'Founded in 2015, Nexus Digital has grown from a small startup to a full-service digital agency serving clients worldwide. We believe in the power of technology to transform businesses and create meaningful connections with customers. Our approach combines creativity, technical expertise, and strategic thinking to deliver solutions that exceed expectations.',
            'mission_title' => 'Our Mission',
            'mission_content' => 'To empower businesses with innovative digital solutions that drive growth, enhance user experiences, and create lasting impact in the digital world.',
            'vision_title' => 'Our Vision',
            'vision_content' => 'To be the leading digital partner for forward-thinking businesses, known for our creativity, reliability, and commitment to excellence.',
            'years_experience' => 9,
            'projects_completed' => 250,
            'happy_clients' => 150,
            'team_members' => 25,
            'is_active' => true,
        ]);

        // Services
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Custom web applications built with cutting-edge technologies. From simple websites to complex enterprise solutions, we deliver scalable and secure web experiences.',
                'icon' => 'code',
                'features' => ['Responsive Design', 'E-commerce Solutions', 'Custom CMS', 'API Integration'],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Mobile Apps',
                'description' => 'Native and cross-platform mobile applications that deliver exceptional user experiences on iOS and Android devices.',
                'icon' => 'smartphone',
                'features' => ['iOS Development', 'Android Development', 'Cross-Platform', 'App Store Optimization'],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Beautiful, intuitive interfaces that delight users and drive conversions. We focus on creating designs that are both stunning and functional.',
                'icon' => 'palette',
                'features' => ['User Research', 'Wireframing', 'Prototyping', 'Design Systems'],
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Data-driven marketing strategies that increase visibility, drive traffic, and convert visitors into loyal customers.',
                'icon' => 'trending-up',
                'features' => ['SEO Optimization', 'Social Media', 'Content Marketing', 'PPC Advertising'],
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Cloud Solutions',
                'description' => 'Scalable cloud infrastructure and DevOps services to ensure your applications run smoothly and securely.',
                'icon' => 'cloud',
                'features' => ['AWS/Azure/GCP', 'CI/CD Pipelines', 'Container Orchestration', '24/7 Monitoring'],
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Consulting',
                'description' => 'Strategic technology consulting to help you make informed decisions and optimize your digital transformation journey.',
                'icon' => 'lightbulb',
                'features' => ['Tech Strategy', 'Digital Transformation', 'Process Optimization', 'Team Training'],
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Team Members
        $team = [
            [
                'name' => 'Sarah Johnson',
                'position' => 'CEO & Founder',
                'bio' => 'Visionary leader with 15+ years of experience in digital innovation. Sarah founded Nexus Digital with a mission to help businesses thrive in the digital age.',
                'email' => 'sarah@nexusdigital.com',
                'linkedin' => 'https://linkedin.com/in/sarahjohnson',
                'twitter' => 'https://twitter.com/sarahjohnson',
                'sort_order' => 1,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'CTO',
                'bio' => 'Technology expert specializing in scalable architectures and emerging technologies. Michael leads our technical teams to deliver cutting-edge solutions.',
                'email' => 'michael@nexusdigital.com',
                'linkedin' => 'https://linkedin.com/in/michaelchen',
                'sort_order' => 2,
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'Creative Director',
                'bio' => 'Award-winning designer with a passion for creating beautiful, user-centered designs that tell compelling brand stories.',
                'email' => 'emily@nexusdigital.com',
                'instagram' => 'https://instagram.com/emilydesigns',
                'linkedin' => 'https://linkedin.com/in/emilyrodriguez',
                'sort_order' => 3,
            ],
            [
                'name' => 'David Kim',
                'position' => 'Lead Developer',
                'bio' => 'Full-stack developer with expertise in modern web technologies. David ensures our projects are built with clean, maintainable code.',
                'email' => 'david@nexusdigital.com',
                'linkedin' => 'https://linkedin.com/in/davidkim',
                'sort_order' => 4,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }

        // Portfolios
        $portfolios = [
            [
                'title' => 'TechFlow Dashboard',
                'description' => 'A comprehensive analytics dashboard for a SaaS startup, featuring real-time data visualization and intuitive navigation.',
                'client_name' => 'TechFlow Inc.',
                'category' => 'Web Development',
                'project_url' => 'https://techflow.example.com',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'GreenEats Mobile App',
                'description' => 'Food delivery app focused on sustainable restaurants. Features include real-time tracking, eco-friendly packaging options, and loyalty rewards.',
                'client_name' => 'GreenEats Co.',
                'category' => 'Mobile Apps',
                'project_url' => 'https://greeneats.example.com',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Luxe Fashion E-commerce',
                'description' => 'High-end fashion e-commerce platform with AR try-on features, personalized recommendations, and seamless checkout experience.',
                'client_name' => 'Luxe Boutique',
                'category' => 'E-commerce',
                'project_url' => 'https://luxeboutique.example.com',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'HealthHub Patient Portal',
                'description' => 'HIPAA-compliant patient portal for a healthcare network, enabling appointment scheduling, telemedicine, and health record access.',
                'client_name' => 'HealthHub Medical',
                'category' => 'Web Development',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'FinanceWise Brand Identity',
                'description' => 'Complete brand identity redesign for a fintech startup, including logo, visual guidelines, and marketing collateral.',
                'client_name' => 'FinanceWise',
                'category' => 'Branding',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'EduLearn LMS Platform',
                'description' => 'Learning management system with video courses, quizzes, certifications, and progress tracking for an education company.',
                'client_name' => 'EduLearn Academy',
                'category' => 'Web Development',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create(array_merge($portfolio, ['image' => '']));
        }

        // Testimonials
        $testimonials = [
            [
                'client_name' => 'Jennifer Walsh',
                'client_position' => 'CEO',
                'client_company' => 'TechFlow Inc.',
                'content' => 'Working with Nexus Digital was a game-changer for our business. They delivered a stunning dashboard that our users love. The team was professional, responsive, and truly understood our vision.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Robert Martinez',
                'client_position' => 'Founder',
                'client_company' => 'GreenEats Co.',
                'content' => 'The mobile app Nexus Digital built for us exceeded all expectations. Our customer satisfaction scores have increased by 40% since launch. Highly recommend their team!',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Amanda Foster',
                'client_position' => 'Marketing Director',
                'client_company' => 'Luxe Boutique',
                'content' => 'The e-commerce platform has transformed our online presence. Sales have doubled and our customers compliment the beautiful design constantly.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'client_name' => 'Thomas Lee',
                'client_position' => 'CTO',
                'client_company' => 'HealthHub Medical',
                'content' => 'Nexus Digital navigated our complex requirements with expertise. The patient portal is secure, user-friendly, and has significantly improved our patient engagement.',
                'rating' => 4,
                'is_featured' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
