<!-- ad widget-->
<div class="aside-widget text-center">
    <a href="#" style="display: inline-block;margin: auto;">
        <img class="img-responsive" src="assets/client/img/ad-3.jpg" alt="">
    </a>
</div>
<!-- /ad widget -->

<!-- category widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Danh mục</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach ($category as $item)
                <li><a href="{{ $item->slug }}.html">{{ $item->name }} <span>{{ number_format($item->posts->count()) }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /category widget -->

<!-- newsletter widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Newsletter</h2>
    </div>
    <div class="newsletter-widget">
        <form>
            <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
            <input class="input" name="newsletter" placeholder="Enter Your Email">
            <button class="primary-button">Subscribe</button>
        </form>
    </div>
</div>
<!-- /newsletter widget -->

<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Popular Posts</h2>
    </div>
    <!-- post -->
    @foreach ($post->sortBy('views')->take(5) as $item)
        <div class="post post-widget">
            <a class="post-img" href="{{ $item->slug }}.html"><img src="images/posts/{{ $item->image }}" height="90"></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="{{ $item->subcategory->slug }}.html">{{ $item->subcategory->name }}</a>
                </div>
                <h3 class="post-title"><a href="{{ $item->slug }}.html">{{ str_limit($item->title, 65) }}</a></h3>
            </div>
        </div>
    @endforeach
    <!-- /post -->
</div>
<!-- /post widget -->