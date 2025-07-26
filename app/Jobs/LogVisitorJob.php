<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\VisitorLog;

class LogVisitorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $visitorData;

    public function __construct(array $visitorData)
    {
        $this->visitorData = $visitorData;
    }

    public function handle()
    {
        VisitorLog::create($this->visitorData);
    }
} 