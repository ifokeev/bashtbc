                <div class="menu_box">
                    <div>������:&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/index.php' ? '<b>���������</b>' : '<a href="http://'.$db_config['server'].'/">���������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/random.php' ? '<b>���������</b>' : '<a href="http://'.$db_config['server'].'/random">���������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/best.php' ? '<b>������</b>' : '<a href="http://'.$db_config['server'].'/best">������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/byrating.php' ? '<b>�� ��������</b>' : '<a href="http://'.$db_config['server'].'/byrating">�� ��������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/date.php' ? '<b>�� ����</b>' : '<a href="http://'.$db_config['server'].'/date">�� ����</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/find.php' ? '<b>�����</b>' : '<a href="http://'.$db_config['server'].'/find">�����</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/rss.php' ? '<b>RSS</b>' : '<a href="http://'.$db_config['server'].'/rss">RSS</a>');?></div>
                    <!--div><a href="/light">����</a></div-->
                </div>
                <div class="menu_box">
                    <div>������:&nbsp;&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/abyss.php' ? '<b>������</b>' : '<a href="http://'.$db_config['server'].'/abyss">������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/abysstop.php' ? '<b>��� ������</b>' : '<a href="http://'.$db_config['server'].'/abysstop">��� ������</a>');?></div>
                    <div><?=($_SERVER['PHP_SELF'] == '/add.php' ? '<b>��������</b>' : '<a href="http://'.$db_config['server'].'/add">��������</a>');?></div>
                </div>
                <div class="menu_box">
                    <div>������:&nbsp;&nbsp;&nbsp;</div>
                    <div><?=($_SERVER['PHP_SELF'] == '/webmaster.php' ? '<b>����������</b>' : '<a href="http://'.$db_config['server'].'/webmaster">����������</a>');?></div>
                </div>