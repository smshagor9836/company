<?php

use Illuminate\Database\Seeder;
use App\Menu;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$url=url('/');

        Menu::create([
        	"name"=>"Header",
        	"position"=>"Header",
        	"data"=> '[{"text":"Home","href":"'.$url.'","icon":"","target":"_self","title":""},{"text":"Company","href":"#","icon":"fas fa-angle-down","target":"_self","title":"","children":[{"text":"About Us","href":"'.$url.'/about","icon":"empty","target":"_self","title":""},{"text":"Team","href":"'.$url.'/team","icon":"empty","target":"_self","title":""},{"text":"Why Choose Us","href":"'.$url.'/whychoose","icon":"empty","target":"_self","title":""},{"text":"Missions & Value","href":"'.$url.'/mission","icon":"empty","target":"_self","title":""},{"text":"Faq","href":"'.$url.'/faq","icon":"empty","target":"_self","title":""},{"text":"Contact Us","href":"'.$url.'/contact","icon":"empty","target":"_self","title":""}]},{"text":"Our Service","href":"'.$url.'/service","icon":"empty","target":"_self","title":""},{"text":"Shop","href":"'.$url.'/shop","icon":"empty","target":"_self","title":""},{"text":"Blog","href":"'.$url.'/blog","icon":"empty","target":"_self","title":""},{"text":"Client Area","icon":"fas fa-angle-down","href":"#","target":"_self","title":"","children":[{"text":"Login","icon":"empty","href":"'.$url.'/login","target":"_self","title":""},{"text":"Register","icon":"empty","href":"'.$url.'/register","target":"_self","title":""}]}]',
        	"lang"=>"en",
        	"status"=>1,
        ]);
       
        Menu::create([
        	"name"=>"Header",
        	"position"=>"Header",
        	"data"=>'[{"text":"Ev","href":"'.$url.'","icon":"","target":"_self","title":""},{"text":"şirket","href":"#","icon":"fas fa-angle-down","target":"_self","title":"","children":[{"text":"Hakkımızda","href":"'.$url.'/about","icon":"empty","target":"_self","title":""},{"text":"Takım","href":"'.$url.'/team","icon":"empty","target":"_self","title":""},{"text":"Neden Bizi Tercih","href":"'.$url.'/whychoose","icon":"empty","target":"_self","title":""},{"text":"misyonları","href":"'.$url.'/mission","icon":"empty","target":"_self","title":""},{"text":"soru","href":"'.$url.'/faq","icon":"empty","target":"_self","title":""},{"text":"Bize Ulaşın","href":"'.$url.'/contact","icon":"empty","target":"_self","title":""}]},{"text":"Servisimiz","href":"'.$url.'/service","icon":"empty","target":"_self","title":""},{"text":"Dükkan","href":"'.$url.'/shop","icon":"empty","target":"_self","title":""},{"text":"Blog","href":"'.$url.'/blog","icon":"empty","target":"_self","title":""},{"text":"Müşteri Alanı","icon":"fas fa-angle-down","href":"#","target":"_self","title":"","children":[{"text":"oturum aç","icon":"empty","href":"'.$url.'/login","target":"_self","title":""},{"text":"Kayıt ol","icon":"empty","href":"'.$url.'/register","target":"_self","title":""}]}]',
        	"lang"=>"tr",
        	"status"=>1,
        ]);
        Menu::create([
        	"name"=>"Support Links",
        	"position"=>"footer_left",
        	"data"=>'[{"text":"Support","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"Forum","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"Contact Us","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"Technical Support","icon":"fas fa-angle-right","href":"#","target":"_self","title":""},{"text":"Others","icon":"fas fa-angle-right","href":"#","target":"_self","title":""}]',
        	"lang"=>"en",
        	"status"=>1,
        ]);
      
        Menu::create([
        	"name"=>"Destek Bağlantıları",
        	"position"=>"footer_left",
        	"data"=>'[{"text":"Destek","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"forum","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"İletişim","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"Teknik Destek","icon":"fas fa-angle-right","href":"#","target":"_self","title":""},{"text":"diğer","icon":"fas fa-angle-right","href":"#","target":"_self","title":""}]',
        	"lang"=>"tr",
        	"status"=>1,
        ]);
        Menu::create([
        	"name"=>"Quick Links",
        	"position"=>"footer_right",
        	"data"=>'[{"text":"Blog","icon":"fas fa-angle-right","href":"'.$url.'/blog","target":"_self","title":""},{"text":"Services","icon":"fas fa-angle-right","href":"'.$url.'/service","target":"_self","title":""},{"text":"Site Map","icon":"fas fa-angle-right","href":"#","target":"_self","title":""},{"text":"Faqs","icon":"fas fa-angle-right","href":"'.$url.'/faq","target":"_self","title":""},{"text":"About","icon":"fas fa-angle-right","href":"'.$url.'/about","target":"_self","title":""}]',
        	"lang"=>"en",
        	"status"=>1,
        ]);
        
        Menu::create([
        	"name"=>"Hızlı Linkler",
        	"position"=>"footer_right",
        	"data"=>'[{"text":"Blog","href":"'.$url.'/blog","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"hizmet","href":"'.$url.'/service","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"site haritası","href":"#","icon":"fas fa-angle-right","target":"_self","title":""},{"text":"Faqs","icon":"fas fa-angle-right","href":"#","target":"_self","title":""},{"text":"hakkında","icon":"fas fa-angle-right","href":"#","target":"_self","title":""}]',
        	"lang"=>"tr",
        	"status"=>1,
        ]);
    }
}
