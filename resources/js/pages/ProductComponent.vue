<template>
    <section>
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
        <!-- /////////////////////////////////////////////////// -->
        <div class="cart-comp">
            <div class="cart-container">
                <div class="top-links">
                        <h4 class="static active">Carrello <i class="fa-solid fa-cart-arrow-down"></i></h4>
                        <!-- <h4 v-if="total_amount > 0">
                        <router-link :to="{name: 'checkout'}" class="link">Checkout <i class="fa-regular fa-credit-card"></i></router-link>
                        </h4> -->
                </div>
                <!-- <div class="mid-bar"><go-back-btn/></div> -->
                <div v-if="total_amount > 0" class="cart-container-content row">
                    <ul class="products-container col-sm-7 col-12">
                        <li v-for="(product, index) in cart" :key="index">
                            <!-- <img v-if="item.image" :src="`/images/foods/${item.image}`":alt="item.name">
                            <img v-else src="/images/foods/dishFoodPlaceholder.jpg" :alt="`item.name`"> -->
                            <div class="right-side row">
                                <div class="info col-lg-8 col-12">
                                    <h5>{{product.name}}</h5>
                                    <p class="description">
                                        <span>{{product.description}}</span>
                                    </p>
                                    <span class="price">&euro; {{product.price}}</span>
                                </div>
                                <div class="quantity-inputs col-lg-4 col-12">
                                    <a class="btn btn-primary" @click='increaseQuantity(product)'>+</a> 
                                    <div class="quantity">{{product.quantity}}</div>
                                    <a class="btn btn-primary" @click='decreaseQuantity(product, index)'>-</a> 
                                    <a class="btn btn-primary" @click='deleteItem(index)'></a>
                                </div>

                            </div>
                        </li>
                       
                    </ul>
                    <h2>Totale: <span class="price">€ {{total_amount}}</span></h2>
                </div>
                <h1 v-else><i class="fa-solid fa-triangle-exclamation"></i> Il carrello è vuoto.</h1>
            </div>
           

        </div>   

        <!-- <div class="cart-container">
            <h2>Il tuo carrello</h2>
            
        </div> -->
    </section>
        
        

    
   
</template>

