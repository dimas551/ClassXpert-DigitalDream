@extends('layouts.main')

@section('title', $user->name)

@section('content')
    <main>
        <div class="rbt-page-banner-wrapper">
            <div class="rbt-banner-image"></div>
        </div>

        <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        @include('template.banner')
                    </div>

                    <div class="profile-content rbt-shadow-box">
                        <div class="rbt-title-style-3 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">About Me</h4>
                            @if (request()->route('username') === Auth::user()->username)
                                <a class="rbt-btn btn-border btn-sm radius-round-6"
                                    href="{{ route('profile.edit', Auth::user()->id) }}">
                                    <i class="feather-edit"></i> Edit
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
    </main>
@endsection
