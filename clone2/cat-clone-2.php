<?php
/**
 * Temp late Name: Clone Category 2
 *
 * @package Clone2
 */

include 'class.Database.inc';

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article>

				<header class="entry-header">
					<h1>Clone Category</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
				<?php
				$donvi = array(
					'Tất cả',
					'Ban giám đốc',
					'Phòng thư ký',
					'Phòng Hành chính',
					'Phòng Văn hóa',
					'Phòng Tổ Chức Cán Bộ',
					'Phòng Kế hoạch - Tài chính',
					'Phòng Thanh Tra',
					'Phòng Quản Lý Lữ Hành',
					'Phòng Quản lý cơ sở lưu trú',
					'Phòng thể thao thành tích cao',
					'Phòng Thể thao quần chúng',
					'Phòng Quản lý nghệ thuật',
					'Phòng Quản lý VH Thông tin',
					'Phòng Xây dựng Nếp sống Văn hóa &amp; Gia đình',
					'Phòng Quản lý Di sản',
					'Nhà hát Kịch Hà Nội',
					'Nhà hát Cải lương Hà Nội',
					'TT Văn Hóa Thành phố - Cơ sở 2',
					'Nhà hát Ca múa nhạc Thăng Long',
					'Đoàn Xiếc Hà Nội',
					'Nhà hát Chèo Hà Nội',
					'Nhà hát Múa rối Thăng Long',
					'Trung tâm hoạt động VHKH',
					'Ban Quản lý Dự án ĐT Xây dựng',
					'Ban Quản lý di tích Nhà tù Hỏa Lò',
					'Quỹ Văn hóa Hà Nội',
					'Trung tâm Thông tin Triển lãm Thành phố',
					'Thư viện Hà Nội - Cơ sở 2',
					'Ban Quản lý Di tích danh thắng',
					'Di tích Ngọc Sơn',
					'Trung tâm Phát hành phim và Chiếu bóng',
					'Trung tâm Văn hóa Kim Đồng',
					'Trung tâm Huấn luyện và Thi đấu Thể dục Thể thao',
					'Trường PTNK TDTT - Trung tâm ĐTVĐV cấp cao HN',
					'Báo Thể thao ngày nay',
					'Trung tâm Thông tin',
					'Phòng VH và TT 255 Bạch Mai',
					'Nhà Văn hóa 255 Bạch Mai',
					'Trung tâm TDTT 75 Đặng Văn Ngữ',
					'Văn phòng Đảng - Đoàn thể',
					'Văn phòng',
					'Báo Màn ảnh Sân khấu',
					'Bảo tàng Hà Nội',
					'Trung tâm Thông tin và Xúc tiến Du lịch',
					'Quận Ba Đình',
					'Trung tâm Văn hóa 180 Quán Thánh',
					'Quận Cầu Giấy',
					'Quận Đống Đa',
					'Phòng VH và TT 101 Nguyễn Lương Bằng',
					'Trung tâm Văn hóa 16 Hồ Đắc Di',
					'Quận Hai Bà Trưng',
					'Trung tâm TDTT 75 Hồng Mai',
					'Quận Hoàn Kiếm',
					'Phòng VH và TT 45 Hàng Lược',
					'Nhà Văn hóa 42 Nhà Chung',
					'Trung tâm TDTT Số 2 Phúc Tân',
					'Quận Hoàng Mai',
					'Phòng VH và TT Khu Đền Lừ 1',
					'Trung tâm VH - TDTT Ngõ 104 Nguyễn An Ninh',
					'Quận Long Biên',
					'Phòng VH và TT Số 1 Vạn Hạnh',
					'Trung tâm VH - TDTT 260 Ngọc Lâm',
					'Quận Tây Hồ',
					'Phòng VH và TT 657 Lạc Long Quân',
					'Trung tâm Văn hóa 691 Lạc Long Quân',
					'Trung tâm TDTT 101 Xuân La',
					'Quận Thanh Xuân',
					'Phòng VH và TT Số 9 Khuất Duy Tiến',
					'Trung tâm Văn hóa Ngã 3 Lê Văn Lương',
					'Trung tâm TDTT Ngã 3 Lê Văn Lương',
					'Quận Hà Đông',
					'Phòng VH và TT Hà Đông - Hà Nội',
					'Trung tâm Văn hóa, Hà Đông - Hà Nội',
					'Trung tâm TDTT 182 Phường Quang Trung',
					'Thị Xã Sơn Tây',
					'Phòng VH và TT 71 Lê Lợi',
					'Trung tâm Văn hóa Số 2 Lê Lợi',
					'Trung tâm TDTT Số 49 Nguyễn Thái Học',
					'Huyện Ba Vì',
					'Phòng VH và TT Thị trấn Tây Đằng',
					'Nhà Văn hóa Thị trấn Tây Đằng',
					'Trung tâm TDTT Thị trấn Tây Đằng',
					'Huyện Chương Mỹ',
					'Phòng VH và TT Thị trấn Chúc Sơn',
					'Trung tâm TDTT 115 Bắc Sơn',
					'Huyện Đan Phượng',
					'Phòng VH và TT Thị trấn Phùng',
					'Nhà Văn hóa Thị trấn Phùng',
					'Trung tâm TDTT Thị trấn Phùng',
					'Huyện Đông Anh',
					'Phòng VH và TT Khối 1 Thị trấn Đông Anh',
					'Nhà Văn hóa Khối 1 Thị trấn Đông Anh',
					'Trung tâm TDTT Khối 1 Thị trấn Đông Anh',
					'Huyện Gia Lâm',
					'Phòng VH và TT thị trấn Trâu Quỳ, Gia Lâm',
					'Nhà Văn hóa Trâu Quỳ, Gia Lâm',
					'Trung tâm TDTT Gia Lâm',
					'Huyện Hoài Đức',
					'Phòng VH và TT Thị trấn Trạm Trôi',
					'Nhà Văn hóa Thị trấn Trạm Trôi',
					'Trung tâm TDTT Thị trấn Trạm Trôi',
					'Huyện Mê Linh',
					'Phòng VH và TT Xã Đại Thịnh',
					'Trung tâm Văn hóa - TDTT Xã Đại Thịnh',
					'Huyện Mỹ Đức',
					'Phòng VH và TT Thị trấn Đại Nghĩa',
					'Nhà Văn hóa Thị trấn Đại Nghĩa',
					'Trung tâm TDTT Số 4 đường Đại Nghĩa',
					'Huyện Phú Xuyên',
					'Phòng VH và TT Thị trấn Phú Xuyên',
					'Nhà Văn hóa Thị trấn Phú Xuyên',
					'Trung tâm TDTT Thị trấn Phú Xuyên',
					'Huyện Phúc Thọ',
					'Phòng VH và TT Thị trấn Phúc Thọ',
					'Nhà Văn hóa thông tin Thị trấn Phúc Thọ',
					'Trung tâm TDTT Thị trấn Phúc Thọ',
					'Huyện Quốc Oai',
					'Phòng VH và TT Thị trấn Quốc Oai',
					'Trung tâm TDTT Thị trấn Quốc Oai',
					'Huyện Sóc Sơn',
					'Phòng VH và TT Núi Đôi, Sóc Sơn',
					'Nhà Văn hóa Thị trấn Sóc Sơn',
					'Trung tâm TDTT Thị trấn Sóc Sơn',
					'Huyện Thạch Thất',
					'Phòng VH và TT Thị trấn Thạch Thất',
					'Trung tâm Văn hóa Thị trấn Thạch Thất',
					'Trung tâm TDTT Thị trấn Liên Quan',
					'Huyện Thanh Oai',
					'Phòng VH và TT Thị trấn Kim Bài',
					'Nhà Văn hóa Thị trấn Kim Bài',
					'Trung tâm TDTT Thị trấn Kim Bài',
					'Huyện Thanh Trì',
					'Phòng VH và TT Văn Điển',
					'Trung tâm Văn hóa Thị trấn Văn Điển',
					'Trung tâm TDTT Thị trấn Văn Điển',
					'Huyện Thường Tín',
					'Phòng VH và TT Thị trấn Thường Tín',
					'Nhà Văn hóa Thị trấn Thường Tín',
					'Trung tâm TDTT Thị trấn Thường Tín',
					'Huyện Từ Liêm',
					'Phòng VH và TT 125 Hồ Tùng Mậu',
					'Nhà Văn hóa Xã Phú Diễn',
					'Trung tâm TDTT Xã Phú Diễn',
					'Huyện Ứng Hòa',
					'Phòng VH và TT Thị trấn Vân Đình',
					'Trung tâm TDTT Thị trấn Vân Đình'
				);
				require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
 
    			foreach ($donvi as $key => $value) {
					$newid = wp_insert_term(
					  $value, // the term 
					  'danh_ba_cat'
					);
					$_newid = $newid['term_id'];
					$db = Database::getInstance();
					$mysqli = $db->getConnection();
					$sql = "INSERT INTO `donvi` (`oldid`, `name`, `newid`) VALUES ('$key','$value','$_newid')";
					$mysqli->query( $sql );
					echo $key . ' - ' . $value . ' - ' . $newid['term_id'];
					echo '<br />';
				}
    			?>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>