import Vue from 'vue'
import ExampleComponent from './components/ExampleComponent'

document.addEventListener('DOMContentLoaded', () => {
  const element = document.getElementById('app');

  new Vue({
    el: element,
    components: {
      ExampleComponent,
    },
    created: function () {
    },
    watch: {
    },
    mounted: function () {
    },
    methods: {
    }
  })
});


