<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Terms;
use App\Post;
use App\Meta;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category1 = Category::create([
        	'name' => 'Web design',
        	'slug' => 'web-design',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category2 = Category::create([
        	'name' => 'Web development',
        	'slug' => 'web-development',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category3 = Category::create([
        	'name' => 'Grapich design',
        	'slug' => 'graphic-design',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category4 = Category::create([
        	'name' => 'Mobile apps',
        	'slug' => 'mobile-apps',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category5 = Category::create([
        	'name' => 'Plugin development',
        	'slug' => 'plugin-development',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category6 = Category::create([
        	'name' => 'Marketing seo',
        	'slug' => 'marketing-seo',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category7 = Category::create([
        	'name' => 'Image editing',
        	'slug' => 'image-editing',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $category8 = Category::create([
        	'name' => 'It consultancy',
        	'slug' => 'it-consultancy',
        	'type' => 3,
        	'status' => 1,
        	'user_id' => 1
        ]);

        $service1 = Terms::create([
        	'title' => 'Product Design',
        	'slug' => 'product-design',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service1->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service1->id,
        	'preview' => 'uploads/20/04/15eaa48f44936f.png',
            'gallery' => 'uploads/product-design.png',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service1->id,
        	'category_id' => $category1->id
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service1->id,
        	'category_id' => $category2->id
        ]);

        $service2 = Terms::create([
        	'title' => 'It Management',
        	'slug' => 'it-management',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service2->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service2->id,
        	'preview' => 'uploads/20/04/25eaa4901928ad.png',
            'gallery' => 'uploads/itm.png',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service2->id,
        	'category_id' => $category3->id
        ]);
        DB::table('post_category')->insert([
            'term_id' => $service2->id,
            'category_id' => $category1->id
        ]);
        DB::table('post_category')->insert([
        	'term_id' => $service2->id,
        	'category_id' => $category4->id
        ]);


        

        // new service
        $service4 = Terms::create([
        	'title' => 'Data Security',
        	'slug' => 'data-security',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service4->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service4->id,
        	'preview' => 'uploads/20/04/35eaa490563a50.png',
            'gallery' => 'uploads/data.png',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service4->id,
        	'category_id' => $category7->id
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service4->id,
        	'category_id' => $category8->id
        ]);

        // new service
        $service5 = Terms::create([
        	'title' => 'It Consultancy',
        	'slug' => 'it-consultancy',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service5->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service5->id,
        	'preview' => 'uploads/20/04/45eaa49094d9aa.png',
            'gallery' => 'uploads/it.png',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service5->id,
        	'category_id' => $category1->id
        ]);
        DB::table('post_category')->insert([
            'term_id' => $service5->id,
            'category_id' => $category1->id
        ]);
        DB::table('post_category')->insert([
        	'term_id' => $service5->id,
        	'category_id' => $category2->id
        ]);

        // new service
        $service6 = Terms::create([
        	'title' => 'Cloude Services',
        	'slug' => 'cloude-services',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service6->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service6->id,
        	'preview' => 'uploads/20/04/55eaa490e20921.png',
            'gallery' => 'uploads/cloud.jpg',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service6->id,
        	'category_id' => $category3->id
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service6->id,
        	'category_id' => $category4->id
        ]);


         // new service
        $service7 = Terms::create([
        	'title' => 'It Support Helpdesk',
        	'slug' => 'it-support-helpdesk',
        	'auth_id' => 1,
        	'status' => 1,
        	'type' => 4
        ]);

        Post::create([
        	'term_id' => $service7->id,
        	'post_type' => 'service',
        	'content' => '{"content":"<p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We believe that technology and human-centered design are revolutionizing brand experiences. Remarkable innovations are allowing products to become more sentient and connected, enabling greater connection between people. Our role is to ensure that each product experience is attuned to people\u2019s needs and relevant to the rhythm and habits of their daily lives. Through first and secondary research, we identify what will really matter to users and we never let go of the vision that inspires great products.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Test your ideas with minimal risk. Test even the most complex ideas, involving emerging technologies \u2013 like blockchain \u2013 with the help of our expert Outsourceo team. We\u2019ll help you with predictions, roadmapping and post-PoC Development analysis, to identify the best-fit solution with minimal financial risk.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">We help companies assess their skills and choose a new direction which utilizes the talents of the team and resources most productively.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">As consumers have more and more product choices, the role of design to bring clarity and relevance has never been more necessary. Design will continue to be the significant difference maker and the reason for choosing one product or experience over another. On every product we look through the eyes of the user, studying the experience critically and empathetically. Our creative response combines strategy with execution to deliver beautiful, innovative and differentiated design.<\/p><p style=\"margin-bottom: 25px; font-size: 15px; line-height: 1.7; color: rgb(142, 143, 154); font-family: Montserrat, sans-serif;\">Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects.<\/p>","faq":{"What is Lorem Ipsum?":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).","New Need to Publish?":"Our team of software experts will provide a comprehensive project evaluation, allowing you to develop your roadmap for success that maximises the efficiency of your future projects."}}',
        	'comment_status' => 1
        ]);

        Meta::create([
        	'term_id' => $service7->id,
        	'preview' => 'uploads/20/04/65eaa49123f609.png',
            'gallery' => 'uploads/support-help-desk.png',
        	'excerpt' => 'Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. independent agency, free from the internal demands.'
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service7->id,
        	'category_id' => $category5->id
        ]);

        DB::table('post_category')->insert([
        	'term_id' => $service7->id,
        	'category_id' => $category6->id
        ]);


        



        //team
        $team = Terms::create([
            'title' => 'Md Maruf',
            'slug' => 'Project Manager',
            'auth_id' => 1,
            'status' => 1,
            'type' => 6
        ]);

         Meta::create([
            'term_id' => $team->id,
            'preview' => 'uploads/20/05/23052015902274865ec8f21ed6956.jpg',
            'excerpt' => '{"fab fa-facebook-f":"#","fab fa-twitter":"#","fab fa-instagram":"#","fab fa-linkedin-in":"#"}'
        ]);

         $team = Terms::create([
            'title' => 'Jhone Doe',
            'slug' => 'CEO,CO-FOUNDER',
            'auth_id' => 1,
            'status' => 1,
            'type' => 6
        ]);

         Meta::create([
            'term_id' => $team->id,
            'preview' => 'uploads/20/05/23052015902255735ec8eaa523a15.jpg',
            'excerpt' => '{"fab fa-facebook-f":"#","fab fa-twitter":"#","fab fa-instagram":"#","fab fa-linkedin-in":"#"}'
        ]);

        $team = Terms::create([
            'title' => 'Arafat Hossain',
            'slug' => 'Senior Developer',
            'auth_id' => 1,
            'status' => 1,
            'type' => 6
        ]);

         Meta::create([
            'term_id' => $team->id,
            'preview' => 'uploads/20/05/23052015902255725ec8eaa40e419.jpg',
            'excerpt' => '{"fab fa-facebook-f":"#","fab fa-twitter":"#","fab fa-instagram":"#","fab fa-linkedin-in":"#"}'
        ]);

        $team = Terms::create([
            'title' => 'Mohammad Maruf',
            'slug' => 'Laravel Developer',
            'auth_id' => 1,
            'status' => 1,
            'type' => 6
        ]);

         Meta::create([
            'term_id' => $team->id,
            'preview' => 'uploads/20/05/23052015902255725ec8eaa49db25.jpg',
            'excerpt' => '{"fab fa-facebook-f":"#","fab fa-twitter":"#","fab fa-instagram":"#","fab fa-linkedin-in":"#"}'
        ]);


        //testimonials 

         $testimonials = Terms::create([
            'title' => 'Emma Connor',
            'slug' => 'Jhone-Doe',
            'auth_id' => 1,
            'status' => 1,
            'type' => 5
        ]);

         Meta::create([
            'term_id' => $testimonials->id,
            'preview' => 'uploads/20/05/23052015902255725ec8eaa49db25.jpg',
            'excerpt' => '{"excerpt":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.","company_name":"Project Manager","position":"CEO"}'
        ]);

          $testimonials = Terms::create([
            'title' => 'Arafat Hossain',
            'slug' => 'Mark Zuckerberg',
            'auth_id' => 1,
            'status' => 1,
            'type' => 5
        ]);

         Meta::create([
            'term_id' => $testimonials->id,
            'preview' => 'uploads/20/05/23052015902273295ec8f1817c417.jpg',
            'excerpt' => '{"excerpt":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.","company_name":"Laravel Developer","position":"Founder"}'
        ]);

         $testimonials = Terms::create([
            'title' => 'Taylor otwell',
            'slug' => 'Taylor-otwell',
            'auth_id' => 1,
            'status' => 1,
            'type' => 5
        ]);

         Meta::create([
            'term_id' => $testimonials->id,
            'preview' => 'uploads/20/05/23052015902255725ec8eaa40e419.jpg',
            'excerpt' => '{"excerpt":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.","company_name":"Laravel Founder","position":"Founder"}'
        ]);

    }
}
