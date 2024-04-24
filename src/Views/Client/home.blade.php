@extends('layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            @foreach ($new4s as $new4)
                            <div class="swiper-slide">
                                <a href="/post/{{$new4['id']}}" class="img-bg d-flex align-items-end"
                                    style="background-image: url('{{$new4['image']}}');">
                                    <div class="img-bg-inner">
                                        <h2>{{$new4['title']}}</h2>
                                        <p>{{ $new4['excerpt'] }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            
                            
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">

                <div class="col-lg-4">
                    <div class="post-entry-1 lg">
                        <a href="/post/{{$postFirstLatest['id']}}"><img src="{{ $postFirstLatest['image'] }}" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">{{ $postFirstLatest['category_name'] }}</span> <span
                                class="mx-1">&bullet;</span>
                            <span>{{ $postFirstLatest['date'] }}</span>
                        </div>
                        <h2><a href="/post/{{$postFirstLatest['id']}}">{{ $postFirstLatest['title'] }}</a></h2>
                        <p class="mb-4 d-block">{{ $postFirstLatest['excerpt'] }}</p>

                        {{-- <div class="d-flex align-items-center author">
                            <div class="photo"><img src="/assets/client/assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">Cameron Williamson</h3>
                            </div>
                        </div> --}}
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        @foreach ($postTop6Chunk as $item)
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($item as $post)
                                    @include('components.post-entry-1', ['post' => $post])
                                @endforeach

                            </div>
                        @endforeach
                        <!-- Trending Section -->
                        <div class="col-lg-4">

                            <div class="trending">
                                <h3>Trending</h3>
                                <ul class="trending-post">
                                    @php
                                        $top = 1; 
                                    @endphp
                                    @foreach ($trendings as $trending)
                                        <li>
                                            <a href="/post/{{$trending['id']}}">
                                                <span class="number">
                                                    {{$top++}}
                                                </span>
                                                <h3>{{ $trending['title'] }}</h3>
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>

                        </div> <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section> <!-- End Post Grid Section -->

   
@endsection
