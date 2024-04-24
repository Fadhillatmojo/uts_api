<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Data Nilai Mahasiswa</title>
</head>

<body class="">
    <div class="d-flex flex-column align-items-center my-5">

        <form action="{{ route('nilai-mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">NIM: </label>
                <br>
                <select class="form-control" name="nim" id="nim" required>
                    @foreach ($list_mahasiswa as $mhs)
                        <option value="{{ $mhs->nim }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option>
                    @endforeach
                </select>
                @if ($errors->has('nim'))
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Mata Kuliah: </label>
                <br>
                <select class="form-control" name="kode_mk" id="kode_mk" required>
                    @foreach ($list_mk as $matkul)
                        <option value="{{ $matkul->kode_mk }}">{{ $matkul->kode_mk }} - {{ $matkul->nama_mk }}</option>
                    @endforeach
                </select>
                @if ($errors->has('kode_mk'))
                    <span class="text-danger">{{ $errors->first('kode_mk') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai:</label>
                <br>
                <input type="text" class="form-control" id="nilai" name="nilai">
                @if ($errors->has('nilai'))
                    <span class="text-danger">{{ $errors->first('nilai') }}</span>
                @endif
            </div>

            <div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
                <button type="submit" class="btn btn-success">Tambah Nilai</button>
                <a href="/" class="text-center my-3 text-danger">
                    Cancel
                </a>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
