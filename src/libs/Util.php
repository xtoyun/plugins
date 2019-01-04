<?
/**
 * ============================================================================
 * * 版权所有 2013-2018 xtoyun.net，并保留所有权利。
 * 网站地址: http://www.xtoyun.net；
 * ============================================================================
 * $Author: xtoyun $ 
*/
namespace xto\plugins\libs

class Util{

	static function strToArray($b,$t){
		$a=explode($b,$t);
		$n=[];
		foreach ($a as $key => $value) {
			$item=explode(':',$value);
			if(count($item)==2){
				$n[$item[0]]=$item[1];
			} 
		} 
		return $n;
	}

	static function xmlToArray($xml){  
    //考虑到xml文档中可能会包含<![CDATA[]]>标签，第三个参数设置为LIBXML_NOCDATA  
	    if (file_exists($xml)) {  
	        libxml_disable_entity_loader(false);  
	        $xml_string = simplexml_load_file($xml,'SimpleXMLElement', LIBXML_NOCDATA);  
	    }else{  
	        libxml_disable_entity_loader(true);  
	        $xml_string = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);  
	    }  
	    $result = json_decode(json_encode($xml_string),true);  
	    return $result;  
	} 
	
	static function arrayToXml($arr,$dom=null,$node=null,$root='xml',$cdata=false){  
	    if (!$dom){  
	        $dom = new DOMDocument('1.0','utf-8');  
	    }  
	    if(!$node){  
	        $node = $dom->createElement($root);  
	        $dom->appendChild($node);  
	    }  
	    foreach ($arr as $key=>$value){  
	        $child_node = $dom->createElement(is_string($key) ? $key : 'node');  
	        $node->appendChild($child_node);  
	        if (!is_array($value)){  
	            if (!$cdata) {  
	                $data = $dom->createTextNode($value);  
	            }else{  
	                $data = $dom->createCDATASection($value);  
	            }  
	            $child_node->appendChild($data);  
	        }else {  
	            arrayToXml($value,$dom,$child_node,$root,$cdata);  
	        }  
	    }  
	    return $dom->saveXML();  
	} 

	static function xml_to_array( $xml )
    {
        $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches))
        {
            $count = count($matches[0]);
            $arr = array();
            for($i = 0; $i < $count; $i++)
            {
                $key = $matches[1][$i];
                $val = Util::xml_to_array( $matches[2][$i] );  // 递归
                if(array_key_exists($key, $arr))
                {
                    if(is_array($arr[$key]))
                    {
                        if(!array_key_exists(0,$arr[$key])) 
                        {
                            $arr[$key] = array($arr[$key]);
                        }
                    }else{
                        $arr[$key] = array($arr[$key]);
                    }
                    $arr[$key][] = $val;
                }else{
                    $arr[$key] = $val;
                }
            }
            return $arr;
        }else{
            return $xml;
        }
    }
}