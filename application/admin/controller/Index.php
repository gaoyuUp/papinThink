<?php
/**
 * Created by papinThink
 * Author: GaoYu <gaoyu@time-stone.cn>
 * Date: 2019/4
 * Time: 15:24
 */
namespace app\admin\controller;

use auth\Auth;
use app\admin\model\User;

class Index extends Common
{
    /**
     * 首页
     * @return mixed
     * @author GaoYu <gaoyu@time-stone.cn>
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        //获取菜单
        $menuList = (new Auth($this->uid, $this->group_id))->getMenuList();
        $this->assign('menuList', $menuList);
        $info = User::get($this->uid)->hidden(['password']);
        $info['head'] ? : $info['head'] = '/images/Gao.jpg';
        $this->assign('info', $info);
        return $this->fetch();
    }

    /**
     * layui 首页
     * @return mixed
     * @author GaoYu <gaoyu@time-stone.cn>
     */
    public function home()
    {
        return $this->fetch();
    }

}
