<template>
    <container class="post-resume">
        <md-ink-ripple></md-ink-ripple>
        <md-layout>
            <h2 class="md-title">{{ post.title }}</h2>
            <span>
            {{ trimContent(post) }}
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
    </container>
</template>

<script>
    export default {
        props: ['post'],
        methods: {
            trimContent: post => post.content.substr(0, 100)
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/variables.scss";

    .post-resume{
        cursor: pointer;
    }

    span {
        text-overflow: ellipsis;
    }

    .actions {
        justify-content: flex-end;

        .actions-wrapper {
            *{
                float: left;
            }
            .divider{
                border: 1px solid black;
                margin: 0px 20px;
                height: 23px;
            }
        }
    }

</style>