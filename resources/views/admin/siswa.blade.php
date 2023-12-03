<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
<form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama">
    <input type="text" name="asal_sekolah">
    <input type="text" name="jurusan">
    <input type="text" name="kelas">
    <input type="text" name="alamat">
    <input type="text" name="email">
    <input type="file" name="document">
    <button type="submit">daftar</button>
</form>
</body>
</html>
