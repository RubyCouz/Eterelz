<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Type</th>
        <th class="text-left">Joueurs</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="gameplay in gameplays" :key="gameplay.id">
        <td v-bind:key="gameplay.gameplayType">{{ gameplay.gameplayType }}</td>

      </tr>
      </tbody>
    </template>
  </v-simple-table>

</template>

<script>
export default {
  props: ['gameplays'],
}

</script>