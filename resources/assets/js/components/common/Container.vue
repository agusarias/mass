<template>
    <md-whiteframe class="content-container" :md-elevation="elevation">
        <slot></slot>
    </md-whiteframe>
</template>

<script>
    export default {
        props: {
            elevation: {
                type: Number,
                default: 4
            }
        }
    }
</script>

<style lang="scss" scoped>

    .content-container:not(:empty) {
        padding: 50px;
        margin: 10px 20px;
        width: 100%;
    }

</style>