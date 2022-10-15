<template>

    <div>
        <JumbotronComponent/>

        <section class="ms_restaurants-cards-section">
            <!-- filters categories  -->
            <div class="category-filter-container">
                <h3 class="front-office-style">Scegli la tua categoria</h3>
                <div class="categories-bar">
                    <svg class="checkbox-symbol">
                        <symbol id="check" viewbox="0 0 12 10">
                            <polyline
                            points="1.5 6 4.5 9 10.5 1"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            ></polyline>
                        </symbol>
                    </svg>

                    <!-- checkbox container  -->
                    <div class="checkbox-container">
                        <!-- loader component -->
                        <LoaderComponent v-if="categories.length === 0"/>

                        <div v-else v-for="category in categories" :key="category.id">
                            <input class="checkbox-input" :id="'category-' + category.id" type="checkbox" :value="category.id" v-model="selectedCategories" @change="getSelectedCategories()" :disabled="isWaiting ? '' : false"/>
                            <label class="checkbox" :for="'category-' + category.id">
                                <span>
                                <svg width="12px" height="10px">
                                    <use xlink:href="#check"></use>
                                </svg>
                                </span>
                                <span>{{category.name}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                
            <!-- restaurant cards container  -->
            <div>
                <!-- loader component -->
                <LoaderComponent v-if="isWaiting"/>

                <div v-else-if="users === null && categories.length !== 0">
                    <div class="fo-container">
                        <div class="ms_empty-category text-center">
                            Nessuna categoria selezionata
                        </div>
                    </div>
                </div>

                <div v-else-if="isEmpty">
                    <div class="text-center ms_empty-category">
                        Nessun ristorante corrisponde alla tua selezione
                    </div>
                </div>
                    
                <!-- stampa ristoranti -->
                <div v-else class="ms_restaurant-cards-container">
                    <div class="d-flex">
                        <router-link v-for="user in users" :key="user.id" :to="{name: 'products-page',params: {slug: user.slug} }" class="ms_restaurant-card">
                            <div class="img-container">
                                <img v-if="user.cover" :src="'storage/' + user.cover" :alt="user.business_name">
                                <img v-else src="https://i.ibb.co/BPnkDqD/backup-posate-aggiustate.jpg" :alt="user.business_name">
                            </div>
                            <div class="ms_card-body">
                                <div class="ms_card-heading">
                                    <!-- <div v-if="user.business_name.length < 33" class="space_line"></div> -->
                                    {{user.business_name.slice(0, 20)}}<span v-if="user.business_name.length > 20">...</span>
                                </div>
                                <div class="ms_card-text">
                                    <i class="ms_card-address fa-solid fa-location-dot"></i>
                                    {{user.address.slice(0, 20)}}<span v-if="user.address.length > 20">...</span>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hiring Component -->
        <HiringComponent />

        <!-- mobile app component -->
        <MobileBannerComponent />

        <!-- join us component -->
        <JoinUsComponent />
    </div>   

</template>

<script>
import JumbotronComponent from '../components/sections/JumbotronComponent.vue';
import HiringComponent from '../components/sections/HiringComponent.vue';
import MobileBannerComponent from '../components/MobileBannerComponent.vue';
import JoinUsComponent from '../components/sections/JoinUsComponent.vue';
import LoaderComponent from '../components/LoaderComponent.vue';


export default {
    name:'UserRestaurantComponent',
    components: {
        JumbotronComponent,
        HiringComponent,
        MobileBannerComponent,
        JoinUsComponent,
        LoaderComponent,
    },
    data(){
        return{
            users: null,
            categories: [],
            selectedCategories: [],
            matchedCategories:[],
            isWaiting: true,
            isEmpty: null,
            categoriesMessage: '',
        }
    },
    methods: {
        getAllCategories() {
            this.isWaiting = true;

            axios.get('http://127.0.0.1:8000/api/restaurants-categories')
            .then((response) => {
                this.categories = response.data.results;
            });

            this.isWaiting = false;
        },
        getSelectedCategories() {
            this.isWaiting = true;

            axios.get(`http://127.0.0.1:8000/api/restaurants?categories=${this.selectedCategories}`)
            .then((response) => {

                if(response.data.success) {

                    if(response.data.is_empty) {
                        this.isEmpty = true;
                        this.users = response.data.results;
                    } else {
                        this.isEmpty = false;
                        this.users = response.data.results;
                    }
                } else {

                    this.isEmpty = true;
                    this.users = response.data.results;
                }

                this.isWaiting = false;
            });
        }
    },
    mounted(){

        this.getAllCategories()
    }
}

</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

.space_line {
    margin-top: 1rem;
    margin-bottom: 0.5rem;
}

// FILTER CATEGORIES
.ms_restaurants-cards-section {
    padding-block: 4rem;
    background-image: url(https://i.ibb.co/mX7bXgD/foodpattern1.png);
    background-color: rgba(white, $alpha: 0.85);
    background-blend-mode: color-dodge;
}
.category-filter-container {

    h3 {
        text-align: center;
        margin: 0 0 2rem;
        color: $secondary-color;
        font-size: 2.5rem;
    }

    .categories-bar {
        display: block;

        .checkbox-symbol {
            position: absolute;
            width: 0;
            height: 0;
            pointer-events: none;
            user-select: none;
        }
        
        .checkbox-container {
            width: 60%;
            box-sizing: border-box;
            // background: #ffffff;
            color: #222;
            display: flex;
            justify-content:center;
            align-items: center;
            flex-flow: row wrap;
            margin: 0 auto;
            font-weight: 600;

            .checkbox-input {
                position: absolute;
                visibility: hidden;
                outline: 3px solid red;
                
            }
            
            .checkbox {
                user-select: none;
                cursor: pointer;
                padding: 6px 3px;
                border-radius: 6px;
                overflow: hidden;
                transition: all 0.3s ease;
                display: flex;
            }
        }
    }
}     

//  Checkbox animation 
.checkbox:not(:last-child) {
    margin-right: 6px;
}

.checkbox:hover {
    background: rgba($color: $primary-color, $alpha: 0.3);
}

.checkbox span {
    vertical-align: middle;
    transform: translate3d(0, 0, 0);
}

.checkbox span:first-child {
    position: relative;
    flex: 0 0 18px;
    width: 18px;
    height: 18px;
    border-radius: 4px;
    transform: scale(1);
    border: 1px solid #222;
    transition: all 0.3s ease;
}

.checkbox span:first-child svg {
    position: absolute;
    top: 3px;
    left: 2px;
    fill: none;
    stroke: #fff;
    stroke-dasharray: 16px;
    stroke-dashoffset: 16px;
    transition: all 0.3s ease;
    transform: translate3d(0, 0, 0);
}

.checkbox span:last-child {
    padding-left: 8px;
    line-height: 18px;
}

.checkbox:hover span:first-child {
    border-color: $secondary-color;
}

.checkbox-input:checked + .checkbox span:first-child {
    background: $secondary-color;
    border-color: $secondary-color;
    animation: zoom-in-out 0.3s ease;
}

.checkbox-input:checked + .checkbox span:first-child svg {
    stroke-dashoffset: 0;
}

@keyframes zoom-in-out {
    50% {
        transform: scale(0.9);
    }
}

// Restaurant cards 
.ms_empty-category {
    font-weight: 500;
    letter-spacing: 3px;
    margin-top: 3rem;
    font-size: 1.2rem;
    padding: 1.5rem 0;
    background-color: $primary-color;
    background: radial-gradient(circle, rgba(255,197,9,1) 58%, rgba(235,179,2,1) 80%, rgba(208,158,0,1) 100%);
}

.ms_restaurant-cards-container {
    width: 80%;
    max-width: 1300px;
    margin: 4rem auto 0;

    > .d-flex {
        flex-wrap: wrap;
        gap: 2rem;

        .ms_restaurant-card {
            width: calc((100% / 4) - 1.5rem);
            // aspect-ratio: 1 / 1;
            display: block;
            background-color: #fff;
            border-radius: 0.7rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            overflow: hidden;
            transition: all 200ms ease-out;
            // user-select: none;
            
            &:hover {
                box-shadow: 5px 20px 30px rgba(0,0,0,0.3);
                transform: translateY(-1px);
            }

            .img-container {
                width: 100%;
                height: 200px;
                
                img {
                    height: 100%;
                    object-fit: cover;
                }
            }

            .ms_card-body {
                padding: 0.5rem 1rem 1rem;
                // height: 40%;
                color: #212529;
                // text-overflow: ellipsis;

                .ms_card-heading {
                    font-size: 1rem;
                    font-weight: 700;
                    margin-bottom: 0.3rem;
                }

                .ms_card-text {
                    font-size: 0.7rem;

                    .ms_card-address {
                        margin-right: 0.2rem;
                    }
                }
            }        
        }
    }
}

// MEDIA QUERIES
@media only screen and (max-width: 1350px) {
     
     .ms_restaurant-cards-container {
         width: 80%;
 
         > .d-flex {
             gap: 2.1;
 
             .ms_restaurant-card {
                 width: calc((100% / 3) - 1.4rem);
             }
         }
     }
 }
 
// MEDIA QUERIES
@media only screen and (max-width: 1100px) {
     
    .ms_restaurant-cards-container {
        width: 80%;

        > .d-flex {
            gap: 2.1;

            .ms_restaurant-card {
                width: calc((100% / 3) - 1.4rem);
            }
        }
    }
}

@media only screen and (max-width: 920px) {

    .ms_restaurant-cards-container {

        > .d-flex {
            gap: 2;

            .ms_restaurant-card {
                width: calc((100% / 2) - 1rem);

                .img-container {
                    height: 220px;
                }  
            }
        }
    }
}

@media only screen and (max-width: 550px) {

    .ms_restaurant-cards-container {

        > .d-flex {

            .ms_restaurant-card {
                margin-inline: auto;
                width: 70%;
            }
        }
    }
}    

@media only screen and (max-width: 470px) {

    .ms_restaurant-cards-container {

        > .d-flex {

            .ms_restaurant-card {
                width: 100%;

                .img-container {
                    height: 220px;
                }  
            }
        }
    }
}      
</style>