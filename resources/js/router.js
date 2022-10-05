// sintassi per utilizzare VueRouter 
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// importo le pagine

import UserRestaurantComponent from './pages/UserRestaurantComponent.vue'
import ProductComponent from './pages/ProductComponent.vue'


const router = new VueRouter ({
     // inserisco la modalità hystory per eliminare il comporamento del cancelletto nell'url
     mode: 'history',
     routes: [
        //  rotta per la home (mostra tutti i ristoratori)
         {
            path : '/',
            name: 'home',
            component: UserRestaurantComponent
         },

        //  rotta per il singolo menu
         {
            path : '/:id/menu',
            name: 'products-page',
            component: ProductComponent
         },
         
   ]
})
// inserisco la stringa export default a fine pagina per permettere l'utilizo di app.js
export default router;