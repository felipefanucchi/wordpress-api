<template>
    <div class="carro" v-if="carro">
        <figure>
            <img :src="carro.acf.foto" :alt="carro.titulo">
        </figure>
        <ul>
            <li>{{carro.titulo}}</li>
            <li>Portas: {{carro.acf.portas}}</li>
            <li>Valor: R${{carro.acf.preco}}</li>
            <li v-if="carro.acf.novo">Zero KM</li>
            <li v-else>Semi-novo</li>
        </ul>
    </div>
</template>
<script>
import { API_URL } from '../main';

export default {
    name: 'Carro',
    props: {
        modelo: String
    },
    data() {
        return {
            carro: ''
        }
    },
    methods: {
        fetchCarro(modelo) {
            fetch(API_URL.concat(`carro/${modelo}/`))
                .then(response => response.json())
                .then(body => {
                    this.carro = body;
                })
                .catch(() => this.carro = 'Erro ao trazer o carro, tente novamente.');
        }
    },
    watch: {
        modelo: function(novoValor) {
            this.fetchCarro(novoValor);
        }
    }
}
</script>
<style scoped css>
    .carro {
        border-radius: 4px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .3);   
    }

    .carro figure {
        padding-bottom: 56.25%;
        height: 0;
        margin: 0;
        position: relative;
    }

    .carro img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0; 
    }

    .carro ul {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
    }

    .carro li {
        flex: 0 1 50%;
        list-style: none;
        border: 1px solid #ccc;
        margin: -1px;
        font-family: 'IBM Plex Mono';
        padding: 5px 10px;
        box-sizing: border-box;
    }


</style>


