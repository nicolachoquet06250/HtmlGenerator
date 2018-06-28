<?php

namespace html_generator;


class Frameworks {

	const FROM_SCRATCH = [];
    private $bootstrap_classes = [
        'row' => 'row',
        'col' => [
            'xs' => [
                'col-xs-1',
                'col-xs-2',
                'col-xs-3',
                'col-xs-4',
                'col-xs-5',
                'col-xs-6',
                'col-xs-7',
                'col-xs-8',
                'col-xs-9',
                'col-xs-10',
                'col-xs-11',
                'col-xs-12'
            ],
            's' => [
                'col-s-1',
                'col-s-2',
                'col-s-3',
                'col-s-4',
                'col-s-5',
                'col-s-6',
                'col-s-7',
                'col-s-8',
                'col-s-9',
                'col-s-10',
                'col-s-11',
                'col-s-12'
            ],
            'm' => [
                'col-m-1',
                'col-m-2',
                'col-m-3',
                'col-m-4',
                'col-m-5',
                'col-m-6',
                'col-m-7',
                'col-m-8',
                'col-m-9',
                'col-m-10',
                'col-m-11',
                'col-m-12'
            ],
            'md' => [
                'col-md-1',
                'col-md-2',
                'col-md-3',
                'col-md-4',
                'col-md-5',
                'col-md-6',
                'col-md-7',
                'col-md-8',
                'col-md-9',
                'col-md-10',
                'col-md-11',
                'col-md-12'
            ],
            'lg' => [
                'col-lg-1',
                'col-lg-2',
                'col-lg-3',
                'col-lg-4',
                'col-lg-5',
                'col-lg-6',
                'col-lg-7',
                'col-lg-8',
                'col-lg-9',
                'col-lg-10',
                'col-lg-11',
                'col-lg-12'
            ]
        ]
    ];
	private static $bootstrap_versions = [
		'v3' => [
			'doc' => 'http://getbootstrap.com/docs/3.3/',
			'css' => [
				[
					'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
				]
			],
			'js' => [
				[
					'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
				],
				[
					'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'
				]
			]
		],
		'v4' => [
			'doc' => 'https://getbootstrap.com/',
			'css' => [
				[
					'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
				]
			],
			'js' => [
				[
					'src' => 'https://code.jquery.com/jquery-3.2.1.slim.min.js',
				],
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
				],
				[
					'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
				]
			]
		]
	];
	const BOOTSTRAP = [
		'name' => 'bootstrap',
		'version' => 'v4',
		'doc' => 'http://getbootstrap.com/docs/3.3/',
		'js' => [
			[
				'src' => 'https://code.jquery.com/jquery-3.3.1.slim.min.js',
			],
			[
				'src' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
			],
			[
				'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
			]
		],
		'css' => [
			[
				'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
			]
		]
	];
	public static function BOOTSTRAP($version = 'v4') {
		if(isset(self::$bootstrap_versions[$version])) {
			return [
				'name'    => 'bootstrap',
				'version' => $version,
				'doc' => self::$bootstrap_versions[$version]['doc'],
				'js' => self::$bootstrap_versions[$version]['js'],
				'css' => self::$bootstrap_versions[$version]['css']
			];
		}
		return self::FROM_SCRATCH;
	}

	private static $materialize_versions = [
		'v0' => [
			'doc' => 'http://archives.materializecss.com/0.100.2/',
			'css' => [
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css'
				]
			],
			'js' => [
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'
				]
			]
		],
		'v1' => [
			'doc' => 'https://materializecss.com/',
			'css' => [
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css'
				]
			],
			'js' => [
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js'
				]
			]
		]
	];
	const MATERIALIZE = [
		'name' => 'materialize',
		'version' => 'v1',
		'doc' => 'https://materializecss.com/',
		'css' => [
			'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css'
		],
		'js' => [
			'src' => 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js'
		]
	];
	public static function MATERIALIZE($version = 'v1') {
		if(isset(self::$materialize_versions[$version])) {
			return [
				'name'    => 'materialize',
				'version' => $version,
				'doc' => self::$materialize_versions[$version]['doc'],
				'js' => self::$materialize_versions[$version]['js'],
				'css' => self::$materialize_versions[$version]['css']
			];
		}
		return self::FROM_SCRATCH;
	}
}