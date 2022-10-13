<template>
     <!-- Cookie -->
     <section v-if="!cookies.includes(false)">
          <div id="cookie" class="alert alert-warning d-flex justify-content-spacebetween" role="alert">
            <div class="cookie-text">
                TOAST RIDER utilizza i cookie per personalizzare la tua esperienza e gli annunci pubblicitari su questo sito Web e su siti Web di terze parti, analizzare i dati, migliorare le prestazioni del sito e consentire la condivisione sui social media. Per ulteriori informazioni o per modificare le impostazioni, consulta la nostra Informativa sui cookie. 
            </div>
            <!-- Accetta -->
            <button type="button" class="close cookie-button" data-dismiss="alert" aria-label="Close" @click="checkCookies()">
                <span aria-hidden="true">Accetta</span>
            </button>

            <button type="button" class="close cookie-button" data-dismiss="alert" aria-label="Close"  @click="checkCookies()">
                <span aria-hidden="true">Rifiuta</span>
            </button>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"  @click="checkCookies()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
     </section>
       

</template>

<script>
export default {
    name: 'CookiesComponent',
    data(){
        return{
            isVisible: true,
            cookies: [],
        }
    },
    created(){

        if (localStorage.cookies) {
            this.cookies = JSON.parse(localStorage.cookies);
        }

        if (localStorage.getItem('cookies')) {
            this.cookies = JSON.parse(localStorage.getItem('cookies'));
        }

    },

    mounted(){
        console.log(this.cookies);
    },

    methods:{
        checkCookies() {
            // salvo il dato in formato stringa nel local storage
            const parsed = JSON.stringify(this.cookies);
            localStorage.setItem('cookies', parsed);

            // leggo i file presenti nel local storage, convertendoli in oggetto
            if(JSON.parse(localStorage.getItem('cookies')).length == 0){
                this.isVisible = false,
                this.cookies.push(this.isVisible)
                // Salvo il cookies
                this.saveCookies()
            }
        },

        saveCookies(){
            const parsed = JSON.stringify(this.cookies);
            localStorage.setItem('cookies', parsed);
        },
    }
 
}
</script>

<style lang="scss">
      // Cookies
    #cookie{
        z-index: 100;
        position: fixed;
        bottom: 0px;
        padding: 1rem;
        font-size: 0.7rem;
        .cookie-text{
            padding-right: 0.3rem;
        }
        .cookie-button{
        padding-right: 1rem;
        font-size: 1rem;

        }
        
    }
</style>