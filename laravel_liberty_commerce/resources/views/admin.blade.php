<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="center_div">
                <h3 class="title">AJOUT D'UN PRODUIT</h3> 
                <form action="/admin" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="label_input">
                        <label class ="label" for="name">Nom</label>
                        <input class="input" type="text" name="name">
                    </div>
                    <div class="label_input">
                        <label class ="label" for="image">Image</label>
                        <input class="input" type="file" name="image">
                    </div>
                    <div class="label_input">
                        <label class="label" for="description">Description</label>
                        <textarea class="input" rows="10" type="text" name="description"></textarea>
                    </div>
                    <div class="label_input">
                        <label class="label" for="price">Prix</label>
                        <input class="input" type="number" step="0.01" name="price">
                    </div>
                    <div class="label_input">
                        <label class ="label" for="category">Catégorie</label>
                        <select name="category">
                            <option value="France">France</option>
                            <option value="Espagne">Espagne</option>
                            <option value="Etats-Unis">Etats-Unis</option>
                            <option value="Japon">Japon</option>
                        </select>
                    </div>
                    <div class="label_input">
                        <label class="label" for="stock">Stock</label>
                        <input class="input" type="number" step="1" name="stock">
                    </div>

                    <button id="button" type="submit" value="add_product">AJOUTER</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')

</html>