<template>
  <div id="app">
    <div class="container-flex">
      <Carros @clicked="exibeCarro"></Carros>
      <Carro :modelo="modelo"></Carro>
    </div>
  </div>
</template>

<script>
import Carros from './components/Carros.vue'
import Carro from './components/Carro.vue'

export default {
  name: 'app',
  components: {
    Carros,
    Carro
  },
  data() {
    return {
      modelo: ''
    }
  },
  methods: {
    exibeCarro(valor) {
      this.modelo = valor;
    }
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=IBM+Plex+Mono');

  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #fff;
  }

  body {
    background-image:linear-gradient(to bottom, #444 60%, #777 100%);
    margin: 0;
    min-height: 100vh;
  }

  .container-flex {
    display: flex; 
    max-width: 990px;
    margin: 20px -15px;
  }

  .carros {
    flex: 0 1 33.33%;
    margin: 0 15px;
  }

  .carro {
    flex: 0 1 66.66%;
    margin: 0 15px;
  }
</style>
