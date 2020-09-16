<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Titres</th>
        <th class="text-left">Joueurs</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="game in games" :key="game.id">
        <td v-bind:key="game.gameName">{{ game.gameName }}</td>
        <td v-bind:key="game.eterUsers">
          <span v-for="user in game.eterUsers">{{ game.userLogin }}</span>
        </td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayGame",
  props: ['games'],
}
</script>

<style scoped>

</style>