<?php 

$info_template = array(
		'template_name' 		=> 'Default Jadwal PPSUIKA',
		'template_directory'	=> 'default',
		'template_author' 		=> 'Asrul Maa',
		'template_version' 		=> '1.0',
		'template_description'  => '<p>Template blog sederhana ini dipersembahkan untuk testing sahaja, namun selain cocok untuk testing. template ini pun bisa digunakan untuk pembuatan blog, karena didalamnya sudah mendukung pengkategorian artikel, dan fasilitas komentar. Anda bisa langsung mencobannya</p>',
		'template_attribute'	=> serialize(array(			
			'posted_by'			=> array('type' => 'text', 'value' => 'Posted by'),
			'on'				=> array('type' => 'text', 'value' => 'on'),
			'category'			=> array('type' => 'text', 'value' => 'Category'),
			'daftar_komentar'	=> array('type' => 'text', 'value' => 'Daftar Komentar'),
			'komentar'			=> array('type' => 'text', 'value' => 'Komentar'),
			'form_komentar'		=> array('type' => 'text', 'value' => 'Form Komentar'),
			'nama'				=> array('type' => 'text', 'value' => 'Nama'),
			'email'				=> array('type' => 'text', 'value' => 'Email'),
			'website'			=> array('type' => 'text', 'value' => 'Website'),
			'kirim_komentar' 	=> array('type' => 'text', 'value' => 'Kirim Komentar'),			
		))

	);