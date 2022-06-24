# plafitech_FR
GED web pour Plafitech (base d'exemple pour TP Docker)

## Initialisation du projet (commandes)
- step 1 : Ouvrez une invite de commandes / GitBash dans le repertoire où vous souhaitez stocker le projet
- step 2 : ``git clone https://github.com/M0NAR0/symfony-docker-tp.git``
- step 3 : ``cd symfony-docker-tp``
- step 4 : ``docker build . -t symfony_docker -f ./docker/Dockerfile``
- step 5 : ``cd docker``
- step 6 : ``docker-compose up -d``
- step 7 : Dans le navigateur, se rendre sur http://127.0.0.1:8081/
- step 8 : Utilisateur: root | mot de passe (vide)
- step 9 : Dans la base plafitech_db, importer le fichier plafitech_db.sql (situé à la racine du projet)
- step 10 : Se rendre sur http://127.0.0.1:8081/
- step 11 : Email: b.cossoneux@plafitech.fr | Mot de passe: root

## Routes
### Services
- 127.0.0.1:8081 : PhpMyAdmin
- 127.0.0.1:8080 : GED Plafitech
### GED
- /admin
- /profile
- /logout
