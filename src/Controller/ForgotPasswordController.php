<?php


namespace App\Controller;

use App\Entity\Demand;
use App\Entity\DemandType;
use App\Entity\Employee;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForgotPasswordController extends AbstractController {

    /**
     * @Route("/forgot-password", name="forgot_password")
     */
    public function forgotPasswordAction(Request $request)
    {
        $demand = new Demand();
        $demandType = $this->getDoctrine()->getRepository(DemandType::class)->findOneBy(['label' => 'Recuperation MDP']); // DemandType('Recuperation MDP')

        $demand->setDemandType($demandType); // 'Recuperation MDP'
        $demand->setSendingDate(new DateTime()); // now()
        $demand->setStatus(false); // En cours

        $form = $this->createFormBuilder($demand)
            ->add('message', TextType::class, ['label' => 'Email'])
            ->add('save', SubmitType::class, ['label' => 'Envoyer la demande'])
            ->getForm();

        $form->handleRequest($request);
        $postData = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $postData = $form->getData();
            $currentEmployee = $this->getDoctrine()->getRepository(Employee::class)->findOneBy(['email' => $postData->getMessage()]);
            $postData->setEmployee($currentEmployee);

            $em->persist($postData);
            $em->flush();

            return $this->redirectToRoute('password_demand_success');
        }

        return $this->render('reset_password/forgot.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/forgot-password-success", name="password_demand_success")
     */
    public function forgotPasswordSuccessAction(Request $request) : Response
    {
        return $this->render('reset_password/success.html.twig');
    }
}