<template>
    <v-simple-table fixed-header height="500px" dark>
      <template v-slot:default>
        <thead>
        <tr>
          <th class="text-left">Catégories</th>
          <th class="text-left">Contenu</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="cat in categories" :key="cat.id">
          <td v-bind:key="cat.catName">{{ cat.catName }}</td>
          <td v-bind:key="cat.eterContents">
<!--            <span v-for="content in cat.eterContents">{{ cat.userLogin }}</span>-->
            {{ cat.eterContents }}
          </td>
        </tr>
        </tbody>
      </template>
    </v-simple-table>

</template>

<script>
export default {
  name: "ArrayCategorie",
  props: ['categories']
}
</script>

<style scoped>

</style>