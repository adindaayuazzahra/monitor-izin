<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Perizinan;
use App\Models\Perpanjangan;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('user.index');
    // }

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

        // $perijinans = DB::table('tb_perizinan')
        //     ->select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
        //     ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
        //     ->orderBy('CASE WHEN perpanjangan.tanggal_berakhir IS NULL THEN 0 ELSE 1 END ASC, perpanjangan.tanggal_berakhir ASC')
        //     ->get();

        // $perijinans = DB::table('tb_perizinan')
        //     ->select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
        //     ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
        //     ->orderByRaw('CASE WHEN perpanjangan.id_perizinan IS NULL THEN 1 ELSE 0 END')
        //     ->get();

        $perijinans = DB::table('tb_perizinan')
            ->select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
            ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
            ->orderByRaw('perpanjangan.id_perizinan IS NULL DESC')
            ->get();

        // $perijinans = DB::table('tb_perizinan')
        //     ->select('tb_perizinan.*', 'perpanjangan.tanggal_berakhir', 'perpanjangan.status_perpanjangan')
        //     ->leftJoin(DB::raw('(SELECT id_perizinan, MAX(tanggal_berakhir) AS tanggal_berakhir, MAX(status_perpanjangan) AS status_perpanjangan FROM tb_perpanjangan WHERE status_aktif = 0 GROUP BY id_perizinan) AS perpanjangan'), 'tb_perizinan.id', '=', 'perpanjangan.id_perizinan')
        //     ->get();



        return view('admin.perijinan_home', compact('perijinans'));
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

            // 'status' => 'required'
        ]);

        $perijinan = new Perizinan();
        $perijinan->id_user = auth()->user()->id;
        $perijinan->nama_perizinan = $request->nama_perizinan;
        $perijinan->lokasi = $request->lokasi;
        $perijinan->instansi_terkait = $request->instansi_terkait;

        $perijinan->status = 1;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Menambah Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan');
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



        return view('admin.detail', compact('perijinan', 'perpanjangan', 'perpanjangan_aktif', 'perpanjangan_stat', 'dok_aktif', 'dok_noaktif', 'dok_aktif_result', 'dok_noaktif_result'));
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

            // 'status' => 'required'
        ]);
        $perijinan->id_user = auth()->user()->id;
        $perijinan->nama_perizinan = $request->nama_perizinan;
        $perijinan->lokasi = $request->lokasi;
        $perijinan->instansi_terkait = $request->instansi_terkait;
        // $perijinan->perkiraan_proses = $request->perkiraan_proses;
        // $perijinan->status = $request->status;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Mengubah Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perijinanDeleteDo(Request $request, $id)
    {
        $perijinan = Perizinan::find($id);
        $perijinan->delete();
        $request->session()->flash('message', 'Berhasil Menghapus Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
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
            // 'tanggal_registrasi' => 'required|date',
            // 'tanggal_registrasi_ulang' => 'required|date|after_or_equal:tanggal_registrasi',
            // 'tanggal_berakhir' => 'required|date',
            // 'tanggal_berakhir' => [
            //     'sometimes',
            //     'nullable',
            //     'required_if:status_perpanjangan,1',
            //     'date',
            // ],
            'perkiraan_proses' => 'required|numeric',
            'alokasi_biaya' => 'required',
            // 'masa_berlaku' => 'required',
            'status_perpanjangan' => 'required'
        ]);

        Perpanjangan::where('id_perizinan', $perijinan->id)
            ->where('status_aktif', 0)
            ->update(['status_aktif' => 1]);


        $perpanjangan = new Perpanjangan;
        $perpanjangan->id_perizinan = $perijinan->id;
        // $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;
        $perpanjangan->alokasi_biaya = $request->alokasi_biaya;
        $perpanjangan->catatan = $request->catatan;
        $perpanjangan->status_perpanjangan = $request->status_perpanjangan;
        $perpanjangan->perkiraan_proses = $request->perkiraan_proses;
        $perpanjangan->status_aktif = 0;
        $perpanjangan->confirm = 0;

        if ($request->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
        } else {
            // $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            // $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            // $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            // $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            // $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            // $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            // $perpanjangan->masa_berlaku = $selisih;
            $perpanjangan->masa_berlaku = 'n';
        }

        $perpanjangan->save();

        $perijinan->status = 2;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Menambah Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
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
            // 'tanggal_registrasi' => 'required|date',
            // // 'tanggal_registrasi_ulang' => 'required|date|after_or_equal:tanggal_registrasi',
            // // 'tanggal_berakhir' => 'required|date',
            // 'tanggal_berakhir' => [
            //     'sometimes',
            //     'nullable',
            //     'required_if:status_perpanjangan,1',
            //     'date',
            // ],
            'perkiraan_proses' => 'required|numeric',
            'alokasi_biaya' => 'required',
            // 'masa_berlaku' => 'required',
            'status_perpanjangan' => 'required'
        ]);

        $perpanjangan->id_perizinan = $perijinan->id;
        // $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;
        $perpanjangan->alokasi_biaya = $request->alokasi_biaya;
        $perpanjangan->catatan = $request->catatan;
        $perpanjangan->status_perpanjangan = $request->status_perpanjangan;
        $perpanjangan->perkiraan_proses = $request->perkiraan_proses;

        if ($request->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
            // $perpanjangan->tanggal_berakhir = NULL;
        } else {
            // $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            // $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            // $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            // $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            // $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            // $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            $perpanjangan->masa_berlaku = 'n';
        }

        $perpanjangan->save();
        $request->session()->flash('message', 'Berhasil Mengubah Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perpanjanganNonaktifDo(Request $request, $id, $id_perpanjangan)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);

        // $perpanjangan->status_aktif = 1;
        // $perpanjangan->save();
        $perijinan->status = 1;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Menon-Aktifkan Perizinan!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function perpanjanganAktifDo(Request $request, $id, $id_perpanjangan)
    {
        // dd($id_perpanjangan);

        $perijinan = Perizinan::find($id);

        // Perpanjangan::where('id_perizinan', $id)
        //     ->where('status_aktif', 0)
        //     ->update(['status_aktif' => 1]);

        $perpanjangan = Perpanjangan::find($id_perpanjangan);

        // $perpanjangan->status_aktif = 0;
        // $perpanjangan->save();

        $perijinan->status = 0;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Mengaktifkan Perizinan!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function pdfAddDo($id, $id_perpanjangan, Request $request)
    {

        $perijinan = Perizinan::find($id);

        $perpanjangan = Perpanjangan::find($id_perpanjangan);

        $validator = Validator::make($request->all(), [
            'nama_file' => 'required',
            'file_pdf' => 'required|mimes:pdf,doc,docx|max:51200',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors->add('pdf', true);
            return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id])->withErrors($errors)->withInput();
        }

        $file = $request->file('file_pdf');
        $ext = $file->getClientOriginalExtension();
        $fileName = $request->input('nama_file') . '_' . Carbon::now()->format('dmy') . '.' .  $ext;
        Storage::putFileAs('pdf', $file, $fileName);

        $dokumen = new Dokumen();
        $dokumen->id_perpanjangan = $perpanjangan->id;
        $dokumen->doc = $fileName;
        $dokumen->status = 0;

        $dokumen->save();
        $request->session()->flash('message', 'Berhasil Menambahkan File!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function pdfView($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $pdfPath = storage_path('app/pdf/' . $dokumen->doc);
        // return response()->file($pdfPath);
        $extension = pathinfo($pdfPath, PATHINFO_EXTENSION);

        $headers = [
            'Content-Disposition' => 'inline; filename="' . $dokumen->doc . '"',
        ];

        if ($extension === 'pdf') {
            $headers['Content-Type'] = 'application/pdf';
        } elseif ($extension === 'doc') {
            $headers['Content-Type'] = 'application/msword';
        }

        return response()->file($pdfPath, $headers);
    }

    public function pdfDeleteDo(Request $request, $id, $id_doc)
    {
        $perijinan = Perizinan::find($id);

        $pdfFile = Dokumen::findOrFail($id_doc);
        Storage::delete('pdf/' . $pdfFile->doc);
        $pdfFile->delete();
        $request->session()->flash('message', 'Berhasil Menghapus PDF!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function confirmDo($id, $id_perpanjangan, Request $request)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);

        Dokumen::where('id_perpanjangan', $perpanjangan->id)->where('status', 1)
            ->update(['status' => 0]);

        $perpanjangan->confirm = 1;
        $perpanjangan->save();


        // $perijinan->status = 0;
        // $perijinan->save();

        $request->session()->flash('message', 'Berhasil Menyelesaikan Proses Perpanjangan!');
        $request->session()->flash('title', 'Selamat');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function pdfResultAddDo($id, $id_perpanjangan, Request $request)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        // dd($perpanjangan);
        $status_perpanjangan = $perpanjangan->status_perpanjangan;

        if ($status_perpanjangan == 1) {
            $validator = Validator::make($request->all(), [
                // 'nama_doc' => 'required',
                'tanggal_registrasi' => 'required|date',
                'tanggal_berakhir' => 'required|date',
                'file_result' => 'required|mimes:pdf|max:51200',
            ]);
            $request->validate([
                // maksimum 10MB
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                // 'nama_doc' => 'required',
                'tanggal_registrasi' => 'required|date',
                // 'tanggal_berakhir' => 'required|date',
                // 'tanggal_berakhir' => [
                //     'nullable',
                //     'required_if:' . $perpanjangan->status_perpanjangan . ',1',
                //     'date'
                // ],
                'file_result' => 'required|mimes:pdf|max:51200', // 
            ]);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors->add('result', true);
            return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id])->withErrors($errors)->withInput();
        }

        // $file = $request->file('file_result');
        // $ext = $file->getClientOriginalExtension();
        // $fileName = $request->input('nama_doc') . '_' . Carbon::now()->format('dmy') . '.' .  $ext;
        // Storage::putFileAs('pdf', $file, $fileName);

        $file = $request->file('file_result');
        $ext = $file->getClientOriginalExtension();
        $filenameWithExtension = $file->getClientOriginalName(); // Contoh: mydocument.pdf
        $filenameWithoutExtension = pathinfo($filenameWithExtension, PATHINFO_FILENAME); // Contoh: mydocument
        $fileName = $filenameWithoutExtension . '_' . Carbon::now()->format('dmy') . '.' .  $ext;
        Storage::putFileAs('pdf', $file, $fileName);

        $dokumen = new Dokumen();
        $dokumen->id_perpanjangan = $perpanjangan->id;
        $dokumen->doc = $fileName;
        $dokumen->status = 1;
        $dokumen->save();


        $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;

        if ($perpanjangan->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
        } else {
            $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            $perpanjangan->masa_berlaku = $selisih;
            // $perpanjangan->masa_berlaku = 'n';
        }
        $perpanjangan->save();

        $perijinan->status = 0;
        $perijinan->save();

        $request->session()->flash('message', 'Berhasil Menambahkan File!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function pdfResultEditDo($id, $id_perpanjangan, Request $request)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        // dd($perpanjangan);
        $status_perpanjangan = $perpanjangan->status_perpanjangan;

        //validasi data
        if ($status_perpanjangan == 1) {
            $validator = Validator::make($request->all(), [
                'tanggal_registrasi' => 'required|date',
                'tanggal_berakhir' => 'required|date',
                'file_result' => 'mimes:pdf|max:51200',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'tanggal_registrasi' => 'required|date',
                'file_result' => 'mimes:pdf|max:51200', // 
            ]);
        }

        // jika form ada yang error
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors->add('edit', true);
            return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id])->withErrors($errors)->withInput();
        }

        // jika file di edit
        if ($request->file_result) {

            // menghapus file kontrak yang sebelumnya
            $pdfFile =  Dokumen::where('id_perpanjangan', $perpanjangan->id)->where('status', 1)->first();
            if ($pdfFile) {
                Storage::delete('pdf/' . $pdfFile->doc);
                $pdfFile->delete();
            }

            $file = $request->file('file_result');
            $ext = $file->getClientOriginalExtension();
            $filenameWithExtension = $file->getClientOriginalName(); // Contoh: mydocument.pdf
            $filenameWithoutExtension = pathinfo($filenameWithExtension, PATHINFO_FILENAME); // Contoh: mydocument
            $fileName = $filenameWithoutExtension . '_' . Carbon::now()->format('dmy') . '.' .  $ext;
            Storage::putFileAs('pdf', $file, $fileName);

            // menyimpan file baru
            $dokumen = new Dokumen();
            $dokumen->id_perpanjangan = $perpanjangan->id;
            $dokumen->doc = $fileName;
            $dokumen->status = 1;
            $dokumen->save();
        }


        $perpanjangan->tanggal_registrasi = $request->tanggal_registrasi;

        if ($perpanjangan->status_perpanjangan == 0) {
            $perpanjangan->masa_berlaku = '-';
        } else {
            $tanggalRegistrasi = Carbon::parse($request->input('tanggal_registrasi'));
            $tanggalBerakhir = Carbon::parse($request->input('tanggal_berakhir'));
            $selisih_tahun = $tanggalRegistrasi->diffInYears($tanggalBerakhir);
            $selisih_hari = $tanggalRegistrasi->diffInDays($tanggalBerakhir) % 365;
            $selisih = $selisih_tahun . ' tahun ' . $selisih_hari . ' hari';

            $perpanjangan->tanggal_berakhir = $request->tanggal_berakhir;
            $tanggalHariIni = Carbon::now();
            if ($request->tanggal_berkahir == $tanggalHariIni) {
                $perijinan->status = 1;
                $perijinan->save();
            }elseif($request->tanggal_berakhir >= $tanggalHariIni) {
                $perijinan->status = 0;
                $perijinan->save();
            } elseif ($request->tanggal_berakhir < $tanggalHariIni) {
                $perijinan->status = 1;
                $perijinan->save();
            } 
            $perpanjangan->masa_berlaku = $selisih;
        }
        
        $perpanjangan->save();

        $request->session()->flash('message', 'Berhasil Mengubah Data!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }

    public function pdfProsesAddDo($id, $id_perpanjangan, Request $request)
    {
        $perijinan = Perizinan::find($id);
        $perpanjangan = Perpanjangan::find($id_perpanjangan);
        $request->validate([
            'pdf_proses' => 'required|mimes:pdf|max:51200', // maksimum 10MB
        ]);

        // $perijinan = Perizinan::find($id);

        $pdfFile =  Dokumen::where('id_perpanjangan', $perpanjangan->id)->where('status', 1)->first();
        if ($pdfFile) {
            Storage::delete('pdf/' . $pdfFile->doc);
            $pdfFile->delete();
        }


        // Dokumen::where('id_perpanjangan', $perpanjangan->id)->where('status', 1)
        //     ->update(['status' => 0]);

        $file = $request->file('pdf_proses');
        $ext = $file->getClientOriginalExtension();
        $filenameWithExtension = $file->getClientOriginalName(); // Contoh: mydocument.pdf
        $filenameWithoutExtension = pathinfo($filenameWithExtension, PATHINFO_FILENAME); // Contoh: mydocument
        $fileName = $filenameWithoutExtension . '_' . Carbon::now()->format('dmy') . '.' .  $ext;
        Storage::putFileAs('pdf', $file, $fileName);

        $dokumen = new Dokumen();
        $dokumen->id_perpanjangan = $perpanjangan->id;
        $dokumen->doc = $fileName;
        $dokumen->status = 1;
        $dokumen->save();

        $request->session()->flash('message', 'Berhasil Mengupload Surat Keterangan!');
        $request->session()->flash('title', 'Sukses');
        $request->session()->flash('icon', 'success');
        return redirect()->route('admin.perijinan.detail', ['id' => $perijinan->id]);
    }
};
