@section('title')
    {{ $cate->name }}
@endsection
@extends('client.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-header-bg" style="background-image: url('./assets/client/img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">{{ $cate->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section" >
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    @foreach ($cate->posts->take(1) as $item)
                        <!-- post -->
                            <div class="post post-thumb">
                                <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="450"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{ $item->subcategory->slug }}.html">{{ $item->subcategory->name }}</a>
                                    </div>
                                    <h3 class="post-title title-lg"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">{{ $item->author }}</a></li>
                                        <li>{{ $item->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        <!-- /post -->
                    @endforeach
                    
                    <div class="row">
                        <!-- post -->
                        @foreach ($cate->posts->slice(1, 4) as $item)
                            <div class="col-md-6">
                                <div class="post">
                                    <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="210"></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="{{ $item->subcategory->slug }}.html">{{ $item->subcategory->name }}</a>
                                        </div>
                                        <h3 class="post-title recent"><a href="{{ $item->slug }}.html">{{ $item->title }}</a></h3>
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
                       

                    <!-- post -->
                    {{ csrf_field() }}
                    <input type="hidden" name="cate_id" value="{{ $cate->id }}">
                    <div id="post_data"></div>
                    <!-- /post -->
                  
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

@section('script')
    <script>
        $(document).ready(function(){
            var _token = $('input[name="_token"]').val();
            var cate_id = $('input[name="cate_id"]').val();
        
            load_data('', _token, cate_id);
        
            function load_data(id="", _token, cate_id)
            {
                $.ajax({
                    url:"{{ route('loadmore.load_data') }}",
                    method:"POST",
                    data:{
                            id: id, 
                            _token: _token, 
                            cate_id: cate_id,
                        },
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
                load_data(id, _token, cate_id);
            });
        });
    </script>
@endsection