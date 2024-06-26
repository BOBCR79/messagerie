PROJET FINAL MESSAGERIE

Réseau social type X “like”.
Il faudra développer un réseau social basique permettant aux utilisateurs de se créer un
profil, publier des posts, commenter et aimer des publications.

Fonctionnalités principales

1. Inscription et authentification des utilisateurs
- Système d'inscription par email/mot de passe.
- Authentification sécurisée (login/logout).

2. Publications (posts)
- Création, modification et suppression de posts par les utilisateurs.
- Ajout de texte et images aux posts.
- Affichage des posts dans le fil d'actualité.

3. Commentaires et réactions
- Possibilité de commenter les posts.
- Système de likes pour les posts et les commentaires.
- Affichage du nombre de likes et de commentaires.

4. Fil d'Actualité (page d’accueil)
- Affichage des posts publiés par les utilisateurs du réseau.
- Tri par date de publication ou popularité.
- Pagination des posts : 10 par page

5. Sécurité
- Gestion des sessions sécurisée.
- Contrôles d'accès basés sur les rôles (utilisateurs réguliers et administrateurs).

6. Interface utilisateur
- Interface intuitive et facile à utiliser.
- Messages d'erreur clairs et instructions pour l'utilisateur.

7. Traduction
- Utiliser le composant traduction de Symfony pour gérer les différents contenus
statiques
- Langue française uniquement

Technologies Utilisées
- Symfony 7 et PHP 8.3
- Base de données au choix : MySQL ou PostgreSQL
- Frontend : Twig, HTML5, CSS3 et Bootstrap, JavaScript optionnel
- Contrôle de version : Git


run tailwind
 php bin/console tailwind:build --watch