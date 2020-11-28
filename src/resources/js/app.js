import './bootstrap'
import Vue from 'vue'
import router from './router'
import store from './store'

window.Vue = Vue

new Vue({
	router,
	store,
}).$mount('.app')
