<template>
  <div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th class="d-none d-md-inline">Id</th>
        <th>Title</th>
        <th class="sortable text-center cursor-pointer user-select-none" @click="sortBy('published_at')">
          <i class="fas d-inline-block mr-2"
          :class="{ 'fa-angle-down': sortedBy['published_at'], 'fa-angle-up': !sortedBy['published_at'] }"></i> Publication date
        </th>
        <th class="d-none d-md-inline">Publish</th>
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
          :key="post.id"
          :post="post"
          is="post-row"></tr>
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
  import PostRow from './PostRow'
  
  export default {
    name: 'PostsTable',
    components: {
      PostRow,
    },
    data: () => ({
      loading: false,
      page: 1,
      links: [],
      sortedBy: {
        published_at: true,
      },
    }),
    methods: {
      ...mapActions(['getPosts']),
      
      async sortBy(field) {
        this.sortedBy[field] = !this.sortedBy[field]
        
        await this.load()
      },
      async load() {
        const { page, sortedBy } = this
        
        this.loading = true
  
        const response = await this.getPosts({
          page,
          sortedBy,
        })
  
        this.loading = false
  
        this.links = response.data.meta ? response.data.meta.links : response.data.links
      },
      async goToPage(url) {
        this.page = parseInt(url.split('?')[1].match(/page=([0-9]+)/)[1])
        
        await this.load()
      },
    },
    computed: {
      ...mapGetters(['posts']),
    },
    async mounted() {
      await this.load()
    },
  }
</script>

<style scoped lang="scss">
  table {
    thead {
      th {
        &.sortable {
          cursor: pointer;
        }
      }
    }
  }
</style>
