<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Profil {{auth()->user()->first_name}}</title>
        <link rel="icon" type="image/gif/png" href="../images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/profil_edit.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="center_div modif_form">
                <h3 class="title">MODIFICATION DE L'UTILISATEUR</h3>
                @if (session('success')) <h4 class="title">{{session('success')}}</h4> @endif
                <form action="/modifyuser" enctype="multipart/form-data" method="post" id="form">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name ="id" value="{{auth()->user()->id}}">
                    <div class="label_input">
                        <label class ="label" for="first_name" >Nouveau prénom</label>
                        <input class="input" type="text" name="first_name">
                    </div>  
                    <div class="label_input">
                        <label class ="label" for="last_name" >Nouveau nom</label>
                        <input class="input" type="text" name="last_name">
                    </div>  
                    <div class="label_input">
                        <label class ="label" for="email" >Nouvel email</label>
                        <input class="input" type="email" name="email">
                    </div>
                    <div class="label_input">
                        <label class ="label" for="shipping_address" >Nouvelle adresse de livraison</label>
                        <input class="input" type="text" name="shipping_address">
                    </div>
                    <div class="delete_button">
                        <button class="input" type="submit" name="del_shipping_address" value="1">Supprimer l'adresse de livraison</button>
                    </div>
                    <div class="label_input">
                        <label class ="label" for="avatar">Nouvelle image de profil</label>
                        <input class="input" type="file" name="avatar">
                    </div>
                    <div class="label_input">
                        <label class="label" for="description">Nouvelle description</label>
                        <textarea class="input" rows="10" type="text" name="description"></textarea>
                    </div>
                    <div class="delete_button">
                        <button class="input" type="submit" name="del_description" value="1">Supprimer la description</button>
                    </div>
                    
                    <button id="button" type="submit" value="edit_user">Modifier</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')

</html>