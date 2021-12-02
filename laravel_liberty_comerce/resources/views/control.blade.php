<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/control.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="tests">
                <div id="active_users">
                    <b>Utilisateurs actifs :</b>
                    <span id="usernumber"></span>
                </div>
                <div id="orders_n">
                    <b>Nombre de commandes passées :</b>
                    <span id="ordernumber"></span>
                </div>
                <div id="biggest_order">
                    <b>Plus grosse commande passée :</b>
                    <span id="biggestorder"></span>
                </div>

                <button id="refresh">Rafraîchir</button>
            </div>

        </div>
    </body>
    <script type="text/javascript" src="../js/control.js"></script>
    @include('layout.footer')

</html>