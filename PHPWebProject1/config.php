<?php

require 'api/facebook.php';

$config['App_ID'] = '450363515303612';
$config['App_Secret'] = '0ee56926808adc4212ab8a55e18a81cd';

$facebook = new Facebook(array(
 'appId'  => $config['App_ID'],
 'secret' => $config['App_Secret']
));

?>