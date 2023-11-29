<!-- resources/views/inboxes/reply.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Reply to Contact Me</h1>

    <form action="{{ route('inbox.reply', ['id' => $inbox->id]) }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{ $inbox->email }}" readonly>
        <br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" value="Re: Your Message">
        <br>
        <label for="message">Message:</label>
        <textarea name="message" rows="4" cols="50" placeholder="Your reply message..."></textarea>
        <br>
        <button type="submit">Submit Reply</button>
    </form>
@endsection
