<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Pet</title>
</head>

<body>
    @include('partials.Navbar')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <br><br><br><br>
    <div class="container text-center mt-lg-5">
        <div class="row g-2 pb-3">
            <div class="col">
                <h1 class="judul">Find A Pet</h1>
            </div>
        </div>
        <div class="row justify-content-evenly pb-5">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('pet') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control border-end-0 rounded-pill search bg-body-tertiary search-text" list="datalistOptions" name="search" id="exampleDataList" placeholder="Search for anything">
                        <span class="input-group-append">
                            <button class="search border rounded-pill px-5 py-2" type="button">
                                <img class="translate-middle-x" style="width: 36px; height: 36px;" src="image/search.svg" alt="">
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-evenly gap-5">
            @foreach ($hewans as $hewan)
            @include('partials.Navbar')
            <div class="col-5 container-1">
                <div class="row text-start">
                    <div class="col-5 p-4">
                        <img src="image/dog.png" alt="" style="width: 200px; height: 200px;">
                    </div>
                    <div class="col-6 pt-4">
                        <div class="subjudul mb-3">{{ $hewan->name }}</div>
                        <div class="mb-3"><span class="p-2 rectangle label">{{ $hewan->adoptStatus }}</span></div>
                        <div class="mb-2 p-text">Ras : {{ $hewan->race }}</div>
                        <div class="p-text">Gender : {{ $hewan->gender }}</div>
                    </div>
                </div>
                <div class="text-end pb-4">
                    <a href="{{ route('DetailProfilHewan', ['id' => $hewan->id]) }}">
                        <button class="p-button p-2 btn-action">Lihat</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>