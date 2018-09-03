<?php

namespace App\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Image;
use App\Form\ImageType;
 
class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $file = $image->getName();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'), $fileName);
            $image->setName($fileName);
            
            return $this->redirectToRoute('index');
        }
        
        return $this->render('index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
 
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }
 
}