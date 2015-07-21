<?php
namespace Slim\Savant;

function init() {
  global $app;

  // Configure the Savant plugin
  \Slim\Extras\Views\Savant::$savantDirectory = 'vendor/saltybeagle/savant3';
  \Slim\Extras\Views\Savant::$savantOptions = array('template_path' => 'views');

  // Create a new app object with the Savant view renderer
  $app = new \Slim\Slim(array(
    'view' => new \Slim\Extras\Views\Savant()
  ));
}

function render($page, $data=array()) {
  global $app;
  return $app->render('layout.php', array_merge($data, array('page' => $page)));
};

function partial($template, $data=array(), $debug=false) {
  global $app;

  if($debug) {
    $tpl = new Savant3(\Slim\Extras\Views\Savant::$savantOptions);
    echo '<pre>' . $tpl->fetch('partials/' . $template . '.php') . '</pre>';
    return '';
  }

  ob_start();
  $tpl = new Savant3(\Slim\Extras\Views\Savant::$savantOptions);
  foreach($data as $k=>$v) {
    $tpl->{$k} = $v;
  }
  $tpl->display('partials/' . $template . '.php');
  return ob_get_clean();
}
