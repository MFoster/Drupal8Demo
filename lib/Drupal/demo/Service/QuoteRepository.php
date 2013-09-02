<?php

namespace Drupal\demo\Service;


class QuoteRepository
{
    
    protected $dbal;
    
    public function __construct($dbal)
    {
        $this->dbal = $dbal;
    }
    
    public function getQuotes($limit=50)
    {
    
        $select = $this->dbal->select('node');
        $select = $select->extend('Drupal\Core\Database\Query\PagerSelectExtender');
        $select->condition('type', 'quote', '=');
        $select->condition('status', 1, '=');
        $select->fields('nr', array('title'));
        $select->fields('node', array('nid'));
        $select->groupBy('nr.nid');
        $select->limit($limit);
        $select->join('node_field_revision', 'nr');
        
        return $select->execute();
    
    }
    

    
}