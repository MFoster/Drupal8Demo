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
class QuoteController extends BaseController {

  
  public function indexAction(Request $request)
  {
    
    $repo = $this->get('demo.repo.quote');
    
    $quotes = $repo->getQuotes();
    
    return $this->render('quote-node.html.twig', array('quotes' => $quotes));
    
  }

}