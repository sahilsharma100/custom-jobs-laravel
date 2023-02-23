<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Traits\CustomJobTrait;

class CustomQueue extends Command
{
    use CustomJobTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customjob:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To Run Custom Job For Laravel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("🚀🚀 Queue Running");
        return $this->getDataFromQueueAndProcess();
    }
}
