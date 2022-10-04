<template>
    <div>
        <!-- <ProductComponent /> -->
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div v-for="user in users" :key="user.id" class="col mb-4">

                    <div class="card">
                        <img :src="user.cover" :alt="user.business_name">
                        <div class="card-body">
                            <h5 class="card-title">{{user.business_name}}</h5>
                            <p class="card-text">Indirizzo: {{user.address}}</p>
                            <a class="btn btn-primary" href="" role="button">Mostra menu</a>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</template>

<script>
//  import ProductComponent from '../components/ProductComponent.vue'

export default {
    name:'UserRestaurantComponent',
    components: {
        // ProductComponent
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
           console.log(this.users)
        });
    }
}

</script>