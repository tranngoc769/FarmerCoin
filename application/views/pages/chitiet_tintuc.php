
			<main class="page-main" id="page-main">
					<a id="scrolltop" href="#" class="top"></a>
					<div class="page-main__extra">
						<div id="left-nav"></div>
						<div class="extra-left extra-left__posts">
								<h2><a href="#" title="<?php if ($type == "news") : ?>Tin nóng mới nhất<?php else:?>Sự kiện mới nhất<?php endif; ?>"><?php if ($type == "news") : ?>Tin nóng mới nhất<?php else:?>Sự kiện mới nhất<?php endif; ?></a></h2>
								<ul class="posts__list">
									<?php foreach ($top as $i => $news) : ?>
									<li><a class="posts__post-title" href="/index.php/blog/detail?id=<?= $news->id ?>" title="<?= $news->title ?>"><span><?= $news->title ?></span><time datetime="<?= $news->date ?>"><?= $news->date ?></time></a></li>
									<?php endforeach; ?>
								</ul>
						</div>
					</div>
					<div class="page-main__content">
						<div class="main-content">
								<div class="main-content__title">
									<h1><?php if ($type == "news") : ?>Tin tức<?php else:?>Sự kiện<?php endif; ?></h1>
									<ul id="breadcrumb" class="breadcrumb">
											<li itemprop="url" itemprop=&#039;child&#039; itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" rel=""><span itemprop="title">Trang chủ </span></a> &gt; </li>
											<li class="active" itemprop=&#039;child&#039; itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php if ($type == "news") : ?>Tin tức<?php else:?>Sự kiện<?php endif; ?></span></li>
									</ul>
								</div>
								<article>
									<h2 class="article__title"><?=$blogs->title ?></h2>
									<time class="article__time"><?=$blogs->date ?></time>
									<div class="article__detail">
										<div class="StaticMain">
											<?=$blogs->detail ?>
										</div>
								</article></div>
					</div>
			</main>
			<footer>
					<a href="#" class="top"></a>
					<div id="bottom-nav">
						<!--block main navigation --> 
						<ul>
								<li class="" id="">
									<a class="main-nav__item-home" href="/" title="Trang Chủ" target="_self">Trang chủ</a>
								</li>
								<li class="" id="">
									<a class="main-nav__item-news" href="#" title="Tin tức" target="_self">Tin tức</a>
									<ul>
											<li class="" id="">
												<a class="" href="#" title="Tin tức" target="_self">Tin tức</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/tinh-nang/cap-nhat-2016.html" title="Bản Cập Nhật" target="_self">Bản Cập Nhật</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/tinh-nang/trang-bi-anh-hung-155.html" title="Trang Bị Anh Hùng" target="_self">Trang Bị Anh Hùng</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/tinh-nang/chuyen-server.html" title="Chuyển Server" target="_self">Chuyển Server</a>
											</li>
									</ul>
								</li>
								<li class="" id="">
									<a class="main-nav__item-event" href="../su-kien/#" title="Sự kiện" target="_self">Sự kiện</a>
								</li>
								<li class="" id="">
									<a class="main-nav__item-tip" href="../bai-viet/cam-nang/danh-sach.html" title="Cẩm nang" target="_self">Cẩm nang</a>
									<ul>
											<li class="" id="">
												<a class="" href="../cam-nang/tan-thu/nhiem-vu-tan-thu.html" title="Tân thủ" target="_self">Tân thủ</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/cao-thu/ban-do-luyen-cong.html" title="Tính năng đặc sắc" target="_self">Tính năng đặc sắc</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/nhiem-vu/hiep-khach.html" title="Nhiệm Vụ" target="_self">Nhiệm Vụ</a>
											</li>
											<li class="" id="">
												<a class="" href="../baiviet/mon-phai/thieu-lam.html" title="Môn phái" target="_self">Môn phái</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/trang-bi/phi-phong.html" title="Trang bị" target="_self">Trang bị</a>
											</li>
									</ul>
								</li>
								<li class="" id="">
									<a class="main-nav__item-guid" href="../cam-nang/can-biet/huong-dan-cai-dat.html" title="Cần Biết" target="_self">Cần biết</a>
									<ul>
											<li class="" id="">
												<a class="" href="../cam-nang/can-biet/huong-dan-cai-dat.html" title="Hướng dẫn cài đặt" target="_self">Hướng dẫn cài đặt</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/can-biet/nhom-may-chu-134.html" title="Nhóm máy chủ" target="_self">Nhóm máy chủ</a>
											</li>
											<li class="" id="">
												<a class="" href="../cam-nang/can-biet/dieu-khoan-su-dung.html" title="Điều khoản sử dụng" target="_blank">Điều khoản sử dụng</a>
											</li>
											<li class="" id="">
												<a class="" href="http://hotro1.zing.vn/kiem-the/san-pham_165__0.html" title="Trung tâm hỗ trợ" target="_blank">Trung tâm hỗ trợ</a>
											</li>
									</ul>
								</li>
								<li class="" id="">
									<a class="main-nav__item-social" href="https://www.facebook.com/kiemthefanclub" title="Cộng đồng" target="_blank">Cộng đồng</a>
									<ul>
											<li class="" id="">
												<a class="" href="https://www.facebook.com/kiemthefanclub" title="Fanpage" target="_blank">Fanpage</a>
											</li>
									</ul>
								</li>
								<li class="" id="">
									<a class="main-nav__item-version" href="#" title="Phiên Bản" target="_self">Phiên Bản</a>
									<ul>
											<li class="" id="">
												<a class="" href="../su-kien/phien-ban-moi-kiem-vu-cuu-thien/chan-nguyen-123.html" title="Kiếm Vũ Cửu Thiên" target="_self">Kiếm Vũ Cửu Thiên</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/long-mon-phi-kiem-2012/giao-dien-moi.html" title="Long Môn Phi Kiếm" target="_self">Long Môn Phi Kiếm</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/dai-kiem-hoi-luan-anh-hung/gioi-thieu-529.html" title="Đại Kiếm Hội" target="_self">Đại Kiếm Hội</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/thien-kim-chien-tich/diem-chien-tich.html" title="Thiên Kim Chiến Tích" target="_self">Thiên Kim Chiến Tích</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/phien-ban-5-nam-tieu-dao-ky-hiep/tieu-dao-phai.html" title="Tiêu Dao Kỳ Hiệp" target="_self">Tiêu Dao Kỳ Hiệp</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/phien-ban-tong-mon-tran-thien/tong-mon-tran-thien-871.html" title="Tông Môn Trấn Thiên" target="_self">Tông Môn Trấn Thiên</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/big-update-than-binh-xuat-the/vu-khi-than-sa-vo-cuc.html#page-main" title="Thần Binh Xuất  Thế" target="_self">Thần Binh Xuất Thế</a>
											</li>
											<li class="" id="">
												<a class="" href="../phong-van-xuat-the/index.html" title="Phong Vân Xuất Thế" target="_self">Phong Vân Xuất Thế</a>
											</li>
											<li class="" id="">
												<a class="" href="../thap-nien-hoi-tu.html" title="Thập Niên Hội Tụ" target="_self">Thập Niên Hội Tụ</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/thien-long-luan-kiem-489/quan-gia-1449.html" title="Thiên Long Luận Kiếm" target="_self">Thiên Long Luận Kiếm</a>
											</li>
											<li class="" id="">
												<a class="" href="../su-kien/phien-ban-moi-tuyet-ky-tran-phai-495/ky-nang-tran-phai.html" title="Tuyệt Kỹ Trấn Phái" target="_self">Tuyệt Kỹ Trấn Phái</a>
											</li>
											<li class="" id="">
												<a class="" href="../thien-co-bach-bien.html" title="Thiên Cơ Bách Biến" target="_self">Thiên Cơ Bách Biến</a>
											</li>
									</ul>
								</li>
						</ul>
					</div>
					<div class="copyright">
						<p class="vng">Vng</p>
						<p class="ksoft">KingSoft</p>
						<p class="text" style="max-width: 690px;">
								Công ty Cổ phần VNG<br/>
								Quyết định phê duyệt nội dung kịch bản trò chơi điện tử G1 trên mạng số: 3967/QĐ-BTTTT do Bộ Thông tin và Truyền thông cấp ngày 8/12/2009
						</p>
					</div>
			</footer>
		</div>
</div>
<div id="thewindowbackground"></div>
