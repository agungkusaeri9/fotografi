<?php

if (!function_exists('format_tanggal')) {
	date_default_timezone_set('Asia/Jakarta');
	function format_tanggal($tanggal, $format = 'd-m-Y')
	{
		return date($format, strtotime($tanggal));
	}
}

if (!function_exists('format_rupiah')) {
	function format_rupiah($number)
	{
		return 'Rp ' . number_format($number, 0, ',', '.');
	}
}

function isAuth()
{
	$ci = get_instance();
	$auth = $ci->session->userdata('id');
	if (!$auth) {
		return redirect('/');
	}
}
