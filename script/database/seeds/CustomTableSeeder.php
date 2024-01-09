<?php

use Illuminate\Database\Seeder;
use App\Terms;
use App\Productmeta;
use App\Post;

class CustomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Terms::create([
        	'title' => 'Startup',
        	'slug' => 'startup',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 2,
        	'count' => 0
        ]);

        DB::table('meta')->insert([
        	'term_id' => 1,
        	'excerpt' => '{"duration":"Per Month","link":null,"service":["Social Market Research","Business Loan Solutions","Business & Financial Analysing","Product Branding","Industry Growth"],"active":"active"}'
        ]);

        Productmeta::create([
        	'term_id' => 1,
        	's_price' => 10,
        	'p_price' => 15
        ]);

        Terms::create([
        	'title' => 'Professional',
        	'slug' => 'professional',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 2,
        	'count' => 0
        ]);

        DB::table('meta')->insert([
        	'term_id' => 2,
        	'excerpt' => '{"duration":"Per Month","link":null,"service":["Social Market Research","Business Loan Solutions","Business & Financial Analysing","Product Branding","Industry Growth"],"active":"active"}'
        ]);

        Productmeta::create([
        	'term_id' => 2,
        	's_price' => 29,
        	'p_price' => 39
        ]);

        Terms::create([
        	'title' => 'Business',
        	'slug' => 'business',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 2,
        	'count' => 0
        ]);

        DB::table('meta')->insert([
        	'term_id' => 3,
        	'excerpt' => '{"duration":"Per Month","link":null,"service":["Social Market Research","Business Loan Solutions","Business & Financial Analysing","Product Branding","Industry Growth"],"active":"active"}'
        ]);

        Productmeta::create([
        	'term_id' => 3,
        	's_price' => 39,
        	'p_price' => 59
        ]);



        //product data seed
      	DB::table('categories')->insert([
        	'name' => 'Sport',
        	'slug' => 'sport',
        	'type' => 2,
        	'user_id' => 1
        ]);

        DB::table('categories')->insert([
        	'name' => 'Fashion',
        	'slug' => 'fashion',
        	'type' => 2,
        	'user_id' => 1
        ]);

        Terms::create([
        	'title' => 'Black Shoes Men',
        	'slug' => 'black-shoes-men',
        	'tags' => "ecommerce,arafat",
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 3,
        	'count' => 0
        ]);

        DB::table('meta')->insert([
        	'term_id' => 4,
        	'preview' => 'uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
        	'gallery' => 'uploads/20/05/q9lj5wwuse5eacf32f77269.jpg,uploads/20/05/4fcheqbzzu5eacefb2d8024.jpg,uploads/20/05/uymizolyqt5eacefc66d588.jpg',
        	'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Post::create([
            'term_id' => 4,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

        Productmeta::create([
        	'term_id' => 4,
        	's_price' => 247,
        	'p_price' => 280,
        	'qty' => 25,
        	'stock_status' => 'In stock'
        ]);

         DB::table('post_category')->insert([
        	'term_id' => 4,
        	'category_id' => 2
        ]);

        DB::table('post_category')->insert([
        	'term_id' => 4,
        	'category_id' => 3
        ]);

        //second product data seed
        Terms::create([
            'title' => 'Digital camera',
            'slug' => 'digital-camera',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);


         Post::create([
            'term_id' => 5,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

        DB::table('meta')->insert([
            'term_id' => 5,
            'preview' => 'uploads/20/05/g55ice3s0g-15eacfb04ad351.png',
            'gallery' => 'uploads/20/05/g55ice3s0g-15eacfb04ad351.png,uploads/20/05/rpdvs8jd2q-1-15eacf8ee7ad2e.png,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => 5,
            's_price' => 850,
            'p_price' => 680,
            'qty' => 80,
            'stock_status' => 'In stock'
        ]);

         DB::table('post_category')->insert([
            'term_id' => 5,
            'category_id' => 3
        ]);

        DB::table('post_category')->insert([
            'term_id' => 5,
            'category_id' => 2
        ]);

        //third product data seed
        Terms::create([
            'title' => 'Pink Shoes Men',
            'slug' => 'pink-shoes-men',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => 6,
            'preview' => 'uploads/20/05/uymizolyqt5eacefc66d588.jpg',
            'gallery' => 'uploads/20/05/uymizolyqt5eacefc66d588.jpg,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => 6,
            's_price' => 550,
            'p_price' => 798,
            'qty' => 75,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => 6,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => 6,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => 6,
            'category_id' => 3
        ]);


        //four product data seed
        $product1 = Terms::create([
            'title' => 'LeCoultre Watch',
            'slug' => 'leCoultre-watch',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product1->id,
            'preview' => 'uploads/20/05/tkzhwjmbej-15ead0bccd9f41.png',
            'gallery' => 'uploads/20/05/tkzhwjmbej-15ead0bccd9f41.png,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product1->id,
            's_price' => 250,
            'p_price' => 300,
            'qty' => 90,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product1->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product1->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product1->id,
            'category_id' => 3
        ]);


         //five product data seed
        $product2 = Terms::create([
            'title' => 'Salon chair',
            'slug' => 'salon-chair',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product2->id,
            'preview' => 'uploads/20/05/rpdvs8jd2q-1-15ead0cf854e83.png',
            'gallery' => 'uploads/20/05/rpdvs8jd2q-1-15ead0cf854e83.png,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product2->id,
            's_price' => 350,
            'p_price' => 570,
            'qty' => 60,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product2->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product2->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product2->id,
            'category_id' => 3
        ]);


         //six product data seed
        $product3 = Terms::create([
            'title' => 'Audio Headphone',
            'slug' => 'audio-headphone',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product3->id,
            'preview' => 'uploads/20/05/4fcheqbzzu5ead0d0be29e4.jpg',
            'gallery' => 'uploads/20/05/4fcheqbzzu5ead0d0be29e4.jpg,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product3->id,
            's_price' => 680,
            'p_price' => 850,
            'qty' => 20,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product3->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product3->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product3->id,
            'category_id' => 3
        ]);


         //seven product data seed
        $product4 = Terms::create([
            'title' => 'Pink Shoes Women',
            'slug' => 'pink-shoes-women',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product4->id,
            'preview' => 'uploads/20/05/nwjivtkvwc5ead11584888a.jpg',
            'gallery' => 'uploads/20/05/nwjivtkvwc5ead11584888a.jpg,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product4->id,
            's_price' => 960,
            'p_price' => 999,
            'qty' => 20,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product4->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product4->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product4->id,
            'category_id' => 3
        ]);


         //eight product data seed
        $product5 = Terms::create([
            'title' => 'Women Watch',
            'slug' => 'women-women',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product5->id,
            'preview' => 'uploads/20/05/djfbixre1e5ead115f00515.jpg',
            'gallery' => 'uploads/20/05/djfbixre1e5ead115f00515.jpg,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product5->id,
            's_price' => 214,
            'p_price' => 365,
            'qty' => 70,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product5->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product5->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product5->id,
            'category_id' => 3
        ]);


         //nine product data seed
        $product6 = Terms::create([
            'title' => 'Digital HandWatch',
            'slug' => 'digital-handWatch',
            'tags' => "ecommerce,arafat",
            'auth_id' => 1,
            'status' => 1,
            'type' => 3,
            'count' => 0
        ]);

        DB::table('meta')->insert([
            'term_id' => $product6->id,
            'preview' => 'uploads/20/05/yb565mvmlg-15ead11c5375b3.png',
            'gallery' => 'uploads/20/05/yb565mvmlg-15ead11c5375b3.png,uploads/20/05/ec4w0uhscb5eacf5bd71665.jpg,uploads/20/05/q9lj5wwuse5eacf32f77269.jpg',
            'excerpt' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable.'
        ]);

        Productmeta::create([
            'term_id' => $product6->id,
            's_price' => 652,
            'p_price' => 850,
            'qty' => 80,
            'stock_status' => 'In stock'
        ]);

         Post::create([
            'term_id' => $product6->id,
            'post_type' => 'ecommerce',
            'content' => '{"content":"<p>Lorem ispum&nbsp;<span style=\"font-family: Montserrat, sans-serif; font-size: 1rem;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\/span><\/p><p><span style=\"color: rgb(126, 126, 126); font-family: Montserrat, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\/span><\/p>","information":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."}'
        ]);

         DB::table('post_category')->insert([
            'term_id' => $product6->id,
            'category_id' => 2
        ]);

        DB::table('post_category')->insert([
            'term_id' => $product6->id,
            'category_id' => 3
        ]);
    }
}
