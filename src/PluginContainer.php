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

abstract class PluginContainer{
    private static $_instance;
    public $app;

    static function instance(){
        if (is_null ( self::$_instance ) || isset ( self::$_instance )) {
            self::$_instance = new static(); 
            self::$_instance->app=App::instance(); 
            //self::$_instance->build();
        }
        return self::$_instance;
    }

    /**
     * 虚拟路径
     * @access public
     * @return string
     */
	abstract function getPluginVirtualPath();

    /**
     * 决对路径
     * @access public
     * @return string
     */
	private function getPluginLocalPath(){
        return $this->root.$this->PluginVirtualPath;
    }

    /**
     * 返回整个插件类信息
     * @access public
     * @return array
     */
	private function getPlugins(){
        return $this->read_dir_queue($this->PluginLocalPath);
    }

    /**
     * 返回单插件类具体类信息
     * @access public
     * @return array
     */
	public function getPluginItem($name){
        $s=$this->plugins;
        if(array_key_exists($name,$s)){
            return $s[$name];
        }
    }

    /**
     * 获取当个实例插件
     * @access public
     * @return IPlugin
     */
	public function getPlugin($name){
		$url= $this->getPluginItem($name)['url'];
        if (!empty($url)) {
            return new $url;
        } 
        return null;
	}

    /**
     * 返回根目录
     * @access public
     * @return string
     */
    public function getRoot(){
        return str_replace('\\','/',realpath(dirname(__FILE__).'/../../'));
    }

    /**
     * 返回目录下的插件信息
     * @access public
     * @return array
     */
    protected function read_dir_queue($dir){  
        $dir=str_replace('/xto/plugins', '/plugins', $dir);
        $files=array();  
        $queue=array($dir);
        while($data=each($queue)){  
            $path=$data['value'];  
            if(is_dir($path) && $handle=opendir($path)){  
                while($file=readdir($handle)){  
                    if($file=='.'||$file=='..') continue; 
                    $real_path=$file;
                    $name=str_replace('.php','',$file);
                    $url=str_replace('/','\\',$this->PluginVirtualPath.'/'.$name);
                    $r = new \ReflectionClass($url);
                    if($r->implementsInterface('\xto\plugins\IPlugin')){
                        $m=new $url;
                        $files[$name] =  array(
                                'description'       => $m->description,
                                'shortdescription'  => $m->shortdescription,
                                'logo'              => $m->logo,
                                'url'               => $url
                            );  
                    }
                    if (is_dir($real_path)) $queue[] = $real_path;  
                }  
            }  
            if(!empty($handle)){
                closedir($handle);  
            }
            
        }  
         return $files;  
    } 

    /**
     * 返回属性
     * @access public
     * @return array
     */
	public function __get($name)              // 这里$name是属性名
    {
        $getter = 'get' . $name;              // getter函数的函数名
        if (method_exists($this, $getter)) {
            return $this->$getter();          // 调用了getter函数
        } else {
            return $this->$name; 
        }
    }

    /**
     * 设置属性
     * @access public
     * @return array
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;             // setter函数的函数名
        if (method_exists($this, $setter)) {
            $this->$setter($value);          // 调用setter函数
        } else {
            $this->$name = $value; 
        }
    } 
}