@extends('index')
@section('content')
    <div class=" d-flex align-items-center justify-content-center" style="height:200px;background-color:#0288F6;">
        <div class="text-white text-center">
            <h2 class="text-center">Halaman {{ isset($akta) ? 'Edit' : 'Tambah' }} Akta</h2>
        </div>
    </div>
    <section style="margin:-80px 30px 50px 30px;">
        <div class="card mb-4 shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center justify-content-between text-white"
                style="margin:10px;border-radius:35px;padding:15px;background-color:#342073;">
                <div class="d-flex align-items-center ">
                    <i class="fas fa-search text-white"></i>
                    <h5 style="margin-left: 10px;">Form {{ isset($akta) ? 'Edit' : 'Tambah' }} Akta</h5>
                </div>
            </div>

            <div class="card" style="margin:20px 55px 50px 55px; background-color: transparent;border: none;">
                <form
                    action="{{ isset($akta) ? route('admin.akta.edit.do', ['id' => $akta->id]) : route('admin.akta.add.do') }}"
                    method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama_akta" class="form-label"><strong>Nama Akta</strong><span
                                class="text-danger">*</span></label>
                        <input autocomplete="off" type="text"
                            class="form-control @error('nama_akta') is-invalid @enderror" id="nama_akta" name="nama_akta"
                            value="{{ $akta->nama_akta ?? old('nama_akta') }}">
                        @error('nama_akta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row ">
                        <div class="col-md-6 mb-3 ">
                            <label for="nomor_akta" class="form-label"><strong>Nomor Akta</strong><span
                                    class="text-danger">*</span></label>
                            <input autocomplete="off" type="text"
                                class="form-control @error('nomor_akta') is-invalid @enderror" id="nomor_akta"
                                name="nomor_akta" value="{{ $akta->nomor_akta ?? old('nomor_akta') }}">
                            @error('nomor_akta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tahun" class="form-label"><strong>Tahun</strong><span
                                    class="text-danger">*</span></label>
                            <input autocomplete="off" type="number"
                                class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun"
                                value="{{ $akta->tahun ?? old('tahun') }}">
                            @error('tahun')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3 ">
                            <label for="nama_notaris" class="form-label"><strong>Nama Notaris</strong><span
                                    class="text-danger">*</span></label>
                            <input autocomplete="off" type="text"
                                class="form-control @error('nama_notaris') is-invalid @enderror" id="nama_notaris"
                                name="nama_notaris" value="{{ $akta->nama_notaris ?? old('nama_notaris') }}">
                            @error('nama_notaris')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="doc_akta" class="form-label"><strong>Dokumen PDF</strong><span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('doc_akta') is-invalid @enderror"
                                id="doc_akta" name="doc_akta">
                            <small>Maks. 50 MB {{ isset($akta) ? '(Kosongkan Jika Tidak ingin mengganti file)' : '' }}</small>
                            @error('doc_akta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <label for="keterangan" class="form-label"><strong>Keterangan Perubahan</strong><span
                                class="text-danger">*</span></label>
                        <textarea id="keterangan" autocomplete="off" type="text"
                            class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan">{{ $akta->keterangan ?? old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <a href="{{ isset($akta) ? route('admin.akta.detail', ['id' => $akta->id]) : route('admin.akta') }}" type="button" class="btn btn-dark">Kembali</a>
                        <button type="submit" class="btn text-white" style="background-color: #873FFD">{{ isset($akta) ? 'Edit' : 'Tambah' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@section('alert')
    <script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"
    src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
        $(document).ready(function() {
            $('#keterangan').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']]

                ],
            });
        });
    </script>
@endsection
