<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Tag</th>
        <th class="text-left">Joueurs</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="label in labels" :key="label.id">
        <td v-bind:key="label.labelName">{{ label.labelName }}</td>
        <td v-bind:key="label.eterUsers">
          <span v-for="user in label.eterUsers">{{ user.userLogin }}</span>
        </td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>

</template>

<script>
export default {
  props: ['labels'],
}

</script>