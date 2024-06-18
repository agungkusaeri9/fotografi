<?php


if (!function_exists('format_tanggal')) {
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
