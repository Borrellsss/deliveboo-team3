<template>

    <section>
       <JumbotronComponent/>

           <!-- filters categories  -->
        <div class="category-filter-container">
            <h4 class="front-office-style">Scegli la tua categoria</h4>
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
                    <div v-for="category in categories" :key="category.id">
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
        <div class="restaurant-cards">
            <div class="fo-container">
                <div v-if="selectedCategories.length == 0">
                    <div class="text-center mt-4">
                        Nessuna categoria selezionata
                    </div>
                </div>

                <div v-else-if="selectedCategories.length != 0 && matchedCategories.length == 0">
                    <div class="text-center mt-4">
                        Nessun ristorante corrisponde alla tua selezione
                    </div>
                </div>
                  <!-- stampa ristoranti -->
                <div v-else>
                    <div class="restaurant-cards-container">
                        <div class="row gx-5 row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">

                            <div v-for="user in users" :key="user.id" class="col">
                                <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="d-flex">
                                    <div class="ms_card">
                                        <div class="img-container">
                                            <img v-if="user.cover" :src="'storage/' + user.cover" :alt="user.business_name">
                                            <!-- <img v-if="user.cover" src="https://images.adsttc.com/media/images/5e4c/1025/6ee6/7e0b/9d00/0877/slideshow/feature_-_Main_hall_1.jpg?1582043123" :alt="user.business_name"> -->
                                            <img v-else src="https://i.ibb.co/JvkF0TR/tostino-no-image.jpg" :alt="user.business_name">
                                        </div>
                                        <div class="card-body">
                                            <div class="ms_card-heading">
                                            <div v-if="user.business_name.length < 33" class="space_line"></div>
                                            <span>{{user.business_name.slice(0, 33) }}</span><span v-if="user.business_name.length > 33">...</span>
                                            </div>
                                            <div class="ms_card-text">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span class="address">{{user.address.slice(0, 35)}}</span><span v-if="user.address.length > 35">...</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- join us component -->
          <JoinUsComponent/>
    </section>   

</template>

<script>
import JumbotronComponent from '../components/sections/JumbotronComponent.vue';
import JoinUsComponent from '../components/sections/JoinUsComponent.vue';

    export default {
        name:'UserRestaurantComponent',
        components: {
            JumbotronComponent,
            JoinUsComponent
        },
        data(){
            return{
                users : [],
                categories: [],
                selectedCategories: [],
                matchedCategories:[],
                isWaiting: false
            }
        },
        methods: {

            getSelectedCategories() {
                this.isWaiting = true;
                axios.get(`http://127.0.0.1:8000/api/restaurants?categories=${this.selectedCategories}`)
                .then((response) => {
                this.users = response.data.results;
                this.matchedCategories = response.data.results;
                this.isWaiting = false;
                });

            }
        },
        mounted(){

            axios.get('http://127.0.0.1:8000/api/restaurants-categories')
            .then((response) => {
                this.categories = response.data.results;
                // console.log(this.categories);
            });
        }
}

</script>

<style lang="scss" scoped>
    @import '../style/variables';
    @import '../style/common';

     .space_line{
        margin-top: 1rem;
        margin-bottom: 0.5rem;
     }

            //////// FILTER CATEGORIES ////////  
         
.category-filter-container{

    h4{
        text-align: center;
        margin: 2rem 0;
    }
    .categories-bar{
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
            background: #ffffff;
            color: #222;
            display: flex;
            justify-content:center;
            align-items: center;
            flex-flow: row wrap;
            margin: 0 auto;
                .checkbox-input {
                position: absolute;
                visibility: hidden;
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
background: rgba(0, 119, 255, 0.06);
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
border: 1px solid #cccfdb;
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

.restaurant-cards-container{
    width: 80%;
    margin: 4rem auto;
}

.col{
    padding: 0 10px;
}

.ms_card{
    width: 100%;
    aspect-ratio: 1/1;
    border-radius: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
    0 6px 20px 0 rgba(0, 0, 0, 0.19);
    overflow: hidden;
    user-select: none;
    
    &:hover{
           box-shadow: 5px 20px 30px rgba(0,0,0,0.3);
            transform: translateY(-1px);
    }

    .img-container {
            width: 100%;
            height: 70%;
        
            img{
                border-radius: 8px 8px 0px 0;
                height: 100%;
                object-fit: cover;
             }
        }
    .ms_card-body{
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 5%;
            width: 100%;
            .ms_card-heading {
                font-size: 1vw;
                font-weight: bold;
                margin-top: 0.4rem;
                }

            .ms_card-text {
                font-size: 0.9vw;
                color: #636262;
        
                .address{
                margin-left: 0.1rem;
                }
            }
      }        
 }
 
///////// MEDIA QUERIES ////////////
                        
@media only screen and (max-width: 1200px) {

}
@media only screen and (max-width: 992px) {
    .ms_card-heading {
        font-size: 5wv !important;
        background-color: #cccfdb;
            }

        .ms_card-text {
            font-size: 0.7em;
        }
}
                
 @media only screen and (max-width: 768px) {
    // .ms_card-heading {
    //     font-size: calc(1vw + 2rem);
    //     }

    // .ms_card-text {
    //     font-size: 1rem;
    // }
}      
</style>