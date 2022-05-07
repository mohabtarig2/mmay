<template>
    <div class="container">
        <div class="row">
   <div class="col-md-4 col-sm-12">
<div class="p-descrip-box" >


    <div class=" mt-3">
        <router-link :to="{name:'editprofile'}" class="mr-4 font-weight-bold text-dark">
        <i class="fa fa-user"></i><span class="pr-5"> Edit Profile</span></router-link></div>

        <div class=" mt-3"><router-link :to="{name:'password'}" class="mr-4 font-weight-bold text-dark"><i class="fa fa-unlock-alt"></i><span class="pr-5">
             Change password</span></router-link></div>


</div>
   </div>
   <div class="col-md-8 col-sm-12">
        <router-view></router-view>
   </div>
        </div>
    </div>
</template>

<style scoped>
.card{
    padding:20px;
}
</style>
