<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
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
                <h3 class="title">REGISTER</h3>
                <a class="already_registered" href="{{url('login')}}"><h4>J'ai déjà un compte</h4></a>
                @if($errors->any())<h4 class="error">{{$errors->first()}}</h4>@endif 
                <form action="/register" method="post" id="form">
                    @csrf
                    <div class="label_input @if($errors->has('first_name')) input_error @endif">
                        <label class ="label" for="first_name">Prénom</label>
                        <input class="input" type="text" name="first_name" value="{{old('first_name')}}">
                    </div>  
                    <div class="label_input @if($errors->has('last_name')) input_error @endif">
                        <label class ="label" for="last_name">Nom</label>
                        <input class="input" type="text" name="last_name" value="{{old('last_name')}}">
                    </div> 
                    <div class="label_input @if($errors->has('email')) input_error @endif">
                        <label class ="label" for="email">Email</label>
                        <input class="input" type="email" name="email" value="{{old('email')}}">
                    </div>  
                    <div class="label_input @if($errors->has('password')) input_error @endif">
                        <label class="label" for="password">Mot de passe</label>
                        <input class="input" type="password" name="password">
                    </div>
                    <div class="label_input @if($errors->has('password')) input_error @endif">
                        <label class="label" for="password_confirmation">Mot de passe - validation</label>
                        <input class="input" type="password" name="password_confirmation">
                    </div>
                    <button id="button" type="submit" value="login">S'INSCRIRE</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')
</html>