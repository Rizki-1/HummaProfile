<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">

            @foreach ($berita as $row)
                <!-- News Card -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $row->thumbnail) }}" class="card-img-top"
                            alt="Thumbnail {{ $row->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->title }}</h5>
                            <p class="card-text">{{ $row->description }}</p>
                            @foreach ($row->kategori as $kategori)
                                <p>{{ $kategori->name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @if (session('message'))
        <script>
            Swal.fire({
                title: "{{ session('message')['title'] ?? 'Tidak di isi' }}",
                text: "{{ session('message')['text'] ?? 'Tesk tidak di isi' }}",
                icon: "{{ session('message')['icon'] ?? 'question' }}"
            });
        </script>
    @endif
</body>

</html>
