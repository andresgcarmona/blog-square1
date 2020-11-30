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

const togglePublishStatus = async (post) => {
	try {
		return await axios.post(`/post/${post.id}/toggle-publish-status`)
	}
	catch(e) {
		throw e
	}
}

export {
	fetchPosts,
	togglePublishStatus,
}
