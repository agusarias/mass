<template>

    <md-layout md-gutter>

        <md-layout md-gutter md-column md-flex="80" md-flex-offset="10">
            <h1 class="md-header">Posts</h1>
            <posts :posts="posts"></posts>
        </md-layout>

    </md-layout>

</template>

<script>

    export default {
        components: {
            'posts': require('./Posts.vue'),
            'recomendations': require('./Recomendations.vue'),
        },
        data: () => {
            return {
                posts: App.user.posts
            }
        }
    }

</script>

<style>

</style>