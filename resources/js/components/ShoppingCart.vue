<template>

  <div class="component-container">

    <!-- <h2>{{dish_category}}</h2> -->
    <div class="dish-categories">
      <!-- DISHES CARDS -->
      <div class="dish-categories-container" v-for='dish_category in dish_categories_assembled' v-if="">

        <h3 class="dish-category-title">{{dish_category}}</h3>

        <div class="dish-cards-container">
          <!-- da aggiungere v-if visibility -->
          <div class="dish-card" v-for='(dish, index) in json_dishes' v-if="dish.dish_category_name == dish_category && dish.visibility">

            <div class="card-body">

                <div class="img-box">
                  <img :src="'../storage/'+dish.cover" alt="">
                </div>

                            <div class="info-box">
                                <h2 class="dish-header">{{ dish.name }}</h2>
                                <h3>{{ dish.price }}€</h3>
                                <h4>{{ dish.ingredients }}</h4>
                                <a class="btn btn-link"
                                   @click="showModal(index);show_cart = false;proceed = false">Info</a>
                                <div class="cart-adder">

                      <button type="button" name="button" class="btn btn-primary" @click='updateCart(dish, "subtract");piece += 1;'>
                        <i class="fas fa-minus" ></i>
                      </button>

                      <span class="dish-quantity">{{ dish.quantity }}</span>

                      <button type="button" name="button" class="btn btn-primary" @click='updateCart(dish, "add");piece += 1;'>
                        <i class="fas fa-plus"></i>
                      </button>

                  </div>
                </div>

            </div>

            <!-- MODALE PIATTO -->
            <div class="dish-modal" v-if="show_modal">
              <div class="dish-modal-body">
                <div class="close-modal">
                  <i class="fas fa-times" @click="showModal(dish_index)"></i>
                </div>

                  <div class="dish-details">
                    <div class="img-box">
                      <img :src="'../storage/' + dishes[modal_index].cover" alt="">
                    </div>

                    <div class="info-box">
                      <h2 class="dish-header">{{ dishes[modal_index].name }}</h2>
                      <div class="text-container">
                        <h3>Prezzo: <h4>{{ dishes[modal_index].price }}€</h4> </h3>
                      </div>
                      <div class="text-container">
                        <h3>Ingredienti: <h4>{{ dishes[modal_index].ingredients }}</h4> </h3>
                      </div>
                      <div class="text-container">
                        <h3>Descrzione: <h4>{{ dishes[modal_index].description}}</h4> </h3>
                      </div>
                      <div class="cart-adder">

                          <button type="button" name="button" class="btn btn-primary" @click='updateCart(json_dishes[modal_index], "subtract");piece += 1;'>
                            <i class="fas fa-minus" ></i>
                          </button>

                          <span class="dish-quantity">{{ json_dishes[modal_index].quantity }}</span>

                          <button type="button" name="button" class="btn btn-primary" @click='updateCart(json_dishes[modal_index], "add");piece += 1;'>
                            <i class="fas fa-plus"></i>
                          </button>

                      </div>
                    </div>
                  </div>
              </div>
            </div>

          <!-- END DISH CARD -->
          </div>
        </div>

        <div class="space-for-icon-mobile"></div>

      </div>
    </div>

    <!-- SIDEBAR CART -->
    <div :class="show_cart ? 'side-bar-cart-active' : 'side-bar-cart'">
      <div class="cart-icon" @click='showCart()' v-show="!proceed">

        <i :class="piece % 2 == 0 ? 'minimized' : '' " class="fas fa-shopping-cart minimizable"></i>

        <div class="quantity"> <span>{{ totalQuantity }}</span> </div>

      </div>

      <!-- SHOW/HIDE CART -->

      <div class="cart" v-if='show_cart'>

                <ul class='cart-list' v-if="!proceed">
                    <li>
                        <h2 class="cart-title">Carrello: <h3>Totale: {{ this.totalPrice.toFixed(2) }}€</h3></h2>
                    </li>
                    <li class="mb-3" v-for='dish in cart'>
                        <button type="button" name="button" @click="removeProductFromCart(dish.id)"
                                class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <div class="cart-card">
                            <div class="cart-card-img">
                                <img :src="'../storage/'+ dish.cover" alt="">
                            </div>
                            <div class="cart-card-info">
                                <h2>{{ dish.name }}:</h2>
                                <h3>{{ dish.price }}€</h3>
                                <div class="dish-quantity">

                <div class="btn-group">
                  <button type="button" name="button" class="btn btn-primary" @click='updateCart(dish, "subtract");piece += 1;'>
                    <i class="fas fa-minus" ></i>
                  </button>
                  <span>{{ dish.quantity }}</span>
                  <button type="button" name="button" class="btn btn-primary" @click='updateCart(dish, "add");piece += 1;'>
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          </li>
          <li class="space-for-icon-mobile-cart w-100 d-flex justify-content-center">
            <button class="btn btn-success" @click="proceedMethod()" v-if="!proceed && (totalPrice > 0)">Procedi al pagamento</button>
          </li>
        </ul>

        <div class="credit-card-dropin p-4" v-show="proceed">
          <button class="btn btn-primary mb-3" @click="proceed = !proceed" v-if="proceed">Torna indietro</button>
          <h2 class="cart-title">Carrello: <h3>Totale: {{this.totalPrice.toFixed(2)}}€</h3></h2>
          <div class="customer-info d-flex flex-column align-items-baseline">
            <h3 class="mt-2 mb-1">Nome</h3>
            <input type="text" v-model="customer_fname">
            <h3 class="mt-2 mb-1">Cognome</h3>
            <input type="text" v-model="customer_lname">
            <h3 class="mt-2 mb-1">Telefono</h3>
            <input type="number" v-model="customer_phone">
            <h3 class="mt-2 mb-1">E-mail</h3>
            <input type="email" v-model="customer_email">
            <h3 class="mt-2 mb-1">Indirizzo</h3>
            <input type="text" v-model="customer_address">
            <h3 class="mt-2 mb-1">CAP</h3>
            <input type="number" v-model="customer_postal_code">
          </div>
         <!-- <div class="alert alert-success my-2" v-if="nonce">
            Successfully generated nonce.
          </div>
          <div class="alert alert-danger my-2" v-if="error">
            {{ error }}
          </div>-->
          <p id="success"></p>
          <form @submit.prevent="paymentSubmit">
           <!-- <div class="form-group">
               <label for="amount">Amount</label>
               <div class="input-group">
                   <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                   <input type="number" id="amount" class="form-control" placeholder="Enter Amount">
               </div>
           </div> -->
            <hr />
           <div class="form-group">
              <!-- <label>Credit Card Number</label>-->
                <h3>Numero Carta di Credito</h3>
               <div id="creditCardNumber" class="form-control"></div>
           </div>
           <div class="form-group">
               <div class="row">
                   <div class="col-6">
                        <!-- <label>Expire Date</label>-->
                       <h3>Data Scadenza</h3>
                       <div id="expireDate" class="form-control"></div>
                   </div>
                   <div class="col-6">
                      <!--  <label>CVV</label>-->
                       <h3>CVV</h3>
                       <div id="cvv" class="form-control"></div>
                   </div>
               </div>
           </div>
           <button class="btn btn-success" @click.prevent="checkCreditCard">Verifica</button>
           <button v-if="credit_card" class="btn btn-success" type='submit' value="Submit">Termina e paga</button>
           <div class="alert alert-success my-2" v-if="nonce">
            Carta di credito accettata!
          </div>
          <div class="alert alert-danger my-2" v-if="error">
            Carta di credito non valida..
          </div>
        </form>
        </div>

      </div>

    </div>

  </div>


