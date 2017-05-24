<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/20
 * Time: 22:35
 */

if (!function_exists('cleanInput')) {
	/**
	 * 防止注入，清除转义输入
	 */
	function cleanInput($value)
	{
		if (is_array($value)) {
			foreach ($value as $key => $v) {
				$value[$key] = cleanInput($value);
			}
		} else {
			$value = htmlspecialchars(strip_tags($value));
		}
		return $value;
	}
}

if (!function_exists('generate_salt')) {
	/**
	 * 生成盐值
	 * @param int $length
	 * @return string
	 */
	function generate_salt($length = 4)
	{
		$salt = '';
		for ($i = 0; $i < $length; $i++) $salt .= chr(rand(97, 122));
		return $salt;
	}
}

if (!function_exists('date_now')) {
	/**
	 * 获取当前时间
	 * @return bool|string
	 */
	function date_now($unixTime = '')
	{
		if (empty($unixTime)) {
			return date('Y-m-d H:i:s');
		} else {
			return date('Y-m-d H:i:s', $unixTime);
		}
	}
}

if (!function_exists('compile_pass')) {
	/**
	 * 获得加密后的密码
	 * @param $password
	 * @param $salt
	 * @return string
	 */
	function compile_pass($password, $salt = '')
	{
		return md5($password . $salt);
	}
}


if (!function_exists('get_page_nav')) {
	/**
	 * 取得分页代码
	 * @param array
	 * @return string
	 */
	function get_page_nav($config)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');

		// 如果没有传递base url参数过来
		if (!isset($config['base_url'])) {
			$uri = get_current_uri();
			$config['base_url'] = site_url($uri);
		}

		$CI->pagination->initialize($config);

		return $CI->pagination->create_links();
	}
}

if (!function_exists('get_current_uri')) {
	/**
	 * 取得当前uri
	 * @return string
	 */
	function get_current_uri()
	{
		$CI =& get_instance();

		// 当前控制器和方法
		$controller = $CI->router->fetch_class();
		$method = $CI->router->fetch_method();
		// 当前uri
		$uri = $controller . '/' . $method;

		return $uri;
	}
}

if (!function_exists('generate_code')) {
	/**
	 * 获取随机验证码
	 * @param int $length
	 * @return int 验证码
	 */
	function generate_code($length = 6)
	{
		$code = '';
		for ($i = 0; $i < $length; $i++) {
			$code .= rand(0, 9);
		}
		return $code;
	}
}
