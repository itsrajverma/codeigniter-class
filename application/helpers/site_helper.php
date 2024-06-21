<?php

if(!function_exists('pr'))
{
	function pr($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}



if(!function_exists('success'))
{
	function success($str){
		$CI =& get_instance();
		return $CI->session->set_flashdata('success',$str);
	}
}

if(!function_exists('error'))
{
	function error($str){
		$CI =& get_instance();
		return $CI->session->set_flashdata('error',$str);
	}
}

if ( ! function_exists('redirect_back')) {
	function redirect_back()
	{
		if (isset($_SERVER['HTTP_REFERER'])) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			header('Location: http://' . $_SERVER['SERVER_NAME']);
		}
		exit;
	}
}



/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
	function getHashedPassword($plainPassword)
	{
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
	function verifyHashedPassword($plainPassword, $hashedPassword)
	{
		return password_verify($plainPassword, $hashedPassword) ? true : false;
	}
}
