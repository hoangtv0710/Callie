<?php

use Illuminate\Database\Seeder;
use App\SubCategory;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
       
        if (DB::table('posts')->count() == 0) {
    		DB::table('posts')->insert([
    			[
    				'title' => $title = 'Vợ sắp cưới của Hồ Gia Hùng ám chỉ Titi hẹn hò với Nhật Kim Anh 5 năm',
                    'slug' =>  str_slug($title),
                    'image' => 'post_1.jpg',
                    'description' => 'Không e ngại sự tranh cãi gay gắt từ phía dư luận mà người phụ nữ bên cạnh Hồ Gia Hùng có vẻ cũng ủng hộ cách ứng xử của nam ca sĩ.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
    			],
    			[
    				'title' => $title = 'Cuộc sống của Hoa hậu Đại dương: Người sinh đôi, người làm giảng viên',
                    'slug' =>  str_slug($title),
                    'image' => 'post_2.jpg',
                    'description' => 'Lê Âu Ngân Anh, Đặng Thu Thảo, Ann Võ ngày càng xinh đẹp và hạnh phúc với mỗi lựa chọn riêng của mình.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Mỹ nhân Việt "đụng hàng" váy áo chục triệu với sao Hàn',
                    'slug' =>  str_slug($title),
                    'image' => 'post_3.jpg',
                    'description' => 'Rất nhiều mỹ nhân Việt như: Đông Nhi - Hà Hồ - Min.., đã vô tình kèn cựa với sao Hàn khi "đụng độ" váy áo "đắt xắt ra miếng".',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
    			],
    			[
    				'title' => $title = 'Trấn Thành lên tiếng khi bị chê bai không phù hợp làm MC Rap Việt',
                    'slug' =>  str_slug($title),
                    'image' => 'post_4.jpg',
                    'description' => 'Ông xã Hari Won không trốn tránh mà vài ngày qua anh đã đọc hết những nhận xét của mọi người và nhanh chóng có động thái.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Minh Tú diện đồ sale, thả dáng như chụp ảnh tạp chí ở khu cách ly',
                    'slug' =>  str_slug($title),
                    'image' => 'post_5.jpg',
                    'description' => 'Minh Tú hòa nhập rất nhanh khi ở khu cách ly, sau muôn kiểu tạo dáng đo thân nhiệt cô đã có những shoot hình tử tế đầu tiên tại đây.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Hồ Ngọc Hà ủng hộ 185.000 khẩu trang y tế cho Đà Nẵng chống dịch',
                    'slug' =>  str_slug($title),
                    'image' => 'post_6.jpg',
                    'description' => 'Là một trong những nghệ sĩ đi làm từ thiện, mới đây Hồ Ngọc Hà ủng hộ hơn 180 nghìn khẩu trang y tế cho thành phố Đà Nẵng chống dịch Covid.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Minh Luân lặng lẽ viếng đám tang diễn viên trẻ qua đời trong mùa dịch',
                    'slug' =>  str_slug($title),
                    'image' => 'post_7.jpg',
                    'description' => 'Sự ra đi mãi mãi của Kim Ngân khiến nhiều thầy cô, bạn bè không khỏi hoang mang và ngỡ ngàng. Họ không tin đây là sự thật.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Thí sinh HHVN 2K1 Phù Bảo Nghi: Đỗ ba trường Đại học ở Mỹ',
                    'slug' =>  str_slug($title),
                    'image' => 'post_8.jpg',
                    'description' => 'Phù Bảo Nghi nhanh chóng được dự đoán là một trong những đối thủ đáng gờm nhất cho chiếc vương miện năm nay.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = '2 nữ chính "nhọ" nhất "Người ấy là ai": Khánh Vân, em gái Hoàng Thùy',
                    'slug' =>  str_slug($title),
                    'image' => 'post_9.jpg',
                    'description' => 'Sau 13 tập phát sóng của "Người ấy là ai" mùa 3, có thể nói nữ chính "nhọ" nhất chương trình thuộc về: diễn viên Khánh Vân, em gái Á hậu Hoàng Thùy.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 1,
                    'subcate_id' => 1,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Bộ ảnh cưới để đời của cặp đôi trẻ thành hôn đúng mùa mưa bão lụt lội',
                    'slug' =>  str_slug($title),
                    'image' => 'post_10.jpg',
                    'description' => 'Những tấm hình ghi lại khoảnh khắc “siêu nhây” của cả cô dâu chú rể lẫn dàn khách mời tham gia lễ cưới giữa mùa mưa bão đã gây chú ý trên khắp các diễn đàn trẻ.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Xúc động chàng trai mỉm cười bên mộ bạn gái đã mất',
                    'slug' =>  str_slug($title),
                    'image' => 'post_11.jpg',
                    'description' => 'Trong tình yêu, không ai nói trước được những mất mát nhưng cách chàng trai này đối diện với người bạn gái đã mất của mình đã khiến nhiều người cảm động.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Rủ cô gái đi chơi tối không được, du học sinh đòi tiền cốc sữa chua',
                    'slug' =>  str_slug($title),
                    'image' => 'post_12.jpg',
                    'description' => '"Trên đời tưởng có anh đòi cốc nước mía 10 ngàn đồng đã kinh, giờ gặp anh cốc sữa chua 35 ngàn đồng mà không sang hơn được miếng nào cả", 1 dân mạng mỉa mai.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Phụ vợ bỏ con, đại gia cùng dàn tình nhân đều phải nhận trái đắng',
                    'slug' =>  str_slug($title),
                    'image' => 'post_13.jpg',
                    'description' => 'Phụ bạc người vợ đầu gối tay ấp để đến với những cô tình nhân trẻ trung, xinh đẹp, vị đại gia Đài Loan và kẻ thứ ba đều phải nhận lấy kết cục cay đắng.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Rủ đi nhà nghỉ không thành, thanh niên đòi 10 nghìn đồng nước mía',
                    'slug' =>  str_slug($title),
                    'image' => 'post_14.jpg',
                    'description' => 'Rủ cô gái lần đầu hẹn hò đi nhà nghỉ không thành, thanh niên lật mặt chê bai còn đòi lại 10 nghìn đồng tiền nước mía.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
                [
    				'title' => $title = 'Thanh niên "bóc phốt" nhan sắc bạn gái yêu qua mạng gây tranh cãi',
                    'slug' =>  str_slug($title),
                    'image' => 'post_15.jpg',
                    'description' => 'Hết nói bạn gái yêu qua mạng ngoài đời nhan sắc kém thu hút lại có hành động kém duyên ngày đầu hẹn gặp, chàng thanh niên đã khiến CĐM tranh cãi.',
                    'content' => $faker->paragraph(20),
                    'cate_id' => 2,
                    'subcate_id' => 2,
                    'author' => 'Admin',
                    'status' => 1,
                    'views' => rand(1,999),
                    'created_at' => $datetime,
                ],
    		]);
    	}
    }
}
