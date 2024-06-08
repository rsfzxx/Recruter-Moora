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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text text-center mb-5">Hasil Akhir - Perhitungan Moora</h1>
        <div class="d-flex justify-content-center align-items-center mb-5">
            <div class="card text-dark bg-info mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">TOTAL KANDIDAT</div>
                <div class="card-body">
                    <h1 class="card-title">"{{ $totalPegawai }}"</h1>
                    <p class="card-text">Orang</p>
                </div>
            </div>
        </div>
        <section class="intro">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-center mb-4"> Tabel Data Alternatif </h2>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                            <table class="table table-bordered table-hover table-success mb-0">
                                                <thead>
                                                    <tr class="text-uppercase">
                                                        <th scope="col">A1</th>
                                                        <th scope="col">A2</th>
                                                        <th scope="col">A3</th>
                                                        <th scope="col">A4</th>
                                                        <th scope="col">A5</th>
                                                        <th scope="col">A6</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="tablebody">
                                                    @foreach ($pegawais as $pegawai)
                                                        <tr>
                                                            <td>{{ $pegawai->usia }}</td>
                                                            <td>{{ $pegawai->ipk }}</td>
                                                            <td>{{ $pegawai->pengalaman_kerja }}</td>
                                                            <td>{{ $pegawai->nilai_wawancara }}</td>
                                                            <td>{{ $pegawai->nilai_psikotest }}</td>
                                                            <td>{{ $pegawai->nilai_tes_tertulis }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="text-center mb-4"> Tabel Data Kriteria </h2>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                            <table class="table table-bordered table-hover table-success mb-0">
                                                <thead>
                                                    <tr class="text-uppercase">
                                                        <th scope="col">Kriteria</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Bobot</th>
                                                        <th scope="col">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="tablebody">
                                                    @foreach ($bobots as $bobot)
                                                    <tr>
                                                        <td>{{ $bobot->kriteria }}</td>
                                                        <td>{{ $bobot->keterangan }}</td>
                                                        <td>{{ $bobot->bobot }}</td>
                                                        <td>{{ $bobot->type }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="text text-center my-5">Rentang Data - Perhitungan Moora</h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="text-center mt-3">Total Data - IPK</h2>
                                    <canvas id="ipkChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata : {{ number_format($rataRataIpk, 2) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>IPK Tertinggi : {{ $nilaiTertinggiIpk }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>IPK Terendah : {{ $nilaiTerendahIpk }}</p></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="text-center mt-3">Total Data - Usia</h2>
                                    <canvas id="usiaChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata : {{ number_format($rataRataUsia, 1) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Usia Tertua : {{ $nilaiTertinggiUsia }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Usia Termuda : {{ $nilaiTerendahUsia }}</p></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="text-center mt-5">Total Data - Pengalaman Kerja</h2>
                                    <canvas id="pengalamanChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata: {{ number_format($rataRataPengalaman, 2) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Pengalaman Tertinggi: {{ $nilaiTertinggiPengalaman }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Pengalaman Terendah: {{ $nilaiTerendahPengalaman }}</p></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="text-center mt-5">Total Data - Wawancara</h2>
                                    <canvas id="wawancaraChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata: {{ number_format($rataRataWawancara, 2) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Tertinggi: {{ $nilaiTertinggiWawancara }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Terendah: {{ $nilaiTerendahWawancara }}</p></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="text-center mt-5">Total Data - Psikotest</h2>
                                    <canvas id="psikotestChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata: {{ number_format($rataRataPsikotest, 2) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Tertinggi: {{ $nilaiTertinggiPsikotest }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Terendah: {{ $nilaiTerendahPsikotest }}</p></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 class="text-center mt-5">Total Data - Tes Tertulis</h2>
                                    <canvas id="testChart"></canvas>
                                    <div class="row text-center mt-4">
                                        <div class="col-md-4">
                                            <b><p>Rata-rata: {{ number_format($rataRataTest, 2) }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Tertinggi: {{ $nilaiTertinggiTest }}</p></b>
                                        </div>
                                        <div class="col-md-4">
                                            <b><p>Nilai Terendah: {{ $nilaiTerendahTest }}</p></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="text text-center my-5">Hasil Data Normalisasi</h1>
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hasilNormalisasi as $hasil)
                                        <tr>
                                            <td>{{ $hasil['pegawai']->nama_lengkap }}</td>
                                            <td>{{ $hasil['normalisasi_ipk'] }}</td>
                                            <td>{{ $hasil['normalisasi_usia'] }}</td>
                                            <td>{{ $hasil['pengalaman_kerja_normal'] }}</td>
                                            <td>{{ $hasil['normalisasi_wawancara'] }}</td>
                                            <td>{{ $hasil['normalisasi_psikotest'] }}</td>
                                            <td>{{ $hasil['normalisasi_test_tertulis'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h1 class="text text-center my-5">Data Akhir Penilaian</h1>
                            <table class="table table-dark table-striped-columns">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>IPK (C1)</th>
                                        <th>Usia (C2)</th>
                                        <th>Pengalaman (C3)</th>
                                        <th>Wawancara (C4)</th>
                                        <th>Psikotest (C5)</th>
                                        <th>Test Tertulis (C6)</th>
                                        <th>Hasil Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hasilNormalisasi as $hasil)
                                        <tr>
                                            <td>{{ $hasil['pegawai']->nama_lengkap }}</td>
                                            <td>{{ $hasil['hasil_ipk'] }}</td>
                                            <td>{{ $hasil['hasil_usia'] }}</td>
                                            <td>{{ $hasil['hasil_pengalaman'] }}</td>
                                            <td>{{ $hasil['hasil_wawancara'] }}</td>
                                            <td>{{ $hasil['hasil_psikotest'] }}</td>
                                            <td>{{ $hasil['hasil_test'] }}</td>
                                            <td>{{ $hasil['hasil_akhir'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h1 class="text text-center my-5">Kandidat Terbaik</h1>
                            <div class="col-md-12">
                                <canvas id="top3Chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 my-5">
                <form action="{{ route('moora.save') }}" method="POST" class="d-flex align-items-end">
                    @csrf
                    <div class="mb-3 me-3 flex-grow-1">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <button type="submit" class="btn btn-success text-light mb-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Grafik IPK
            var ipkCtx = document.getElementById('ipkChart').getContext('2d');
            var ipkValues = @json($ipkValues);

            new Chart(ipkCtx, {
                type: 'bar',
                data: {
                    labels: ipkValues.map((value, index) => `IPK`),
                    datasets: [{
                        label: 'IPK Kandidat',
                        data: ipkValues,
                        backgroundColor: 'rgba(238, 81, 81, 0.2)',
                        borderColor: 'rgba(238, 81, 81, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var usiaCtx = document.getElementById('usiaChart').getContext('2d');
            var usiaValues = @json($usiaValues);

            new Chart(usiaCtx, {
                type: 'bar',
                data: {
                    labels: usiaValues.map((value, index) => `Usia`),
                    datasets: [{
                        label: 'Usia Kandidat',
                        data: usiaValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //pengalaman
            var pengalamanCtx = document.getElementById('pengalamanChart').getContext('2d');
            var pengalamanValues = @json($pengalamanValues);

            new Chart(pengalamanCtx, {
                type: 'bar',
                data: {
                    labels: pengalamanValues.map((value, index) => `Pengalaman`),
                    datasets: [{
                        label: 'Pengalaman Kandidat',
                        data: pengalamanValues,
                        backgroundColor: 'rgba(238, 223, 81, 0.2)',
                        borderColor: 'rgba(238, 223, 81, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //wawancara
            var wawancaraCtx = document.getElementById('wawancaraChart').getContext('2d');
            var wawancaraValues = @json($wawancaraValues);

            new Chart(wawancaraCtx, {
                type: 'bar',
                data: {
                    labels: wawancaraValues.map((value, index) => `Wawancara`),
                    datasets: [{
                        label: 'Wawancara Kandidat',
                        data: wawancaraValues,
                        backgroundColor: 'rgba(58, 247, 55, 0.2)',
                        borderColor: 'rgba(58, 247, 55, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //psikotest
            var psikotestCtx = document.getElementById('psikotestChart').getContext('2d');
            var psikotestValues = @json($psikotestValues);

            new Chart(psikotestCtx, {
                type: 'bar',
                data: {
                    labels: psikotestValues.map((value, index) => `Psikotest`),
                    datasets: [{
                        label: 'Psikotest Kandidat',
                        data: psikotestValues,
                        backgroundColor: 'rgba(179, 45, 201, 0.2)',
                        borderColor: 'rgba(179, 45, 201, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //test tertulis
            var testCtx = document.getElementById('testChart').getContext('2d');
            var testValues = @json($testValues);

            new Chart(testCtx, {
                type: 'bar',
                data: {
                    labels: testValues.map((value, index) => `Tes Tertulis`),
                    datasets: [{
                        label: 'Tes Tertulis Kandidat',
                        data: testValues,
                        backgroundColor: 'rgba(26, 248, 232, 0.2)',
                        borderColor: 'rgba(26, 248, 232, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Grafik Top 3 Hasil Akhir
            var top3Ctx = document.getElementById('top3Chart').getContext('2d');
            var top3 = @json($top3);

            new Chart(top3Ctx, {
                type: 'bar',
                data: {
                    labels: top3.map((result, index) => result.pegawai.nama_lengkap),
                    datasets: [{
                        label: 'Kandidat Terbaik',
                        data: top3.map(result => result.hasil_akhir),
                        backgroundColor: 'rgba(15, 17, 15, 0.2)',
                        borderColor: 'rgba(15, 17, 15, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
