<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="/assets/client/assets/img/logo.png" alt=""> -->
            <h1>X-Blog</h1>
        </a>

        @php
            $categories = (new \Thanhdo\Mvcoop\Models\Category())->getForMenu();
        @endphp

        <nav id="navbar" class="navbar">
            <ul>
                {{-- <li><a href="index.html">Blog</a></li>
          <li><a href="single-post.html">Single Post</a></li> --}}
                <li class="dropdown">
                    <a href="#"><span>Categories</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/{{ $category['id'] }}/category-post">{{ $category['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <!-- .navbar -->

        <div class="position-relative">
            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="/search" method="get" class="search-form">
                    <button type="submit" class="icon bi-search"></button>
                    <input type="text" placeholder="Search" name="key" class="form-control" />
                    <button class="btn js-search-close">
                        <span class="bi-x"></span>
                    </button>
                </form>
            </div>
            <!-- End Search Form -->
        </div>
    </div>
</header>
