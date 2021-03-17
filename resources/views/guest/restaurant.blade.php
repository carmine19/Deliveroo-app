@extends('layouts.home')

@section('title', $restaurant->name)

@section('content')

  @php

    // strutturazione array associativo id_categoria => nome_categoria}
    $array_dishes_categories = $dishes_category->toArray();
    for ($i=0; $i < count($array_dishes_categories); $i++) {
      unset($array_dishes_categories[$i]['description']);
      unset($array_dishes_categories[$i]['slug']);
      unset($array_dishes_categories[$i]['created_at']);
      unset($array_dishes_categories[$i]['updated_at']);
    }
    // dd($array_dishes_categories);

    // rimuovo attributi non utili al componente, aggiungo attributo quantità e sostituisco id categoria con nome categoria
    $dishes_array  = $restaurant->dishes->toArray();
    for ($i = 0; $i < count($dishes_array); $i++) {

      unset($dishes_array[$i]['restaurant_id']);
      unset($dishes_array[$i]['created_at']);
      unset($dishes_array[$i]['updated_at']);
      $dishes_array[$i]['quantity'] = 0;

      for ($j = 0; $j < count($array_dishes_categories); $j++) {

        // aggiungo nome categoria piatto
        if ($dishes_array[$i]['dish_category_id'] == $array_dishes_categories[$j]['id']) {
          $dishes_array[$i]['dish_category_name'] = $array_dishes_categories[$j]['name'];
        }

      }

    }

    // traduco da array a json per il componente
    // $json_dishes_categories = json_encode($array_dishes_categories);
    $json_dishes_with_category_names = json_encode($dishes_array);

    //categorie assegnate a questo ristorante
    $restaurant_categories_array = $restaurant->categories->toArray();

    //rimuovo gli attributi non utili al componente
    for ($i = 0; $i < count($restaurant_categories_array); $i++) {

      unset($restaurant_categories_array[$i]['pivot']);
      unset($restaurant_categories_array[$i]['created_at']);
      unset($restaurant_categories_array[$i]['updated_at']);

    }

  @endphp

  {{-- {{dd($restaurant->dishes)}} --}}
  {{-- {{dd($restaurant->categories->toArray())}} --}}
  <div id="cart_comp">
    <div class="hamburger">
        <i class="fas fa-bars"></i>
      </div>

    <section class="restaurant">

        <div class="container">

            <div class="row">

              <div class="restaurant-details-container">
                <div class="restaurant-details">
                    {{-- <p>Restaurant Details</p> --}}
                    <h1> {{ $restaurant->name }} </h1>

                    <ul class="list-unstyled">
                        <li>Indirizzo: <span> {{ $restaurant->address }} </span> </li>
                        <li>Telefono: <span> {{ $restaurant->phone }} </span></li>
                        <li>E-mail: <span> {{ $restaurant->email }} </span></li>
                        <li>Categorie:
                        @foreach ($restaurant_categories_array as $category)
                          <span>{{$category['name']}}</span>
                          @if($loop->last)
                          @else
                            <span>,</span>
                          @endif
                        @endforeach
                        </li>
                    </ul>

                    <div class="restaurant-location">
                        {{-- Inserire qui una google maps del ristorante --}}
                    </div>

                </div>

                <div class="restaurant-cover">
                  <img class="" src=" {{asset('storage').'/'.$restaurant->cover}} " alt=" {{$restaurant->name}} ">
                </div>
              </div>
            </div>

            {{-- VUE COMPONENT --}}
            {{-- {{dd(count($restaurant->dishes))}} --}}
            <shopping-cart :flag_restaurant="{{ $restaurant->id }}" :dishes="{{ $json_dishes_with_category_names }}"></shopping-cart>

        </div>
    </section>
  </div>

@endsection()
