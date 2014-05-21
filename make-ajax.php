<?
@$quote_id  = intval($_GET['id']);
@$bash_up   = intval($_GET['bal']);
if( $bash_up != '1' && $bash_up != '-1' ){ die; }

DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');

if(!DEFINED('BASHTBC.RU_FREE_QUOTE_SCRIPT')) die;

if( list($bash_rat) = $db->queryCheck("SELECT bash_rating FROM bash_approved WHERE bash_app_id = '$quote_id'") ){

if( empty($_COOKIE[$quote_id]) ){

$ip = (getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR'));

if( !$db->queryRow("SELECT user_ip FROM bash_quotegolos WHERE user_ip = '$ip' AND bash_quote_id = '$quote_id'") ){

$db->execQuery("INSERT INTO bash_quotegolos ( user_ip, bash_quote_id ) VALUES ( '$ip', '$quote_id' )");
$db->execQuery("UPDATE bash_approved SET bash_rating = bash_rating + '$bash_up' WHERE bash_app_id = '$quote_id' LIMIT 1");

setcookie( $quote_id, $bash_up, 0x6FFFFFFF);
$bash_rat += $bash_up;

}

}

}

echo $bash_rat;
?>
