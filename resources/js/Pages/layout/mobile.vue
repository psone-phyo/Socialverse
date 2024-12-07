<template>
    <v-app >
      <!-- Top Navigation Bar -->
      <v-card >
    <v-layout class="bg-black">
      <v-app-bar
        color="black"
        prominent
      >
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title>My files</v-toolbar-title>

        <v-spacer></v-spacer>
        <div class=" mr-5 flex items-center justify-between gap-5">
            <button ><i class="fa-solid fa-magnifying-glass text-lg"></i></button>
            <button ><i class="fa-solid fa-comment-sms text-xl"></i></button>
        </div>

      </v-app-bar>

      <v-navigation-drawer
        v-model="drawer"
        :location="undefined"
        temporary
        color="black"
      >
        <v-list>
            <button class="hover:bg-dark border border-white w-full p-1">
                Setting
            </button>
            <hr class="w-3/4 mx-auto mb-2">

            <button class="hover:bg-dark border border-white w-full p-1">
                Setting
            </button>
            <hr class="w-3/4 mx-auto mb-2">

            <button class="hover:bg-dark border border-white w-full p-1">
                Setting
            </button>
            <hr class="w-3/4 mx-auto mb-2">

        </v-list>
      </v-navigation-drawer>
      <v-main class="mt-1">
        <slot></slot>
      </v-main>
    </v-layout>
  </v-card>

      <!-- Main Content -->


      <!-- Bottom Navigation Bar -->
        <v-bottom-navigation color="primary" active class="bg-black">
          <v-btn>
            <i class="fa-solid fa-house text-lg"></i>
            Home
          </v-btn>
          <v-btn>
            <i class="fa-solid fa-plus text-lg"></i>
            Create
          </v-btn>
          <v-btn>
            <i class="fa-solid fa-bell text-lg"></i>
            Notification
          </v-btn>
          <v-btn>
            <i class="fa-solid fa-circle-user text-lg"></i>
            Profile
          </v-btn>
        </v-bottom-navigation>
    </v-app>
  </template>


<script>
export default {
    name: 'mobile',
    data () {
        return {
            items : ['hi','hello'],
            drawer: false
        }
    },
};
</script>

<style lang="stylus" scoped></style>
