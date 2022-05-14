<template>
    <div class="uae">



                <div v-if="emirates==7">{{$t('abu_dabhi')}}</div>
                <div v-else-if="emirates==1">{{$t('dubai')}}</div>
                <div v-else-if="emirates==5">{{$t('sharja')}}</div>
                <div v-else-if="emirates==6">{{$t('ajman')}}</div>
                <div v-else-if="emirates==4">{{$t('um_alqwin')}}</div>
                <div v-else-if="emirates==3">{{$t('ras_alkhima')}}</div>
                <div v-else-if="emirates==2">{{$t('fujairah')}}</div>

    </div>
</template>

<script>
export default {
    props:{emirates:Number}
}
</script>


<style scoped>
.uae{
    display:inline-block;
}
</style>