<script>
export default {
    name: 'ProductComponent',
    
     data(){
        return{
            // array dei prodotti
            products: [],
            // array vuoto per il carrello
            cart:[],
            // numero prodotti presenti nel carrello
            products_in_cart: 0,
            // totale da pagare
            total_amount: 0,
        }
    },
    created() {

          // $this.route.paramas.id rappresenta il passaggio di informazioni eseguiro con il router link
         axios.get(`http://127.0.0.1:8000/api/${this.$route.params.id}/menu`)
        .then((response) =>{
            this.products = response.data.results
        });

        // se il carrello non è null
        if (localStorage.cart) {
            // i prodotti presenti nel carrello vengono convertiti in un file json
            this.products_in_cart = JSON.parse(localStorage.cart);
        }
        // richiamo la funzione del totale
        this.totalAmount();

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
    mounted(){
      
                                            
    },
    methods:{

        // funzione che aggiunge il prodotto al carrello
        addItem(product){
            // this.cart.push(product)
              if (!product){
                return;
            }
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
                        if(!check){
                            //setta la quantità ad 1
                            product.quantity = 1;
                            //altrimenti
                        }else{
                                // incrementa di 1 la quantità
                            for(let i = 0; i < this.cart.length + 1; i++){
                                if(this.cart[i].id == product.id){
                                    this.cart[i].quantity = this.cart[i].quantity + 1
                                    this.saveCart();
                                    return 
                                }
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
       
        // funzione salva carrello
        saveCart() {
            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
        },
        
         removeItem(product , index){
            if(product.quantity > 1)
            for(let i = 0; i < this.products_in_cart.length; i++){
                if(this.products_in_cart[i].id == product.id){
                    this.products_in_cart[i].quantity = this.products_in_cart[i].quantity - 1;
                    this.saveCart();
                    this.totalAmount();
                }
            }
            else
                this.deleteItem(index);
                this.totalAmount();
        },


        ////////////////////////////////////////
        // funzione che incrementa la quantità del prodotto all'interno del carrello
        increaseQuantity(product) {
            for(let i = 0; i < this.products_in_cart.length; i++){
                // console.log(this.products_in_cart[i]);
                if(this.products_in_cart[i].id == product.id){
                    this.products_in_cart[i].quantity = this.products_in_cart[i].quantity + 1;
                    this.saveProductInCart()
                    this.totalAmount();
                }
            }
        },
        // funzione che riduce la quantità del prodotto nel carrello
        decreaseQuantity(product , index){
            if(product.quantity > 1)
            for(let i = 0; i < this.products_in_cart.length; i++){
                if(this.products_in_cart[i].id == product.id){
                    this.products_in_cart[i].quantity = this.products_in_cart[i].quantity - 1;
                    this.cart = [];
                    this.saveProductInCart();
                    this.totalAmount();
                }
            }
            else
            // richiamo la funzione che cancella il prodotto
                this.deleteItem(index);
            this.totalAmount();
        },

        // funzione che cancella il prodotto dal carrello
        deleteItem(index) {
            this.products_in_cart.splice(index, 1);
            // console.log(index);
            this.saveProductInCart();
            this.totalAmount();
        },

        // salva nel carrello i prodotti
         saveProductInCart(){
            const parsed = JSON.stringify(this.products_in_cart);
            localStorage.setItem('cart', parsed);
            this.products_in_cart = JSON.parse(localStorage.cart);
        },
        // funzione che determina la quantità di prodotti all'interno del carrello ritornando il prezzo finale
         totalAmount(){
            this.total_amount = 0;
            for (let index = 0; index < this.products_in_cart.length; index++) {
                this.total_amount += parseFloat(this.products_in_cart[index].price)*this.products_in_cart[index].quantity;
            }
        },

    }
}


</script>
<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

//cart style
// .cart-comp{
//     .cart-container{
//         width: 100%;
//         margin: 50px 0;
//         min-height: calc(100vh - 590px);
//         background-color: white;
//         color: black;
//         box-shadow: 0px 0px 15px rgb(189, 189, 189);
//         border-radius: 20px;
//         overflow: hidden;
//         .top-links{
//             display: flex;
//             width: 100%;
//             height: 50px;
//             color: #dd3546;
//             h4{
//                 width: 50%;
//                 text-align: center;
//                 margin: 0 auto;
//                 &.active,
//                 .active{
//                     border-bottom: 3px solid #dd3546;
//                     font-weight: bolder;
//                 }
//                 &.static,
//                 .link{
//                     padding-top: 10px;
//                 }
//                 .link{
//                     cursor: pointer;
//                     display: block;
//                     width: 100%;
//                     height: 100%;
//                     color: #dd3546;
//                     text-decoration: none;
//                     transition: .2s all;
//                     &:hover{
//                         background-color: rgb(240, 240, 240);
//                     }
//                 }
//             }
//         }
//         .mid-bar{
//             width: 100%;
//             padding: 15px 15px 0;
//         }
//         .cart-container-content{
//             .products-container{
//                 margin: 0;
//                 list-style: none;
//                 li{
//                     display: flex;
//                     align-items: center;
//                     margin: 30px 15px 0 15px;
//                     padding-bottom: 15px;
//                     border-bottom: 2px solid lightgray;
//                     img{
//                         width: 100px;
//                         border-radius: 10px;
//                         margin-right: 15px;
//                     }
//                     .right-side{
//                         display: flex;
//                         flex-grow: 1;
//                         align-items: center;
//                         .info{
//                             margin: 10px 0;
//                             h5{
//                                 font-weight: bolder;
//                             }
//                             .description{
//                                 display: table;
//                                 table-layout: fixed;
//                                 max-width: 250px;
//                                 width: 100%;
//                                 font-size: 14px;
//                                 color: gray;
//                                 white-space: nowrap;
//                             }
//                             .description > *{
//                                 display: table-cell;
//                                 overflow: hidden;
//                                 text-overflow: ellipsis;
//                             }
//                             .price{
//                                 font-weight: bold;
//                                 color: #4E54C8;
//                             }
//                         }
//                         .quantity-inputs{
//                             display: flex;
//                             align-items: center;
//                             .qt-btn,
//                             .del-btn{
//                                 cursor: pointer;
//                             }
//                             .qt-btn{
//                                 font-size: 20px;
//                                 color: gray;
//                                 transition: .2s all;
//                                 &:hover{
//                                     color: rgb(95, 95, 95);
//                                 }
//                                 &:active{
//                                     color: #dd3546;
//                                 }
//                             }
//                             .quantity{
//                                 margin: 0 8px;
//                                 font-weight: bold;
//                                 color: #dd3546;
//                             }
//                             .del-btn{
//                                 margin-left: 30px;
//                                 color: red;
//                                 transition: .2s all;
//                                 &:hover{
//                                     color: darkred;
//                                 }
//                                 &:active{
//                                     color: black;
//                                 }
//                             }
//                         }
//                     }
//                     &:last-of-type{
//                         border-bottom: none;
//                     }
//                 }
//             }
//             .checkout .ckt-container{
//                 text-align: center;
//                 padding-top: 60px;
//                 margin: 0 auto;
//                 width: 50%;
//                 h2{
//                     font-weight: bolder;
//                     .price{
//                         display: inline-block;
//                         font-weight: bold;
//                         color: #4E54C8;
//                     }
//                 }
//                 button{
//                     font-weight: bold;
//                     i{
//                         margin-right: 5px;
//                     }
//                 }
//             }
//         }
//         h1{
//             text-align: center;
//             font-weight: bolder;
//             margin: 70px 0;
//             i{
//                 color: #dd3546;
//             }
//         }
//     }
// }




   
</style>

