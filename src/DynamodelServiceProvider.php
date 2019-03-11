<?php
/**
 * Class DynahtmlServiceProvider
 * @package Picory\DynaView
 * Author: picory <websniper@gmail.com>
 * Since: 2018-12-23
 * Version: 0.1
 */

namespace Picory\Dynamodel;

use Illuminate\Support\ServiceProvider;

class DynamodelServiceProvider extends ServiceProvider
{
  public function boot()
  {}

  public function register()
  {
      $this->app->bind('DynaModel', function () {
          return new DynaModel;
      });
  }
}