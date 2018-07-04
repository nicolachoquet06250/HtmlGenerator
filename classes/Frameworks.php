<?php

namespace html_generator;


class Frameworks {

	const FROM_SCRATCH = [];
	public static function FROM_SCRATCH() {
		return self::FROM_SCRATCH;
	}
	public static function BOOTSTRAP($version = 'v4') {
		$bootstrap_versions = json_decode(
			file_get_contents("https://cdns.nicolaschoquet.fr/?f=bootstrap"),
			true
		);

		if (isset($bootstrap_versions[$version])) {
			$bootstrap = $bootstrap_versions[$version];
			return [
				'name'    => 'bootstrap',
				'version' => $version,
				'doc'     => $bootstrap['doc'],
				'js'      => $bootstrap['js'],
				'css'     => $bootstrap['css'],
				'classes' => json_decode(
					file_get_contents("https://cdns.nicolaschoquet.fr/?f=bootstrap&v={$version}"),
					true
				),
			];
		}
		return self::FROM_SCRATCH();
	}
	public static function MATERIALIZE($version = 'v1') {
		$materialize_versions = json_decode(
			file_get_contents("https://cdns.nicolaschoquet.fr/?f=materialize-css"),
			true
		);

		if (isset($materialize_versions[$version])) {
			$materialize = $materialize_versions[$version];
			return [
				'name'    => 'materialize',
				'version' => $version,
				'doc'     => $materialize['doc'],
				'js'      => $materialize['js'],
				'css'     => $materialize['css'],
				'classes' => json_decode(
					file_get_contents("https://cdns.nicolaschoquet.fr/?f=materialize-css&v={$version}"),
					true
				),
			];
		}
		return self::FROM_SCRATCH();
	}
}