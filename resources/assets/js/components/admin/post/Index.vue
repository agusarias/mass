<template>
    <md-layout md-gutter>
        <md-layout md-gutter md-column md-flex="80" md-flex-offset="10">
            <app-container>
                <md-layout>

                    <md-tabs class="md-transparent">
                        <md-tab id="editor" md-label="Editor">
                            <form novalidate @submit.stop.prevent="submit">
                                <app-csrf></app-csrf>

                                <md-input-container>
                                    <label>Initial value</label>
                                    <md-input v-model="post.title" required></md-input>
                                </md-input-container>

                                <quill-editor ref="editor"
                                              v-model="post.content"
                                              :config="editorOption">
                                </quill-editor>
                            </form>
                        </md-tab>

                        <md-tab id="preview" md-label="Preview">
                            <h2 class="md-display-2">{{ post.title }}</h2>
                            <p v-html="post.content"></p>
                        </md-tab>

                    </md-tabs>

                    <md-layout md-align="end">
                        <app-button ref="saveButton" @click.native="save">Save</app-button>
                    </md-layout>

                </md-layout>
            </app-container>
        </md-layout>
    </md-layout>
</template>

<script>
    export default {
        data: () => {
            return {
                post: App.post,
                editorOption: {},
                isLoading: false
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
                    console.log(jsonPost);
                    this.$refs.saveButton.loading(false);
                });

            }
        },
    }
</script>