<!-- resources/views/inboxes/reply.blade.php -->

@extends('layouts.nav-admin')

@section('content')
    <div class="page-content">

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 border-end-lg">
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                        data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                        <span class="icon"><i data-feather="chevron-down"></i></span>
                                    </button>
                                    <div class="order-first">
                                        <h4>Mail Service</h4>
                                        <p class="text-muted">{{ config('app.email') }}</p>
                                    </div>
                                </div>
                                <div class="email-aside-nav collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item {{ !request('hasRead') ? 'active' : '' }}">
                                            <a class="nav-link d-flex align-items-center" href="{{ route('inbox.index') }}">
                                                <i data-feather="inbox" class="icon-lg me-2"></i>
                                                Inbox
                                                @if ($total > 0)
                                                    <span class="badge bg-danger fw-bolder ms-auto">{{ $total }}
                                                @endif
                                            </a>
                                        </li>
                                        <li class="nav-item {{ request('hasRead') ? 'active' : '' }}">
                                            <a class="nav-link d-flex align-items-center" href="{{ route('inbox.index') }}?hasRead=true">
                                                <i data-feather="mail" class="icon-lg me-2"></i>
                                                Sudah dibalas
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="text-body">{{ $inbox->name }}</a>
                                            <span class="mx-2 text-muted">to</span>
                                            <a href="#" class="text-body me-2">Me</a>
                                        </div>
                                    </div>
                                    <div class="tx-13 text-muted mt-2 mt-sm-0">{{ $inbox->created_at->format('M d, H:i') }}</div>
                                </div>
                                <div class="p-4 border-bottom">
                                    {{ $inbox->message }}
                                </div>
                                <button type="button" class="btn btn-primary" onclick="window.location.href = '{{ route('inbox.reply.show', $inbox->id) }}'"><i class="mdi mdi-reply"></i> Reply</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
