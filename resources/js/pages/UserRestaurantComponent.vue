<template>
    <section>
        <div class="searchbar-container">
            <SearchbarComponent/>
        </div>
        <!-- <ProductComponent :users = user /> -->
        <div class="container" style="margin-top:50px;">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    <div v-for="user in users" :key="user.id" class="col">
                        <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="d-flex">
                            <div  class="card-sl">
                                <div class="card-image">
                                    <img v-if="user.cover"  :src="user.cover" :alt="user.business_name">
                                    <img v-else src="https://i.ibb.co/pbgzq1p/no-restaurante-image.jpg" :alt="user.business_name">
                                </div>
                                <a class="card-action" href="#" style="">❤</a>
                                <div class="card-heading">
                                    {{user.business_name}}
                                </div>
                                <div class="card-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="address">{{user.address}}</span>
                                </div>
                                <!-- <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="card-button"> Esplora</router-link> -->
                                <!-- <a href="#" class="card-button">Esplora</a> -->
                            </div>
                      </router-link>
                    </div>
                </div>  
            </div> 
    </section>   
</template>

<script>
 import SearchbarComponent from '../../js/components/SearchbarComponent.vue';

export default {
    name:'UserRestaurantComponent',
    components: {
        SearchbarComponent,
      },
    data(){
        return{
            users : [],
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/user')
        .then((response) => {
           this.users = response.data.results
            // console.log(this.users)
        });
    }
}

</script>

<style lang="scss" scoped>
    @import '../style/variables';
     @import '../style/common';

     *{
        margin: auto;
     }

      .card-sl {
            width: 250px;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
             0 6px 20px 0 rgba(0, 0, 0, 0.19);
             margin-bottom: 3rem;
             position: relative;
        }

        .card-sl:hover{
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

    .card-action {
        position: relative;
        left: 190px;
        bottom: 180px;
        margin-top: -25px;
        margin-right: 20px;
        z-index: 2;
        color: $secondary-color;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
        opacity: 0;
    }

    .card-action:hover {
        color: #fff;
        background: #E26D5C;
        opacity: 0;
    }

    .card-heading {
        font-size: 1rem;
        font-weight: bold;
        padding: 8px 15px;
        margin-top: -1.5rem;
        // overflow: hidden;
        // text-overflow: ellipsis;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
                line-clamp: 2; 
        -webkit-box-orient: vertical;
    }

    .card-text {
        padding: 0px 15px 10px;
        font-size: 0.8rem;
        color: #636262;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
                line-clamp: 2; 
        -webkit-box-orient: vertical;

        .address{
           margin-left: 0.3rem;
        }
    }

    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: $secondary-color;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: rgb(157, 4, 4);
        color: #fff;
    }

    @media only screen and (max-width: 992px) {
        .card-sl {
            width: 260px;
            height: 350px;
        }

    .card-image {
        width: 260px;
        height: 250px;
        }

            }

                @media only screen and (max-width: 768px) {
                    .card-sl {
                width: 500px;
                height: 700px;
            }

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

            @media only screen and (max-width: 576px) {
                    .card-sl {
                width: 350px;
                height: 430px;
            }

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

</style>