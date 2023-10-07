<?php

namespace App\Console;

use App\Http\Controllers\DataAnggaranController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        if (now()->endOfMonth()->isToday()) {
            $schedule->call(function () {
                $dataAnggaranController = new DataAnggaranController();
                $$dataAnggaranController->store();
            })->monthly();
        }        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
