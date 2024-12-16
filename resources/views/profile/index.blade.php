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

                <div class="rbt-profile-course-area mt--60">
                    <div class="col-lg-12">
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">

                                <div class="advance-tab-button mb--30">
                                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="myTab-4"
                                        role="tablist">
                                        <li role="presentation">
                                            <a href="#" class="tab-button active" id="home-tab-4" data-bs-toggle="tab"
                                                data-bs-target="#home-4" role="tab" aria-controls="home-4"
                                                aria-selected="true">
                                                <span class="title">Active Course</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#" class="tab-button" id="completed-tab-4" data-bs-toggle="tab"
                                                data-bs-target="#completed-4" role="tab" aria-controls="completed-4"
                                                aria-selected="false">
                                                <span class="title">Courses</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#" class="tab-button" id="review-tab-4" data-bs-toggle="tab"
                                                data-bs-target="#review-4" role="tab" aria-controls="review-4"
                                                aria-selected="false">
                                                <span class="title">Reviews</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="home-4" role="tabpanel"
                                        aria-labelledby="home-tab-4">
                                        <div class="row g-5">

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-01.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <h4 class="rbt-card-title"><a href="course-details.html">React
                                                                Front
                                                                To Back</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <p class="rbt-card-text">React Js long fact that a reader will
                                                            be
                                                            distracted by
                                                            the readable.</p>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuenow="40" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">40%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-02.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <h4 class="rbt-card-title"><a href="course-details.html">React
                                                                Front
                                                                To Back</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <p class="rbt-card-text">React Js long fact that a reader will
                                                            be
                                                            distracted by
                                                            the readable.</p>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuenow="40" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">40%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-03.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>

                                                        <h4 class="rbt-card-title"><a href="course-details.html">React
                                                                Front
                                                                To Back</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <p class="rbt-card-text">React Js long fact that a reader will
                                                            be
                                                            distracted by
                                                            the readable.</p>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuenow="40" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">40%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="completed-4" role="tabpanel"
                                        aria-labelledby="completed-tab-4">
                                        <div class="row g-5">
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-01.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>
                                                        <h4 class="rbt-card-title"><a href="course-details.html">React
                                                                Front
                                                                To Back</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">100%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-card-bottom">
                                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center"
                                                                href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-02.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>
                                                        <h4 class="rbt-card-title"><a href="course-details.html">PHP
                                                                Beginner + Advanced</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">100%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-card-bottom">
                                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center"
                                                                href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="rbt-card variation-01 rbt-hover">
                                                    <div class="rbt-card-img">
                                                        <a href="course-details.html">
                                                            <img src="assets/images/course/course-online-03.jpg"
                                                                alt="Card image">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-card-body mt--20">
                                                        <div class="rbt-card-top">
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-bookmark-btn">
                                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                            </div>
                                                        </div>
                                                        <h4 class="rbt-card-title"><a href="course-details.html">Angular
                                                                Zero to
                                                                Mastery</a>
                                                        </h4>
                                                        <ul class="rbt-meta">
                                                            <li><i class="feather-book"></i>20 Lessons</li>
                                                            <li><span class="rbt-badge-5">Category</span></li>
                                                        </ul>

                                                        <div class="rbt-progress-style-1 mb--20 mt--10">
                                                            <div class="single-progress">
                                                                <h6 class="rbt-title-style-2 mb--10">Complete</h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar wow fadeInLeft bar-color-success"
                                                                        data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                    <span
                                                                        class="rbt-title-style-2 progress-number">100%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rbt-card-bottom">
                                                            <a class="rbt-btn btn-sm bg-primary-opacity w-100 text-center"
                                                                href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review-4" role="tabpanel"
                                        aria-labelledby="review-tab-4">
                                        <div class="row g-5">
                                            <div class="rbt-dashboard-table table-responsive mobile-table-750">
                                                <table class="rbt-table table">
                                                    <thead>
                                                        <tr>
                                                            <th>Course</th>
                                                            <th>Commentar</th>
                                                            <th class="text-end">Rating</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <div class="d-flex align-items-center h-100">
                                                                    <span class="b3"><a href="#">Speaking Korean for
                                                                            Beginners</a></span>
                                                                </div>
                                                            </th>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <p class="b3">Good</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex align-items-start justify-content-end h-100 rbt-review">
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                            </div>
                                            </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="d-flex align-items-center h-100">
                                                        <span class="b3"><a href="#">Speaking Korean for
                                                                Beginners</a></span>
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <p class="b3">Good</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex align-items-start justify-content-end h-100 rbt-review">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="d-flex align-items-center h-100">
                                                    <span class="b3"><a href="#">Speaking Korean for
                                                            Beginners</a></span>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <p class="b3">Good</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex align-items-start justify-content-end h-100 rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span class="b3"><a href="#">How to Write Your First Novel</a></span>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <p class="b3">Good</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-start justify-content-end h-100 rbt-review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                </div>
                                </td>
                                </tr>
                                </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
