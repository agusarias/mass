<template>
    <md-button :class="[{ loading: isLoading }, 'md-primary md-raised']">
        <div v-if="!isLoading">
            <slot></slot>
        </div>
        <div v-else>
            {{ internalLoadingText }}
        </div>
    </md-button>
</template>

<script>
    export default {
        props: {
            loadingText: String,
        },
        methods: {
            loading(is){
                if(is !== undefined){
                    this.isLoading = is;
                }
                return this.isLoading;
            }
        },
        data() {
            return {
                isLoading: false,
                internalLoadingText: this.loadingText || App.text('common.components.button.loading'),
            }
        },
    }
</script>

<style lang="scss" scoped>
    .loading {
        opacity: 0.7;
    }
</style>