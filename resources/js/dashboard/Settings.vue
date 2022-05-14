<template>
    <div class="container">
        <div class="row">
   <div class="col-md-4 col-sm-12">
<div class="p-descrip-box" >


    <div class=" mt-3">
        <router-link :to="{name:'editprofile'}" class="mr-4 font-weight-bold text-dark">
        <i class="fa fa-user"></i><span class="pr-5"> بيانات الحساب </span></router-link></div>

        <div class=" mt-3"><router-link :to="{name:'password'}" class="mr-4 font-weight-bold text-dark"><i class="fa fa-unlock-alt"></i><span class="pr-5">
             كلمة السر </span></router-link></div>

             <div class=" mt-3"><router-link :to="{name:'editBranch'}" class="mr-4 font-weight-bold text-dark" v-if="IsUser!=10">
                 <i class="fa fa-list   "></i><span class="pr-5">
             الفروع </span></router-link></div>


</div>
   </div>
   <div class="col-md-8 col-sm-12">
        <router-view></router-view>
   </div>
        </div>
    </div>
</template>

<script>
export default {
       computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
       }
}
</script>

<style scoped>
.card{
    padding:20px;
}
</style>
