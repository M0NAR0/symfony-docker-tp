<?php
namespace App\Controller;

use App\Entity\DocumentEntity;
use App\Entity\PurchaseOrder;
use Dompdf\Dompdf as Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExportController extends AbstractController {

    /**
     * @Route("export/purchaseOrder/{id}", methods={"GET","HEAD"}, name="purchase_order_view")
     */
    public function purchaseOrderViewAction(Request $request, int $id): Response
    {
        $purchaseOrder = $this->getDoctrine()->getRepository(PurchaseOrder::class)->findOneBy(['purchOrderId' => $id]);

        return $this->render('export/purchaseOrder.html.twig', [
            'purchaseOrder' => $purchaseOrder
        ]);
    }

    /**
     * @Route("export/purchaseOrder/download/{id}", methods={"GET","HEAD"}, name="purchase_order_export")
     */
    public function purchaseOrderExportAction(Request $request, int $id): Response
    {
        $purchaseOrder = $this->getDoctrine()->getRepository(PurchaseOrder::class)->findOneBy(['purchOrderId' => $id]);

        $pdfOptions = new Options();
        // Police par défaut
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // On instancie Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($context);

        // On génère le html
        $html = $this->renderView('export/purchaseOrder.html.twig', [
            'purchaseOrder' => $purchaseOrder
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // On génère un nom de fichier
        $fichier = 'bon-de-commande-' . $purchaseOrder->getPurchOrderId() . '.pdf';

        // On envoie le PDF au navigateur
        $dompdf->stream($fichier, [
            'Attachment' => true
        ]);

        return new Response();
    }


    /**
     * @Route("document/export/download/{id}", methods={"GET","HEAD"}, name="document_export")
     */
    public function documentExportAction(Request $request, int $id): Response
    {
        $documentRepository = $this->getDoctrine()->getRepository(DocumentEntity::class);

        /** @var DocumentEntity $document */
        $document = $documentRepository->findOneBy(['documentId' => $id]);
        $documentId = $document->getDocumentId();

        $attrVarchar = $documentRepository->findVarcharsByDocument($documentId);
        $attrInt = $documentRepository->findIntsByDocument($documentId);
        $attrBoolean = $documentRepository->findBooleansByDocument($documentId);
        $attrDate = $documentRepository->findDatesByDocument($documentId);

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

        $pdfOptions = new Options();
        // Police par défaut
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // On instancie Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($context);


        // On génère le html
        $html = $this->renderView('export/document.html.twig', [
            'document' => $document,
            'site' => $document->getSite(),
            'attributes' => $attributes
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // On génère un nom de fichier
        $fichier = 'document-' . $document->getDocumentReference() . '.pdf';

        // On envoie le PDF au navigateur
        $dompdf->stream($fichier, [
            'Attachment' => true
        ]);

        return new Response();
    }
}