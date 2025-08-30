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

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create project creators if they don't exist
        $creators = [];
        $creatorNames = [
            'Alex Johnson', 'Sarah Martinez', 'David Kim', 'Emma Wilson', 'Michael Brown',
            'Lisa Chen', 'James Rodriguez', 'Ashley Taylor', 'Ryan Davis', 'Jennifer Lee'
        ];

        foreach ($creatorNames as $name) {
            $email = strtolower(str_replace(' ', '.', $name)) . '@example.com';
            $creator = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                ]
            );
            
            // Assign projectresponsable role using Laratrust
            if (!$creator->hasRole('projectresponsable')) {
                $creator->addRole('projectresponsable');
            }
            
            $creators[] = $creator;
        }

        // Define project categories
        $categories = ['technology', 'design', 'games', 'film', 'music', 'art', 'food', 'fashion', 'publishing', 'crafts'];

        // Define realistic project data
        $projectsData = [
            [
                'project_name' => 'Smart Home IoT Hub',
                'category' => 'technology',
                'project_description' => "Revolutionary smart home hub that connects all your devices with AI-powered automation. Control lighting, temperature, security, and entertainment systems through voice commands or our intuitive app.\n\nFeatures:\n• AI-powered automation learning your habits\n• Compatible with 500+ smart devices\n• Advanced security with end-to-end encryption\n• Energy saving algorithms reducing bills by 30%\n• Beautiful design that complements any home\n\nOur team has 15 years of experience in IoT development. We've already built working prototypes and secured partnerships with major manufacturers. Your support will help us scale production and bring this innovative hub to market.",
                'project_location' => 'San Francisco, CA',
                'goal' => 150000,
                'pledged' => 127500,
                'investors' => 342,
                'image' => 'smart-home-hub.jpg',
                'start_date' => Carbon::now()->subDays(25),
                'end_date' => Carbon::now()->addDays(15),
                'status' => 'active',
                'featured' => true,
            ],
            [
                'project_name' => 'Artisan Coffee Roasting Machine',
                'category' => 'food',
                'project_description' => "Professional-grade coffee roasting machine designed for home baristas and small cafes. Perfect roasts every time with precision temperature control and automated profiles.\n\nWhat makes it special:\n• Precision temperature control (±1°C accuracy)\n• 15 pre-programmed roast profiles\n• Mobile app connectivity for custom profiles\n• Smokeless design perfect for indoor use\n• Capacity: 250g-1kg batches\n• Built-in cooling system\n\nOur founder is a award-winning barista with 10 years experience. We've perfected the design through 2 years of testing with professional roasters. The machine is ready for production - we just need your support to scale manufacturing.",
                'project_location' => 'Portland, OR',
                'goal' => 75000,
                'pledged' => 98250,
                'investors' => 156,
                'image' => 'coffee-roaster.jpg',
                'start_date' => Carbon::now()->subDays(45),
                'end_date' => Carbon::now()->subDays(5),
                'status' => 'completed',
                'featured' => true,
            ],
            [
                'project_name' => 'Eco-Friendly Phone Case',
                'category' => 'design',
                'project_description' => "100% biodegradable phone cases made from agricultural waste. Stylish protection that doesn't harm the planet.\n\nSustainable Features:\n• Made from rice husks and bamboo fiber\n• Completely biodegradable within 18 months\n• Drop protection up to 10 feet\n• Available for all major phone models\n• Natural antimicrobial properties\n• Carbon negative production process\n\nWe're a team of environmental engineers and designers committed to reducing plastic waste. Every case sold removes 2 plastic bottles worth of waste from the ocean through our cleanup partnerships.",
                'project_location' => 'Austin, TX',
                'goal' => 25000,
                'pledged' => 31200,
                'investors' => 289,
                'image' => 'eco-phone-case.jpg',
                'start_date' => Carbon::now()->subDays(15),
                'end_date' => Carbon::now()->addDays(25),
                'status' => 'active',
                'featured' => false,
            ],
            [
                'project_name' => 'Indie Game: Neon Legends',
                'category' => 'games',
                'project_description' => "Cyberpunk action-adventure game with stunning neon aesthetics and deep storytelling. Explore a dystopian world where technology and humanity collide.\n\nGame Features:\n• 40+ hours of immersive gameplay\n• Dynamic day/night cycle affecting gameplay\n• Multiple story paths and endings\n• Original cyberpunk soundtrack\n• Hand-crafted pixel art with modern lighting\n• Voice acting by professional actors\n\nOur indie studio has been developing games for 8 years. We've already completed 60% of the game - funding will help us polish, add voice acting, and port to multiple platforms including Steam, PlayStation, and Xbox.",
                'project_location' => 'Montreal, Canada',
                'goal' => 85000,
                'pledged' => 45320,
                'investors' => 127,
                'image' => 'neon-legends-game.jpg',
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->addDays(30),
                'status' => 'active',
                'featured' => false,
            ],
            [
                'project_name' => 'Documentary: Ocean Guardians',
                'category' => 'film',
                'project_description' => "Feature-length documentary following marine biologists working to save coral reefs around the world. Stunning underwater cinematography meets compelling human stories.\n\nProduction Details:\n• 18 months of filming across 12 countries\n• 4K underwater cinematography\n• Interviews with leading marine scientists\n• Original score by Emmy-nominated composer\n• Educational materials for schools\n• Multiple language subtitles\n\nOur team has won 5 film festival awards and one Emmy nomination. We've already filmed 80% of the documentary. Your support helps us complete post-production, secure theatrical distribution, and create educational outreach programs.",
                'project_location' => 'Miami, FL',
                'goal' => 120000,
                'pledged' => 78900,
                'investors' => 203,
                'image' => 'ocean-guardians.jpg',
                'start_date' => Carbon::now()->subDays(20),
                'end_date' => Carbon::now()->addDays(20),
                'status' => 'active',
                'featured' => true,
            ],
            [
                'project_name' => 'Minimalist Wooden Desk',
                'category' => 'design',
                'project_description' => "Handcrafted standing desk made from sustainable bamboo with hidden cable management and adjustable height mechanism.\n\nDesign Features:\n• Premium bamboo construction\n• Electric height adjustment (28\"-48\")\n• Built-in wireless charging pad\n• Hidden cable management system\n• Memory foam anti-fatigue mat included\n• 10-year warranty\n\nEach desk is handcrafted by master woodworkers in our sustainable facility. We use only FSC-certified bamboo and carbon-neutral shipping. The desk is fully tested and ready for production - we need funding for the first manufacturing run.",
                'project_location' => 'Seattle, WA',
                'goal' => 45000,
                'pledged' => 52300,
                'investors' => 98,
                'image' => 'bamboo-desk.jpg',
                'start_date' => Carbon::now()->subDays(35),
                'end_date' => Carbon::now()->subDays(2),
                'status' => 'completed',
                'featured' => false,
            ],
            [
                'project_name' => 'Smart Garden System',
                'category' => 'technology',
                'project_description' => "Automated hydroponic garden system that grows fresh vegetables year-round with minimal effort. Perfect for apartments and homes without garden space.\n\nSystem Includes:\n• LED grow lights with full spectrum\n• Automated nutrient delivery\n• Climate control sensors\n• Mobile app monitoring\n• 24-plant capacity\n• Organic seed starter kit\n\nGrow lettuce, herbs, tomatoes, and more 3x faster than soil. Our system uses 95% less water and produces no soil mess. The mobile app sends notifications and provides growing tips. Perfect for beginners and experienced gardeners alike.",
                'project_location' => 'Denver, CO',
                'goal' => 95000,
                'pledged' => 23750,
                'investors' => 67,
                'image' => 'smart-garden.jpg',
                'start_date' => Carbon::now()->subDays(8),
                'end_date' => Carbon::now()->addDays(37),
                'status' => 'active',
                'featured' => false,
            ],
            [
                'project_name' => 'Handmade Leather Journal',
                'category' => 'crafts',
                'project_description' => "Premium leather-bound journals handcrafted by artisans using traditional techniques. Perfect for writers, artists, and anyone who loves beautiful stationery.\n\nCraftsmanship Details:\n• Full-grain Italian leather\n• Hand-stitched binding\n• 200 pages of premium paper\n• Refillable design\n• Multiple sizes available\n• Personalization options\n\nEach journal takes 3 days to craft by hand. We work with master leather artisans who've been perfecting their craft for decades. These journals are built to last a lifetime and improve with age.",
                'project_location' => 'Santa Fe, NM',
                'goal' => 18000,
                'pledged' => 22400,
                'investors' => 145,
                'image' => 'leather-journal.jpg',
                'start_date' => Carbon::now()->subDays(18),
                'end_date' => Carbon::now()->addDays(12),
                'status' => 'active',
                'featured' => false,
            ],
            [
                'project_name' => 'Children\'s Science Book Series',
                'category' => 'publishing',
                'project_description' => "Interactive science book series that makes learning fun for kids aged 6-12. Beautiful illustrations, hands-on experiments, and AR features bring science to life.\n\nSeries Features:\n• 6 books covering physics, chemistry, biology\n• 50+ hands-on experiments\n• Augmented reality features\n• Professional illustrations\n• Safety-tested activities\n• Teacher resource guides\n\nOur team includes PhD scientists, award-winning illustrators, and experienced educators. The first two books are complete and tested with over 200 children. Funding helps us complete the series and bring it to print.",
                'project_location' => 'Boston, MA',
                'goal' => 35000,
                'pledged' => 41250,
                'investors' => 178,
                'image' => 'science-books.jpg',
                'start_date' => Carbon::now()->subDays(30),
                'end_date' => Carbon::now()->subDays(1),
                'status' => 'completed',
                'featured' => false,
            ],
            [
                'project_name' => 'Artisan Chocolate Factory',
                'category' => 'food',
                'project_description' => "Small-batch chocolate factory using ethically-sourced cacao beans. Creating unique flavors while supporting farmer communities worldwide.\n\nWhat Makes Us Special:\n• Direct trade with cacao farmers\n• Bean-to-bar process\n• Unique flavor combinations\n• Zero artificial additives\n• Sustainable packaging\n• Fair wages for farmers\n\nWe've spent 3 years perfecting our recipes and building relationships with cacao farmers. Our chocolate has won 2 international awards. Funding helps us scale production and build our first dedicated facility.",
                'project_location' => 'Nashville, TN',
                'goal' => 68000,
                'pledged' => 12400,
                'investors' => 34,
                'image' => 'artisan-chocolate.jpg',
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(40),
                'status' => 'active',
                'featured' => false,
            ]
        ];

        // Create projects
        foreach ($projectsData as $index => $projectData) {
            $creator = $creators[$index % count($creators)];
            
            $project = Project::create([
                'project_name' => $projectData['project_name'],
                'user_id' => $creator->id,
                'project_location' => $projectData['project_location'],
                'project_description' => $projectData['project_description'],
                'start_date' => $projectData['start_date'],
                'end_date' => $projectData['end_date'],
                'goal' => $projectData['goal'],
                'pledged' => $projectData['pledged'],
                'investors' => $projectData['investors'],
                'image' => $projectData['image'],
                'category' => $projectData['category'] ?? 'technology',
                'status' => $projectData['status'] ?? 'active',
                'featured' => $projectData['featured'] ?? false,
                'created_at' => $projectData['start_date'],
                'updated_at' => now(),
            ]);

            // Create rewards for each project
            $rewardTiers = [
                [
                    'name' => 'Early Bird Special - ' . $projectData['project_name'] . ' #' . $project->id,
                    'description' => 'Get the product at a discounted price with early access.',
                    'discount' => $projectData['goal'] * 0.1,
                ],
                [
                    'name' => 'Standard Support - ' . $projectData['project_name'] . ' #' . $project->id,
                    'description' => 'Support the project and get the finished product.',
                    'discount' => $projectData['goal'] * 0.15,
                ],
                [
                    'name' => 'Premium Package - ' . $projectData['project_name'] . ' #' . $project->id,
                    'description' => 'Get the product plus exclusive extras and behind-the-scenes access.',
                    'discount' => $projectData['goal'] * 0.25,
                ],
                [
                    'name' => 'Collector\'s Edition - ' . $projectData['project_name'] . ' #' . $project->id,
                    'description' => 'Limited edition version with premium materials and personalization.',
                    'discount' => $projectData['goal'] * 0.4,
                ],
            ];

            foreach ($rewardTiers as $rewardData) {
                Reward::create([
                    'project_id' => $project->id,
                    'name' => $rewardData['name'],
                    'description' => $rewardData['description'],
                    'discount' => $rewardData['discount'],
                ]);
            }

            // Create project updates
            $updateCount = rand(2, 5);
            for ($u = 0; $u < $updateCount; $u++) {
                Update::create([
                    'project_id' => $project->id,
                    'user_id' => $creator->id,
                    'name' => $faker->sentence(6),
                    'text' => $faker->sentence(15),
                    'image' => 'update-placeholder.jpg',
                    'created_at' => Carbon::parse($projectData['start_date'])->addDays(rand(1, 25)),
                ]);
            }

            // Create comments
            $commentCount = rand(5, 15);
            for ($c = 0; $c < $commentCount; $c++) {
                // Create random users for comments if needed
                $commenter = User::inRandomOrder()->first();
                if (!$commenter) {
                    $commenter = User::factory()->create();
                    $commenter->addRole('projectinvestor');
                }

                Comment::create([
                    'project_id' => $project->id,
                    'user_id' => $commenter->id,
                    'name' => $faker->sentence(4),
                    'text' => $faker->sentence(10),
                    'image' => 'comment-placeholder.jpg',
                    'created_at' => Carbon::parse($projectData['start_date'])->addDays(rand(1, 30)),
                ]);
            }
        }

        $this->command->info('Projects seeded successfully with realistic data!');
        $this->command->info('Created ' . count($projectsData) . ' projects with rewards, updates, and comments.');
        $this->command->info('Project images: Place your images in public/image/ directory with the following names:');
        
        foreach ($projectsData as $project) {
            $this->command->info('- ' . $project['image']);
        }
    }
}