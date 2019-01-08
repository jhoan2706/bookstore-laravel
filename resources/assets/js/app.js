/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//laravel-vue-pagination
Vue.component('pagination', require('laravel-vue-pagination'));
//registro de un componente
Vue.component('pokemons-component', require('./components/PokemonsComponent.vue'));
Vue.component('spinner', require('./components/Spinner.vue'));
Vue.component('create-form-pokemon', require('./components/CreatePokemonComponent.vue'));
Vue.component('add-pokemon-btn', require('./components/AddPokemonComponent.vue'));
Vue.component('show-object-btn', require('./components/BtnShowObjectComponent.vue'));
Vue.component('show-autor-modal', require('./components/ShowAutorComponent.vue'));

//libros
Vue.component('index-books', require('./components/libros/index.vue'));
Vue.component('btn-add-book', require('./components/libros/btn-add.vue'));
Vue.component('add-form-modal', require('./components/libros/add-book-modal.vue'));

const app = new Vue({
    el: '#app'
});