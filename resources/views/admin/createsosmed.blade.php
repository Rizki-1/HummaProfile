<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/formRepeater.js') }}"></script>
</head>
<body>
<form action="{{ route('sosmed.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="repeater">
        <div data-repeater-list="category-group" class="row g-3">
            @forelse (old('category-group', []) as $i => $category)
                <div data-repeater-item>
                    <div class="row">
                        <div class="d-flex flex-row">
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">Kategori Baru</label>
                                <input required type="text"
                                    class="form-control @error('category-group.' . $i . '.category_name') is-invalid @enderror"
                                    placeholder="category_name" name="nama_sosmmed"
                                    value="{{ $category['category_name'] }}" required>
                                @error('category-group.' . $i . '.category_name')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                @enderror

                            </div>
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">logo</label>
                                <input required type="file" class="form-control" placeholder="category_name"
                                    name="logo" value="" required>
                            </div>
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">link</label>
                                <input required type="text" class="form-control" placeholder="category_name"
                                    name="link" value="" required>
                            </div>
                            <div class="col-6 mb-4 ps-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input required id="button-hapus-detail"
                                            class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center"
                                            data-repeater-delete type="button" value="Hapus" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div data-repeater-item>
                    <div class="row">
                        <div class="d-flex flex-row">
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">nama sosmed</label>
                                <input required type="text" class="form-control" placeholder="category_name"
                                    name="nama_sosmed" value="" required>
                            </div>
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">logo</label>
                                <input required type="file" class="form-control" placeholder="category_name"
                                    name="logo" value="" required>
                            </div>
                            <div class="col-6 mb-4 pe-3">
                                <label for="unknown" class="form-label">link</label>
                                <input required type="text" class="form-control" placeholder="category_name"
                                    name="link" value="" required>
                            </div>
                            <div class="col-6 mb-4 ps-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input required id="button-hapus-detail"
                                            class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center"
                                            data-repeater-delete type="button" value="Hapus" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="hstack gap-2 justify-content-end">
            <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create type="button"
                value="+ Tambah" />
        </div>
    </div>
    <button type="submit" class="btn btn-success">tambah</button>
</form>
@foreach ($sosmeds as $sosmed)
<form action="{{ route('sosmed.delete',$sosmed->id) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger">hapus</button>
</form>
@endforeach
</body>
</html>
