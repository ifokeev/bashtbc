Очень старый проект, писанный мной в 16 лет.<br />
—————<br /><br />

возможности: 

админка:
<ul>
<li>редактирование цитат</li>
<li>удаление цитат</li>
<li>добавление цитат на главную страницу </li>
</ul>   

вывод цитат:
<ul>
<li>последних 
<li>слачайных
<li>лучших (самый высокий рейтинг)
<li>всех цитат по рейтингу (с большего к меньшему)
<li>по дате (с первой по последнюю)
<li>найти цитату
<li>RSS
<li>бездна
<li>топ бездны
<li>добавление цитат (цитаты добавляются в бездну, как в оригинале)
<li>легкое редактирование дизайна, навигационных и рекламных боксов. 
</ul>

установка:
<ol>
<li>открываем connect/db_config.php</li>
<li>правим весь массив $db_config</li>
<li>открываем connect/php_self.php</li>
<li>правим _ROOTPATH .</li>
	
	в пустой строчке пишем полный путь до сервера, например:
	
	DEFINE('_ROOTPATH', '/www/home/public_html/');   
</ol>

админка - /_admin-panel/<br />
	дефолтный логин: Admin<br />
	дефолтный пароль: Admin<br />