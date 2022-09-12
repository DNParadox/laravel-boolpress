<template>
    <div>
        <a href="/admin">Admin privata</a>
        <div class="container">
            <h1>{{ PostsTitle }}</h1>
            <Posts/>
        </div>
    </div>
</template>


<script>
    import Posts from "../components/Posts.vue";
    
    export default {
      name: 'App',
      components: {
        Posts,    
      },
      data() { 
        return{
          PostsTitle: 'Lista dei miei Post',
        }   
      },
    }
  </script>