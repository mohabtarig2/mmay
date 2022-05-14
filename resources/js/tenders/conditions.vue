<template>
    <div :class="$t('text_align')">
<div class="h2 mb-5 text-muted">نصائح لبدء مشروعك </div>

      <div class="font-weight-bold  h5"> <img :src="'assets/img/build.svg'" width="20"> {{$t('title-tips1')}}</div>
      <!-- <button @click="copy($t('tips1'))">copy</button> -->
<p  class="text-dark">{{$t('tips1')}}
</p >



  <div class="font-weight-bold h5 mt-5 "><img :src="'assets/img/check.svg'" width="20">  {{$t('title-tips2')}}</div>
<p class="text-dark">{{$t('tips2')}}
</p>

<h2 class="h3 mt-5"></h2>

  <div class="font-weight-bold h5 mt-5 "><img :src="'assets/img/lightbulb.svg'" width="30"> {{$t('title-tips3')}}</div>
<p><ul>

    <li  class="mt-3">{{$t('tips3.1')}}</li>
    <li class="mt-3">{{$t('tips3.2')}}</li>
</ul>
</p>

    </div>


</template>
<script>
export default {
methods: {
    copy(text){
        navigator.clipboard.writeText(text);
    }
},
}
</script>
<style scoped>
span{

    font-size: 16px;
}
</style>
