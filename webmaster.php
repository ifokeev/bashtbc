<?
DEFINE('SCRIPTED BY s!.', 0);
DEFINE('UIN: 1334315', 0);

include_once('connect/php_self.php');
include_once(_ROOTPATH.'connect/db.php');


$_bash_num   = $db->numrows("SELECT * FROM ".PREFIX."approved WHERE ".PREFIX."razdel = 'index'");
$_bash_unapp = $db->numrows("SELECT * FROM ".PREFIX."approved WHERE ".PREFIX."razdel = 'abyss'");
$_app_today  = $db->numrows("SELECT * FROM ".PREFIX."approved WHERE ".PREFIX."date_post LIKE '%".date('Y-m-d')."%' AND ".PREFIX."razdel = 'index'");

if(!DEFINED('BASHTBC.RU_FREE_QUOTE_SCRIPT')) die;
?>

<? include_once _ROOTPATH.'bash_inc/bash_header.php'; ?>
<style>
div#quotes div.q { font-family: 'Monaco', 'Courier New', monospace; font-size: 10pt; margin: 12px 0; font-weight: normal; }
div#quotes div.q div, div.stats { background: #f3f3f3; padding: 5px; border: 1px dotted #999; }
div.aby { font-size: large; text-align: center; font-weight: bold; background: #f3f3f3; padding: 5px; border: 1px dotted #999; }
div.aby a { width: 50%; padding: 5px; text-align: center; display: block; margin: auto; }
div.aby a:hover { background: #551a8b; color: #fff; text-decoration: none; }
</style>
<body>
<div id="div0">
	<div id="main">
    	<div id="top_box">
        	<div id="top_lt"><img src="/images/top_lt.jpg" alt=""/></div>
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
            <div id="quotes">
             <div id="ads">
              <h2>Тебе, вебмастер!</h2>
               <p>Ты давно хотел разместить на своем сайте цитату с <?=$db_config['server'];?>, но не знаешь, как? Не беда, этот раздел тебе поможет.</p>
               <p>Система крайне проста и требует лишь самого базового знания HTML. Необходимо и достаточно разместить в любом удобном тебе месте на твоем сайте следующий фрагмент кода:</p>
               <p>В CP1251:</p>
                <div class="q"><div>&lt;script language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://<?=$db_config['server'];?>/forweb&quot;&gt;<br />&lt;/script&gt;</div></div>
               <p>В UTF-8:</p>
                <div class="q"><div>&lt;script language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://<?=$db_config['server'];?>/forweb/?u&quot;&gt;<br />&lt;/script&gt;</div></div>
               <p>В KOI8-R:</p>
                <div class="q"><div>&lt;script language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://<?=$db_config['server'];?>/forweb/?k&quot;&gt;<br />&lt;/script&gt;</div></div>
               <p>Необходимое примечание для людей, знающих, что такое CSS: цитата заключена в div#b_q.</p>
               <hr>
               <p>Пример использования скрипта:</p>
                <div style="border: 1px solid #9999bb; background: #f0f0ff; padding: 5px; font-family: 'Monaco', 'Courier New', monospace; font-size: 10pt;">
                 <script language="JavaScript" type="text/javascript" src="http://<?=$db_config['server'];?>/forweb/"></script>
                </div>
               <p>Исходный текст:</p>
                <div class="q"><div>
                 &lt;div style=&quot;border: 1px solid #9999bb; background: #f0f0ff; padding: 5px; font-family: 'Monaco', 'Courier New', monospace; font-size: 10pt;&quot;&gt;<br />
                 &lt;script language=&quot;JavaScript&quot; type=&quot;text/javascript&quot; src=&quot;http://<?=$db_config['server'];?>/forweb/&quot;&gt;<br />
                 &lt;/script&gt;<br />
                 &lt;/div&gt;
                </div></div>
               </div>
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