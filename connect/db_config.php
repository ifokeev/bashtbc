<?
DEFINE('BASHTBC.RU_FREE_QUOTE_SCRIPT', 0);   //не стирать, либо за работу скрипта не отвечаю.

Error_Reporting(E_ALL & ~E_NOTICE);

base64_decode
('aWYoIWRlZmluZWQoYmFzZTY0X2RlY29kZSgnVTBOU1NWQlVSVVFnUWxrZ2N5RXUnKSkpeyBkaWU7IH0=')
;

$db_config =
array(
'name'        => 'bashTBC.ru - "To be CLONED" :)',            //title сайта  (указывать обязательно)
'server'      => 'localhost',                                 //сервер сайта (указывать обязательно)
'IMGserver'   => 'localhost/images',                          //путь до папки с картинками (указывать обязательно)
'db_hostname' => 'localhost',                                 //mysql-хост
'db_username' => 'root',                                      //mysql-логин
'db_password' => '',                                          //mysql-пароль
'db_name'	  => 'bashTBCru'                                  //mysql-база с дампом bashtbc.ru
);


//скрипт советую не исправлять, либо за работу всей системы не отвечаю.
?>
