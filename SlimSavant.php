<?php
namespace Slim\Savant;

function init() {
  // Configure the Savant plugin
  \Slim\Extras\Views\Savant::$savantDirectory = 'vendor/saltybeagle/savant3';
  \Slim\Extras\Views\Savant::$savantOptions = array('template_path' => 'views');

  // Create a new app object with the Savant view renderer
  return new \Slim\Slim(array(
    'view' => new \Slim\Extras\Views\Savant()
  ));
}
