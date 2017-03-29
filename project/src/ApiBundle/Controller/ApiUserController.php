<?php
namespace ApiBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use JMS\Serializer\Serializer;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Monolog\Logger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ApiUserController extends BaseController
{
    use \AppBundle\Helper\ControllerHelper;

    /**
     * @param Request
     * $request
     * @return Response
     */
    public function promoteAction(Request $request)
    {
        $userProvider = $this->get('fos_user.user_manager');
        $id = $request->get("userId");
        $em = $this->getDoctrine()->getManager();
        $userToPromote = $em->getRepository('AppBundle:User')
            ->find($id);
        $userToPromote->addRole('ROLE_CUSTOMER');
        $userProvider->updateUser($userToPromote, false);
        $em->persist($userToPromote);
        $em->flush();

        $response = new Response($this->serialize("User promoted"), Response::HTTP_OK);

        return $this->setBaseHeaders($response);
    }

    public function demoteAction(Request $request)
    {
        $userProvider = $this->get('fos_user.user_manager');
        $id = $request->get("userId");
        $em = $this->getDoctrine()->getManager();
        $userToPromote = $em->getRepository('AppBundle:User')
            ->find($id);
        $userToPromote->removeRole('ROLE_CUSTOMER');
        $userProvider->updateUser($userToPromote, false);
        $em->persist($userToPromote);
        $em->flush();

        $response = new Response($this->serialize("User demoted"), Response::HTTP_OK);

        return $this->setBaseHeaders($response);
    }

    public function getClientsAction(Request $request)
    {

    }

    /**
     * @Security("is_granted('ROLE_USER')")
     */
    public function saveFormAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->info("Save form logger");
        $logger->info($request);
        $data = $request->get('data');
        $logger->info("Save form content");
        $logger->info($request->getContent());
        $logger->info("Deserialize");
        //$logger->info($this->deserialize($request->getContent(), Form0::class));
        $data = json_decode($request->getContent(), true);
        $logger->info("JSON decoded");
        //return new Response($data[0], '409');
        $logger->info($data);
        $numbers = [];


        $user = $this->getUser();
        $logger->info("USER");
        $logger->info($user);
        //$logger->info($allForms->getUser());
        foreach ($data as $key => $value) {
            $logger->info($value);
            if (preg_match_all('/\d+/', $key, $matches)) {
                $number = $matches[0][0];
                $logger->info($number);
                $newNumber = 0;
                //TODO save something
            };
            if ($newNumber == $number) {
                $logger->info($number . " " . $key . " " . $value);
                $set = "set" . $key;

            }
        }


        return new Response("Form saved", 200);
    }

    /**
     * @Security("is_granted('ROLE_USER')")
     */
    public function getFormsAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:AllForms');
        $result = $repo->findAll();
        $logger = $this->get('logger');
        $logger->info("get form logger");
        $logger->info($result);
        return new Response($this->serialize($result), 200);
    }
}