<template>
  <v-container fluid>
    <v-row no-gutters>
      <v-col
          sm="2"
      >
        <div>
          <v-expansion-panels
              :popout="true"
              :focusable="true"
              :hover="true"
              :flat="true"
              :dark="true"
          >
            <v-expansion-panel>
              <v-expansion-panel-header><i class="fas fa-user-friends"></i>Social</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-list
                    :dense="true"
                >
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="usersList">
                          <i class="fas fa-user"></i>Utilisateur
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="labelsList">
                          <i class="fas fa-user-tag"></i>Rôles
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="clansList">
                          <i class="fas fa-users"></i>Clan
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="gameplaysList">
                          <i class="fas fa-chess-knight"></i>Gameplay
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="streamersList">
                          <i class="fab fa-twitch"></i>Streamer
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel>
              <v-expansion-panel-header><i class="fas fa-gamepad"></i>Jeux</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-list
                    :dense="true"
                >
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="gamesList">
                          <i class="fas fa-gamepad"></i>Jeux
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="gendersList">
                          <i class="fas fa-database"></i>Genre
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel>
              <v-expansion-panel-header><i class="fas fa-calendar-alt"></i>Événements</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-list
                    :dense="true"
                >
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="eventsList">
                          <i class="fas fa-calendar-alt"></i>Événements
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel>
              <v-expansion-panel-header><i class="fas fa-newspaper"></i>Publications</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-list
                    :dense="true"
                >
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="categoriesList">
                          <i class="fas fa-folder-open"></i>Catégories
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="commentsList">
                          <i class="fas fa-comments"></i>Commentaires
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="contentsList">
                          <i class="fas fa-inbox"></i>Contenus
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title>
                        <v-btn text small v-on:click="stateList">
                          <i class="fas fa-question"></i>Status
                        </v-btn>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
        </div>
      </v-col>
      <v-col sm="1"></v-col>
      <v-col
          sm="9"
      >
        <array-user :users="users" v-show="users">
          <!--affichage du contenu-->
        </array-user>
        <array-role :labels="labels" v-show="labels">

        </array-role>
        <array-clan :clans="clans" v-show="clans">

        </array-clan>
        <array-gameplay :gameplays="gameplays" v-show="gameplays">

        </array-gameplay>
        <array-streamer :streamers="streamers" v-show="streamers">

        </array-streamer>
        <array-game :games="games" v-show="games">

        </array-game>
        <array-gender :genders="genders" v-show="genders"></array-gender>
        <array-event :events="events" v-show="events"></array-event>
        <array-categorie :categories="categories" v-show="categories"></array-categorie>
        <array-comment :comments="comments" v-show="comments"></array-comment>
        <array-content :contents="contents" v-show="contents"></array-content>
        <array-status :status="status" v-show="status"></array-status>
        <edit-user v-show="user">

        </edit-user>
      </v-col>
    </v-row>
  </v-container>

</template>

<script>

