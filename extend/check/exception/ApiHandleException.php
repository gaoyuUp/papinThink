<?php
/**
 * Created by papinThink
 * Author: GaoYu gaoyu@time-stone.cn
 * Date: 2019
 * Time: 2:45
 */

namespace check\exception;

use think\exception\Handle;

class ApiHandleException extends Handle
{

    /**
     * http 状态码
     * @var int
     */
    public $httpCode = 500;

    public function render(\Exception $e)
    {

        if (config('app_debug') == true) {
            return parent::render($e);
        }
        if ($e instanceof ApiException) {
            $this->httpCode = $e->httpCode;
        }
        return show([], 0, $e->getMessage(), [], $this->httpCode);
    }
}