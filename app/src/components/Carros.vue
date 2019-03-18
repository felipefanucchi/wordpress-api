<template>
  <ul class="carros">
    <li class="carro-item" 
      v-for="carro in carros" 
      :key="carro.slug"
      :class="ativo === carro.slug ? 'ativo' : ''"
      @click="emiteCarro(carro.slug)">
      {{ carro.titulo }} <br>
      Valor: R${{ carro.preco }}
    </li>
  </ul>
</template>

<script>
import { API_URL } from '../main';

export default {
  name: 'Carros',
  props: {
  },
  data() {
    return {
      carros: [],
      ativo: ''
    }
  },
  methods: {
    fetchCarros() {
      fetch(API_URL.concat('carros/'))
        .then(response => response.json())
        .then(body => {
          this.carros = body;
        })
        .catch(() => this.carros = [ 'Houve um erro ao buscar os carros' ])
    },

    emiteCarro(slug) {
      this.$emit('clicked', slug);
      this.ativo = slug;
    }
  },
  created() {
    this.fetchCarros();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped css>
  .carros {
    padding: 0;
  }

  .carros li {
    cursor: pointer;
    list-style: none;
    padding: 20px;
    border-bottom: 1px solid #ccc;
    font-family: 'IBM Plex Mono';
    transition: all linear .2s;
  }

  .carros .carro-item.ativo {
    background: #333;
  }
</style>

