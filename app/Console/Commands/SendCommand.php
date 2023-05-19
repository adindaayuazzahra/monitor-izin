<?php

namespace App\Console\Commands;

use App\Models\Perizinan;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendwa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ini ngirim wa cok';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tanggalSekarang = Carbon::now();
        $tanggalBatas = $tanggalSekarang->copy()->addMonths(3);
        // $perpanjangan = Perpanjangan::whereDate('tanggal_berakhir', '>', $tanggalSekarang)
        //     ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)->where('status_perpanjangan', 1)->where('status_aktif', 0)->get();
        $warnings = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')

            ->whereDate('tanggal_berakhir', '>', $tanggalSekarang)
            ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)
            ->where('status_perpanjangan', 1)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();
        if ($tanggalSekarang->isWednesday() && $tanggalSekarang->day % 2 == 1) {
            if ($warnings->isEmpty()) {
                echo "Tidak ada perijinan yang masa tenggang";
            } else {
                $client = new Client();
                $numbers = [
                    '+6287718183852',
                    '+6287770071748'
                ];
                foreach ($numbers as $number) {
                    $message = "Halo, Ini merupakan pesan notifikasi dari *Monitoring Perijinan*\n\nAda beberapa Perizinan yang harus di perpanjangan karena ingin habis masa berlakunya Berikut adalah peringatan daftar Perijinan yang akan segera berakhir:";
                    foreach ($warnings as $item) {
                        $tanggalBerakhir = Carbon::parse($item->tanggal_berakhir)->format('d M Y');
                        $message .= "\n- *" . $item->nama_perizinan . "* Tanggal Berakhir : *" . $tanggalBerakhir . "*";
                    }
                    $message .= "\n\nSegera Cek webnya ya! monit-izin.proyekskripsi.site (●'◡'●)";
                    $response = $client->post('http://121.100.18.51:8000/send-message1234567890987654321', [
                        'form_params' => [
                            'number' => $number,
                            'message' => $message,
                        ],
                    ]);

                    $statusCode = $response->getStatusCode();
                    $responseBody = $response->getBody();

                    // Menangani respons berdasarkan status code
                    if ($statusCode == 200) {
                        // Pesan berhasil dikirim
                        // Lakukan tindakan sesuai kebutuhan Anda
                        echo "Pesan berhasil dikirim ";
                    } else {
                        // Pesan gagal dikirim
                        // Lakukan tindakan sesuai kebutuhan Anda
                        echo "Pesan gagal dikirim";
                    }
                }
            }
        }
    }
}
