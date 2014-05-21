<?
DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

session_start();

if( !session_is_registered('admincp') || empty($_SESSION['login']) )
{
	Header('Location: login.php');
	die;
}
if( !empty($_GET['act']) && $_GET['act'] == 'exit' )
{
	session_destroy();
	Header('Location: index.php');
	die;
}

include_once('../connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');


switch($_GET['index']){
case 'new_quotes'; $view = 'Поступившие цитаты';   break;
case 'redact';     $view = 'Редактировать цитату'; break;
case 'del';        $view = 'Удалить цитату';       break;
}


if( !empty($_GET['index']) && $_GET['index'] == 'new_quotes' && !empty($_GET['add']) && is_numeric($_GET['add']) ){
$db->execQuery("UPDATE bash_approved SET bash_razdel = 'index', bash_appBY = '".$_SESSION['login']."' WHERE bash_app_id = '".intval($_GET['add'])."'");
$_GET['add'] = false;
}

if( !empty($_GET['index']) && $_GET['index'] == 'redact' &&  !empty($_POST['redact_qoute']) && !empty($_POST['content']) && !empty($_POST['status']) && (!empty($_POST['bash_id']) && is_numeric($_POST['bash_id']) ) ){
$db->execQuery("UPDATE bash_approved SET bash_razdel = '".$_POST['status']."', bash_text = '".$_POST['content']."' WHERE bash_app_id = '".intval($_POST['bash_id'])."'");
header('location: index.php?index=redact&do='.$_POST['bash_id']);
}

if( !empty($_GET['index']) && $_GET['index'] == 'del' && !empty($_GET['id']) && is_numeric($_GET['id']) ){
if( $db->queryRow("SELECT bash_app_id FROM bash_approved WHERE bash_app_id = '".intval($_GET['id'])."'") ){
$db->execQuery("DELETE FROM bash_approved WHERE bash_app_id = '".intval($_GET['id'])."'");
$msg = '<b>Цитата успешно удалена</b>';
}
}

$_bash = $db->queryArray("SELECT * FROM bash_approved WHERE bash_razdel = 'abyss'");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<link rel=stylesheet type="text/css" href="main.css">
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY bgColor=#ffffff>
<table width="20%" height="100%" align=left border="1" bordercolor="black">
        <tr> <td height="30" align=center> Функция </td> </tr>
  <tr>
    <td height="370" align=center>
     <a href="javascript: window.location.href='?index=new_quotes';">Новые цитаты</a><br />
     <a href="javascript: window.location.href='?index=redact';">Редактировать цитату</a><br />
     <a href="javascript: window.location.href='?index=del';">Удалить цитату</a><br />
     <a href="javascript:window.location.href='?act=exit'">Выйти из админка</a><br />
   </td>
  </tr>
</table>
<table width="80%%" height="100%" align=center border="1" bordercolor="black">
        <tr> <td height="30" align=center>  <div><?=$view;?></div> </td>
        <tr> <td height="370" align=center>
<? if( !empty($msg) ){ echo '<center>'.$msg.'</center>'; } ?>
<? if(!empty($_GET['index']) && $_GET['index'] == 'del'){ ?>
          <table width="100%">
		  <tr>
           <form action='index.php?index=del' METHOD=GET>  <input type=hidden name="index" value="del"> <td align=center> ID цитаты:   <input type="text" name="id" size="20" maxlength="30" value=""> </td> <td align=left> <input type=submit value="Удалить эту цитату"> </td> </form>
          </tr>
          </table>
<? } ?>

<? if(!empty($_GET['index']) && $_GET['index'] == 'redact'){ ?>
<? if( empty($_GET['do']) ){ ?>
          <table width="100%">
		  <tr>
           <form action='index.php?index=redact' METHOD=GET> <input type=hidden name="index" value="redact"> <td align=center> ID цитаты:   <input type="text" name="do" size="20" maxlength="30" value=""> </td> <td align=left> <input type=submit value="Редактировать"> </td> </form>
          </tr>
          </table>
<? } else { ?>
<? if( !$dat = $db->queryCheck("SELECT bash_app_id, bash_text, bash_razdel FROM bash_approved WHERE bash_app_id = '".intval($_GET['do'])."'") ){ die; } ?>

					<form action='' method=post>
					<input type=hidden name="bash_id" value="<?=$dat[0];?>">
					<textarea name=content rows=20 cols=55><?=$dat[1];?></textarea><br /><br />
					Положение цитаты:
					<select name=status>
					<option value="index" <? if($dat[2] == 'index'){ echo 'selected'; } ?>>главная страница</option>
					<option value="abyss" <? if($dat[2] == 'abyss'){ echo 'selected'; } ?>>бездна</option>
					</select>
					<br /><br /><br />
					<input type=submit name="redact_qoute" value=Сохранить> <input type=reset value=Очистить>
					</form>

<? } ?>
<? } ?>

<? if(!empty($_GET['index']) && $_GET['index'] == 'new_quotes'){ ?>
          <table width="100%" valign=top>
<? if(!empty($_bash)){ ?>
<? foreach($_bash as $v){ ?>
		  <tr>
		  <td width=500><textarea name="new_Info" cols="130" rows="5"><?=$v['bash_text'];?></textarea><br /><br /></td>
		  <td width=200 valign=center align=center><a href="javascript:window.location.href='?index=new_quotes&add=<?=$v['bash_app_id'];?>'">Одобрить</a><br><a href="?index=redact&do=<?=$v['bash_app_id'];?>">Редактировать</a><br><a href="?index=del&id=<?=$v['bash_app_id'];?>">Удалить</a><br><br></td>
		  </tr>
<? } ?>
<? } ?>
          </table>
<? } ?>

        </td> </tr>
</table>
</body>
</html>