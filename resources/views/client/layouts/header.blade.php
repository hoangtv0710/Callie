<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{ url('/') }}" class="logo"><img src="assets/client/img/logo.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div id="nav-search">
                        <form>
                            <input class="input" name="search" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li>
                        <a href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    @foreach ($category as $item)
                        <li class="@if (count($item->subcategories) > 0) has-dropdown @endif megamenu">
                            <a href="{{ $item->slug }}.html">{{ $item->name }}</a>
                            @if (count($item->subcategories) > 0)
                                <div class="dropdown tab-dropdown">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <ul class="tab-nav">
                                                @foreach ($item->subcategories as $sc)
                                                    <li @if ($loop->first) class="active" @endif><a data-toggle="tab" href="#tab-{{ $sc->id }}">{{ $sc->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="dropdown-body tab-content">
                                                @foreach ($subcategory as $post)
                                                    <div id="tab-{{ $post->id }}" class="tab-pane fade in active">
                                                        <div class="row">
                                                            @foreach ($post->posts as $p)
                                                                <div class="col-md-4">
                                                                    <div class="post post-sm">
                                                                        <a class="post-img" href="blog-post.html"><img src="images/posts/{{ $p->image }}" alt=""></a>
                                                                        <div class="post-body">
                                                                            <div class="post-category">
                                                                                <a href="category.html">{{ $post->name }}</a>
                                                                            </div>
                                                                            <h3 class="post-title title-sm"><a href="blog-post.html">{{ $p->title }}</a></h3>
                                                                            <ul class="post-meta">
                                                                                <li><a href="author.html">{{ $p->author }}</a></li>
                                                                                <li>{{ $p->created_at }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                    <li>
                        <a href="index.html">Tác giả</a>
                    </li>
                    <li>
                        <a href="index.html">Liên hệ</a>
                    </li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li><a href="index.html">Home</a></li>
                <li class="has-dropdown"><a>Categories</a>
                    <ul class="dropdown">
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Health</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contacts</a></li>
                <li><a href="#">Advertise</a></li>
            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>