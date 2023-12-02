@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('berita.create') }}" class="btn btn-outline-primary">Tambah Berita</a>
    </div>
  </div>
  <div class="card p-4">
    <div class="row">
      @forelse ($berita as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $row->thumbnail) }}" class="image-content" alt="Thumbnail {{ $row->name }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title">{{ $row->title }}</h2>
                  </div>
                  <div class="second-title">
                    <p class="card-text">{{ $row->description }}</p>
                  </div>
                  <div>
                    <p class="third-detail">
                      @foreach ($row->kategori as $kategori)
                        {{ $kategori->name }}
                      @endforeach
                    </p>
                  </div>
                </div>
                <div class="action-container">
                  <a href="{{ route('berita.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                  <form nameberita="{{ $row->title }}" action="{{ route('berita.destroy', $row->id) }}" method="POST" class="berita">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-delete"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p class="fw-bold text-center">Tidak ada berita. <a href="{{ route('berita.create') }}">Tambah!</a></p>
      @endforelse
      <div>
        {{ $berita->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
<script>
  if(document.querySelectorAll('.berita').length > 0){
    document.querySelectorAll('.berita').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var nameberita = form.getAttribute('nameberita');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Ingin menghapus berita '" + nameberita + "'?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya, Hapus!",
          cancelButtonText: "Batal",
          background: 'var(--bs-body-bg)',
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  }
</script>
@endsection
