<template>
    <section>
        <!-- <ProductComponent :users = user /> -->
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div v-for="user in users" :key="user.id" class="col mb-4">
                    <router-link  :to="{name: 'products-page',params: {id: user.id}}">
                        <div class="card">
                            <img :src="user.cover" :alt="user.business_name">
                            <div class="card-body">
                                <h5 class="card-title">{{user.business_name}}</h5>
                                <p class="card-text">Indirizzo: {{user.address}}</p>
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