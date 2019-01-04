<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins\pay;

use xto\plugins\PayRequest;


class wepay extends PayRequest{
	protected $appid=''; 
	protected $key='';

	public function __construct(){
		parent::__construct();
		
	}

	public function send(array $args,$notify_url=null,$return_url=null){
		
	}

	public function configShortDescription(){
		return "微信支付";
	}

	public function configDescription(){
		return "微信支付(mp.weixin.qq.com)";
	}

	public function configLogo(){
		return "/config/plugins/pay/wepay.png";
	}

	public function configAppid(){
		return $this->appid;
	}  

	public function configKey(){
		return $this->key;
	} 
}