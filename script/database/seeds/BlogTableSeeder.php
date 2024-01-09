<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Meta;
use App\Terms;
use App\Category;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
        	'name' => 'Engine Repair',
        	'slug' => 'engine-repair',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category2 = Category::create([
        	'name' => 'Tires Replacement',
        	'slug' => 'tires-replacement',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category3 = Category::create([
        	'name' => 'Transmission',
        	'slug' => 'transmission',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category4 = Category::create([
        	'name' => 'Diagnostic',
        	'slug' => 'diagnostic',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category5 = Category::create([
        	'name' => 'Bateries Replacement',
        	'slug' => 'bateries-replacement',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category6 = Category::create([
        	'name' => 'Break Repair',
        	'slug' => 'break-repair',
        	'type' => 0,
        	'status' => 1,
        	'user_id' => 1
        ]);

      	// new post create
      	$post1 = Terms::create([
      		'title' => 'Soccer completed successfully',
      		'slug' => 'soccer-completed-successfully',
      		'tags' => 'bussiness,agency,startup,marketing',
      		'auth_id' => 1,
      		'status' => 1,
      		'type' => 0
      	]);

      	Meta::create([
      		'term_id' => $post1->id,
      		'preview' => 'uploads/20/05/30052015908298135ed222f548f53.jpg',
      		'gallery' => 'uploads/20/05/30052015908298135ed222f548f53.jpg,uploads/20/04/135eaa5dcf3ebf0.jpg',
      		'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page.'
      	]);

      	Post::create([
      		'term_id' => $post1->id,
      		'post_type' => 'blog',
      		'content' => '<p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>'
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post1->id,
      		'category_id' => $category1->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post1->id,
      		'category_id' => $category4->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post1->id,
      		'category_id' => $category3->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post1->id,
      		'category_id' => $category5->id
      	]);


      	// new post create
      	$post2 = Terms::create([
      		'title' => 'Top Resuslt Holder 2020',
      		'slug' => 'top-resuslt-holder-2020',
      		'tags' => 'agency,startup,marketing,seo',
      		'auth_id' => 1,
      		'status' => 1,
      		'type' => 0
      	]);

      	Meta::create([
      		'term_id' => $post2->id,
      		'preview' => 'uploads/20/05/30052015908298095ed222f1c3912.jpg',
      		'gallery' => 'uploads/20/04/155eaa5e234bb78.jpg,uploads/20/05/30052015908298095ed222f1c3912.jpg,uploads/20/04/135eaa5dcf3ebf0.jpg',
      		'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page.'
      	]);

      	Post::create([
      		'term_id' => $post2->id,
      		'post_type' => 'blog',
      		'content' => '<p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>'
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post2->id,
      		'category_id' => $category2->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post2->id,
      		'category_id' => $category4->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post2->id,
      		'category_id' => $category3->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post2->id,
      		'category_id' => $category6->id
      	]);

      	// new post create
      	$post3 = Terms::create([
      		'title' => 'Leaning About Virus COVID-19',
      		'slug' => 'leaning-about-virus-COVID-19',
      		'tags' => 'agency,startup,marketing,seo',
      		'auth_id' => 1,
      		'status' => 1,
      		'type' => 0
      	]);

      	Meta::create([
      		'term_id' => $post3->id,
      		'preview' => 'uploads/20/05/30052015908298045ed222ecb0fcc.jpg',
      		'gallery' => 'uploads/20/04/155eaa5e234bb78.jpg,uploads/20/04/125eaa5e172f813.jpg,uploads/20/05/30052015908298045ed222ecb0fcc.jpg',
      		'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page.'
      	]);

      	Post::create([
      		'term_id' => $post3->id,
      		'post_type' => 'blog',
      		'content' => '<p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p style="font-size: 15px; line-height: 1.8; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>'
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post3->id,
      		'category_id' => $category1->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post3->id,
      		'category_id' => $category2->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post3->id,
      		'category_id' => $category3->id
      	]);

      	DB::table('post_category')->insert([
      		'term_id' => $post3->id,
      		'category_id' => $category4->id
      	]);

    }
}
