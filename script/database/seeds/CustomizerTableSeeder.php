<?php

use Illuminate\Database\Seeder;
use App\Customaizer;
use Amcoders\Plugin\zoom\models\Meeting;

class CustomizerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customaizer::create([
            'key' => 'header',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"header_left_notify":{"old_value":"Now Heirewfeww","new_value":"Now Hiring: Are you a professional Developer?"},"header_phone_number":{"old_value":"202-555-0191","new_value":"575474575"},"header_address":{"old_value":"26 Westp","new_value":"26 Westport St. Lancaster, CA 93535"},"header_logo":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd188f55b8e.png","new_value":"uploads\/2020-06-02-5ed616a25f6f4.png"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'hero',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"hero_image":{"old_value":"uploads\/2020-06-02-5ed615a1a466a.png","new_value":"uploads\/2020-06-02-5ed616ab1701e.jpg"},"hero_small_title":{"old_value":"\/\/ Only High Q","new_value":"\/\/ Only High Quality Service"},"hero_main_title":{"old_value":"SOFTWA","new_value":"SOFTWARE IT OUTSOUECING"},"hero_des":{"old_value":"We are 100+ professional software engineers with more than 10 years of experience in delivering superior products. dgdgd","new_value":"We are 100+ professional software engineers with more than 10 years of experience in delivering superior products."},"hero_button":{"old_value":"Learn More","new_value":"Learn More"},"hero_button_link":{"old_value":"#","new_value":"#"}}}',
            'status' => 1
        ]);

      

        Customaizer::create([
            'key' => 'about',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"about_small_title":{"old_value":null,"new_value":"OUR COMPANY"},"about_main_title":{"old_value":null,"new_value":"We\u2019ve been thriving in 38 years"},"about_des":{"old_value":"Mitech specializes in technological and IT-related services such as product engineering, warranty management, building cloud, infrastructure, network, etc. We put a strong focus on the needs of your business to figure out solutions that best fits your demand and nail it.","new_value":"Monkey specializes in technological and IT-related services such as product engineering, warranty management, building cloud, infrastructure, network, etc. We put a strong focus on the needs of your business to figure out solutions that best fits your demand and nail it."},"about_button":{"old_value":null,"new_value":"Join Us Now"},"about_button_link":{"old_value":null,"new_value":"#"}},"content":{"question_section_one":{"question_section_one_title":{"old_value":"How we can help your business?","new_value":"How we can help your business?"}},"":{"question_section_one_link":{"old_value":"#","new_value":"#"},"question_section_two_link":{"old_value":"#","new_value":"#"},"question_section_three_link":{"old_value":null,"new_value":"#"}},"question_section_two":{"question_section_two_title":{"old_value":null,"new_value":"Why become our partner?"}},"question_section_three":{"question_section_three_title":{"old_value":null,"new_value":"Why become our partner?"}}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'service',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"service_title":{"old_value":null,"new_value":"Professional Services"},"service_des":{"old_value":null,"new_value":"We help agencies to define their new business objectives and then create the road map"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'counter',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"counter_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd1c362a7da.jpg","new_value":"uploads\/2020-06-02-5ed617087bb25.jpg"}},"content":{"counter_first":{"counter_first_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd1ce437917.png","new_value":"uploads\/2020-06-02-5ed61712874b2.png"},"counter_first_number":{"old_value":null,"new_value":"967"},"counter_first_title":{"old_value":"AWARDS WINNING","new_value":"total AWARDS"}},"counter_second":{"counter_second_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd1d6b03eeb.png","new_value":"uploads\/2020-06-02-5ed6171bb44c9.png"},"counter_second_number":{"old_value":null,"new_value":"177"},"counter_second_title":{"old_value":null,"new_value":"Total Project"}},"counter_third":{"counter_third_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd1d8b28fce.png","new_value":"uploads\/2020-06-02-5ed6172553f26.png"},"counter_third_number":{"old_value":null,"new_value":"578"},"counter_third_title":{"old_value":null,"new_value":"Total Client"}},"counter_four":{"counter_four_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd1d935c116.png","new_value":"uploads\/2020-06-02-5ed6172e63c30.png"},"counter_four_number":{"old_value":null,"new_value":"967"},"counter_four_title":{"old_value":null,"new_value":"CUPS OF COFEE"}}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'team',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"team_title":{"old_value":null,"new_value":"Our Team"},"team_des":{"old_value":null,"new_value":"We help agencies to define their new business objectives and then create the road map"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'pricing',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"pricing_title":{"old_value":null,"new_value":"Pricing Table"},"pricing_des":{"old_value":null,"new_value":"We help agencies to define their new business objectives and then create the road map"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'testimonial',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"review_bg_image":{"old_value":null,"new_value":"uploads\/2020-06-02-5ed61a270c27e.jpg"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'blog',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"blog_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_des":{"old_value":null,"new_value":"We help agencies to define their new business objectives and then create the road map"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'footer',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"footer_bg_image":{"old_value":"uploads\/2020-06-02-5ed617536149e.png","new_value":"uploads\/2020-06-02-5ed6175a26b47.jpg"},"footer_logo":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-14-5ebd216f373d9.png","new_value":"uploads\/2020-06-02-5ed61760dc127.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."},"footer_copyright":{"old_value":null,"new_value":"Copyright @2020 Monkey. All Rights Reserved by Amcoders"},"footer_fb_link":{"old_value":null,"new_value":"#"},"footer_twitter_link":{"old_value":null,"new_value":"#"},"footer_google_link":{"old_value":null,"new_value":"#"},"footer_linkedin_link":{"old_value":null,"new_value":"#"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Find Us"},"footer_right_phone":{"old_value":null,"new_value":"+1 (321) 984 754"},"footer_right_contact_number":{"old_value":"+1 (281) 384 574","new_value":"202-555-0191"},"footer_right_email":{"old_value":"email@gmail.com","new_value":"email@example.com"},"footer_right_support_email":{"old_value":"s","new_value":"support@example.com"},"footer_right_address":{"old_value":null,"new_value":"28\/A Street, New York"}}}}',
            'status' => 1
        ]);


        Customaizer::create([
            'key' => 'breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfa3453a1d4.jpg","new_value":"uploads\/2020-06-02-5ed617e9dcfde.jpg"},"breadcrumb_title":{"old_value":null,"new_value":"About Us"},"breadcrumb_des":{"old_value":null,"new_value":"Home \/ About Us"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'about_ex',
            'theme_name' => 'monkey',
            'value' => '{"content":{"about_ex_second":{"about_ex_second_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfb71c4100c.png","new_value":"uploads\/2020-06-02-5ed617fbf2613.png"},"about_ex_second_num":{"old_value":null,"new_value":"343"},"about_ex_second_title":{"old_value":null,"new_value":"Experts Around the World"},"about_ex_second_des":{"old_value":null,"new_value":"Our vertical solutions expertise allows your business to streamline workflow, and increase productivity."}},"about_ex_first":{"about_ex_first_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-06-01-5ed522e4eb46a.png","new_value":"uploads\/2020-06-02-5ed617f502cc0.png"},"about_ex_first_num":{"old_value":null,"new_value":"232"},"about_ex_first_title":{"old_value":null,"new_value":"Valued Clients"},"about_ex_first_des":{"old_value":null,"new_value":"Our vertical solutions expertise allows your business to streamline workflow, and increase productivity."}},"about_ex_third":{"about_ex_third_title":{"old_value":"Non ut eum fugiat en","new_value":"Revenue in Last 3 Years"},"about_ex_third_num":{"old_value":"600","new_value":"500"},"about_ex_third_des":{"old_value":null,"new_value":"Our vertical solutions expertise allows your business to streamline workflow, and increase productivity."},"about_ex_third_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfb773104e3.png","new_value":"uploads\/2020-06-02-5ed618060f87a.png"}}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"quote_button":{"old_value":"get a free quote","new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'team_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"team_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfae99e9ac9.jpg","new_value":"uploads\/2020-06-02-5ed61826c3d61.jpg"},"team_breadcrumb_title":{"old_value":null,"new_value":"Team Member"},"team_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Team Member"}}}',
            'status' => 1
        ]);

      

        Customaizer::create([
            'key' => 'team_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"team_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"team_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"team_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'whychosse_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"whychosse_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfb99e2c72c.jpg","new_value":"uploads\/2020-06-02-5ed6183ea5968.jpg"},"whychosse_breadcrumb_title":{"old_value":null,"new_value":"Whychoose Us"},"whychosse_breadcrumb_des":{"old_value":"Home \/","new_value":"Home \/ Whychoose Us"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'service_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"service_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"service_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"service_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'mission_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"mission_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfba6fe382a.jpg","new_value":"uploads\/2020-06-02-5ed61853dc3e4.jpg"},"mission_breadcrumb_title":{"old_value":null,"new_value":"Our Mission"},"mission_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Our Mission"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'mission',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"mission_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfbad0bc544.jpg","new_value":"uploads\/2020-06-02-5ed6185b5bef8.jpg"},"mission_title":{"old_value":null,"new_value":"Our Mission."},"mission_des":{"old_value":"Our mission is to help customers achieve their business objectives by providing innovative, best-in-class consulting, IT solutions and services and to make it a joy for all stakeholders to work with us. We function as a full stakeholder to business, offering a consulting-led approach with an integrated portfolio of technology led solutions that encompass the entire Enterprise value chain.","new_value":"Our mission is to help customers achieve their business objectives by providing innovative, best-in-class consulting, IT solutions and services and to make it a joy for all stakeholders to work with us. We function as a full stakeholder to business, offering a consulting-led approach with an integrated portfolio of technology led solutions that encompass the entire Enterprise value chain.\n\n\nOur Customer-centric Engagement Model defines how we do engage with you, offering specialized services and solutions that meet the distinct needs of your business.We have made significant investments in Digital platforms and products spanning Technology Products, Horizontal Platforms and Products, Vertical Platforms and Products. Our Drive and Vision"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'mission_values',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"mission_values_title":{"old_value":null,"new_value":"Our Drive and Vision"},"mission_values_des":{"old_value":"Our success is built on the trust we earned from clients. We work shoulder-to- shoulder with our clients to solve complex challenges in ways that minimize business risk and maximize opportunity.\nOur Customer-centric Engagement Model defines how we do engage with you, offering specialized services and solutions that meet the distinct needs of your business.We have made significant investments in Digital platform","new_value":"Our success is built on the trust we earned from clients. We work shoulder-to- shoulder with our clients to solve complex challenges in ways that minimize business risk and maximize opportunity.\nOur Customer-centric Engagement Model defines how we do engage with you, offering specialized services and solutions that meet the distinct needs of your business.We have made significant investments in Digital platform\nOur success is built on the trust we earned from clients. We work shoulder-to- shoulder with our clients to solve complex challenges in ways that minimize business risk and maximize opportunity."},"mission_values_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfbb28540cd.jpg","new_value":"uploads\/2020-06-02-5ed618668b026.jpg"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'mission_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"mission_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"mission_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"mission_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'faq_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"faq_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfbb9046b5d.jpg","new_value":"uploads\/2020-06-02-5ed6187c53f79.jpg"},"faq_breadcrumb_title":{"old_value":"Faq Page","new_value":"Faqs"},"faq_breadcrumb_des":{"old_value":"Home \/","new_value":"Home \/ Faqs"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'faq',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"faq_title":{"old_value":null,"new_value":"Most Common FAQs"},"faq_des":{"old_value":null,"new_value":"We help agencies to define their new business objectives and then create the road map"},"faq_img":{"old_value":null,"new_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfbbca816c8.jpg"}},"content":{"faq_first":{"faq_first_question":{"old_value":null,"new_value":"What is a Managed Service Provider?"},"faq_first_answer":{"old_value":null,"new_value":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business."}},"faq_second":{"faq_second_answer":{"old_value":null,"new_value":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business."},"faq_second_question":{"old_value":null,"new_value":"What Benefits Can You Quarantee?"}},"faq_third":{"faq_third_answer":{"old_value":null,"new_value":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business."},"faq_third_question":{"old_value":null,"new_value":"How Does Managed Services Work?"}}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'faq_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"faq_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"faq_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"faq_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'contact_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"contact_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc08ec8e43.jpg","new_value":"uploads\/2020-06-02-5ed6188f33b30.jpg"},"contact_breadcrumb_title":{"old_value":null,"new_value":"Contact Us"},"contact_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Contact Us"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'contact',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"contact_title":{"old_value":null,"new_value":"Contact Us"},"contact_des":{"old_value":"dsf","new_value":"We help agencies to define their new business objectives and then create the road map"},"contact_button_label":{"old_value":"Send Messag","new_value":"Send Message"}}}',
            'status' => 1
        ]);


        Customaizer::create([
            'key' => 'shop_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"shop_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc2c368083.jpg","new_value":"uploads\/2020-06-02-5ed618ac8ba5c.jpg"},"shop_breadcrumb_title":{"old_value":"Shop List","new_value":"Product List"},"shop_breadcrumb_des":{"old_value":"Home \/ Shop List","new_value":"Home \/ Product List"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'shop_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"shop_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"shop_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"shop_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'cart_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"cart_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc3025aa88.jpg","new_value":"uploads\/2020-06-02-5ed618d17a81d.jpg"},"cart_breadcrumb_title":{"old_value":null,"new_value":"Shopping Cart"},"cart_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Shopping Cart"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'cart_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"cart_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"cart_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"cart_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'cart',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"cart_title":{"old_value":null,"new_value":"Shopping Cart"},"cart_shopping_title":{"old_value":null,"new_value":"Continue Shopping"},"checkout_title":{"old_value":null,"new_value":"Checkout"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'checkout_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"checkout_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc3ca3a958.jpg","new_value":"uploads\/2020-06-02-5ed618fc26d0a.jpg"},"checkout_breadcrumb_title":{"old_value":null,"new_value":"Checkout"},"checkout_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Checkout"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'checkout',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"billing_title":{"old_value":null,"new_value":"Billing Information"},"order_title":{"old_value":"Order","new_value":"Your Order"},"order_button_name":{"old_value":"Procced","new_value":"Proceed to Checkout"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'checkout_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"checkout_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"checkout_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"checkout_quote_button":{"old_value":null,"new_value":"get a free Quote!"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'service_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"service_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc94e27b87.jpg","new_value":"uploads\/2020-06-02-5ed6192bbc8f7.jpg"},"service_breadcrumb_title":{"old_value":null,"new_value":"Service List"},"service_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Service list"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'sidebar',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"sidebar_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfc968a546d.jpg","new_value":"uploads\/2020-06-02-5ed619336364e.jpg"},"sidebar_title":{"old_value":null,"new_value":"Questions? Contact One of Our Agents"},"sidebar_first_phone":{"old_value":null,"new_value":"+6556566541565"},"sidebar_second_phone":{"old_value":null,"new_value":"+024984559559"},"sidebar_email":{"old_value":null,"new_value":"support@gmail.com"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'blog_breadcrumb',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"blog_breadcrumb_bg_img":{"old_value":"script\/am-content\/Themes\/monkey\/public\/uploads\/2020-05-16-5ebfca2499a46.jpg","new_value":"uploads\/2020-06-02-5ed619471b7b3.jpg"},"blog_breadcrumb_title":{"old_value":null,"new_value":"Blog List"},"blog_breadcrumb_des":{"old_value":null,"new_value":"Home \/ Blog list"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'blog_quote',
            'theme_name' => 'monkey',
            'value' => '{"settings":{"blog_quote_title":{"old_value":null,"new_value":"Here to Help Your Every Business Need."},"blog_quote_description":{"old_value":null,"new_value":"We focus on the IT solutions, so you can focus on your business. See what we can do for you today!"},"blog_quote_button":{"old_value":null,"new_value":"get a free quote!"}}}',
            'status' => 1
        ]);

        Meeting::create([
            'title' => 'Demo Metting',
            'meeting_id' => 79334224052,
            'status' => 'waiting',
            'host_id' => "eFHHqA3wTEibbLzAoom5Wg",
            'duration' => 80,
            'start_time' => "2020-06-30T22:06:49Z",
            'password' => 1234532
        ]);

        DB::table('meeting_user')->insert([
            'meeting_id' => 1,
            'user_id' => 2
        ]);


        Customaizer::create([
            'key' => 'portfolio_header',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"logo":{"old_value":null,"new_value":"uploads\/2020-08-11-5f32276e228fc.png"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'portfolio_hero',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"hero_bg_img":{"old_value":null,"new_value":"uploads\/2020-08-11-5f327115b8da0.jpg"},"hello_title":{"old_value":null,"new_value":"Hello"},"hero_first_title":{"old_value":null,"new_value":"I am"},"hero_des":{"old_value":null,"new_value":"Arafat Hossain. | Web Developer."},"button_first":{"old_value":null,"new_value":"Hire Me"},"button_first_link":{"old_value":null,"new_value":"\/"},"button_secound":{"old_value":null,"new_value":"See my portfolio"},"button_secound_link":{"old_value":null,"new_value":"\/"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'portfolio_about',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"about_bg_title":{"old_value":"Who I am","new_value":"Who Am I"},"about_title":{"old_value":null,"new_value":"About"},"about_bg_img":{"old_value":null,"new_value":"uploads\/2020-08-11-5f3243b7bdc6f.jpg"},"about_right_title":{"old_value":null,"new_value":"Hi, I am AXEL ROD"},"about_des":{"old_value":null,"new_value":"This is a long established fact that a reader will be distracted by the their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes model text, and a search for lorem ipsum their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."},"your_name":{"old_value":"Name: Alex","new_value":"Name : Axel Rod"},"your_email":{"old_value":null,"new_value":"Email : axel@example.com"},"your_phone":{"old_value":null,"new_value":"Phone : +123 456-7890"},"your_job":{"old_value":null,"new_value":"Job : Freelancer"},"your_location":{"old_value":null,"new_value":"From : Italy"},"your_age":{"old_value":null,"new_value":"Age : 30"}}}',
            'status' => 1
        ]);

         Customaizer::create([
            'key' => 'portfolio_service',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"service_bg_title":{"old_value":"What I Do","new_value":"What I Do"},"service_title":{"old_value":"Services","new_value":"My Services"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'resume_id',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"resume_background_title":{"old_value":"Re","new_value":"Qualification"},"resume_title":{"old_value":null,"new_value":"Resume"},"education_title":{"old_value":null,"new_value":"Education"},"experience_title":{"old_value":null,"new_value":"Experience"},"skill_title":{"old_value":null,"new_value":"My Skills"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'portfolio_section',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"portfolio_bg_title":{"old_value":null,"new_value":"My Work"},"portfolio_title":{"old_value":null,"new_value":"Portfolio"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'review_section',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"review_bg_title":{"old_value":null,"new_value":"Feedback"},"review_title":{"old_value":null,"new_value":"Client"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'portfolio_contact',
            'theme_name' => 'portfolio',
            'value' => '{"content":{"contact_first_section":{"contact_first_section_title":{"old_value":"ddfdf","new_value":"Call Me On"},"contact_first_section_phone":{"old_value":"4564643634","new_value":"+985 123 7856"}},"":{"contact_first_section_icon":{"old_value":"fas fa-mobile-alt","new_value":"fas fa-mobile-alt"}},"contact_secound_section":{"contact_secound_section_title":{"old_value":null,"new_value":"Email Me At"},"contact_secound_section_email":{"old_value":null,"new_value":"decord@example.com"}},"contact_third_section":{"contact_third_section_title":{"old_value":null,"new_value":"Visit Office"},"contact_third_section_location":{"old_value":null,"new_value":"132, Gauchia Street, Florida"}},"portfolio_contact_third_section":{"portfolio_contact_third_section_title":{"old_value":null,"new_value":"dfgfg"},"portfolio_contact_third_section_location":{"old_value":null,"new_value":"fgfg"}}},"settings":{"contact_bg_title":{"old_value":null,"new_value":"Get In Touch"},"contact_title":{"old_value":null,"new_value":"Contact Me"},"contact_btn":{"old_value":null,"new_value":"Save"}}}',
            'status' => 1
        ]);

        Customaizer::create([
            'key' => 'portfolio_footer',
            'theme_name' => 'portfolio',
            'value' => '{"settings":{"portfolio_copyright":{"old_value":null,"new_value":"\u00a9 2020 Amcoders. All right reserved."},"portfolio_facebook":{"old_value":null,"new_value":"#"},"portfolio_twitter":{"old_value":null,"new_value":"#"},"portfolio_linkedin":{"old_value":null,"new_value":"#"},"portfolio_instagram":{"old_value":null,"new_value":"#"}}}',
            'status' => 1
        ]);

    }
}
