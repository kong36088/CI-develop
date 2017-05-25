<?php

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/21
 * Time: 14:52
 */
class JsonOut
{
    const SUCCESS_CODE = 1;
    const FAIL_CODE = -1;
    /** 输出代码 */
    const OUTPUT_CODE = 2;
    const DATA_CODE = 3;
    const SUCCESS_STATUS = 'ok';
    const FAIL_STATUS = 'fail';
    const DATA_STATUS = 'data';

    /**
     * 成功
     * @param string $message
     * @param array $data
     * @param int $code
     * @param string $status
     * @param array $header
     */
    public function success($message = '', $data = array(), $code = self::SUCCESS_CODE, $status = self::SUCCESS_STATUS, $header = array())
    {
        header('Content-Type: application/json');
        if (is_array($header)) {
            foreach ($header as $h) {
                header($h);
            }
        }
        echo json_encode(array('code' => $code, 'message' => $message, 'data' => $data, 'status' => $status));
    }

    /**
     * 失败
     * @param string $message
     * @param array $data
     * @param int $code
     * @param string $status
     * @param array $header
     */
    public function fail($message = '', $data = array(), $code = self::FAIL_CODE, $status = self::FAIL_STATUS, $header = array())
    {
        header('Content-Type: application/json');
        if (is_array($header)) {
            foreach ($header as $h) {
                header($h);
            }
        }
        echo json_encode(array('code' => $code, 'message' => $message, 'data' => $data, 'status' => $status));
    }

    /**
     * 输出信息
     * @param string $message
     * @param array $data
     * @param int $code
     * @param array $header
     */
    public function output($message = '', $data = array(), $code = self::OUTPUT_CODE, $header = array())
    {
        header('Content-Type: application/json');
        if (is_array($header)) {
            foreach ($header as $h) {
                header($h);
            }
        }
        echo json_encode(array('code' => $code, 'message' => $message, 'data' => $data, 'status' => self::DATA_STATUS));
    }

    /**
     * 输出json数据
     * @param array $data
     * @param int $code
     * @param array $header
     */
    public function data($data = array(), $code = self::DATA_CODE, $header = array())
    {
        header('Content-Type: application/json');
        if (is_array($header)) {
            foreach ($header as $h) {
                header($h);
            }
        }
        echo json_encode(array('code' => $code, 'message' => '', 'data' => $data,'status'=>self::SUCCESS_STATUS));
    }
}
