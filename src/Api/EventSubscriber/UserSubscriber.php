<?php
/**
 * Created by PhpStorm.
 * User: THU_HUYEN
 * Date: 8/4/2018
 * Time: 1:34 PM
 */

namespace App\Api\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Api\Dto\ForgotPasswordRequest;
use App\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class UserSubscriber implements EventSubscriberInterface
{
    /** @var ContainerInterface */
    private $container;

    public function __construct( ContainerInterface $container)
    {
        $this->container = $container;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendPasswordReset', EventPriorities::POST_VALIDATE],
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     * @return $this|void
     */
    public function sendPasswordReset(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();

        if ('api_forgot_password_requests_post_collection' !== $request->attributes->get('_route')) {
            return;
        }


        $uRepo = $this->container->get('doctrine')->getRepository(User::class);
        /** @var ForgotPasswordRequest $u */
        $u = $event->getControllerResult();
        /** @var User $user */
        $user = $uRepo->findOneByEmail($u->email);

        if ($user){
//
           // var_dump($user);

        }else return $this;


//         $forgotPasswordRequest = $event->getControllerResult();
//        $user = $this->userManager->findOneByEmail($forgotPasswordRequest->email);
//
// //        We do nothing if the user does not exist in the database
//        if ($user) {
//            $this->userManager->requestPasswordReset($user);
//        }

        $event->setResponse(new JsonResponse(null, 204));
    }
}