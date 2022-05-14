<template>
  <div class="chat">
    <div class="left clearfix" v-for="message in messages" :key="message.id">
      <div class="clearfix">
        <div class="header">
             
        <img :src="message.user.avatar" width="200" height="200" class="rounded-circle"> 
     
          <strong>
            {{ message.user.name }}
          </strong>
        </div>
        <p class="container">
          {{ message.message }}
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["messages"],
};
</script>

<style scoped>
.rounded-circle{
  width: 30px !important;
  height: 30px !important;
}
</style>