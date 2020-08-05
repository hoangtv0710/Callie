@extends('client.layouts.master')

@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            @foreach ($post->take(3) as $item)
                @if ($loop->first)
                    <div class="col-md-8 hot-post-left">
                        <!-- post -->
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="449"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">{{ $item->subcategory->name }}</a>
                                </div>
                                <h3 class="post-title title-lg"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">{{ $item->author }}</a></li>
                                    <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                @else 
                    <div class="col-md-4 hot-post-right">
                        <!-- post -->
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="221"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">{{ $item->subcategory->name }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">{{ $item->author }}</a></li>
                                    <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Recent posts</h2>
                        </div>
                    </div>
                    @foreach ($post->slice(3, 10) as $item)
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="245"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">{{ $item->subcategory->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">{{ $item->author }}</a></li>
                                        <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /row -->

                @foreach ($subcategory as $item)
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2 class="title">{{ $item->name }}</h2>
                            </div>
                        </div>
                        <!-- post -->
                        @foreach ($item->posts->take(3) as $p)
                            <div class="col-md-4">
                                <div class="post post-sm">
                                    <a class="post-img" href="{{ $p->slug }}.html"><img src="images/posts/{{ $p->image }}" height="150"></a>
                                    <div class="post-body">
                                        <h3 class="post-title title-sm"><a href="{{ $p->slug }}.html">{{ $p->title }}</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="author.html">{{ $p->author }}</a></li>
                                            <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /post -->
                    </div>
                    <!-- /row -->
                @endforeach
            </div>
            <!-- /sidebar -->
            <div class="col-md-4">
                @include('client.layouts.sidebar')
            </div>
            <!-- /sidebar -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ad -->
            <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                    <img class="img-responsive" src="assets/client/img/ad-2.jpg" alt="">
                </a>
            </div>
            <!-- /ad -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @foreach ($category->take(3) as $item)
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">{{ $item->name }}</h2>
                    </div>
                    <!-- post -->
                    @foreach ($item->posts->take(3) as $p)
                        @if($loop->first)
                            <div class="post">
                                <a class="post-img" href="{{ $p->slug }}.html"><img src="images/posts/{{ $p->image }}" height="225"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">{{ $p->subcategory->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{ $p->slug }}.html">{{ $p->title }}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">{{ $p->author }}</a></li>
                                        <li>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="post post-widget">
                                <a class="post-img" href="{{ $p->slug }}.html"><img src="images/posts/{{ $p->image }}" height="90"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">{{ $p->subcategory->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a href="{{ $p->slug }}.html">{{ $p->title }}</a></h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- /post -->
                </div>
            @endforeach
        </div>
        <!-- /row -->

        <!-- row -->
     
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                {{ csrf_field() }}
                <div id="post_data"></div>
            </div>
            <div class="col-md-4">
                <!-- galery widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Instagram</h2>
                    </div>
                    <div class="galery-widget">
                        <ul>
                            <li><a href="#"><img src="assets/client/img/galery-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="assets/client/img/galery-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="assets/client/img/galery-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="assets/client/img/galery-4.jpg" alt=""></a></li>
                            <li><a href="#"><img src="assets/client/img/galery-5.jpg" alt=""></a></li>
                            <li><a href="#"><img src="assets/client/img/galery-6.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /galery widget -->

                <!-- Ad widget -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="assets/client/img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /Ad widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
    
            var _token = $('input[name="_token"]').val();
        
            load_data('', _token);
        
            function load_data(id="", _token)
            {
                $.ajax({
                    url:"{{ route('loadmore.load_data') }}",
                    method:"POST",
                    data:{id:id, _token:_token},
                    success:function(data)
                    {
                        $('#load_more_button').remove();
                        $('#post_data').append(data);
                    }
                })
            }
            $(document).on('click', '#load_more_button', function(){
                var id = $(this).data('id');
                $('#load_more_button').html('<b>Đang tải...</b>');
                load_data(id, _token);
            });
        });
    </script>
@endsection