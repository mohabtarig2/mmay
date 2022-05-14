<template>
<div>
<h2 class="text-center">مناقصات  التكييف</h2>
<div class="links-requests mb-3">
<router-link :to="{name:'HvacTenders'}" class="theme-color mr-3" > مناقصات التكييف</router-link>
<router-link :to="{name:'requestHvac'}" class="theme-color">متابعة الطلبات</router-link>
</div>

 <div class="s-blog-sidebar mb-3" v-for="(tendercr,index) in tenders" :key="index">




         <router-link class=" font-weight-bold ml-2 text-dark "
         :to="{name:'HvacDetails',params:{id:tendercr.id}}">{{tendercr.title.substr(0,90 )}}

        <status :status="tendercr.status"></status>
        

         </router-link>
          <sup>({{tendercr.count}})عدد العروض</sup>
          <small class="float-right"> {{tendercr.added_at}}</small>



       <div class="mt-3"> {{tendercr.notes.substr(0,90 )}}</div>
       <div>
       <span class="badge badge-custom-orange main-color  font-weight-bold mt-4 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">

            <all-uae :emirates="tendercr.emirates"></all-uae>

</span>


                <router-link class=" theme-btn float-right"  :to="{name:'HvacDetails',params:{id:tendercr.id}}"> {{$t('more')}} </router-link>

       </div>
</div>
</div>

</template>

<script>
import status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';

export default {
  components: { status , AllUae },

  data(){
        return{
        tenders:null,
        id:null
        }
    },

methods: {
       ToredictConsle(id){
          console.log(id);
           this.$router.push({ path: `/tenders/hvac/${id}`});
      },
    getTenders(){

 axios.get('/AllMyHvacTender').then(response=>{
this.tenders =response.data;
});


},

},
created() {
   this.getTenders();
},
}
</script>

<style lang="scss" scoped>

 a.router-link-exact-active{
     border-bottom: 2px solid #3454d1;
     color: #3454d1 !important;
     font-weight: bold;
    
     text-decoration:none;
     color: #3454d1 !important;
 }
</style>
