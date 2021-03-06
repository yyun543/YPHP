<?php
/**
 * 示例控制器
 */
namespace app\controllers;

use yphp\view;
use app\models;
class indexController extends \yphp
{
    use view;
    /*
    * index方法
    */
    public function index()
    {
    	// 实例化模型
    	$model = M('users');
    	$user_arr = $model->getAllUsers();
    	// P($user_arr);
    	$conf['WEBTITLE']='欢迎使用YPHP';
        $conf['DESC']='YPHP是一个轻量级的现代化PHP开发框架';
        // 设置模板变量
    	$this->assign('conf',$conf);
        // 渲染模板
        $this->display('index/index.html');
    }
    /*
    * hello方法
    */
    public function hello(){
        // 测试redis
        $conf = [
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'password' => '',
            'database' => 2,
        ];
        $redis = new \yphp\lib\Redis\Redis;
        $redis->config($conf);
        $redis->hSet('user', '1', 'bugli');
        var_dump($redis->hGetAll('user'));
    }

    public function stest(){
        \yphp\session::set('name','bugli_666');
        P(\yphp\session::get('name'));
    }


}

