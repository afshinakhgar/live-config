live-config
===========

live config is an laravel package that help us to manage configs from database( database driven configuration system)
with this small package you can manage your configuaration from database and you are not depend on filesystem configuration anymore

- this is my first laravel package . please let me know if any error happend
thanks

===========

Requires
===========

    php: >=5.4.0
    illuminate/support: 4.2.*



Installation
===========
for installing this package you can use composer 

add this line in your composer <br>
<code>"afshin/live-config": "dev-master"</code>
>> after that add this to the end of your config/app.php file 
<br>
<code>
    'providers' => array(
			.......
			'Afshin\LiveConfig\LiveConfigServiceProvider'
		);

</code>
you should also do the migrate to add database for configuration table >>>

<br>
<br>
<code>
	php artisan migrate --package="afshin/live-config"
</code>

Usage
===========
for set a config with config name and value you should  use like below :
<br>
<code>
	 LiveConfig::set('bank_id','xxx-xxxx-xxxx');

</code>
<p>
<br>
it will save in afshin_live_config table in database;
</p>

<code>
		$bankid = LiveConfig::get('bank_id')
<br>
if you echo $bankid ; it will retrive xxx-xxxx-xxxx value that stored in database
</code>

<p>
also you can pass array to both functions . 
<br>
<code>
$configs = LiveConfig::get(array('bank_id','bank_name','valid_ip'));
</code>

<br>
it retrive values of bank_id and bank_name and valid_ip as an array like below
<br>
it will return this :
<br>
<code>
	array('bank_id'=>'xxx-xxxx-xxxxx','bank_name'=>'saman','valid_ip'=>'bla bala bla');
<br>
</code>
also you can set data and value with an array with key: name of configuration and value : value of configuration 

</p>
