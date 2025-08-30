<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\Reward;
use App\Models\Comment;
use App\Models\Update;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;

class AdvancedProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create advanced project creators
        $advancedCreators = [];
        $creatorProfiles = [
            [
                'name' => 'Elena Rodriguez',
                'email' => 'elena.rodriguez@example.com',
                'bio' => 'Senior Product Designer at Tesla, 8+ years in sustainable tech innovation',
                'projects_created' => 3,
                'total_funded' => 850000,
            ],
            [
                'name' => 'Marcus Chen',
                'email' => 'marcus.chen@example.com',
                'bio' => 'Ex-Google Engineer turned indie game developer, MIT graduate',
                'projects_created' => 5,
                'total_funded' => 2100000,
            ],
            [
                'name' => 'Dr. Sarah Kim',
                'email' => 'sarah.kim@example.com',
                'bio' => 'Marine Biologist, documentary filmmaker, National Geographic contributor',
                'projects_created' => 2,
                'total_funded' => 450000,
            ],
            [
                'name' => 'James Anderson',
                'email' => 'james.anderson@example.com',
                'bio' => 'Master Chef, cookbook author, sustainable food advocate',
                'projects_created' => 4,
                'total_funded' => 680000,
            ],
            [
                'name' => 'Aria Patel',
                'email' => 'aria.patel@example.com',
                'bio' => 'Fashion designer, sustainability expert, Forbes 30 Under 30',
                'projects_created' => 6,
                'total_funded' => 1200000,
            ]
        ];

        foreach ($creatorProfiles as $profile) {
            $creator = User::firstOrCreate(
                ['email' => $profile['email']],
                [
                    'name' => $profile['name'],
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                ]
            );
            
            if (!$creator->hasRole('projectresponsable')) {
                $creator->addRole('projectresponsable');
            }
            
            $advancedCreators[] = $creator;
        }

        // Advanced project data with comprehensive campaign information
        $advancedProjectsData = [
            [
                'project_name' => 'HydroGen Pro: Revolutionary Water-from-Air Generator',
                'seo_title' => 'HydroGen Pro - Generate Clean Water from Air | Revolutionary Tech',
                'short_description' => 'Revolutionary atmospheric water generator that produces 30L of pure drinking water daily using only solar power and ambient humidity.',
                'project_description' => "## Revolutionary Water Technology\n\nHydroGen Pro represents a breakthrough in atmospheric water generation technology. Our patent-pending system combines advanced condensation technology with solar power to extract pure, mineral-rich water directly from ambient air.\n\n### Key Features:\n- **High Output**: 30+ liters per day even in 40% humidity\n- **Solar Powered**: 100% renewable energy operation\n- **Smart Technology**: IoT connectivity with mobile app control\n- **Mineral Enhancement**: Built-in mineralization system for perfect pH\n- **Compact Design**: Fits in any backyard or rooftop\n\n### Technical Specifications:\n- Power: 800W solar panel array (included)\n- Production: 7.5 gallons (30L) per day at 50% humidity\n- Water Quality: 99.9% pure with essential minerals added\n- Operating Range: 35-95% relative humidity\n- Temperature Range: 15-40°C (59-104°F)\n- Dimensions: 120cm x 80cm x 180cm\n- Weight: 85kg\n\n### The Problem We Solve:\nOver 2 billion people lack access to clean drinking water. Traditional solutions require infrastructure, are expensive, or unsustainable. HydroGen Pro provides completely autonomous clean water generation anywhere with basic humidity.\n\n### Our Solution:\nOur breakthrough vapor compression technology increases efficiency by 300% compared to existing atmospheric water generators. Combined with solar power and smart controls, we've created the first truly practical home water generation system.\n\n### Prototype Results:\n- 18 months of field testing across 5 climate zones\n- 99.7% uptime reliability\n- Water quality exceeds WHO standards\n- 85% energy efficiency (industry average: 28%)\n\n### Market Validation:\n- Pre-orders from 15 countries\n- Partnership with Red Cross for disaster relief\n- Interest from 50+ distributors globally\n- Featured in MIT Technology Review\n\nThis campaign will fund final certification, manufacturing setup, and first production run of 1,000 units.",
                'project_location' => 'San Diego, California',
                'category' => 'technology',
                'tags' => ['water', 'sustainability', 'solar', 'IoT', 'climate-tech'],
                'goal' => 850000,
                'minimum_goal' => 500000,
                'funding_type' => 'all_or_nothing',
                'currency' => 'USD',
                'pledged' => 742500,
                'investors' => 1247,
                'duration_days' => 45,
                'status' => 'active',
                'featured' => true,
                'verified' => true,
                'staff_pick' => true,
                'trending' => true,
                'image' => 'smart-home-hub.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'gallery' => ['hydro-1.jpg', 'hydro-2.jpg', 'hydro-3.jpg', 'hydro-4.jpg'],
                'views' => 45230,
                'likes' => 3421,
                'shares' => 892,
                'risks_challenges' => "### Manufacturing Risks:\n- Component supply chain delays (mitigation: 3 backup suppliers)\n- Quality control scaling (mitigation: automated testing systems)\n\n### Technical Risks:\n- Extreme weather performance (mitigation: 18 months field testing)\n- Maintenance requirements (mitigation: self-diagnostic systems)\n\n### Market Risks:\n- Regulatory approval delays (mitigation: pre-submission to agencies)\n- Competition from large corporations (mitigation: strong IP portfolio)",
                'environmental_impact' => 'Each HydroGen Pro unit eliminates the need for 10,000+ plastic water bottles annually. Solar-powered operation produces zero emissions. Materials are 85% recyclable. Expected to prevent 500kg CO2 emissions per year per unit.',
                'team_info' => [
                    ['name' => 'Elena Rodriguez', 'role' => 'CEO & Lead Engineer', 'experience' => '8 years Tesla, MIT MS Mechanical Engineering'],
                    ['name' => 'Dr. David Park', 'role' => 'CTO', 'experience' => 'Former SpaceX, 15 patents in water tech'],
                    ['name' => 'Maria Gonzalez', 'role' => 'Head of Manufacturing', 'experience' => '12 years automotive manufacturing'],
                ],
                'social_media_links' => [
                    'website' => 'https://hydrogentech.com',
                    'twitter' => '@HydroGenPro',
                    'instagram' => '@hydrogentech',
                    'linkedin' => 'company/hydrogen-tech'
                ],
                'stretch_goals' => [
                    ['amount' => 1000000, 'title' => 'IoT Weather Integration', 'description' => 'Smart weather prediction system that optimizes water production based on forecasts'],
                    ['amount' => 1200000, 'title' => 'Mobile App 2.0', 'description' => 'Advanced mobile app with community features, water quality tracking, and usage analytics'],
                    ['amount' => 1500000, 'title' => 'International Shipping', 'description' => 'Enable worldwide shipping and local support in 25 countries'],
                ],
                'start_date' => Carbon::now()->subDays(22),
                'end_date' => Carbon::now()->addDays(23),
            ],
            [
                'project_name' => 'Echoes of Tomorrow: Next-Gen VR Adventure',
                'seo_title' => 'Echoes of Tomorrow VR Game - Revolutionary Adventure Experience',
                'short_description' => 'Groundbreaking VR adventure combining photorealistic graphics, AI-driven storytelling, and haptic feedback for ultimate immersion.',
                'project_description' => "## The Future of VR Gaming is Here\n\nEchoes of Tomorrow pushes the boundaries of virtual reality gaming with cutting-edge technology and innovative gameplay mechanics that have never been seen before.\n\n### Revolutionary Features:\n- **Photorealistic Graphics**: Custom engine delivering movie-quality visuals\n- **AI Storytelling**: Dynamic narrative that adapts to your choices\n- **Full-Body Haptics**: Feel every texture, impact, and environment\n- **Neural Interface**: Brain-computer interface for thought-based controls\n- **Infinite Worlds**: Procedurally generated universes with unique physics\n\n### Game Overview:\nSet in 2157, you play as a time-traveling detective solving mysteries across multiple realities. Each decision creates ripple effects through space-time, leading to thousands of possible outcomes.\n\n### Technical Achievements:\n- 50+ hours of unique gameplay\n- 15 fully explorable alien worlds\n- 200+ NPCs with AI-driven personalities\n- Real-time ray tracing on all surfaces\n- Spatial audio with 360-degree precision\n\n### Studio Background:\nMarcus Chen Studio has been developing VR experiences for 8 years, with 2 previous successful campaigns totaling $2.1M in funding. Our team includes former developers from Valve, Epic Games, and NASA.\n\n### Development Progress:\n- Game engine: 95% complete\n- Core gameplay: 80% complete\n- Graphics assets: 70% complete\n- Audio system: 85% complete\n- Beta testing starts in 3 months\n\nFunding will complete development, manufacturing of haptic devices, and global distribution.",
                'project_location' => 'Seattle, Washington',
                'category' => 'games',
                'tags' => ['VR', 'gaming', 'AI', 'haptics', 'sci-fi'],
                'goal' => 1200000,
                'minimum_goal' => 800000,
                'funding_type' => 'all_or_nothing',
                'currency' => 'USD',
                'pledged' => 956000,
                'investors' => 2341,
                'duration_days' => 60,
                'status' => 'active',
                'featured' => true,
                'verified' => true,
                'staff_pick' => false,
                'trending' => true,
                'image' => 'neon-legends-game.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'gallery' => ['vr-1.jpg', 'vr-2.jpg', 'vr-3.jpg'],
                'views' => 78542,
                'likes' => 5634,
                'shares' => 1423,
                'risks_challenges' => "### Technical Risks:\n- VR hardware compatibility across platforms\n- Performance optimization for various PC specs\n- Haptic device manufacturing complexity\n\n### Market Risks:\n- VR adoption rate slower than projected\n- Competition from major studios\n- Hardware fragmentation",
                'environmental_impact' => 'Digital-only distribution eliminates packaging waste. VR reduces need for physical travel and experiences. Offset carbon footprint through renewable energy partnerships.',
                'team_info' => [
                    ['name' => 'Marcus Chen', 'role' => 'Creative Director', 'experience' => 'Ex-Google, 5 successful VR titles'],
                    ['name' => 'Alex Thompson', 'role' => 'Lead Programmer', 'experience' => 'Former Valve developer, VR engine specialist'],
                    ['name' => 'Zoe Williams', 'role' => 'Art Director', 'experience' => 'Former Pixar, Emmy award winner'],
                ],
                'social_media_links' => [
                    'website' => 'https://echoesoftomorrow.com',
                    'twitter' => '@EchoesTomorrow',
                    'discord' => 'discord.gg/echoes'
                ],
                'stretch_goals' => [
                    ['amount' => 1400000, 'title' => 'Multiplayer Mode', 'description' => 'Co-op and competitive multiplayer experiences'],
                    ['amount' => 1700000, 'title' => 'Console Ports', 'description' => 'PlayStation VR2 and Meta Quest versions'],
                    ['amount' => 2000000, 'title' => 'Haptic Suit', 'description' => 'Full-body haptic feedback suit for complete immersion'],
                ],
                'start_date' => Carbon::now()->subDays(18),
                'end_date' => Carbon::now()->addDays(42),
            ],
            [
                'project_name' => 'Ocean Guardians: The Last Reef Documentary',
                'seo_title' => 'Ocean Guardians Documentary - Saving Coral Reefs',
                'short_description' => 'Award-winning filmmaker Dr. Sarah Kim documents the race to save the world\'s last pristine coral reefs before climate change destroys them.',
                'project_description' => "## A Race Against Time\n\nOcean Guardians follows marine biologist Dr. Elena Vasquez as she leads international efforts to save the world's most pristine coral reefs from bleaching, pollution, and climate change.\n\n### The Story:\nFilmed across 18 months in 12 countries, this documentary captures the urgent race to preserve coral ecosystems that support 25% of all marine life. Through stunning underwater cinematography and personal stories, we witness both the devastating effects of human impact and the inspiring efforts to turn the tide.\n\n### Key Locations:\n- Great Barrier Reef, Australia\n- Mesoamerican Reef, Belize\n- New Caledonia Barrier Reef\n- Raja Ampat, Indonesia\n- Red Sea Coral Gardens, Egypt\n\n### Technical Excellence:\n- Shot in 6K underwater cinematography\n- Custom-built underwater camera systems\n- Original score by Grammy winner John Williams\n- Narrated by Sir David Attenborough\n- Advanced color grading for coral visualization\n\n### Impact Campaign:\nBeyond entertainment, this documentary drives real change through:\n- Educational curriculum for 1000+ schools\n- Partnership with Marine Conservation International\n- $500K coral restoration fund from proceeds\n- Government policy recommendations\n\n### Awards & Recognition:\n- Sundance Documentary Premiere Selection\n- Winner: Environmental Film Festival\n- National Geographic Partnership\n- UNESCO endorsement\n\n### Distribution Plan:\n- Theatrical release: 200+ theaters globally\n- Netflix/streaming platform negotiations underway\n- Educational licensing to schools/universities\n- Free community screenings worldwide\n\nYour support helps complete post-production, secure theatrical distribution, and maximize the film's conservation impact.",
                'project_location' => 'Miami, Florida',
                'category' => 'film',
                'tags' => ['documentary', 'ocean', 'conservation', 'climate-change', 'coral'],
                'goal' => 450000,
                'minimum_goal' => 300000,
                'funding_type' => 'flexible',
                'currency' => 'USD',
                'pledged' => 387500,
                'investors' => 923,
                'duration_days' => 35,
                'status' => 'active',
                'featured' => true,
                'verified' => true,
                'staff_pick' => true,
                'trending' => false,
                'image' => 'ocean-guardians.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'gallery' => ['ocean-1.jpg', 'ocean-2.jpg', 'ocean-3.jpg', 'ocean-4.jpg', 'ocean-5.jpg'],
                'views' => 34521,
                'likes' => 2841,
                'shares' => 1256,
                'risks_challenges' => "### Production Risks:\n- Weather-dependent filming schedules\n- Equipment damage in harsh marine environments\n- International travel restrictions\n\n### Distribution Challenges:\n- Securing theatrical distribution deals\n- Competition with major documentary releases\n- Educational market penetration",
                'environmental_impact' => '100% carbon-neutral production through verified offsets. Educational impact reaching 100,000+ students annually. Direct funding of coral restoration projects.',
                'team_info' => [
                    ['name' => 'Dr. Sarah Kim', 'role' => 'Director/Producer', 'experience' => 'Emmy winner, National Geographic contributor'],
                    ['name' => 'Mike Rodriguez', 'role' => 'Underwater Cinematographer', 'experience' => '15 years BBC Natural History Unit'],
                    ['name' => 'Lisa Chen', 'role' => 'Editor', 'experience' => 'Oscar nominee, environmental film specialist'],
                ],
                'social_media_links' => [
                    'website' => 'https://oceanguardiansdoc.com',
                    'instagram' => '@oceanguardiansfilm',
                    'facebook' => 'oceanguardiansfilm'
                ],
                'stretch_goals' => [
                    ['amount' => 500000, 'title' => 'Extended Cut', 'description' => '3-part series for streaming platforms'],
                    ['amount' => 600000, 'title' => 'Educational Package', 'description' => 'Complete curriculum and VR experience for schools'],
                    ['amount' => 750000, 'title' => 'Global Impact Tour', 'description' => 'Worldwide screening tour with marine biologists'],
                ],
                'start_date' => Carbon::now()->subDays(27),
                'end_date' => Carbon::now()->addDays(8),
            ],
            [
                'project_name' => 'Farm-to-Table Revolution: Smart Urban Farming Kit',
                'seo_title' => 'Smart Urban Farming Kit - Grow Food at Home',
                'short_description' => 'Complete hydroponic farming system that grows restaurant-quality vegetables in your kitchen using AI-powered automation.',
                'project_description' => "## Revolutionize How You Eat\n\nThe Farm-to-Table Revolution Smart Urban Farming Kit transforms any kitchen into a productive farm capable of growing fresh, organic vegetables year-round with minimal effort.\n\n### System Features:\n- **AI-Powered Growth**: Machine learning optimizes nutrients, pH, and lighting\n- **Restaurant Quality**: Consistently produces chef-grade vegetables\n- **Fully Automated**: Set-and-forget operation with mobile monitoring\n- **Compact Design**: Fits on any countertop (24\" x 18\" x 36\")\n- **High Yield**: 40+ plants simultaneously, harvest weekly\n\n### What You Can Grow:\n- Leafy Greens: lettuce, spinach, kale, arugula\n- Herbs: basil, cilantro, parsley, mint, thyme\n- Vegetables: cherry tomatoes, peppers, cucumbers\n- Microgreens: 15+ varieties for garnishes\n\n### Technology Innovation:\n- Smart LED grow lights with automated spectrum adjustment\n- pH and nutrient monitoring with auto-correction\n- Climate sensors for optimal growing conditions\n- Mobile app with growth tracking and recipes\n- Biodegradable growing pods and organic nutrients\n\n### Sustainability Impact:\n- 95% less water than traditional farming\n- Zero pesticides or herbicides\n- Eliminates transportation emissions\n- Reduces plastic packaging waste\n- Compostable growing materials\n\n### Economics:\n- System pays for itself in 8 months\n- Saves $150+ monthly on organic produce\n- Produces $1,800+ worth of vegetables annually\n- No ongoing subscription fees\n\n### Beta Testing Results:\n- 98% germination success rate\n- 300% faster growth than soil farming\n- 95% user satisfaction score\n- Featured in 5 culinary magazines\n\nJoin the urban farming revolution and enjoy the freshest, most nutritious food possible.",
                'project_location' => 'Portland, Oregon',
                'category' => 'food',
                'tags' => ['urban-farming', 'hydroponics', 'AI', 'sustainability', 'health'],
                'goal' => 320000,
                'minimum_goal' => 200000,
                'funding_type' => 'all_or_nothing',
                'currency' => 'USD',
                'pledged' => 298750,
                'investors' => 1456,
                'duration_days' => 30,
                'status' => 'active',
                'featured' => false,
                'verified' => true,
                'staff_pick' => false,
                'trending' => true,
                'image' => 'smart-garden.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'gallery' => ['farm-1.jpg', 'farm-2.jpg', 'farm-3.jpg'],
                'views' => 23456,
                'likes' => 1789,
                'shares' => 456,
                'risks_challenges' => "### Manufacturing Risks:\n- Electronic component sourcing\n- Quality control for automated systems\n- Shipping fragile hydroponic equipment\n\n### Technical Risks:\n- Software compatibility across platforms\n- Sensor calibration accuracy\n- User learning curve for system maintenance",
                'environmental_impact' => 'Each system eliminates 200kg CO2 annually by reducing food transportation. Saves 10,000 liters of water yearly. Zero chemical runoff. Packaging is 100% recyclable.',
                'team_info' => [
                    ['name' => 'James Anderson', 'role' => 'Founder/Chef', 'experience' => 'Michelin-starred chef, sustainable food advocate'],
                    ['name' => 'Dr. Lisa Park', 'role' => 'Agricultural Engineer', 'experience' => 'PhD Plant Sciences, hydroponic systems expert'],
                    ['name' => 'Tom Wilson', 'role' => 'IoT Developer', 'experience' => 'Former Apple engineer, smart home specialist'],
                ],
                'social_media_links' => [
                    'website' => 'https://smarturbanfarm.com',
                    'instagram' => '@smarturbanfarm',
                    'youtube' => 'SmartUrbanFarmTV'
                ],
                'stretch_goals' => [
                    ['amount' => 400000, 'title' => 'Mushroom Growing Module', 'description' => 'Add-on system for growing gourmet mushrooms'],
                    ['amount' => 500000, 'title' => 'Community Network', 'description' => 'Share growing data and recipes with other users'],
                    ['amount' => 650000, 'title' => 'Commercial Version', 'description' => 'Restaurant-scale system for professional kitchens'],
                ],
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(15),
            ],
            [
                'project_name' => 'EcoLux: Sustainable Luxury Fashion Collection',
                'seo_title' => 'EcoLux Sustainable Fashion - Luxury Meets Sustainability',
                'short_description' => 'Revolutionary luxury fashion line made from ocean plastic, organic materials, and innovative bio-fabrics with zero waste production.',
                'project_description' => "## Luxury Fashion Reimagined\n\nEcoLux proves that luxury and sustainability aren't just compatible—they're inseparable. Our revolutionary collection combines the finest materials and craftsmanship with zero environmental impact.\n\n### Revolutionary Materials:\n- **Ocean Plastic Fiber**: Luxurious fabric from recycled ocean waste\n- **Mushroom Leather**: Bio-leather grown from mycelium fungi\n- **Peace Silk**: Cruelty-free silk that doesn't harm silkworms\n- **Organic Innovation**: Certified organic cotton and hemp blends\n- **Lab-Grown Materials**: Biofabricated materials indistinguishable from traditional luxury\n\n### Collection Highlights:\n- **Evening Wear**: 12 stunning gowns and formal pieces\n- **Business Attire**: Professional wardrobe essentials\n- **Casual Luxury**: Everyday pieces with extraordinary quality\n- **Accessories**: Handbags, shoes, and jewelry\n- **Unisex Line**: Gender-neutral luxury pieces\n\n### Sustainability Innovations:\n- Zero-waste pattern making\n- Waterless dyeing processes\n- 100% renewable energy production\n- Carbon-negative shipping\n- Take-back program for end-of-life garments\n\n### Craftsmanship Excellence:\n- Hand-finished details by master artisans\n- Made-to-measure options available\n- Traditional techniques with modern innovation\n- Quality guaranteed for 10+ years\n- Repair and alteration services included\n\n### Impact Metrics:\n- 85% reduction in water usage\n- 90% reduction in carbon emissions\n- 100% diversion from landfills\n- Supporting 200+ artisan jobs globally\n- Ocean cleanup: 50kg plastic per garment\n\n### Fashion Week Success:\n- Paris Fashion Week debut\n- Featured in Vogue, Elle, Harper's Bazaar\n- Celebrity endorsements from A-list actors\n- Pre-orders from 15 luxury retailers\n- Waitlist of 2,000+ customers\n\nJoin the sustainable luxury revolution and own fashion that looks good, feels amazing, and does good for the planet.",
                'project_location' => 'New York, New York',
                'category' => 'fashion',
                'tags' => ['sustainable-fashion', 'luxury', 'ocean-plastic', 'bio-materials', 'zero-waste'],
                'goal' => 580000,
                'minimum_goal' => 350000,
                'funding_type' => 'flexible',
                'currency' => 'USD',
                'pledged' => 623500,
                'investors' => 892,
                'duration_days' => 40,
                'status' => 'active',
                'featured' => true,
                'verified' => true,
                'staff_pick' => true,
                'trending' => false,
                'image' => 'eco-phone-case.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'gallery' => ['fashion-1.jpg', 'fashion-2.jpg', 'fashion-3.jpg', 'fashion-4.jpg'],
                'views' => 56742,
                'likes' => 4123,
                'shares' => 2341,
                'risks_challenges' => "### Supply Chain Risks:\n- Novel material availability and scaling\n- Artisan workshop capacity limitations\n- International shipping complications\n\n### Market Risks:\n- Luxury market volatility\n- Consumer adoption of sustainable luxury\n- Price point acceptance",
                'environmental_impact' => 'Each garment removes 50kg plastic from oceans. Zero-waste production eliminates 98% of textile waste. Carbon-negative throughout entire lifecycle.',
                'team_info' => [
                    ['name' => 'Aria Patel', 'role' => 'Creative Director', 'experience' => 'Former Gucci designer, Forbes 30 Under 30'],
                    ['name' => 'Dr. Maria Santos', 'role' => 'Materials Innovation', 'experience' => 'PhD Textile Engineering, bio-materials pioneer'],
                    ['name' => 'Antoine Dubois', 'role' => 'Head Atelier', 'experience' => '20 years Chanel, master craftsman'],
                ],
                'social_media_links' => [
                    'website' => 'https://ecolux.fashion',
                    'instagram' => '@ecoluxfashion',
                    'pinterest' => 'ecoluxfashion'
                ],
                'stretch_goals' => [
                    ['amount' => 700000, 'title' => 'Men\'s Collection', 'description' => 'Complete sustainable luxury menswear line'],
                    ['amount' => 850000, 'title' => 'Global Flagship', 'description' => 'Physical showroom in Paris and New York'],
                    ['amount' => 1000000, 'title' => 'Material Innovation Lab', 'description' => 'R&D facility for next-generation sustainable materials'],
                ],
                'start_date' => Carbon::now()->subDays(31),
                'end_date' => Carbon::now()->addDays(9),
            ],
        ];

        // Create advanced projects with comprehensive data
        foreach ($advancedProjectsData as $index => $projectData) {
            $creator = $advancedCreators[$index % count($advancedCreators)];
            
            $project = Project::create([
                'project_name' => $projectData['project_name'],
                'seo_title' => $projectData['seo_title'],
                'short_description' => $projectData['short_description'],
                'project_description' => $projectData['project_description'],
                'user_id' => $creator->id,
                'project_location' => $projectData['project_location'],
                'category' => $projectData['category'],
                'tags' => $projectData['tags'],
                'goal' => $projectData['goal'],
                'minimum_goal' => $projectData['minimum_goal'],
                'funding_type' => $projectData['funding_type'],
                'currency' => $projectData['currency'],
                'pledged' => $projectData['pledged'],
                'investors' => $projectData['investors'],
                'duration_days' => $projectData['duration_days'],
                'start_date' => $projectData['start_date'],
                'launch_date' => $projectData['start_date'],
                'end_date' => $projectData['end_date'],
                'status' => $projectData['status'],
                'featured' => $projectData['featured'],
                'verified' => $projectData['verified'],
                'staff_pick' => $projectData['staff_pick'],
                'trending' => $projectData['trending'],
                'image' => $projectData['image'],
                'video_url' => $projectData['video_url'],
                'gallery' => $projectData['gallery'],
                'views' => $projectData['views'],
                'likes' => $projectData['likes'],
                'shares' => $projectData['shares'],
                'risks_challenges' => $projectData['risks_challenges'],
                'environmental_impact' => $projectData['environmental_impact'],
                'team_info' => $projectData['team_info'],
                'social_media_links' => $projectData['social_media_links'],
                'stretch_goals' => $projectData['stretch_goals'],
                'conversion_rate' => ($projectData['investors'] / $projectData['views']) * 100,
                'created_at' => $projectData['start_date'],
                'updated_at' => now(),
            ]);

            // Create advanced reward tiers
            $advancedRewards = [
                [
                    'name' => 'Early Supporter - ' . $project->project_name,
                    'description' => 'Be among the first to support this revolutionary project. Includes exclusive updates and early access.',
                    'discount' => $projectData['goal'] * 0.08,
                ],
                [
                    'name' => 'Innovator Tier - ' . $project->project_name,
                    'description' => 'Get the complete product package with premium features and priority shipping.',
                    'discount' => $projectData['goal'] * 0.15,
                ],
                [
                    'name' => 'Pioneer Package - ' . $project->project_name,
                    'description' => 'Premium version with exclusive features, personalization, and direct creator access.',
                    'discount' => $projectData['goal'] * 0.25,
                ],
                [
                    'name' => 'Visionary Edition - ' . $project->project_name,
                    'description' => 'Limited edition with premium materials, personal consultation, and lifetime support.',
                    'discount' => $projectData['goal'] * 0.40,
                ],
                [
                    'name' => 'Founder\'s Circle - ' . $project->project_name,
                    'description' => 'Exclusive access to the creator team, product development insights, and special recognition.',
                    'discount' => $projectData['goal'] * 0.60,
                ],
            ];

            foreach ($advancedRewards as $rewardData) {
                Reward::create([
                    'project_id' => $project->id,
                    'name' => $rewardData['name'],
                    'description' => $rewardData['description'],
                    'discount' => $rewardData['discount'],
                ]);
            }

            // Create detailed project updates
            $updateTitles = [
                'Major Prototype Breakthrough!',
                'Manufacturing Partner Secured',
                'Beta Testing Results Exceeded Expectations',
                'Featured in Major Publication',
                'Team Expansion Update',
                'Supply Chain Optimization Complete',
            ];

            $updateCount = rand(3, 6);
            for ($u = 0; $u < $updateCount; $u++) {
                Update::create([
                    'project_id' => $project->id,
                    'user_id' => $creator->id,
                    'name' => ($updateTitles[$u] ?? $faker->sentence(5)) . " - Project " . $i,
                    'text' => $faker->sentence(15),
                    'image' => 'update-placeholder.jpg',
                    'created_at' => $projectData['start_date']->copy()->addDays(rand(1, 25)),
                ]);
            }

            // Create engaging comments
            $commentCount = rand(8, 15);
            for ($c = 0; $c < $commentCount; $c++) {
                $commenter = User::inRandomOrder()->first();
                if (!$commenter) {
                    $commenter = User::factory()->create();
                    $commenter->addRole('projectinvestor');
                }

                $comments = [
                    'This project is absolutely revolutionary! Can\'t wait to see the final product.',
                    'Amazing innovation. I\'ve been waiting for something like this for years.',
                    'Just backed this project. The team\'s experience is impressive.',
                    'Love the environmental impact. This is the future we need.',
                    'The technical specifications look incredible. Well done!',
                    'Fantastic project! Any plans for international shipping?',
                    'This could change everything. Proud to be an early supporter.',
                ];

                Comment::create([
                    'project_id' => $project->id,
                    'user_id' => $commenter->id,
                    'name' => $faker->sentence(3),
                    'text' => $faker->randomElement($comments),
                    'image' => 'comment-placeholder.jpg',
                    'created_at' => $projectData['start_date']->copy()->addDays(rand(1, 30)),
                ]);
            }
        }

        $this->command->info('Advanced project seeder completed successfully!');
        $this->command->info('Created ' . count($advancedProjectsData) . ' advanced projects with:');
        $this->command->info('- Comprehensive campaign data');
        $this->command->info('- Advanced analytics and metrics');
        $this->command->info('- Stretch goals and team information');
        $this->command->info('- Detailed risk assessments');
        $this->command->info('- Environmental impact data');
        $this->command->info('- Social media integration');
        $this->command->info('- Multiple reward tiers');
        $this->command->info('- Engaging updates and comments');
    }
}