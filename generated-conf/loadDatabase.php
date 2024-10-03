<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'tb_admin' => '\\app\\models\\Map\\AdminTableMap',
      'tb_news' => '\\app\\models\\Map\\NewsTableMap',
      'tb_project' => '\\app\\models\\Map\\ProjectTableMap',
      'tb_specialty' => '\\app\\models\\Map\\SpecialtyTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Admin' => '\\app\\models\\Map\\AdminTableMap',
      '\\News' => '\\app\\models\\Map\\NewsTableMap',
      '\\Project' => '\\app\\models\\Map\\ProjectTableMap',
      '\\Specialty' => '\\app\\models\\Map\\SpecialtyTableMap',
    ),
  ),
));
