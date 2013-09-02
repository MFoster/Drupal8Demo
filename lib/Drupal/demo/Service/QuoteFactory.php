<?php

namespace Drupal\demo\Service;


class QuoteFactory
{
    protected $repo;
    
    protected $childClass = 'QuoteCollection';
    
    public function __construct($repo)
    {
        $this->setRepo($repo);
    }
    public function setRepo($repo)
    {
        $this->repo = $repo;
        return $this;
    }
    public function setChildClass($className)
    {
        $this->childClass = $className;
        return $this;
    }
    public function createCollection($limit = 50)
    {
        $quotes = array();
        
        foreach($this->repo->getQuotes($limit) as $quote) {
            $quotes[] = $quote->title;
        }
    
        return new $this->childClass($quotes);
    }
}