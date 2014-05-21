                <div class="menu_box">
                    <div>Цитаты:&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/index.php' ? '<b>последние</b>' : '<a href="http://'.$db_config['server'].'/">последние</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/random.php' ? '<b>случайные</b>' : '<a href="http://'.$db_config['server'].'/random">случайные</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/best.php' ? '<b>лучшие</b>' : '<a href="http://'.$db_config['server'].'/best">лучшие</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/byrating.php' ? '<b>по рейтингу</b>' : '<a href="http://'.$db_config['server'].'/byrating">по рейтингу</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/date.php' ? '<b>по дате</b>' : '<a href="http://'.$db_config['server'].'/date">по дате</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/find.php' ? '<b>найти</b>' : '<a href="http://'.$db_config['server'].'/find">найти</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/rss.php' ? '<b>RSS</b>' : '<a href="http://'.$db_config['server'].'/rss">RSS</a>');?></div>
                    <!--div><a href="/light">Лайт</a></div-->
                </div>
                <div class="menu_box">
                    <div>Бездна:&nbsp;&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/abyss.php' ? '<b>бездна</b>' : '<a href="http://'.$db_config['server'].'/abyss">бездна</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/abysstop.php' ? '<b>топ бездны</b>' : '<a href="http://'.$db_config['server'].'/abysstop">топ бездны</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/add.php' ? '<b>добавить</b>' : '<a href="http://'.$db_config['server'].'/add">добавить</a>');?></div>
                </div>
                <div class="menu_box">
                    <div>Прочее:&nbsp;&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/webmaster.php' ? '<b>Вебмастеру</b>' : '<a href="http://'.$db_config['server'].'/webmaster">Вебмастеру</a>');?></div>
                </div>