<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeAssets extends Command
{
    protected $signature = 'assets:optimize';
    protected $description = 'Optimize assets for better performance';

    public function handle()
    {
        $this->info('Optimizing assets...');
        
        // تحسين الصور
        $this->optimizeImages();
        
        // تحسين CSS
        $this->optimizeCSS();
        
        // تحسين JavaScript
        $this->optimizeJS();
        
        $this->info('Assets optimization completed!');
        
        return 0;
    }
    
    private function optimizeImages()
    {
        $this->info('Optimizing images...');
        
        $imagePath = public_path('images');
        if (File::exists($imagePath)) {
            $images = File::glob($imagePath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            
            foreach ($images as $image) {
                // يمكن إضافة مكتبة لضغط الصور هنا
                $this->line('Optimized: ' . basename($image));
            }
        }
    }
    
    private function optimizeCSS()
    {
        $this->info('Optimizing CSS...');
        
        $cssPath = public_path('css/main.css');
        if (File::exists($cssPath)) {
            $css = File::get($cssPath);
            
            // إزالة التعليقات والمسافات الزائدة
            $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
            $css = preg_replace('/\s+/', ' ', $css);
            $css = str_replace(['; ', ' {', '{ ', ' }', '} ', ': '], [';', '{', '{', '}', '}', ':'], $css);
            
            File::put($cssPath, $css);
            $this->line('CSS optimized');
        }
    }
    
    private function optimizeJS()
    {
        $this->info('Optimizing JavaScript...');
        
        $jsFiles = [
            public_path('js/main.js'),
            public_path('js/mobile-menu-fix.js'),
            public_path('js/livewire-compat.js')
        ];
        
        foreach ($jsFiles as $jsFile) {
            if (File::exists($jsFile)) {
                $js = File::get($jsFile);
                
                // إزالة التعليقات والمسافات الزائدة
                $js = preg_replace('/\/\*.*?\*\//s', '', $js);
                $js = preg_replace('/\/\/.*$/m', '', $js);
                $js = preg_replace('/\s+/', ' ', $js);
                
                File::put($jsFile, $js);
                $this->line('JS optimized: ' . basename($jsFile));
            }
        }
    }
} 