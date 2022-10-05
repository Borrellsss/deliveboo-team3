<template>
 
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div v-for="product in products" :key="product.id" class="col mb-4">
                <div class="ms_product-card text-center">
                    <h5 class="card-title">{{product.name}}</h5>
                    <img :src="product.cover" :alt="product.name">
                    <p class="card-text">Prezzo: {{product.price}}</p>     
                </div>
            </div>
        </div>     
    </div>

</template>

<script>
export default {
    name: 'ProductComponent',
    
     data(){
        return{
            products: [],
        }
    },
    
     mounted(){
          // $this.route.paramas.id rappresenta il passaggio di informazioni eseguiro con il router link
         axios.get(`http://127.0.0.1:8000/api/${this.$route.params.id}/menu`)
        .then((response) =>{
            this.products = response.data.results
        })
    }
}
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';
   
</style>>

