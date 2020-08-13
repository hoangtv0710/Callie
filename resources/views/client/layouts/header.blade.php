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
                        <form method="post" action="{{ url('search_post') }}">
                            @csrf
                            <input class="input" name="keyword" placeholder="Enter your search...">
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
                            <div class="dropdown">
                                <div class="dropdown-body">
                                    <ul class="dropdown-list">
                                        @foreach ($item->subcategories as $subcate_menu)
                                            <li><a href="{{ $subcate_menu->slug }}.html">{{ $subcate_menu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li>
                        <a href="index.html">Tác giả</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}">Liên hệ</a>
                    </li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li>
                    <a href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li class="has-dropdown"><a>Danh mục</a>
                    <ul class="dropdown">
                        @foreach ($category as $item)
                            <li><a href="{{ $item->slug }}.html">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="index.html">Tác giả</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}">Liên hệ</a>
                </li>
            </ul>
            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>