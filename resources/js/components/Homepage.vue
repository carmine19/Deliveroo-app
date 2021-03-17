<template>
    <div>
        <section class="jumbo">
            <div class="container container-md container-lg">
                    <div class="row">
                    <div class="hamburger">
                        <i class="fas fa-bars"></i>
                      </div>
                      <div class="close">
                        <i class="fas fa-times"></i>
                      </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="info-section">
                                <div class="title">
                                    <h1>Deliveboo</h1>
                                    <h4>Consegnamo i migliori piatti direttamente a casa tua!</h4>
                                    <!--<h4>Consegnamo i migliori piatti direttamente a casa tua!</h4>-->
                                </div>
                                <div class="block mt-3">
                                    <div class="box-cta">
                                        <p class="mb-2" v-if="flag_register">Vuoi unirti a noi come ristoratore?</p>
                                        <p class="mb-2" v-else>Raggiungi la tua Dashboard!</p>
                                        <a href="http://localhost:8000/register" class="btn btn-primary mr-3">
                                            <slot v-if="flag_register">Registrati</slot>
                                            <slot v-else>Dashboard</slot>
                                        </a>
                                        <a :href="href" @click.prevent="scroll(); getAllCategories()" class="btn btn-outline-primary">
                                            <slot>Esplora</slot>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
                            <div class="background">
                                <img :src="'../images/general/jumbo.svg'" alt="jumbo-image">
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--<div class="carousel-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="">Top Categorie</h3>
                        <carousel :perPage="4" :touchDrag="true" :paginationEnabled="false">
                            <slide v-for="(category, index) in categories" :key="index">
                                <a href="" @click.prevent="getCategory(category.name); scroll()">
                                    <img :src="'http://localhost:8000/' + category.cover" alt="">
                                    <p class="category-name">{{category.name}}</p>
                                </a>
                            </slide>
                        </carousel>
                    </div>
                </div>
            </div>
        </div>-->
        <section id="category" class="d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-container">
                                <h3 class="">Categorie Ristorante</h3>
                                <carousel :touchDrag="true" paginationActiveColor="#FF7F50" paginationColor="#778899" :perPageCustom="[[320, 4], [992, 11]]">
                                    <slide v-for="(category, index) in categories" :key="index">
                                        <a href="" @click.prevent="getCategory(category.name); scroll()">
                                            <div class="slide-round">
                                                <img :src="'http://localhost:8000/' + category.cover" alt="">
                                            </div>
                                            <p class="category-name">{{category.name}}</p>
                                        </a>
                                    </slide>
                                </carousel>
                            </div>
                        </div>
                        <div class="col-sm-12 py-6">
                            <h3 class="my-3">Hai selezionato: <span class="cat-selected">{{catSelected}}</span></h3>
                            <div class="cards-container d-flex flex-wrap align-items-baseline">
                                <a :href="'http://localhost:8000/restaurant/' + restaurant.slug" v-for="(restaurant, index) in restaurantList" :key="index" class="card-box rounded mr-3 mb-3">
                                    <div class="card rounded-lg bg-light">
                                        <div class="card-body">
                                            <img class="img-fluid" :src="'../storage/' + restaurant.cover" alt="img">
                                        </div>
                                        <div class="restaurant-info">
                                            <h5 class="restaurant-title my-2">{{restaurant.name}}</h5>
                                            <p class="restaurant-text">Adress: <span>{{restaurant.address}}</span></p>
                                            <p class="restaurant-text">Phone: <span>{{restaurant.phone}}</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</template>

<script>

    import { Carousel, Slide } from 'vue-carousel';

    export default {
        components: {
        Carousel,
        Slide
        },
        props:['categories','flag_register'],
        data () {
            return {
                restaurantList: [],
                href: '#category',
                catSelected: 'tutte'
            }
        },
        methods: {
            async getAllCategories(){
                // this.restaurantList = [];
                await axios
                .get('http://localhost:8000/api/restaurants_by_category', {
                    params: {
                        category: 'tutte'
                    }
                })
                .then((response) => {
                    this.restaurantList = response.data.restaurants;
                    });
                    this.catSelected = 'tutte';
            },
            async apiRequest(){
                await axios
                .get('http://localhost:8000/api/restaurants_by_category', {
                    params: {
                        category: this.category
                    }
                })
                .then((response) => {
                    this.restaurantList = response.data.restaurants;
                    });
            },
            scroll(){
                document.querySelector(this.href).scrollIntoView({behavior: 'smooth'});
            },
            getCategory(category){
                this.restaurantList = [];
                this.category = category;
                this.catSelected = category;
                this.apiRequest();
            }
        },
        beforeMount(){
            this.getAllCategories();
        },
        mounted () {

        }
    }
</script>
