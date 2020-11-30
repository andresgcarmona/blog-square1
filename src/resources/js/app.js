import './bootstrap'
import Vue from 'vue'
import router from './router'
import store from './store'
import { mapMutations } from 'vuex'

window.Vue = Vue

new Vue({
	router,
	store,
	methods: {
		...mapMutations(['SET_TOKEN']),
	},
	mounted() {
		if(window.token) {
			this['SET_TOKEN'](window.token)
			
			delete window.token
		}
	},
}).$mount('.app')
