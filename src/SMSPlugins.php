<?
namespace xto\plugins;

use xto\App;

class SMSPlugins extends PluginContainer{
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

	//获取插件信息
	//private function build(){
	//	$this->_plugins=$this->read_dir_queue($this->PluginLocalPath);
	//}

	public function getPluginVirtualPath(){
		return '/plugins/sms';
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