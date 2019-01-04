<?
namespace xto\plugins\oss;

use xto\plugins\OSSSender;
require('./vendor/alioss/sdk.class.php');

class alioss extends OSSSender{
	protected $access_id;
	protected $access_key;
	protected $hostname;
	protected $bucket; 

	public function __construct(){
		parent::__construct();
		
	}

	public function save($file){
	    $oss = new ALIOSS($this->access_id,$this->access_key, $this->hostname, $security_token = NULL);
	    //要上传的文件服务器地址
	    //$file_path = $_SERVER['DOCUMENT_ROOT'].'/'.$data;
	    //$res = $oss->upload_file_by_file($bucket, $data, $file_path);
	    //$array=(array)$res;
	    //switch ($array['status']) {
	    //  case '200':
	    //    return true;
	    //  default:
	    //    return false;
	    //}
	}

	public function configShortDescription(){
		return "alioss";
	}

	public function configDescription(){
		return "阿里云OSS云存储";
	}

	public function configLogo(){
		return "/config/plugins/oss/alioss.png";
	}

	public function configAccess_id(){
		return $this->access_id;
	} 

	public function configAccess_key(){
		return $this->access_key;
	}

	public function configHostname(){
		return $this->hostname;
	}

	public function configBucket(){
		return $this->bucket;
	}  
}