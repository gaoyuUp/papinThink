<?php
/**
 * Created by originThink
 * Author: GaoYu <gaoyu@time-stone.cn>
 * Date: 2018/1/16
 * Time: 15:24
 */
namespace app\admin\controller;

use auth\Auth;

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
