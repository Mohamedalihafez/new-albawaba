<?php

namespace App\Console\Commands;

use App\Models\Advertisement;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

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
        //
        $advertisments = Advertisement::where('expired_at','<=', Carbon::now()->subDays(1))->get();
   
        foreach( $advertisments as $advertisment)
        {
            $advertisment->seen = 0;
            $advertisment->save();
        }
        echo "operation done";
    }
}
