<?php
return array(
	array(
		'active'=> $this->__menu([
			'master/companyprofile',
			'master/branch',
			'master/users',
			'master/student',
			'master/teacher',
			'master/course',
			'master/level',
			'master/classes',
			'master/recurringfee',
			'master/bank',
			'master/registrationfee'
		], 'start active open'),
		'link' 	=> 'javascript:;',
		'title' => 'Master',
		'icon' => 'fa fa-database',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'master/companyprofile',
					'master/branch',
					'master/bank',
					'master/users'
				], 'start active open'),
				'link' 	=> 'javascript:;',
				'title' => 'Umum',
				'icon' => '',
				'arrow' => '<span class="arrow"></span>',
				'child' => array(
					array(
						'active'=> $this->__menu([
							'master/companyprofile'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/companyprofile',
						'title' => 'Perusahaan',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([
							'master/branch'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/branch',
						'title' => 'Cabang',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([
							'master/users'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/users',
						'title' => 'Pengguna',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([], 'start active open'),
						'link' 	=> 'javascript:;',
						'title' => 'Otoritas',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					)
					,
					array(
						'active'=> $this->__menu(['master/bank'], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/bank',
						'title' => 'Bank',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					)
				)
			),
			array(
				'active'=> $this->__menu([
					'master/student'
				], 'start active open'),
				'link' 	=> base_url().'backendsecure/master/student',
				'title' => 'Murid',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'master/teacher'
				], 'start active open'),
				'link' 	=> base_url().'backendsecure/master/teacher',
				'title' => 'Guru',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'master/course',
					'master/level',
					'master/classes',
					'master/registrationfee'
				], 'start active open'),
				'link' 	=> 'javascript:;',
				'title' => 'Kelas',
				'icon' => '',
				'arrow' => '<span class="arrow"></span>',
				'child' => array(
					array(
						'active'=> $this->__menu([
							'master/course'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/course',
						'title' => 'Kategori Kursus',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([
							'master/level'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/level',
						'title' => 'Tingkatan Kursus',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([
							'master/classes'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/classes',
						'title' => 'Kelas Kursus',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
						array(
						'active'=> $this->__menu([
							'master/registrationfee'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/registrationfee',
						'title' => 'Biaya Pendaftaran',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),/*,
					array(
						'active'=> $this->__menu([
							'master/recurringfee'
						], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/recurringfee',
						'title' => 'Recurring Fee',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					),
					array(
						'active'=> $this->__menu([], 'start active open'),
						'link' 	=> base_url().'backendsecure/master/coursepromo',
						'title' => 'Promosi Kursus',
						'icon' => '',
						'arrow' => '',
						'child' => array(
						)
					)*/
				)
			)//,
			// array(
			// 	'active'=> $this->__menu([], 'start active open'),
			// 	'link' 	=> base_url().'backendsecure/master/registrationfee',
			// 	'title' => 'Biaya Pendaftaran',
			// 	'icon' => '',
			// 	'arrow' => '',
			// 	'child' => array(
			// 	)
			// ),
			// array(
			// 	'active'=> $this->__menu([
			// 		'master/arcategorydivision',
			// 		'master/apcategorydivision'
			// 	], 'start active open'),
			// 	'link' 	=> 'javascript:;',
			// 	'title' => 'Kategori Lain-lain',
			// 	'icon' => '',
			// 	'arrow' => '<span class="arrow"></span>',
			// 	'child' => array(
			// 		array(
			// 			'active'=> $this->__menu([
			// 				'master/course'
			// 			], 'start active open'),
			// 			'link' 	=> base_url().'backendsecure/master/arcategorydivision',
			// 			'title' => 'Kategori Pendapatan',
			// 			'icon' => '',
			// 			'arrow' => '',
			// 			'child' => array(
			// 			)
			// 		),
			// 		array(
			// 			'active'=> $this->__menu([
			// 				'master/level'
			// 			], 'start active open'),
			// 			'link' 	=> base_url().'backendsecure/master/apcategorydivision',
			// 			'title' => 'Kategori Pengeluaran',
			// 			'icon' => '',
			// 			'arrow' => '',
			// 			'child' => array(
			// 			)
			// 		)
			// 	)
			// ),
		)
	),
	array(
		'active'=> $this->__menu([
			'register/student'
		] ,'start active open'),
		'link' 	=> 'javascript:;',
		'title' => 'Registrasi',
		'icon' => 'fa fa-check-square-o',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'register/student'
				], 'start active open'),
				'link' 	=> base_url().'backendsecure/register/student/student',
				'title' => 'Murid',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)
		)
	),
	array(
		'active'=> $this->__menu([
					'invoice/studentinvoice',
					'invoice/liststudentinvoice',
					'invoice/printstudentinvoice'
				], 'start active open'),
		'link' 	=> 'javascript:;',
		'title' => 'Tagihan Murid',
		'icon' => 'fa fa-send',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'invoice/studentinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/studentinvoice',
				'title' => 'Buat Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'invoice/liststudentinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/liststudentinvoice',
				'title' => 'Daftar Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'invoice/printstudentinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/printstudentinvoice',
				'title' => 'Cetak Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)
		)
	),
	array(
		'active'=> $this->__menu([
					'invoice/teacherinvoice',
					'invoice/listteacherinvoice',
					'invoice/printteacherinvoice'
				], 'start active open'),
		'link' 	=> 'javascript:;',
		'title' => 'Tagihan Gaji Guru',
		'icon' => 'fa fa-send',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'invoice/teacherinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/teacherinvoice',
				'title' => 'Buat Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'invoice/listteacherinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/listteacherinvoice',
				'title' => 'Daftar Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'invoice/printteacherinvoice'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/invoice/printteacherinvoice',
				'title' => 'Cetak Tagihan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)
		)
	),/*
	array(
		'active'=> $this->__menu([] ,'start active open'),
		'link' 	=> base_url().'backendsecure/javascript:;',
		'title' => 'Pembayaran',
		'icon' => 'fa fa-money',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([] ,'start active open'),
				'link' 	=> base_url().'backendsecure/javascript:;',
				'title' => 'Tagihan Murid',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([] ,'start active open'),
				'link' 	=> base_url().'backendsecure/javascript:;',
				'title' => 'Tagihan Gaji Guru',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)
		)
	),*/
	array(
		'active'=> $this->__menu([
					'transaction/simplyexpensecategory',
					'transaction/simplyrevenuecategory'
				], 'start active open'),
		'link' 	=> 'javascript:;',
		'title' => 'Transaksi Lain-lain',
		'icon' => 'fa fa-send',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'transaction/simplyrevenuecategory'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/transaction/simplyrevenuecategory',
				'title' => 'Transaksi Pendapatan',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			),
			array(
				'active'=> $this->__menu([
					'transaction/simplyexpensecategory'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/transaction/simplyexpensecategory',
				'title' => 'Transaksi Pengeluaran',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)
		)
	),







	array(
		'active'=> $this->__menu([
			'report/revenue'
			,'report/otherrevenue'
			,'report/expense'
			,'report/otherexpense'
			,'report/profitandloss'
		] ,'start active open'),
		'link' 	=> base_url().'backendsecure/javascript:;',
		'title' => 'Laporan',
		'icon' => 'fa fa-bar-chart-o',
		'arrow' => '<span class="arrow"></span>',
		'child' => array(
			array(
				'active'=> $this->__menu([
					'report/revenue'
					,'report/otherrevenue'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/javascript:;',
				'title' => 'Laporan Pendapatan',
				'icon' 	=> '',
				'arrow' => '<span class="arrow"></span>',
				'child' => array(
					array(
					'active'=> $this->__menu([
						'report/revenue'
					] ,'start active open'),
					'link' 	=> base_url().'backendsecure/report/revenue',
					'title' => 'Pendapatan Murid',
					'icon' 	=> '',
					'arrow' => '',
					'child' => array(
						)
					),
					array(
					'active'=> $this->__menu([
						'report/otherrevenue'
					] ,'start active open'),
					'link' 	=> base_url().'backendsecure/report/otherrevenue',
					'title' => 'Pendapatan Lain-lain',
					'icon' 	=> '',
					'arrow' => '',
					'child' => array(
						)
					)
				)

			),
			array(
				'active'=> $this->__menu([
					'report/expense'
					,'report/otherexpense'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/javascript:;',
				'title' => 'Laporan Pengeluaran',
				'icon' 	=> '',
				'arrow' => '<span class="arrow"></span>',
				'child' => array(
					array(
					'active'=> $this->__menu([
						'report/expense'
					] ,'start active open'),
					'link' 	=> base_url().'backendsecure/report/expense',
					'title' => 'Pengeluaran Gaji Guru',
					'icon' 	=> '',
					'arrow' => '',
					'child' => array(
						)
					),
					array(
					'active'=> $this->__menu([
						'report/otherexpense'
					] ,'start active open'),
					'link' 	=> base_url().'backendsecure/report/otherexpense',
					'title' => 'Pengeluaran Lain-lain',
					'icon' 	=> '',
					'arrow' => '',
					'child' => array(
						)
					)
				)

			),
			array(
				'active'=> $this->__menu([
					'report/profitandloss'
				] ,'start active open'),
				'link' 	=> base_url().'backendsecure/report/profitandloss',
				'title' => 'Laporan Laba Rugi',
				'icon' => '',
				'arrow' => '',
				'child' => array(
				)
			)// ,
			// array(
			// 	'active'=> $this->__menu([] ,'start active open'),
			// 	'link' 	=> base_url().'backendsecure/javascript:;',
			// 	'title' => 'Laporan Piutang',
			// 	'icon' => '',
			// 	'arrow' => '',
			// 	'child' => array(
			// 	)
			// )
		)
	)
);
