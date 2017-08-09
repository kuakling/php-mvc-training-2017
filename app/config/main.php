<?php
return [
  'modules' => [
    'admin' => [
      'workspace' => 'admin',
      'class' => '\app\modules\admin\AdminModule'
    ]
  ],
  'layout' => [
    'path' => __DIR__.'/../views/layouts',
    'file' => 'main'
  ],
  'db' => require(__DIR__.'/db.php'),
];
