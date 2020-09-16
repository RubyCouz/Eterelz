<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Date</th>
        <th class="text-left">Publié par</th>
        <th class="text-left">Commentaire</th>
        <th class="text-left">Contenu commenté</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="comment in comments" :key="comment.id">
        <td v-bind:key="comment.comDate">{{ comment.comDate | formatDate('DD/MM/YYYY') }}</td>
        <td v-bind:key="comment.comUser">{{ comment.comUser }}</td>
        <td v-bind:key="comment.comContent">{{ comment.comContent }}</td>
        <td v-bind:key="comment.contentCom">{{ comment.contentCom }}</td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayComment",
  props: ['comments'],
  filters: {
    // formatage de la date
    formatDate(value) {
      if (value) {
        return moment(String(value)).format('DD/MM/YYYY');
      }
    }
  },
}
</script>

<style scoped>

</style>