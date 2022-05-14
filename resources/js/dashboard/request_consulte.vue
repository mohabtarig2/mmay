<template>

   <div>

<h2 class="text-center mb-3">متابعة طلبات الاستشارات الهندسية</h2>

<div class="links-requests mb-3">
<router-link :to="{name:'ConslTenders'}" class="theme-color mr-3" v-if="IsUser==10" > مناقصات الاستشارات</router-link>
<router-link :to="{name:'request_consulte'}" class="theme-color  mr-3">متابعة طلبات المناقصات</router-link>
<router-link :to="{name:'requestVilla'}" class="theme-color  mr-3">متابعة طلبات الفلل</router-link>
</div>

<div v-if="loading">
<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>

</div>
    <div class="p-descrip-box mt-3" v-for="request , index in data" :key="index">
<a @click="requestdirect(request.type,request.id)">

           <div class="h5 main-color">
                <img :src="request.company.avatar" class="rounded-circle mr-2 ml-2" style="width:50px;height:50px" width="50"  height="50"  v-if="IsUser ==10">
                <img :src="request.user.avatar" class="rounded-circle mr-2 ml-2" width="50" height="50"  v-if="IsUser ==1">

                      
                      <span>  
                          طلب رقم : 
                          {{request.id}}</span>

                    
           </div>




           <p class=" mb-2 " v-if="request.toffers.comment !=null" >{{request.toffers.comment.substr(0,80)}}.... </p>
       
<div class="items container mr-4 ml-4 ">
<span class=" text-muted " v-if="IsUser ==1" > <i class="fa fa-user" ></i> {{request.user.name}}  </span>
<span class=" text-muted " v-if="IsUser ==10" > <i class="fa fa-user" ></i> {{request.company.name}}  </span>
<span class=" text-muted  "><i class="far fa-clock"></i> {{request.added_at}}  </span>

</div>

</a>
           </div>


          
           



</div>





</template>

<script>
import requestTenders from './request-tenders.vue'
import RequestVilla from './request-villa.vue'
export default {
  components: { requestTenders, RequestVilla },

data(){
    return{
        data:null,
        loading:false,
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
        axios.get('request/consulting').then(res=>{
            this.data = res.data;
        })
        }
         if(this.IsUser==1){
        axios.get('request/consultingCompany').then(res=>{
            this.data = res.data;
        })
        }
    },
    requestdirect(type,id){


        this.$router.push({ path: `/request/${type}/${id}`});



    }

},
beforeCreate(){
this.loading=true
},
created() {
    this.loading=false;
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
img {
    height:50px !important;
    width:50px !important;
}
.p-descrip-box:hover{
    cursor: pointer;
    background: rgb(242, 246, 250);

}
</style>


<style lang="scss" scoped>

 a.router-link-exact-active{
     border-bottom: 2px solid #3454d1;
     color: #3454d1 !important;
     font-weight: bold;
    
     text-decoration:none;
     color: #3454d1 !important;
 }
</style>
