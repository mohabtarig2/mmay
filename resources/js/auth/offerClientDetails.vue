<template>
        <div class="container" :dir="$t('directions')">








 <a @click="$router.go(-1)" style="cursor:pointer;" class="text-dark"><i class="fa fa-arrow-left  ml-3 mt-5 mb-2  fa-1x"></i></a>



<div class="row" >
<div class="col-md-8 col-sml-12">











<div  v-for="offer,index in offers " :key="index">

 <router-link :to ="{path:'/offer/details/'+offer.id}" class="link text-dark" style="text-decoration: none;">

                  <carousel :autoplay="false" v-if="offer.villa_image.length" :nav="false" items="1" class=" container    "   style="direction: ltr;">
                    <span v-for="image,i in offer.villa_image " :key="i" >

                <img class="card-img-top img-fluid " :src="image.path"    alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:30rem"
                  data-toggle="modal" data-target="#fullSize">
                  <!-- ata-target="#fullSize" -->

                    </span>








<div>
 <template slot="prev"><span class="prev"><i class="fa fa-chevron-left"></i></span></template>


    <template slot="next"><span class="next"><i class="fa fa-chevron-right"></i></span></template>
</div>

</carousel>



 </router-link>
<!--
 <div class="modal fade" id="fullSize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

           <carousel :autoplay="false" v-if="offer.villa_image.length" :nav="false" items="1" class=" container    "   style="direction: ltr;">
                    <span v-for="image,i in offer.villa_image " :key="i" >

                <img class="card-img-top  " :src="image.path"    alt="Card image cap"

                  data-toggle="modal" data-target="#fullSize">

                    </span>









 <template slot="prev"><span class="prev"><i class="fa fa-arrow-left"></i></span></template>


    <template slot="next"><span class="next"><i class="fa fa-arrow-right"></i></span></template>

</carousel>

  </div>
</div> -->

            </div>





 <div v-for="offer,index in offers" :key="index" >












<div class="main-images" :dir="$t('directions')" :class="$t('text_align')">











    <h5 class="text-dark mt-3"><span class="h2">{{offer.title}}</span> </h5>
      <div class=" mt-3"  :dir="$t('directions')" :class="$t('text_align')" >
                          <img src="assets/img/maps-and-flags.svg" width="7" class="image-icon1" style="">
                     <span v-if="offer.Emirates==7">{{$t('abu_dabhi')}}</span>
                    <span v-if="offer.Emirates==6">{{$t('ajman')}}</span>
                    <span v-if="offer.Emirates==5">{{$t('sharja')}}</span>
                    <span v-if="offer.Emirates==4">{{$t('um_alqwin')}}</span>
                    <span v-if="offer.Emirates==3">{{$t('ras_alkhima')}}</span>
                    <span v-if="offer.Emirates==2">{{$t('fujairah')}}</span>
                    <span v-if="offer.Emirates==1">{{$t('dubai')}}</span>


       </div>


</div>






      <div class="card mt-3"  :dir="$t('directions')" :class="$t('text_align')">


<div class="card-body">
    <h5 class="text-dark" >{{$t('description')}}</h5>
    <div class=" " style="font-size: 1rem;padding:0 ;color:#686a6b;line-height: 2;"  >
{{offer.Description}}
    </div>
</div>

  </div>

        <div class="card mt-3"  :dir="$t('directions')" :class="$t('text_align')">

<div class="card-body">
     <h5 class="text-dark" >{{$t('Items_not_covered')}}</h5>
<div class="flex-container">

<div >
      <span  v-if="offer.Consultant_fee=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('Consultant_fee')}}</span>
  </div>

  <div >
      <span  v-if="offer.conditioning=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('conditioning')}}</span>
  </div>

   <div >
      <span  v-if="offer.gypsum=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('gypsum')}}</span>
  </div>

   <div >
      <span  v-if="offer.electric_pendants=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('electric_pendants')}}</span>
  </div>

    <div >
      <span  v-if="offer.Bedroom_wardrobes=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('Bedroom_wardrobes')}}</span>
  </div>



</div>

<div class="flex-container">

