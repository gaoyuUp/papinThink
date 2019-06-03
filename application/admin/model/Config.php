<?php
/**
 * Created by papinThink
 * Author: GaoYu <gaoyu@time-stone.cn>
 * Date: 2019/1/06
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