<?php
namespace ApiBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AuthenticationController extends BaseController
{
    use \AppBundle\Helper\ControllerHelper;


    /**
     * @Security("is_granted('ROLE_USER') or has_role('ROLE_CUSTOMER')")
     * @param Request $request
     * @return Response
     */
    public function authenticateAction(Request $request)
    {
        $user = $this->getUser();
        $response = new Response($this->serialize([$user]), Response::HTTP_OK);
        return $this->setBaseHeaders($response);
    }

    /**
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_CUSTOMER')")
     * @param Request $request
     * @return Response
     */
    public function getUsersAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:User');
        $users = $repo->findAll();
        $response = new Response($this->serialize($users), Response::HTTP_OK);
        return $this->setBaseHeaders($response);
    }

}