<template>
    <div class="page-content">
        <slot name="navigation"></slot>
        <div class="main-content">
            <slot name="content"></slot>
        </div>
    </div>
</template>
<style lang="scss" scoped>

    .page-content {
        min-height: 100%;
        max-height: 100%;
        flex: 1;
        display: flex;
        flex-flow: column
    }

</style>