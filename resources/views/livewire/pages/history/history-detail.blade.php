<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail History</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <livewire:layout.navigation />
    <div class="container mt-4">
        <h1 class="text text-center my-5">Detail History - {{ $history->judul }}</h1>
        <section class="intro">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <div class="card-body p-0">
                                @php
                                    $data = json_decode($history->data, true);
                                @endphp
                                @if (json_last_error() === JSON_ERROR_NONE)
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                        <table class="table table-bordered table-hover table-dark mb-0">
                                            <thead>
                                                <tr class="text-uppercase text-center">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nik</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Pengalaman</th>
                                                    <th scope="col">IPK</th>
                                                    <th scope="col">Usia</th>
                                                    <th scope="col">Psikotest</th>
                                                    <th scope="col">Tes Tertulis</th>
                                                    <th scope="col">Wawancara</th>
                                                    <th scope="col">Hasil Akhir</th>
                                                    <th scope="col">Tgl Lahir</th>
                                                    <th scope="col">JK</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody style="tablebody">
                                                @foreach ($data['hasilNormalisasi'] as $entry)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $entry['pegawai']['nik'] }}</td>
                                                    <td>{{ $entry['pegawai']['nama_lengkap'] }}</td>
                                                    <td>{{ $entry['pegawai']['pengalaman_kerja'] }} Tahun</td>
                                                    <td>{{ $entry['pegawai']['ipk'] }}</td>
                                                    <td>{{ $entry['pegawai']['usia'] }} Tahun</td>
                                                    <td>{{ $entry['pegawai']['nilai_psikotest'] }}</td>
                                                    <td>{{ $entry['pegawai']['nilai_tes_tertulis'] }}</td>
                                                    <td>{{ $entry['pegawai']['nilai_wawancara'] }}</td>
                                                    <td>{{ $entry['hasil_akhir'] }}</td>
                                                    <td>{{ $entry['pegawai']['tanggal_lahir'] }}</td>
                                                    <td>{{ $entry['pegawai']['jenis_kelamin'] }}</td>
                                                    <td>{{ $entry['pegawai']['status_perkawinan'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>Data Json Error.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
</body>
</html>
