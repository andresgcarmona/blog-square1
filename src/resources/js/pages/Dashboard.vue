<template>
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
      <div class="card">
        <div class="card-header">My posts</div>
        
        <div class="card-body">
          <div class="mb-4">
            <a href="/post/create" class="btn btn-outline-primary">Create post</a>
          </div>
          
          <div class="table-responsive">
            <posts-table></posts-table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import PostsTable from '../components/PostsTable'
  export default {
    name: 'Dashboard',
    components: {
      PostsTable,
    },
  }
</script>
