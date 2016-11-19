<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/20
 * Time: 23:26
 */
class Seeder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->input->is_cli_request()) {
			show_404();
			return;
		}
	}

	//在这里填写seeder开始选项
	public function start()
	{
	}


}