@extends('layouts.main')

@section('title', 'Mail')

@section('content')

<main>
    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image"></div>
    </div>

    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div>
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">

                                <div class="rbt-dashboard-table table-responsive mobile-table-750 mt--30">
                                    <table class="rbt-table table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($articles as $article_data)

                                                <tr>
                                                    <th>
                                                        <span class="h6 mb--5">{{ $article_data->name }}</span>
                                                    </th>
                                                    <td>
                                                        <span class="h6 mb--5">{{ $article_data->email }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="h6 mb--5">{{ $article_data->subject }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="h6 mb--5">{{ $article_data->message }}</span>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @foreach($articles as $article_data)
        @include('admin.article.content', ['article_data' => $article_data])
        @include('admin.article.delete', ['article_data' => $article_data])
    @endforeach

</main>

@endsection
