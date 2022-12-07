<template>

  <form class="mt-3">
    <!-- Header -->
    <div>
        <!--Title-->
        <h3>
            {{ title }}
        </h3>
        <span>
            {{ subTitle }}
        </span>
    </div>
    <!-- Content -->
    <div>
        <slot />
    </div>

    <!--Action Button Area-->
    <div>
       <slot name ="footer"/>
       <div>
        <!-- Reset -->
        <t-button :label="t('command.reset')">
        </t-button>
       </div>
    </div>
</form>


</template>

<script setup>
import TButton from './TButton.vue';
</script>

<style lang="scss" scoped>

</style>
