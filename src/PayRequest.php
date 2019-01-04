<?
namespace xto\plugins;

abstract class PayRequest extends ConfigPlugin implements IPlugin{

	public function __construct(){

	}

	/**
     * 实例化当前对象
     * @access public
     * @name 名称
     * @config 配置信息
     * @name 提交订单支付
     * @return BizActorProvider
     */
	static function createInstance($name, $configs){
		$result=null;
		if(empty($name)){
			return $result;
		}
		$plugin = PayPlugins::instance()->getPlugin($name);
		if (is_null($plugin)) {
			return $result;
		}else{ 
			$plugin->init($configs);//初始化值
			$result=$plugin;
		
		return $result;}
	}

	abstract function send(array $args,$notify_url=null,$return_url=null);
}