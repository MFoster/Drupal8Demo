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
abstract class BaseController implements ControllerInterface {

  protected $container;
  
  protected $templateDir = 'modules/demo/templates/';
  
  public function __construct($container)
  {
      $this->container = $container;
  }
  /**
   * Implements \Drupal\Core\ControllerInterface::create().
   */
  public static function create(ContainerInterface $container) 
  {
    return new static($container);
  }
  
  public function get($key)
  {
    return $this->container->get($key);
  }
  
  public function render($template, $params = array())
  {
    $twig = $this->container->get('twig');
    
    $path = $this->templateDir . $template;
  
    $template = $twig->loadTemplate($path);
    
    return $template->render($params);     
  }

}