<?php


namespace App\Controller;


use App\Entity\DocumentEntity;
use App\Entity\Site;
use App\Repository\DocumentEntityRepository;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DocumentController extends AbstractController
{
    /**
     * @var SiteRepository
     */
    private $_siteRepository;

    /**
     * @var DocumentEntityRepository
     */
    private $_documentEntityRepository;

    /**
     * DocumentController constructor.
     * @param SiteRepository $siteRepository
     * @param DocumentEntityRepository $documentEntityRepository
     */
    public function __construct(
        SiteRepository $siteRepository,
        DocumentEntityRepository $documentEntityRepository
    ) {
        $this->_siteRepository = $siteRepository;
        $this->_documentEntityRepository = $documentEntityRepository;
    }

    /**
     * @Route("/document/index/{id}", name="document_index")
     */
    public function index(Request $request, $id): Response
    {
        $arrayTwig = [];

        //check if a document exist
        if ($this->_documentEntityRepository->findOneBy(['documentId' => $id])) {
            /**
             * @var DocumentEntity $document
             */
            $document = $this->_documentEntityRepository->findOneBy(['documentId' => $id]);
            $documentId = $document->getDocumentId();

            $attrVarchar = $this->_documentEntityRepository->findVarcharsByDocument($documentId);
            $attrInt = $this->_documentEntityRepository->findIntsByDocument($documentId);
            $attrBoolean = $this->_documentEntityRepository->findBooleansByDocument($documentId);
            $attrDate = $this->_documentEntityRepository->findDatesByDocument($documentId);

            $attributes = [];
            if (!empty($attrVarchar)) {
                foreach ($attrVarchar as $attr) {
                    if (isset($attr['DOCUMENT_EAV_CODE']) && isset($attr['DOCUMENT_ENTITY_VARCHAR_VALUE'])) {
                        $attributes['varchar'][$attr['DOCUMENT_EAV_CODE']] = $attr['DOCUMENT_ENTITY_VARCHAR_VALUE'];
                    }
                }
            }

            if (!empty($attrInt)) {
                foreach ($attrInt as $attr) {
                    if (isset($attr['DOCUMENT_EAV_CODE']) && isset($attr['DOCUMENT_ENTITY_INT_VALUE'])) {
                        $attributes['int'][$attr['DOCUMENT_EAV_CODE']] = $attr['DOCUMENT_ENTITY_INT_VALUE'];
                    }
                }
            }

            if (!empty($attrBoolean)) {
                foreach ($attrBoolean as $attr) {
                    if (isset($attr['DOCUMENT_EAV_CODE']) && isset($attr['DOCUMENT_ENTITY_BOOLEAN_VALUE'])) {
                        $attributes['boolean'][$attr['DOCUMENT_EAV_CODE']] = $attr['DOCUMENT_ENTITY_BOOLEAN_VALUE'];
                    }
                }
            }

            if (!empty($attrDate)) {
                foreach ($attrDate as $attr) {
                    if (isset($attr['DOCUMENT_EAV_CODE']) && isset($attr['DOCUMENT_ENTITY_DATE_VALUE'])) {
                        $attributes['date'][$attr['DOCUMENT_EAV_CODE']] = $attr['DOCUMENT_ENTITY_DATE_VALUE'];
                    }
                }
            }

            $arrayTwig['site'] = $document->getSite();
            $arrayTwig['document'] = $document;
            $arrayTwig['attributes'] = $attributes;
            $render = $this->render('document/index.html.twig', $arrayTwig);
        } else {
            $render = $this->redirectToRoute('admin');
        }

        return $render;
    }


    /**
     * @Route("/document/add", name="document_add")
     */
    public function add(Request $request): Response
    {

    }

    /**
     * @Route("/document/edit/{id}", name="document_edit")
     */
    public function edit(Request $request, $id): Response
    {
        //check if a document exist
        if ($this->_documentEntityRepository->findOneBy(['documentId' => $id])) {
            /** @var DocumentEntity $document */
            $document = $this->_documentEntityRepository->findOneBy(['documentId' => $id]);

            $form = $this->createFormBuilder($document);

            foreach ($document->getDocumentEavTypes() as $attrGroup) {

            }

        }
    }
}