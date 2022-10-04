/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

import { isArray } from 'lodash';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import  form ''

// const app = new Vue({
//     el: '#app',
// });

// importiamo il componente principale di vue
import App from './views/App.vue' ;

const app = new Vue({
    // sostituiamo public con root
    el: '#root', 
    // avvia come primo componente vue 
    render: h=> h(App)
});


// START FORM LABELS ANIMATION LOGIC
const formInputs = document.querySelectorAll('.ms_js-get-input');
const formLabels = document.querySelectorAll('.ms_js-get-label');

for(let i = 0; i < formInputs.length; i++) {
    let input = formInputs[i];

    for(let i = 0; i < formLabels.length; i++) {
        let label = formLabels[i];
        
        if(input.value !== "") {
            if(label.getAttribute('for') === input.id) {
                label.classList.add('ms_label-active');
            }
        }

        input.addEventListener('input', function() {
            
            for(let i = 0; i < formLabels.length; i++) {
                label = formLabels[i];

                if(input.value.length > 0) {
                    if(label.getAttribute('for') === input.id) {
                        label.classList.add('ms_label-active');
                    }
                    
                } else {
                    if(label.getAttribute('for') === input.id) {
                        label.classList.remove('ms_label-active');
                    }
                }
            }
        });
    }
}
// END FORM LABELS ANIMATION LOGIC

// START REGISTRATION FORM PASSWORD COMPARISON
// salvo la input con id uguale a "password" in "registerPwd"
const registerPwd = document.getElementById('password');

// salvo la input con id uguale a "password-confirm" in "registerPwdConfirm"
const registerPwdConfirm = document.getElementById('password-confirm');

// salvo la input con id uguale a "ms_js-register-btn" in "registerBtn"
const registerBtn = document.getElementById('ms_js-register-btn');

// salvo in una variabile "pwdErrorMessage" lo span da popolare nel DOM
const pwdErrorMessage = document.querySelector('.ms_js-pwd-check-msg');

// dichiaro una variabile "registerPwdValue" in cui salvare successivamente la value di "registerPwd"
let registerPwdValue = "";

// dichiaro una variabile "registerPwdConfirmValue" in cui salvare successivamente la value di "registerPwdConfirm"
let registerPwdConfirmValue = "";

