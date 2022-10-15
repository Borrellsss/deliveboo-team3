<template>
    <section class="p-3">

        <div class=" text text-center">

            <!-- Text left -->
            <div>
                Vorresti restare aggiornatə su tutte le nostre novità?
            </div>

            <!-- Text Center -->
            <div class="pt-2">
                Iscriviti alla nostra newsletter!
            </div>

        </div>

        <!-- Newsletter Form -->
        <div class="text-center p-4">
            <form action="#" method="Post" class="newsletter">
                <input type="text" name="text" placeholder="inserisci la tua mail">
                <button type="button" class="btn btn-secondary">Invia</button>
            </form>
        </div>
	</section>
</template>

<script>
export default {
    name: 'NewsletterComponent'
}
</script>

<style lang="scss" scoped>
@import '../../style/variables';
@import '../../style/common';
  
section {
    font-size: 0.9rem;
    background-color: $secondary-color;
    background: radial-gradient(circle, rgba(116,6,2,1) 58%, rgba(75,3,0,1) 80%, rgba(69,7,5,1) 100%);

    .text {
        font-size: 1.8rem;
        color: $primary-color;
    }

    .newsletter {

        form {
            display: contents;
        }

        input {
            padding: 0.5rem;
            width: 15rem;
        }

        button {
            background-color: $primary-color;
            color: black;
            padding: 0.5rem;
        }
    }



}
</style>