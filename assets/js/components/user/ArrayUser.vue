<template>
  <v-simple-table fixed-header height="500px" dark v-show="users">
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Photo de profil</th>
        <th class="text-left">Login</th>
        <th class="text-left">Email</th>
        <th class="text-left">Discord</th>
        <th class="text-left">Stream</th>
        <th class="text-left">Clan</th>
        <th></th>
      </tr>
      </thead>
      <tbody>

      <tr v-for="user in users" :key="user.id">
        <td v-bind:key="user.userAvatar">
          <v-avatar>
            <v-img :src="'img/upload/profil_pic/' + user.userAvatar"></v-img>
          </v-avatar>
        </td>
        <td v-bind:key="user.userLogin">{{ user.userLogin }}</td>
        <td v-bind:key="user.userMail">{{ user.userMail }}</td>
        <td v-bind:key="user.userDiscord">{{ user.userDiscord }}</td>
        <td v-bind:key="user.userStream">
          <span v-for="stream in user.userStream">{{ stream.userStream }}</span>
        </td>
        <td v-bind:key="user.userClan">
          <span v-for="clan in user.userClan">{{ clan.clanName }}</span>
        </td>
        <td class="justify-center layout px-0">
          <v-btn icon class="mx-0" @click="$emit('editUser', user.id)">
            <v-icon class="teal-text">edit</v-icon>
          </v-btn>
          <v-btn icon class="mx-0" @click="delUser(user.id)">
            <v-icon class="pink-text">delete</v-icon>
          </v-btn>
        </td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>

</template>


<script>
import EditUser from "./EditUser";
export default {
  props: ['users'],
  components: {
    EditUser,
  },
  data() {
    return {
      user: this.user
    }
  },
  methods: {
    editUser(id) {
      axios
          .get('http://localhost:8000/api/eter_users/' + id)
          .then(response => (this.user = response.data))
      return $emit(this.user)
    },
    delUser(id) {
      alert(id)
    }
  }
}

</script>