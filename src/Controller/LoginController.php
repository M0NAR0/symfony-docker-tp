<?php


namespace App\Controller;


use App\Entity\Employee;
use App\Form\LoginForm;
use App\Repository\EmployeeRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @var EmployeeRepository
     */
    private $_employeeRepository;

    /**
     * @var RoleRepository
     */
    private $_roleRepository;

    /**
     * LoginController constructor.
     * @param EmployeeRepository $employeeRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        RoleRepository $roleRepository
    ){
        $this->_employeeRepository = $employeeRepository;
        $this->_roleRepository = $roleRepository;
    }

    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @param SessionInterface $session
     * @return Response
     */
    public function index(Request $request, SessionInterface $session): Response
    {
        //route to dashboard
        $render = $this->redirectToRoute('admin');

        //check if an employee is already logged in
        if (!$session->get('employee_login')) {
            $employee = new Employee();
            $loginForm = $this->createForm(LoginForm::class, $employee);
            $loginForm->handleRequest($request);

            //array data to pass to the template
            $paramTwig = [
                'property'   => $employee,
                'login_form' => $loginForm->createView()
            ];

            //check if form is submitted and valid
            if ($loginForm->isSubmitted() && $loginForm->isValid())
            {
                $postData = [
                    'email' => $request->get('login_form')['email'],
                    'password' => $request->get('login_form')['password']
                ];
                
                if ($this->_employeeRepository->findOneBy($postData))
                {
                    //get employee from repository and add it to the session login
                    $currentEmployee = $this->_employeeRepository->findOneBy($postData);

                    $sessionEmployeeData = [
                        'employee'  => $currentEmployee,
                        'roleTitle' => $currentEmployee->getRole()->getRoleTitle() //employee role title
                    ];

                    $session->set('employee_login', $sessionEmployeeData);
                } else {
                    $paramTwig['error_message'] = true;
                }
            }
            //login form
            $render = $this->render('main/login.html.twig', $paramTwig);
        }
        return $render;
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(SessionInterface $session)
    {
        $session->remove('employee_login');
        return $this->redirectToRoute('login');
    }

}