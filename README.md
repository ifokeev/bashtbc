Очень старый проект, писанный мной в 16 лет.  
————— 

возможности: 

админка:  
*редактирование цитат 
*удаление цитат 
*добавление цитат на главную страницу    

вывод цитат: 
*последних; 
*слачайных 
*лучших (самый высокий рейтинг); 
*всех цитат по рейтингу (с большего к меньшему); 
*по дате (с первой по последнюю); 
*найти цитату 
*RSS 
*бездна 
*топ бездны 
*добавление цитат (цитаты добавляются в бездну, как в оригинале) 
*легкое редактирование дизайна, навигационных и рекламных боксов. 

установка: 
1) открываем connect/db_config.php  
2) правим весь массив $db_config 
3) открываем connect/php_self.php 
4) правим _ROOTPATH . 
в пустой строчке пишем полный путь до сервера, например: 

DEFINE('_ROOTPATH', '/www/home/public_html/');   

админка - /_admin-panel/ 
дефолтный логин: Admin 
дефолтный пароль: Admin