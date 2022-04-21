<header id="header">
    <div class="names">
        <div class="site_things">
            <div class="site_name">
                <a href="{{url('catalogue')}}" class="name">what2eat</a>
            </div>
                <div class="site_logo"><img src="{{asset('storage/images/logos/Burger.png')}}" class="logo"></div>
        </div>
        @if (Auth::check())
            <div class="header_right">
                @php
                    $right_id = auth()->user()->right_id;
                @endphp
                @if ($right_id == 2)
                    <div class="crown_div">
                        <a href="{{url('admin')}}">
                            <img class="crown" src="{{asset('storage/images/logos/couronne.png')}}">
                        </a>
                    </div>
                @endif
                <a class="user_name" href="{{url('profile')}}">
                    {{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}
                </a>
                <form action="{{route('logout')}}" method="GET">
                    <button type="submit" class="disconnect">Se déconnecter</button>
                </form>
            </div>
        @else
            <div class="header_right">
                <form action="{{route('login')}}" method="GET">
                    <button class="connect" action="/login" method="post" >Se connecter</button>
                </form>
                <form action="{{route('register')}}" method="GET">
                    <button type="submit" class="register">S'inscrire</button>
                </form>
            </div>
        @endif
    </div>
    <nav class="nav">
        <ul class="nav_list">
            <a href="{{url('catalogue/france')}}"><li class="france">France</li></a>
            <a href="{{url('catalogue/espagne')}}"><li class="spain">Espagne</li></a>
            <a href="{{url('catalogue/etats-unis')}}"><li class="usa">États-Unis</li></a>
            <a href="{{url('catalogue/japon')}}"><li class="japan">Japon</li></a>
            <a href="{{url('cart')}}">
                <li>
                    <span class="cart_count">0 | Panier</span><img class="panier" src="{{asset('storage/images/logos/Panier.png')}}">
                </li>
            </a>
        </ul>
    </nav>
    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
</header>