@extends('index')
@section('content')
    {{-- <section style="height:250px;background-color:#0288F6;">
    <div class="align-items-start justify-content-center d-flex pt-5">
        <div class="text-white text-center ">
            <h1 style="font-size:26pt;">Mengelola Perijinan</h1>
            <p style="font-size:16pt;">Pada halaman ini anda dapat menambahkan, menyunting dan menghpaus perizinan</p>
        </div>
    </div>
</section> --}}
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg') }})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1>Mengelola Perijinan</h1>
                <p>Pada halaman ini anda dapat menambahkan, menyunting dan menghapus perijinan.</p>
            </div>
        </div>
    </div>

    <section style="margin-left:30px; margin-right:30px; margin-top:-80px; margin-bottom:50px;">
        <div class="card shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
                {{-- <div class="d-flex">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
            </div>
            <div class="">
                <a href="" type="button" class="btn px-3  text-white" style="background: #873FFD;border-radius:30px;">
                    <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                </a>
            </div> --}}
            </div>
            <div class="card" style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="d-flex justify-content-md-end justify-content-xs-center">

                    <a href="{{ route('admin.perijinan.add') }}" type="button" class="btn mb-2 text-white"
                        style="background: #873FFD;border-radius:30px;">
                        <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                        Tambah Perijinan</a>
                </div>
                <table id="my_table" class="table w-100">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col">Tanggal Berkahir</th>
                            <th scope="col">Instansi Terkait</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- <th scope="col">Aksi</th> --}}
                            <th scope="col" style="width:12%">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($perijinans as $p)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($p->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                // Menghitung 3 bulan
                                // $threeMonthsLater = $now->addMonths(3);
                                // $tigabulan = $threeMonthsLater->daysInMonth;

                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                } 
                                // $tigabulan = Carbon::createFromDate($threeMonthsLater->year, $threeMonthsLater->month, 1)->daysInMonth;
                            @endphp
                            <tr
                                class="
                                    {{-- @if (!$p->tanggal_berakhir) @else
                                        @if ($p->status == 1 || Carbon::now() == $p->tanggal_berakhir) 
                                            bg-danger text-white
                                        @else
                                            {{ Carbon::now()->startOfDay()->diffInMonths($p->tanggal_berakhir, false) < 3? 'bg-warning': '' }} @endif 
                                    @endif --}}
                                    @if (!$p->tanggal_berakhir) @else
                                        {{-- @if ($p->status == 1 || Carbon::now() == $p->tanggal_berakhir) 
                                            bg-danger text-white
                                        @else --}}
                                            @if (Carbon::now()->isBefore($tanggal_berakhir))
                                                @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                    bg-warning 
                                                @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                    bg-danger text-white @endif
                                                @else
                                                    bg-black text-white    
                                            @endif 
                                        {{-- @endif  --}}
                                    @endif
                                ">
                                
                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $p->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($p->tanggal_berakhir === null)
                                        @if ($p->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($p->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $p->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($p->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- @php
                                        $tanggal_berakhir = Carbon::parse($p->tanggal_berakhir);
                                        $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                    @endphp --}}
                                    <p>
                                        @if ($p->status_perpanjangan === 0 || $p->tanggal_berakhir === null)
                                            -
                                        @else
                                            @if (Carbon::now()->isBefore($tanggal_berakhir))
                                                @if ($sisa_hari == 0)
                                                    Besok adalah tanggal berakhir
                                                @else
                                                    - {{ $sisa_hari }} Hari
                                                @endif
                                            @else
                                                @if ($sisa_hari == 0)
                                                    Hari ini adalah tanggal berakhir
                                                @else
                                                    Expired <br>
                                                    + {{ $sisa_hari }} Hari
                                                @endif
                                            @endif
                                        @endif

                                        {{-- @if ($status_sisa_hari == 'lewat')
                                             {{ $sisa_hari }}
                                        @else
                                            Sisa hari: {{ $sisa_hari }}
                                        @endif --}}
                                    </p>
                                </td>
                                <td>
                                    @if ($p->tanggal_berakhir == null && $p->status_perpanjangan !== 0)
                                        <a href="{{ route('admin.perpanjangan.add', ['id' => $p->id]) }}"
                                            class="btn btn btn-sm rounded-pill text-white"
                                            style="background-color: #873FFD;"><i class="fa-solid fa-plus"></i>
                                            Perpanjangan</a>
                                    @else
                                        <a class="
                                            @if (!$p->tanggal_berakhir) @else
                                                @if (Carbon::now()->isBefore($tanggal_berakhir))
                                                    @if ($sisa_hari <= 90 && $sisa_hari > 30)
                                                        text-black
                                                    @elseif($sisa_hari <= 30 && $sisa_hari >= 0)
                                                        text-white @endif
                                                @else
                                                    text-white    
                                                @endif
                                            @endif
                                        
                                        link-offset-2 link-body-emphasis link-underline link-underline-opacity-0 icon-link icon-link-hover"
                                            style="--bs-icon-link-transform: translate3d(0, -.200rem, 0);"
                                            href="{{ route('admin.perijinan.detail', ['id' => $p->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
