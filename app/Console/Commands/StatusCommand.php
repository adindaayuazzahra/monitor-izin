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
        /* ini kalo tanggal berakhir nya jadi parameter, kalo tanggal berkahirnya di majuin dari hari ini, 
        ini bakalan ga bisa ngerubah status non aktif jadi aktif lagi 
        kalo ngedit dari lisensi di edit jadi lifetime ga bisa berubah statusnya juga jadi aktif */


        // $tanggalHariIni = Carbon::now()->toDateString();
        // $perpanjangan = Perpanjangan::where('tanggal_berakhir', $tanggalHariIni)
        // ->orWhere('tanggal_berakhir', '<=', $tanggalHariIni)
        // ->get();

        // foreach ($perpanjangan as $p) {
        //     $perizinan = Perizinan::find($p->id_perizinan);
        //     $perizinan->status = 1;
        //     $perizinan->save();
        // }

        $tanggalHariIni = Carbon::now()->toDateString();
        $perpanjangan = Perpanjangan::where('status_aktif', '=', 0)->get();

        foreach ($perpanjangan as $p) {
            $perizinan = Perizinan::find($p->id_perizinan);
            if ($p->tanggal_berakhir > $tanggalHariIni) {
                $perizinan->status = 0; // jika tanggal berakhir lebih besar dari tanggal sekarang
            }elseif ($p->status_perpanjangan == 0 && $p->confirm == 1) {
                $perizinan->status = 0;
            } 
            else {
                $perizinan->status = 1;
            }
            $perizinan->save();
        }
    }
}
