<template>
  <div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Title</th>
        <th>Publication date</th>
        <th>Publish</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="post in posts"
          :key="post.id">
        <td>{{ post.title }}</td>
        <td>{{ post.published_at }}</td>
        <td></td>
      </tr>
      </tbody>
    </table>
  
    <div v-if="links.length">
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
        
        await this.getPosts({
          page,
        })
        
        this.loading = false
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
