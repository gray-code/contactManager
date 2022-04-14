<?php

class Cm_Db {

	public static function getDataFromId($id) {

		global $wpdb;
		$res = null;

		$res = $wpdb->get_row( $wpdb->prepare("SELECT * FROM contact WHERE id = %d", $id), ARRAY_A);

		return $res;
	}


	public static function getAllData() {

		global $wpdb;
		$res = null;

		$res = $wpdb->get_results( "SELECT * FROM contact ORDER BY id DESC", ARRAY_A);

		return $res;
	}

}