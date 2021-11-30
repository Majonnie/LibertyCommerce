<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Reset password</title>
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forms.css">
    </head>

    @include('layout.header')

    <body>
        <div id="main_wrapper">
            <div class="center_div">
                <h3 class="title">RESET PASSWORD</h3>
                @if ($errors->any()) <h4 class="error">{{$errors->first()}}</h4> @endif 
                <form action="/reset" method="post" id="form">
                    @csrf
                    <div class="label_input">
                        <label class ="label" for="email">Email</label>
                        <input class="input" type="email" name="email">
                    </div>
                    <button id="button" type="submit" value="reset">REINITIALISER</button>
                </form>
            </div>
        </div>
    </body>

    @include('layout.footer')

</html>