@extends('layouts.master')

@section('title')
    {{ $post['title'] }}
@endsection


@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date"> {{ $post['category_name'] }}</span> <span
                                class="mx-1">&bullet;</span>
                            <span> {{ $post['date'] }}</span>
                        </div>
                        <h1 class="mb-5"> {{ $post['title'] }}</h1>
                        <div class="container">
                            {!! $post['content'] !!}
                        </div>

                    </div><!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">Comments</h5>
                        @foreach ($comments as $comment)
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="/assets/client/assets/img/person-5.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{ $comment['name'] }} {{ $comment['email'] }}</h6>
                                        <span class="text-muted">{{ $comment['date'] }}</span>
                                    </div>
                                    <div class="comment-body">
                                        {{ $comment['message'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">

                        <div class="col-lg-12">
                            <h5 class="comment-title">Leave a Comment</h5>
                            <form action="/post/{{$post['id']}}" method="post">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-name">Name</label>
                                        <input type="text" class="form-control" id="comment-name"
                                            placeholder="Enter your name" name="name" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="comment-email">Email</label>
                                        <input type="text" class="form-control" id="comment-email"
                                            placeholder="Enter your email" name="email" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>
                                        <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"
                                            name="message" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Comments Form -->

                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-popular" type="button" role="tab"
                                    aria-controls="pills-popular" aria-selected="true">Popular</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-trending" type="button" role="tab"
                                    aria-controls="pills-trending" aria-selected="false">Trending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab"
                                    aria-controls="pills-latest" aria-selected="false">Latest</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                aria-labelledby="pills-popular-tab">
                                @foreach ($populars as $popular)
                                    @include('components.post-entry-1-border-bottom', ['post' => $popular])
                                @endforeach
                            </div> <!-- End Popular -->

                            <!-- Trending -->
                            <div class="tab-pane fade" id="pills-trending" role="tabpanel"
                                aria-labelledby="pills-trending-tab">
                                @foreach ($trendings as $trending)
                                    @include('components.post-entry-1-border-bottom', [
                                        'post' => $trending,
                                    ])
                                @endforeach


                            </div> <!-- End Trending -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                aria-labelledby="pills-latest-tab">
                                @foreach ($latests as $latest)
                                    @include('components.post-entry-1-border-bottom', ['post' => $latest])
                                @endforeach


                            </div> <!-- End Latest -->

                        </div>
                    </div>

                    @php
                        $categories = (new \Xuyenqua\Mvcoop\Models\Category())->getForMenu();
                    @endphp

                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">

                            @foreach ($categories as $category)
                                <li><a href="/{{ $category['id'] }}/category-post"><i class="bi bi-chevron-right"></i>
                                        {{ $category['name'] }}</a></li>
                            @endforeach

                        </ul>
                    </div><!-- End Categories -->

                </div>
            </div>
        </div>
    </section>
@endsection
