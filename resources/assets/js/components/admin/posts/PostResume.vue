<template>
    <app-container class="post-resume" @click.native="seePost(post)">
        <md-ink-ripple></md-ink-ripple>
        <md-layout>
            <h2 class="md-title">{{ post.title }}</h2>
        </md-layout>
        <md-layout>
            <span v-html="trimContent(post)">
            </span>
        </md-layout>
        <md-layout class="actions">
            <div class="actions-wrapper">
                <span class="md-subheading">5</span>
                <md-icon md-primary>comment</md-icon>
                <div class="divider"></div>
                <span class="md-subheading">5</span>
                <md-icon md-primary>comment</md-icon>
            </div>
        </md-layout>
    </app-container>
</template>

<script>
    export default {
        props: ['post'],
        methods: {
            trimContent: post => {
                return post.content.substr(0, 100);
            },
            seePost: post => {
                location.href = App.route('posts.one', {post: post.id});
            }
        }
    }
</script>

<style lang="scss" scoped>

    .post-resume {
        cursor: pointer;
    }

    span {
        text-overflow: ellipsis;
    }

    .actions {
        justify-content: flex-end;

        .actions-wrapper {

            * {
                float: left;
            }

            .divider {
                border: 1px solid black;
                margin: 0px 20px;
                height: 23px;
            }

        }
    }

</style>