Akismet Cleaner for WordPress
=======

Akismet Cleaner предназначен для лёгкой и быстрой очистки таблицы wp_commentmeta от множества записей Akismet, которые накапливаются в ней за время использования Akismet.

Лицензия: GNU GPL версии 3.

Требования: WordPress 3.x и выше.

<h1>Загрузка и установка плагина</h1>
Для установки плагина сделайте следующее:
 * загрузите последнюю версию плагина из <a href="https://github.com/xvitaly/akclean/zipball/master">официального git репозитория</a>;
 * загрузите файл <b>akclean.php</b> в каталог <b>/wp-content/plugins/</b> на сервере;
 * зайдите в <b>Управление плагинами WordPress</b> и включите <b>Akismet Cleaner</b>.

<h1>Работа с плагином</h1>
В <b>Панели администратора WordPress</b>, в разделе <b>Параметры</b> выберите <b>Akismet Cleaner</b>. Для запуска очистки нажмите одноимённую кнопку.

<h1>Логика работы плагина</h1>
В случае запуска процедуры очистки Akismet Cleaner удалит из базы данных следующее:
 * записи из таблицы wp_commentmeta, относящиеся к удалённым комментариям;
 * записи из таблицы wp_commentmeta, созданные плагином Akismet.

<h1>Предупреждения</h1>
Внимание! Перед использованием плагина сделайте полную резервную копию базы данных WordPress.

Автор не несёт никакой ответственности за работу данного плагина, а также за любые виды потерь, связанные прямо или косвенно с его работой.