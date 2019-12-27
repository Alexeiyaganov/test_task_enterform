# test_task_enterform

Тестовое задание для вакансии Junior PHP разработчик

Порядок действий для запуска в docker-compose:

1. В командной строке зайти в папку, где планируете развернуть проект
2. Выполнить команду: git clone https://github.com/Alexeiyaganov/test_task_enterform
3. Необходимо добавить в hosts файл строки:
   127.0.0.1 site.local
   127.0.0.1 phpmyadmin.local
   (Для Linux достаточно выполнить команды:
   echo "127.0.0.1 site.local" >> /etc/hosts 
   echo "127.0.0.1 phpmyadmin.local" >> /etc/hosts )
4. В командной строке зайти в папку ../test_task_enterform/proxy
5. Выполнить команду: docker-compose up -d
6. Вернуться в главную папку проекта ../test_task_enterform
7. Выполнить команду: docker-compose up -d
8. Проект должен быть доступен по адресу: http://site.local
   PhpMyAdmin доступен по адресу: http://phpmyadmin.local
