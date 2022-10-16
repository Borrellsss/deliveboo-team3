<template>
    <section>
    
        <!-- Jumbotron  -->
        <div class="jumbotron jumbotron-fluid">
            <div class="jumbotron-overlay"></div>
            <div class="container d-flex justify-content-around">
                <div class="restaurant-heading">

                    <!-- Restaurant Name -->
                    <h2>
                        {{user.business_name}}
                    </h2>

                    <!-- Restaurant Address -->
                    <p class="lead">

                        <!-- Location Icon -->
                        <i class="fa-solid fa-location-dot mr-2"></i>
                        {{user.address}}
                    </p>
                </div>
            </div>
        </div>
        <div class="ms_pattern-background">
            <!-- Product Container -->
            <div class="products-cart-wrapper">

                <!-- Floating Cart -->
                <a v-if="cart.length" class="floating-cart" @click="cartScroll()">

                    <!-- Counter Cart -->
                    <div class="count-float">
                        <span class="red">{{totalQuantity(cart)}}</span>
                    </div>

                    <!-- Cart Icon -->
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>

                <!-- Main Container -->
                <div class="row master-row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 products-col">
                        
                        <!-- Products Container  -->
                        <div class="products-side">
                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 d-flex justify-content-between">

                                <!-- Product Cards -->
                                <div v-for="product,index in products" :key="index" class="col p-3">
                                    <div class="ms-product-card">

                                        <!-- Product Cover -->
                                        <img v-if="product.cover" class="card-img" :src="product.cover" alt="product.name">
                                        <img v-else class="card-img" src="https://i.ibb.co/FwnKbJL/pic1.jpg" :alt="product.name">

                                        <!-- Product Info Pop-up -->
                                        <a class="info-popup-inline" href="#popup1" @click.prevent="selectProduct(product), showProductInfo()">
                                            <!-- Info Icon -->
                                            <i class="fa-solid fa-circle-info"></i>
                                            <div class="overlay-info"></div>
                                        </a>

                                        <!-- Card Footer -->
                                        <div class="ms-card-body d-flex">
                                            <div class="title-price">

                                                <!-- Product name -->
                                                <h5 class="ms-card-title">
                                                    {{product.name}}
                                                </h5>
                                                
                                                <!-- Product Price -->
                                                <div class="product-card-price">
                                                    {{product.price}}&euro;
                                                </div>
                                            </div>

                                            <!-- CTA Add to Cart -->
                                            <div @click='addItem(product)' class="cart-card-symbol">
                                                <a class="add-to-cart">

                                                    <!-- Cart Icon -->
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!-- Product Info Pop-up -->
                                    <div class="info-popup" :class="{'ms_visible' : toggle_popup}">
                                        <div id="popup1" class="overlay">
                                            <div v-for="element,index in myProduct" :key="index">
                                                <div class="popup">

                                                    <!-- Product Name -->
                                                    <h2>
                                                        {{element.name}}
                                                    </h2>

                                                    <!-- Product image -->
                                                        <img src="https://www.viaggiamo.it/wp-content/uploads/2015/10/Dieci-migliori-ristoranti-di-Roma.jpg" alt="">
                                                        
                                                    <!-- Product Content -->
                                                    <div class="ms_content">

                                                        <!-- Product Description -->
                                                        <p>
                                                            {{element.description}}
                                                        </p>

                                                        <!-- Product Ingredients -->
                                                        <div class="popup-ingredients">
                                                        <span class="ingredienti-text">Ingredienti:  </span>{{element.ingredients}}
                                                        </div>

                                                        <!-- Add to Cart Button -->
                                                        <div @click='addItem(element), showProductInfo()' class="add-to-cart-popup">
                                                            <div class="popup-add-btn">
                                                                Aggiungi al carrello
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Close Pop-up -->
                                                    <a class="close" @click="showProductInfo()">&times;</a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <div class="col-12 col-sm-10 col-md-10 col-lg-4 col-xl-4 cart-col">
                        <div  v-if="cart.length > 0"  class="cart-container">
                            <div class="ms-cart-title">Carrello</div>
                            <div class="ghost-cart" id="my-cart"></div>

                            <!-- All products in cart-->
                            <div v-if="cartVisible">
                                <div class="all-products-in-cart">
                                <div v-for="(product, index) in cart" :key="index" class="item-cart-section d-flex">

                                    <!-- title - price-->
                                    <div class="title-price-cart d-flex flex-column justify-content-center align-items-start">
                                        <div class="title-product-cart"> {{product.name}}</div>
                                        <div  @click='deleteItem(index)' class="delete-item-cart">Rimuovi</div>
                                    </div>

                                    <!-- quantity + - -->
                                    <div class="quantity-cart d-flex justify-content-center align-items-center">
                                        <span @click='decreaseQuantity(product, index)' class="increment quantity-btn"><i class="fa-solid fa-circle-minus"></i>
                                        </span><span class="quantity-number">{{product.quantity}}</span>
                                        <span  @click='addItem(product)' class="decrease quantity-btn"><i class="fa-solid fa-circle-plus"></i></span>
                                    </div>

                                    <!-- product price- -->
                                    <div class="price-product-cart d-flex justify-content-center align-items-center">
                                        <!-- <i class="fa-solid fa-xmark"></i> -->
                                        {{ product.price * product.quantity }}&euro;
                                    </div>
                                </div>
                            </div>

                            <!-- checkout section -->
                            <div class="check-out-section d-flex flex-column justify-content-center align-items-center">
                                <div class="total-clear-price d-flex justify-content-between align-items-center">
                                    <div class="total-clear d-flex flex-column justify-content-center align-items-start">
                                        <div class="totale-text">Totale</div>
                                        <div @click="clearCart(index)" class="clear-cart">Svuota carrello</div>
                                    </div>

                                    <!-- final price -->
                                    <div class="final-price">{{ totalAmount(cart) }} &euro;</div>
                                </div>
                                <div data-toggle="modal" data-target="#proceedtopayment" class="check-out-btn">Checkout</div>
                            </div>
                            <!-- Payment Component -->
                            <PaymentComponent :amount="totalAmount(cart)" v-if="isVisible" />
                            </div>

                            
                        </div>    
                        <!-- Cart Blank layout -->
                        <div v-else class="cart-blank">
                            
                            <!-- Title -->
                            <div class="blank-cart-title">
                                Il carrello è vuoto
                            </div>

                            <!-- SVG Image -->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="406.000000pt" height="361.000000pt" viewBox="0 0 406.000000 361.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,361.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M2560 3585 c-167 -26 -554 -141 -713 -213 -144 -66 -388 -215 -515 -315 -147 -115 -198 -270 -157 -468 9 -40 14 -73 12 -75 -1 -1 -77 -39 -169 -83 -92 -45 -181 -93 -198 -107 -17 -15 -32 -25 -34 -23 -2 2 -38 141 -82 309 -60 234 -84 310 -101 328 -22 22 -26 22 -282 22 -258 0 -260 0 -287 -23 -20
                                    -17 -27 -33 -27 -57 0 -24 7 -40 27 -57 27 -23 31 -23 239 -23 l212 0 204 -782 c345 -1321 336 -1290 361 -1310 21 -17 83 -18 1327 -18 1149 0 1307 2 1333 15 17 9 30 18 30 20 0 3 9 47 20 98 24 113 90 428 169 812 33 160 76 366 96 458 30 145 34 172 23 195 -23 47 -40 50 -351 51 -215 2 -293 5 -299 14 -4
                                    7 -8 26 -8 43 0 56 -41 187 -118 379 l-76 190 -1 115 c0 145 5 165 53 189 l37 19 -30 7 c-59 13 -75 25 -118 92 -59 91 -98 127 -186 171 -71 35 -80 37 -185 39 -61 1 -154 -5 -206 -12z m337 -169 c52 -28 111 -81 101 -91 -2 -3 -54 -16 -114 -29 -308 -69 -633 -246 -1073 -586 -69 -53 -141 -105 -160 -114 -33 -17 -33 -17 -61 9 -63 61 -92 179 -65 271 21 73 84 135 250 247 184 123 354 196 625 269 173 46 246 58 350 55 83 -2 102 -6 147 -31z m135 -326 c-5 -76 17 -155 122 -439 47 -124 86 -244 88 -266 l3 -40 -733 0 -734 0 -50 98 c-28 54
                                    -48 100 -45 103 13 13 1147 534 1272 585 38 15 72 25 75 23 3 -3 3 -32 2 -64z m-1972 -855 c0 -8 9 -24 20 -35 20 -20 33 -20 1411 -20 1319 0 1390 -1 1385 -17 -3 -10 -37 -169 -75 -353 -39 -184 -100 -474 -136 -644 -36 -170 -65 -310 -65 -312 0 -2 -549 -4 -1220 -4 l-1219 0 -10 38 c-63 239 -147 565 -226 872 -53 206 -100 390 -105 408 l-8 32 61 0 c45 0 76 7 112 24 59 29 75 31 75 11z"/>
                                    <path d="M2816 2913 c-10 -10 -7 -63 5 -86 31 -60 83 -91 115 -69 28 19 43 86 28 126 -5 12 -15 15 -44 10 -24 -4 -47 -1 -67 10 -17 8 -33 12 -37 9z"/>
                                    <path d="M2240 2688 c0 -6 -10 -32 -22 -56 -20 -43 -21 -46 -4 -77 22 -40 59 -59 87 -45 56 31 63 109 13 162 -28 28 -74 38 -74 16z"/>
                                    <path d="M2664 2650 c-47 -11 -103 -48 -118 -78 -29 -59 11 -68 101 -24 84 41 103 55 103 74 0 10 -9 22 -19 28 -22 11 -23 11 -67 0z"/>
                                    <path d="M1537 593 c-57 -20 -128 -80 -161 -136 -63 -109 -48 -256 35 -351 89 -101 241 -132 361 -73 102 50 160 138 166 254 7 129 -47 226 -159 287 -67 37 -169 45 -242 19z"/>
                                    <path d="M3047 593 c-27 -9 -71 -36 -97 -60 -163 -146 -127 -404 68 -500 47 -23 70 -28 132 -28 127 1 223 62 275 176 23 53 27 71 23 138 -6 121 -61 206 -170 262 -57 30 -165 35 -231 12z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Component -->
            <NewsletterComponent />
        </div>    

        <!-- MODALS SECTION -->
        <div v-for="(product, index) in cart" :key="index" class="margin">

            <!-- Modal "proceed to payment" -->
            <div class="modal fade right ms_modal-wrapper" id="proceedtopayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                    <!--Content-->
                    <div class="modal-content ms_modal_container">
                        <!--Header-->
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                    <!--Body-->
                    <div class="text-center">
                        <span class="yellow pb-4"><i class="fas fa-credit-card fa-4x"></i></span>
                        <p class="pt-4">Vuoi concludere il tuo ordine e procedere al pagamento?</p>
                    </div>

                        <!--Footer-->
                        <div class="text-center">
                            <button type="button" @click="ViewFormPayment()" data-dismiss="modal" class="ms_btn white-weight b-radius boxshadow mt-3">Si, ho fame!</button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- End Modal "proceed to payment" -->

            <!-- Modal "order confirmed" -->
            <div class="modal fade right ms_modal-wrapper" id="orderconfirmed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                    <!--Content-->
                    <div class="modal-content ms_modal_container">
                        <!--Header-->
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="text-center">
                            <span class="yellow pb-4"><i class="fas fa-burger fa-4x"></i></span>
                            <p class="pt-4">Stiamo preparando il tuo ordine!</p>
                            <p>Controlla la mail per tutti i dettagli.</p>
                            <p>Fra poco si mangia!</p>
                        </div>

                        <!--Footer-->
                        <div class="text-center">
                            <button type="button" data-dismiss="modal" class="ms_btn white-weight b-radius boxshadow mt-3" @click="paymentDone()">Ok</button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- End Modal "order confirmed" -->
        </div>
    </section>
