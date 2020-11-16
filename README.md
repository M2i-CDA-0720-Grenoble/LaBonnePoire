# Projet LaBonnePoire UML

## User stories & Routes

| User story | Méthode HTTP | Route | Contrôleur | Méthode |
| --- | --- | --- | --- | --- |
| En tant que **visiteur**, j'ai besoin d'**une page d'accueil** afin d'**accéder aux services de l'application** | GET | `/` | `MainController` | `index` |
| En tant que **visiteur**, j'ai besoin d'**un formulaire de contact** afin de **pouvoir poser des questions aux administrateurs** | GET\|POST | `/contact` | `MainController` | `contact` |
| En tant que **visiteur**, j'ai besoin d'**un champ de recherche** afin de **trouver les annonces correspondant à certains critères** | GET | `/search` | `MainController` | `search` |
| En tant que **visiteur**, j'ai besoin d'**une liste des annonces** afin de **pouvoir faire mon choix parmi les annonces disponibles** | GET | `/advert` | `AdvertController` | `index` |
| En tant que **visiteur**, j'ai besoin d'**une page du détail d'une annonce** afin d'**en savoir plus sur une annonce qui m'intéresse**. | GET | `/advert/:id` | `AdvertController` | `show` |
| En tant que **visiteur**, j'ai besoin d'**un formulaire d'inscription** afin de **créer un compte** | GET\|POST | `/signup` | `SecurityContoller` | `signup` |
| En tant que **visiteur**, j'ai besoin d'**un formulaire d'authentification** afin d'**accéder à mon compte** | GET\|POST | `/login` | `SecurityController` | `login` |
| En tant que **membre inscrit**, j'ai besoin d'**un bouton de déconnexion** afin de **refermer mon compte** | POST | `/logout` | `SecurityController` | `logout` |
| En tant que **membre inscrit**, j'ai besoin d'**une page de profil** afin de **mettre à jour mes informations** | GET\|POST | `/account` | `AccountController` | `index` |
| En tant que **membre inscrit**, j'ai besoin d'**un bouton dans la description de chaque annonce** afin de **faire une offre d'achat** | POST | `/:advert/:id/buy` | `AdvertController` | `buy` |
| En tant que **membre inscrit**, j'ai besoin d'**une liste des annonces pour lesquelles des offres sont en cours** afin de **confirmer la vente** | GET | `/offer` | `OfferController` | `index` |
| En tant que **membre inscrit**, j'ai besoin d'**un bouton "validation" sur la page "mes offres"** afin de **valider mes offres en cours** | POST | `/offer/validate` | `OfferController` | `validate` |
| En tant que **membre inscrit**, j'ai besoin d'**un bouton "refus" sur la page "mes offres"** afin de **refuser mes offres en cours** | POST | `/offer/deny` | `OfferController` | `deny` |
| En tant que **membre inscrit**, j'ai besoin d'**une liste des annonces d'objets que j'ai vendu** afin de **gérer mes ventes** | GET | `/account/advert` | `AccountController` | `advert` |
| En tant que **membre inscrit**, j'ai besoin d'**un formulaire d'évaluation de la vente** afin de **valider la transaction entre les 2 protagonistes** | GET\|POST | `/offer/evaluate` | `OfferController` | `evaluate` |
| En tant que **membre inscrit**, j'ai besoin d'**un bouton dans la description de chaque annonce** afin de **contacter l'auteur de l'annonce** | GET | `/account/message/:id` | `AccountController` | `contact` |
| En tant que **membre inscrit**, j'ai besoin d'**un formulaire de messagerie** afin d'**écrire à un membre** | POST | `/account/message/:id/new` | `AccountController` | `newMessage` |
| En tant que **membre inscrit**, j'ai besoin d'**une liste de tous les messages envoyés et reçus** afin d'**suivre les discussions** | GET | `/account/message/show` | `AccountController` | `allMessages` |
| En tant que **membre inscrit**, j'ai besoin d'**une page de détail d'une discussion** afin d'**visualiser tous les messages avec un utilisateur** | GET | `/account/message/show/:id` | `AccountController` | `discussion` |
| En tant qu'**administrateur**, j'ai besoin d'**une liste de toutes les annonces existantes** afin d'**avoir accès aux fonctionnalités de modification des annonces** | GET | `/admin/advert` | `Admin\MainController` | `advert` |
| En tant qu'**administrateur**, j'ai besoin d'**un bouton de suppression pour chaque annonce** afin de **supprimer cette annonce** | POST | `/admin/advert/:id/delete` | `Admin\AdvertController` | `delete` |
| En tant qu'**administrateur**, j'ai besoin d'**une liste de tous les membres inscrits existants** afin d'**avoir accès aux fonctionnalités de modification des membres inscrits** | GET | `/admin/members` | `Admin\MainController` | `members` |
| En tant qu'**administrateur**, j'ai besoin d'**un formulaire d'ajout de membre** afin d'**ajouter des nouveaux membres** | GET\|POST | `/admin/members/new` | `Admin\AdvertController` | `new` |
| En tant qu'**administrateur**, j'ai besoin d'**un formulaire de modification de membre** afin de **modifier des membres existants** | GET\|POST | `/admin/members/:id/update` | `Admin\AdvertController` | `update` |
| En tant qu'**administrateur**, j'ai besoin d'**un bouton de suppression pour chaque membre** afin de **supprimer ce membre** | POST | `/admin/members/:id/delete` | `Admin\AdvertController` | `delete` |
