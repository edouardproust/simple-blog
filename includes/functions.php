<?php

require_once __DIR__ . '/functions/login.php';
require_once dirname(__DIR__) . '/class/PDO/BlogPDO.php';

// Menus & titles

function home(): string
{
  return '';
}
function dirbase(string $path = 'index.php'): void
{
  echo '/lessons/files/php_HTML%20&%20Bootstrap_20201103/' . $path;
}

/**
 * @param array $items array([string: url, string: label], ...)
 * @param string $aClass 
 * @return string 
 */
function nav_menu(array $items, string $aClass = ''): string
{
  if (!is_connected()) {
    $dashboard_link = nav_item('pages/login.php', 'Login', $aClass);
  } else {
    $dashboard_link = nav_item('admin/index.php', 'Admin dashboard', $aClass);
  }
  $menu_links = '';
  foreach ($items as $item) {
    $menu_links .= nav_item($item[0], $item[1], $aClass);
  }
  return $menu_links . $dashboard_link;
}

function nav_item($link, $title, $aClass = '')
{
  $class = 'nav-item';
  if (strpos($_SERVER["SCRIPT_NAME"], $link) !== false) {
    $class .= $class . ' active';
  }
  $link = home() . DIRECTORY_SEPARATOR . $link;
  $html = '<li class="' . $class . '">
      <a class="' . $aClass . '" href="' . $link . '">' . $title . '</a>
    </li>';
  return $html;
}

// Newsletter

function newsletter_submit()
{
  if (!empty($_POST)) {
    $today = new Datetime('now');
    $data = $_POST['firstname'] . ' - ' . $_POST['email'] . PHP_EOL;

    $pdo = new BlogPDO;
    $error = null;
    try {
      $query = $pdo->prepare(
        "INSERT INTO subscribers (firstname, email, created_at) " .
        "VALUES (:firstname, :email, :created_at)"
      );
      $query->execute([
        ':firstname' => $_POST['firstname'],
        ':email' => $_POST['email'],
        ':created_at' => (new Datetime('now'))->format('Y-m-d H:i:s')
      ]);
      return
        "<div class='alert alert-success'>" .
          "Thank you {$_POST['firstname']}, you're now on our list!" .
        "</div>";
    } catch (PDOException $e) {
      return
        "<div class='alert alert-danger'>" .
          "An error occured: " . $e->getMessage() . 
        "</div>";
    }

  }
}

function foo_newsletter(string $code_if_true, string $code_if_false): string
{
  // Don't touch the code below
  $needle_found = 0;
  foreach (FOOTER_HIDE_NEWSLETTER_LOCATIONS as $needle) {
    if (strpos($_SERVER["SCRIPT_NAME"], $needle)) {
      $needle_found += 1;
    }
  }
  if ($needle_found > 0) {
    return $code_if_true;
  } else {
    return $code_if_false;
  }
}
