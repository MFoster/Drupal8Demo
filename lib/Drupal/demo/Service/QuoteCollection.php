<?php

namespace Drupal\demo\Service;


class QuoteCollection
{
    
    protected $author = 'Unknown';
    
    public function __construct($quotes = array())
    {
        $this->setQuotes($quotes);
    }
    
    public function setQuotes($quotes)
    {
        $this->quotes = $quotes;
    }
    
    /**
    * Set the author of the collection. This enforces that the entire
    * collection must be "owned" by a single author.
    * 
    * @access public
    * @param mixed $author
    * @return void
    */
    public function setAuthor($author)
    {
        $this->author = $author;  
    }
    
    /**
    * Returns the author of the quote collection.
    * 
    * @access public
    * @return string
    */
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function get($index)
    {
        if(isset($this->quotes[$index])){
            return $this->quotes[$index];
        }
        else{
            return $this->getRandom();
        }
    
    }

    /**
     * getRandom function.
     * 
     * @access public
     * @return string
     */
    public function getRandom()
    {
    
        $max = count($this->quotes) - 1;
        
        $index = floor(rand(0, $max));
        
        return $this->quotes[$index];
    
    }

}