</template>

<script>
import PaymentComponent from "../components/PaymentComponent.vue";
import NewsletterComponent from '../components/sections/NewsletterComponent.vue';

export default {
    name: 'ProductComponent',
    components: {
        PaymentComponent,
        NewsletterComponent
    },

    data(){
        return {
            user: [],

            // Toogle che rende visibile/invisibile il pop-up
            toggle_popup: false,

            // Array in cui salvo l'id del prodotto visualizzato nel pop-up dettagli prodotto
            myProduct: [],

            // Array dei prodotti
            products: [],
            
            // Array vuoto per il carrello
            cart:[],

            // Numero prodotti presenti nel carrello
            products_in_cart: 0,

            // Definisco una variabile per visionare il pannello del pagamento
            isVisible: false,
            
            // Definisco una variabile per visionare il carrello, servirà per rimuovere il carrello quando il pagamento viene eseguito
            cartVisible: true
        }
    },
    created() {
                    
        // $this.route.paramas.id rappresenta il passaggio di informazioni eseguiro con il router link
        axios.get(`http://127.0.0.1:8000/api/${this.$route.params.slug}/menu`)
        .then((response) =>{
            this.products = response.data.results
        });


        axios.get(`http://127.0.0.1:8000/api/${this.$route.params.slug}/user`)
        .then((response) =>{
            this.user = response.data.results
        //   console.log(response.data.results)
        });

        // Se il carrello non è null
        if (localStorage.cart) {

            // I prodotti presenti nel carrello vengono convertiti in un file json
            this.products_in_cart = JSON.parse(localStorage.cart);
        }

        // Se cart esiste in LocalStorage
        if (localStorage.getItem('cart')) {
            try {

                // Trasformalo in stringa
                this.cart = JSON.parse(localStorage.getItem('cart'));
            } catch(e) {

                // Altrimenti rimuovi cart da localStorage
                localStorage.removeItem('cart');
            }
        }
    },

    methods: {

        // Funzione che calcola il numero totale dei prodotti nel carrello
        totalQuantity(cart){
            let total_quantity = 0;
            cart.forEach ((product) => {
                total_quantity += product.quantity;
            })
            return total_quantity;
        },

        // Funzione che scrolla l'icona del carrello
        cartScroll(){
            const element = document.getElementById('my-cart')
            element.scrollIntoView({ behavior: 'smooth' });
        },

        // Mostra popup info  
        showProductInfo(){
            if (this.toggle_popup){
                this.toggle_popup = false
                this.myProduct = []; 
            }else{
                this.toggle_popup = true
            }
        },

        // Seleziona il prodotto
        selectProduct(product){
            this.myProduct.push(product); 
        },

        // Funzione che aggiunge il prodotto al carrello
        addItem(product){

            // Se il prodotto non è presente
            if (!product){
                return;
            }
            // Se il carrello presente in localstorage non esiste o è vuoto
            if(localStorage.getItem('cart') == null || JSON.parse(localStorage.getItem('cart')).length === 0){

                // Definisco la quantità del prodotto
                product.quantity = 1;

                // Pusho nell'array il prodotto
                this.cart.push(product);

                // Salvo il carrello
                this.saveCart();

            } else {

                // Salvo la stringa di LocalStorage in this.cart
                this.cart = JSON.parse(localStorage.getItem('cart'));

                // Se l'id del prodotto presente nel carrello è diverso dall'user_id presente nella tabella prodotti
                if(this.cart[0].user_id !== product.user_id){

                    // Se conferma di cambiare ristorante
                    if(confirm("Stai provando ad aggiungere un prodotto di altro ristorante, così facendo perderai il contenuto del tuo carrello. Vuoi cambiare ristorante?")){
                        
                        // Svuoto il carrello
                        this.cart = [];

                        // Setto la quantità del prodotto (del nuovo ristorante)
                        product.quantity = 1;

                        // Pusho nell'array il prodotto
                        this.cart.push(product);

                        // Salva il carrello
                        this.saveCart();
                    }
                } else {

                    // Se non cambia ristorante:
                    // Salvo l'id del prodotto selezionato

                    let check = this.cart.find(({id}) => id == product.id);

                    // Se non esiste già
                    if(!check) {

                        // Setto la quantità del prodotto
                        product.quantity = 1;
                    }
                    else {

                        // Incrementa di 1 la quantità
                        for(let i = 0; i < this.cart.length + 1; i++){

                            // Se L'id del prodotto presente nel carrello è uguale all'id del prodotto presente nel database
                            if(this.cart[i].id == product.id){

                                // Incremento la quantità del prodotto presente nel carrello di uno
                                this.cart[i].quantity = this.cart[i].quantity + 1

                                // Salvo il carrello
                                this.saveCart();
                            }
                        }
                    }

                    // Pusho nell'array il prodotto
                    this.cart.push(product);

                    // salva il carrello
                    this.saveCart();
                }
            }
        },

        // Funzione salva carrello
        saveCart() {
            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
        },

        // funzione che riduce la quantità del prodotto nel carrello
        decreaseQuantity(product, index){
            let check = this.cart.find(({id}) => id == product.id);
            if(check.id){
                for(let i = 0; i < this.cart.length + 1; i++){
                    if(this.cart[i].id == product.id && this.cart[i].quantity >= 1){
                    this.cart[i].quantity = this.cart[i].quantity -  1;
                    this.saveCart();
                    }

                    if(this.cart[i].id == product.id && this.cart[i].quantity == 0){
                        this.cart.splice(index, 1);
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
                // console.log('ciao sono', Storage.key(index))
            } else {
                this.cart.splice(index, 1);

                // this.saveProductInCart();
                localStorage.clear();
            }
        },

        // Funzione che svuota il carrello
        clearCart(index){
            this.cart.splice(index, this.cart.length)
            localStorage.clear('cart');
        },

        // funzione che determina la quantità di prodotti all'interno del carrello ritornando il prezzo finale
        totalAmount(cart){
            let total_amount = 0;
            cart.forEach ((product) => {
                total_amount += product.price * product.quantity;
            })
            return total_amount;
        },

        // Funzione che comunica il processo del pagamento e rende visibile il banner del pagamento
        ViewFormPayment() {
            this.isVisible = true;
        },   

        // funzione per cancellare il carrello sia in local storage che in pagina
        paymentDone(cart){
            if(this.cart.length > 0){
                 this.cartVisible = false
            }
            this.cart.length = 0
            this.cartVisible = true
            localStorage.removeItem('cart');
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

section {
    background-color: (white);

}

// Jumbotron
.jumbotron {
    margin-top: 5.5rem;
    height: 700px;
    background-image: url(https://www.settimoristorante.it/wp-content/uploads/sites/106/2020/01/slide_home_sofitel_settimo_ristorante_terrazza2.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position-x: 50%;
    background-position-y: 0;
    position: relative;

    &:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(20, 20, 20, .3);
        z-index: -1;
    }

    .container {
        height: 100%;
        text-align: center;
        color: white;
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        margin: 0 auto;

        .restaurant-heading {
            padding: 2rem 0.3rem;
            display: inline-block;
            margin-bottom: 3.5rem;

            h2 {
                font-size: 4.5rem;
            }

            p {
                font-size: 1.3rem;
            }
        }
    }
}

// Floating Cart
.floating-cart {
    display: none;
    position: fixed;
    top: 0;
    right: 30px;
    margin-top: 120px;
    color: white;
    background-color: $primary-color;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
    z-index: 10;
    cursor: pointer;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2),
    0 6px 20px 0 rgba(0, 0, 0, 0.19);

    .fa-cart-shopping {
        font-size: 2.3rem;
        z-index: 10;
    }

    &:hover {
        color: rgb(249, 246, 246);
    }
}

.master-row {
    margin-top: 4rem;
}

// Counter Cart
.count-float {
    width: 1.1rem;
    height: 1.1rem;
    font-size: 0.7rem;
    border-radius: 50%;
    background-color: $primary-color;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    bottom: 33px;
    right: 24px;
    z-index: 11;

    &:hover ~ .fa-cart-shopping {
        color: rgb(249, 246, 246);
    }

    .red {
        color: $secondary-color;
        font-weight: 700;
    }
}
  
// ******************** PRODUCT CARDS ******************** // 
.ms_pattern-background{
    background-image: url(https://i.ibb.co/mX7bXgD/foodpattern1.png);
    background-color: rgba(white, $alpha: 0.8);
    background-size: 700px;
    background-blend-mode: screen;
    padding-top: 4rem;
}

.products-cart-wrapper {
    width: 86%;
    margin: 0 auto;
    position: relative;
}

.products-side {
    margin-bottom: 70px;
    width: 95%;

    .my-circle {
        width: 50px;
        height: 50px;
        text-align: center;
        vertical-align: middle;
    }

    .col {
        margin-bottom: -80px;
    }
     
    .ms-product-card {
        user-select: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
        0 6px 20px 0 rgba(0, 0, 0, 0.19);
        height: 75%;
        aspect-ratio: 1/1;
        position: relative;
        border-radius: 10px 10px 10px 10px;
        transition: box-shadow 0.5s, transform 0.5s;

        &:hover {
                box-shadow: 5px 20px 30px rgba(0,0,0,0.3);
        }

        .card-img {
            object-fit: cover;
            height: 70%;
        }

        .info-popup-inline {
            display: block;
            
            .fa-circle-info {
                position: absolute;
                font-size: 160%;
                color: $primary-color;
                color: $product-card-cart-info;
                top: 10px;
                right: 10px;
                z-index: 2;
            
            }

            .overlay-info{
                position: absolute;
                top: 12px;
                right: 13px;
                width: 18px;
                height: 20px;
                border-radius: 50%;
                background-color: $secondary-color;
                background-color: $product-card-info-under;
            }

        &:hover .overlay-info{
                opacity: 0;
            }   
        }
                    
        .ms-card-body {
            height: 40%;

            .title-price {
                width: calc((100% / 4) * 3);
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                padding-left: 1rem;
                background-color: #f5f5f5;
                background-color: $product-card-bg;
                        
                .ms-card-title {
                    margin-top: 1rem;
                    font-weight: 600;
                    overflow: hidden ;
                    text-overflow: ellipsis;
                    font-size: 0.9rem;
                }

                .product-card-price {
                    margin-bottom: 1rem;
                    font-size: 0.8rem;
                }
            }

            .cart-card-symbol {
                width: calc(100% / 4);
                display: flex;
                justify-content: center;
                align-items: center;
                border-left: solid thin rgba(0,0,0,0.1);
                transition: transform 0.5s;
                cursor: pointer;
                background-color: #f5f5f5;
                background-color: $product-card-bg;

                &:hover {
                    background:#eae1e1;
                    background: $product-card-cart-icon-hover;
                }

                &:hover .fa-cart-shopping {
                        transform: translateY(5px);
                    }

                .add-to-cart {
                    font-size: 140%;
                    margin-bottom: 1.8rem;
                    transition: transform 0.5s;
                    
                    .fa-cart-shopping {
                        transition: transform 0.5s;
                        color: $secondary-color;
                        color: $product-card-cart-icon;
                    }
                }
            }
        }
    }
}

// Add to Cart Button 
.add-to-cart {
    color: rgb(23, 2, 2);
    cursor: pointer;
}

// Product Info Pop-up
.info-popup {
    margin-top: 90px;

    .button {
        font-size: 1em;
        padding: 10px;
        color: #fff;
        border: 2px solid #06D85F;
        border-radius: 20px/50px;
        text-decoration: none;
        cursor: pointer;
    }

    .button:hover {
        background: #06D85F;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.1);
        transition: opacity 200ms;
        visibility: hidden;
        opacity: 0.1;
        z-index: 60;
    }

    .popup {
        margin: 10vh auto;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        width: 40%;
        position: relative;
    }

    .popup h2 {
        margin-bottom: 1rem;
        color: black;
    }

    img{
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 5px;
    }

    .ms_content{
        margin: 1rem 0;

        .popup-ingredients{
            margin-top: 0.5rem;
            font-size: 0.9rem;

            .ingredienti-text{
                color: grey;
                font-size: 0.9rem;
            }
        }
        
        .add-to-cart-popup{
            margin: 2rem 0 0 0;
            text-align: center;
            display: flex;
            justify-content: center;

            .popup-add-btn{
                background-color: #6c808f;
                padding: 0.3rem 2.8rem;
                border-radius: 15px;
                color: white;
                cursor: pointer;
                background-color: $secondary-color;
                background-color: $popup-cart-btn-bg;
            }
        }    
     }

    .popup .close {
        position: absolute;
        top: 5px;
        right: 13px;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
        color: $popup-cart-close;
        cursor: pointer;
    }

    .popup .close:hover {
        color: $secondary-color;
        color: $popup-cart-close-overlay;
    }

    .add-to-cart.pop-btn {
        margin-top: 30px;
        display: inline-block;
    }

    &.ms_visible {
         
        .overlay {
            visibility: visible;
            opacity: 1;
        }
    }
}

// ****************** END PRODUCT CARDS ****************** // 

// ****************** CART ******************

.ms-cart-title{
    font-size: 1.2rem;
    text-align: center;
    padding: 1rem 0;
    font-weight: 600;
    border-bottom: 1px solid #c1c1c3;
    background-color: #f5f5f5;
    background-color:$cart-bg;
}
.cart-container {
    user-select: none;
    border-radius: 15px;
    overflow: hidden;
    position: sticky;
    top: 180px;
    margin-top: 1.5rem;
    margin-bottom: 90px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2),
    0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color: #f5f5f5;
    background-color:$cart-bg;

// custom scrollbar cart
::-webkit-scrollbar {
    width: 10px;
    }

::-webkit-scrollbar-track {
    background: #f1f1f1;
    background: #f1f1f1;
    }

::-webkit-scrollbar-thumb {
    background-color: #6c808f;
    background-color: #ffc509;  //primary
    }

::-webkit-scrollbar-thumb:hover {
    background-color: #9ba9b4;
    background-color: #9ba9b4;
    }

    .ghost-cart {
        position: absolute;
        top: -140px;
        left: 0;
        height: 10px;
        width: 10px;
        visibility: hidden;
    }

    .all-products-in-cart{
        overflow-y: scroll;
        max-height: 45vh;
    }

    .item-cart-section{
        border-bottom: 1px solid #c1c1c3;
       

       .title-price-cart{
            width: (calc(100% / 9) * 5);
            padding: 1rem 0;
            .title-product-cart{
                font-weight: 600;
                padding-left: 5%;
            }
            .delete-item-cart{
                padding-left: 6%;
                color: #808083;
                font-size: 0.8rem;
                cursor: pointer;
            }
       }
       .quantity-cart{
            width: (calc(100% / 9) * 2);

            .quantity-number{
                padding: 0 0.3rem;
            }

            .quantity-btn{
                font-size: 1.1rem;
                display: flex;
                color: #b9b9d1;
                color: $cart-quantity-btn;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }
       }
       .price-product-cart{
            font-weight: 600;
            width: (calc(100% / 9) * 2);
            color:black;
            font-size: 1rem;
       }
    }
    
    .check-out-section{
             background-color: #f5f5f5;
             background-color: $cart-bg;
             
             
             .total-clear-price{
                width: 100%;
                padding: 0.6rem 0;
                padding-left: 3%;
                // background-color: green;
                    .total-clear{
                        width: (calc(100% / 9) * 7);
                        
                        .totale-text{
                            font-size: 1.5rem;
                            font-weight: 600;
                        }
                        .clear-cart{
                            padding-left: 1px;
                            font-size: 0.9rem;
                            color: #808083;
                            color: $clear-cart-color;
                            cursor: pointer;
                        }
                    }
                    .final-price{
                        width: calc( (100% / 9) * 2);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 1.6rem;
                        font-weight: 600;
                        margin-right: 0.5rem
                    }
             }
             .check-out-btn{
                margin: 0.5rem 0 1.5rem 0;
                font-weight: 600;
                padding: 0.4rem 0;
                border-radius: 15px;
                text-align: center;
                width: 50%;
                color: white;
                // color: $secondary-color;
                background-color: #6c808f;
                background-color: $cart-checkout-btn-bg;
                // background-color: $primary-color;S
                cursor: pointer;
             }

    }

}

.cart-blank {
   
    width: 80%;
    background-color:#f5f5f5;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 1.5rem 0;
    margin-left: 40px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2),
    0 6px 20px 0 rgba(0, 0, 0, 0.19);
    position: sticky;
    top: 180px;
    overflow: hidden;
    
        .blank-cart-title{
            width: 100%;
            font-size: 1.2rem;
            text-align: center;
            padding: 1rem 0;
            background-color: #f5f5f5;
            font-weight: 600;
            border-bottom: 1px solid #c1c1c3;
            color: #808083;
        }

    svg {
        padding: 50px 0;
        width: 40%;
        height: 40%;
        opacity: 0.4;
    }
}

// ****************** END CART ****************** // 


// ******************** MODALS ******************** //

// "Proceed to Payment" Modal
.ms_modal-wrapper {
    margin-top: 115px;

    .ms_modal_container {
        margin: 0 auto;
        background: linear-gradient(to left right, $secondary-color, white);
        color: black;
        font-size: 1.1rem;
        padding: 1.7rem;
        border-radius: 15px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        .yellow {
            color: $primary-color;
        }

        .red {
            color: $secondary_color;
        }

        .white-weight {
            color: white;
            font-weight: 500;
        }

        .boxshadow {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px,
                        rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, 
                        rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }
    }

    .b-radius {
        border-radius: 15px;
    }

    .modal-dialog {
        margin: 0 auto;
    }
}

// ******************** END MODALS ******************** //

// ******************** MEDIA QUERY ******************** //

// Max-width: 1200px

@media only screen and (max-width: 1200px) {

      .products-cart-wrapper {
        margin-bottom: 70px;
        width: 95%;
    }

    .products-side {
        margin-bottom: 70px;
        width: 95%;
    }

    .info-popup{

        .popup {
            margin: 10vh auto;
            width: 50%;
        }
    }

    .card-ingredients {
        height: 65px;
    }
}

// Max-width: 1110px

@media only screen and (max-width: 1110px) {

    .products-side {
        width: 100%;
    }
}

// Max-width: 992px

@media only screen and (max-width: 992px) {

    .popup {
        margin: 20vh auto;
        width: 60%;
    }

    .floating-cart {
        display: flex;
    } 

    .info-popup{

        .popup {
            margin: 10vh auto;
            width: 60%;
        }
    }

   .cart-container{
        margin-left: 16px;
        z-index: 11;
    }

    .products-col {
        display: flex;
        justify-content: flex-start ; 
    }
}

// Max-width: 768px

@media only screen and (max-width: 768px) {


    .cart-container{
        margin-left: 16px;
    }

    .info-popup{

        .popup {
            margin: 10vh auto;
            width: 80%;
        }
    }

    .all-products-in-cart{
        overflow-y: scroll;
        max-height: 20vh;
    }
    
   .jumbotron {
        height: 600px;
    }

}  

// ******************** END MEDIA QUERY ******************** //

</style>