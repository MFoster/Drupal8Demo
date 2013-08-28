<?php


namespace Drupal\demo\Service;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class GreeterListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array(KernelEvents::REQUEST => array(array('handleRequest')));
    }

    
    public function setQuotes($quotes)
    {
        $this->quotes = $quotes;
    }
    
    public function handleRequest($event)
    {
        
        if(isset($_SESSION['greeted']) && true === $_SESSION['greeted']) {
            return true;
        }
 
        $message = $this->quotes->getRandom();
        
        drupal_set_message($message);
        
        $_SESSION['greeted'] = true;
    
    }



}