<template>

    <section>
        <div class="category-filter-container">
            <h4 class="jack">Scegli la tua categoria</h4>
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

                <div class="checkbox-container">
                    <div v-for="category in categories" :key="category.id">
                        <input class="checkbox-input" :id="'category-' + category.id" type="checkbox" :value="category.id" v-model="selectedCategories" @change="getSelectedCategories()"/>
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
        <!-- <ProductComponent :users = user /> -->
        <div class="ms_container" style="margin-top:50px;">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                    <div v-for="user in users" :key="user.id" class="col d-flex justify-content-center">
                        <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="d-flex">
                            <div  class="card-sl">
                                <div class="card-image">
                                    <img v-if="user.cover" :src="user.cover" :alt="user.business_name">
                                    <img v-else src="https://i.ibb.co/JvkF0TR/tostino-no-image.jpg" :alt="user.business_name">
                                </div>
                                <div class="card-heading">
                                    <span>{{user.business_name.slice(0, 35) }}</span><span v-if="user.business_name.length > 35">...</span>
                                    <div v-if="user.business_name.length < 30" class="space_line"></div>
                                </div>
                                <div class="card-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="address">{{user.address.slice(0, 45)}}</span><span v-if="user.address.length > 45">...</span>
                                </div>
                            </div>
                      </router-link>
                    </div>

                </div>  
            </div> 
    </section>   

</template>

<script>

    export default {
        name:'UserRestaurantComponent',
        components: {
            
        },
        data(){
            return{
                users : [],
                categories: [],
                selectedCategories: []
            }
        },
        methods: {
            getSelectedCategories() {
                
                axios.get(`http://127.0.0.1:8000/api/restaurants?categories=${this.selectedCategories}`)
                .then((response) => {
                this.users = response.data.results;
                    console.log(response.data)
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

    //  .space_line{
    //     margin-top: 1rem;
    //  }

            //////// FILTER CATEGORIES ////////  
         
    .category-filter-container{
        
        h4{
            text-align: center;
            margin: 2rem 0;
        }
        .categories-bar{
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
                    height: 64px;
                    display: flex;
                    justify-content:space-around;
                    align-items: center;
                    flex-flow: row wrap;
                    margin-bottom: 6rem;
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
    border-color: #0077ff;
    }

    .checkbox-input:checked + .checkbox span:first-child {
    background: #0077ff;
    border-color: #0077ff;
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

  //////// RESTAURANT CARDS ////////  

     .ms_container{
        width: 90%;
        margin: 0 auto;
     }

      .card-sl {
            width: 250px;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
             0 6px 20px 0 rgba(0, 0, 0, 0.19);
             margin-bottom: 3rem;
             position: relative;

             &:hover{
                     transform: translateY(5px)
                    }
             .card-image {
                    height: 200px;
                    width: 250px;
                    max-width: 100%;
                 
                            img{
                                border-radius: 8px 8px 0px 0;
                                height: 100%;
                                object-fit: cover;
                                }
                            }
            .card-heading {
                font-size: 1rem;
                font-weight: bold;
                padding: 0px 15px;
                margin-top: 0.5rem;
                text-overflow: ellipsis;
                overflow: hidden;
        
                        .space_line{
                        margin-top: 1rem;
                        }
                }
                        
                .card-text {
                    padding: 0px 15px;
                    font-size: 0.8rem;
                    color: #636262;
                    overflow: hidden;
                    text-overflow: ellipsis;
            
                        .address{
                        margin-left: 0.3rem;
                        }
                    }
         }

 


     //////// MEDIA QUERIES ////////
     
     @media only screen and (max-width: 992px) {

           *{
            margin: 0 auto;

            .card-sl {
                width: 260px;
                height: 350px;
                
                    .card-image {
                    width: 260px;
                    height: 250px;
                    }
                }
           }
        }


  @media only screen and (max-width: 768px) {
        .checkbox-container {
                margin-bottom: 7rem;
          }

          .card-sl {
                width: 500px;
                height: 700px;
                .card-image {
                    width: 500px;
                    height: 500px;
                    }
                .card-heading {
                    font-size: 1.6rem;
                }
                
                .card-text {
                    font-size: 1.6rem;
                }
             }
      }

       @media only screen and (max-width: 576px) {
                .card-sl {
                    width: 350px;
                    height: 430px;
                    .card-image {
                        width: 350px;
                        height: 300px;
                        }
                        .card-heading {
                            font-size: 1.2rem;
                        }
                        
                        .card-text {
                            font-size: 1.2rem;
                        }
                }
           }


        @media only screen and (max-width: 530px) {
                .checkbox-container {
                    margin-bottom: 11rem;
                    }
        }
    
</style>