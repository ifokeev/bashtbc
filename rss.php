<?
header("Content-type: application/xml; charset=windows-1251");

function back($str){
$str = str_replace( '<br />', "\n", $str );
return $str;
}

	$htmlout = "<?xml version=\"1.0\" encoding=\"windows-1251\"?>
<rss version=\"2.0\">
<channel>
  <title>bashTBC.ru - RSS</title>
  <link>http://bashtbc.ru</link>
  <description>bashTBC.ru - RSS лента</description>
  <language>ru</language>\n";

DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');

$_bash  = $db->queryArrayRow("SELECT * FROM bash_approved WHERE bash_razdel = 'index' ORDER BY bash_date_post DESC LIMIT 95");

if(!DEFINED('BASHTBC.RU_FREE_QUOTE_SCRIPT')) die;

if(!empty($_bash)){
foreach($_bash as $v){

		$htmlout .= "
		<item>
			<guid>http://".$db_config['server']."/q/".$v[0]."</guid>
			<link>http://".$db_config['server']."/q/".$v[0]."</link>
			<title>Цитата #".$v[0]."</title>
			<author>".$v[4]."</author>
			<pubDate>".Date("D, j M Y H:i:s +0200", strtotime($v[1]))."</pubDate>
			<description><![CDATA[".back(html_entity_decode($v[2]))."]]></description>
		</item>";
}
}

$htmlout .= "	</channel>
</rss>";

echo $htmlout;
?>
