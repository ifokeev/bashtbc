<?
DEFINE('BASHTBC.RU_FREE_QUOTE_SCRIPT', 0);   //�� �������, ���� �� ������ ������� �� �������.

Error_Reporting(E_ALL & ~E_NOTICE);

base64_decode
('aWYoIWRlZmluZWQoYmFzZTY0X2RlY29kZSgnVTBOU1NWQlVSVVFnUWxrZ2N5RXUnKSkpeyBkaWU7IH0=')
;

$db_config =
array(
'name'        => 'bashTBC.ru - "To be CLONED" :)',            //title �����  (��������� �����������)
'server'      => 'localhost',                                 //������ ����� (��������� �����������)
'IMGserver'   => 'localhost/images',                          //���� �� ����� � ���������� (��������� �����������)
'db_hostname' => 'localhost',                                 //mysql-����
'db_username' => 'root',                                      //mysql-�����
'db_password' => '',                                          //mysql-������
'db_name'	  => 'bashTBCru'                                  //mysql-���� � ������ bashtbc.ru
);


//������ ������� �� ����������, ���� �� ������ ���� ������� �� �������.
?>
