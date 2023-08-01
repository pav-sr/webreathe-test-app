<?php

namespace App\Console\Commands;

use App\Enums\ModuleStatus;
use App\Models\Module;
use Illuminate\Console\Command;

class SimulateModules extends Command
{
    private const RANDOM_MAX_RANGE = 10;

    private const SLEEP_TIME = 1;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:simulate-modules-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Randomize values and statuses of modules';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true) {
            $modules = Module::all();

            foreach ($modules as $module) {
                $module->value = self::RANDOM_MAX_RANGE *
                    mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax()
                ;
                $module->status = ModuleStatus::cases()[
                    (mt_rand(0, count(ModuleStatus::cases()) - 1))
                ];

                $module->saveOrFail();

                $this->info(
                    "Module # {$module->id} with name \"{$module->name}\" of type ".
                    "\"{$module->type->value}\" has been randomly changed by ".
                    "value = {$module->value} and ".
                    "status = \"{$module->status->value}\""
                );
                $this->info('------------------------------------------------');
            }

            sleep(self::SLEEP_TIME);
        }
    }
}
