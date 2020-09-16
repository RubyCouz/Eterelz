<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Genres</th>
        <th class="text-left">Jeux</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="gender in genders" :key="gender.id">
        <td v-bind:key="gender.genderName">{{ gender.genderName }}</td>
        <td v-bind:key="gender.eterGames">
          <span v-for="user in gender.eterGames">{{ gender.gameName }}</span>
        </td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayGender",
  props: ['genders']
}
</script>

<style scoped>

</style>