<?php


namespace AppBundle\Security;

use AppBundle\Entity\Referencia;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;



class ReferenciaVote extends Voter
{
    // these strings are just invented: you can use anything
    const VIEW = 'view';
    const EDIT = 'edit';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::VIEW, self::EDIT])) {
            return false;
        }

        // only vote on Post objects inside this voter
        if (!$subject instanceof Referencia) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Post object, thanks to supports
        /** @var Referencia $referencia */
        $referencia = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($referencia, $user);
            case self::EDIT:
                return $this->canEdit($referencia, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Referencia $referencia, User $user)
    {
        // if they can edit, they can view
        if ($this->canEdit($referencia, $user)) {
            return true;
        }

        // the Post object could have, for example, a method isPrivate()
        // that checks a boolean $private property
        return !$referencia->isPrivate();
    }

    private function canEdit(Referencia $referencia, User $user)
    {
        // this assumes that the data object has a getOwner() method
        // to get the entity of the user who owns this data object
        return $referencia->isAuthor($user);
    }
}