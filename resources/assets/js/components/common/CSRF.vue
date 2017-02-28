<template>
    <input type="hidden" name="_token" :value="token">
</template>

<script>
    export default {
        computed: {
            token: function () {
                return window.Laravel.csrfToken;
            }
        }
    }
</script>