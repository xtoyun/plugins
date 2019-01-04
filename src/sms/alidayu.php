<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins\sms;

use xto\plugins\SMSSender;

class alidayu extends SMSSender{
	protected $key;
	protected $pwd;

	public function send($tel,$message=''){
		dump($tel);
		dump($message);
		dump($this->key);
		dump($this->pwd);
	}

	public function configShortDescription(){
		return "阿里大鱼";
	}

	public function configDescription(){
		return "阿里云旗下短信发送平台www.aliyun.com";
	}

	public function configLogo(){
		return "/config/plugins/sms/alidayu.png";
	}

	public function configKey(){
		return $this->key;
	} 

	public function configPwd(){
		return $this->pwd;
	}
}