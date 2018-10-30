<?php

namespace App\Controller;

use App\Entity\Video;   
use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/trick")
 */
class TrickController extends Controller
{
    /**
     * @Route("/", name="trick_index", methods="GET")
     */
    public function index(TrickRepository $trickRepository): Response
    {
        return $this->render('trick/index.html.twig', ['tricks' => $trickRepository->findAll()]);
    }

    /**
     * @Route("/new", name="trick_new", methods="GET|POST")
     */
    public function new(Request $request , UserInterface $user ): Response
    {
        $trick = new Trick();
        $trick->setUser($user);
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();

            return $this->redirectToRoute('trick_index');
        }

        return $this->render('trick/new.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trick_show", methods="GET|POST") 
     * @ParamConverter("trick", class="App:Trick", options={"repository_method" = "findByIdWithCommentsAndVideos"})
     */
    public function show(Trick $trick, Request $request , UserInterface $user=null ): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $user !== null) {
            $comment->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('trick_show');
        }

        return $this->render('trick/show.html.twig', [
            'trick' => $trick,
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/{id}/edit", name="trick_edit", methods="GET|POST")
     */
    public function edit(Request $request, Trick $trick, Video $video): Response
    {
        $form = $this->createForm(TrickType::class, $trick, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trick_edit', ['id' => $trick->getId()],['id' => $video->getId()]);
        }

        return $this->render('trick/edit.html.twig', [
            'trick' => $trick,
            'video' => $video,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trick_delete", methods="DELETE")
     */
    public function delete(Request $request, Trick $trick): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trick);
            $em->flush();
        }

        return $this->redirectToRoute('trick_index');
    }
}
