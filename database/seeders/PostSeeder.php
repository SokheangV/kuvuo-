<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Mini Excavator Buying Guide: 7 Things to Know Before Buying',
                'slug' => 'mini-excavator-buying-guide',
                'category' => 'Buying Guide',
                'excerpt' => 'Learn what to compare before choosing a compact excavator, from machine size and transport needs to hydraulic performance and attachment fit.',
                'featured_image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd',
                'content' => '<p>Buying a mini excavator is a major investment for contractors, landscapers, farmers, and businesses.</p><h2>1. Understand Your Job Requirements</h2><p>Think about digging depth, lifting capacity, and jobsite space before comparing models.</p><h2>2. Check Engine and Hydraulic Performance</h2><p>Hydraulic flow, breakout force, and engine output all affect how productive the machine feels on real work.</p><h2>3. Compare Attachments and Transport Needs</h2><p>Make sure the machine supports the attachments you expect to use and can be moved with the trailer setup you already have.</p>',
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Forklift Safety Tips Every Operator Should Know',
                'slug' => 'forklift-safety-tips',
                'category' => 'Safety',
                'excerpt' => 'Important workplace safety reminders for operation, inspection, and daily use.',
                'featured_image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952',
                'content' => '<p>Forklift safety is essential in warehouses, yards, and active work sites.</p><h2>1. Inspect Before Use</h2><p>Always check tires, forks, mast operation, and warning systems before a shift begins.</p><h2>2. Respect Load Limits</h2><p>Load charts matter. Exceeding safe lifting limits increases risk for operators, coworkers, and equipment.</p><h2>3. Keep Operator Training Current</h2><p>Well-trained operators reduce accidents, improve movement efficiency, and protect inventory and equipment.</p>',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Wheel Loader vs Skid Steer: Which One Should You Buy?',
                'slug' => 'wheel-loader-vs-skid-steer',
                'category' => 'Industry Tips',
                'excerpt' => 'A practical comparison based on jobsite size, lifting needs, and versatility.',
                'featured_image' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef',
                'content' => '<p>Choosing between a wheel loader and skid steer depends on the type of work you expect to handle most often.</p><h2>Wheel Loader Advantages</h2><p>Wheel loaders are strong for moving bulk material, carrying loads, and covering larger outdoor sites efficiently.</p><h2>Skid Steer Advantages</h2><p>Skid steers shine in tighter spaces and can be paired with a wide range of attachments for varied jobs.</p><h2>How to Decide</h2><p>Start with the space you work in, the attachment flexibility you need, and the type of material handling your crew does most.</p>',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
