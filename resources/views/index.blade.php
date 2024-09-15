@extends('layout.index')

@section('Commandez en un click')

@section('main')
    <main class="flex items-center flex-col px-[20px] md:px-[100px]">
    <!-- Card presentation de la chaussure en vogue -->
    <section class="mx-auto  p-4 md:p-0">
      <section class="flex flex-col md:flex-row justify-center gap-5 mt-28">
        <div class="flex flex-col justify-center gap-3">

          <div class="flex flex-col gap-6 max-w-[432px]">
            <h1 class="text-6xl text-[#FE6759] font-bold">
              Air Jordan
              <span class="block mt-2">Rouge et Noir</span>
            </h1>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint saepe nemo quae aspernatur?
              Lorem ipsum dolor sit Lorem ipsum dolor sit amet dolor sit.
            </p>

            <div class="flex">
              <a href="#" class="flex items-center justify-center gap-1
              bg-[#FE6759] text-white px-5 py-4 rounded-lg hover:bg-[#FE6745] active:bg-[#FE6765] transition-all">
                Acheter maintenant
                <i><img src="{{ asset('panierwhite.svg') }}" alt=""></i>
              </a>
            </div>
          </div>

        </div>


        <div class="flex items-center md:order-last order-first bg-zinc-100 rounded-2xl">
          <img src="{{ asset('2.png') }}" alt="">
        </div>
      </section>

      <div class="flex relative justify-between gap-2 max-w-14 mt-4 ml-1">
        <button class="size-2 rounded-full bg-[#FE6759]"></button>
        <button class="size-2 rounded-full bg-zinc-300"></button>
        <button class="size-2 rounded-full bg-zinc-300"></button>
        <button class="size-2 rounded-full bg-zinc-300"></button>
      </div>
    </section>

    {{-- Diffentes Marques --}}
    <section class="w-full py-4 overflow-hidden">
      <div class="liste_marques w-full flex justify-around items-center">

        @foreach ($brands as $brand)
            <div>
                <img src="{{ $brand->logo }}" alt="">
            </div>
        @endforeach

      </div>

    </section>

    {{-- Artcles En Vogue --}}
    <section class="flex flex-col md:flex-row  gap-8 items-center py-10 mx-auto">

      <div class="flex items-center bg-zinc-100 px-4 gap-x-4 py-6 rounded-xl">

        <article class="flex flex-col gap-3 justify-between">
          <h1 class="text-lg font-bold">
            La nouvelle sortie de
            <span class="block">Nike Hight</span>
          </h1>
          <p class="text-xs md:text-lg text-[#666666]">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
          <a class="flex text-sm items-center gap-x-2 text-[#FE6759]" href="#">
            Voir plus
            <i><img src="{{ asset('fleche.svg' )}}" class="size-4" alt=""></i>
          </a>
        </article>

        <article>
          <img src="{{ asset('1.png' )}}"  alt="">
        </article>
      </div>

      <div class="flex items-center bg-zinc-100 px-4 gap-x-4 py-6 mx-auto rounded-xl">

        <article class="flex flex-col gap-3 justify-around">
          <h1 class="text-lg font-bold">
            La nouvelle sortie de
            <span class="block">New Balence</span>
          </h1>
          <p class="text-xs md:text-lg text-[#666666]">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
          <a class="flex text-sm items-center gap-x-2 text-[#FE6759]" href="#">
            Voir plus
            <i><img src="{{ asset('fleche.svg' )}}" class="size-4" alt=""></i>
          </a>
        </article>

        <article>
          <img src="{{ asset('6.png') }}"  alt="">
        </article>
      </div>

    </section>

    <!-- Les Articles en vente -->
    <section class="mx-auto p-8">
      <!-- Title -->
      <nav class="flex items-center justify-between mb-4">
        <h1 class="text-lg font-bold">Les indispensables</h1>
        <a class="flex text-sm items-center gap-x-2 text-[#FE6759]" href="#">
          Voir plus
          <i><img src="{{ asset('fleche.svg') }}" class="size-4" alt=""></i>
        </a>
      </nav>

      <section class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @foreach($products as $product)
            <div class="flex flex-col gap-y-2 my-4">

            <article class="bg-zinc-100 rounded-lg flex flex-col px-4 py-2">
                <img src="{{ asset($product->productmedia[0]->path) }}" alt="">
            </article>

            <article>
                <span class="font-bold text-lg">
                    {{ $product->name }}
                </span>

                <div class="flex items-center gap-x-2">
                <article class="flex items-center gap-2">
                    @for ($i = 1; $i <= 4; $i++)
                        @if ( $i <= $product->stars )
                            <img src="{{ asset('star-fill.svg') }}" alt="">
                        @else
                            <img src="{{ asset('star.svg') }}" alt="">
                        @endif
                    @endfor
                </article>
                <span class="text-[#666666] text-xs">({{ $product->comments }} avis)</span>
                </div>
            </article>

            <span class="text-[#010101] text-2xl font-bold">{{ $product->price }} fcfa</span>
            </div>
        @endforeach
      </section>

    </section>

    <section class="flex flex-col md:flex-row justify-between gap-4 bg-zinc-100 rounded-2xl my-7 w-full">

      <div class="flex flex-col justify-center gap-2">

        <div class="flex flex-col p-4 md:p-0 md:items-center justify-center gap-y-5">

          <h1 class="text-3xl md:text-6xl text-[#FE6759] font-bold">
            Nous vous
            <span class="block">livrons partout</span>
          </h1>

          <p class="text-[#666666] text-center text-lg md:ml-20">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero.
          </p>

        </div>

        <a class="flex p-4 text-lg items-center gap-x-2 text-[#FE6759] font-bold md:mt-7 md:ml-20" href="#">
          En savoir plus
          <i><img src="{{ asset('fleche.svg') }}" class="size-4" alt=""></i>
        </a>

      </div>

      <div class="order-first md:order-last">
        <img src="{{ asset('Frame 32.png') }}" alt="">
      </div>
    </section>

    <section class="mx-auto p-8">
      <!-- Title -->
      <nav class="flex items-center justify-between mb-4">
        <h1 class="text-lg font-bold">Les articles favoris</h1>
        <a class="flex text-sm items-center gap-x-2 text-[#FE6759]" href="#">
          Voir plus
          <i><img src="public/fleche.svg" class="size-4" alt=""></i>
        </a>
      </nav>

      <section class="grid grid-cols-1 md:grid-cols-4 gap-8">

        <div class="flex flex-col gap-y-2 my-4">

          <article class="bg-zinc-100 rounded-lg flex flex-col justify-center md:h-[300px] px-4 py-2">
            <img src="{{ asset('vans-1.png') }}" alt="">
          </article>

          <article>
            <span class="font-bold text-lg">
              Vans Old Skool
            </span>

            <div class="flex items-center gap-x-2">
              <article class="flex items-center gap-2">
                <img src="{{ asset('star-fill.svg') }}" alt="">
                <img src="{{ asset('star-fill.svg') }}" alt="">
                <img src="{{ asset('star-fill.svg') }}" alt="">
                <img src="{{ asset('star-fill.svg') }}" alt="">
                <img src="{{ asset('star.svg') }}" alt="">
              </article>
              <span class="text-[#666666] text-xs">(126 avis)</span>
            </div>
          </article>

          <span class="text-[#010101] text-2xl font-bold">37.000 fcfa</span>
        </div>

        <div class="flex flex-col gap-y-2 my-4">

          <article class="bg-zinc-100 rounded-lg flex flex-col justify-center md:h-[300px] px-4 py-2">
            <img class="" src="public/nike-air-max-90-1.png" alt="">
          </article>

          <article>
            <span class="font-bold text-lg">
              Nike Air Max 90
            </span>

            <div class="flex items-center gap-x-2">
              <article class="flex items-center gap-2">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star.svg" alt="">
              </article>
              <span class="text-[#666666] text-xs">(126 avis)</span>
            </div>
          </article>

          <span class="text-[#010101] text-2xl font-bold">37.000 fcfa</span>
        </div>

        <div class="flex flex-col gap-y-2 my-4">

          <article class="bg-zinc-100 rounded-lg flex flex-col justify-center md:h-[300px] px-4 py-2">
            <img src="public/nike-air-force-1-1.png" alt="">
          </article>

          <article>
            <span class="font-bold text-lg">
              Nike Air Force 1
            </span>

            <div class="flex items-center gap-x-2">
              <article class="flex items-center gap-2">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star.svg" alt="">
              </article>
              <span class="text-[#666666] text-xs">(126 avis)</span>
            </div>
          </article>

          <span class="text-[#010101] text-2xl font-bold">37.000 fcfa</span>
        </div>

        <div class="flex flex-col gap-y-2 my-4">

          <article class="bg-zinc-100 flex rounded-lg flex-col justify-center md:h-[300px] px-4 py-2">
            <img src="public/adidas-1.png" alt="">
          </article>

          <article>
            <span class="font-bold text-lg">
              Adidas eqt Support 93/17
            </span>

            <div class="flex items-center gap-x-2">
              <article class="flex items-center gap-2">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star-fill.svg" alt="">
                <img src="public/star.svg" alt="">
              </article>
              <span class="text-[#666666] text-xs">(126 avis)</span>
            </div>
          </article>

          <span class="text-[#010101] text-2xl font-bold">37.000 fcfa</span>
        </div>


      </section>

    </section>

    <section class="flex flex-col md:flex-row justify-between gap-4 bg-zinc-100 rounded-2xl my-7 w-full py-4 md:p-0">

      <div class="flex flex-col justify-center gap-2">

        <div class="flex flex-col p-4 md:p-0 md:items-center justify-center gap-y-5">

          <h1 class="text-3xl md:text-6xl text-[#FE6759] font-bold">
            Souscrivez a la
            <span class="block">newsletter.</span>
          </h1>

          <p class="text-[#666666] text-center text-lg md:ml-20">
            Pour ne rien rater de nos nouveautés et dernieres aquisitions
          </p>

        </div>

        <div class="flex mx-auto md:mt-5">
          <form action="">
            <input placeholder="Adresse email" class="py-3 px-3 md:px-5 rounded w-56 md:w-80" type="text">
            <input class="bg-[#FE6759] px-3 md:px-5 py-3 text-white rounded" type="submit">
          </form>
        </div>

      </div>

      <div class="order-first md:order-last">
        <img src="{{ asset('Frame 32 (1).png') }}" alt="">
      </div>
    </section>

    <section class="panier_content hidden z-50 h-screen w-screen  items-center justify-center bg-zinc-300/60">

      <div class="flex items-center overflow-y-auto overflow-x-hidden flex-col md:flex-row p-6 min-w-[300px] max-w-[1000px] max-h-[600px] bg-white gap-5 rounded-xl">

        <section class="flex flex-col justify-center p-4 bg-zinc-100/85 w-full max-w-[480px] h-full rounded-lg">

          <div class="flex items-center justify-between gap-x-1 px-12 my-4">
            <button class="rounded-full bg-[#FE6759] size-4"></button>
            <div class="bg-zinc-200 relative flex-1 h-[1px] shrink-0 ">
              <div class="absolute bg-[#FE6759] h-full w-1/2" style="width: 100%; will-change: auto;"></div>
            </div>
            <div class="rounded-full bg-zinc-200 size-4 transition-[background-color] delay-1000"></div>
            <div class="bg-zinc-200 relative flex-1 h-[1px] shrink-0 ">
              <div class="absolute bg-[#FE6759] h-full w-1/2" style="width: 0%; will-change: auto;"></div>
            </div>
            <div class="rounded-full bg-zinc-200 size-4"></div>
          </div>

          <article class="flex flex-col gap-1">
            <h1 class="text-lg font-bold">Finalisez votre commande</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, accusamus!</p>
          </article>

          <div class="flex flex-col gap-4 mt-@">
            <h1 class="font-bold">Quantité</h1>
            <div class="flex flex-col justify-between gap-3 p-3">

              <article class="flex flex-col sm:flex-row justify-between items-center w-full bg-white border rounded-lg p-3 gap-2">
                <div class="flex items-center gap-4">
                  <img class="size-12" src="{{ asset('2.png') }}" alt="">
                  <h1>
                    Air Jordan black
                    <span>and red</span>
                  </h1>
                </div>
                <article class="flex flex-col justify-center items-center">

                  <span class="price font-bold">50.000 fcfa</span>
                  <div class="flex gap-6">
                    <button class="moins px-2 rounded-full text-white">
                      <img src="{{ asset('moins.png') }}" alt="">
                    </button>
                    <span class="product_number">3</span>
                    <button class="plus px-2 rounded-full text-white">
                      <img src="{{ asset('plus.png') }}" alt="">
                    </button>
                  </div>

                </article>
              </article>

              <article class="flex flex-col sm:flex-row justify-between items-center w-full bg-white border rounded-lg p-3 gap-2">
                <div class="flex items-center gap-4">
                  <img class="size-12 object-contain" src="{{ asset('1.png') }}" alt="">
                  <h1>
                    Air Jordan black
                    <span>and red</span>
                  </h1>
                </div>
                <article class="flex flex-col justify-center items-center">

                  <span class="price font-bold">50.000 fcfa</span>
                  <div class="flex gap-6">
                    <button class="moins px-2 rounded-full text-white">
                      <img src="{{ asset('moins.png') }}" alt="">
                    </button>
                    <span class="product_number">3</span>
                    <button class="plus px-2 rounded-full text-white">
                      <img src="{{ asset('plus.png') }}" alt="">
                    </button>
                  </div>

                </article>
              </article>

            </div>
          </div>

          <div>

            <h1 class="font-bold text-lg">Estimation</h1>
            <div class="flex flex-col gap-4 mt-5">

              <article class="flex flex-col gap-2">
                <span class="flex justify-between">
                  <h1 class="text-[#666666]">Sous total</h1>
                  <h1 id="sous_total" class="font-bold">100.000 fcfa</h1>
                </span>
                <span class="flex justify-between">
                  <h1 class="text-[#666666]">Frais de livraison</h1>
                  <h1 class="font-bold">0.00 fcfa</h1>
                </span>
              </article>

              <span class="flex justify-between">
                <h1 class="text-[#666666]">Total</h1>
                <h1 id="total" class="font-bold">100.000 fcfa</h1>
              </span>
            </div>

            <a href="#" class="flex items-center justify-center gap-1 w-full
              bg-[#FE6759] text-white px-5 py-4 rounded-lg hover:bg-[#FE6745] active:bg-[#FE6765]
              transition-all mt-8">
                Continuer
                <img src="{{ asset('Vector (1).png') }}" alt="">
            </a>

          </div>

        </section>

        <article class="relative h-full order-first md:order-last">
          <img class="size-full min-w-[250px] max-w-[700px] max-h-[550px]" src="{{ asset('finish-person.png') }}" alt="">
        </article>

      </div>

    </section>

  </main>

@endsection
