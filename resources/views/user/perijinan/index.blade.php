@extends('index')
@section('content')
    {{-- <div class="align-items-start justify-content-center d-flex pt-5"
        style="height:300px;padding-left: 35px;padding-right: 30px;background-color:#0288F6;">
        <div class="text-white text-center ">
            <h1 style="font-size:26pt;">Monitoring Perijinan</h1>
            <p style="font-size:16pt;">Selamat datang di aplikasi <strong>Monitoring Perijinan PT Jasamarga
                    Tollroad Maintenance</strong></p>
        </div>
    </div> --}}
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg') }})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1>e-Legal</h1>
                <p>Selamat datang di aplikasi <strong>e-Legal PT Jasamarga
                        Tollroad Maintenance</strong></p>
            </div>
        </div>
    </div>

    <section style="margin-left:30px; margin-right:30px; margin-top:-80px; margin-bottom:50px;">
        <div class="row d-flex justify-content-center">
            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="lifetime">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-file-signature text-success" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5> Non-periodik</h5>
                    <p><strong>{{ $lifetimecount }}</strong> perijinan</p>
                </div>
            </div>
            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="lisensi">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-license text-primary" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5> Periodik</h5>
                    <p><strong>{{ $lisensicount }}</strong> perijinan</p>
                </div>
            </div>
            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="my_table">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-tally" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Total</h5>
                    <p><strong>{{ $perijinancount }}</strong> perijinan</p>
                </div>
            </div>

            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="proses">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-clock-three text-info" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Proses</h5>
                    <p><strong>{{ $prosescount }}</strong> perijinan</p>
                </div>
            </div>
            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="warning">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-triangle-warning text-warning" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Perpanjangan</h5>
                    <p><strong>{{ $tigabulancount }}</strong> perijinan</p>
                </div>
            </div>
            <div class="tombol col-sm-12 col-md text-center mt-4" data-target="nonaktif">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-rectangle-xmark text-danger" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Non-Aktif</h5>
                    <p><strong>{{ $nonaktifcount }}</strong> perijinan</p>
                </div>
            </div>
        </div>

        <div class="card shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
            </div>
            <div class="card" style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
                
                {{-- All perijinan --}}
                <table id="my_table" class="my_table table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- <th scope="col">Aksi</th> --}}
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
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
                                // $threeMonthsLater = $now->addMonths(3);
                                // $tigabulan = $threeMonthsLater->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                                // @dd($tigabulan, $sebulan)
                                // $tigabulan = Carbon::createFromDate($threeMonthsLater->year, $threeMonthsLater->month, 1)->daysInMonth;
                            @endphp
                            <tr
                                class="
                                    @if (!$p->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                        @else
                                            bg-black text-white    
                                        @endif 
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
                                    @elseif($p->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
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
                                            href="{{ route('perijinan.detail', ['id' => $p->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>
                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{-- lisensi --}}
                <table id="lisensi" class="table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            <th scope="col" style="width:6%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($lisensis as $lisensi)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($lisensi->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                            @endphp
                            <tr
                                class="
                                    @if (!$lisensi->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                            @else
                                            bg-black text-white    
                                        @endif 
                                    @endif
                                ">

                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $lisensi->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($lisensi->tanggal_berakhir === null)
                                        @if ($lisensi->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($lisensi->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $lisensi->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($lisensi->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($lisensi->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <p>
                                        @if ($lisensi->status_perpanjangan === 0 || $lisensi->tanggal_berakhir === null)
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
                                        <a class="
                                                @if (!$lisensi->tanggal_berakhir) @else
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
                                            href="{{ route('perijinan.detail', ['id' => $lisensi->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>

                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{-- lifetime --}}
                <table id="lifetime" class="table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($lifetimes as $lifetime)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($lifetime->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                            @endphp
                            <tr
                                class="
                                    @if (!$lifetime->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                            @else
                                            bg-black text-white    
                                        @endif 
                                    @endif
                                ">

                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $lifetime->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($lifetime->tanggal_berakhir === null)
                                        @if ($lifetime->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($lifetime->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $lifetime->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($lifetime->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($lifetime->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <p>
                                        @if ($lifetime->status_perpanjangan === 0 || $lifetime->tanggal_berakhir === null)
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
                                        <a class="
                                                @if (!$lifetime->tanggal_berakhir) @else
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
                                            href="{{ route('perijinan.detail', ['id' => $lifetime->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>

                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{-- prosees --}}
                <table id="proses" class="table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($proses as $pros)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($pros->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                            @endphp
                            <tr
                                class="
                                    @if (!$pros->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                            @else
                                            bg-black text-white    
                                        @endif 
                                    @endif
                                ">

                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $pros->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($pros->tanggal_berakhir === null)
                                        @if ($pros->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($pros->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $pros->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($pros->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($pros->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <p>
                                        @if ($pros->status_perpanjangan === 0 || $pros->tanggal_berakhir === null)
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
                                        <a class="
                                                @if (!$pros->tanggal_berakhir) @else
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
                                            href="{{ route('perijinan.detail', ['id' => $pros->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>

                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- warnings --}}
                <table id="warning" class="table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- <th scope="col">Aksi</th> --}}
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($warnings as $warning)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($warning->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                            @endphp
                            <tr
                                class="
                                    @if (!$warning->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                            @else
                                            bg-black text-white    
                                        @endif 
                                    @endif
                                ">

                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $warning->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($warning->tanggal_berakhir === null)
                                        @if ($warning->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($warning->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $warning->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($warning->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($warning->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <p>
                                        @if ($warning->status_perpanjangan === 0 || $warning->tanggal_berakhir === null)
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
                                        <a class="
                                                @if (!$warning->tanggal_berakhir) @else
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
                                            href="{{ route('perijinan.detail', ['id' => $warning->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>

                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                {{-- nonaktif --}}
                <table id="nonaktif" class="table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            @if (Auth::check() && Auth::user()->akses_level == 1)
                                <th scope="col" style="width:12%">Detail</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($nonaktifs as $non)
                            @php
                                // menghitung sisa hari
                                $tanggal_berakhir = Carbon::parse($non->tanggal_berakhir);
                                $sisa_hari = $tanggal_berakhir->diffInDays(Carbon::now());
                                
                                // Menentukan warna rows
                                $now = Carbon::now();
                                // menghitung 1 bulan
                                $sebulan = $now->daysInMonth;
                                
                                // Menghitung 3 bulan
                                $tigabulan = 0;
                                for ($i = 1; $i <= 3; $i++) {
                                    $date = $now->copy()->addMonths($i);
                                    $daysInMonth = Carbon::createFromDate($date->year, $date->month, 1)->daysInMonth;
                                    $tigabulan += $daysInMonth;
                                }
                            @endphp
                            <tr
                                class="
                                    @if (!$non->tanggal_berakhir) @else
                                        @if (Carbon::now()->isBefore($tanggal_berakhir))
                                            @if ($sisa_hari <= $tigabulan && $sisa_hari > 30)
                                                bg-warning 
                                            @elseif($sisa_hari <= $sebulan && $sisa_hari >= 0)
                                                bg-danger text-white @endif
                                            @else
                                            bg-black text-white    
                                        @endif 
                                    @endif
                                ">

                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>
                                    {{ $non->nama_perizinan }}
                                </td>
                                <td>
                                    @if ($non->tanggal_berakhir === null)
                                        @if ($non->status_perpanjangan === 0)
                                            <p>Selama Perusahaan Menjalankan Usaha</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @else
                                        {{ Carbon::make($non->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $non->instansi_terkait }}
                                </td>
                                <td>
                                    @if ($non->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($non->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <p>
                                        @if ($non->status_perpanjangan === 0 || $non->tanggal_berakhir === null)
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
                                    </p>
                                </td>
                                {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                    <td>
                                        <a class="
                                                @if (!$non->tanggal_berakhir) @else
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
                                            href="{{ route('perijinan.detail', ['id' => $non->id]) }}">Lihat
                                            Detail <i class="bi bi-arrow-up-right-square"></i></a>
                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('alert')
    <script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
        $(document).ready(function() {
            $('table').not('#my_table').hide().DataTable().destroy();
            $('.tombol').click(function() {
                var target = $(this).data('target');
                $('table').hide().DataTable().destroy(); // Sembunyikan semua tabel
                $('#' + target).show().DataTable({
                    dom: '<"row"<"col-sm-12 col-md-6 mt-2"B><"col-sm-12 col-md-6 mt-2"f>>' +
                        '<"row"<"col-sm-12"tr>>' +
                        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                    buttons: [
                        'excel', 'pdf', 'print'
                    ],
                    responsive: true,
                    "language": {
                        "search": "Cari:",
                        "lengthMenu": "Tampilkan _MENU_ data",
                        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                        "infoFiltered": "(difilter dari _MAX_ total data)",
                        "zeroRecords": "Tidak ada data yang sesuai dengan pencarian",
                        "paginate": {
                            "previous": '<i class="fa-solid fa-angle-left"></i>',
                            "next": '<i class="fa-solid fa-angle-right"></i>'
                        },
                        "aria": {
                            "sortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                            "sortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                        },
                    }
                }); // Tampilkan tabel yang sesuai dengan target
            });
        });
    </script>
@endsection
