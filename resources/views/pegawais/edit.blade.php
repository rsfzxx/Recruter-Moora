<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pegawai</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="text text-center">Edit Pegawai</h1>
        <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row bg-light p-4 mt-5" style="border: 1px solid rgb(236, 225, 225);">
                <div class="col-md-6 mb-3">
                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label"><strong>NIK:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="nik" value="{{ $pegawai->nik }}" class="form-control" placeholder="Nomor Induk Kependudukan (KTP)">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="ipk" class="col-sm-4 col-form-label"><strong>IPK:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="ipk" value="{{ $pegawai->ipk }}" class="form-control" placeholder="Contoh : 3.60 (Gunakan Titik)">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label"><strong>Nama Lengkap:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_lengkap" value="{{ $pegawai->nama_lengkap }}" class="form-control" placeholder="Nama Lengkap">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="pengalaman_kerja" class="col-sm-4 col-form-label"><strong>Pengalaman Kerja:</strong></label>
                        <div class="col-sm-8">
                            <select name="pengalaman_kerja" class="form-control">
                                <option value="-1" {{ $pegawai->pengalaman_kerja == '-1' ? 'selected' : '' }}>1 Tahun atau Kurang</option>
                                <option value="2" {{ $pegawai->pengalaman_kerja == '2' ? 'selected' : '' }}>2 Tahun</option>
                                <option value="3" {{ $pegawai->pengalaman_kerja == '3' ? 'selected' : '' }}>3 Tahun</option>
                                <option value="4" {{ $pegawai->pengalaman_kerja == '4' ? 'selected' : '' }}>4 Tahun</option>
                                <option value="5" {{ $pegawai->pengalaman_kerja == '5' ? 'selected' : '' }}>5 Tahun</option>
                                <option value="5+" {{ $pegawai->pengalaman_kerja == '5+' ? 'selected' : '' }}>Diatas 5 Tahun</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label"><strong>Tanggal Lahir:</strong></label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" class="form-control" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_psikotest" class="col-sm-4 col-form-label"><strong>Nilai Psikotest:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai_psikotest" value="{{ $pegawai->nilai_psikotest }}" class="form-control" placeholder="Nilai Psikotest">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label"><strong>Jenis Kelamin:</strong></label>
                        <div class="col-sm-8">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki Laki" {{ $pegawai->jenis_kelamin == 'Laki Laki' ? 'selected' : '' }}>Laki Laki</option>
                                <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_tes_tertulis" class="col-sm-4 col-form-label"><strong>Nilai Tes Tertulis:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai_tes_tertulis" value="{{ $pegawai->nilai_tes_tertulis }}" class="form-control" placeholder="Nilai Tes Tertulis">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="status_perkawinan" class="col-sm-4 col-form-label"><strong>Status Perkawinan:</strong></label>
                        <div class="col-sm-8">
                            <select name="status_perkawinan" class="form-control">
                                <option value="Sudah Menikah" {{ $pegawai->status_perkawinan == 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                                <option value="Belum Menikah" {{ $pegawai->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="nilai_wawancara" class="col-sm-4 col-form-label"><strong>Nilai Wawancara:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai_wawancara" value="{{ $pegawai->nilai_wawancara }}" class="form-control" placeholder="Nilai Wawancara">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group row">
                        <label for="usia" class="col-sm-4 col-form-label"><strong>Usia:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="usia" value="{{ $pegawai->usia }}" class="form-control" placeholder="Contoh : 20">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('pegawais.index') }}">Batal</a>
                </div>
            </div>
        </form>     
    </div>
</body>
</html>
