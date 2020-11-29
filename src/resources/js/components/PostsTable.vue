<template>
  <div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Publication date</th>
        <th>Publish</th>
      </tr>
      </thead>
      <tbody>
      <tr v-if="loading">
        <td class="text-center" colspan="4">
          <div class="spinner-border text-black" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </td>
      </tr>
      <tr v-for="post in posts" v-else
          :key="post.id">
        <td class="text-center">{{ post.id }}</td>
        <td><a :href="`/post/${post.slug}`">{{ post.title }}</a></td>
        <td class="text-center">{{ post.published_at }}</td>
        <td class="text-center">
          <label class="switcher-control switcher-control-lg">
            <input type="checkbox"
                   class="switcher-input"
                   id="publish"
                   name="publish"
                   :checked="post.is_published">
            <span class="switcher-indicator"></span>
          </label>
        </td>
      </tr>
      </tbody>
    </table>
  
    <div v-if="links.length" class="d-flex justify-content-center">
      <nav>
        <ul class="pagination">
          <li v-for="(link, index) in links"
              :key="index"
              :aria-disabled="!link.url"
              :aria-label="link.label"
              class="page-item"
              :class="{ 'disabled': !link.url }">
          <span :aria-hidden="true"
                class="page-link" v-if="!link.url" v-html="link.label"></span>
            <a :href="link.url" class="page-link" v-else v-html="link.label" @click.prevent="goToPage(link.url)"></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>
<script>
  import { mapActions, mapGetters } from 'vuex'
  
  export default {
    name: 'PostsTable',
    data: () => ({
      loading: false,
      page: 1,
      links: [],
    }),
    methods: {
      ...mapActions(['getPosts']),
      
      async goToPage(url) {
        const page = parseInt(url.split('?')[1].match(/page=([0-9]+)/)[1])
        
        this.loading = true
        
        const response = await this.getPosts({
          page,
        })
        
        this.loading = false
        
        this.links = response.data.links
      }
    },
    computed: {
      ...mapGetters(['posts']),
    },
    async mounted() {
      const { page } = this
      
      this.loading = true
      
      const response = await this.getPosts({
        page,
      })
      
      this.loading = false
      
      this.links = response.data.links
    },
  }
</script>
