<?php

class Cm {

	public static function view( $name) {
		$file = CM_PLUGIN_DIR . 'views/'. $name . '.php';
		include($file);
	}

	public static function getBaseUrl() {
		return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER['SCRIPT_NAME'] . '?page=cm';
	}
}