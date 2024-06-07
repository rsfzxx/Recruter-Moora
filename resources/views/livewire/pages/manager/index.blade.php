<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Moora</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .intro-text {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            max-width: 800px;
            color: #343a40;
            font-family: Arial, sans-serif;
            text-align: justify;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header class="text-center my-5">
        <h2 class="display-4">Recruter Moora</h2>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="intro-text">
                    <h4>
                        MOORA (Multi-Objective Optimization on the basis of Ratio Analysis) adalah sebuah metode pengambilan keputusan yang digunakan untuk mengevaluasi beberapa alternatif berdasarkan berbagai kriteria yang relevan. Metode ini sangat berguna dalam proses recruitment pegawai karena memungkinkan pengambilan keputusan yang objektif dan sistematis.
                    </h4>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-lg btn-primary my-5" href="{{ route('pegawais.index') }}">Input Pegawai</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Langkah 1</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Identifikasi Kriteria</h5>
                                <p class="card-text" style="text-align: justify;">Tentukan kriteria yang relevan untuk mengevaluasi kandidat, Sesuaikan dengan variable yang di butuhkan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Langkah 2</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Normalisasi Keputusan</h5>
                                <p class="card-text" style="text-align: justify;">Normalisasi nilai dari setiap kriteria untuk menghilangkan skala yang berbeda dan membuatnya sebanding.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Langkah 3</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Hitung Rasio</h5>
                                <p class="card-text" style="text-align: justify;">Hitung rasio dengan membagi setiap nilai normalisasi dengan jumlah total nilai untuk kriteria yang bersangkutan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Langkah 4</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Peringkat Alternatif</h5>
                                <p class="card-text" style="text-align: justify;">Terakhir, Urutkan kandidat berdasarkan skor agregat dari perhitungan untuk menentukan nilai peringkat mereka dengan akurat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
