<?php 
	// require_once "checklogin.php";
	// require_once "class_quantri.php";
	// $qt =  new quantri;
?>
<script type="text/javascript">

	$(document).ready(function() {

			// Store variables

			var accordion_head = $('.accordion > li > a'),
			accordion_body = $('.accordion li > .sub-menu');

			// Open the first tab on load

			if ($.cookie('kaka')>0){
				var menu = $.cookie('kaka');
				var menu_hien = '#'+menu+' a';
				$(menu_hien).addClass('active').next().slideDown('normal');
			}
			else
				$('#1 a').addClass('active').next().slideDown('normal');

			// Click function

			accordion_head.on('click', function(event) {

				// Disable header links

				event.preventDefault();

				// Show and hide the tabs on click

				if ($(this).attr('class') != 'active'){
					accordion_body.slideUp('normal');
					$(this).next().stop(true,true).slideToggle('normal');
					accordion_head.removeClass('active');
					$(this).addClass('active');
				}

			});

		});

	function luu(menu){
		$.cookie('kaka',menu,{expires:7,path:'/'});
	}
</script>
<div id="wrapper-250">

	<ul class="accordion">
		<li id="1" class="files">
			<a href="#one">Trang Chủ</a>
			<ul class="sub-menu">

				<li><a  onclick="luu(1)" href="main.php?p=dk_xem"><em>01</em>Trang Công Ty</a></li>
				<li><a onclick="luu(1)" href="./"><em>02</em>Trang Chủ</a></li>
			</ul>

		</li>

		<li id="7" class="files">
			<a href="#one">Đăng Ký</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(7)" href="main.php?p=dk_xem"><em>01</em>Quản Lý Đăng Ký</a></li>
			</ul>
		</li>

		<li id="2" class="files">
			<a href="#one">Dịch Vụ</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(2)" href="index.php?ctr=ServiceController&action=showService"><em>01</em>Quản Lý Dịch Vụ</a></li>
				<li><a  onclick="luu(2)" href="index.php?ctr=ServiceController&action=showAddService"><em>02</em>Thêm Dịch Vụ</a></li>
			</ul>
		</li>
		<li id="3" class="files">
			<a href="#one">Thiết Bị</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(3)" href="main.php?p=tb_xem"><em>01</em>Tất Cả Thiết Bị</a></li>
				<li><a  onclick="luu(3)" href="main.php?p=tb_them"><em>02</em>Thêm Thiết Bị</a></li>
			</ul>
		</li>
		<li id="4"  class="files">
			<a href="#one">Tin Tức Và Sản Phẩm</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(4)" href="index.php?ctr=NewsController&action=showNews"><em>01</em>Tất Cả Tin Tức</a></li>
				<li><a  onclick="luu(4)" href="index.php?ctr=NewsController&action=showAddNews"><em>02</em>Thêm Tin Tức</a></li>
				<li><a  onclick="luu(4)" href="index.php?ctr=ProductController&action=showProduct"><em>03</em>Tất Cả Sản Phẩm</a></li>
				<li><a  onclick="luu(4)" href="index.php?ctr=ProductController&action=showAddProduct"><em>04</em>Thêm Sản Phẩm</a></li>
			</ul>
		</li>

		<li id="5"  class="files">
			<a href="#one">Danh Mục</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(5)" href="index.php?ctr=CategoryController&action=showCategory"><em>01</em>Tất Cả Danh Mục</a></li>
				<li><a  onclick="luu(5)" href="index.php?ctr=CategoryController&action=addCategory"><em>02</em>Thêm Danh Mục</a></li>
			</ul>
		</li>
		<li id="15" class="files">
			<a href="#one">Menu</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(15)" href="index.php?ctr=MenuController&action=showMenu"><em>01</em>Tất Cả Menu</a></li>
				<li><a  onclick="luu(15)" href="index.php?ctr=MenuController&action=addMenu"><em>02</em>Thêm Menu</a></li>
			</ul>
		</li>
		<li id="6" class="files">
			<a href="#one">Câu Hỏi</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(6)" href="main.php?p=ch_xem"><em>01</em>Tất Cả Câu Hỏi</a></li>
			</ul>
		</li>
		<li id="14" class="files">
			<a href="#one">Góp Ý</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(14)" href="main.php?p=show_feedback"><em>01</em>Tất Cả Góp Ý</a></li>
			</ul>
		</li>

		<li id="8" class="files">
			<a href="#one">Slider</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(8)" href="main.php?p=show_slider"><em>01</em>Quản Lý Slider</a></li>
				<li><a  onclick="luu(8)" href="main.php?p=add_slider"><em>02</em>Thêm Slider</a></li>
			</ul>
		</li>
		<li id="9" class="files">
			<a href="#one">Tuyển dụng</a>
			<ul class="sub-menu">
				<li><a  onclick="luu(9)" href="index.php?ctr=RecruitmentController&action=showRecruitment"><em>01</em>Quản Lý Tuyển dụng</a></li>
				<li><a  onclick="luu(9)" href="index.php?ctr=RecruitmentController&action=showAddRecruitment"><em>02</em>Thêm Tuyển dụng</a></li>
			</ul>
		</li>
		<li id="13" class="files">
			<a href="#one">Ứng Viên</a>
			<ul class="sub-menu">
				<li><a onclick="luu(13)" href="main.php?p=show_candidate"><em>01</em>Quản Lý Ứng Viên</a></li>

			</ul>
		</li>
		
		<li id="10" class="sign">

			<a href="#four">Tài Khoản</a>

			<ul class="sub-menu">
				<li><a onclick="luu(10)" href="thoat.php"><em>01</em>Log Out</a></li>
				<li><a onclick="luu(10)" href="main.php?p=tk_doi"><em>02</em>Đổi Mật Khẩu</a></li>
				<li><a onclick="luu(10)" href="main.php?p=tk_avatar"><em>02</em>Đổi Avatar</a></li>

				<li><a  onclick="luu(10)" href="index.php?ctr=UserController&action=showUser"><em>03</em>Quản Lý User</a></li>
				<li><a onclick="luu(10)" href="index.php?ctr=UserController&action=showAdd"><em>04</em>Thêm User</a></li>

			</ul>

		</li>

		<li id="11" class="sign">
			<a href="#four">Thông Tin Công Ty</a>

			<ul class="sub-menu">
				<li><a onclick="luu(11)" href="main.php?p=show_company"><em>01</em>Tất Cả Thông Tin</a></li>
				<li><a onclick="luu(11)" href="main.php?p=add_company"><em>02</em>Thêm Công Ty</a></li>
			</ul>
		</li>

		<li id="12" class="sign">
			<a href="#four">Album Công Ty</a>

			<ul class="sub-menu">
				<li><a onclick="luu(12)" href="main.php?p=show_image_company"><em>01</em>Tất Cả Ảnh</a></li>
				<li><a onclick="luu(12)" href="main.php?p=add_image_company"><em>02</em>Thêm Ảnh</a></li>
			</ul>
		</li>
	</ul>

</div>

