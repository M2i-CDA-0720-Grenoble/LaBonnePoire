<?php

namespace App\Controller;

use AdvertType;
use App\Entity\Advert;
use App\Repository\AdvertRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/advert")
 */
class AdvertController extends AbstractController {
  /**
   * @Route("/", name="advert")
   */
  public function index(AdvertRepository $repo) {

    return $this->render('advert/index.html.twig',
  [
    'adverts'=> $repo->findAll()
  ]);
  }

   /**
     * @Route("/filter", name="advert_filter", methods={"GET"})
     */
    public function advertForm(): Response
    {
        $form = $this->createForm(AdvertType::class);

        return $this->render('advert/filter.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/filter", name="filtered_adverts", methods={"POST"})
     */
    public function filter(Request $request, AdvertRepository $repository): Response
    {
        $form = $this->createForm(AdvertType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $city=$data['city'];
            $cat=$data['subCategory'];
            $adverts = $repository->findByOneCat($cat, $city);
            
        }
            

            
        return $this->render('advert/filteredAdverts.html.twig', [
            'adverts' => $adverts,
        ]);
    
  }
  
  /**
   * @Route("/{id}", name="showAdvert")
   */
  public function show(Advert $advert) {
    
   //    $advert = $this->getDoctrine()->getRepository(Advert::class)->find($id);
      return $this->render('advert/show.html.twig',['advert'=>$advert] );
  
  }
}