<div >
      <span  v-if="offer.Kitchen_Cabinets=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('Kitchen_Cabinets')}}</span>
  </div>

  <div >
      <span  v-if="offer.the_elevator =='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted" v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('the_elevator')}}</span>
  </div>

   <div >
      <span  v-if="offer.interior_decoration=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('interior_decoration')}}</span>
  </div>

   <div >
      <span  v-if="offer.garden_design=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('garden_design')}}</span>
  </div>

    <div >
      <span  v-if="offer.the_fence=='true'"> <i class="main-color fa fa-check-circle-o"></i></span>
        <span class="text-muted " v-else><i class="text-muted fa fa-check-circle-o"></i>  </span>
     <span class="font-weight-bold"> {{$t('the_fence')}}</span>
  </div>



</div>


  </div>
        </div>




</div>





    </div>


    <div class="col-md-4 col-sml-12">

        <div v-for="offer ,index in offers" :key="index">
                     <div class="card" :dir="$t('directions')" :class="$t('text_align')">
                          <h5 class="text-dark mt-3"><span class="h2 main-color">{{offer.price}}</span> {{$t('aed')}}</h5>
  <ul class="list-group list-group-flush" >

    <li class="list-group-item">


                 <div class="row   font-weight-bold">
                <div class="col-8">
                    <img src="assets/img/HomeFloors.svg" width="22" class="mr-1"> <span> {{$t('floors')}}</span>
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.floors}}
                </div>
            </div>

            <div class="row font-weight-bold mt-4 ">
                <div class="col-8">
                   <img src="assets/img/bedtest.svg" width="22" class="mr-1"> {{$t('master_rooms')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.room_master}}
                </div>
            </div>

            <div class="row mt-4  font-weight-bold">
                <div class="col-8">
                   <img src="/assets/img/bedtest.svg" width="22" class="mr-1">  {{$t('rooms')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.rooms}}
                </div>
            </div>


                 <div class="row mt-4  font-weight-bold">
                <div class="col-8">
                     <img src="assets/img/sofa.svg" width="22" class="mr-1">{{$t('majlis')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.majlis}}
                </div>
            </div>

            <div class="row font-weight-bold mt-4 ">
                <div class="col-8">
                    <img src="assets/img/cooking.svg" width="22" class="mr-1"> {{$t('kitchen')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.kitchen}}
                </div>
            </div>


            <div class="row font-weight-bold mt-4 ">
                <div class="col-8">
                   <img src="assets/img/dinning-table.svg" width="22" class="mr-1">  {{$t('dining')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.dining}}
                </div>
            </div>


            <div class="row font-weight-bold mt-4 ">
                <div class="col-8">
                    <img src="assets/img/bathtub.svg" width="22" class="mr-1"> {{$t('bathroom')}}
                </div>
                <div class="col-4 text-center main-color">
                    {{offer.bathroom}}
                </div>
            </div>
<div class="row font-weight-bold mt-4 ">
                <div class="col-8">
                    <img src="assets/img/villa.svg" width="22" class="mr-1"> {{$t('Service_room_placement')}}
                </div>
                <div class="col-4 text-center " v-if="offer.Service_room_placement==1">
                    {{$t('inside')}}
                </div>
                 <div class="col-4 text-center " v-else>
                    {{$t('outside')}}
                </div>
            </div>




               <div class="row mt-4  font-weight-bold">
                <div class="col-8">
                   <img src="assets/img/villa.svg" width="22" class="mr-1"> {{$t('Type_Of_Villa')}}
                </div>
                <div class="col-4 text-center main-color">
                   <span   class="mr-2  font-weight-bold" :dir="$t('directions')" v-if="offer.type_villa==1">  {{$t('classic')}} </span>
        <span   class="mr-2  font-weight-bold"  :dir="$t('directions')" v-if="offer.type_villa==2"> {{$t('modern')}} </span>
                </div>
            </div>



               <div class="row mt-4  font-weight-bold">
                <div class="col-8">
                   <img src="assets/img/move.svg" width="22" class="mr-1"> {{$t('sqft')}}
                </div>
                <div class="col-4 text-center main-color">
                   <span   class="mr-2  font-weight-bold" :dir="$t('directions')" > {{offer.sqft}}  </span>

                </div>
            </div>












        </li>
  </ul>
