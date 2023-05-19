<?php

namespace App\Console\Commands;

use App\Models\Perpanjangan;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

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
        $perpanjangan = Perpanjangan::whereDate('tanggal_berakhir', '>', $tanggalSekarang)
            ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)->where('status_perpanjangan', 1)->where('status_aktif', 0)->get();

        foreach ($perpanjangan as $item) {
            $client = new Client();
            $response = $client->post('https://api.whatsapp.com/send', [
                'form_params' => [
                    'phone' => '+6285773559090',
                    'text' => 'Halo, peringatan bahwa perpanjangan Anda akan segera berakhir.',
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody();

            // Menangani respons berdasarkan status code
            if ($statusCode == 200) {
                // Pesan berhasil dikirim
                // Lakukan tindakan sesuai kebutuhan Anda
                echo "Pesan berhasil dikirim ke nomor: 08577355 ";
            } else {
                // Pesan gagal dikirim
                // Lakukan tindakan sesuai kebutuhan Anda
                echo "Pesan gagal dikirim ke nomor: 08577355";
            }
        }
    }
}
