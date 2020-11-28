import './bootstrap'
import Vue from 'vue'
import router from './router'

window.Vue = Vue

new Vue({
	router,
}).$mount('.app')
