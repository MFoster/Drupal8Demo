<?php

namespace Drupal\demo\Service;


class RssReader implements \Iterator
{
  protected $index = 0;
  
  protected $feed = false;
  
  public function __construct($url)
  {
    $this->url = $url;
  }
  
  protected function fetchFeed()
  {
    return file_get_contents($this->url);
  }
  
  public function getFeed()
  {
    if($this->feed){
      return $this->feed;
    }
    else{
      return $this->feed = simplexml_load_string($this->fetchFeed());
    }
  }
  
  public function get($index)
  {
    return $this->getFeed()->channel->item[$index];
  }
  
  public function current()
  {
    return $this->get($this->index);
  }
  
  public function key()
  {
    return $this->index;
  }
  
  public function next()
  {
    $this->index++;
  }
  
  public function rewind()
  {
    $this->index = 0;
  }
  
  public function valid()
  {
    return isset($this->getFeed()->channel->item[$this->index]);
  }
}