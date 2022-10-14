<template>
     <!-- Cookie -->
     <section v-if="!cookies.includes(false)">

        <div id="cookie" class="alert-warning d-flex justify-content-spacebetween align-items-center" role="alert">

            <div class="cookies-img">
                <img class="evidon-banner-image" alt="Logo Evidon" src="//c.evidon.com/logos/6063/6063-20200226114150." data-di-id="c8ec593f-5aadcfb9">
            </div>

            <div class="cookie-text brown">
                TOAST RIDER utilizza i cookie per personalizzare la tua esperienza e gli annunci pubblicitari su questo sito Web e su siti Web di terze parti, analizzare i dati, migliorare le prestazioni del sito e consentire la condivisione sui social media. Per ulteriori informazioni o per modificare le impostazioni, consulta la nostra Informativa sui cookie. 
            </div>

            <!-- Accetta -->
            <div class="cookie-button">
                <button type="button" class="close brown button" data-dismiss="alert" aria-label="Close" @click="checkCookies()">
                    <span aria-hidden="true">Accetta</span>
                </button>

                <button type="button" class="close brown button" data-dismiss="alert" aria-label="Close"  @click="checkCookies()">
                    <span aria-hidden="true">Rifiuta</span>
                 </button>
            </div>
           

            <button type="button" class="close brown x-close" data-dismiss="alert" aria-label="Close"  @click="checkCookies()">
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
        padding: 1.5rem 2.5rem ;
        font-size: 0.9rem;
        
        .brown{
            color: #856404
        }
        .cookies-img{
            img{
                width: 55px;
                filter: invert(0.5);
                filter: invert(36%) sepia(29%) saturate(2713%) hue-rotate(24deg) brightness(92%) contrast(97%);
            }
           
        }
        .cookie-text{
            padding: 1.5rem;
            
     
        }
        .close.brown.button{
            padding: 0.3rem 0;
            font-size: 1rem;
        }

        .close.brown.x-close{
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

    
        
    }

    ///////////// MEDIA //////////

    @media only screen and (max-width: 576px) {

        #cookie{
            flex-direction: column;

            .cookie-text{
                padding: 0.5rem 0;
            }
            
            .cookies-img{
                width: 100%;
            }


           .close.brown.x-close{
               position: absolute;
               top: 1rem;
               right: 1rem;
            }

            .close.brown.button{
                padding: 0.5rem;
            }

        }
        
    }

</style>