<?php
/**
 * Created by papinThink
 * Author: GaoYu <gaoyu@time-stone.cn>
 * Date: 2019/1/9
 * Time: 9:10
 */

namespace app\admin\service;

use app\admin\traits\Result;
use app\admin\model\AuthGroup;
use think\facade\Cache;

class AuthGroupService
{
    use Result;

    /**
     * 添加用户组
     * @param $title 用户组名称
     * @return array|string
     * @author GaoYu <gaoyu@time-stone.cn>
     */
    public static function add($title)
    {
        $group = new AuthGroup;
        $group->title = $title;
        $res = $group->save();
        if ($res) {
            $mag = Result::success('添加成功');
        } else {
            $mag = Result::error('添加失败');
        }
        return $mag;
    }

    /**
     * @param $id   用户组id
     * @param $data 修改数据
     * @param bool $authcache 是否删除缓存
     * @author GaoYu <gaoyu@time-stone.cn>
     * @return array|string
     */
    public static function edit($id, $data, $authcache = false)
    {
        if (!$id || !$data) Result::error('参数错误');
        $group = new AuthGroup;
        $res = $group->save($data, ['id' => $id]);
        if ($res) {
            if ($authcache) {
                Cache::clear(config('auth.cache_tag'));//清除Auth类设置的缓存
            }
            $mag = Result::success('编辑成功');
        } else {
            $mag = Result::error('编辑失败');
        }
        return $mag;
    }
}