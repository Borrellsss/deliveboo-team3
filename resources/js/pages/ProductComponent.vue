<template>
   
         <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div v-for="product in products" :key="product.id" class="col mb-4">
                    <div class="ms_product-card text-center">
                        <h5 class="card-title">{{product.name}}</h5>
                        <img :src="product.cover" :alt="product.name">
                        <p class="card-text">Prezzo: {{product.price}}</p>  
                        <a class="btn btn-primary" @click='addItem(product)'>Add to cart</a> 
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
            // array vuoto per il carrello
            cart:[],
        }
    },
    
    mounted(){
        // $this.route.paramas.id rappresenta il passaggio di informazioni eseguiro con il router link
         axios.get(`http://127.0.0.1:8000/api/${this.$route.params.id}/menu`)
        .then((response) =>{
            this.products = response.data.results
        });

        // se cart esiste in LocalStorage
        if (localStorage.getItem('cart')) {
            try {
                // trasformalo in stringa
                this.cart = JSON.parse(localStorage.getItem('cart'));
            } catch(e) {
                // altrimenti rimuovi cart da localStorage
            localStorage.removeItem('cart');
            }
        
        }
    },
    methods:{
        // funzione che aggiunge il prodotto al carrello
        addItem(product){
            try{
                // se non esiste il carrello o la sua conversione in stringa è zero
                if(localStorage.getItem('cart') == null || JSON.parse(localStorage.getItem('cart')).length === 0){
                    // setta la quantità del prodotto a 1
                    product.quantity = 1;
                    // pusha nell'array il prodotto
                    this.cart.push(product);
                    // salva il carrello
                    this.saveCart();
                    
                }
                // altrimenti
                else{
                    // salvo la stringa di LocalStorage in this.cart
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                    //nel caso in cui l'utente voglia ordinare da un altro ristorante:
                    // se lo user id dell'elemento con indice 0 (primo elemento del carrello che determina l'unico ristorante da cui poter ordinare) 
                    // è diverso dalla chiave user.id dentro product  (confronto delle FK)
                    if(this.cart[0].user_id !== product.user_id){
                        // se conferma di cambiare ristorante 
                        if(confirm('Stai provando ad aggiungere un prodotto di altro ristorante, così facendo perderai il contenuto del tuo carrello. Vuoi cambiare ristorante? ')){
                            // svuota il carrello
                            this.cart = [];
                             // setta la quantità del prodotto (del nuovo ristorante)
                            product.quantity = 1;
                            // pusha nell'array il prodotto
                            this.cart.push(product);
                            // salva il carrello
                            this.saveCart();
                        };
                    }
                    //altrimenti
                    else{
                        //se non cambia ristorante:
                        // salva l'id del prodotto selezionato
                        let check = this.cart.find(({ id }) => id == product.id);
                        // se non esiste già
                        if(!check)
                        //setta la quantità ad 1
                            product.quantity = 1;
                            //altrimenti
                        else
                        // incrementa di 1 la quantità
                            for(let i = 0; i < this.cart.length + 1; i++){
                                if(this.cart[i].id == product.id){
                                    this.cart[i].quantity = this.cart[i].quantity + 1
                                    this.saveCart();
                                    return
                                }
                            }
                            
                        // pusha nell'array il prodotto
                        this.cart.push(product);
                        // salva il carrello
                        this.saveCart();
                    }
                }
            }
            // se c'è un errore rimuovi il carrello da localStorage
            catch(e){
                localStorage.removeItem('cart');
            }
        },
        // funzione per la rimozione del prodotto dal carrello
        removeItem(x) {
            this.cart.splice(x, 1);
            this.saveCart();
        },
        // funzione salva carrello
        saveCart() {
            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
        }
    }
}


</script>
<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';
   
</style>

