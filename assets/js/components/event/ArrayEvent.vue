<template>
  <v-simple-table fixed-header height="500px" dark>
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Date de création</th>
        <th class="text-left">Nom de l'évent</th>
        <th class="text-left">Organisateur</th>
        <th class="text-left">Date</th>
        <th class="text-left">Score</th>
        <th class="text-left">Clan participant</th>
        <th class="text-left">Vainqueur</th>


      </tr>
      </thead>
      <tbody>

      <tr v-for="event in events" :key="event.id">
        <td v-bind:key="event.eventCreation">{{ event.eventCreation | formatDate('DD/MM/YYYY') }}</td>
        <td v-bind:key="event.eventName">{{ event.eventName }}</td>
        <td v-bind:key="event.eventOrga" v-for="user in event.eventOrga">
          {{ user.userLogin }}
        </td>
        <td v-bind:key="event.eventDate">{{ event.eventDate | formatDate('DD/MM/YYYY') }}</td>
        <td v-bind:key="event.eventScore">{{ event.eventScore }}</td>
        <td v-for="clan in event.eterClan">{{ clan.clanName }}</td>
        <td v-bind:key="event.eventWinner">{{ event.eventWinner }}</td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  name: "ArrayEvent",
  props: ['events'],
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