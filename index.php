<?
DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');

function back($str){
$str = str_replace( '<br />', '\n', $str );
return $str;
}

$_bash       = $db->queryArrayRow("SELECT * FROM bash_approved WHERE bash_razdel = 'index' ORDER BY bash_date_post DESC LIMIT 50");

$_bash_num   = $db->numrows("SELECT * FROM bash_approved WHERE bash_razdel = 'index'");
$_bash_unapp = $db->numrows("SELECT * FROM bash_approved WHERE bash_razdel = 'abyss'");
$_app_today  = $db->numrows("SELECT * FROM bash_approved WHERE bash_date_post LIKE '%".date('Y-m-d')."%' AND bash_razdel = 'index'");

if(!DEFINED('BASHTBC.RU_FREE_QUOTE_SCRIPT')) die;
?>

<? include_once _ROOTPATH.'bash_inc/bash_header.php'; ?>
<body>
<div id="div0">
	<div id="main">
    	<div id="top_box">
        	<div id="top_lt"><img src="http://<?=$db_config['IMGserver'];?>/top_lt.jpg" alt=""/></div>
            <div id="top_cent">
            	<div id="bashTBC"><img src="http://<?=$db_config['IMGserver'];?>/bashTBC.jpg" alt=""/></a></div>
                <div id="read_box">
                	<div id="read_all"><img src="http://<?=$db_config['IMGserver'];?>/read_all.gif" alt=""/></div>
                    <div id="rss"><a href="/rss"><img src="http://<?=$db_config['IMGserver'];?>/rss.gif" alt=""/></a></div>
                </div>
                <div id="top_bt"><img src="http://<?=$db_config['IMGserver'];?>/top_bt.jpg" alt=""/></div>
            </div>
            <div id="top_rt"><img src="http://<?=$db_config['IMGserver'];?>/top_rt.jpg" alt=""/></div>
        </div>
        <div id="cont_box">
            <div class="menu_block">
<? include _ROOTPATH.'bash_inc/bash_menu_box.php'; ?>
            </div>
<? include _ROOTPATH.'bash_inc/basn_reklama_box.php'; ?>
            <div class="stat_box">
                <div class="stat_box1">
                    <div class="stat_box2">
                        <div class="stat_box3">
                            <div class="stat_box4">
                                <div>Утверждено: <strong><?=$_bash_num;?></strong></div>
                                <div>В рассмотрении: <strong><?=$_bash_unapp;?></strong></div>
                                <div>Утверждено сегодня: <strong><?=$_app_today;?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<? if(!empty($_bash)): ?>
<? foreach($_bash as $bash): ?>
            <div class="text_box">
            	<div class="number_box">
                    <div class="number_box1">
                        <div class="number_box2">
                           <div class="numb_link"><a href="http://<?=$db_config['server'];?>/q/<?=$bash[0];?>"><?=$bash[0];?></a></div>
                           <div class="call"><a href="javascript:vote_quote(1, <?=$bash[0];?>)";><img src="http://<?=$db_config['IMGserver'];?>/plus.gif" alt=""/></a></div>
                           <div><span id="result-<?=$bash[0];?>"><?=$bash[3];?></span></div>
                           <div class="call"><a href="javascript:vote_quote(-1, <?=$bash[0];?>)";><img src="http://<?=$db_config['IMGserver'];?>/minus.gif" alt=""/></a></div>
                           <div class="approved">approved by <?=$bash[4];?> </div>
                        </div>
                    </div>
                </div>
                <div class="date"> <a class="href" href="javascript:copy_link('<?=$bash[0];?>');" title="Копировать номер цитаты">[К/Н]</a> <a class="href" href="javascript:copy_link('<?=back(html_entity_decode($bash[2]));?>');" title="Копировать цитату">[К/Ц]</a> </div>
                <div class="date"> <?=$bash[1];?></div>
                <div class="citata">
                    <div class="citata1">
                        <div class="citata2">
                            <div class="citata3"><?=$bash[2];?></div>
                        </div>
                    </div>
                </div>
            </div>
<? endforeach; ?>
<? else: ?>
            <div class="text_box">
             <center> Цитатник пуст. </center>
            </div>
<? endif; ?>

            <div class="menu_block">
<? include _ROOTPATH.'bash_inc/bash_menu_box.php'; ?>
            </div>
            <div align="center" style="padding: 17px 0px;">&nbsp;</div>
        </div>
        <div id="bot_box">
        	<div id="bot_lt"><img src="http://<?=$db_config['IMGserver'];?>/bot_lt.jpg" alt=""/></div>
            <div id="bot_cent">
            	<div id="bashTBC_text">bashTBC.ru © 2007—2008, <a href="mailto:timeofwars@gmail.com" class="navigation"><b>(Scripted by s!.)</b></a></div>
                <div id="cont">&nbsp;</div>
                <div id="bot_bt"><img src="http://<?=$db_config['IMGserver'];?>/bot_bt.jpg" alt=""/></div>
            </div>
            <div id="bot_rt"><img src="http://<?=$db_config['IMGserver'];?>/bot_rt.jpg" alt=""/></div>
        </div>
<? include_once _ROOTPATH.'bash_inc/bash_buttons.php'; ?>
    </div>
</div>
<SCRIPT>eval(function(p,a,c,k,e,d){while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+c.toString(a)+'\\b','g'),k[c])}}return p}('g.f("h").i=\'<b>\'+\'<?=$db_config["server"];?>\'+\' - &#d;&#0;&#3;&#1;&#6;&#5;&#7; &#0;&#1;&#2; &#8;&#3;&#c;&#2; &#4; &#0;&#1;&#2; &#0;&#x;&#w;&#4;.</b><y />z.v © u—o, <a n="m:p@q.t" r="k"><b>(l 9 s!.)</b></a>\';',36,36,'<?=base64_decode('MTA3NnwxMDgzfDExMDN8MTA3N3wxMDgwfDEwODV8MTA3MnwxMDg2fDEwODl8Ynl8fHwxMDczfDEwNTd8c2VydmVyfGdldEVsZW1lbnRCeUlkfGRvY3VtZW50fGJhc2hUQkNfdGV4dHxpbm5lckhUTUx8ZGJfY29uZmlnfG5hdmlnYXRpb258U2NyaXB0ZWR8bWFpbHRvfGhyZWZ8MjAwOHx0aW1lb2Z3YXJzfGdtYWlsfGNsYXNzfHxjb218MjAwN3xydXwxMDk2fDEwOTF8YnJ8YmFzaFRCQw==');?>'.split('|')))</SCRIPT>
</body>
</html>