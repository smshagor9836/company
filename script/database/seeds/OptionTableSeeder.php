<?php

use Illuminate\Database\Seeder;
use App\Options;
class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Options::create([
        'key'=>'system_basic_info',
        'value'=>'{"copyright":"copyright amcoders 2020","contact_address":"Agrabad chittagong","contact_email":"email@email.com","contact_phone":"0123456789","propertyid":"","facebook":"https:\/\/www.facebook.com\/amcoders\/","instagram":"https:\/\/www.instagram.com","twitter":"https:\/\/www.twitter.com","googleplus":"https:\/\/www.googleplus.com","youtube":"https:\/\/www.twitter.com","linkedin":"https:\/\/www.linkedin.com1","logo":"\/uploads\/20\/05\/logo.png","favicon":"\/uploads\/20\/05\/favicon.png","gallary_input":"\/uploads\/20\/05\/5ec6cde2737852105201590087138.png,\/uploads\/20\/05\/5ec6cde11cefb2105201590087137.png,\/uploads\/20\/05\/5ec6cddf3a6f12105201590087135.png,\/uploads\/20\/05\/5ec6cdddd7c0d2105201590087133.png,\/uploads\/20\/05\/5ec6cddc83ad62105201590087132.png,\/uploads\/20\/05\/5ec6cddb2791c2105201590087131.png,\/uploads\/20\/05\/5ec6cdd9c21982105201590087129.png,\/uploads\/20\/05\/5ec6cdd7e2b792105201590087127.png,\/uploads\/20\/05\/5ec6cdd6915e32105201590087126.png,\/uploads\/20\/05\/5ec6cdd53a5802105201590087125.png,\/uploads\/20\/05\/5ec6cdd3d498d2105201590087123.png,\/uploads\/20\/05\/5ec6cdb835eed2105201590087096.png"}',
       ]);
       Options::create([
        'key'=>'seo',
        'value'=>'{"title":"LPress","description":null,"canonical":null,"tags":null,"twitterTitle":null}',
       ]);
       Options::create([
        'key'=>'langlist',
        'value'=>'{"English":"en","Turkish":"tr"}',
       ]);
       Options::create([
        'key'=>'disqus_comment',
        'value'=>null,
       ]);
       Options::create([
        'key'=>'lp_imagesize',
        'value'=>'[]',
       ]);
       Options::create([
        'key'=>'lp_filesystem',
        'value'=>'{"compress":5,"system_type":"local","system_url":null}',
       ]);
       Options::create([
        'key'=>'lp_perfomances',
        'value'=>'{"lazyload":0,"image":"uploads\/lazy.png"}',
       ]);

       Options::create([
        'key'=>'ecommerce',
        'value'=>'{"shipping":"10","icon":"fas fa-dollar-sign","currency":"USD","tax":"0"}',
       ]);
       Options::create([
        'key'=>'faq',
        'value'=> '{"title":"Most Common FAQs","excerpt":"We help agencies to define their new business objectives and then create the road map.","faq":{"What is a Managed Service Provider?":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business.","How Does Managed Services Work?":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business.","What Benefits Can You Quarantee?":"In the information technology world, a Managed Service Provider is company that provides partially or fully outsourced IT Support and management as a service (MaaS). When they managed all IT Support Management roles, they can handle any technology needs of a business."},"image":"uploads/20/05/30052015908315615ed229c915cfa.jpg","banner":"\/uploads\/20\/05\/5ec65d8e809d12105201590058382.png"}',
       ]);

       Options::create([
        'key'=>'faq',
        'value'=> '{"title":"Lorem Ipsum Nedir?","excerpt":"Ajansların yeni iş hedeflerini tanımlamalarına ve ardından yol haritasını oluşturmalarına yardımcı oluyoruz.","faq":{"Yönetilen Servis Sağlayıcı nedir?":"Lorem Ipsum, dizgi ve bask\u0131 end\u00fcstrisinde kullan\u0131lan m\u0131g\u0131r metinlerdir. Lorem Ipsum, ad\u0131 bilinmeyen bir matbaac\u0131n\u0131n bir hurufat numune kitab\u0131 olu\u015fturmak \u00fczere bir yaz\u0131 galerisini alarak kar\u0131\u015ft\u0131rd\u0131\u011f\u0131 1500lerden beri end\u00fcstri standard\u0131 sahte metinler olarak kullan\u0131lm\u0131\u015ft\u0131r. Be\u015fy\u00fcz y\u0131l","Yönetilen Hizmetler Nasıl Çalışır?":"Yinelenen bir sayfa i\u00e7eri\u011finin okuyucunun dikkatini da\u011f\u0131tt\u0131\u011f\u0131 bilinen bir ger\u00e7ektir. Lorem Ipsum kullanman\u0131n amac\u0131, s\u00fcrekli buraya metin gelecek, buraya metin gelecek yazmaya k\u0131yasla daha dengeli bir harf da\u011f\u0131l\u0131m\u0131 sa\u011flayarak okunurlu\u011fu art\u0131rmas\u0131d\u0131r","Hangi Faydaları Güvenebilirsiniz?":"Yinelenen bir sayfa i\u00e7eri\u011finin okuyucunun dikkatini da\u011f\u0131tt\u0131\u011f\u0131 bilinen bir ger\u00e7ektir. Lorem Ipsum kullanman\u0131n amac\u0131, s\u00fcrekli buraya metin gelecek, buraya metin gelecek yazmaya k\u0131yasla daha dengeli bir harf da\u011f\u0131l\u0131m\u0131 sa\u011flayarak okunurlu\u011fu art\u0131rmas\u0131d\u0131r"},"image":"uploads/20/05/30052015908315615ed229c915cfa.jpg","banner":"\/uploads\/20\/05\/5ec65d8e809d12105201590058382.png"}',
        'lang'=> 'tr'
       ]);
    }
}
