<?php namespace Afshin\LiveConfig\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class LiveConfig extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'liveConfig'; }
 
}