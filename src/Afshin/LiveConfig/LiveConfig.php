<?php namespace Afshin\LiveConfig;
use Afshin\LiveConfig\Model\AfshinLiveConfig; 
class LiveConfig {
 
	/**
	* a function to set configuration in database(set value to the name ref)
	* also it will update a row of config if it could find it in database
	* @param string $name
	* @param string $value
	* @return  $value
	*/
	public static function set($name,$value=null)
	{	

		// actualy I don't recommend this way (I dont Like it)
		if(is_array($name)){
			/* $name array here is an array of configuration
				that key refered to the name of configuration and the value refered to the values of the 
			*/
			foreach($name as $keys=>$values){
				$config = AfshinLiveConfig::where('config_name',$name)->first();
				if($config){
					$config->value = $values;
					$config->save();
				}else{
					$config = new AfshinLiveConfig;
					$config->config_name =  $keys;
					$config->value = $values;
					$config->save();
				}
			}
			return $name;
		}
		// if same name was in database . we update that value
		$config = AfshinLiveConfig::where('config_name',$name)->first();
		if($config){
			$config->value = $value;
		}else{
			$config = new AfshinLiveConfig;
			$config->config_name = $name;
			$config->value = $value;
		}
		$config->save();
		return $value;
	}



	/**
	* get value of a configuration stored in database
	* @param string $name
	* @param string $value
	*/
	public static function get($name){
		if(is_array($name)){
			/* $name array here is an array of configuration
			   that key refered to the name of configuration 
			*/
		    $configs = AfshinLiveConfig::whereIn('config_name', $name)->get();
		   	$configArr = array();
		   	if(!$configArr){
		   		foreach($configs as $conf){
					$configArr[$conf->config_name] = $conf->value;
				}
		   	}
			
			// it will return an array of configuration
	    	return $configArr;

		}

		// get single configuration from db
		$config = AfshinLiveConfig::where('config_name',$name)->first();
		if($config){
			return $config->value;
		}else{
			return null;
		}
	}




}