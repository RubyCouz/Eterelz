<template>
  <v-simple-table v-if="streamers">
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Login</th>
        <th class="text-left">Url</th>
        <th class="text-left">Plate-forme de Stream</th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="streamer in streamers" :key="streamer.id">
        <td v-bind:key="streamer.eterUser">{{ streamer.eterUser }}</td>
        <td v-bind:key="streamer.streamUrl">{{ streamer.streamUrl }}</td>
        <td v-bind:key="streamer.streamSupport">{{ streamer.streamSupport }}</td>

      </tr>
      </tbody>
    </template>
  </v-simple-table>

</template>

<script>
export default {
  props: ['streamers'],
}

</script>