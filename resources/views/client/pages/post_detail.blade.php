@section('title')
    {{ $p->title }}
@endsection
@section('css')
    <style>
        ._content img {
            width: 100%;
        }
    </style>
@endsection
@extends('client.layouts.master')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post share -->
                    <div class="section-row">
                        <div class="post-share">
                            <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                            <a href="#" class="social-twitter"><i class="fa fa-thumbs-o-up"></i><span>Like</span></a>
                        </div>
                    </div>
                    <!-- /post share -->

                    <!-- post content -->
                    <div class="section-row">
                        <h3>{{ $p->title }}</h3>
                        <p>{{ $p->description }}</p>
                        <div class="_content">
                            {!! $p->content !!}
                        </div>
                    </div>
                    <!-- /post content -->

                    <!-- post tags -->
                    <div class="section-row">
                        <div class="post-tags">
                            <ul>
                                <li>TAGS:</li>
                                <li><a href="#">Social</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Health</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post tags -->

                    <!-- post nav -->
                    <div class="section-row">
                        <div class="post-nav">
                            @if (isset($previous))
                                <div class="prev-post">
                                    <a class="post-img" href="{{ $previous->slug }}.html"><img src="images/posts/{{ $previous->image }}" alt=""></a>
                                    <h3 class="post-title"><a href="{{ $previous->slug }}.html">{{ $previous->title }}</a></h3>
                                    <span>Bài trước</span>
                                </div>
                            @endif

                            @if (isset($next))
                                <div class="next-post">
                                    <a class="post-img" href="{{ $next->slug }}.html"><img src="images/posts/{{ $next->image }}" alt=""></a>
                                    <h3 class="post-title"><a href="{{ $next->slug }}.html">{{ $next->title }}</a></h3>
                                    <span>Bài sau</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /post nav  -->

                    <!-- post author -->
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">About <a href="author.html">John Doe</a></h3>
                        </div>
                        <div class="author media">
                            <div class="media-left">
                                <a href="author.html">
                                    <img class="author-img media-object" src="./img/avatar-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <ul class="author-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post author -->

                    <!-- /related post -->
                    <div>
                        <div class="section-title">
                            <h3 class="title">Bài viết liên quan</h3>
                        </div>
                        <div class="row">
                            <!-- post -->
                            @foreach ($related_post as $item)
                                <div class="col-md-4">
                                    <div class="post post-sm">
                                        <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="140"></a>
                                        <div class="post-body">
                                            <div class="post-category">
                                                <a href="category.html">{{ $item->subcategory->name }}</a>
                                            </div>
                                            <h3 class="post-title title-sm"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
                                            <ul class="post-meta">
                                                <li><a href="author.html">{{ $item->author }}</a></li>
                                                <li>{{ $item->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /post -->
                        </div>
                    </div>
                    <!-- /related post -->

                    <!-- post comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">3 Comments</h3>
                        </div>
                        <div class="post-comments">
                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar-2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">5 min ago</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="reply">Reply</a>
                                    <!-- comment -->
                                    <div class="media media-author">
                                        <div class="media-left">
                                            <img class="media-object" src="./img/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4>John Doe</h4>
                                                <span class="time">5 min ago</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                    <!-- /comment -->
                                </div>
                            </div>
                            <!-- /comment -->

                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar-3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">5 min ago</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="reply">Reply</a>
                                </div>
                            </div>
                            <!-- /comment -->
                        </div>
                    </div>
                    <!-- /post comments -->

                    <!-- post reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">Leave a reply</h3>
                        </div>
                        <form class="post-reply">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="text" name="website" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="primary-button">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /post reply -->
                </div>
                <div class="col-md-4">
                    @include('client.layouts.sidebar')
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection