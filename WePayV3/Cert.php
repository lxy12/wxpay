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

use WeChat\Exceptions\InvalidResponseException;
use WePayV3\Contracts\BasicWePay;
use WePayV3\Contracts\DecryptAes;

/**
 * 平台证书管理
 * Class Cert
 * @package WePayV3
 */
class Cert extends BasicWePay
{
    /**
     * 商户平台下载证书
     * @return void
     * @throws \WeChat\Exceptions\InvalidResponseException
     */
    public function download()
    {
        try {
            $aes = new DecryptAes($this->config['mch_v3_key']);
            $result = $this->doRequest('GET', '/v3/certificates');
            foreach ($result['data'] as $vo) {
                $this->tmpFile($vo['serial_no'], $aes->decryptToString(
                    $vo['encrypt_certificate']['associated_data'],
                    $vo['encrypt_certificate']['nonce'],
                    $vo['encrypt_certificate']['ciphertext']
                ));
            }
        } catch (\Exception $exception) {
            throw new InvalidResponseException($exception->getMessage(), $exception->getCode());
        }
    }
}