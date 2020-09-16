/* assets/component/App.vue */
<template>
  <div id="app">
    <h1 class="white-text">Interface Admin</h1>
    <admin-interface></admin-interface>
  </div>
</template>

<script>
import AdminInterface from "./AdminInterface";

export default {
  components: {
    AdminInterface
  },

}
</script>