<?php

namespace App\Console\Commands;

use App\Data\Services\Weather\Features\SyncWeather;
use App\Data\Services\Weather\Features\SyncWeathers;
use App\Domain\Models\Weather;
use Illuminate\Console\Command;

class SyncUsersWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:users-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync users weather command.';

    private SyncWeathers $syncWeathersService;

    /**
     * @param SyncWeathers $syncWeathersService
     */
    public function __construct(SyncWeathers $syncWeathersService)
    {
        $this->syncWeathersService = $syncWeathersService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->syncWeathersService->handle();
    }
}
