<?php

namespace App\EventNewTrick;
 
use App\Entity\User;
use App\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
 
/**
 * Envoi un mail de bienvenue à chaque creation d'un utilisateur
 *
 */
class NewTrickNotify
{
 
    public function __construct()
    {
        
    }
 
    public static function getNewTrickEvents(): array
    {
        return [
            // le nom de l'event et le nom de la fonction qui sera déclenché
            Events::NEW_TRICK => 'NewTrickWithImage',
        ];
    }
 
    public function NewTrickWithImage(GenericEvent $event): void
    {

    }
}

