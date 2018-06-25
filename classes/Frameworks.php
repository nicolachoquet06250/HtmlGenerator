<?php

namespace html_generator;


class Frameworks {

	const FROM_SCRATCH = [];

	private static $bootstrap_versions = [
		'v3' => [
			'doc' => 'https://getbootstrap.com/',
			'css' => [
				[
					'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
					'integrity' => 'sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp'
				]
			],
			'js' => [
				[
					'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
					'integrity' => 'sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa'
				],
				[
					'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'
				]
			]
		],
		'v4' => [
			'doc' => 'http://getbootstrap.com/docs/3.3/',
			'css' => [
				[
					'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
					'integrity' => 'sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB'
				]
			],
			'js' => [
				[
					'src' => 'https://code.jquery.com/jquery-3.3.1.slim.min.js',
					'integrity' => 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
				],
				[
					'src' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
					'integrity' => 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49'
				],
				[
					'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
					'integrity' => 'sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T'
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
				'integrity' => 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
			],
			[
				'src' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
				'integrity' => 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49'
			],
			[
				'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
				'integrity' => 'sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T'
			]
		],
		'css' => [
			[
				'src' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
				'integrity' => 'sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB'
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