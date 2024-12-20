<template>
  <Layout>
    <div v-for="(item, index) in 3" :key="index">
      <Post />
    </div>
  </Layout>
</template>


<script>
import Layout from "@/Pages/layout/desktop.vue";
import Post from "@/Pages/post/post.vue";

export default {
  name: "index",
  components: {
    Layout,
    Post,
  },
  // props: {
  //     PostData: Array,
  //     LikePost: Array,
  //     UserData: Object,
  //     FileData: Object,
  //     flash: Object,
  //     FriendList: Object
  // },
  // data() {
  //     return {
  //         success: null,
  //     };
  // },
  // computed: {
  //     processedPosts() {
  //         // Map PostData and add a "liked" property
  //         return this.PostData.map((post) => ({
  //             ...post,
  //             liked: this.LikePost.some(
  //                 (like) => like.post_id === post.post_id
  //             ),
  //             files: this.FileData.filter((file) => file.post_id === post.post_id),
  //             poster_profile: `/img/default-avatar.png`, // Set default profile picture
  //         }));
  //     },
  // },
  // methods: {
  //     formatTimeAgo(timestamp) {
  //         return moment(timestamp).fromNow(); // Convert to "time ago"
  //     },

  // },
  // mounted () {
  //     let images =  this.ImageData.some((image) => image.post_id == 25)
  //     console.log(images);

  // }
};
</script>

<style scoped>
</style>
