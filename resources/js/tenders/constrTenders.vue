<template>
<div>
    <h2 class="text-center">مناقصات  المقاولات</h2>

    <div class="links-requests mb-3">
    
<router-link :to="{name:'constrtenders'}" class="theme-color mr-3" > مناقصات المقاولات </router-link>
<router-link :to="{name:'requestcConstructions'}" class="theme-color">متابعة الطلبات</router-link>
</div>


 <div class="s-blog-sidebar  mb-3" v-for="(tendercr,index) in tenders" :key="index">





         <router-link class="font-weight-bold ml-2 text-dark" :to="`/tenders/construction/${tendercr.id}`">{{tendercr.title.substr(0,90 )}}

        <status :status="tendercr.status"></status>

        

         </router-link>
         <sup> ({{tendercr.offer_consr.length >0 ?tendercr.offer_consr.length : 0 }})عدد العروض </sup>
         <small class="float-right"> {{tendercr.added_at}}</small>



       <div class="mt-3"> {{tendercr.notes.substr(0,90 )}}</div>
       <div>
       <span class="badge badge-custom-orange main-color  font-weight-bold mt-4 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">

          <all-uae :emirates="tendercr.emirates"></all-uae>

</span>


                <button class="  theme-btn float-right" @click="ToredictConsle(tendercr.id)">المزيد من التفاصيل</button>

       </div>
</div>
</div>

</template>

<script>
import status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';

export default {
  components: { status, AllUae },

  data(){
        return{
        tenders:null,
        id:null
        }
    },

methods: {
       ToredictConsle(id){
          console.log(id);
           this.$router.push({ path: `/tenders/construction/${id}`});
      },
    getTenders(){

 axios.get('/AllMyConsrtender').then(response=>{
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

