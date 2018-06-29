<?php

namespace html_generator;


class Frameworks {

	const FROM_SCRATCH = [];

    private static $bootstrap_classes = [
        'row' => [
            '' => 'row',
        ],
        'container' => [
            '' => 'container',
            'fluid' => 'container-fluid'
        ],
        'col' => [
            0 => 'col-0',
            1 => 'col-1',
            2 => 'col-2',
            3 => 'col-3',
            4 => 'col-4',
            5 => 'col-5',
            6 => 'col-6',
            7 => 'col-7',
            8 => 'col-8',
            9 => 'col-9',
            10 => 'col-10',
            11 => 'col-11',
            12 => 'col-12',
            'auto' => 'col-auto',
            'xs' => [
                'col-0',
                'col-1',
                'col-2',
                'col-3',
                'col-4',
                'col-5',
                'col-6',
                'col-7',
                'col-8',
                'col-9',
                'col-10',
                'col-11',
                'col-12',
                'auto' => 'col'
            ],
            'sm' => [
                'col-sm-0',
                'col-sm-1',
                'col-sm-2',
                'col-sm-3',
                'col-sm-4',
                'col-sm-5',
                'col-sm-6',
                'col-sm-7',
                'col-sm-8',
                'col-sm-9',
                'col-sm-10',
                'col-sm-11',
                'col-sm-12',
                'auto' => 'col-sm-auto'
            ],
            'md' => [
                'col-md-0',
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
                'col-md-12',
                'auto' => 'col-md-auto'
            ],
            'lg' => [
                'col-lg-0',
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
                'col-lg-12',
                'auto' => 'col-lg-auto'
            ],
            'xl' => [
                'col-xl-0',
                'col-xl-1',
                'col-xl-2',
                'col-xl-3',
                'col-xl-4',
                'col-xl-5',
                'col-xl-6',
                'col-xl-7',
                'col-xl-8',
                'col-xl-9',
                'col-xl-10',
                'col-xl-11',
                'col-xl-12',
                'auto' => 'col-xl-auto'
            ],
        ],
        'offset' => [
            0    => 'offset-0',
            1    => 'offset-1',
            2    => 'offset-2',
            3    => 'offset-3',
            4    => 'offset-4',
            5    => 'offset-5',
            6    => 'offset-6',
            7    => 'offset-7',
            8    => 'offset-8',
            9    => 'offset-9',
            10   => 'offset-10',
            11   => 'offset-11',
            12   => 'offset-12',
            'auto' => 'offset-auto',
            'xs' => [
                'offset-0',
                'offset-1',
                'offset-2',
                'offset-3',
                'offset-4',
                'offset-5',
                'offset-6',
                'offset-7',
                'offset-8',
                'offset-9',
                'offset-10',
                'offset-11',
                'offset-12',
                'auto' => 'offset'
            ],
            'sm' => [
                'offset-sm-0',
                'offset-sm-1',
                'offset-sm-2',
                'offset-sm-3',
                'offset-sm-4',
                'offset-sm-5',
                'offset-sm-6',
                'offset-sm-7',
                'offset-sm-8',
                'offset-sm-9',
                'offset-sm-10',
                'offset-sm-11',
                'offset-sm-12',
                'auto' => 'offset-sm-auto'
            ],
            'md' => [
                'offset-md-0',
                'offset-md-1',
                'offset-md-2',
                'offset-md-3',
                'offset-md-4',
                'offset-md-5',
                'offset-md-6',
                'offset-md-7',
                'offset-md-8',
                'offset-md-9',
                'offset-md-10',
                'offset-md-11',
                'offset-md-12',
                'auto' => 'offset-md-auto'
            ],
            'lg' => [
                'offset-lg-0',
                'offset-lg-1',
                'offset-lg-2',
                'offset-lg-3',
                'offset-lg-4',
                'offset-lg-5',
                'offset-lg-6',
                'offset-lg-7',
                'offset-lg-8',
                'offset-lg-9',
                'offset-lg-10',
                'offset-lg-11',
                'offset-lg-12',
                'auto' => 'offset-lg-auto'
            ],
            'xl' => [
                'offset-xl-0',
                'offset-xl-1',
                'offset-xl-2',
                'offset-xl-3',
                'offset-xl-4',
                'offset-xl-5',
                'offset-xl-6',
                'offset-xl-7',
                'offset-xl-8',
                'offset-xl-9',
                'offset-xl-10',
                'offset-xl-11',
                'offset-xl-12',
                'auto' => 'offset-xl-auto'
            ],
        ],
        'ml' => [
            0 => 'ml-0',
            1 => 'ml-1',
            2 => 'ml-2',
            3 => 'ml-3',
            4 => 'ml-4',
            5 => 'ml-5',
            6 => 'ml-6',
            7 => 'ml-7',
            8 => 'ml-8',
            9 => 'ml-9',
            10 => 'ml-10',
            11 => 'ml-11',
            12 => 'ml-12',
            'auto' => 'ml-auto',
            'xs' => [
                'ml-0',
                'ml-1',
                'ml-2',
                'ml-3',
                'ml-4',
                'ml-5',
                'ml-6',
                'ml-7',
                'ml-8',
                'ml-9',
                'ml-10',
                'ml-11',
                'ml-12',
                'auto' => 'ml'
            ],
            'sm' => [
                'ml-sm-0',
                'ml-sm-1',
                'ml-sm-2',
                'ml-sm-3',
                'ml-sm-4',
                'ml-sm-5',
                'ml-sm-6',
                'ml-sm-7',
                'ml-sm-8',
                'ml-sm-9',
                'ml-sm-10',
                'ml-sm-11',
                'ml-sm-12',
                'auto' => 'ml-sm-auto'
            ],
            'md' => [
                'ml-md-0',
                'ml-md-1',
                'ml-md-2',
                'ml-md-3',
                'ml-md-4',
                'ml-md-5',
                'ml-md-6',
                'ml-md-7',
                'ml-md-8',
                'ml-md-9',
                'ml-md-10',
                'ml-md-11',
                'ml-md-12',
                'auto' => 'ml-md-auto'
            ],
            'lg' => [
                'ml-lg-0',
                'ml-lg-1',
                'ml-lg-2',
                'ml-lg-3',
                'ml-lg-4',
                'ml-lg-5',
                'ml-lg-6',
                'ml-lg-7',
                'ml-lg-8',
                'ml-lg-9',
                'ml-lg-10',
                'ml-lg-11',
                'ml-lg-12',
                'auto' => 'ml-lg-auto'
            ],
            'xl' => [
                'ml-xl-0',
                'ml-xl-1',
                'ml-xl-2',
                'ml-xl-3',
                'ml-xl-4',
                'ml-xl-5',
                'ml-xl-6',
                'ml-xl-7',
                'ml-xl-8',
                'ml-xl-9',
                'ml-xl-10',
                'ml-xl-11',
                'ml-xl-12',
                'auto' => 'ml-xl-auto'
            ],
        ],
        'mr' => [
            0 => 'mr-0',
            1 => 'mr-1',
            2 => 'mr-2',
            3 => 'mr-3',
            4 => 'mr-4',
            5 => 'mr-5',
            6 => 'mr-6',
            7 => 'mr-7',
            8 => 'mr-8',
            9 => 'mr-9',
            10 => 'mr-10',
            11 => 'mr-11',
            12 => 'mr-12',
            'auto' => 'mr-auto',
            'xs' => [
                'mr-0',
                'mr-1',
                'mr-2',
                'mr-3',
                'mr-4',
                'mr-5',
                'mr-6',
                'mr-7',
                'mr-8',
                'mr-9',
                'mr-10',
                'mr-11',
                'mr-12',
                'auto' => 'mr'
            ],
            'sm' => [
                'mr-sm-0',
                'mr-sm-1',
                'mr-sm-2',
                'mr-sm-3',
                'mr-sm-4',
                'mr-sm-5',
                'mr-sm-6',
                'mr-sm-7',
                'mr-sm-8',
                'mr-sm-9',
                'mr-sm-10',
                'mr-sm-11',
                'mr-sm-12',
                'auto' => 'mr-sm-auto'
            ],
            'md' => [
                'mr-md-0',
                'mr-md-1',
                'mr-md-2',
                'mr-md-3',
                'mr-md-4',
                'mr-md-5',
                'mr-md-6',
                'mr-md-7',
                'mr-md-8',
                'mr-md-9',
                'mr-md-10',
                'mr-md-11',
                'mr-md-12',
                'auto' => 'mr-md-auto'
            ],
            'lg' => [
                'mr-lg-0',
                'mr-lg-1',
                'mr-lg-2',
                'mr-lg-3',
                'mr-lg-4',
                'mr-lg-5',
                'mr-lg-6',
                'mr-lg-7',
                'mr-lg-8',
                'mr-lg-9',
                'mr-lg-10',
                'mr-lg-11',
                'mr-lg-12',
                'auto' => 'mr-lg-auto'
            ],
            'xl' => [
                'mr-xl-0',
                'mr-xl-1',
                'mr-xl-2',
                'mr-xl-3',
                'mr-xl-4',
                'mr-xl-5',
                'mr-xl-6',
                'mr-xl-7',
                'mr-xl-8',
                'mr-xl-9',
                'mr-xl-10',
                'mr-xl-11',
                'mr-xl-12',
                'auto' => 'mr-xl-auto'
            ],
        ],
        'pl' => [
            0 => 'pl-0',
            1 => 'pl-1',
            2 => 'pl-2',
            3 => 'pl-3',
            4 => 'pl-4',
            5 => 'pl-5',
            6 => 'pl-6',
            7 => 'pl-7',
            8 => 'pl-8',
            9 => 'pl-9',
            10 => 'pl-10',
            11 => 'pl-11',
            12 => 'pl-12',
            'auto' => 'pl-auto',
            'xs' => [
                'pl-0',
                'pl-1',
                'pl-2',
                'pl-3',
                'pl-4',
                'pl-5',
                'pl-6',
                'pl-7',
                'pl-8',
                'pl-9',
                'pl-10',
                'pl-11',
                'pl-12',
                'auto' => 'pl'
            ],
            'sm' => [
                'pl-sm-0',
                'pl-sm-1',
                'pl-sm-2',
                'pl-sm-3',
                'pl-sm-4',
                'pl-sm-5',
                'pl-sm-6',
                'pl-sm-7',
                'pl-sm-8',
                'pl-sm-9',
                'pl-sm-10',
                'pl-sm-11',
                'pl-sm-12',
                'auto' => 'pl-sm-auto'
            ],
            'md' => [
                'pl-md-0',
                'pl-md-1',
                'pl-md-2',
                'pl-md-3',
                'pl-md-4',
                'pl-md-5',
                'pl-md-6',
                'pl-md-7',
                'pl-md-8',
                'pl-md-9',
                'pl-md-10',
                'pl-md-11',
                'pl-md-12',
                'auto' => 'pl-md-auto'
            ],
            'lg' => [
                'pl-lg-0',
                'pl-lg-1',
                'pl-lg-2',
                'pl-lg-3',
                'pl-lg-4',
                'pl-lg-5',
                'pl-lg-6',
                'pl-lg-7',
                'pl-lg-8',
                'pl-lg-9',
                'pl-lg-10',
                'pl-lg-11',
                'pl-lg-12',
                'auto' => 'pl-lg-auto'
            ],
            'xl' => [
                'pl-xl-0',
                'pl-xl-1',
                'pl-xl-2',
                'pl-xl-3',
                'pl-xl-4',
                'pl-xl-5',
                'pl-xl-6',
                'pl-xl-7',
                'pl-xl-8',
                'pl-xl-9',
                'pl-xl-10',
                'pl-xl-11',
                'pl-xl-12',
                'auto' => 'pl-xl-auto'
            ],
        ],
        'pr' => [
            0 => 'pr-0',
            1 => 'pr-1',
            2 => 'pr-2',
            3 => 'pr-3',
            4 => 'pr-4',
            5 => 'pr-5',
            6 => 'pr-6',
            7 => 'pr-7',
            8 => 'pr-8',
            9 => 'pr-9',
            10 => 'pr-10',
            11 => 'pr-11',
            12 => 'pr-12',
            'auto' => 'pr-auto',
            'xs' => [
                'pr-0',
                'pr-1',
                'pr-2',
                'pr-3',
                'pr-4',
                'pr-5',
                'pr-6',
                'pr-7',
                'pr-8',
                'pr-9',
                'pr-10',
                'pr-11',
                'pr-12',
                'auto' => 'pr'
            ],
            'sm' => [
                'pr-sm-0',
                'pr-sm-1',
                'pr-sm-2',
                'pr-sm-3',
                'pr-sm-4',
                'pr-sm-5',
                'pr-sm-6',
                'pr-sm-7',
                'pr-sm-8',
                'pr-sm-9',
                'pr-sm-10',
                'pr-sm-11',
                'pr-sm-12',
                'auto' => 'pr-sm-auto'
            ],
            'md' => [
                'pr-md-0',
                'pr-md-1',
                'pr-md-2',
                'pr-md-3',
                'pr-md-4',
                'pr-md-5',
                'pr-md-6',
                'pr-md-7',
                'pr-md-8',
                'pr-md-9',
                'pr-md-10',
                'pr-md-11',
                'pr-md-12',
                'auto' => 'pr-md-auto'
            ],
            'lg' => [
                'pr-lg-0',
                'pr-lg-1',
                'pr-lg-2',
                'pr-lg-3',
                'pr-lg-4',
                'pr-lg-5',
                'pr-lg-6',
                'pr-lg-7',
                'pr-lg-8',
                'pr-lg-9',
                'pr-lg-10',
                'pr-lg-11',
                'pr-lg-12',
                'auto' => 'pr-lg-auto'
            ],
            'xl' => [
                'pr-xl-0',
                'pr-xl-1',
                'pr-xl-2',
                'pr-xl-3',
                'pr-xl-4',
                'pr-xl-5',
                'pr-xl-6',
                'pr-xl-7',
                'pr-xl-8',
                'pr-xl-9',
                'pr-xl-10',
                'pr-xl-11',
                'pr-xl-12',
                'auto' => 'pr-xl-auto'
            ],
        ],
        'align' => [
            'items' => [
                'start' => 'align-items-start',
                'center' => 'align-items-center',
                'end' => 'align-items-end',
            ],
            'self' => [
                'start' => 'align-self-start',
                'center' => 'align-self-center',
                'end' => 'align-self-end',
            ],
        ],
        'justify' => [
            'content' => [
                'start' => 'justify-content-start',
                'center' => 'justify-content-center',
                'around' => 'justify-content-around',
                'between' => 'justify-content-between',
            ]
        ],
        'w' => [
            100 => 'w-100'
        ],
        'order' => [
            '',
            'order-1',
            'order-2',
            'order-3',
            'order-4',
            'order-5',
            'order-6',
            'order-7',
            'order-8',
            'order-9',
            'order-10',
            'order-11',
            'order-12',
            'last' => 'order-last',
            'first' => 'order-first',
        ],
        'media' => [
            '' => 'media',
            'body' => 'media-body'
        ],
        'list' => [
            'unstyled' => 'list-unstyled',
            'inline' => [
                'item' => 'list-inline-item',
            ],
        ],
        'img' => [
            'fluid' => 'img-fluid',
            'thumbnail' => 'img-thumbnail',
        ],
        'float' => [
            'right' => 'float-right',
            'left' => 'float-left',
        ],
        'rounded' => [
            '' => 'rounded',
        ],
        'table' => [
            '' => 'table',
            'table-dark' => 'table table-dark',
            'striped' => 'table table-striped',
            'striped-dark' => 'table table-striped table-dark',
            'bordered' => 'table table-bordered',
            'bordered-dark' => 'table table-bordered table-dark',
            'hover' => 'table table-hover',
            'hover-dark' => 'table table-hover table-dark',
            'sm' => 'table table-sm',
            'sm-dark' => 'table table-sm table-dark',
            'active' => 'table-active',
            'primary' => 'table-primary',
            'secondary' => 'table-secondary',
            'success' => 'table-success',
            'danger' => 'table-danger',
            'warning' => 'table-warning',
            'info' => 'table-info',
            'light' => 'table-light',
            'dark' => 'table-dark',
            'responsive' => [
                'xs' => 'table-responsive',
                'sm' => 'table-responsive-sm',
                'md' => 'table-responsive-md',
                'lg' => 'table-responsive-lg',
                'xl' => 'table-responsive-xl',
            ]
        ],
        'thead' => [
            'dark' => 'thead-dark',
            'light' => 'thead-light',
        ],
        'text' => [
            'center' => 'text-center',
            'justify' => 'text-justify',
            'left' => 'text-left',
            'right' => 'text-right',
            'truncate' => 'text-truncate',
            'lowercase' => 'text-lowercase',
            'uppercase' => 'text-uppercase',
            'capitalize' => 'text-capitalize',
            'sm' => [
                'left' => 'text-sm-left',
            ],
            'md' => [
                'left' => 'text-md-left',
            ],
            'lg' => [
                'left' => 'text-lg-left',
            ],
            'xl' => [
                'left' => 'text-xl-left',
            ],
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
	public static function BOOTSTRAP($version = 'v4') {
		if(isset(self::$bootstrap_versions[$version])) {
			return [
				'name'    => 'bootstrap',
				'version' => $version,
				'doc' => self::$bootstrap_versions[$version]['doc'],
				'js' => self::$bootstrap_versions[$version]['js'],
				'css' => self::$bootstrap_versions[$version]['css'],
                'classes' => self::$bootstrap_classes,
			];
		}
		return self::FROM_SCRATCH;
	}


    private static $materialize_classes = [
        'row' => 'row',
        'col' => [
            'xs' => [
                'col-1',
                'col-2',
                'col-3',
                'col-4',
                'col-5',
                'col-6',
                'col-7',
                'col-8',
                'col-9',
                'col-10',
                'col-11',
                'col-12'
            ],
            'sm' => [
                'col-sm-1',
                'col-sm-2',
                'col-sm-3',
                'col-sm-4',
                'col-sm-5',
                'col-sm-6',
                'col-sm-7',
                'col-sm-8',
                'col-sm-9',
                'col-sm-10',
                'col-sm-11',
                'col-sm-12'
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
            ],
            'xl' => [
                'col-xl-1',
                'col-xl-2',
                'col-xl-3',
                'col-xl-4',
                'col-xl-5',
                'col-xl-6',
                'col-xl-7',
                'col-xl-8',
                'col-xl-9',
                'col-xl-10',
                'col-xl-11',
                'col-xl-12'
            ],
        ],
        'offset' => [
            'xs' => [
                'col-1',
                'col-2',
                'col-3',
                'col-4',
                'col-5',
                'col-6',
                'col-7',
                'col-8',
                'col-9',
                'col-10',
                'col-11',
                'col-12'
            ],
            'sm' => [
                'offset-sm-1',
                'offset-sm-2',
                'offset-sm-3',
                'offset-sm-4',
                'offset-sm-5',
                'offset-sm-6',
                'offset-sm-7',
                'offset-sm-8',
                'offset-sm-9',
                'offset-sm-10',
                'offset-sm-11',
                'offset-sm-12'
            ],
            'md' => [
                'offset-md-1',
                'offset-md-2',
                'offset-md-3',
                'offset-md-4',
                'offset-md-5',
                'offset-md-6',
                'offset-md-7',
                'offset-md-8',
                'offset-md-9',
                'offset-md-10',
                'offset-md-11',
                'offset-md-12'
            ],
            'lg' => [
                'offset-lg-1',
                'offset-lg-2',
                'offset-lg-3',
                'offset-lg-4',
                'offset-lg-5',
                'offset-lg-6',
                'offset-lg-7',
                'offset-lg-8',
                'offset-lg-9',
                'offset-lg-10',
                'offset-lg-11',
                'offset-lg-12'
            ],
            'xl' => [
                'offset-xl-1',
                'offset-xl-2',
                'offset-xl-3',
                'offset-xl-4',
                'offset-xl-5',
                'offset-xl-6',
                'offset-xl-7',
                'offset-xl-8',
                'offset-xl-9',
                'offset-xl-10',
                'offset-xl-11',
                'offset-xl-12'
            ],
        ]
    ];
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
	public static function MATERIALIZE($version = 'v1') {
		if(isset(self::$materialize_versions[$version])) {
			return [
				'name'    => 'materialize',
				'version' => $version,
				'doc' => self::$materialize_versions[$version]['doc'],
				'js' => self::$materialize_versions[$version]['js'],
				'css' => self::$materialize_versions[$version]['css'],
                'classes' => self::$materialize_classes,
			];
		}
		return self::FROM_SCRATCH;
	}
}