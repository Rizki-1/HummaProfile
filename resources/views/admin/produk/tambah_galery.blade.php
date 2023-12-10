@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row mb-12">
        <div class="col-md-12 mb-5 text-center ">
          <label for="" class="form-label">Uplode Galery Produk</label>
          <div class="dropzone" id="dropzone" data-id="{{ $id }}">
            @error('file')
              <div>
                <p class="text-danger mt-2">{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body text-center" id="gallery">
        @foreach ($produk->galery as $item)
          <img src="{{ asset('storage/produk_galery/' . $item->galery) }}" alt="" srcset=""
            style="width: 100px">
          <form class="delete-form" data-id="{{ $item->id }}">
            <button type="button" class="btn btn-danger delete-btn">hapus</button>
          </form>
        @endforeach
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      const id = document.querySelector('#dropzone').getAttribute('data-id');

      var myDropzone = new Dropzone("#dropzone", {
        url: "{{ route('galeryproduk.store', ['id' => ':id']) }}".replace(':id', id),
        headers: {
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        },
        paramName: "file",
        addRemoveLinks: true,
        maxFiles: 10,
        dictDefaultMessage: "Seret dan lepaskan file atau klik untuk memilih file",
        dictRemoveFile: "Hapus file",
        acceptedFiles: "image/*",
        uploadMultiple: true,
      });

    // Menggunakan event delegation untuk menangani klik pada elemen .delete-btn
$(document).on('click', '.delete-btn', function() {
    var form = $(this).closest('.delete-form');
    var id = form.data('id');

    $.ajax({
        type: 'DELETE',
        url: "{{ route('galeryproduk.delete', ['id' => ':id']) }}".replace(':id', id),
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        },
        success: function(response) {
            form.prev('img').remove();
            form.remove();
        },
        error: function(error) {
            console.error(error);
        }
    });
});

myDropzone.on("success", function(file, response) {
    var galleryContainer = document.querySelector('#gallery');
    console.log(response);

    response.paths.forEach(function(path) {
        // Membuat elemen gambar baru
        var newImage = document.createElement('img');
        newImage.src = '{{ asset("storage/") }}/' + path;
        newImage.alt = "New Image";
        newImage.style.width = "100px";

        // Membuat elemen formulir baru
        var newForm = document.createElement('form');
        newForm.classList.add('delete-form');
        newForm.setAttribute('data-id', response.id);
        newForm.innerHTML = `
        <button type="button" class="btn btn-danger delete-btn">hapus</button>
        `;

        galleryContainer.appendChild(newImage);
        galleryContainer.appendChild(newForm);
    });
});


    </script>
  @endsection
