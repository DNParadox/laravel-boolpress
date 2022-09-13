<template>
    <div class="container">
      <div class="row row-cols-3 mt-3">
        <div v-for="post in posts" :key="post.id" class="col">
          <div class="card mt-4" style="width: 22rem;height: 180px;">
            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
            <div class="card-body">
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text">{{ getSlicedText(post.content) }}</p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
        </div>
      </div>
      <nav aria-label="Page" class="mt-5">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{'disabled' : currentPaginationPage == 1}">
          <a class="page-link" href="#" @click.prevent="getAxiosJson(currentPaginationPage - 1)">Previous</a>
        </li>
        <li class="page-item" :class="{'active' : currentPaginationPage == n}" v-for="n in totalPaginationPage" :key="n" >
          <a class="page-link" href="#" @click.prevent="getAxiosJson(n)">{{ n }}</a>
        </li>
        <li class="page-item" :class="{'disabled' : currentPaginationPage == totalPaginationPage}">
          <a class="page-link" href="#" @click.prevent="getAxiosJson(currentPaginationPage + 1)">Next</a>
        </li>
      </ul>
    </nav>
    </div>
    
    </template>
    
    <script>
    export default {
      name: 'Posts',
      
      data() { 
        return{
          posts: [],
          totalPaginationPage: null,
          currentPaginationPage: 1,
        }   
      },
      mounted(){
        this.getAxiosJson();
      },
      methods: {
        
        getAxiosJson(PageNumber){
          axios.get('http://127.0.0.1:8000/api/posts', {
            params: {
              page: PageNumber,
            }
          })
          .then((response)=>{
            this.posts = response.data.results.data;
            // console.log(response.data.results);
            this.totalPaginationPage = response.data.results.last_page;
            this.currentPaginationPage = response.data.results.current_page;
          })
        },
        // Taglia il testo se più lungo di 120 caratteri 
        getSlicedText(text){
          
          if(text.length > 120){
            text = text.slice(0, 120) + '...';
          }
          return text;
        }
      }
    }
    </script>
  