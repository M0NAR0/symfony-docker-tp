<?php


namespace App\Controller;


use App\Entity\Site;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @var SiteRepository
     */
    private $_siteRepository;

    /**
     * SiteController constructor.
     * @param SiteRepository $siteRepository
     */
    public function __construct(
        SiteRepository $siteRepository
    ) {
        $this->_siteRepository = $siteRepository;
    }

    /**
     * @Route("/site/index/{id}", name="site_detail")
     */
    public function index(SessionInterface $session, Request $request, $id): Response
    {
        $arrayTwig = [];
        //check if a site exist
        if ($this->_siteRepository->findOneBy(['siteId' => $id])) {
            /**
             * @var Site $site
             */
            $site = $this->_siteRepository->findOneBy(['siteId' => $id]);
            $arrayTwig['site'] = $site;
            $render = $this->render('site/index.html.twig', $arrayTwig);
        } else {
            $render = $this->redirectToRoute('admin');
        }

        return $render;
    }
}