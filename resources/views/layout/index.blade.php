<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .liste_marques{
    animation: defile 10s infinite;
  }

  @keyframes defile {
    0%{
      transform: translateX(100%);
    }

    100%{
      transform: translateX(-115%);
    }
  }

  .animate-panier{
    animation: panier 0.7s ease-in-out;
  }


  @keyframes panier {

    0%{
      transform: translateX(-2px);
    }
    20%{
      transform: translateX(4px);
    }

    40%{
      transform: translateX(-2px);
    }
    60%{
      transform: translateX(4px);
    }

    80%{
      transform: translateX(-2px);
    }

  }

  .taille-active{
    background-color: #FE6759;
    color: white;
  }

  .menu-icon {
    transition: transform 0.3s ease;
  }
  .menu-icon.active .line1 {
    transition: 0.5s;
    transform: rotate(45deg) translate(7px, 7px);
  }
  .menu-icon.active .line2 {
    opacity: 0;
  }
  .menu-icon.active .line3 {
    transition: 0.5s;
    transform: rotate(-45deg) translate(5px, -5px);
  }



@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }

  .animate-bounce {
    animation: bounce 0.5s ease-in-out;
  }

    </style>
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/panier.js') }}" defer></script>
    @vite('resources/css/app.css')
  </head>
  <body>
    <!-- Header  -->

    <header class="fixed border-b-2 rounded-b-md m-0 border-b-zinc-200 bg-white/90 z-30 left-1/2 md:px-24 -translate-x-1/2 top-0 w-full p-6 flex flex-col justify-between mx-auto items-center gap-1">
        <!-- Logo & title -->
        <div class="w-full flex items-center justify-between">

          <div class="flex items-center gap-x-2">
            <img class="size-6 md:size-10" src="{{ asset('Vector.png') }}" alt="">
            <h1 class="text-2xl md:text-3xl font-bold">WShop</h1>
          </div>

          <nav class="hidden md:block">
            <ul class="flex flex-col md:flex-row justify-around items-center my-auto gap-x-4 md:gap-x-4 lg:gap-x-8">
              <li class="text-[#FE6759] font-bold">
                <a href="{{ route('index') }}">Acceuil</a>
              </li>
              <li>
                <a href="#">Nos produits</a>
              </li>
              <li>
                <a href="#">Lien 1</a>
              </li>
              <li>
                <a href="#">Lien 2</a>
              </li>
            </ul>
          </nav>

          <div class="hidden md:flex justify-center items-center sm:gap-x-1 md:gap-3">
            <button>
              <img src="{{ asset('user.svg') }}" class="size-4 md:size-5" alt="">
            </button>

            <button>
              <img src="{{ asset('favoris.svg') }}" class="size-4 md:size-5" alt="">
            </button>

            <button>
              <img src="{{ asset('search.svg') }}" class="size-4 md:size-5" alt="">
            </button>

            <button class="panier relative">
                <img src="{{ asset('panier.svg') }}" class="size-5" alt="">
                <span class="cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs hidden">0</span>
            </button>
          </div>

          <div id="menuIcon" class="md:hidden menu-icon cursor-pointer p-4 flex flex-col items-center justify-center gap-1">
            <div class="line1 w-7 h-[4px] px-2 rounded bg-[#FE6759]"></div>
            <div class="line2 w-7 h-[5px] px-2 rounded bg-[#FE6759]"></div>
            <div class="line3 w-7 h-[4px] px-2 rounded bg-[#FE6759]"></div>
          </div>

        </div>

        <nav class="menu hidden">
            <ul class="flex justify-around items-center my-auto gap-x-4 md:gap-x-4 lg:gap-x-8">
              <li class="text-[#FE6759] font-bold">
                <a href="{{ route('index') }}">Acceuil</a>
              </li>
              <li>
                <a href="#">Nos produits</a>
              </li>
              <li>
                <a href="#">Lien 1</a>
              </li>
              <li>
                <a href="#">Lien 2</a>
              </li>
            </ul>

            <div class="flex justify-center items-center gap-1 mt-3">
              <button>
                <img src="{{ asset('user.svg') }}" class="size-4" alt="">
              </button>

              <button>
                <img src="{{ asset('favoris.svg') }}" class="size-4" alt="">
              </button>

              <button>
                <img src="{{ asset('search.svg') }}" class="size-4" alt="">
              </button>

              <button class="panier relative">
                <img src="{{ asset('panier.svg') }}" class="size-4" alt="">
              </button>
            </div>
        </nav>

    </header>

    @yield('main')

      <footer class="bg-[#010101] p-5 md:p-20">

        <div class="flex items-center gap-2">
          <img class="size-7 md:size-10" src="{{ asset('Vector.png') }}" alt="">
          <h1 class="text-2xl md:text-3xl text-white font-bold">WShop</h1>
        </div>

        <section class="flex justify-around items-center gap-2 mt-6 md:mt-16">

          <div class="flex flex-col gap-2">
            <h1 class="text-white font-bold">A Propos</h1>
            <ul class="flex flex-col gap-2">
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
            </ul>
          </div>

          <div class="flex flex-col gap-2">
            <h1 class="text-white font-bold">Politique</h1>
            <ul class="flex flex-col gap-2">
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
            </ul>
          </div>

          <div class="flex flex-col gap-2">
            <h1 class="text-white font-bold">Contact</h1>
            <ul class="flex flex-col gap-2">
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
              <li class="text-white/75 hover:text-white/90 cursor-pointer text-xs md:text-lg">ceci est un lien !</li>
            </ul>
          </div>

        </section>

        <hr class="text-[#E6E6E6] my-4 md:my-6">

        <section class="flex md:flex-row flex-col gap-y-4 justify-around">

          <div class="flex justify-between flex-wrap font-bold gap-4 text-white text-sm md:text-lg">
            <span class="text-center font-bold mx-auto md:text-start">Copyright © Bamba Younouss</span>
            <span>Designed by Digital guild</span>
            <span>|</span>
            <span>Politique et termes</span>
          </div>

          <div class="flex justify-center gap-4">

            <button>
              <img class="size-6" src="{{ asset('facebook.png') }}" alt="">
            </button>

            <button>
              <img class="size-6" src="{{ asset('insta.png') }}" alt="">
            </button>

            <button>
              <img class="size-6" src="{{ asset('x.png') }}" alt="">
            </button>

          </div>

        </section>
      </footer>
  </body>
</html>
