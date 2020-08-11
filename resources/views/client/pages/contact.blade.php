@section('title')
    Liên hệ
@endsection
@section('css')
	<style>
		.error {
			color: red;
		}
	</style>
@endsection
@extends('client.layouts.master')
@section('content')

    <div class="page-header">
        <div class="page-header-bg" style="background-image: url('./assets/client/img/banner-contact.jpg');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">Liên hệ</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Thông tin về chúng tôi</h2>
						</div>
						<ul class="contact">
							<li><i class="fa fa-phone"></i> 0374-969-474</li>
							<li><i class="fa fa-envelope"></i> <a href="#">callie@gmail.com</a></li>
							<li><i class="fa fa-map-marker"></i> Mễ Trì, Nam Từ Liêm, Hà Nội</li>
						</ul>
					</div>

					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Nhập nội dung</h2>
						</div>
						<form action="{{ url('post_contact')}}" method="post" id="form_contact">
                            @csrf
							<div class="row">
                                <div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="name" placeholder="Tên" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
										@error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
										@error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="subject" placeholder="Tiêu đề" class="@error('subject') is-invalid @enderror" value="{{ old('subject') }}">
										@error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="content" placeholder="Nội dung" class="@error('content') is-invalid @enderror">{{ old('content') }}</textarea>
										@error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
									<button class="primary-button" type="submit">Gửi đi</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

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
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$("#form_contact").validate({
			rules: {
				"name": {
					required: true
				},
				"email": {
					required: true,
					email: true
				},
				"subject": {
					required: true
				},
				"content": {
					required: true
				},
			},

			messages: {
				"name": {
					required: "Tên không được bỏ trống"
				},
				"email": {
					required: "Email không được bỏ trống",
					email: "Email không hợp lệ"
				},
				"subject": {
					required: "Tiêu đề không được bỏ trống"
				},
				"content": {
					required: "Nội dung không được bỏ trống"
				}
			}
		});
	});
</script>
@endsection