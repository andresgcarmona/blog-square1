<template>
  <tr>
    <td class="text-center">{{ post.id }}</td>
    <td><a :href="`/post/${post.slug}`">{{ post.title }}</a></td>
    <td class="text-center">{{ post.published_at }}</td>
    <td class="text-center">
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
    
        await this.togglePublishPost(post)
    
        this.updating = false
      },
    }
  }
</script>
