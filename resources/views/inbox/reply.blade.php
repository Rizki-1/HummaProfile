    <!-- resources/views/inboxes/reply.blade.php -->

    @extends('layouts.nav-admin')

    @section('content')
        <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
        <div class="page-content">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <div class="row inbox-wrapper">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('inbox.reply.post', $inbox->id) }}" method="post">
                                @csrf
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
                                                        <span class="badge bg-danger fw-bolder ms-auto">{{ $total }}
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
                                        <div>
                                            <div class="d-flex align-items-center p-3 border-bottom tx-16">
                                                <span data-feather="edit" class="icon-md me-2"></span>
                                                Reply: {{ $inbox->name }}
                                            </div>
                                        </div>
                                        <div class="p-3 pb-0">
                                            <div class="to">
                                                <div class="row mb-3">
                                                    <label class="col-md-2 col-form-label">To:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="email" class="form-control"
                                                            value="{{ $inbox->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="subject">
                                                <div class="row mb-3">
                                                    <label class="col-md-2 col-form-label">Subject</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="text" name="subject">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label visually-hidden"
                                                        for="easyMdeEditor">Descriptions </label>
                                                    <textarea class="form-control" name="message" id="easyMdeEditor" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary me-1 mb-1" type="submit"> Send</button>
                                                    <button class="btn btn-secondary me-1 mb-1" type="reset">
                                                        Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
        <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
    @endsection
