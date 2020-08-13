@section('title')
    Tìm kiếm từ khoá: {{ $input }}
@endsection
@extends('client.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-header-bg" style="background-image: url('./assets/client/img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase"></h1>
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
                    <p class="">Có {{ count($output) }} bài viết phù hợp với từ khoá: <b class="text-gray-700">{{ $input }}</b></p>
                    <hr>
                    @foreach ($output as $item)
                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post post-thumb">
                                <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="250"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="{{ $item->subcategory->slug }}.html">{{ $item->subcategory->name }}</a>
                                    </div>
                                    <h3 class="post-title title-lg"><a href="{{ $item->slug }}.html" style="font-size:14px;">{{ $item->title }}</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">{{ $item->author }}</a></li>
                                        <li>{{ $item->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                    @endforeach
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