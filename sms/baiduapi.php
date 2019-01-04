<?
namespace xto\plugins\sms;

use xto\plugins\SMSSender;
use xto\plugins\libs\Util;

class baiduapi extends SMSSender{
	protected $apikey; 

	public function send($tel,$message=''){
		if (empty($tel) || empty($message)) {
			return false;
		}
		$ch = curl_init();
    	$url = "http://apis.baidu.com/kingtto_media/106sms/106sms?mobile=$tel&content=$message";
    	
    	$header = array(
        	"apikey:$this->apikey",
    	);
    	// 添加apikey到header
    	curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	// 执行HTTP请求
    	curl_setopt($ch , CURLOPT_URL , $url);
    	$res = curl_exec($ch);

    	$result=Util::xmlToArray($res);

    	if(strtolower($result['returnstatus'])=='success'){
    		return true;
    	} 
		return false;
	}

	public function configShortDescription(){
		return "百度api";
	}

	public function configDescription(){
		return "百度api";
	}

	public function configLogo(){
		return "/config/plugins/sms/baiduapi.png";
	}

	public function configApikey(){
		return $this->apikey;
	}  
}