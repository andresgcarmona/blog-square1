<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">My posts</div>
          
          <div class="card-body">
            <div class="table-responsive">
              <posts-table></posts-table>
            </div>
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
