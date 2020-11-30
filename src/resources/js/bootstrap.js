import Popper from 'popper.js'
import $ from 'jquery'
import 'bootstrap'
import axios from 'axios'

window.Popper = Popper
window.$      = window.jQuery = $
window.axios  = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
window.axios.defaults.baseURL                            = '/api/'

if(window.token) {
	window.axios.defaults.headers.common['Authorization'] = `Bearer ${window.token}`
}
