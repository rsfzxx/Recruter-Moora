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
        <h1 class="text text-center">Hasil Akhir Perhitungan Moora</h1>
        <section class="intro">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3>Total Pegawai: {{ $totalPegawai }}</h3>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-center"> Tabel Data Alternatif </h2>
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
                                        <h2 class="text-center"> Tabel Data Kriteria </h2>
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
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai IPK</h2>
                                <p>Rata-rata: {{ number_format($rataRataIpk, 2) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiIpk }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahIpk }}</p>
                                <canvas id="ipkChart"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai Usia</h2>
                                <p>Rata-rata: {{ number_format($rataRataUsia, 1) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiUsia }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahUsia }}</p>
                                <canvas id="usiaChart"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai Pengalaman Kerja</h2>
                                <p>Rata-rata: {{ number_format($rataRataPengalaman, 2) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiPengalaman }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahPengalaman }}</p>
                                <canvas id="pengalamanChart"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai Wawancara</h2>
                                <p>Rata-rata: {{ number_format($rataRataWawancara, 2) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiWawancara }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahWawancara }}</p>
                                <canvas id="wawancaraChart"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai Psikotest</h2>
                                <p>Rata-rata: {{ number_format($rataRataPsikotest, 2) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiPsikotest }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahPsikotest }}</p>
                                <canvas id="psikotestChart"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Grafik Rentang Nilai Tes Tertulis</h2>
                                <p>Rata-rata: {{ number_format($rataRataTest, 2) }}</p>
                                <p>Nilai Tertinggi: {{ $nilaiTertinggiTest }}</p>
                                <p>Nilai Terendah: {{ $nilaiTerendahTest }}</p>
                                <canvas id="testChart"></canvas>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama Pegawai</th>
                                        <th>Pengalaman Kerja (Normalisasi)</th>
                                        <th>IPK (Normalisasi)</th>
                                        <th>Usia (Normalisasi)</th>
                                        <th>Nilai Wawancara (Normalisasi)</th>
                                        <th>Nilai Psikotest (Normalisasi)</th>
                                        <th>Nilai Tes Tertulis (Normalisasi)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hasilNormalisasi as $hasil)
                                        <tr>
                                            <td>{{ $hasil['pegawai']->nama_lengkap }}</td>
                                            <td>{{ $hasil['pengalaman_kerja_normal'] }}</td>
                                            <td>{{ $hasil['normalisasi_ipk'] }}</td>
                                            <td>{{ $hasil['normalisasi_usia'] }}</td>
                                            <td>{{ $hasil['normalisasi_wawancara'] }}</td>
                                            <td>{{ $hasil['normalisasi_psikotest'] }}</td>
                                            <td>{{ $hasil['normalisasi_test_tertulis'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table>
                                <h2> Hasil Data Pembobotan </h2>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Pengalaman Kerja</th>
                                        <th>IPK </th>
                                        <th>Usia </th>
                                        <th>Nilai Wawancara </th>
                                        <th>Nilai Psikotest </th>
                                        <th>Nilai Tes Tertulis </th>
                                        <th>Hasil Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hasilNormalisasi as $hasil)
                                        <tr>
                                            <td>{{ $hasil['pegawai']->nama_lengkap }}</td>
                                            <td>{{ $hasil['hasil_pengalaman'] }}</td>
                                            <td>{{ $hasil['hasil_ipk'] }}</td>
                                            <td>{{ $hasil['hasil_usia'] }}</td>
                                            <td>{{ $hasil['hasil_wawancara'] }}</td>
                                            <td>{{ $hasil['hasil_psikotest'] }}</td>
                                            <td>{{ $hasil['hasil_test'] }}</td>
                                            <td>{{ $hasil['hasil_akhir'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-6">
                                <h2 class="text-center">Top 3 Hasil Akhir</h2>
                                <canvas id="top3Chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Grafik IPK
            var ipkCtx = document.getElementById('ipkChart').getContext('2d');
            var ipkValues = @json($ipkValues);

            new Chart(ipkCtx, {
                type: 'bar',
                data: {
                    labels: ipkValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'IPK Pegawai',
                        data: ipkValues,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
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
                    labels: usiaValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'Usia Pegawai',
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
                    labels: pengalamanValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'Pengalaman Pegawai',
                        data: pengalamanValues,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
                    labels: wawancaraValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'wawancara Pegawai',
                        data: wawancaraValues,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
                    labels: psikotestValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'psikotest Pegawai',
                        data: psikotestValues,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
                    labels: testValues.map((value, index) => `Pegawai ${index + 1}`),
                    datasets: [{
                        label: 'test Pegawai',
                        data: testValues,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
                        label: 'Hasil Akhir',
                        data: top3.map(result => result.hasil_akhir),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
