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

namespace WePayV3;

use WePayV3\Contracts\BasicWePay;

/**
 * 支付即服务
 * Class Profitsharing
 * @package WePayV3
 */
class ServiceStaff extends BasicWePay
{
    /**
     * 分配服务人员
     * Date: 2023/5/24
     * User: lxy
     * @param $guide_id
     * @param $out_trade_no
     * @return array|string
     * @throws \WeChat\Exceptions\InvalidResponseException
     */
    public function allocation($guide_id, $out_trade_no, $sub_mchid = '')
    {
        $data['sub_mchid'] = $sub_mchid;
        $data['out_trade_no'] = $out_trade_no;
        return $this->doRequest('POST', '/v3/smartguide/guides/' . $guide_id .'/assign', json_encode($data, JSON_UNESCAPED_UNICODE), true);
    }

}
