<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use Illuminate\Support\Str;
use App\Models\Dokumen;
use App\Models\Perizinan;
use App\Models\Perpanjangan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {

        $lifetimecount = Perpanjangan::where('status_perpanjangan', 0)->where('status_aktif', 0)->count();
        $lisensicount = Perpanjangan::where('status_perpanjangan', 1)->where('status_aktif', 0)->count();
        $perijinancount = Perizinan::count();
        $nonaktifcount = Perizinan::where('status', 1)->count();
        $prosescount = Perizinan::where('status', 2)->count();

        $tanggalSekarang = Carbon::now();
        $tanggalBatas = $tanggalSekarang->copy()->addMonths(3);
        $tigabulancount = Perpanjangan::whereDate('tanggal_berakhir', '>', $tanggalSekarang)
            ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)->where('status_perpanjangan', 1)->where('status_aktif', 0)
            ->count();
        // dd($tigabulancount);


        $perijinans = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')

            /* menampilkan yang 3 bulan mau habis :
            ->whereDate('tanggal_berakhir', '>', $tanggalSekarang)
            ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)
            ->where('status_perpanjangan', 1) */


            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();


        $lisensis = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->where('status_perpanjangan', 1)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();


        $lifetimes = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->where('status_perpanjangan', 0)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();


        $proses = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->where('status', 2)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();


        $warnings = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')

            ->whereDate('tanggal_berakhir', '>', $tanggalSekarang)
            ->whereDate('tanggal_berakhir', '<=', $tanggalBatas)
            ->where('status_perpanjangan', 1)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();

        $nonaktifs = Perizinan::select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->where('status', 1)
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();

        return view('user.perijinan.index', compact('perijinans', 'lisensis', 'lifetimes', 'proses', 'warnings', 'nonaktifs', 'lifetimecount', 'lisensicount', 'perijinancount', 'nonaktifcount', 'tigabulancount', 'prosescount'));
    }

    public function perijinanDetail($id)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 1)->oldest('created_at')->get();
        $perpanjangan_aktif = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 0)->get();
        $perpanjangan_stat = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 0)->first();
        // foreach ($perpanjangan_aktif as $p) {
        //     $dok_aktif = Dokumen::where('id_perpanjangan', $p->id)->get();
        //     // melakukan sesuatu dengan $dok_aktif
        // }
        $dok_aktif = array();
        foreach ($perpanjangan_aktif as $p) {
            $dok_aktif[] = Dokumen::where('id_perpanjangan', $p->id)->where('status', 0)->get();
            // melakukan sesuatu dengan $dok_aktif
        }

        $dok_aktif_result = array();
        foreach ($perpanjangan_aktif as $p) {
            $dok_aktif_result[] = Dokumen::where('id_perpanjangan', $p->id)->where('status', 1)->get();
            // melakukan sesuatu dengan $dok_aktif
        }



        $dok_noaktif = array();
        foreach ($perpanjangan as $p) {
            $dok_noaktif[] = Dokumen::where('id_perpanjangan', $p->id)->where('status', 0)->get();
            // melakukan sesuatu dengan $dok_aktif
        }

        $dok_noaktif_result = array();
        foreach ($perpanjangan as $p) {
            $dok_noaktif_result[] = Dokumen::where('id_perpanjangan', $p->id)->where('status', 1)->get();
            // melakukan sesuatu dengan $dok_aktif
        }

        return view('user.perijinan.detail', compact('perijinan', 'perpanjangan', 'perpanjangan_aktif', 'perpanjangan_stat', 'dok_aktif', 'dok_noaktif', 'dok_aktif_result', 'dok_noaktif_result'));
    }

    public function pdfView(Request $request, $id)
    {
        $token = $request->input('token');
        $dokumen = Dokumen::findOrFail($id);
        if ($token !== $dokumen->token) {
            $request->session()->flash('message', 'Token yang Anda Masukkan Salah!');
            $request->session()->flash('title', 'Gagal');
            $request->session()->flash('icon', 'error');
            return redirect()->back();
        }
        $pdfPath = storage_path('app/pdf/' . $dokumen->doc);
        return response()->download($pdfPath);
    }

    public function akta()
    {
        $aktas = Akta::all();
        return view('user.akta.akta', compact('aktas'));
    }

    public function aktaDetail($id)  {
        $akta = Akta::find($id);
        return view('user.akta.detail', compact('akta'));
    }
    public function pdfAkta(Request $request, $id)
    {
        $token = $request->input('token');
        $akta = Akta::findOrFail($id);
        if ($token !== $akta->token) {
            $request->session()->flash('message', 'Token yang Anda Masukkan Salah!');
            $request->session()->flash('title', 'Gagal');
            $request->session()->flash('icon', 'error');
            return redirect()->back();
        }
        $pdfPath = storage_path('app/pdf/' . $akta->doc_akta);
        return response()->download($pdfPath);
    }
}