</template>

<script>
import braintree from 'braintree-web';
export default {
  props: ['dishes', 'flag_restaurant'],
  data: function() {
    return {

      //braintree section
      hostedFieldInstance: false,
      nonce: "",
      error: "",
      credit_card: false,

      //customer
      customer_fname: '',
      customer_lname: '',
      customer_email: '',
      customer_address: '',
      customer_phone: '',
      customer_postal_code: '',
      // <input type="text" v-model="customer_fname">
      // <input type="text" v-model="customer_lname">
      // <input type="text" v-model="customer_email">
      // <input type="text" v-model="customer_address">

      //show payment form
      proceed: false,

      //JSON DEI DISHES
      json_dishes: this.dishes,

      //flag per vedere se prendere i dati da local storage o no
      local_storage_good: false,

      //array di categorie raccolte dai dishes
      dish_categories_assembled: [],

      //flag per toggle del carrello
      show_cart: false,

      //flag per toggle del carrello
      show_modal: false,

      //flag per toggle del carrello
      modal_index: 0,

      //flag per verificare se il ristorante è cambiato e cancellare storage
      check_restaurant: this.flag_restaurant,

      //per transition carrello
      piece: 1,

    };

  },
  beforeMount() {

    //raccolgo categorie piatti ristorante
    this.groupDishCategories();

    this.compareLocalStorage();

  },
  mounted() {
    // console.log('storage_dishes.length: ', JSON.parse(localStorage.shopping_cart).length);
    // console.log('dishes_length: ',this.dishes_length);
    // console.log('DISH_CATEGORIES: ', this.json_dish_categories);
    // console.log('DISH_CATEGORIES_PROP: ', this.dish_categories);
    // console.log('dishes: ',this.dishes);
    // console.log('json_dishes: ',this.json_dishes);
    // controlllo se il componente funziona
    // alert('component working!');
  },
  methods: {
    // alrt(){
    //   alert('ok');
    //   window.location.href = 'http://localhost:8000/';
    // },
    paymentSubmit(e) {
      e.preventDefault();
                let currentObj = this;
                axios.post('/payment', {
                    nonce: this.nonce,
                    totalprice: this.totalPrice,
                    firstName: this.customer_fname,
                    lastName: this.customer_lname,
                    email: this.customer_email,
                    streetAddress: this.customer_address,
                    postalCode: this.customer_postal_code,
                    phone: this.customer_phone,
                })
                .then(function (response) {
                    currentObj.output = response.data;
                    //sweetalert

                    swal({
                       title: "Ordine effettuato con successo!",
                       icon: "success",
                       //button: "OK!",
                       //type: "success",
                     }).then(function() {
                     window.location = 'http://localhost:8000/';
                     });

                     //window.location.href = 'http://localhost:8000/';


                })
                .catch(function (error) {
                    currentObj.output = error;
                });
    },
    checkCreditCard() {
      this.error = "";
      this.nonce = "";

       if(this.hostedFieldInstance)
       {
           this.hostedFieldInstance.tokenize().then(payload => {
               console.log(payload);
               this.nonce = payload.nonce;
               this.credit_card = true;
           })
           .catch(err => {
               console.error(err);
               this.error = err.message;
           })
       }
   },
   proceedMethod(){
     this.proceed = !this.proceed;
     braintree.client.create({
            //inserire tokenization del proprio account
            authorization: "sandbox_q7hqzqvd_sqz9bg7z2tr87qrf"
        })
        .then(clientInstance => {
            let options = {
                client: clientInstance,
                styles: {
                    input: {
                        'font-size': '14px',
                        'font-family': 'Open Sans'
                    }
                },
                fields: {
                    number: {
                        selector: '#creditCardNumber',
                        placeholder: 'Enter Credit Card'
                    },
                    cvv: {
                        selector: '#cvv',
                        placeholder: 'Enter CVV'
                    },
                    expirationDate: {
                        selector: '#expireDate',
                        placeholder: '00 / 0000'
                    }
                }
            }
            return braintree.hostedFields.create(options)
        })
        .then(hostedFieldInstance => {
            // @TODO - Use hostedFieldInstance to send data to Braintree
            // Use hostedFieldInstance to send data to Braintree
            this.hostedFieldInstance = hostedFieldInstance;

        })
        .catch(err => {
        });
   },
    compareLocalStorage(){

      // controllo se è salvata la lista di piatti in local storage
      if (localStorage.shopping_cart) {

        var storage_dishes = JSON.parse(localStorage.shopping_cart);
        // controllo se il ristoratore ha tolto o aggiunto piatti
        if (storage_dishes.length == this.dishes.length) {
          //itero i piatti e controllo se il ristoratore ha fatto delle modifiche
          var counter = 0;
          for (var i = 0; i < this.dishes.length; i++) {

            // controllo elemento per elemento
            for (var key in this.dishes[i]) {
              if (this.dishes[i].hasOwnProperty(key)) {

                // console.log('dishes: ', key + ' -> ' + this.dishes[i][key]);
                // console.log(' rispetto a  ');
                // console.log('storage_dishes: ', key + ' -> ' + storage_dishes[i][key]);
                // console.log((this.dishes[i][key] == storage_dishes[i][key]));

                //se è cambiato un valore rispetto a quello nel local storage(la quantità scelta dall'utente può cambiare)
                if (!(this.dishes[i][key] == storage_dishes[i][key]) && (key != 'quantity')) {
                  counter++;
                }

              }
            }


          }
          //counter è la quantità di differenze
          if (counter == 0) {
            this.local_storage_good = true;
          }else {
            this.local_storage_good = false;
          }
          // console.log('se counter è 0 non ha trovato differenze. counter: ',counter);

        }
      }

      //controllo se è cambiato il ristorante, se è cambiato ressetto local storage
      if ((localStorage.check_restaurant == this.check_restaurant) && (this.local_storage_good)) {
        this.takeDataFromLocalStorage();
      }else{
        localStorage.clear();
      }

      this.checkFlagRestaurant();

    },
    groupDishCategories(){
      //raggruppo senza bevande per pusharle in fondo
      for (var i = 0; i < this.json_dishes.length; i++) {
        if ( (!this.dish_categories_assembled.includes(this.json_dishes[i].dish_category_name)
        &&  (this.json_dishes[i].dish_category_name != 'bevande') ) && this.json_dishes[i].visibility) {
          this.dish_categories_assembled.push(this.json_dishes[i].dish_category_name);

        }
      }
      //pusho le bibite in fondo all'array
      for (var i = 0; i < this.json_dishes.length; i++) {
        if (!this.dish_categories_assembled.includes(this.json_dishes[i].dish_category_name) && this.json_dishes[i].visibility) {
          this.dish_categories_assembled.push(this.json_dishes[i].dish_category_name);
          // string.charAt(0).toUpperCase() + string.slice(1)
        }
      }
      console.log('CATEGORIES ASSEMBLED: ', this.dish_categories_assembled);

    },
    checkFlagRestaurant(){
      localStorage.check_restaurant = this.check_restaurant;
    },
    takeDataFromLocalStorage(){

      //se esiste shopping_cart in local storage
      if ((localStorage.shopping_cart)) {
        this.json_dishes = JSON.parse(localStorage.shopping_cart);
      }

      //se esiste show_cart in local storage
      if (localStorage.show_cart) {
        this.show_cart = JSON.parse(localStorage.show_cart);
      }

      //se esiste show_cart in local storage
      // if (localStorage.show_modal && !(this.show_cart)) {
      //   this.show_modal = JSON.parse(localStorage.show_modal);
      // }

    },
    //toggle per la visibility del carrello
    showCart(){
      this.show_cart = !this.show_cart;
      localStorage.show_cart = JSON.stringify(this.show_cart);
      this.show_modal = false;
      // localStorage.show_modal = JSON.stringify(this.show_modal);
    },
    //toggle per la visibility del modale piatto
    showModal(index){
      this.modal_index = index;
      // alert(this.modal_index);
      this.show_modal = !this.show_modal;
      if (this.show_modal == false) {
        this.dish_index = 0;
      }
      // localStorage.show_modal = JSON.stringify(this.show_modal);
      this.show_cart = false;
      localStorage.show_cart = JSON.stringify(this.show_cart);
    },
    //funzione per aggiungere o togliere quantity di un prodotto da aquistare
    updateCart(dish, updateType){

      //rimuovo i prodotti da lcalstorage per inserirli aggiornati più avanti
      localStorage.removeItem('shopping_cart');

      // alert(this.json_dishes[this.modal_index].quantity);

      //scorro il JSON prodotti
      for (var i = 0; i < this.json_dishes.length; i++) {

        //quando trovo l'id del prodotto cliccato sul DOM
        if (this.json_dishes[i].id === dish.id) {
          // console.log();

          //se premi sottrazione
          if (updateType === 'subtract') {
            //la quantità non puo essere minore di 0
            if (this.json_dishes[i].quantity !== 0) {
              //sottrai uno alla proproetà 'quantità' del prodotto clickato
              this.json_dishes[i].quantity--;

            }
          //se premi aggiungi
          }else{
            //aggiungi uno alla proproetà 'quantità' del prodotto clickato
            this.json_dishes[i].quantity++;

          }

        }

      }
      //controllo se il ristoratore ha aggiunto o tolto piatti

      localStorage.shopping_cart = JSON.stringify(this.json_dishes);

      //salvataggio dei dishes
      // console.log(this.cart);

    },
    removeProductFromCart(id){
      //itero i dishes
      for (var i = 0; i < this.json_dishes.length; i++) {
        //matching id
        if (this.json_dishes[i].id == id) {

          this.json_dishes[i].quantity = 0;
          //salvataggio dei dishes e del totale quantita
          localStorage.shopping_cart = JSON.stringify(this.json_dishes);
        }
      }
    },
  },
  computed: {
    cart() {
      let cart_tmp = this.json_dishes.filter(dish => dish.quantity > 0);
      return cart_tmp;
    },
    totalQuantity() {
      let total_tmp = this.json_dishes.reduce((total, dish) => total + dish.quantity, 0);
      return total_tmp;
    },
    totalPrice(){
      var total = 0;
      for (var i = 0; i < this.json_dishes.length; i++) {
        total = total + (this.json_dishes[i].price * this.json_dishes[i].quantity);
      }
      return total;
    }
  },
}
</script>

<style media="screen">
.minimizable {
transition: all 0.5s ease;
}

.minimized {
transform: rotateX(-1080deg);
}
</style>
