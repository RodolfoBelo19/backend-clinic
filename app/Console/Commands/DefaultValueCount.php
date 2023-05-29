<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class DefaultValueCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:default-value-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now();
        $firstDay = $today->firstOfMonth();

        if($today->equalTo($firstDay)) {
            DB::table('access_log_trackers')->update(['count_access' => 0]);
            $this->info('Value count reseted!');
        } else {
            $this->info('Value count not reseted!');
        }
    }
}
