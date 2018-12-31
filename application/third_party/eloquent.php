<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * time: 11:53
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

// Autoload 自动载入
require BASEPATH.'../vendor/autoload.php';

// 载入数据库配置文件
require_once APPPATH.'config/database.php';

// Eloquent ORM
$capsule = new Capsule;

// 连接数据库配置
$capsule->addConnection($db['eloquent']);

// Make this Capsule instance available globally via static methods...
$capsule->setAsGlobal();

// Setup the Eloquent ORM...
$capsule->bootEloquent();
