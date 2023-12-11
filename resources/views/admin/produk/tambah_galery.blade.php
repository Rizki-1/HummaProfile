@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <div class="card mb-4 p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lampiran</li>
      </ol>
    </nav>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 text-center ">
          <label for="" class="form-label label-dropzone">Uplode Galery Produk</label>
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

    <div class="row align-items-center p-4" id="gallery">
        @foreach ($produk->galery as $item)
            <div class="col-md-4 mb-4" data-filename="{{ $item->galery }}">
                <div class="card">
                    <div class="image-container">
                        <img src="{{ asset('storage/produk_galery/' . $item->galery) }}" class="image-content"
                            alt="Thumbnail {{ $item->id }}">
                    </div>
                    <div class="image-hover">
                        <div class="image-detail">
                            <div class="lampiran-hover">
                                <form class="delete-form hapus gallery" action="{{ route('galeryproduk.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-button"><i class="link-icon pg-trash"
                                            data-feather="trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
        parallelUploads: 1,
        uploadMultiple: true,
        init: function() {
        this.on("success", function(file, response) {
            file.fotoname = response.filename;
        });

        // this.on("removedfile", function(file) {
        //     var filename = file.fotoname;
        //     $.ajax({
        //         type: 'POST',
        //         url: '{{ route('galery-produk.deleteProduk') }}',
        //         headers: {
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //         data: {
        //             filename: filename
        //         },
        //         success: function(response) {
        //             console.log(response.success);
        //         },
        //         error: function(error) {
        //             console.error(error);
        //         }
        //     });
        // });
    }

      });

      if (document.querySelector('#gallery')) {
  document.querySelector('#gallery').addEventListener('click', function(event) {
    var target = event.target;

    // Periksa apakah yang diklik adalah tombol hapus
    if (target.classList.contains('remove-button')) {
      event.preventDefault();

      var form = target.closest('.delete-form');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Ingin menghapus gallery produk?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
        background: 'var(--bs-body-bg)',
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    }
  });
}

// Event listener untuk SweetAlert jika tidak ada elemen dengan kelas .delete-form
document.addEventListener('submit', function(event) {
  var target = event.target;

  if (target.classList.contains('delete-form')) {
    event.preventDefault();

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Ingin menghapus gallery produk?",
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Ya, Hapus!",
      cancelButtonText: "Batal",
      background: 'var(--bs-body-bg)',
    }).then((result) => {
      if (result.isConfirmed) {
        target.submit();
      }
    });
  }
});

      // Menggunakan event delegation untuk menangani klik pada elemen .delete-btn
      // $(document).on('click', '.delete-btn', function() {
      //     var form = $(this).closest('.delete-form');
      //     var id = form.data('id');

      //     $.ajax({
      //         type: 'DELETE',
      //         url: "{{ route('galeryproduk.delete', ['id' => ':id']) }}".replace(':id', id),
      //         headers: {
      //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
      //         },
      //         success: function(response) {
      //             form.prev('img').remove();
      //             form.remove();
      //         },
      //         error: function(error) {
      //             console.error(error);
      //         }
      //     });
      // });

      myDropzone.on("success", function(file, response) {
        var galleryContainer = document.querySelector('#gallery');

        response.paths.forEach(function(path) {
          var newDiv = document.createElement('div');
          newDiv.classList.add('col-md-4', 'mb-4');

          var newCard = document.createElement('div');
          newCard.classList.add('card');

          var newImageContainer = document.createElement('div');
          newImageContainer.classList.add('image-container');

          var newImage = document.createElement('img');
          newImage.src = '{{ asset('storage/') }}/' + path;
          newImage.alt = 'New Image';
          newImage.classList.add('image-content');

          var newImageHover = document.createElement('div');
          newImageHover.classList.add('image-hover');

          var newImageDetail = document.createElement('div');
          newImageDetail.classList.add('image-detail');

          var newDetailContainer = document.createElement('div');
          newDetailContainer.classList.add('lampiran-hover');

          var newForm = document.createElement('form');
          newForm.classList.add('delete-form', 'hapus','gallery');
          newForm.action = '{{ route('galeryproduk.delete', ':id') }}'.replace(':id', response.id);
          newForm.method = 'POST';

          var csrfInput = document.createElement('input');
          csrfInput.type = 'hidden';
          csrfInput.name = '_token';
          csrfInput.value = '{{ csrf_token() }}';
          newForm.appendChild(csrfInput);

          var methodInput = document.createElement('input');
          methodInput.type = 'hidden';
          methodInput.name = '_method';
          methodInput.value = 'DELETE';
          newForm.appendChild(methodInput);

          var newButton = document.createElement('button');
          newButton.type = 'submit';
          newButton.classList.add('remove-button');

          var newTrash = document.createElement('i');
          newTrash.classList.add('link-icon', 'pg-trash');
          newTrash.setAttribute('data-feather', 'trash');

          var newText = document.createTextNode('Hapus');
          newButton.appendChild(newTrash);
          newButton.appendChild(newText);
          newForm.appendChild(newButton);
          newDetailContainer.appendChild(newForm);
          newImageDetail.appendChild(newDetailContainer);
          newImageHover.appendChild(newImageDetail);
          newImageContainer.appendChild(newImage);
          newImageContainer.appendChild(newImageHover);
          newCard.appendChild(newImageContainer);
          newDiv.appendChild(newCard);

          galleryContainer.appendChild(newDiv);
        });

        feather.replace();
      });
      // Menggunakan event delegation untuk menangani klik pada elemen .delete-btn
      // $(document).on('click', '.delete-btn', function() {
      //     var form = $(this).closest('.delete-form');
      //     var id = form.data('id');

      //     $.ajax({
      //         type: 'DELETE',
      //         url: "{{ route('galeryproduk.delete', ['id' => ':id']) }}".replace(':id', id),
      //         headers: {
      //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
      //         },
      //         success: function(response) {
      //             form.prev('img').remove();
      //             form.remove();
      //         },
      //         error: function(error) {
      //             console.error(error);
      //         }
      //     });
      // });
    </script>
  @endsection
