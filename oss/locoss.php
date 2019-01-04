<?
namespace xto\plugins\oss;

use xto\plugins\OSSSender;


class locoss extends OSSSender{
	protected $folder='/uploads/oss/'; 

	public function __construct(){
		parent::__construct();
		
	}

	public function save($file){
		$arr=array('msg'=>'上传失败','success'=>false);
		$info = $file->move(ROOT_PATH . $this->folder);  
		if ($info) {
			$arr = array(
			    'msg' 		=> '上传成功',
			    'success' 	=> true,
			    'path' 		=> $this->folder .$info->getSaveName()
			);
		}
		return $arr;
	}

	public function configShortDescription(){
		return "locoss";
	}

	public function configDescription(){
		return "本地存储";
	}

	public function configLogo(){
		return "/config/plugins/oss/alioss.png";
	}

	public function configFolder(){
		return $this->folder;
	}  
}