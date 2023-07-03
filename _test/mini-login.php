<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2023 ThinkAdmin [ thinkadmin.top ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免责声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/WeChatDeveloper
// | github 代码仓库：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

include '../include.php';

// 小程序配置
$config = [
    'appid'     => 'wx6bb7b70258da09c6',
    'appsecret' => '78b7b8d65bd67b078babf951d4342b42',
];

// 解码数据
$iv = 'ltM/wT7hsAl0TijEBI4v/g==';
$code = '013LyiTR0TwjC92QjJRR0mEsTR0LyiT3';
$decode = 'eIoVtIC2YzLCnrwiIs1IBbXMvC0vyL8bo1IhD38fUQIRbk3lgTWa0Hdw/Ty7NTs3iu7YlqqZBti+cxd6dCfeXBUQwTO2QpbHg0WTeDAdrihsHRHm4dCWdfTx8rzDloGbNOIsKdRElIhUH5YFdiTr5AYiufUDb34cwJ4GNWLAUq4bR0dmFeVEi+3nfwe2MAjGYDl4aq719VLsHodOggK6lXZvM5wjoDyuZsK2dPqJr3/Ji30Z0mdyFq32R4uR3rtJH/h+Rj0+/QmE9QYG7Y6Z48hgPE8cpnhRQNwH49jnC/zKZ9wtDkQ/J8J3Ed2i58zcuY01v8IV+pZ8oBUKXfO5ha+APOxtBSTzyHraU/2RGo8UWtOF6h64OQZhd/UQQy362eyc/qoq8sF9JnEFRP0mRmTDJ+u9oyDhxswCu6x8V73ERWaJeEGSCyjiGpep7/DxZ6eSSBq36OB0BWBkJqsq9Q==';
$sessionKey = 'OetNxl86B/yMpbwG6wtMEw==';

// $mini = \We::WeMiniCrypt($config);
// $mini = new WeMini\Crypt($config);
$mini = \WeMini\Crypt::instance($config);

echo '<pre>';
//print_r($mini->session($code));
print_r($mini->decode($iv, $sessionKey, $decode));
//print_r($mini->userInfo($code, $iv, $decode));