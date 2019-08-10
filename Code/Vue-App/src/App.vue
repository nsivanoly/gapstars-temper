<template>
  <div id="app" class="container">
    <keep-alive>
      <component :is="currentView"></component>
    </keep-alive>
  </div>
</template>

<script>
  import Chart from './components/Chart.vue'

  export default {
    name: 'app',
    data () {
      return {
        selected: 'chart',
        currentView: 'chart'
      }
    },
    components: {
      chart: Chart
    },
    methods: {
      activate (elem) {
        this.selected = elem
      },
      handler () {
        for (const arg of arguments) {
          if (arg instanceof Function) {
            arg()
          }
        }
      },
      select (elem) {
        this.currentView = elem;
        this.activate(elem)
      }
    }
  }
</script>
