<template>
        <div>







            <h2 class=" mt-3 text-dark text-right " v-if="IsUser==1"  >اخر عروض استشارات هندسية قدمتها </h2>
            <h2 class=" mt-3 text-dark text-right " v-if="IsUser==6"  >اخر عروض مناقصات المقاولات التي قدمتها </h2>
            <h2 class=" mt-3 text-dark text-right " v-if="IsUser==4"  >اخر عروض مناقصات التكييف التي قدمتها </h2>
            <h2 class=" mt-3 text-dark text-right " v-if="IsUser==3"  >اخر عروض مناقصات الحجر التي قدمتها </h2>
            <h2 class=" mt-3 text-dark text-right " v-if="IsUser==5"  >اخر عروض مناقصات الديكور الداخلي التي قدمتها </h2>

                    <div class="card" v-if="IsUser==1">
                        <div class="card-body">

              <div v-for="(project,index) in Myoffers" :key="index" v-bind="project">
              <div class="card mt-3 container">

<div class="ml-3">
         <div class="font-weight-bold    ml-2 ">
             {{project.tender.title}}</div>

    <div class="mt-2 text-muted ml-2">
            <span class=" d-block">
          <small>
                 <!-- {{created_at | luxon({ input: "server" }) }} -->
                 {{project.added_at}}
                  </small>
            <small class="fa  fa-ticket text-muted" ></small>



            </span>
    </div>



            <div class="mt-3 " style="padding:0 20px">


              <div class="row mt-3">
                  <div class="col-6 text-left">
                        <span  class="mt-2 text-muted "><img src="assets/img/bathtub.svg" width="17" class="mr-1">
                         <span class=" font-weight-bold">{{project.tender.bathroom}}</span> bathroom  </span>
   <span class="mt-2 text-muted" ><img src="assets/img/bedtest.svg"  width="17" class="mr-1">
   <span class="font-weight-bold ">{{project.tender.bedroom}}</span>bedroom </span>




                  </div>


<!-- <div class="col-6 font-weight-bold">
     <div class="text-center mb-0"> Tender id
            <br>
                  <span class="main-color"> 1002{{emirats}}</span></div>

        <router-link class="  btn btn-bus" :to="{name:'project',params:{id} }">More Details</router-link>


</div> -->
              </div>
              <router-link class=" float-right theme-btn" :to="{name:'project',params:{id:project.tender.id} }">تفاصيل اكتر </router-link>
                 </div>


        </div>



</div>
          </div>

                    </div>
                    </div>

                        <div class="p-descrip-box" v-if="IsUser==6" v-for="(myoffer,index) in Myoffers" :key="index">
                        <div class="card-body">

                      <p class="text-right"> <router-link class="font-weight-bold ml-2 main-color " :to="'tenders/construction/'+myoffer.tender.id">{{myoffer.tender.title}}</router-link>
                         <span class="text-muted  float-left" dir="ltr">{{myoffer.added_at}}</span>
                      <p>


                      <p class="text-right">{{myoffer.textOffer}}</p>








                        </div>

                    </div>



                        <div class="p-descrip-box" v-if="IsUser==4" v-for="(myoffer,index) in Myoffers" :key="index">
                        <div class="card-body">

                      <p class="text-right"> <router-link class="font-weight-bold ml-2 main-color " :to="'tenders/hvac/'+myoffer.tender.id">{{myoffer.tender.title}}</router-link>
                         <span class="text-muted  float-left" dir="ltr">{{myoffer.added_at}}</span>
                      <p>


                      <p class="text-right">{{myoffer.textOffer}}</p>








                        </div>

                    </div>

                         <div class="p-descrip-box" v-if="IsUser==3" v-for="(myoffer,index) in Myoffers" :key="index">
                        <div class="card-body">

                      <p class="text-right"> <router-link class="font-weight-bold ml-2 main-color " :to="'tenders/hvac/'+myoffer.tender.id">{{myoffer.tender.title}}</router-link>
                         <span class="text-muted  float-left" dir="ltr">{{myoffer.added_at}}</span>
                      <p>


                      <p class="text-right">{{myoffer.textOffer}}</p>








                        </div>

                    </div>

                    
                         <div class="p-descrip-box" v-if="IsUser==5" v-for="(myoffer,index) in Myoffers" :key="index">
                        <div class="card-body">

                      <p class="text-right"> <router-link class="font-weight-bold ml-2 main-color " :to="'tenders/interior/'+myoffer.tender.id">{{myoffer.tender.title}}</router-link>
                         <span class="text-muted  float-left" dir="ltr">{{myoffer.added_at}}</span>
                      <p>


                      <p class="text-right">{{myoffer.textOffer}}</p>








                        </div>

                    </div>


        </div>

</template>


<script>

import MiniOffer from '../dashboard/miniOffer.vue';
export default {
  components: {  MiniOffer },

  data(){
      return{
          count:'',
          Myoffers:'',




      }
  },
  computed:{
        IsUser(){
                return this.$store.getters.IsUser
    },
  },

     created() {

         const  isuser =  this.$store.getters.IsUser;

         if(isuser==1){

     axios.get(`api/CountAll/conulte`).then(response=>{
        this.count = response.data;
        this.Myoffers = response.data.latest;





});
 }
         if(isuser==6){

     axios.get(`api/CountAll/construction`).then(response=>{
        this.count = response.data;
        this.Myoffers = response.data;

});
 }

         if(isuser==4){

     axios.get(`api/CountAll/hvac`).then(response=>{
        this.count = response.data;
        this.Myoffers = response.data;

});
 }


         if(isuser==3){

     axios.get(`api/CountAll/stone`).then(response=>{
        this.count = response.data;
        this.Myoffers = response.data;

});
 }

          if(isuser==5){

     axios.get(`api/CountAll/Inerior`).then(response=>{
        this.count = response.data;
        this.Myoffers = response.data;

});
 }

}
}
</script>
<style scoped>


.badge-oranger{
    background: rgba(255, 87, 34,0.1);
    color: #ff5722;
}
.card{
    padding: 20px;
}
</style>
