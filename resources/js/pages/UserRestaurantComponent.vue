<template>
    <section>
        <!-- <ProductComponent :users = user /> -->
        <div class="container" style="margin-top:50px;">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    <div v-for="user in users" :key="user.id" class="col d-flex">
                        <!-- <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="d-flex"> -->
                            <div  class="card-sl">
                                <div class="card-image">
                                    <img :src="user.cover" :alt="user.business_name">
                                </div>
                                <a class="card-action" href="#" style="">❤</a>
                                <div class="card-heading">
                                    {{user.business_name}}
                                </div>
                                <div class="card-text">
                                    {{user.address}}
                                </div>
                                <router-link  :to="{name: 'products-page',params: {id: user.id}}" class="card-button"> Esplora</router-link>
                                <!-- <a href="#" class="card-button">Esplora</a> -->
                            </div>
                      <!-- </router-link> -->
                    </div>
                </div>  
            </div> 
    </section>   
</template>

<script>

export default {
    name:'UserRestaurantComponent',
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
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
             0 6px 20px 0 rgba(0, 0, 0, 0.19);
             margin-bottom: 3rem;
             position: relative;
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
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
        margin-top: -1.5rem;
    }

    .card-text {
        padding: 0px 15px 10px;
        font-size: 14px;
        color: #636262;
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

    

</style>