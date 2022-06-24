<?php
namespace App\Controller;

use App\Entity\Employee;
use App\Form\EditEmployeeForm;
use App\Repository\EmployeeRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @var EmployeeRepository
     */
    private $_employeeRepository;

    /**
     * LoginController constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository
    )
    {
        $this->_employeeRepository = $employeeRepository;
    }


    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request, SessionInterface $session)
    {
        //route to dashboard
        $render = $this->redirectToRoute('login');

        //check if an employee is already logged in
        if ($session->get('employee_login')) {
            //get current logged in employee data from employee_login session
            $employeeSession = $session->get('employee_login');
            /**
             * @var Employee $employee
             */
            $employee = $employeeSession['employee'];
            $employeeRoleTitle = $employeeSession['roleTitle'];

            //array data to pass to the template
            $paramTwig = [
                'profile' => $employeeSession['employee'],
                'employeeRoleTitle' => $employeeSession['roleTitle']
            ];

            //check employee role
            if ($employeeRoleTitle == "Administrateur" || $employeeRoleTitle = "Conducteur de travaux") {
                //creating form
                $editEmployeeForm = $this->createForm(EditEmployeeForm::class, $employee);
                $editEmployeeForm->handleRequest($request);

                //adding form view to param twig
                $paramTwig['edit_employee_form'] = $editEmployeeForm->createView();

                //check if form is submitted and valid
                if ($editEmployeeForm->isSubmitted() && $editEmployeeForm->isValid()) {
                    $employee = $this->_employeeRepository->findOneBy(['id' => $employee->getId()]);

                    //get post data form and update employee data
                    $employee->setEmployeeFirstname($request->get('edit_employee_form')['employeeFirstname'])
                        ->setEmployeeLastname($request->get('edit_employee_form')['employeeLastname'])
                        ->setEmployeeAddress($request->get('edit_employee_form')['employeeAddress'])
                        ->setEmployeeCity($request->get('edit_employee_form')['employeeCity'])
                        ->setEmployeePostalCode($request->get('edit_employee_form')['employeePostalCode']);

                    //save employee in database
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($employee);
                    $em->flush();

                    //update user session
                    $sessionEmployeeData = [
                        'employee' => $employee,
                        'roleTitle' => $employee->getRole()->getRoleTitle() //employee role title
                    ];
                    $session->set('employee_login', $sessionEmployeeData);

                    //add success message to template
                    $paramTwig['success'] = "Votre profil a bien été mit à jour !";
                }
            }

            $render = $this->render('users/profile.html.twig', $paramTwig);
        }

        return $render;

    }
}

