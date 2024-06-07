<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Pegawai</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<livewire:layout.navigation />
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container mt-4">
        <h1 class="text text-center">Daftar Pegawai</h1>
        <section class="intro">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-md-12 text-end my-2">
                                    <a class="btn btn-success" href="{{ route('pegawais.create') }}"> Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                    <table class="table table-bordered table-hover table-dark mb-0">
                                        <thead>
                                            <tr class="text-uppercase text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Usia</th>
                                                <th scope="col">IPK</th>
                                                <th scope="col">Pengalaman Kerja</th>
                                                <th scope="col">Wawancara</th>
                                                <th scope="col">Psikotest</th>
                                                <th scope="col">Tes Tertulis</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="tablebody">
                                            @foreach ($pegawais as $pegawai)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pegawai->nama_lengkap }}</td>
                                                <td>{{ $pegawai->usia }}</td>
                                                <td>{{ $pegawai->ipk }}</td>
                                                <td>{{ $pegawai->pengalaman_kerja }} Tahun</td>
                                                <td>{{ $pegawai->nilai_wawancara }}</td>
                                                <td>{{ $pegawai->nilai_psikotest }}</td>
                                                <td>{{ $pegawai->nilai_tes_tertulis }}</td>
                                                <td>
                                                    <form action="{{ route('pegawais.destroy',$pegawai->id) }}" method="POST">
                                                        <a class="btn btn-warning text-light" href="{{ route('pegawais.show',$pegawai->id) }}">Detail</a>
                                                        <a class="btn btn-primary" href="{{ route('pegawais.edit',$pegawai->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" onclick="handleDelete(this.form)">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $pegawais->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
    <div class="col-md-12 text-center">
        <a class="btn btn-lg btn-info text-light my-5" href="{{ route('moora.index') }}">Hitung - Moora</a>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Yakin</button>
                </div>
            </div>
        </div>
    </div>    
</body>
<script>
    let deleteForm;
    
    function handleDelete(form) {
        deleteForm = form;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    document.getElementById('confirmDelete').addEventListener('click', function() {
        deleteForm.submit();
    });
</script>
</html>
