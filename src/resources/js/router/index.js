import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../pages/Dashboard'
import toast from 'izitoast'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/post/:post',
			name: 'post.show',
			component: ({
				render() {},
				mounted() {
					window.livewire.on('togglePublished', message => {
						toast.show({
							title: '',
							message: message,
							icon: 'far fa-check-circle',
							displayMode: 'replace',
							position: 'bottomCenter',
							image: null,
							balloon: false,
							progressBar: false,
							timeout: 2200,
							layout: 2,
							theme: 'dark',
						})
					})
				}
			}),
		},
		{
			path: '/dashboard',
			name: 'dashboard',
			component: Dashboard,
		},
	]
})

router.beforeEach((to, from, next) => {
	console.log(to,  from)
	
	next()
})

export default router
