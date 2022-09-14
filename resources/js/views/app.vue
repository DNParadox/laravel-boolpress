<template>
  <div>
    <Header></Header>
    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<!-- Riga 6 chiamiamo il nosto component (Riga 18)  necessario per il funzionamento delle impaginazioni-->
<!-- Riga 23 PostsTitle rendo possibile la dinamicità così da poter cambiare eventualmente più titoli ove necessario -->
<script>
    import Header from '../components/Header.vue';
    
    export default {
      name: 'App',
      components: {
        Header,
      },
    }
  </script>