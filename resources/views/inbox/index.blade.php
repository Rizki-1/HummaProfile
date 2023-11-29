<!-- resources/views/inboxes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>List Contact Me</h1>

    <ul>
        @foreach($inboxes as $inbox)
            <li>
                <strong>Name:</strong> {{ $inbox->name }}
                <br>
                <strong>Email:</strong> {{ $inbox->email }}
                <br>
                <strong>Message:</strong> {{ $inbox->message }}
                <br>
                <a href="{{ route('inbox.show', ['inbox' => $inbox->id]) }}">Reply</a>
            </li>
        @endforeach
    </ul>
@endsection
