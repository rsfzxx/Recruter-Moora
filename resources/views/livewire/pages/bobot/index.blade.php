<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bobot</title>

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
        <h1 class="text text-center">Data Bobot</h1>
        <section class="intro mt-4">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                                    <table class="table table-bordered table-hover table-dark mb-0">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th scope="col">No</th>
                                                <th scope="col">Kriteria</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Bobot</th>
                                                <th scope="col">Tipe</th>
                                            </tr>
                                        </thead>
                                        <tbody style="tablebody">
                                            @foreach ($bobots as $bobot)
                                            <tr>
                                                <td>{{ $bobot->id }}</td>
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
                </div>
            </div>
        </section>  
    </div>
</body>
</html>
