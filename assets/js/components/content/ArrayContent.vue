<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Date de publication</th>
        <th class="text-left">Date de modification</th>
        <th class="text-left">Publié par</th>
        <th class="text-left">Titre</th>
        <th class="text-left">Contenu de la publication</th>
        <th class="text-left">Images</th>
        <th class="text-left">Catégorie</th>
        <th class="text-left">Status</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="content in contents" :key="content.id">
        <td v-bind:key="content.contentDate">{{ content.contentDate | formatDate('DD/MM/YYYY') }}</td>
        <td v-bind:key="content.contentUpdate">{{ content.contentUpdate | formatDate('DD/MM/YYYY') }}</td>
        <td v-bind:key="content.contentUser">{{ content.contentUser }}</td>
        <td v-bind:key="content.contentName">{{ content.contentName }}</td>
        <td v-bind:key="content.contentText">{{ content.contentText }}</td>
        <td v-bind:key="content.contentPic">{{ content.contentPic }}</td>
        <td v-bind:key="content.contentCat">{{ content.contentCat }}</td>
        <td v-bind:key="content.contentState">{{ content.contentState }}</td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayContent",
  props: ['contents'],
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