import ArrayRole from "./role/ArrayRole";
import ArrayUser from "./user/ArrayUser";
import ArrayClan from "./clan/ArrayClan";
import ArrayGameplay from "./gameplay/ArrayGameplay";
import ArrayStreamer from "./streamer/ArrayStreamer";
import ArrayGame from "./game/ArrayGame";
import ArrayGender from "./gender/ArrayGender";
import ArrayEvent from "./event/ArrayEvent";
import ArrayComment from "./comment/ArrayComment";
import ArrayCategorie from "./categorie/ArrayCategorie";
import ArrayContent from "./content/ArrayContent";
import ArrayStatus from "./status/ArrayStatus";
import EditUser from "./user/EditUser";
export default {
  name: "AdminInterface",
  data() {
    return {
      user: this.user,
      users: this.users,
      labels: this.labels,
      clans: this.clans,
      gameplays: this.gameplays,
      streamers: this.streamers,
      games: this.games,
      genders:this.genders,
      events: this.events,
      categories: this.categories,
      comments: this.comments,
      contents: this.contents,
      status: this.status,
      // array: this.array,
    }
  },
  components:
      {
        ArrayUser,
        ArrayRole,
        ArrayClan,
        ArrayGameplay,
        ArrayStreamer,
        ArrayGame,
        ArrayGender,
        ArrayEvent,
        ArrayCategorie,
        ArrayComment,
        ArrayContent,
        ArrayStatus,
        EditUser
      }
  ,
  methods: {
    // showArray: function (array) {
    //   axios
    //       .get('http://localhost:8000/api/' + array)
    //       .then(response => (this.array = response.data))
    //   return this.array
    // }
    // affichage des données
    usersList: function () {
      axios
          .get('http://localhost:8000/api/eter_users')
          .then(response => (this.users = response.data))
      this.labels = null
      this.clans = null
      this.gameplays = null
      this.steamers = null
      this.genders = null
      this.comments = null
      this.contents = null
      this.status = null
      this.categories = null
      this.events = null
      return this.users
    },
    labelsList: function () {
      axios
          .get('http://localhost:8000/api/eter_labels')
          .then(response => (this.labels = response.data))
      this.users = null
      this.clans = null
      this.gameplays = null
      this.streamers = null
      this.genders = null
      this.comments = null
      this.contents = null
      this.status = null
      this.categories = null
      this.events = null
      return this.labels
    },
    clansList: function () {
      axios
          .get('http://localhost:8000/api/eter_clans')
          .then(response => (this.clans = response.data))
      this.labels = null
      this.gameplays = null
      this.streamers = null
      this.users = null
      this.gender = null
      this.comments = null
      this.contents = null
      this.state = null
      this.categories = null
      return this.clans
    },
    gameplaysList: function () {
      axios
          .get('http://localhost:8000/api/eter_gameplays')
          .then(response => (this.gameplays = response.data))
      this.clans = null
      this.labels = null
      this.streamers = null
      this.users = null
      this.gender = null
      this.comments = null
      this.contents = null
      this.state = null
      this.categories = null
      return this.gameplays
    },
    streamersList: function () {
      axios
          .get('http://localhost:8000/api/eter_streamers')
          .then(response => (this.streamers = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.genders = null
      this.comments = null
      this.contents = null
      this.status = null
      this.categories = null
      this.genders = null
      this.events = null
      return this.streamers
    },
    gamesList: function () {
      axios
          .get('http://localhost:8000/api/eter_games')
          .then(response => (this.games = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.gender = null
      this.comments = null
      this.contents = null
      this.state = null
      this.categories = null
      return this.games
    },
    gendersList: function () {
      axios
          .get('http://localhost:8000/api/eter_genders')
          .then(response => (this.genders = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.comments = null
      this.contents = null
      this.status = null
      this.categories = null
      this.events = null
      return this.genders
    },
    eventsList: function () {
      axios
          .get('http://localhost:8000/api/eter_events')
          .then(response => (this.events = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.genders = null
      this.comments = null
      this.contents = null
      this.status = null
      this.categories = null
      this.events = null
      return this.events
    },
    categoriesList: function () {
      axios
          .get('http://localhost:8000/api/eter_categories')
          .then(response => (this.categories = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.genders = null
      this.events = null
      this.comments = null
      this.contents = null
      this.status = null
      return this.categories
    },
    commentsList: function () {
      axios
          .get('http://localhost:8000/api/eter_comments')
          .then(response => (this.comments = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.genders = null
      this.events = null
      this.categories = null
      this.status = null
      this.contents = null
      return this.comments
    },
    contentsList: function () {
      axios
          .get('http://localhost:8000/api/eter_contents')
          .then(response => (this.contents = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.genders = null
      this.events = null
      this.categories = null
      this.comments = null
      this.status = null
      return this.contents
    },
    stateList: function () {
      axios
          .get('http://localhost:8000/api/eter_states')
          .then(response => (this.status = response.data))
      this.clans = null
      this.gameplays = null
      this.labels = null
      this.users = null
      this.streamers = null
      this.games = null
      this.genders = null
      this.events = null
      this.categories = null
      this.comments = null
      this.contents = null
      return this.status
    },
    // update des données
    editUser: function($event) {
      axios
          .get('http://localhost:8000/api/eter_users/' + $event)
          .then(response => (this.user = response.data))
      return this.user
    },

  },
}
</script>

<style scoped>

</style>