if(registerPwd !== null && registerPwdConfirm !== null) {
    // START EVENT LISTENERS
    // attribuisco a "registerPwd" un "addEventListener" all' "input"
    registerPwd.addEventListener('input', function() {

        // all' "input" salvo in "registerPwdValue" la value di "registerPwd"
        registerPwdValue = registerPwd.value;

        // se "registerPwdValue" è diverso da "registerPwdConfirmValue" e la lunghezza di entrambi è maggiore o uguale a 8:
        if(registerPwdValue !== registerPwdConfirmValue && registerPwdValue.length >= 8 && registerPwdConfirmValue.length >= 8) {

            // disabilito il "registerBtn" aggiungendo con "setAttribute()" l'attributo disabled
            registerBtn.setAttribute('disabled', "");

            // se "pwdErrorMessage" non contiene la classe "ms_js-pwd-check-msg-active" l'aggiungo
            if(!pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.add('ms_js-pwd-check-msg-active');
            }

            // se "pwdErrorMessage" non contiene la classe "ms_txt-danger":
            if(!pwdErrorMessage.classList.contains('ms_txt-danger')) {

                // se contiene la classe "ms_txt-success":
                if(pwdErrorMessage.classList.contains('ms_txt-success')) {

                    // la rimuovo e aggiungo la classe "ms_txt-danger"
                    pwdErrorMessage.classList.remove('ms_txt-success');
                    pwdErrorMessage.classList.add('ms_txt-danger');

                // altrimenti aggiungo direttamente la classe "ms_txt-danger"
                } else {
                    pwdErrorMessage.classList.add('ms_txt-danger');
                }
            }

            // infine stampo in pagina, all'interno di "pwdErrorMessage" "/ Le password inserite devono essere uguali."
            pwdErrorMessage.innerHTML = "Le password inserite devono essere uguali.";

        // se "registerPwdValue" è uguale a "registerPwdConfirmValue" e la lunghezza di entrambi è maggiore o uguale a 8:
        } else if(registerPwdValue === registerPwdConfirmValue && registerPwdValue.length >= 8 && registerPwdConfirmValue.length >= 8) {

            // riabilito il "registerBtn" rimuovendo con "removeAttribute()" l'attributo disabled
            registerBtn.removeAttribute('disabled', "");

            // se "pwdErrorMessage" non contiene la classe "ms_js-pwd-check-msg-active" l'aggiungo
            if(!pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.add('ms_js-pwd-check-msg-active');
            }

            // se "pwdErrorMessage" contiene la classe "ms_txt-danger":
            if(pwdErrorMessage.classList.contains('ms_txt-danger')) {

                // la rimuovo e aggiungo la classe "ms_txt-success"
                pwdErrorMessage.classList.remove('ms_txt-danger');
                pwdErrorMessage.classList.add('ms_txt-success');

            // altrimenti:
            } else {

                // se "pwdErrorMessage" non contiene la classe "ms_txt-success" l'aggiungo
                if(!pwdErrorMessage.classList.contains('ms_txt-success')) {
                    pwdErrorMessage.classList.add('ms_txt-success')
                }
            }

            // infine stampo in pagina, all'interno di "pwdErrorMessage" "/ Le password inserite combaciano!"
            pwdErrorMessage.innerHTML = "Le password inserite combaciano!";

        // altimenti:
        } else {

            // riabilito il "registerBtn" rimuovendo con "removeAttribute()" l'attributo disabled
            registerBtn.removeAttribute('disabled', "");

            // se "pwdErrorMessage" contiene la classe "ms_js-pwd-check-msg-active" la rimuovo
            if(pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.remove('ms_js-pwd-check-msg-active');
            }

            // rimuovo entrambe le classi "ms_txt-danger" e "ms_txt-success" da "pwdErrorMessage"
            pwdErrorMessage.classList.remove('ms_txt-danger');
            pwdErrorMessage.classList.remove('ms_txt-success');

            // infine svuoto pwdErrorMessage
            pwdErrorMessage.innerHTML = "";
        }
    });

    // attribuisco a "registerPwdConfirm" un "addEventListener" all' "input"
    registerPwdConfirm.addEventListener('input', function() {

        // all' "input" salvo in "registerPwdConfirmValue" la value di "registerPwdConfirm"
        registerPwdConfirmValue = registerPwdConfirm.value;

        // se "registerPwdValue" è diverso da "registerPwdConfirmValue" e la lunghezza di entrambi è maggiore o uguale a 8:
        if(registerPwdValue !== registerPwdConfirmValue && registerPwdValue.length >= 8 && registerPwdConfirmValue.length >= 8) {

            // disabilito il "registerBtn" aggiungendo con "setAttribute()" l'attributo disabled
            registerBtn.setAttribute('disabled', "");

            // se "pwdErrorMessage" non contiene la classe "ms_js-pwd-check-msg-active" l'aggiungo
            if(!pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.add('ms_js-pwd-check-msg-active');
            }

            // se "pwdErrorMessage" non contiene la classe "ms_txt-danger":
            if(!pwdErrorMessage.classList.contains('ms_txt-danger')) {

                // se contiene la classe "ms_txt-success":
                if(pwdErrorMessage.classList.contains('ms_txt-success')) {

                    // la rimuovo e aggiungo la classe "ms_txt-danger"
                    pwdErrorMessage.classList.remove('ms_txt-success');
                    pwdErrorMessage.classList.add('ms_txt-danger');

                // altrimenti aggiungo direttamente la classe "ms_txt-danger"
                } else {
                    pwdErrorMessage.classList.add('ms_txt-danger');
                }
            }

            // infine stampo in pagina, all'interno di "pwdErrorMessage" "/ Le password inserite devono essere uguali."
            pwdErrorMessage.innerHTML = "Le password inserite devono essere uguali.";

        // se "registerPwdValue" è uguale a "registerPwdConfirmValue" e la lunghezza di entrambi è maggiore o uguale a 8:
        } else if(registerPwdValue === registerPwdConfirmValue && registerPwdValue.length >= 8 && registerPwdConfirmValue.length >= 8) {
            
            // riabilito il "registerBtn" rimuovendo con "removeAttribute()" l'attributo disabled
            registerBtn.removeAttribute('disabled', "");

            // se "pwdErrorMessage" non contiene la classe "ms_js-pwd-check-msg-active" l'aggiungo
            if(!pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.add('ms_js-pwd-check-msg-active');
            }

            // se "pwdErrorMessage" contiene la classe "ms_txt-danger":
            if(pwdErrorMessage.classList.contains('ms_txt-danger')) {

                // la rimuovo e aggiungo la classe "ms_txt-success"
                pwdErrorMessage.classList.remove('ms_txt-danger');
                pwdErrorMessage.classList.add('ms_txt-success');

            // altrimenti:
            } else {

                // se "pwdErrorMessage" non contiene la classe "ms_txt-success" l'aggiungo
                if(!pwdErrorMessage.classList.contains('ms_txt-success')) {
                    pwdErrorMessage.classList.add('ms_txt-success')
                }
            }

            // infine stampo in pagina, all'interno di "pwdErrorMessage" "/ Le password inserite combaciano!"
            pwdErrorMessage.innerHTML = "Le password inserite combaciano!";

        // altimenti:
        } else {

            // riabilito il "registerBtn" rimuovendo con "removeAttribute()" l'attributo disabled
            registerBtn.removeAttribute('disabled', "");

            // se "pwdErrorMessage" contiene la classe "ms_js-pwd-check-msg-active" la rimuovo
            if(pwdErrorMessage.classList.contains('ms_js-pwd-check-msg-active')) {
                pwdErrorMessage.classList.remove('ms_js-pwd-check-msg-active');
            }

            // rimuovo entrambe le classi "ms_txt-danger" e "ms_txt-success" da "pwdErrorMessage"
            pwdErrorMessage.classList.remove('ms_txt-danger');
            pwdErrorMessage.classList.remove('ms_txt-success');

            // infine svuoto pwdErrorMessage
            pwdErrorMessage.innerHTML = "";
        }
    });
    // END EVENT LISTENERS
}
// END REGISTRATION FORM PASSWORD COMPARISON 