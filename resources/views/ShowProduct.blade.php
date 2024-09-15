@extends('layout.index')

@section('Commande')

@section('main')

    <main class="flex items-center flex-col px-[20px] md:px-[100px]">

        <section class="flex items-center flex-col md:flex-row justify-center gap-6 mt-28 w-full">

            <!-- Articles et proposition -->
            <section class="flex flex-col gap-3">

              <div class="bg-zinc-100 rounded-2xl">
                <img src="{{ asset('2.png') }}" alt="">
              </div>

              <div class="flex gap-5 sm:grid sm:grid-cols-4 items-center overflow-auto w-full">

                <article class="bg-zinc-100 rounded-lg p-4">
                  <img class="sm:size-36 object-contain" src="{{ asset('1.png') }}" alt="">
                </article>

                <article class="bg-zinc-100 border border-[#FE6759] rounded-lg p-4">
                  <img class="sm:size-36 object-contain" src="{{ asset('2.png') }}" alt="">
                </article>

                <article class="bg-zinc-100 rounded-lg p-4">
                  <img class="sm:size-36 object-contain" src="{{ asset('3.png') }}" alt="">
                </article>

                <article class="bg-zinc-100 rounded-lg p-4">
                  <img class="sm:size-36 object-contain" src="{{ asset('4.png') }}" alt="">
                </article>

              </div>

            </section>

            <!-- Informations de l'article -->
            <section class="">

              <!-- Titre et Prix -->
              <div class="flex flex-col gap-6">

                <article class="flex flex-col gap-2">
                  <h1 class="text-3xl text-[#010101] font-bold">Nike Air Jordan</h1>
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

                <h1 class="text-4xl mt-2 font-bold">37.000 fcfa</h1>

              </div>

              <!-- Pointures  -->
              <div class="flex flex-col gap-2 mt-12">
                <h1 class="text-lg font-bold">Taille</h1>
                <article class=" grid grid-cols-5 sm:grid-cols-6 gap-2">
                  <span class="border px-5 py-3 m-auto rounded-lg">37</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">38</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">39</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">40</span>
                  <span class="border px-5 py-3 m-auto rounded-lg taille-active">41</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">42</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">43</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">44</span>
                  <span class="border px-5 py-3 m-auto rounded-lg">45</span>
                </article>
              </div>

              <!-- Description -->
              <div class="flex flex-col gap-3 mt-12 max-w-96">
                <h1 class="font-bold">Description</h1>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim magni asperiores tempora culpa quas dolorem.
                </p>
              </div>

              <div class="flex flex-col mt-12 gap-4">

                <div class="flex gap-2">
                  <a href="#" class="flex items-center justify-center gap-1 w-full
                    bg-[#FE6759] text-white px-5 py-4 rounded-lg hover:bg-[#FE6745] active:bg-[#FE6765] transition-all">
                      Ajouter au panier
                      <i><img src="{{ asset('panierwhite.svg') }}" alt=""></i>
                  </a>
                  <button class="bg-zinc-100 py-4 px-5 rounded-lg">
                    <img src="heart-3-line.svg" alt="">
                  </button>
                </div>

                <div class="flex items-center gap-2 ml-1">
                  <button>
                    <img src="{{ asset('vector.svg') }}" alt="">
                  </button>
                  <span class="font-bold">Livraison gratuite a partir de 40.000 fcfa</span>
                </div>

              </div>

            </section>



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
