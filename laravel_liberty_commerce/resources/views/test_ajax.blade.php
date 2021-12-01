<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/test_ajax.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="consignes">
                Vous devez faire les blocs suivants :<br><br><br>
                Le nombre d'utilisateurs actifs<br><br>
                Le nombre de commandes passées<br><br>
                La plus grosse commande faites sur le site<br><br>
                Ensuite faites un bouton "Refresh" qui va mettre à jour tous les blocs, en AJAX sans recharger la page.
            </div>

            <div class="tests">
                <div id="active_users">
                    <b>Utilisateurs actifs :</b>
                    (nombre d'utilisateurs au total OU actuellement connectés ? --> donc toujours 1)
                </div>
                <div id="orders_n">
                    <b>Nombre de commandes passées :</b>
                    (le nombre d'entrées de la table ORDERS ayant un user_id différent, donc avec COUNT et DISTINCT)
                </div>
                <div id="biggest_order">
                    <b>Plus grosse commande passée :</b>
                    (on récupère le prix total de chaque commande (en triant par user_id et en faisant la somme du prix
                    de tous les produits associés à cet user_id) puis on ne garde que le maximum)
                </div>

                <button id="refresh">Rafraîchir</button>
            </div>

        </div>
    </body>

    @include('layout.footer')

</html>