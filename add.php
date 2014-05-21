<?
DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');
include_once(_ROOTPATH.'bash_inc/filter.php');

$ip = (getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR'));


@$_POST['text'] = textfilter(string_cut($_POST['text'], 110));

if( !empty($_POST['act']) && $_POST['act'] == 'add' && !empty($_POST['text']) ): if( !$db->queryRow("SELECT * FROM bash_approved WHERE UNIX_TIMESTAMP(bash_date_post) >= '".(time()-600)."' AND (bash_poster_IP = '$ip' OR bash_poster_IP LIKE '%$ip%')") ): if(strlen($_POST['text']) >= 40): $db->execQuery("INSERT INTO `bash_approved` ( bash_date_post, bash_text, bash_poster_IP, bash_razdel ) VALUES ( '".date('Y-m-d H:i')."', '".$_POST['text']."', '$ip', 'abyss' )"); else: $err = 'Ваша цитата слишком короткая.'; endif; else: $err = 'Вы уже добавляли цитату, за последние 10 минут. Подождите немного.'; endif; endif;

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

<div id="add_box">
  <form action="http://<?=$db_config['server'];?>/add" method="POST"><input type="hidden" name="act" value="add">
      <p>
		    Внимание, отправка цитаты на рассмотрение не означает стопроцентную вероятность появления ее на сайте.
		    Дело в том, что чувство юмора админов не обязательно аналогично вашему. Если цитата вызовет вывих челюсти
        у всего администраторского состава, она (цитата, а не челюсть), скорее всего, уйдет в /dev/null.
        <? if(!empty($err)): ?> <br><br><font color="#0CC6DC"><b><?=$err;?></b></font> <? endif; ?>
      </p>
     <textarea name="text"></textarea>
	  <div><input type="submit" value=""></div>
	</form>
</div>

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
