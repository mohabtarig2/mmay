


<template>
  <div>
<h2 class="text-center mb-3">متابعة طلبات التكييف </h2>

<div class="links-requests mb-3">
<router-link :to="{name:'HvacTenders'}" class="theme-color mr-3" > مناقصات التكييف</router-link>
<router-link :to="{name:'requestHvac'}" class="theme-color">متابعة الطلبات</router-link>
</div>


   <div class="card mt-3" v-for="request , index in data" :key="index">

<a @click="requestdirect(request.type,request.id)">


           <div class="h5 main-color">
                <img :src="request.company.avatar" class="rounded-circle mr-2 ml-2" width="50"  height="50"  v-if="IsUser ==10">
                <img :src="request.user.avatar" class="rounded-circle mr-2 ml-2" width="50" height="50"  v-if="IsUser ==4">
           {{request.hvac.title}}</div>





           <p class=" mb-2 " >{{request.offer_hvac.textOffer.substr(0,80)}}.... </p>
<div class="items container mr-4 ml-4 ">
<span class=" text-muted " v-if="IsUser ==6" > <i class="fa fa-user" ></i> {{request.user.name}}  </span>
<span class=" text-muted " v-else-if="IsUser ==10" > <i class="fa fa-user" ></i> {{request.company.name}}  </span>
<span class=" text-muted  "><i class="far fa-clock"></i> {{request.added_at}}  </span>

</div>


</a>

     </div>
  </div>
</template>

<script>
export default {
data(){
    return{
        data:null,
    }
},
computed:{
   IsUser(){
            return this.$store.getters.IsUser
        },
},
methods:{

    getRequestConfirmed(){
        if(this.IsUser==10){
        axios.get('request/hvac').then(res=>{
            this.data = res.data;
        })
        }
         if(this.IsUser==4){
        axios.get('request/hvacCompany').then(res=>{
            this.data = res.data;
        })
        }
    },
    requestdirect(type,id){


        this.$router.push({ path: `/request/${type}/${id}`});



    }

},
created() {
        this.getRequestConfirmed();

    },
}
</script>

<style scoped>
.items i{
    font-size: 14px;
    color: #c5cbdd;
}
.card{
    padding: 20px;
}

</style>
