<template>
    <div>
        <section>
            <div class="jumbotron jumbotron-fluid" style="margin-top:90px">
            <div class="container d-flex justify-content-around">
                <div>
                    <h2>Nome Ristorante</h2>
                    <p class="lead"><i class="fa-solid fa-location-dot mr-2"></i>Via dei girasoli, 15</p>
                </div>
                <img src="https://citynews-romatoday.stgy.ovh/~media/horizontal-mid/52295577773865/unnamed-2020-07-27t134402-606-2.jpg" alt="ristorante">
            </div>
            </div>
            <div class="pr_container" style="margin-top:100px">

                <a v-if="cart.length > 0" class="floating-cart">
                    <div class="count-float">
                        <span>{{cart.length}}</span>
                    </div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 products-col px-3">
                        <div class="products-side">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 d-flex justify-content-start">

                                <div v-for="product in products" :key="product.id" class="col p-2">
                                    <div class="card">
                                       <img v-if="product.cover" class="card-img" :src="product.cover" alt="product.name">
                                       <img v-else src="https://i.ibb.co/JvkF0TR/tostino-no-image.jpg" :alt="product.name">
                                       <div class="card-body">
                                            <h5 class="card-title">{{product.name}}</h5>
                                            <p class="card-text">{{product.description}}</p>
                                            <h6 class="product-card-price">{{product.price}}&euro;</h6>
                                            <a @click='addItem(product)' class="add-to-cart">Aggiungi al carrello</a>
                                        </div>
                                     </div>
                                 </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-9 col-md-8 col-lg-4 col-xl-4 cart-col">
                        <div v-if="cart.length > 0" class="cart-container">
                            <!-- v-if="cart.length > 0" -->
                            <h3>Carrello</h3>
                            <div v-for="(product, index) in cart" :key="index" class="row">
                                <div class="col col-6">
                                    <div class="product-name d-flex justify-content-center align-items-center">
                                        {{product.name}}
                                    </div>
                                </div>
                                <div class="col col-3">
                                    <div class="product-quantity-remove d-flex flex-column justify-content-center align-items-center">
                                        <div class="product-quantity d-flex justify-content-center align-items-center">
                                            <a class="quantity-btn" @click='decreaseQuantity(product, index)'><span class="decrease">-</span></a>
                                            <span class="quantity-number">{{product.quantity}}</span>
                                            <a class="quantity-btn" @click='addItem(product)'><span class="increase">+</span></a>
                                        </div>
                                        <a class="remove-btn" @click='deleteItem(index)'>Rimuovi</a>
                                    </div>
                                </div>
                                <div class="col col-3">
                                    <div class="product-price d-flex flex-column justify-content-center align-items-center">
                                        {{ product.price * product.quantity }}&euro;
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col col-12">
                                    <div class="checkout">
                                        <div class="total">
                                            <div>
                                                <div class="Subtotal">Sub-Totale</div>
                                                <div class="items" @click="clearCart(index)">Svuota carrello</div>
                                            </div>
                                            <!-- <div v-for="product, index in products" :key="product.id" class="total-amount">
                                                {{ product.price * product.quantity + index-1}}&euro;
                                            </div> -->
                                            <div class="total-amount">&euro;{{total_amount}}</div>
                                        </div>
                                    <button class="button">Checkout</button></div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="cart-blank">
                            <h4>Il carrello è vuoto</h4>
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="406.000000pt" height="361.000000pt" viewBox="0 0 406.000000 361.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <metadata>
                                Created by potrace 1.16, written by Peter Selinger 2001-2019
                                </metadata>
                                <g transform="translate(0.000000,361.000000) scale(0.100000,-0.100000)"
                                fill="#000000" stroke="none">
                                <path d="M2560 3585 c-167 -26 -554 -141 -713 -213 -144 -66 -388 -215 -515
                                -315 -147 -115 -198 -270 -157 -468 9 -40 14 -73 12 -75 -1 -1 -77 -39 -169
                                -83 -92 -45 -181 -93 -198 -107 -17 -15 -32 -25 -34 -23 -2 2 -38 141 -82 309
                                -60 234 -84 310 -101 328 -22 22 -26 22 -282 22 -258 0 -260 0 -287 -23 -20
                                -17 -27 -33 -27 -57 0 -24 7 -40 27 -57 27 -23 31 -23 239 -23 l212 0 204
                                -782 c345 -1321 336 -1290 361 -1310 21 -17 83 -18 1327 -18 1149 0 1307 2
                                1333 15 17 9 30 18 30 20 0 3 9 47 20 98 24 113 90 428 169 812 33 160 76 366
                                96 458 30 145 34 172 23 195 -23 47 -40 50 -351 51 -215 2 -293 5 -299 14 -4
                                7 -8 26 -8 43 0 56 -41 187 -118 379 l-76 190 -1 115 c0 145 5 165 53 189 l37
                                19 -30 7 c-59 13 -75 25 -118 92 -59 91 -98 127 -186 171 -71 35 -80 37 -185
                                39 -61 1 -154 -5 -206 -12z m337 -169 c52 -28 111 -81 101 -91 -2 -3 -54 -16
                                -114 -29 -308 -69 -633 -246 -1073 -586 -69 -53 -141 -105 -160 -114 -33 -17
                                -33 -17 -61 9 -63 61 -92 179 -65 271 21 73 84 135 250 247 184 123 354 196
                                625 269 173 46 246 58 350 55 83 -2 102 -6 147 -31z m135 -326 c-5 -76 17
                                -155 122 -439 47 -124 86 -244 88 -266 l3 -40 -733 0 -734 0 -50 98 c-28 54
                                -48 100 -45 103 13 13 1147 534 1272 585 38 15 72 25 75 23 3 -3 3 -32 2 -64z
                                m-1972 -855 c0 -8 9 -24 20 -35 20 -20 33 -20 1411 -20 1319 0 1390 -1 1385
                                -17 -3 -10 -37 -169 -75 -353 -39 -184 -100 -474 -136 -644 -36 -170 -65 -310
                                -65 -312 0 -2 -549 -4 -1220 -4 l-1219 0 -10 38 c-63 239 -147 565 -226 872
                                -53 206 -100 390 -105 408 l-8 32 61 0 c45 0 76 7 112 24 59 29 75 31 75 11z"/>
                                <path d="M2816 2913 c-10 -10 -7 -63 5 -86 31 -60 83 -91 115 -69 28 19 43 86
                                28 126 -5 12 -15 15 -44 10 -24 -4 -47 -1 -67 10 -17 8 -33 12 -37 9z"/>
                                <path d="M2240 2688 c0 -6 -10 -32 -22 -56 -20 -43 -21 -46 -4 -77 22 -40 59
                                -59 87 -45 56 31 63 109 13 162 -28 28 -74 38 -74 16z"/>
                                <path d="M2664 2650 c-47 -11 -103 -48 -118 -78 -29 -59 11 -68 101 -24 84 41
                                103 55 103 74 0 10 -9 22 -19 28 -22 11 -23 11 -67 0z"/>
                                <path d="M1537 593 c-57 -20 -128 -80 -161 -136 -63 -109 -48 -256 35 -351 89
                                -101 241 -132 361 -73 102 50 160 138 166 254 7 129 -47 226 -159 287 -67 37
                                -169 45 -242 19z"/>
                                <path d="M3047 593 c-27 -9 -71 -36 -97 -60 -163 -146 -127 -404 68 -500 47
                                -23 70 -28 132 -28 127 1 223 62 275 176 23 53 27 71 23 138 -6 121 -61 206
                                -170 262 -57 30 -165 35 -231 12z"/>
                                </g>
                              </svg>
                        </div>
                    </div>
                </div>
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

                    }else{
                        //se non cambia ristorante:
                        // salva l'id del prodotto selezionato

                        let check = this.cart.find(({id}) => id == product.id);
                        console.log(this.cart.find(({id}) => id == product.id))
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

            // funzione salva carrello
            saveCart() {
                const parsed = JSON.stringify(this.cart);
                localStorage.setItem('cart', parsed);
            },

            // funzione che riduce la quantità del prodotto nel carrello
            decreaseQuantity(product){
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
            deleteItem(index, product) {
                if(this.cart.length > 1){
                    // rimuovo l'elemento carrello in pagina
                    this.cart.splice(index, 1);
                    // filtro dell'array così da togliere l'id del prodotto eliminato
                    let filtered_cart = this.cart.filter(product => product.id !== index);
                    // Sovrascrivo ('cart') localStorage con il nuovo array filtrato
                    localStorage.setItem('cart', JSON.stringify(filtered_cart));
                }else{
                    this.cart.splice(index, 1);
                    localStorage.clear();
                }
            },

            clearCart(index){
                this.cart.splice(index, this.cart.length)
                localStorage.clear('cart');
            },


            


            // funzione che determina la quantità di prodotti all'interno del carrello ritornando il prezzo finale

            // totalAmount(){
            //     this.total_amount = 0;
            //     for (let i = 0; i < this.cart.length; i++) {
            //         this.total_amount += parseFloat(this.cart[i].price)*this.product.quantity
            //         console.log(this.cart[i])
            //     }
            //},


        },

    }
    </script>


    <style lang="scss" scoped>
    @import '../style/variables';
    @import '../style/common';

    .jumbotron{
        height: 250px;
        background: rgb(116,6,2);
        background: radial-gradient(circle, rgba(116,6,2,1) 0%, rgba(116,6,2,1) 23%, rgba(64,4,2,1) 100%);
        // background-color: $secondary-color;
        color: white;


        .container{
            width: 90%;
            height: 100%;

            h2{
                font-size: 2.5rem;
                padding-top: 50px;
                font-family: Geneva, Tahoma, sans-serif;
            }

            P{
                font-family: Geneva, Tahoma, sans-serif;
            }

            img{
                width: 40%;
               height: 100%;
               object-fit: cover;
               padding: 15px 0;
               margin-left: 30px;
            }
        }

    }

    .floating-cart{
        position: fixed;
        top: 0;
        right: 30px;
        margin-top: 120px;
        color: white;
        background-color: $primary-color;
        width: 70px;
        height: 70px;
        display: block;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 20;

            .fa-cart-shopping{
                font-size: 2.3rem;
                z-index: 20;
                }

                &:hover{
                    color: rgb(249, 246, 246);
                }
            }

            .count-float{
                width: 1rem;
                height: 1rem;
                font-size: 0.7rem;
                border-radius: 50%;
                background-color: $primary-color ;
                // border: 3px solid  $primary-color;
                color: white;
                display: flex;
                 align-items: center;
                 justify-content: center;
                position: absolute;
                bottom: 34px;
                right: 25px;
                z-index: 30;

                &:hover ~ .fa-cart-shopping{
                   color: rgb(249, 246, 246);
                }
            }


    .pr_container{
        width: 90%;
        margin: 0 auto;
        position: relative;
    }

    .products-side{

        margin-bottom: 70px;
        .my-circle {
          width: 50px;
          height: 50px;
          text-align: center;
          vertical-align: middle;
      }

          .card{
            border-radius: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);

                    .card-img{
                        object-fit: cover;
                        border-radius: 15px 15px 0 0;
                        height: 200px;

                        // img{
                        // }
                    }

                 .card-title{
                    font-weight: 700;
                 }

                //  .card-text{
                //  }


            .card-body{
                padding: 0.5rem;

                .product-card-price{
                    margin-bottom: 1rem;
                    font-weight: 700;
                }
            }

            .add-to-cart{
                // font-size: 0.9rem;
                color: white;
                padding: 0.3rem 1rem;
                background: linear-gradient(to top right, $secondary-color, #bf201b);
                border-radius: 0.7rem;
                margin-left: 0.2rem;
                cursor: pointer;
                }
            }
        }
    .cart-container{
        border-radius: 15px;
        // margin-bottom: 70px;

        .col{
        border: 1px solid rgb(203, 197, 197);
    }

        h3{
            margin-top: 1rem;
            padding-left: 2rem;
            font-weight: 600;
        }

        .product-name{
            height: 100%;
            font-weight: 700;
        }

      .product-quantity-remove{


        .product-quantity{
            height: 100%;
            padding-top: 0.5rem;

                .quantity-number{
                    padding: 0 5px;
                    font-weight: 700;
                }

                .quantity-btn{
                    width: 20px;
                    height: 20px;
                    background-color: rgb(211, 205, 205);
                    padding: 0.3rem;
                    border-radius: 50%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 3px;
                    cursor: pointer;
                    font-weight: 500;

                        .decrease{
                            padding-bottom: 3px;
                        }

                     }
                    }
                    .remove-btn{
                        font-size: 0.8rem;
                        padding-top: 0.3rem;
                        padding-bottom: 0.5rem;
                        font-weight: 700;
                        color: #909090;
                        cursor: pointer;
                    }
           }
        .product-price{
            height: 100%;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .checkout{
            margin: 3% 5%;
         }
    .total{
        display: flex;
        justify-content: space-between;
    }
    .Subtotal{
        font-size: 1.2rem;
        font-family: 'Open Sans';
        font-weight: 700;
        color: #202020;
        margin-bottom: 0.3rem;
    }
    .items{
        font-size: 1rem;
        font-family: 'Open Sans';
        font-weight: 500;
        color: #909090;
        line-height: 10px;
        cursor: pointer;
        padding: 0.5rem 0 0.7rem 0;

           &:hover{
            color: $secondary-color;;
           }
    }
    .total-amount{
        font-size: 2rem;
        font-family: 'Open Sans';
        font-weight: 900;
        color: #202020;
    }
    .button{
        margin-top: 10px;
        width: 100%;
        height: 40px;
        border: none;
        background: linear-gradient(to bottom right, $secondary-color, #bf201b);
        border-radius: 20px;
        cursor: pointer;
        font-size: 16px;
        font-family: 'Open Sans';
        font-weight: 600;
        color:white;
    }

    }
    .cart-blank{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 80px 0;

        h4{
            font-weight: 600;
            margin-bottom: 15px;
            opacity: 0.7;
        }

       svg{
        width: 50%;
        height: 50%;
        opacity: 0.5;
       }
    }

    @media only screen and (max-width: 768px) {

        .jumbotron{

                img{
                    display: none;
                }
            }
        }

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



    // #cart-section{
    // 	margin: 0;
    // 	padding: 0;
    // 	background: linear-gradient(to bottom right, #E3F0FF, #FAFCFF);
    // 	height: 100vh;
    // 	display: flex;
    // 	justify-content: center;
    // 	align-items: center;
    // }

    // .CartContainer{
    // 	width: 70%;
    // 	height: 90%;
    // 	background-color: #ffffff;
    //     border-radius: 20px;
    //     box-shadow: 0px 10px 20px #1687d933;
    // }

    // .Header{
    // 	margin: auto;
    // 	width: 90%;
    // 	height: 15%;
    // 	display: flex;
    // 	justify-content: space-between;
    // 	align-items: center;
    // }

    // .Heading{
    // 	font-size: 20px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 700;
    // 	color: #2F3841;
    // }

    // .Action{
    // 	font-size: 14px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #E44C4C;
    // 	cursor: pointer;
    // 	border-bottom: 1px solid #E44C4C;
    // }

    // .Cart-Items{
    // 	margin: auto;
    // 	width: 90%;
    // 	height: 30%;
    // 	display: flex;
    // 	justify-content: space-between;
    // 	align-items: center;
    // }
    // .image-box{
    // 	width: 15%;
    // 	text-align: center;
    // }
    // .about{
    // 	height: 100%;
    // 	width: 24%;
    // }
    // .title{
    // 	padding-top: 10px;
    // 	line-height: 10px;
    // 	font-size: 32px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 800;
    // 	color: #202020;
    // }
    // .subtitle{
    // 	line-height: 10px;
    // 	font-size: 18px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #909090;
    // }

    // .counter{
    // 	width: 15%;
    // 	display: flex;
    // 	justify-content: space-between;
    // 	align-items: center;
    // }
    // .btn{
    // 	width: 40px;
    // 	height: 40px;
    // 	border-radius: 50%;
    // 	background-color: #d9d9d9;
    // 	display: flex;
    // 	justify-content: center;
    // 	align-items: center;
    // 	font-size: 20px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 900;
    // 	color: #202020;
    // 	cursor: pointer;
    // }
    // .count{
    // 	font-size: 20px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #202020;
    // }

    // .prices{
    // 	height: 100%;
    // 	text-align: right;
    // }
    // .amount{
    // 	padding-top: 20px;
    // 	font-size: 26px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 800;
    // 	color: #202020;
    // }
    // .save{
    // 	padding-top: 5px;
    // 	font-size: 14px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #1687d9;
    // 	cursor: pointer;
    // }
    // .remove{
    // 	padding-top: 5px;
    // 	font-size: 14px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #E44C4C;
    // 	cursor: pointer;
    // }

    // .pad{
    // 	margin-top: 5px;
    // }

    // hr{
    // 	width: 66%;
    // 	float: right;
    // 	margin-right: 5%;
    // }
    // .checkout{
    // 	float: right;
    // 	margin-right: 5%;
    // 	width: 28%;
    // }
    // .total{
    // 	width: 100%;
    // 	display: flex;
    // 	justify-content: space-between;
    // }
    // .Subtotal{
    // 	font-size: 22px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 700;
    // 	color: #202020;
    // }
    // .items{
    // 	font-size: 16px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 500;
    // 	color: #909090;
    // 	line-height: 10px;
    // }
    // .total-amount{
    // 	font-size: 36px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 900;
    // 	color: #202020;
    // }
    // .button{
    // 	margin-top: 10px;
    // 	width: 100%;
    // 	height: 40px;
    // 	border: none;
    // 	background: linear-gradient(to bottom right, #B8D7FF, #8EB7EB);
    // 	border-radius: 20px;
    // 	cursor: pointer;
    // 	font-size: 16px;
    // 	font-family: 'Open Sans';
    // 	font-weight: 600;
    // 	color: #202020;
    // }

    </style>


