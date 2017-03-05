<template>
    <app-button classes="" @click.native="back">
        <md-icon md-primary>arrow_back</md-icon>
        {{ internalText }}
        <slot></slot>
    </app-button>
</template>

<script>
    export default {
        props: ['to', 'text'],
        methods: {
            back() {
                if(this.to !== undefined){
                    location.href = this.to;
                } else {
                    history.back();
                }
            },
        },
        data() {
            return {
                internalText: this.text || App.text('common.components.button.back.text'),
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>