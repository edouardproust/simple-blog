<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions/login.php';

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
    $today = date("Y-m-d");
    $file = str_replace('/', DIRECTORY_SEPARATOR, $_SERVER["DOCUMENT_ROOT"]) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'newsletter' . DIRECTORY_SEPARATOR . $today . '.txt';
    $data = $_POST['firstname'] . ' - ' . $_POST['email'] . PHP_EOL;
    $link = "Check the list <a href='/data/newsletter/list.php'>here</a>.";

    if (file_exists($file) && in_array($data, file($file))) { // Check if the person is already registered inside this file
      return "
  <div class='alert alert-danger'>
    You are already registered to this list. $link
  </div>";
      echo '';
    } else {
      file_put_contents($file, $data, FILE_APPEND);
      return "
  <div class='alert alert-success'>
    Thank you {$_POST['firstname']}, you're now on our list! $link
  </div>";
    }
  }
}

function foo_newsletter(string $code_if_true, string $code_if_false): string
{
  $where_to_hide_it = [ // Edit this list as needed (add or remove pages)
    'newsletter.php',
    'login.php',
    'admin/analytics.php',
  ];
  // Don't touch the code below
  $needle_found = 0;
  foreach ($where_to_hide_it as $needle) {
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
