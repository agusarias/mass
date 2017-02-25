<template>
    <md-layout>
        <post-resume v-for="post in posts" :post="post"></post-resume>
    </md-layout>
</template>

<script>
    export default {
        components: {
            'post-resume': require('./PostResume.vue')
        },
        props: ['posts']
    }
</script>
