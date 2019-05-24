<?php
/**
 * Created by originThink
 * Author: GaoYu <gaoyu@time-stone.cn>
 * Date: 2018/11/28
 * Time: 15:16
 */

namespace app\admin\model;

use think\Model;

class Config extends Model
{
    protected $autoWriteTimestamp = true;
    protected $json = ['value'];
    protected $jsonAssoc = true;
}