<template>
    <div>
        <v-slide-group-item
      >
      <v-card
      class="mx-1"
      color="surface-variant"
      width="200px"

    >
    <div class="m-2 mb-0">
        <img :src="`/img/mike.jpg`" class="w-full rounded-md" alt="">
        <div class="mt-1">
            {{ Name }}
        </div>
    </div>
      <template v-slot:actions>
        <v-btn
          append-icon="mdi-chevron-right"
          color="blue-lighten-2"
          :text="button"
          variant="outlined"
          block
          @click="request"
        ></v-btn>
      </template>
    </v-card>
      </v-slide-group-item>
    </div>
</template>

<script>
export default{
    name: 'friendcard',
    props: {
        Name: String
    },
    data () {
        return {
            button: 'Add Friend'
        }
    },
    methods: {
        request () {
            this.button = this.button == 'Cancel Request' ? 'Add Friend' : 'Cancel Request'
        }
    }
}

</script>

<style lang="stylus" scoped>

</style>
