<?php

namespace App\Console\Commands;

use App\Models\Perizinan;
use App\Models\Perpanjangan;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status perizinan';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tanggalHariIni = Carbon::now()->toDateString();
        $perpanjangan = Perpanjangan::where('tanggal_berakhir', $tanggalHariIni)->get();

        foreach ($perpanjangan as $p) {
            $perizinan = Perizinan::find($p->id_perizinan);
            $perizinan->status = 1;
            $perizinan->save();
        }
    }
}
