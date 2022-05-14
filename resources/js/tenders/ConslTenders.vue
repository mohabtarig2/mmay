<template>
    <div>







<h2 class="text-center">مناقصات الاستشارات الهندسية</h2>
<div class="links-requests mb-3">
<router-link :to="{name:'ConslTenders'}" class="theme-color mr-3" v-if="IsUser==10"> مناقصات الاستشارات</router-link>
<router-link :to="{name:'request_consulte'}" class="theme-color  mr-3">متابعة الطلبات</router-link>
<router-link :to="{name:'requestVilla'}" class="theme-color  mr-3">متابعة طلبات الفلل</router-link>


</div>

        <div class="s-blog-sidebar   mb-3" v-for="(tender,index) in tenders" :key="index" >

    <div class="">






         <router-link class="font-weight-bold text-dark ml-2" :to="'/Projects/'+tender.id+''" >{{tender.title}}
                 <status :status="tender.status"></status>
        </router-link>
          <sup>({{tender.all_offers.length>0 ? tender.all_offers.length :0}})عدد العروض</sup>
   <small class="float-right"> {{tender.added_at}}</small>


 
 
               <p> {{tender.note.substr(0,90 )}}.. </p>

<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">

             <all-uae :emirates="tender.emirats"></all-uae>
</span>

<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">
{{$t('bathroom')}} :{{tender.bathroom}}
</span>
<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">
{{$t('rooms')}} :{{tender.bedroom}}
</span>
{{id}}
<router-link class="   theme-btn     mx-auto float-right" :to="'/Projects/'+tender.id+''">المزيد من التفاصيل
     </router-link>

    </div>




</div>

    </div>
</template>

<script>
import Status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';
import offerTender from './offerTender.vue';

export default {
     components: { offerTender ,Status, AllUae},
    data(){
        return{
        tenders:null,
        id:null,
        searchType:null,
        }
    },
     watch:{
             searchType(query){
                 console.log('This Log')

                 if(query =='all'){
 let opldpost = JSON.parse(localStorage.getItem('ProjectConsle'));

                        this.tenders = opldpost;

         } else{
                 if(query.length > 0 && query.length !=='' &&  query.length !==null){

                     console.log(query);
                     axios.get('/AllMyconslCtender/type/'+query).then(res=>{

                        this.tenders = res.data;




                       // setInterval(function(){ this.issearch = true ;}, 200);


                     });


                 }


                 }


             }
        },

    computed:{
         IsUser(){
            return this.$store.getters.IsUser
        },
    },

     mounted() {

            console.log(this.title);
        },
        methods: {
               GetTenderId(event){
        this.id=event;
        console.log(this.id)
         },
               Toredict(id){
          console.log(id);

           this.$router.push({ path: `/Projects/${id}`});
      },
        },
        created() {

            if(this.IsUser==1){
             this.$router.push({ name: 'request_consulte'});

}
const  request = axios.get('/AllMyconslCtender').then(response=>{
this.tenders =response.data;
this.loading = false;

             localStorage.setItem('ProjectConsle',JSON.stringify(this.tenders))
            //  this.page = this.allOffershow.length
});

//  this.GetTenderId();
        },

};
</script>

<style scoped>
.badge-warning {
    background-color: #ffae4a
}
.card{
    padding:20px;
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
