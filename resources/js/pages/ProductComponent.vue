<template>
<div>
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
                </div>
          
                <div v-if="cart.length > 0" class="cart-container-content row">
                    <ul class="products-container col-sm-7 col-12">
                        <li v-for="(product, index) in cart" :key="index">
                           
                            <div class="right-side row">
                                <div class="info col-lg-8 col-12">
                                    <h5>{{product.name}}</h5>
                                    <p class="description">
                                        <span>{{product.description}}</span>
                                    </p>
                                    <span class="price">&euro; {{product.price}}</span>
                                </div>
                                <div class="quantity-inputs col-lg-4 col-12">
                                    <a class="btn btn-primary" @click='addItem(product)'>+</a> 
                                    <div class="quantity">{{product.quantity}}</div>
                                    <a class="btn btn-primary" @click='decreaseQuantity(product, index)'>-</a> 
                                    <a class="btn btn-primary" @click='deleteItem(index)'>Delete</a>
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
    <section id="cart-section">
            <div class="CartContainer">
        <div class="Header">
            <h3 class="Heading">Shopping Cart</h3>
            <h5 class="Action">Remove all</h5>
        </div>

        <div class="Cart-Items">
            <div class="about">
                <h4 class="title">Apple Juice</h4>
            </div>
            <div class="counter">
                <div class="btn">+</div>
                <div class="count">2</div>
                <div class="btn">-</div>
            </div>
            <div class="prices">
                <div class="amount">$2.99</div>
                <div class="remove"><u>Remove</u></div>
            </div>
        </div>

        <hr> 
        <div class="checkout">
        <div class="total">
            <div>
                <div class="Subtotal">Sub-Total</div>
                <div class="items">2 items</div>
            </div>
            <div class="total-amount">$6.18</div>
        </div>
        <button class="button">Checkout</button></div>
    </div>
    </section>
