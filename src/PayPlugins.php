<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins;

use xto\App;

class PayPlugins extends PluginContainer{
	// private static $_instance;
	// public $app;
	// protected $_plugins;

	// //构建实例
	// static function instance(){
	// 	if (is_null ( self::$_instance ) || isset ( self::$_instance )) {
 //            self::$_instance = new self (); 
 //            self::$_instance->app=App::instance(); 
 //            self::$_instance->build();
 //        }
 //        return self::$_instance;
	// }

	// //获取插件信息
	// private function build(){
	// 	$this->_plugins=$this->read_dir_queue($this->PluginLocalPath);
	// }

	public function getPluginVirtualPath(){
		return '/plugins/pay';
	}

	// public function getPluginLocalPath(){
	// 	return $this->root.$this->PluginVirtualPath;
	// }

	// public function getPlugins(){
	// 	return $this->_plugins;
	// }

	// public function getPluginItem($name){
	// 	if(array_key_exists($name,$this->_plugins)){
	// 		return $this->_plugins[$name];
	// 	}
	// }
}