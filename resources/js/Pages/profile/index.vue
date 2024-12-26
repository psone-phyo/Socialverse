<template>
    <Layout>
        <div class="min-h-screen mt-2 w-full">
        <Card>
            <template #title>Profile</template>
            <template #content>
                <div class="flex justify-between items-center gap-1 py-3">
                    <div>
                        <img
                            :src="`/img/anime3.png`"
                            alt=""
                            class="w-full rounded-circle"
                        />
                    </div>

                    <div class="flex justify-evenly items-center">
                    <div
                        style="width: 150px; height: 150px"
                        class="text-center flex flex-column"
                    >
                        <div class="" style="height: 100px">
                            <i
                                class="fa-solid fa-users-line"
                                style="font-size: 4rem"
                            ></i>
                        </div>
                        <hr />
                        <div class="mt-2">
                            <p>Friends</p>
                            <p>20</p>
                        </div>
                    </div>

                    <div
                        style="width: 150px; height: 150px"
                        class="text-center flex flex-column"
                    >
                        <div style="height: 100px">
                            <i
                                class="fa-regular fa-id-badge"
                                style="font-size: 4rem"
                            ></i>
                        </div>
                        <hr />
                        <div class="mt-2">
                            <p>Posts</p>
                            <p>20</p>
                        </div>
                    </div>
                </div>

                </div>
                <div class="flex justify-center gap-2 my-5 w-full">
                    <div class="w-full" >
                        <Button class="w-full" label="Edit Profile" icon="pi pi-user" severity="info" />
                    </div>
                    <div class="w-full">
                        <Link :href="route('post')" class="w-full" >
                        <Button class="w-full" label="Create Post" icon="pi pi-plus" severity="info"/>
                        </Link>
                    </div>

                </div>

                <div class="card ">
            <Tabs value="0">
                <TabList>
                    <Tab value="0" class="w-1/2">My Posts</Tab>
                    <Tab value="1" class="w-1/2">My Gallery</Tab>
                </TabList>
                <TabPanels class="flex justify-center">
                    <TabPanel value="0">
                        <div v-for="(post, index) in processedPosts()"
                        :key="index">
                        <Post :content="post.content"
                                    :files="post.files"
                                    :liked="post.liked"
                                    :time="formatTimeAgo(post.created_at)"
                                    :poster_id="post.poster_id"
                                    :poster_name="post.poster_name"
                                    :poster_profile="post.poster_profile"
                                    :user_id="props.UserData.id"
                                    :post_id="post.post_id"/>
                        </div>

                    </TabPanel>
                    <TabPanel value="1">
                        <Gallery :images="FileData"/>
                    </TabPanel>
                </TabPanels>
            </Tabs>
            </div>
            </template>
    </Card>
        </div>

    </Layout>
</template>

<script setup>
import moment from 'moment'
import { Link } from '@inertiajs/vue3';
import { onMounted} from 'vue';

import Post from '@/Pages/post/post.vue';
import Layout from '@/Pages/layout/desktop.vue';
import Gallery from '@/Pages/post/gallery.vue';
//primevue
import Card from 'primevue/card';
import Button from 'primevue/button';
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';

const props = defineProps({
    PostData: Array,
    LikePost: Array,
    FileData: Object,
    UserData: Object,
})

const processedPosts = () => {
        // Map PostData and add a "liked" property
        return props.PostData.map((post) => ({
            ...post,
            liked: props.LikePost.some(
                (like) => like.post_id === post.post_id
            ),
            files: props.FileData.filter((file) => file.post_id === post.post_id),
            poster_profile: `/img/default-avatar.png`, // Set default profile picture
        }));
    }

const  formatTimeAgo = (timestamp) => {
    return moment(timestamp).fromNow(); // Convert to "time ago"
}


</script>

<style scoped>

</style>
