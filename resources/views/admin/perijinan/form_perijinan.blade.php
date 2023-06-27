@extends('index')
@section('content')
    <div class="d-flex align-items-start justify-content-center"
        style="height:170px;background-color:#0288F6;padding-top:50px">
        {{-- <div class="overlay" style="opacity: 0.5"></div> --}}
        <div class="text-white text-center">
            <h2 style="">Halaman {{ isset($perijinan) ? 'Edit' : 'Tambah' }} Perijinan</h2>
            {{-- <p style="font-size:16pt;">Pada halaman ini anda dapat menambahkan, menyunting dan menghapus perijinan.</p> --}}
        </div>
    </div>
    <section style="margin-left:30px; margin-right:30px; margin-top:-80px;">
        <div class="card mb-5 shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Form {{ isset($perijinan) ? 'Edit' : 'Tambah' }} Perijinan</h5>
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
            <div class="card" style="margin:20px 55px 50px 55px; background-color: transparent;border: none;">
                <form
                    action="{{ isset($perijinan) ? route('admin.perijinan.edit.do', ['id' => $perijinan->id]) : route('admin.perijinan.add.do') }}"
                    method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama_perizinan" class="form-label"><strong>Nama Perijinan</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="text"
                            class="form-control @error('nama_perizinan') is-invalid @enderror" id="nama_perizinan"
                            name="nama_perizinan" value="{{ $perijinan->nama_perizinan ?? old('nama_perizinan') }}">
                        @error('nama_perizinan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label"><strong>Lokasi</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="text" class="form-control  @error('lokasi') is-invalid @enderror"
                            id="lokasi" name="lokasi" value="{{ $perijinan->lokasi ?? old('lokasi') }}">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instansi_terkait" class="form-label"><strong>Instansi Terkait</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="text"
                            class="form-control @error('instansi_terkait') is-invalid @enderror" id="instansi_terkait"
                            name="instansi_terkait" value="{{ $perijinan->instansi_terkait ?? old('instasi_terkait') }}">
                        @error('instansi_terkait')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <a href="{{ isset($perijinan) ? route('admin.perijinan.detail', ['id' => $perijinan->id]) : route('admin.perijinan') }}"
                            type="button" class="btn btn-dark">Kembali</a>
                        <button type="submit" class="btn text-white"
                            style="background-color: #873FFD">{{ isset($perijinan) ? 'Edit' : 'Tambah' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
