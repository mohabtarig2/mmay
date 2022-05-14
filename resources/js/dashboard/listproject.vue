<template>
    <div>

<div class="container">


<div class="card mt-3 container">

<div class="ml-3">
         <div class="font-weight-bold    ml-2 ">
             {{title}}</div>

    <div class="mt-2 text-muted ml-2">
            <span class=" d-block">
            <small class="fa fa-history text-muted " style="font-size:12px"></small><small>
                 <!-- {{created_at | luxon({ input: "server" }) }} -->
                 {{added_at}}
                  </small>
            <small class="fa  fa-ticket text-muted" ></small>


            <small >  Offers ( {{count}} )</small>
            </span>
    </div>



            <div class="mt-3 " style="padding:0 20px">
              <span v-if="note.length >  100">
             {{note.substr(0,80 )}}...
              </span>

              <div class="row mt-3">
                  <div class="col-6 text-left">
                        <span  class="mt-2 text-muted "><img src="assets/img/bathtub.svg" width="17" class="mr-1"> <span class=" font-weight-bold">{{bathroom}}</span> bathroom  </span>
   <span class="mt-2 text-muted" ><img src="assets/img/bedtest.svg"  width="17" class="mr-1"><span class="font-weight-bold ">{{bedroom}}</span>bedroom </span>




                  </div>


<!-- <div class="col-6 font-weight-bold">
     <div class="text-center mb-0"> Tender id
            <br>
                  <span class="main-color"> 1002{{emirats}}</span></div>

        <router-link class="  btn btn-bus" :to="{name:'project',params:{id} }">More Details</router-link>


</div> -->
              </div>
              <router-link class=" float-right btn btn-oranger" :to="{name:'project',params:{id} }">More Details</router-link>
                 </div>


        </div>



</div>


</div>
    </div>




</template>



<script>
export default {
     props:{title:String,note:String,id:Number,status:Number,created_at:Date,count:Number,bedroom:String,bathroom:String,emirats:String,added_at:String},

};
</script>

<style scoped>
.card{
    padding: 20px;
}

</style>
