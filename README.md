# AIDE #

### TWIG  
    https://www.ionos.fr/digitalguide/sites-internet/developpement-web/markdown/
    TWIG fichier base, extends, block body et content  
    Le block body dans base permet d'afficher le contenu des block content des fichiers enfants
    Le block content dans base permet d'afficher le contenu fichier enfant
    Les fichiers enfants doivent avoir un block content et non BODY

####  WEBPACK ENCORE & BOOTSTRAP
    Après l'installation de bootstrap via les commandes, il est recommandé de changer les extensions .css en .scss  
    Aussi, ce changement doit se refléter dans le app.js qui est chargé de loader les fichier style  
    Le loader de fichiers scss doit également être activé dans le webpack.config.js
    Il faut enfin installer le sass loader
    Se référer à cette source si besoin 
    https://yoandev.co/bootstrap-5-avec-symfony-5-et-webpack-encore/
    