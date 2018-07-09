<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | Hooks
  | -------------------------------------------------------------------------
  | This file lets you define "hooks" to extend CI without hacking the core
  | files.  Please see the user guide for info:
  |
  |	https://codeigniter.com/user_guide/general/hooks.html
  |
 */
/* hooks for single function  */
$hook['pre_controller'][] = array(
    'class' => 'testhook',
    'function' => 'validate_user',
    'filename' => 'testhook.php',
    'filepath' => 'hooks',
);

/* hooks for multipal function */
//$hook['pre_controller'][] = array(
//    'class' => 'testhook',
//    'function' => 'f5',
//    'filename' => 'testhook.php',
//    'filepath' => 'hooks',
//);
