<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Karyawan</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text text-center">Detail Pegawai</h1>
        <form action="{{ route('pegawais.store') }}" method="POST">
            @csrf
            <div class="row bg-light p-4 mt-5" style="border: 1px solid rgb(236, 225, 225);">
                <div class="col-md-6 mb-3">
                    <div class="form-group row">
                        <label for="nik" class="col-sm-4"><strong>NIK</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->nik}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="ipk" class="col-sm-4"><strong>IPK</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{ $pegawai->ipk }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-4"><strong>Nama Lengkap</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{ $pegawai->nama_lengkap }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="pengalaman_kerja" class="col-sm-4"><strong>Pengalaman Kerja</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->pengalaman_kerja}} Tahun</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4"><strong>Tanggal Lahir</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->tanggal_lahir}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_psikotest" class="col-sm-4"><strong>Nilai Psikotest</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->nilai_psikotest}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4"><strong>Jenis Kelamin</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->jenis_kelamin}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_tes_tertulis" class="col-sm-4"><strong>Nilai Tes Tertulis</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->nilai_tes_tertulis}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="status_perkawinan" class="col-sm-4"><strong>Status Perkawinan</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->status_perkawinan}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_wawancara" class="col-sm-4"><strong>Nilai Wawancara</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->nilai_wawancara}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="usia" class="col-sm-4"><strong>Usia</strong></label>
                        <div class="col-sm-8">
                            <strong>: {{$pegawai->usia}} Tahun</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 text-end">
                    <a class="btn btn-info text-light" href="{{ route('pegawais.index') }}">Kembali</a>
                </div>
            </div>
        </form>     
    </div>
</body>
</html>
