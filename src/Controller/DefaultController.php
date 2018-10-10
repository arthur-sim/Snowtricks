<?php

namespace App\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TricksRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(TricksRepository $tricksRepository): Response
    {
        return $this->render('index.html.twig', ['tricks' => $tricksRepository->findAll()]);
    }
 
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }
 
}