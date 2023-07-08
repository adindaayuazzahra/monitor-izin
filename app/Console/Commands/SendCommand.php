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
        // ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)->where('status_perpanjangan', 1)->where('status_aktif', 0)->get();
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
                    //yoga
                    '+6287718183852',
                    //pak ari
                    '+6285215609439',
                    //pak rusdi
                    '+6281288668996',
                    //dinda
                    '+6285773559090'
                ];
                foreach ($numbers as $number) {
                    $message = "*Halo*,\nIni merupakan pesan notifikasi dari *Monitoring Perijinan*\n\nAda beberapa perizinan yang membutuhkan perpanjangan segera karena  akan segera berakhir masa berlakunya. Berikut ini adalah daftar perijinan yang harus Anda perhatikan: \n";
                    foreach ($warnings as $loopIndex => $item) {
                        $tanggalBerakhir = Carbon::parse($item->tanggal_berakhir)->format('d M Y');
                        $nomorUrut = $loopIndex + 1;
                        $message .= "\n" . $nomorUrut . ". *" . $item->nama_perizinan . "* \nTanggal Berakhir : *" . $tanggalBerakhir . "*";
                    }
                    $message .= "\n\nUntuk informasi lebih lanjut dan melakukan perpanjangan segera cek webnya di link berikut\nelegal.proyekskripsi.site \n\nTerima kasih atas perhatiannya, \n*Have a nice day!* (●'◡'●)";
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
                        echo "Pesan berhasil dikirim";
                    } else {
                        // Pesan gagal dikirim
                        // Lakukan tindakan sesuai kebutuhan Anda
                        echo "Pesan gagal dikirim";
                    }
                }
            }
        } else {
            echo "Sekarang bukan hari rabu yang tanggal ganjil";
        }
    }
}
