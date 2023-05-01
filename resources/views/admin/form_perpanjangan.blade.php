@extends('index')
@section('content')
    <div class="d-flex align-items-start justify-content-center"
        style="height:170px;background-color:#0288F6;padding-top:50px">
        <div class="text-white text-center">
            <h2>Halaman Perpanjangan </h2>
        </div>
    </div>

    <section style="margin-left:30px; margin-right:30px; margin-top:-80px;">
        <div class="card mb-5 shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Form {{ isset($perpanjangan) ? 'Edit' : 'Tambah' }} Form Perpanjangan</h5>
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
                <form action="{{isset($perpanjangan) ? route('admin.perpanjangan.edit.do', ['id' => $perijinan->id, 'id_perpanjangan' => $perpanjangan->id ]) : route('admin.perpanjangan.add.do', ['id' => $perijinan->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="tanggal_registrasi" class="form-label"><strong>Tanggal Regristrasi</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="date"
                            class="form-control @error('tanggal_registrasi') is-invalid @enderror" id="tanggal_registrasi"
                            name="tanggal_registrasi" value="{{ $perpanjangan->tanggal_registrasi ?? old('tanggal_registrasi') }}">
                        @error('tanggal_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="tanggal_registrasi_ulang" class="form-label"><strong>Tanggal Regristrasi
                                Ulang</strong><span class="text-danger">*</span></label>
                        <input autocomplete="off" type="date"
                            class="form-control @error('tanggal_registrasi_ulang') is-invalid @enderror"
                            id="tanggal_registrasi_ulang" name="tanggal_registrasi_ulang"
                            value="{{ old('tanggal_registrasi_ulang') }}">
                        @error('tanggal_registrasi_ulang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="tanggal_berakhir" class="form-label"><strong>Tanggal Berkahir</strong></label>
                        <input autocomplete="off" type="date"
                            class="form-control @error('tanggal_berakhir') is-invalid @enderror" id="tanggal_berakhir"
                            name="tanggal_berakhir" value="{{ $perpanjangan->tanggal_berakhir ?? old('tanggal_berakhir') }}">
                        <small class="fst-italic"><span class="text-danger">*</span>Kosongkan jika perijinan bersifat
                            lifetime</small>
                        @error('tanggal_berakhir')
                            <div class="invalid-feedback">
                                The tanggal berakhir field is required when status perpanjangan is lisensi.
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="alokasi_biaya" class="form-label"><strong>Alokasi Biaya</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="number"
                            class="form-control  @error('alokasi_biaya') is-invalid @enderror" id="alokasi_biaya"
                            name="alokasi_biaya" value="{{ old('alokasi_biaya') }}">
                        @error('alokasi_biaya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="catatan" class="form-label"><strong>Catatan</strong></label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan">{{ $perpanjangan->catatan ?? old('catatan') }}</textarea>
                        {{-- <input autocomplete="off" type="text"
                            class="form-control  @error('catatan') is-invalid @enderror" id="catatan" name="catatan"
                            value="{{ old('catatan') }}"> --}}
                        @error('catatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-md-6 col-sm-12">
                            <label for="masa_berlaku" class="form-label"><strong>Masa Berlaku</strong><span
                                    class="text-danger">*</span></label>
                            <input autocomplete="off" type="text"
                                class="form-control @error('masa_berlaku') is-invalid @enderror" id="masa_berlaku"
                                name="masa_berlaku" value="{{ old('masa_berlaku') }}">
                            @error('masa_berlaku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="alokasi_biaya" class="form-label"><strong>Alokasi Biaya</strong><span
                                        class="text-danger">*</span></label>
                                <input autocomplete="off" type="text"
                                    class="form-control  @error('alokasi_biaya') is-invalid @enderror" id="alokasi_biaya"
                                    name="alokasi_biaya" value="{{ $perpanjangan->alokasi_biaya ?? old('alokasi_biaya') }}">
                                @error('alokasi_biaya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="status_perpanjangan" class="form-label"><strong>Jenis Perijinan</strong><span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="status_perpanjangan">
                                <option selected value="0"  {{ old('status_perpanjangan', isset($perpanjangan) && $perpanjangan->status_perpanjangan == 0 ? 'selected' : '') }}>
                                    Lifetime
                                </option>
                                <option value="1" {{ old('status_perpanjangan', isset($perpanjangan) && $perpanjangan->status_perpanjangan == 1 ? 'selected' : '') }}>
                                    Lisensi</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="status" class="form-label"><strong>Status</strong><span
                                class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected value="0"
                                {{ old('status', isset($perijinan) && $perijinan->status == 0 ? 'selected' : '') }}>Aktif
                            </option>
                            <option value="1"
                                {{ old('status', isset($perijinan) && $perijinan->status == 1 ? 'selected' : '') }}>
                                Non-Aktif</option>
                        </select>
                    </div> --}}
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.perijinan.detail', ['id' => $perijinan->id]) }}" type="button"
                            class="btn btn-dark">Kembali</a>
                        <button type="submit" class="btn text-white" style="background-color: #873FFD">{{ isset($perpanjangan) ? 'Edit' : 'Tambah' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
