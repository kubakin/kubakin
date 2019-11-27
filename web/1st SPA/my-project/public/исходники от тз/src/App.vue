<template>
  <div id="app">
    <nav class='navbar navbar-expand-md navbar-light bg-light sticky-top'>
      <div class='container-fluid'>
        <a href="/" class='navbar-brad'>
          <img src='1.png' height="80"></a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#go'>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class='collapse navbar-collapse' id='go'>
          <ul class='navbar-nav ml-auto'>
            <app-nav v-for='i in menu' :url = i.url :page = 'i.page' :key=i.id></app-nav>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>
<script>
export default {
  name: 'app',
  data() {
    return {
    menu: [{id: 1, page:'Main page', url: ''},{id:2, page: 'About me', url: 'about'}]
    }
  }
}

</script>
