<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Reward;
use App\Models\Update;
use App\Models\Comment;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SimpleProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $projects = [
            [
                'project_name' => 'EcoSmart Water Generator',
                'short_description' => 'Revolutionary atmospheric water generator that produces clean drinking water from air.',
                'project_description' => 'Our patented technology uses advanced condensation and filtration systems to extract pure water from atmospheric humidity. Perfect for areas with limited water access.',
                'category' => 'technology',
                'goal' => 850000,
                'project_location' => 'San Francisco, CA',
                'image' => 'images/project1.jpg',
            ],
            [
                'project_name' => 'Solar Backpack Pro',
                'short_description' => 'High-capacity solar-powered backpack with wireless charging capabilities.',
                'project_description' => 'Designed for adventurers and professionals, this backpack integrates flexible solar panels with power bank technology for unlimited mobile power.',
                'category' => 'design',
                'goal' => 120000,
                'project_location' => 'Austin, TX',
                'image' => 'images/project2.jpg',
            ],
            [
                'project_name' => 'Smart Garden System',
                'short_description' => 'AI-powered indoor garden that grows fresh herbs and vegetables automatically.',
                'project_description' => 'Complete hydroponic system with IoT sensors, automated watering, LED grow lights, and mobile app control for effortless indoor farming.',
                'category' => 'food',
                'goal' => 75000,
                'project_location' => 'Portland, OR',
                'image' => 'images/project3.webp',
            ]
        ];

        foreach ($projects as $index => $projectData) {
            // Create project creator
            $creator = User::factory()->create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ]);
            $creator->addRole('projectresponsable');

            // Create project
            $startDate = Carbon::now()->subDays(rand(5, 30));
            $endDate = $startDate->copy()->addDays(rand(30, 60));
            
            $project = Project::create([
                'project_name' => $projectData['project_name'],
                'seo_title' => $projectData['project_name'] . ' - Revolutionary Innovation',
                'seo_description' => $projectData['short_description'],
                'short_description' => $projectData['short_description'],
                'project_description' => $projectData['project_description'],
                'project_location' => $projectData['project_location'],
                'category' => $projectData['category'],
                'goal' => $projectData['goal'],
                'minimum_goal' => $projectData['goal'] * 0.8,
                'pledged' => $projectData['goal'] * rand(15, 85) / 100,
                'investors' => rand(50, 300),
                'views' => rand(1000, 5000),
                'likes' => rand(100, 500),
                'shares' => rand(50, 200),
                'image' => $projectData['image'],
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => 'active',
                'featured' => $index === 0,
                'verified' => true,
                'trending' => $index < 2,
                'staff_pick' => $index === 0,
                'start_date' => $startDate,
                'launch_date' => $startDate,
                'end_date' => $endDate,
                'duration_days' => $startDate->diffInDays($endDate),
                'user_id' => $creator->id,
                'currency' => 'USD',
                'funding_type' => 'all_or_nothing',
                'tags' => ['innovation', 'technology', 'sustainable'],
                'stretch_goals' => [
                    [
                        'amount' => $projectData['goal'] * 1.2,
                        'title' => 'Premium Materials Upgrade',
                        'description' => 'Enhanced build quality with premium components'
                    ]
                ],
                'team_info' => [
                    [
                        'name' => $creator->name,
                        'role' => 'Founder & CEO',
                        'experience' => '10+ years in product development'
                    ]
                ],
                'environmental_impact' => 'This project reduces carbon footprint by 40% compared to traditional alternatives.',
                'risks_challenges' => 'Main challenges include supply chain management and regulatory approvals.'
            ]);

            // Create rewards
            $rewards = [
                [
                    'name' => 'Early Bird Special - ' . $projectData['project_name'] . ' #' . ($index + 1),
                    'description' => 'Be the first to get this amazing product.',
                    'discount' => $projectData['goal'] * 0.1
                ],
                [
                    'name' => 'Standard Package - ' . $projectData['project_name'] . ' #' . ($index + 1),
                    'description' => 'Complete package with all standard features.',
                    'discount' => $projectData['goal'] * 0.2
                ]
            ];

            foreach ($rewards as $rewardData) {
                Reward::create([
                    'project_id' => $project->id,
                    'name' => $rewardData['name'],
                    'description' => $rewardData['description'],
                    'discount' => $rewardData['discount'],
                ]);
            }

            // Create updates
            $updateTitles = [
                'Project Launch Announcement #' . ($index + 1),
                'Production Update #' . ($index + 1),
                'Community Milestone Reached #' . ($index + 1)
            ];

            foreach ($updateTitles as $titleIndex => $title) {
                Update::create([
                    'project_id' => $project->id,
                    'user_id' => $creator->id,
                    'name' => $title,
                    'text' => $faker->paragraph,
                    'image' => 'update-placeholder.jpg',
                    'created_at' => $startDate->copy()->addDays($titleIndex * 5)
                ]);
            }

            // Create comments
            for ($c = 0; $c < 3; $c++) {
                $commenter = User::factory()->create();
                $commenter->addRole('projectinvestor');
                
                Comment::create([
                    'project_id' => $project->id,
                    'user_id' => $commenter->id,
                    'name' => 'Great project comment #' . ($index + 1) . '-' . ($c + 1),
                    'text' => 'This looks like an amazing project! Can\'t wait to see the results.',
                    'image' => 'comment-placeholder.jpg',
                    'created_at' => $startDate->copy()->addDays(rand(1, 20))
                ]);
            }
        }

        $this->command->info('Simple project seeder completed successfully!');
    }
}