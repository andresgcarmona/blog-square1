import axios from 'axios'

const fetchPosts = async ({ page }) => {
	try {
		return await axios.get('/posts', {
			params: {
				page,
			},
		})
	}
	catch(e) {
		throw e
	}
}

export {
	fetchPosts,
}
