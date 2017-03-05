<template>
    <md-layout md-gutter>
        <md-layout md-gutter md-column md-flex="80" md-flex-offset="10">
            <app-container>
                <md-layout>
                    <md-layout>
                        <span class="md-display-1">
                            {{ sectionTitle }}
                        </span>
                    </md-layout>
                    <md-layout md-align="end">
                        <app-button-back :to="postsRoute"></app-button-back>
                    </md-layout>
                </md-layout>

                <md-layout>
                    <md-tabs class="md-transparent">

                        <md-tab id="comments" md-label="Comments">
                            <post-comments></post-comments>
                        </md-tab>

                        <md-tab id="editor" md-label="Editor">
                            <post-editor :post="post"></post-editor>
                        </md-tab>

                        <md-tab id="preview" md-label="Preview">
                            <h2 class="md-display-2">{{ post.title }}</h2>
                            <p v-html="post.content"></p>
                        </md-tab>

                    </md-tabs>

                    <md-layout md-align="end">
                        <app-button ref="saveButton" @click.native="save" :text="saveButtonText"></app-button>
                    </md-layout>

                </md-layout>
            </app-container>
        </md-layout>
    </md-layout>
</template>

<script>

    let editTitle = App.text('posts.post.title.edit'),
        createTitle = App.text('posts.post.title.create');

    export default {
        components: {
            'post-comments': require('./Comments.vue'),
            'post-editor': require('./Editor.vue'),
        },
        data: () => {
            return {
                post: App.post,
                isLoading: false,
                saveButtonText: App.text('posts.post.actions.save'),
                postsRoute: App.route('posts.index'),
            }
        },
        computed: {
            sectionTitle() {
                return this.post.id ? editTitle : createTitle;
            }
        },
        methods: {
            save() {
                let saveRoute = App.route('posts.save', {
                    post: this.post.id
                });

                let saveButton = this.$refs.saveButton;
                saveButton.loading(true);

                this.$http.post(saveRoute, {
                    post: this.post
                }).then((jsonPost) => {
                    this.$refs.saveButton.loading(false);
                });

            }
        },
    }
</script>