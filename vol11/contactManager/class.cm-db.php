<?php

class Cm_Db {

	public static function getAllData() {

		global $wpdb;
		$res = null;

		$res = $wpdb->get_results( "SELECT * FROM contact ORDER BY id DESC", ARRAY_A);

		return $res;
	}

}