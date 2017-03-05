<template>
    <md-button :class="[{ loading: isLoading }, internalClasses]">
        {{ buttonText }}
        <slot></slot>
    </md-button>
</template>

<script>
    let defaultClasses = 'md-primary md-raised';
    let defaultLoadingText = App.text('common.components.button.loading');

    export default {
        props: {
            loadingText: String,
            text: String,
            classes: String
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
                internalText: this.text,
                internalLoadingText: this.loadingText || defaultLoadingText,
                internalClasses: this.classes !== undefined ? this.classes : defaultClasses,
            }
        },
        computed: {
            buttonText() {
                return this.isLoading ? this.internalLoadingText : this.internalText; 
            }
        }
    }
</script>

<style lang="scss" scoped>
    .loading {
        opacity: 0.7;
    }
</style>