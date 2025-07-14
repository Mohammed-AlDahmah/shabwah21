<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'تقرير خاص: حكمة الانتقالي تحبط أطماع الأعداء وتعزز استقرار حضرموت',
                'slug' => 'special-report-hadramout',
                'description' => 'تقرير خاص عن دور المجلس الانتقالي في استقرار حضرموت.',
                'thumbnail' => '/images/video1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=xxxxxxx',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'لقاء خاص مع قيادات حضرموت حول آخر المستجدات',
                'slug' => 'leaders-interview-hadramout',
                'description' => 'لقاء مع قيادات حضرموت حول التطورات الأخيرة.',
                'thumbnail' => '/images/video2.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=yyyyyyy',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now(),
            ],
        ];
        foreach ($videos as $video) {
            Video::create($video);
        }
    }
} 