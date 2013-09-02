<?php

/**
 * @file
 * Contains \Drupal\action\Controller\ActionController.
 */

namespace Drupal\demo\Controller;

use Drupal\action\Form\ActionAdminManageForm;
use Drupal\Core\ControllerInterface;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller providing page callbacks for demo module.
 */
class DefaultController implements ControllerInterface {

  protected $container;
  
  protected $templateDir = 'modules/demo/templates/';
  
  public function __construct($container)
  {
      $this->container = $container;
  }
  /**
   * Implements \Drupal\Core\ControllerInterface::create().
   */
  public static function create(ContainerInterface $container) {
    return new static($container);
  }
  
  /**
   * demoAction function.
   * 
   * @access public
   * @param Request $request
   * @return void
   */
  public function demoAction(Request $request)
  {
    return new Response("An Introduction to the New Production");
  }
  
  /**
   * nameAction function.
   * 
   * @access public
   * @param mixed $name
   * @return void
   */
  public function nameAction($name)
  {
    $twig = $this->container->get('twig');
    
    $path = $this->templateDir . 'example.html.twig';
  
    $template = $twig->loadTemplate($path);
    
    drupal_set_title("Route Parameter Example");
        
    return $template->render(array('name' => $name));
        
  }
  
  /**
   * quoteAction function.
   * 
   * @access public
   * @return void
   */
  public function quoteAction()
  {
  
    $collection = $this->container->get('demo.quote.local');
    
    $twig = $this->container->get('twig');
    
    $path = $this->templateDir . 'quote.html.twig';
    
    drupal_set_title("Service Example: Quotes");
    
    return $twig->loadTemplate($path)->render(array('collection' => $collection));
    
  }


}