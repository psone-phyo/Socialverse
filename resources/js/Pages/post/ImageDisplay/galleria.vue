<template>
<Galleria
                    :value="images"
                    :responsiveOptions="responsiveOptions"
                    :numVisible="5"
                    :circular="true"
                    containerStyle="max-width: 640px"
                >
                    <template #item="slotProps">
                        <!-- <img
                            :src="slotProps.item.file_path"
                            alt="image"
                            style="width: 100%"
                            class="h-[300px] object-contain cursor-pointer"
                            @click="handleTouchStart($event)"
                        /> -->
                        <div class="card flex justify-center">
                            <Image
                                :src="slotProps.item.file_path"
                                alt="image"
                                style="width: 100%"
                                class="h-[300px] object-contain cursor-pointer"
                                @click="handleTouchStart($event)"
                                preview
                            />
                        </div>
                    </template>
                    <template #thumbnail="slotProps">
                        <div v-show="files.length > 1">
                            <img
                                :src="slotProps.item.file_path"
                                alt="image"
                                style="width: 100%"
                                class="object-contain"
                            />
                        </div>
                    </template>
                </Galleria>
</template>

<script setup>
import Galleria from 'primevue/galleria';
import Image from 'primevue/image';
import {ref} from 'vue';

const props = defineProps({
    images: {
        type: Object,
        required: true
    }
});

const responsiveOptions = ref([
    {
        breakpoint: "1920px",
        numVisible: 4,
    },
    {
        breakpoint: "575px",
        numVisible: 1,
    },
]);
</script>

<style lang="stylus" scoped>

</style>
