<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Bannière</th>
        <th class="text-left">Nom du clan</th>
        <th class="text-left">Effectif</th>
        <th class="text-left">Discord</th>
        <th class="text-left">Devise</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="clan in clans" :key="clan.id">
        <td v-bind:key="clan.clanBan">
          <v-img :src="'img/upload/ban/' + clan.clanBan" aspect-ratio="1.7"></v-img>
        </td>
        <td v-bind:key="clan.clanName">{{ clan.clanName }}</td>
        <td v-bind:key="clan.clanMembers">{{ clan.clanMembers }}</td>
        <td v-bind:key="clan.clanDiscord">{{ clan.clanDiscord }}</td>
        <td v-bind:key="clan.clanDevise">{{ clan.clanDevise }}</td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>

</template>

<script>
export default {
  props: ['clans'],
}

</script>