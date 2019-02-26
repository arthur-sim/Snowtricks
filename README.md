# Snowtricks

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d0c4fd29ca847c4be6c4737912f1e24)](https://app.codacy.com/app/arthur-sim/Snowtricks?utm_source=github.com&utm_medium=referral&utm_content=arthur-sim/Snowtricks&utm_campaign=Badge_Grade_Dashboard)

Snowtricks est le site pour tout les fans de  **Snowboard**. 
Qui contient tout pour partager autour du Snowboard , trick , espace de discussion, vidéos .. 

# Diagrammes UML
Pour voir tout les diagrammes du projets:

`Sequence :`  https://github.com/arthur-sim/Snowtricks/blob/master/Diagrams/Sequence.dia

`Diagramme de classe :`  https://github.com/arthur-sim/Snowtricks/blob/master/Diagrams/Ddc.dia

`Cas d'utilisation :` https://github.com/arthur-sim/Snowtricks/blob/master/Diagrams/CasDutilisation.dia

# Installation
Pour installer le site copiez les différents fichiers ( fichier diagrammes peu utiles ) 
Installez ensuite les vendor en faisant un `composer install`
Si vous utilisez un service tel que Wamp , Mamp ou Xamp vérifiez bien qu'il soit lancé.

# Database initialisation
Ouvrez une console a la racine du projet
Lancez la commande **php bin/console doctrine:fixtures:load** pour avoir les données d'exemples.
Ces données comportes des utilisateur , des tricks ainsi que leurs images , vidéos et commentaires.
N'oubliez pas de connecter votre base de données avant de faire les étapes ci dessus
Ce lien pourras vous aider https://symfony.com/doc/current/doctrine.html
