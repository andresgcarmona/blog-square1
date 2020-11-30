<template>
  <tr>
    <td class="text-center id">{{ post.id }}</td>
    <td><a :href="`/post/${post.slug}`">{{ post.title }}</a></td>
    <td class="text-center">{{ post.published_at }}</td>
    <td class="text-center publish">
      <label class="switcher-control switcher-control-lg">
        <input type="checkbox"
               class="switcher-input"
               id="publish"
               name="publish"
               :checked="post.is_published"
               :disabled="updating"
               @change="togglePublish(post)">
        <span class="switcher-indicator"></span>
      </label>
    </td>
  </tr>
</template>

<script>
  import { mapActions } from 'vuex'
  import toast from 'izitoast'
  
  export default {
    name: 'PostRow',
    props: {
      post: Object,
    },
    data: () => ({
      updating: false,
    }),
    methods: {
      ...mapActions({
        togglePublishPost: 'togglePublish',
      }),
      
      async togglePublish(post) {
        this.updating = true
        
        const response = await this.togglePublishPost(post)
        
        this.updating = false
        
        toast.show({
          title: '',
          message: response.data.message,
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
      },
    },
  }
</script>

<style scoped lang="scss">
td {
  &.id,
  &.publish {
    display: none !important;
  }
}

@media (min-width: 768px) {
  td {
    &.id,
    &.publish {
      display: table-cell !important;
    }
  }
}
</style>
