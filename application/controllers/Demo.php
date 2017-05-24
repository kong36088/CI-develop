<?php

/**
 * User: wellsjiang
 * Date: 2017/5/24
 * Time: 17:01
 */
class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /**
         * 获取get请求参数
         * 这里cleanInput是我们自己编写的方法，主要防止xss、sql注入，但是会转义敏感字符
         * cleanInput定义在application/helpers/functions_helper.php下，最好每个输入都带上cleanInput
         */
        $getData = cleanInput($this->input->get('testGet'));
        $postData = cleanInput($this->input->post('testPost'));
        //echo $getData;

        /**
         * 系统封装的固定的json数据格式输出
         * ci框架原因所以library加载要用小写
         */
        $this->load->library('jsonout'); //加载JsonOut类库，定义在application/libraries/JsonOut.php
        //$this->jsonout->success('这里是成功的提示', array('data1' => 1, 'data2' => 2, 'data3' => 'data3'));
        //$this->jsonout->fail('这里是失败的提示', array('data1' => 1, 'data2' => 2, 'data3' => 'data3'));
        //$this->jsonout->output('这里是消息的提示', array('data1' => 1, 'data2' => 2, 'data3' => 'data3'));
        $this->jsonout->data(array('data1' => 1, 'data2' => 2, 'data3' => 'data3'));
    }
}
