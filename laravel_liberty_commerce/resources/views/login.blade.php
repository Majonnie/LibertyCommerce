<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="icon" type="image/gif/png" href="storage/images/logos/Burger.png">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="center_div">
                <h3 class="title">LOGIN</h3>
                <a class="already_registered" href="{{url('reset')}}"><h4>Mot de passe oublié</h4></a>
                @if ($errors->any()) <h4 class="error">{{$errors->first()}}</h4> @endif
                <form action="/login" method="post" id="form">
                    @csrf
                    <div class="label_input">
                        <label class ="label" for="email">Email</label>
                        <input class="input" type="email" name="email" value="{{old('email')}}">
                    </div>  
                    <div class="label_input">
                        <label class="label" for="password">Mot de passe</label>
                        <input class="input" type="password" name="password">
                    </div>
                    <button id="button" type="submit" value="login">CONNEXION</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')
</html>