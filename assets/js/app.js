/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/hover-min.css'
import '../css/app.css'

/* assets/app.js */

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
console.log('Hello Webpack Encore! Edit me in assets/js/app.js')
// import eds fichiers nécessaires au fonctionnement de l'app vue.js
import Vue from 'vue';
import vuetify from './src/plugins/vuetify' // path ti vuetify export
import App from "./components/App"
import Vuetify from "vuetify";
import colors from 'vuetify/lib/util/colors'



// app vue.js
new Vue({
    // utilisation de vuetify
    vuetify: new Vuetify(),
    // changement de délimiteur pour affichage des données dans twig
    // delimiters: ['${', '}'],

    filters: {
        // formatage de la date
        formatDate(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY');
            }
        }
    },
    // affichage du rendu (app.vue) dans l'élément ayant l'id 'app'
    render: h => h(App)
}).$mount('#app')