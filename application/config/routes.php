<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['baiviet']='Welcome/index';
// $route['chuyen-muc']='Welcome/chuyenmuc';
// $route['sanpham/:num']='Welcome/sanpham';
// $route['hoc-sinh/(:any)']='Welcome/hocsinh/$1';
$route['sinhvien']='SinhvienControllres';
$route['vd']='Smarty_Example';
$route['dangnhap']='loginController';
// $route['logout']='loginController/logout';
/*$route['themsinhvien']='SinhvienControllres/insert';*/
$route['default_controller'] = 'SinhvienControllres';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['san-pham']='Welcome/shoes';
$route['phancong']='Phanconggiangday';
