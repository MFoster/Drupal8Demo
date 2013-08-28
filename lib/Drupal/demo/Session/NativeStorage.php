<?php

namespace Drupal\demo\Session;

use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class NativeStorage extends NativeSessionStorage 
{
    //already started by drupal
    protected $started = true;

}