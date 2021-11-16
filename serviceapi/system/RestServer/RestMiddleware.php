<?php 
function errcode($code) {
	switch($code) {
		case 404 :
			header("HTTP/1.0 404 Not Found"); die();
			break;
	}
}