</div>

          <div class="card mt-2" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  :dir="$t('directions')" :class="$t('text_align')">


<div v-if='success!=null'>
<div class="alert alert-success">
{{$t('request')}} <i class="fa fa-check-circle-o"></i>
</div>
</div>
      <div class="card-body">
        <form >



            <div class="form-group">
             <label class="form-control">
                  <span class="btn btn-light" @click="$refs.fileinput" v-if="passport==null"><i class="fas fa-images" ></i></span>
                <span class="btn btn-light " @click="$refs.fileinput" v-else><i class="text-success fas fa-images" ></i></span>
                      {{$t('Emirates_id')}}   <small class=" text-danger font-weight-bold" v-if="FileNotpassportAllowd!=null">{{FileNotpassportAllowd}}</small>

                <!-- <img v-if="passport!=null" :src="url1" style="width:50; height:50px;border-radius: 10px;"> -->


                <input type="file" class="form-control"  @change="filePassport" style="display:none" ref="fileinput">





            </label>


            <div class="progress" v-if="progress">
  <div class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
            </div>
<div class="form-group">
             <label class="d-block form-control">
                 <span class="btn btn-light" @click="$refs.fileinput2.click()" v-if="map==null"><i class="fas fa-images" ></i></span>
                <span class="btn btn-light text-success" @click="$refs.fileinput2" v-else><i class="fas fa-images" ></i></span>
                {{$t('land_map')}}
                <input type="file" class="form-control"  @change="fileMap" style="display:none" ref="fileinput2">
               <div class=" text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</div>


                 <!-- <img v-if="map!=null" :src="url2" style="width:50; height:50px;border-radius: 10px;"> -->
            </label>
<div class="progress" v-if="progress2" style="hieght:10px !important">
  <div class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

</div>
<!-- <div class="form-group">
            <label>
                {{$t('notes')}}
                <textarea class="form-control"> </textarea>
            </label>
</div> -->

            <p class="font-weight-bold"> {{$t('build_by')}}</p>
            <p>
            <input type="checkbox" aria-label="Checkbox for following text input" v-model="bank">
            <span class="ml-3">{{$t('bank')}}</span>
            </p>
             <p>
            <input type="checkbox" aria-label="Checkbox for following text input" v-model="mbr">
            <span class="ml-3">{{$t('mbr')}}</span>
            </p>
             <p>
            <input type="checkbox" aria-label="Checkbox for following text input" v-model="szp">
            <span class="ml-3">{{$t('szp')}}</span>
            </p>
              <p>
            <input type="checkbox" aria-label="Checkbox for following text input" v-model="Special_grant">
            <span class="ml-3">  {{$t('Special_grant')}}</span>
            </p>
              <p>
            <input type="checkbox" aria-label="Checkbox for following text input" v-model="other">
            <span class="ml-3">other</span>
            </p>



            <div>




            </div>


            <button @click.prevent="payForm(offer.c_id)" class="mx-auto btn-block btn btn-success" :disabled="passport==null || map==null"
            v-for="offer , index in offers" :key="index">  {{$t('next')}}</button>

        </form>
      </div>



</div>

    </div>
    </div>

</div>


        </div>
</template>

<script>
import {loadStripe} from '@stripe/stripe-js';
import carousel from 'vue-owl-carousel';

