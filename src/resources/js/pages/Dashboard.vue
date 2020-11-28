<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">My posts</div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts">
                  <td>{{ post.title }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Dashboard',
    data() {
      return {
        posts: [],
      }
    },
  }
</script>
