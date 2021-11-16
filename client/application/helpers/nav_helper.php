<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('active_link'))
{
    function active_link($controller)
    {
        $CI = get_instance();
         
        $class = $CI->router->fetch_class();

        if ($class == "Home") {
        	$menu = "Dashboard";
        } elseif ($class == "Penerimabeasiswa" || $class == "Jenisbeasiswa" || $class == "Mahasiswa" || $class == "Siswa" || $class == "Alumni" || $class == "Datapkm" || $class == "Databaa" || $class == "Dataraport" || $class == "Akun" || $class == "Detailbeasiswa") {
        	$menu = "Master";
        } else {
            $menu = "";
        }
 
        return ($menu == $controller) ? 'active open selected' : $menu;
    }
}