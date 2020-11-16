<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController {
  /**
   * @Route("/", name="advert")
   */
  public function index() {
    return $this->render('default/index.html.twig');
  }
}