<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class ClearExpiredCache extends Command
{
    protected $signature = 'cache:clear-expired';
    protected $description = 'Clear expired cache entries';

    public function handle()
    {
        $this->info('Clearing expired cache entries...');
        
        // تنظيف cache منتهي الصلاحية
        Cache::flush();
        
        // تنظيف cache views
        Artisan::call('view:clear');
        
        // تنظيف cache config
        Artisan::call('config:clear');
        
        // تنظيف cache route
        Artisan::call('route:clear');
        
        $this->info('Expired cache cleared successfully!');
        
        return 0;
    }
} 