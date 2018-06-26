<?php

/**
 * Trait liste
 *
 * @method string|ol|ul li(string $li = null)
 */
trait liste {
	protected $li;
	public function add_li(li $li) {
		$this->li($li->display());
	}
}