@extends('layouts.app')

@section('content')
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
@endsection
