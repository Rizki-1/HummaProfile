<!-- resources/views/inboxes/index.blade.php -->

@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Inbox</title>
  <div class="row inbox-wrapper">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 border-end-lg">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                  <span class="icon"><i data-feather="chevron-down"></i></span>
                </button>
                <div class="order-first">
                  <h4>Mail Service</h4>
                  <p class="text-muted">{{ config('app.email') }}</p>
                </div>
              </div>
              <div class="email-aside-nav collapse">
                <ul class="nav flex-column">
                  <li class="nav-item mb-1 {{ !request('hasRead') ? 'active' : '' }}">
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
              <div class="p-3 border-bottom">
                <div class="row align-items-center">
                  @if (!request('hasRead'))
                    <div class="col-lg-6">
                      <div class="d-flex align-items-end mb-2 mb-md-0">
                        <i data-feather="inbox" class="text-muted me-2"></i>
                        <h4 class="me-1">Inbox</h4>
                        <span class="text-muted">({{ $total > 0 ? $total . ' new messages' : $total . ' message' }})</span>
                      </div>
                    </div>
                  @endif
                  <div class="col-lg-6">
                    <form method="GET"
                      onsubmit="event.preventDefault();var currentUrl = window.location.href;if (currentUrl.includes('hasRead=')) {window.location.href = currentUrl + '&query=' + document.getElementsByName('query')[0].value;}else{this.submit();}">
                      <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search mail..." name="query" value="{{ request('query') }}">
                        <button class="btn btn-light btn-icon" type="submit" id="button-search-addon"><i data-feather="search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="email-list">

                @forelse ($inboxes as $inbox)
                  <!-- email list item -->
                  <div class="email-list-item email-list-item--unread">
                    <div class="email-list-actions">
                      <span class="from">{{ $inbox->name }}</span>
                    </div>
                    <a href="{{ route('inbox.show', $inbox->id) }}" class="email-list-detail">
                      <div class="content">
                        <p class="msg">{{ $inbox->message }}</p>
                      </div>
                      <span class="date">
                        {{ $inbox->created_at->format('d M') }}
                      </span>
                    </a>
                  </div>
                @empty
                  <p class="mt-3 mb-3 text-center fw-bold">Tidak Ada Data</p>
                @endforelse

              </div>
              <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center justify-content-end flex-grow-1">
                  <span class="me-2">{{ $inboxes->firstItem() }}-{{ $inboxes->lastItem() }} of
                    {{ $inboxes->total() }}</span>

                  <div class="btn-group">
                    <button class="btn btn-outline-secondary btn-icon" type="button" onclick="window.location='{{ $inboxes->previousPageUrl() }}'">
                      <i data-feather="chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-secondary btn-icon" type="button" onclick="window.location='{{ $inboxes->nextPageUrl() }}'">
                      <i data-feather="chevron-right"></i>
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
