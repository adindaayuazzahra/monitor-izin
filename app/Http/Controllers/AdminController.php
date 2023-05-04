<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use App\Models\Perpanjangan;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function perijinan()
    {
        // $perijinans = \DB::table('tb_perizinan')
        // ->leftJoin('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->where('tb_perpanjangan.status_aktif', 0)
        // ->groupBy('tb_perizinan.id')
        // ->select('tb_perizinan.*', \DB::raw('MAX(tb_perpanjangan.tanggal_berakhir) as tanggal_berakhir'), \DB::raw('MAX(tb_perpanjangan.status_perpanjangan) as status_perpanjangan'))
        // ->get();


        //     $perijinans = Perizinan::
        // join('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->select('tb_perizinan.*', 'tb_perpanjangan.status_perpanjangan', 'tb_perpanjangan.tanggal_berakhir')
        // ->where('tb_perpanjangan.status_perpanjangan', '=', 1)
        // ->where('tb_perpanjangan.tanggal_berakhir', '=', function ($query) {
        //     $query->select('tanggal_berakhir')
        //         ->from('tb_perpanjangan')
        //         ->whereColumn('id_perizinan', 'tb_perizinan.id')
        //         ->where('status_perpanjangan', '=', 1)
        //         ->latest()
        //         ->limit(1);
        // })
        // ->get();
        // $perijinans = Perizinan::join('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->select('tb_perizinan.*', 'tb_perpanjangan.tanggal_berakhir')->get();

        // $perijinans = Perizinan::select(
        //     'tb_perizinan.*',
        //     \DB::raw('(SELECT tanggal_berakhir FROM tb_perpanjangan WHERE id_perizinan = tb_perizinan.id AND status_aktif = 0 ORDER BY tanggal_berakhir DESC LIMIT 1) AS tanggal_berakhir')
        // )
        //     ->get();

        // $perijinans = Perizinan::select(
        //     'tb_perizinan.*',
        //     \DB::raw('(SELECT tanggal_berakhir FROM tb_perpanjangan WHERE id_perizinan = tb_perizinan.id AND status_aktif = 0 ORDER BY tanggal_berakhir DESC LIMIT 1) AS tanggal_berakhir'),
        //     'tb_perpanjangan.status_perpanjangan' // menambahkan kolom status_perpanjangan
        // )

        // ->leftJoin('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->get();
        // dd($perijinans);

        // $perijinans = Perizinan::select(
        //     'tb_perizinan.*',
        //     \DB::raw('(SELECT tanggal_berakhir FROM tb_perpanjangan WHERE id_perizinan = tb_perizinan.id AND status_aktif = 0 ORDER BY tanggal_berakhir DESC LIMIT 1) AS tanggal_berakhir'),
        //     'tb_perpanjangan.status_perpanjangan' 
        // )
        // ->leftJoin('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->groupBy('tb_perizinan.id', 'tb_perpanjangan.status_perpanjangan')
        // ->get();

        // $perijinans = Perizinan::select(
        //     'tb_perizinan.*',
        //     \DB::raw('(SELECT tanggal_berakhir FROM tb_perpanjangan WHERE id_perizinan = tb_perizinan.id AND status_aktif = 0 ORDER BY tanggal_berakhir DESC LIMIT 1) AS tanggal_berakhir'),
        //     'tb_perpanjangan.status_perpanjangan' 
        // )
        // ->leftJoin('tb_perpanjangan', 'tb_perizinan.id', '=', 'tb_perpanjangan.id_perizinan')
        // ->groupBy('tb_perizinan.id')
        // ->get();

        $perijinans = DB::table('tb_perizinan')
            ->select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->get();

        
        return view('admin.perijinan', compact('perijinans'));
    }

    public function perijinanAdd()
    {

        return view('admin.form_perijinan');
    }

    public function perijinanAddDo(Request $request)
    {
        $request->validate([
            'nama_perizinan' => 'required',
            'lokasi' => 'required',
            'instansi_terkait' => 'required',
            'perkiraan_proses' => 'required|numeric',
            // 'status' => 'required'
        ]);

        $perijinan = new Perizinan();
        $perijinan->id_user = auth()->user()->id;
        $perijinan->nama_perizinan = $request->nama_perizinan;
        $perijinan->lokasi = $request->lokasi;
        $perijinan->instansi_terkait = $request->instansi_terkait;
        $perijinan->perkiraan_proses = $request->perkiraan_proses;
        $perijinan->status = 1;
        $perijinan->save();
        return redirect()->route('admin.perijinan');
    }

    public function perijinanDetail($id)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 1)->oldest('created_at')->get();
        $perpanjangan_aktif = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 0)->get();
        $perpanjangan_stat = Perpanjangan::where('id_perizinan', $perijinan->id)->where('status_aktif', 0)->first();
        return view('admin.detail', compact('perijinan', 'perpanjangan', 'perpanjangan_aktif', 'perpanjangan_stat'));
    }

    public function perijinanEdit($id)
    {
        $perijinan = Perizinan::find($id);
        return view('admin.form_perijinan', compact('perijinan'));
    }

    public function perijinanEditDo(Request $request, $id)
    {
        $perijinan = Perizinan::find($id);
        $request->validate([
            'nama_perizinan' => 'required',
            'lokasi' => 'required',
            'instansi_terkait' => 'required',
            'perkiraan_proses' => 'required|numeric',
            // 'status' => 'required'
        ]);
        $perijinan->id_user = auth()->user()->id;
        $perijinan->nama_perizinan = $request->nama_perizinan;
        $perijinan->lokasi = $request->lokasi;
        $perijinan->instansi_terkait = $request->instansi_terkait;
        $perijinan->perkiraan_proses = $request->perkiraan_proses;
        // $perijinan->status = $request->status;
        $perijinan->save();

        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perijinanDeleteDo($id)
    {
        $perijinan = Perizinan::find($id);
        $perijinan->delete();
        return redirect()->route('admin.perijinan');
    }

    public function perpanjanganAdd($id)
    {
        $perijinan = Perizinan::find($id);
        return view('admin.form_perpanjangan', compact('perijinan'));
    }

    public function perpanjanganAddDo(Request $request, $id)
    {
        $perijinan = Perizinan::find($id);
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            // 'tanggal_registrasi_ulang' => 'required|date|after_or_equal:tanggal_registrasi',
            // 'tanggal_berakhir' => 'required|date',
            'tanggal_berakhir' => [
                'sometimes',
                'nullable',
                'required_if:status_perpanjangan,1',
                'date',
            ],
            'alokasi_biaya' => 'required',
            // 'masa_berlaku' => 'required',
            'status_perpanjangan' => 'required'
        ]);

        Perpanjangan::where('id_perizinan', $perijinan->id)
            ->where('status_aktif', 0)
            ->update(['status_aktif' => 1]);


        $perpanjangan = new Perpanjangan;
        $perpanjangan->id_perizinan = $perijinan->id;
        $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;
        // $perpanjangan->tanggal_registrasi_ulang = $request->tanggal_registrasi_ulang;
        $perpanjangan->alokasi_biaya = $request->alokasi_biaya;
        $perpanjangan->catatan = $request->catatan;
        $perpanjangan->status_perpanjangan = $request->status_perpanjangan;
        $perpanjangan->status_aktif = 0;

        if ($request->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
        } else {
            $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            $perpanjangan->masa_berlaku = $selisih;
        }

        $perpanjangan->save();

        $perijinan->status = 0;
        $perijinan->save();
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perpanjanganEdit($id, $id_perpanjangan)
    {
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        // dd($perpanjangan);
        $perijinan = Perizinan::find($id);
        // dd($perpanjangan);
        return view('admin.form_perpanjangan', compact('perijinan', 'perpanjangan'));
    }

    public function perpanjanganEditDo($id, $id_perpanjangan, Request $request)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        // dd($perpanjangan);
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            // 'tanggal_registrasi_ulang' => 'required|date|after_or_equal:tanggal_registrasi',
            // 'tanggal_berakhir' => 'required|date',
            'tanggal_berakhir' => [
                'sometimes',
                'nullable',
                'required_if:status_perpanjangan,1',
                'date',
            ],
            'alokasi_biaya' => 'required',
            // 'masa_berlaku' => 'required',
            'status_perpanjangan' => 'required'
        ]);

        $perpanjangan->id_perizinan = $perijinan->id;
        $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;
        $perpanjangan->alokasi_biaya = $request->alokasi_biaya;
        $perpanjangan->catatan = $request->catatan;
        $perpanjangan->status_perpanjangan = $request->status_perpanjangan;

        if ($request->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
            $perpanjangan->tanggal_berakhir = NULL;
        } else {
            $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            $perpanjangan->masa_berlaku = $selisih;
        }

        $perpanjangan->save();
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perpanjanganNonaktifDo($id, $id_perpanjangan)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);

        $perpanjangan->status_aktif = 1;
        $perpanjangan->save();
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perpanjanganAktifDo($id, $id_perpanjangan)
    {
        // dd($id_perpanjangan);

        $perijinan = Perizinan::find($id);
        
        Perpanjangan::where('id_perizinan', $id)
        ->where('status_aktif', 0)
        ->update(['status_aktif' => 1]);
        
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        // dd($perpanjangan);
        $perpanjangan->status_aktif = 0;
        $perpanjangan->save();
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }
}
