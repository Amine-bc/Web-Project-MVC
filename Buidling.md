# Plan to organise my work


- Les remises dépendent du type de la carte acheté (Classique, jeunes, premium,…ect). ( he means there are many tables ??)

- Des fonctionnalités de carte privilège, fidélité et remise supplémentaire ou récompenses. 

- Create a page of renouvelement de subscription.

- make a reminder ( notif system goes to database everyday checks expiry date
and sends you to do renouvelement) 


  - sélectionner leurs partenaires favoris.

- Un historique des dons, bénévolat, paiement et remises obtenus est disponible sur le profil.


## Page de Remises et Avantages (1 point)

o Cette page permet aux membres de visualiser toutes les remises et avantages qu’offre les
partenaires de l’association, avec des filtres et tries.<br>
o La page permet aussi d’afficher les remises spéciales et les offres limitées dans le temps.

## Service de Dons et Bénévolat (2 points)

o Les membres peuvent faire des dons par virement et envoyer le reçu via l’application.<br>
o Une traçabilité de leurs dons peut être disponible dans l’historique.<br>
o Tous les utilisateurs peuvent faire un don, mais seule les membres bénéficient de la
traçabilités s’il le souhaite.<br>
o L’application permet également aux membres de s’inscrire comme bénévoles pour les
événements de l’association.<br>
o Une page spéciale pour les demandes d’aides permet à n’importe quelle personne de
demandé de l’aide ou en faire bénéficier une personne en remplissant un formulaire (Nom,
prénom, date de naissance, type d’aide, description) et en envoyant un dossier au format
zip.<br>
o Chaque type d’aide est décrite par les administrateurs du site avec le dossier correspondant.


## Service de vérification par les partenaires (2 points)

o Les partenaires bénéficient de comptes spéciaux créer par l’administrateur<br>
o Les partenaires bénéficient de cartes spéciales partenaires<br>
o Un compte partenaire permet de lire le code QR des membres afin de vérifier leurs validités
et les offres dont elles bénéficient.<br>
o Le remplissage de l’identifiant du membre est en complément du QR code dans le cas d’un
problème de lecture du QR code.

## Autres fonctionnalités (1 point)

o Notifications pour les membres concernant les événements, promotions, nouveau
partenaire, bénévolat et rappels de renouvellement de l’adhésion.<br>
o Affiche des services de conseil et de formation disponibles pour les membres dans divers
domaines.
---

# Things that I passed and missed and need to add
- change content of news in db.
- go to ui home screen and add the effect of zoom on cards of events center them
- add zoom effect on page events
- add address and number to form, and add to model
- change diapo
- solve the issue of ( post file is big in size ) in register form
- databse content in french please

---

# Done
- the page news and the db that puts all the news
  - we need to create a simple data base for news
  - then we just have two methods:
    - findall ( this will be called in the page )
    - findFirst ( this will be called in home )
- the dynamic table that just get 10 first rows and when you click you get the others
  - we first render all the first 10
  - when click the button increments a variable ( visually also )
    - and then run a function ajax that will get the next remise ..etc

// ------------------------------------------------------------------------------------------------------------------------ //

- Index add the post in register
- Controller
  - then there you save to the model save() Done
  - you generate the qr code Done
  - render card as html ( find a way if you can make it html to png to be downloaded)
    (une carte de membre électronique contenant le nom et le logo de
    l’association, l’identifiant du membre, le nom et prénom et un code QR est générée dans
    le compte du membre ce qui permet l’accès aux remises.) Done
- create a profile page where "Les membres"
  - peuvent modifier leurs coordonnées".