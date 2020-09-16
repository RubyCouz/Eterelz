<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Intitulé</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="state in status" :key="state.id">
        <td v-bind:key="state.stateName">{{ state.stateName }}</td>

      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayStatus",
  props: ['status']
}
</script>

<style scoped>

</style>