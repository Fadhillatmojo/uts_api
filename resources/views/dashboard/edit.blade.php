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

    <title>Update Nilai Mahasiswa</title>
</head>

<body class="">
    <div class="d-flex flex-column align-items-center justify-content-center mt-5">
        <h1 class="text-center">Update Nilai Mahasiswa</h1>
    </div>
    <div class="d-flex flex-column align-items-center my-5">

        <form action="{{ route('nilai-mahasiswa.update', [$nilai_mahasiswa->nim, $nilai_mahasiswa->kode_mk]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nim" class="form-label">nim:</label>
                <br>
                <input type="text" class="form-control" id="nim" name="nim" readonly
                    value="{{ $nilai_mahasiswa->nim }}">
            </div>
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah:</label>
                <br>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" readonly
                    value="{{ $nilai_mahasiswa->kode_mk }}">
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai:</label>
                <br>
                <input type="text" class="form-control" id="nilai" name="nilai"
                    value="{{ $nilai_mahasiswa->nilai }}">
                @if ($errors->has('nilai'))
                    <span class="text-danger">{{ $errors->first('nilai') }}</span>
                @endif
            </div>

            <div class="d-flex flex-column w-100 justify-content-evenly mt-4 align-items-center">
                <button type="submit" class="btn btn-success">Update Nilai</button>
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
