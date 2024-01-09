<?php 



function RegisterAdminMenuBar(){

	if (Amcoders\Plugin\Plugin::is_active('zoom')) {
		$data['meeting']=array(
			'name' => 'Live meeting',
			'icon' => 'flaticon-support',
			'child'=> array(
				'Create New' => route('admin.metting.create'),
				'Upcoming Meeting' => route('zoom',['upcoming'=>"upcoming",'id'=>1]),
				'Live Meeting' => route('zoom',['upcoming'=>"live",'id'=>1]),
				'Schduled Meeting' => route('zoom',['upcoming'=>"schduled",'id'=>1])
			)
		);
	}

	if (Amcoders\Plugin\Plugin::is_active('ecommerce')) {
		
		$data['ecommerce']=array(
			'name' => 'ecommerce',
			'icon' => 'flaticon-shop',
			'child'=> array(
				'Pricing List' => route('admin.ecommerce.pricing.index'),
				'Products' => route('admin.ecommerce.product.index'),
				'Product Category' => route('admin.ecommerce.category.index'),
				'Orders' => route('admin.ecommerce.order.index'),
				
				'Shop Settings' => route('admin.ecommerce.settings'),
			)
		);
	}

	if (Amcoders\Plugin\Plugin::is_active('services')) {
		$data['services']=array(
			'name' => 'Service',
			'icon' => 'flaticon-board',

			'child'=> array(
				'Create Service' => route('admin.service.service.create'),
				'Service List' => route('admin.service.service.index'),
				'Service Category' => route('admin.service.services.category'),


			)
		);
	}

	if (Amcoders\Plugin\Plugin::is_active('Team')) {
		

		$data['Team']=array(
			'name' => 'Team',
			'icon' => 'flaticon-team',
			'collapse' => true,
			'child'=> array(
				'Create' => route('admin.team.create'),
				'Team List' => route('admin.team.index'),

			)
		);
	}
	if (Amcoders\Plugin\Plugin::is_active('Testimonials')) {
		$data['Testimonials']=array(
			'name' => 'Testimonials',
			'icon' => 'flaticon-resume',
			'child'=> array(
				'Create New' => route('admin.testimonial.create'),
				'Testimonials List' => route('admin.testimonial.index'),
				
			)
		);
	}

	if (Amcoders\Plugin\Plugin::is_active('portfolio')) {
		$data['Portfolio']=array(
			'name' => 'Portfolio',
			'icon' => 'flaticon-resume',
			'child'=> array(
				'Create New Portfolio' => route('admin.portfolio.create'),
				'Portfolio List' => route('admin.portfolio.index'),
				'Portfolio Category' => route('admin.portfoliocategory.index'),
				'Experience' => route('admin.Experience.index','st=1'),
				'Education' =>  route('admin.Education.index','st=1'),
				
				
			)
		);
	}

	if (Amcoders\Plugin\Plugin::is_active('Faq')) {
		$data['Faq']=array(
	 
		'name' => 'Faqs',
		'icon' => 'flaticon-conversation',
		'url' => route('admin.faq.index')
	
	);
	}

	

	/* if u want to use only url without collapse follow this  demo*/

	// $data['key']=array(
	// 	'name' => 'name',
	// 	'icon' => 'icon name',
	// 	'url' => 'url/param'
	// );

	return $data ?? [];
}


