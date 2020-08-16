<template>
  <v-app id="inspire">
    <v-navigation-drawer
            v-model="drawer"
            app
    >
      <v-list dense>
        <!-- Dashboard -->
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Boards</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- Reports -->
        <v-list-item link>
          <v-list-item-action>
            <v-icon></v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Reports</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar
            app
            color="indigo"
            dark
            dense
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>
    <v-main>
      <Dashboard></Dashboard>
    </v-main>
    <v-footer
            color="indigo"
            app
    >
      <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
  import Dashboard from "./components/dashboard/Board";
  export default {
    components: {
      Dashboard
    },
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
  }
</script>