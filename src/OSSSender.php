<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins;

abstract class OSSSender extends ConfigPlugin implements IPlugin{

	public function __construct(){

	}

	static function createInstance($name, $configs){
		$result=null;
		if(empty($name)){
			return $result;
		}
		$plugin = OSSPlugins::instance()->getPlugin($name);
		if (is_null($plugin)) {
			return $result;
		}else{ 
			$plugin->init($configs);//初始化值
			$result=$plugin;
		}
		return $result;
	}

	abstract function save($file);
}