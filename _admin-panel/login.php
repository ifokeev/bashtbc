<?
session_start();

DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('../connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');
include_once(_ROOTPATH.'bash_inc/filter.php');

if( !empty($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['passwd']) ){

if( $dat = $db->queryCheck("SELECT odm_login, odm_status FROM bash_odmins WHERE odm_login = '".textfilter($_POST['login'])."' AND odm_passw = '".md5($_POST['passwd'])."'") ){

$_SESSION['admincp'] = true;    session_register('admincp');
$_SESSION['login']   = $dat[0]; session_register('login');
$_SESSION['status']  = $dat[1]; session_register('status');

header('Location: index.php');

} else {

die;

}

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link rel=stylesheet type="text/css" href="main.css">
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY bgColor=#ffffff>

<form action='' method=post>
<table width=210 border=1 align=center>
<tr height=30> <td width=50 align=center><b>Login:</b></td> <td width=50 align=center><input type=text name=login size=10  maxlength=20></td> </tr>
<tr height=30> <td width=50 align=center><b>Password:</b></td> <td width=50 align=center><input type=password name=passwd size=10  maxlength=20></td> </tr>
</table>

<br />

<center> <input type=submit name=submit value=Войти style="width:100px;"> <input type=reset value=Очистить style="width:100px;"> </center>

</form>

</body>
</html>