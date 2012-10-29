<?php
/*
Plugin Name: Akismet Cleaner
Plugin URI: http://www.easycoding.org/projects/akclean
Description: Очищает таблицы от мусора, генерируемого расширением Akismet.
Author: V1TSK <vitaly@easycoding.org>
Contributor: V1TSK <vitaly@easycoding.org>
Author URI: http://www.easycoding.org/
Version: 0.1
*/
function akc_exec()
{
?>
  <h2>Модуль очистки таблиц Akismet</h2>
  <div>Akismet Cleaner предназначен для лёгкой и быстрой очистки таблицы <strong>wp_commentmeta</strong> от множества записей Akismet, которые накапливаются в ней за время использования этого плагина.</div><br />
  <div>Akismet Cleaner удалит следующее:</div>
  <div>
    <ol>
      <li>записи из таблицы <strong>wp_commentmeta</strong>, относящиеся к удалённым комментариям;</li>
      <li>записи из таблицы <strong>wp_commentmeta</strong>, созданные плагином Akismet.</li>
    </ol>
  </div><br />
  <div>Для начала процесса очистки нажмите соответствующую кнопку.</div>
<?php
  if (is_admin())
  {
    global $wpdb;
    if (isset($_POST['akc']))
    {
      $wpdb->query("DELETE FROM wp_commentmeta WHERE comment_id NOT IN(SELECT comment_id FROM wp_comments);");
      $wpdb->query("DELETE FROM wp_commentmeta WHERE meta_key LIKE '%akismet%';");
      ?>
	  <h3>Таблицы Akismet были успешно очищены!</h3>
	  <?php
    }
    else
    {
    ?>
    <br /><br />
    <div style="text-align:center">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>" method="post">
        <input type="hidden" name="akc" value="1" />
        <input type="submit" value="Очистить таблицы Akismet!" />
      </form>
    </div>
<?php
    }
  }
  else
  {
?>
    <h3>Недостаточно прав для работы данного плагина! Обратитесь к администратору блога.</h3>
<?php
  }
}

function akcclean_a()
{
  add_options_page('Akismet Cleaner', 'Akismet Cleaner', 'manage_options', __FILE__, 'akc_exec');
}

add_action('admin_menu', 'akcclean_a');

?>