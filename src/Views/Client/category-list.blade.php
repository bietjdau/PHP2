@extends('layouts.master')

@section('title')
    {{ $category['name'] }}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Category: {{ $category['name'] }}</h3>
                    @foreach ($posts as $post)
                        <div class="d-md-flex post-entry-2 half">
                            <a href="/post/{{ $post['id'] }}" class="me-4 thumbnail">
                                <img src="{{ $post['image'] }}" alt="" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">{{ $post['category_name'] }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $post['date'] }}</span>
                                </div>
                                <h3><a href="/post/{{ $post['id'] }}">{{ $post['title'] }}</a></h3>
                                <p>{{ $post['excerpt'] }}</p>
                                {{-- <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="" alt="" class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">Wade Warren</h3>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach



                    @php
                        $so = 1;
                    @endphp
                    <div class="text-start py-4">
                        <div class="custom-pagination">

                            <a href="" class="prev">Prevous</a>

                            @for ($i = 1; $i <= $trang; $i++)
                                <a href="/{{ $category['id'] }}/category-post/{{ $so }}/page"
                                    @if ($so == $page) class="active"
                                    @else @endif>{{ $so++ }}</a>
                            @endfor

                            <a href="" class="next">Next</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <div class="aside-block">

                            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-trending-tab" data-bs-toggle="pill"
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


                                <!-- Trending -->
                                <div class="tab-pane fade show active" id="pills-trending" role="tabpanel"
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
                                        @include('components.post-entry-1-border-bottom', [
                                            'post' => $latest,
                                        ])
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
                                    <li><a href="/{{ $category['id'] }}/category"><i class="bi bi-chevron-right"></i>
                                            {{ $category['name'] }}</a></li>
                                @endforeach

                            </ul>
                        </div><!-- End Categories -->



                    </div>




                </div>
            </div>
    </section>
@endsection
