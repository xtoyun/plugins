<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins;

abstract class ConfigPlugin{
    /**
     * 实例化当前对象
     * @access public
     * @return string 地址/
     */
	abstract function configLogo();
	
    /**
     * 短介绍
     * @access public
     * @return string 地址/
     */
	abstract function configShortDescription();

    /**
     * 描述
     * @access public
     * @return string 地址/
     */
	abstract function configDescription();

    /**
     * 获取所有配置的属性
     * @access public
     * @return array 
     */
	public function getData(){
        $a=array();
		$class_methods=get_class_methods($this);
		$i=0;
		foreach ($class_methods as $method_name){
			if(!strstr($method_name, 'config')){
				unset($class_methods[$i]);
			}else{ 
                switch ($method_name) {
                    case 'configDescription':
                        $a['描述']=$this->description;
                        break; 
                    case 'configShortDescription':
                        $a['类型']=$this->shortdescription;
                        break;
                    case 'configLogo':
                        //$a['图标']=$this->logo;
                        break;
                    default:
                        $key=strtolower(ltrim($method_name, "config"));
                        $a[$key]=$this->{$key};
                        break;
                } 
            }
			$i++;
		}
		return $a;
	}

    /**
     * 初始化配置信息
     * @access public
     * @return void 
     */
    public function init($configs){
        if (!empty($configs)) {
            $arr=$configs;
            if(!is_object($configs)){
                $arr=json_decode($configs,true);
            } 
            if(is_array($arr)){
                foreach ($arr as $key => $value){
                    $this->{$key}=$value; 
                } 
            }
        } 
    }

    /**
     * 获取属性
     * @access public
     * @return string 
     */
	public function __get($name)              // 这里$name是属性名
    {
        $getter = 'config' . $name;              // getter函数的函数名
        if (method_exists($this, $getter)) {
            return $this->$getter();          // 调用了getter函数
        } else {
            return $this->$name; 
        }
    }

    /**
     * 设置属性
     * @access public
     * @return string 
     */
    public function __set($name, $value)
    {
        $setter = 'config' . $name;             // setter函数的函数名
        if (method_exists($this, $setter)) {
            $this->$setter($value);          // 调用setter函数
        } else {
            $this->$name = $value; 
        }
    } 
}