</div>
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
        // this.totalAmount();

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
           
            if (!product){
                return;
            }

            
            if(localStorage.getItem('cart') == null || JSON.parse(localStorage.getItem('cart')).length === 0){
                product.quantity = 1;

                // pusha nell'array il prodotto
                this.cart.push(product);
            
                // salva il carrello
                this.saveCart();

                
            }else{
                // salvo la stringa di LocalStorage in this.cart
                this.cart = JSON.parse(localStorage.getItem('cart'));
              
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
                       
                    }
                    
                }  else{
                    //se non cambia ristorante:
                    // salva l'id del prodotto selezionato
                 
                    let check = this.cart.find(({id}) => id == product.id);
                    console.log(this.cart.find(({id}) => id == product.id))
                    //    console.log('adesso')
                    // se non esiste già
                    if(!check){
                        //setta la quantità ad 1
                        product.quantity = 1;
                        //altrimenti
                    }
                    else{
                        // incrementa di 1 la quantità
                        for(let i = 0; i < this.cart.length + 1; i++){
                            if(this.cart[i].id == product.id){
                                this.cart[i].quantity = this.cart[i].quantity + 1
                                this.saveCart();
                            }
                        }
                    }
                    // pusha nell'array il prodotto
                    this.cart.push(product);
                    // salva il carrello
                    this.saveCart();
                   
                }      
            }
                
          
        },
        // funzione per la rimozione del prodotto dal carrello
       
        // funzione salva carrello
        saveCart() {
            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
        },
        
        //  removeItem(product , index){
        //     if(product.quantity > 1)
        //     for(let i = 0; i < this.cart.length + 1; i++){
        //         if(this.cart[i].id == product.id){
        //         this.cart[i].quantity = this.cart[i].quantity -  1;
        //         this.saveCart();
        //         }else  {
                    
        //         }
        //     }
        //     else
        //         this.deleteItem(index);

        // //         this.totalAmount();
        // },

        


        ////////////////////////////////////////
        // funzione che incrementa la quantità del prodotto all'interno del carrello
        // increaseQuantity(product, index) {

        //     let check = this.cart.find(({id}) => id == product.id);
        //     if(check.id){
        //          for(let i = 0; i < this.cart.length + 1; i++){
        //             if(this.cart[i].id == product.id){
        //             this.cart[i].quantity = this.cart[i].quantity + 1
        //             this.saveCart();
        //             }
        //         }
        //     }
           
        // },
        // funzione che riduce la quantità del prodotto nel carrello
        decreaseQuantity(product , index){
            let check = this.cart.find(({id}) => id == product.id);
            if(check.id){
                for(let i = 0; i < this.cart.length + 1; i++){
                    if(this.cart[i].id == product.id && this.cart[i].quantity > 1){
                    this.cart[i].quantity = this.cart[i].quantity -  1;
                    this.saveCart();
                    }
                }
            }
        },

        // funzione che cancella il prodotto dal carrello
        deleteItem(product,index) {

            if(this.cart.length > 1){
                this.cart.splice(index, 1);
                // this.testFunction(index)
                // localStorage.removeItem();
                console.log('ciao sono', Storage.key(index))
            }else{
                this.cart.splice(index, 1);
                // this.testFunction(index)
                // this.saveProductInCart();
                localStorage.clear(); 
            } 
        },

        // testFunction(index){
            
        //     const testCart = JSON.parse(localStorage.getItem("cart"))
        //     for (let i =0; i< testCart.length; i++) {
        //         let items = JSON.parse(testCart[i]);
        //         if (items.id == index) {
        //         testCart.splice(index, 1);
        //         }
        //     }
        // }

        // salva nel carrello i prodotti
        // saveProductInCart(){
        //     const parsed = JSON.stringify(this.products_in_cart);
        //     localStorage.setItem('cart', parsed);
        //     this.products_in_cart = JSON.parse(localStorage.cart);
        // },

      
         // funzione che determina la quantità di prodotti all'interno del carrello ritornando il prezzo finale
        // totalAmount(){
        //     this.total_amount = 0;
        //     for (let i = 0; i < this.cart.length; i++) {
        //         this.total_amount += parseFloat(this.cart[i].price)*this.product.quantity
        //         console.log(this.cart[i])
        //     }
      
                                            
        //  },
       

    },
    
}


</script>


<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

// cart style
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



#cart-section{
	margin: 0;
	padding: 0;
	background: linear-gradient(to bottom right, #E3F0FF, #FAFCFF);
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

.CartContainer{
	width: 70%;
	height: 90%;
	background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0px 10px 20px #1687d933;
}

.Header{
	margin: auto;
	width: 90%;
	height: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.Heading{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #2F3841;
}

.Action{
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
	border-bottom: 1px solid #E44C4C;
}

.Cart-Items{
	margin: auto;
	width: 90%;
	height: 30%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.image-box{
	width: 15%;
	text-align: center;
}
.about{
	height: 100%;
	width: 24%;
}
.title{
	padding-top: 10px;
	line-height: 10px;
	font-size: 32px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.subtitle{
	line-height: 10px;
	font-size: 18px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #909090;
}

.counter{
	width: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.btn{
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background-color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
	cursor: pointer;
}
.count{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}

.prices{
	height: 100%;
	text-align: right;
}
.amount{
	padding-top: 20px;
	font-size: 26px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.save{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #1687d9;
	cursor: pointer;
}
.remove{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
}

.pad{
	margin-top: 5px;
}

hr{
	width: 66%;
	float: right;
	margin-right: 5%;
}
.checkout{
	float: right;
	margin-right: 5%;
	width: 28%;
}
.total{
	width: 100%;
	display: flex;
	justify-content: space-between;
}
.Subtotal{
	font-size: 22px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #202020;
}
.items{
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 500;
	color: #909090;
	line-height: 10px;
}
.total-amount{
	font-size: 36px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
}
.button{
	margin-top: 10px;
	width: 100%;
	height: 40px;
	border: none;
	background: linear-gradient(to bottom right, #B8D7FF, #8EB7EB);
	border-radius: 20px;
	cursor: pointer;
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}
   
</style>

