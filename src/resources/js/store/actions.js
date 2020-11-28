import { fetchPosts } from './api'

const getPosts = async({ commit }, payload) => {
	const { page } = payload
	
	try {
		const response = await fetchPosts(payload)
		
		commit('SET_POSTS', response.data.data)
		
		return response
	}
	catch(e) {
		console.error(e)
	}
}

export default {
	getPosts,
}