export default {
 components: { carousel },
    data(){
        return{
      ads_id :this.$route.params.id,
      offers:'',
      src:null,
      payment:'',
      form:{
        EmiratesId:null,
        passport:null,
        map:null,
      },
        slides:null,
           active: 1,
        passport:null,
        map:null,
        filePassportName:null,
        url1:null,
        url2:null,
        progress:0,
        progress2:0,
        bank:null,
        mbr:null,
        szp:null,
        Special_grant:null,
        other:null,
        success:null,
        FileNotMapAllowd:null,
          map:null,
        FileNotpassportAllowd:null,
        userid:null


        }

    },

    methods:{
       filePassport(event){
         this.passport=event.target.files[0];
         this.filePassportName = this.passport.name;
          if(!this.passport.type.match('image.*') ){
              this.passport=null
              this.progress=null
              this.progres2=null
                   this.FileNotpassportAllowd =`should be Jpg Or Png `;
                    return ;
                }

          let data = new FormData();
          data.append("passport",this.passport,this.passport.name);
         this.url1 = URL.createObjectURL(this.passport);
  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotpassportAllowd=null
                });




       },
       fileMap(event){
           this.map=event.target.files[0];

             if(! this.map.type.match('image.*') ){
                   this.FileNotMapAllowd =`should be Jpg Or Png `;
                    return ;
                }
           this.url2 = URL.createObjectURL(this.map);

                 let data = new FormData();
          data.append("map",this.map,this.map.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotMapAllowd=null
                });




       },


      async  payForm(event){
    // const stripe = await loadStripe('pk_test_51JABSxB2bV4Yux9wohpRtGnNY1AcdLz47xsbppdJ7BcxDmfpwtYzdTHKG65rph7dYV222GL1tW6dFlF2D44EHhCe00XefIAddh');

             let data = new FormData();




      data.append("userid", event);
      data.append("bank", this.bank);
      data.append("mbr", this.mbr);
      data.append("szp", this.szp);
      data.append("other", this.other);
      data.append("Special_grant", this.Special_grant);
      data.append("ads_id", this.ads_id);
      data.append("passport",this.passport,this.passport.name);
      data.append("map",this.map,this.map.name);




                axios.post('paymentOffer',data).then(res=>{


 this.success = res.data;



        this.bank=false;
        this.mbr=false;
        this.szp=false
        this.other=false
        this.success=false
        this.success=false
        this.passport=null
        this.Special_grant=false;
        this.map=null
        this.url1=null
        this.url2=null
        this.progress=null
        this.progress2=null


                })
        }
    },
     created() {
        axios.get('/api/ads/details/'+this.$route.params.id).then(res=>{
            this.offers = res.data;





        });
    },
    computed:{
 IsUser(){
            return this.$store.getters.IsUser
        },
    }


}

</script>


<style scoped>
.list-group-item img{
    width: 17px;
        display: inline;
}
.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: #e74c3c !important;
}
.owl-theme .owl-nav.disabled + .owl-dots {
    margin-top: -23px !important;
    z-index: 6;
    position: sticky;
}
.font-weight-bold{
    color: rgb(81, 81, 81);
}

.image-icon1{

    width: 14px !important;
    display: inline-block !important;
}
.gray-image{
    -webkit-filter: grayscale(100%);
     filter: grayscale(100%);
}




.flex-container {
  display: flex;
  flex-flow: row wrap;

  align-content: space-around;


}

.flex-container>div {



  margin: 17px;




}

@media (max-width: 800px) {
   .flex-container>div {
    max-width: 75%;
    flex: 0 1 30%;
    }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .flex-container>div {
       max-width: 100%;
       flex: 0 1 100%;
    }
}
.diispaly{
    width: 200px;
}
.main-images .card-img{
    position: relative;
        height: 500px;
}
.badge-custom-orange {
    background: #ffe4e1;
    color: #e74c3c;
}
.main-images  .badge-custom-orange{
position: absolute;
right: 47px;
    top: 39px;

        font-size: 1.5rem;
    padding: 20px 50px;

}
.btn-success{
padding: 6px 50px;

}

</style>


<style scoped>
.main-color{
    color:#e74c3c
}


.next , .prev{
  background: #ffffffd0;
    width: 25px !important;
    height: 25px;
    border-radius: 50%;
    display: flex;
    font-size: 10px;
    color: #401414;
    position: absolute;
    justify-content: center;
    align-items: center;
    top: 20%;
    z-index: 999;

}

.next {

    right: 40px;
}

.prev {
    left: 40px;
}

.fa .fa-chevron-right{

}

.prev:hover,.next:hover{
  background: #fbfbfbfb;

}


</style>
