<template>
    <form novalidate @submit.stop.prevent="submit">
        <app-csrf></app-csrf>

        <md-input-container>
            <label>Title</label>
            <md-input v-model="post.title" required></md-input>
        </md-input-container>

        <quill-editor v-model="post.content"
                      :config="editorOptions">
        </quill-editor>
    </form>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                editorOptions: {},
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>