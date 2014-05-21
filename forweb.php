<?
DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');

if(!DEFINED('BASHTBC.RU_FREE_QUOTE_SCRIPT')) die;



$_bash       = $db->SQL_fetch_row($db->query("SELECT * FROM ".PREFIX."approved AS bash1 JOIN (SELECT ROUND(RAND() * (SELECT MAX(".PREFIX."app_id) FROM ".PREFIX."approved)) AS id) AS bash2 WHERE bash1.".PREFIX."app_id >= bash2.id AND bash1.".PREFIX."razdel = 'index' ORDER BY bash1.".PREFIX."app_id ASC LIMIT 1"));

$_bash[2] = str_replace( '&lt', '&lt;', $_bash[2]   );
$_bash[2] = str_replace( '<', '&lt;', $_bash[2]   );
$_bash[2] = str_replace( '>', '&gt;', $_bash[2]   );

$_bash[2] = split( '&lt;br /&gt;', $_bash[2]);
$_bash[2] = implode( "<' + 'br>", $_bash[2] );



if( !empty($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'u' )
{
	header( 'Content-type: text/html; charset=UTF-8;' );
}
elseif ( $_SERVER['QUERY_STRING'] == 'k' )
{	header( 'Content-type: text/html; charset=KOI8-R;' );
}
else
{	header( 'Content-type: text/html; charset=windows-1251;' );
}
?>
var borq='';
borq += '<' + 'div id="b_q"><' + 'a href="http://<?=$db_config['server'];?>/q/<?=$_bash[0];?>"><?=$_bash[0];?><' + '/a> <' + 'span id="b_q_h">[ <?=$_bash[3];?> ]<' + '/span><' + 'br><?=$_bash[2];?><' + 'br><' + 'br><' + 'small><' + 'a href="http://bash.org.ru/">Больше на bash.org.ru!<' + '/small><' + '/a><' + '/div>';
document.write(borq);

