<template>
    <div class=" bg-slate-900 p-1 rounded-md mt-5">
        <h2 class="p-1 w-1/2 text-sky-500">Friend Suggestion</h2>
    <div class="flex justify-start items-center gap-2 flex-wrap">
    <v-sheet
    class="mx-auto"
    elevation="8"
    max-width="800"
  >
    <v-slide-group
      class="pa-4 bg-black"
      show-arrows
    >
    <div v-for="(data,index) in FriendList" :key="index">
        <FriendCard :Name="data.name"/>
    </div>
    </v-slide-group>
  </v-sheet>

  </div>
    </div>

</template>

<script>
import FriendCard from '@/Pages/friendlist/friendcard.vue'
export default {
    name: 'list',
    props: {
        FriendList: Array
    },
    components: {
        FriendCard
    },
};
</script>

<style lang="stylus" scoped></style>
