<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicAndBlogSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            'Industry Insights' => [
                [
                    'title' => 'The Future of Professional Services in 2025',
                    'sub_title' => 'How technology is reshaping the way agencies and freelancers deliver value',
                    'details' => '<p>The professional services landscape is undergoing a massive transformation. With AI tools becoming more accessible, agencies are finding new ways to deliver higher quality work in shorter timeframes.</p><p>From automated design systems to AI-powered content generation, the tools available to creative professionals are evolving rapidly. However, the human element remains crucial — clients still value strategic thinking, creative direction, and the personal touch that only experienced professionals can provide.</p><p>Key trends to watch include the rise of hybrid agency models, increased specialization, and the growing importance of data-driven decision making in creative fields.</p>',
                ],
                [
                    'title' => 'Why Specialization Wins in the Service Marketplace',
                    'sub_title' => 'Niche agencies outperform generalists — here is why',
                    'details' => '<p>In an increasingly competitive marketplace, agencies that specialize in specific industries or service areas consistently outperform their generalist counterparts.</p><p>Specialization allows agencies to develop deep domain expertise, build stronger portfolios, command higher rates, and attract clients who value quality over price. Data from leading marketplaces shows that specialized agencies receive 3x more qualified leads than generalist firms.</p><p>If you are considering narrowing your focus, now is the time. The market rewards depth of expertise more than breadth of services.</p>',
                ],
            ],
            'Tips & Tutorials' => [
                [
                    'title' => 'How to Write a Winning Project Proposal',
                    'sub_title' => 'A step-by-step guide to crafting proposals that convert',
                    'details' => '<p>A great proposal can be the difference between winning and losing a project. Here are the essential elements every proposal should include:</p><p><strong>1. Executive Summary:</strong> Start with a clear understanding of the client\'s problem and your proposed solution.</p><p><strong>2. Scope of Work:</strong> Detail exactly what you will deliver, including milestones and timelines.</p><p><strong>3. Relevant Experience:</strong> Showcase 2-3 similar projects you have completed successfully.</p><p><strong>4. Pricing:</strong> Be transparent about costs and payment terms.</p><p><strong>5. Next Steps:</strong> Always end with a clear call to action.</p>',
                ],
                [
                    'title' => '10 Portfolio Mistakes That Cost You Clients',
                    'sub_title' => 'Common portfolio pitfalls and how to avoid them',
                    'details' => '<p>Your portfolio is your most powerful sales tool. Unfortunately, many professionals make critical mistakes that drive potential clients away.</p><p>The most common mistakes include: showing too many projects without context, missing case study details, no clear results or metrics, outdated work, poor image quality, no client testimonials, missing contact information, and failing to organize work by service type.</p><p>The fix is simple: quality over quantity. Show your 5-8 best projects with full case studies that demonstrate the problem, your approach, and the measurable results you achieved.</p>',
                ],
            ],
            'Case Studies' => [
                [
                    'title' => 'How a Design Agency Tripled Revenue with BznsBook',
                    'sub_title' => 'PixelCraft Studio shares their growth journey on the platform',
                    'details' => '<p>When PixelCraft Studio joined BznsBook, they were a small design agency with 3 employees serving local clients. Within 18 months, they had tripled their revenue and expanded to a team of 12.</p><p>Their secret? A combination of a well-optimized profile, consistent portfolio updates, competitive pricing, and exceptional client communication. They focused on responding to project inquiries within 2 hours and maintaining a 4.9-star rating through quality delivery.</p><p>Today, PixelCraft Studio is one of the top-rated design agencies on the platform, with over 50 completed projects and a growing list of repeat clients.</p>',
                ],
            ],
            'Company News' => [
                [
                    'title' => 'Introducing Enhanced Project Matching',
                    'sub_title' => 'Our new AI-powered matching system connects you with the right projects faster',
                    'details' => '<p>We are excited to announce the launch of our enhanced project matching system. Using advanced algorithms, BznsBook now automatically suggests relevant projects based on your skills, experience, portfolio, and past performance.</p><p>This means less time searching and more time doing what you love — delivering great work for your clients. The new system also considers factors like budget alignment, timeline compatibility, and geographic preferences.</p><p>Start exploring matched projects today in your dashboard.</p>',
                ],
                [
                    'title' => 'BznsBook Crosses 10,000 Active Professionals',
                    'sub_title' => 'A milestone that reflects the growing trust in our marketplace',
                    'details' => '<p>We are thrilled to announce that BznsBook has surpassed 10,000 active professionals on the platform. This milestone reflects the growing trust that agencies and freelancers place in our marketplace.</p><p>From design studios in Cairo to development agencies in Dubai, our community spans across the Middle East and beyond. We remain committed to building the best platform for professional services discovery and collaboration.</p>',
                ],
            ],
            'Trends' => [
                [
                    'title' => 'The Rise of AI in Creative Services',
                    'sub_title' => 'How agencies are integrating AI tools into their workflows',
                    'details' => '<p>Artificial Intelligence is no longer a futuristic concept — it is a daily tool for many creative professionals. From AI-assisted design to automated content generation, agencies are finding innovative ways to leverage technology.</p><p>However, the most successful agencies are not replacing human creativity with AI. Instead, they are using AI to handle repetitive tasks, generate initial concepts, and speed up production — freeing up their teams to focus on strategy, creativity, and client relationships.</p><p>The agencies that thrive will be those that find the right balance between AI efficiency and human creativity.</p>',
                ],
            ],
        ];

        foreach ($topics as $topicName => $blogs) {
            $topic = Topic::create([
                'name' => $topicName,
                'slug' => Str::slug($topicName),
            ]);

            foreach ($blogs as $blog) {
                Blog::create([
                    'topic_id' => $topic->id,
                    'title' => $blog['title'],
                    'sub_title' => $blog['sub_title'],
                    'slug' => Str::slug($blog['title']),
                    'details' => $blog['details'],
                ]);
            }
        }
    }
}
