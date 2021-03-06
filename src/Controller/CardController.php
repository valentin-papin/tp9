<?php

namespace App\Controller;


use App\AppAccess;
use App\Entity\Card;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @Route(path="/card")
 */
class CardController extends Controller
{
    /**
     * @Route(
     *     path="",
     *     name="card_index"
     * )
     */
    public function indexdAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cards = $em->getRepository(Card::class)->findAll();

        return $this->render('Card/index.html.twig', ['cards' => $cards]);
    }

    /**
     * @Route(
     *     path="{id}/show",
     *     name="card_show"
     * )
     */
    public function showAction(Card $card, AuthorizationCheckerInterface $authChecker){

        /*
        if (false === $authChecker->isGranted(AppAccess::CardShow, $card)) {
            return $this->redirectToRoute('card_index');
        }

        $this->denyAccessUnlessGranted(AppAccess::CardShow, $card);

        */

        return $this->render('Card/show.html.twig', ['card' => $card]);
    }
}
