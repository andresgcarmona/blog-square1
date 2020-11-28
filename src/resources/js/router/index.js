import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../pages/Dashboard'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/dashboard',
			name: 'dashboard',
			component: Dashboard,
		}
	]
})

export default router
