<template>
        <div class="card flex justify-center">
        <Galleria v-model:activeIndex="activeIndex" v-model:visible="displayCustom" :value="props.images" :responsiveOptions="responsiveOptions" :numVisible="7"
            containerStyle="max-width: 850px" :circular="true" :fullScreen="true" :showItemNavigators="true" :showThumbnails="false">
            <template #item="slotProps">
                <img :src="slotProps.item.file_path" alt="image" style="width: 100%; display: block;" class="max-h-screen object-contain"/>
            </template>
        </Galleria>

        <div v-if="props.images" class="grid grid-cols-12 gap-4" style="max-width: 400px">
            <div v-for="(image, index) of props.images" :key="index" class="col-span-4 flex justify-center flex-wrap">
                <img :src="image.file_path" alt="image" style="cursor: pointer;" class="bg-black max-h-[100px]" @click="imageClick(index)" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Galleria from 'primevue/galleria';

import {ref} from 'vue';

const props = defineProps({
    images: {
        type: Array,
        required: true
    }
});

const images = ref();
const activeIndex = ref(0);
const responsiveOptions = ref([
    {
        breakpoint: '1024px',
        numVisible: 5
    },
    {
        breakpoint: '768px',
        numVisible: 3
    },
    {
        breakpoint: '560px',
        numVisible: 1
    }
]);
const displayCustom = ref(false);

const imageClick = (index) => {
    activeIndex.value = index;
    displayCustom.value = true;
};
</script>

<style scoped>

</style>
