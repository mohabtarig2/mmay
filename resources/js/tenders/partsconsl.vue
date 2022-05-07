<template>
         <div class="p-descrip-box" >

  <ul class="list-group list-group-flush">

       <li class="list-group-item mb-0 h5    main-color text-center font-weight-bold" :dir="$t('directions')" >
            <h5 class=" text-center"> {{$t('budget')}} </h5>
            <div class="text text-success font-weight-bold">
  نوع التشطيب : 
  <span v-show="finishing==1"> {{$t('commercial')}} </span>
                <span v-show="finishing==2"> {{$t('normal')}}</span>
                <span v-show="finishing==3"> {{$t('good')}}</span>
                <span v-show="finishing==4"> {{$t('Excellent')}}</span>
                <span v-show="finishing==5"> {{$t('deluxe')}}</span>
                <span v-show="finishing==6"> {{$t('superdeluxe')}}</span>
</div>

            <h4 class=" main-color">{{min}}  {{$t('aed')}}  - {{max}} {{$t('aed')}} </h4>

            </li>
       <!-- <li class="list-group-item mb-0 h5  main-color text-center font-weight-bold" v-if="edit==1">
    <input class="form-control" name="min" type="number"  :value="min">    AED  -
     <input class="form-control"  name="max" type="number" :value="max"> AED
     </li> -->

    <li class="list-group-item">

<!-- fas fa-utensils -->
                 <div class="row   font-weight-bold">
                <div class="col-6">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-home"></i></div>
										<div class="pr-desc">
											<span>{{$t('Type_Of_Villa')}}</span>
											<p class="pr-des-title m-0" >  {{villa_type =="classic" ? $t('classic') : $t('modern')}}</p>
                                            <!-- <div class="form-group" v-if="edit==1">
                                            <input class="form-control" name="floors" type="number"  :value="floors">
                                            </div> -->
										</div>
									</div>
                </div>
                <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-warehouse"></i></div>
										<div class="pr-desc">
											<span>{{$t('floors')}}</span>
											<p class="pr-des-title m-0" >  {{floors}}</p>
                                            <div class="form-group" v-if="edit==1">
                                            <input class="form-control" name="floors" type="number"  :value="floors">
                                            </div>
										</div>
									</div>
                </div>
            </div>


             <div class="row mt-3  font-weight-bold">
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bed"></i></div>
										<div class="pr-desc">
											<span>{{$t('master_rooms')}}</span>
											<p class="pr-des-title m-0" >  {{room_mastar}}</p>

										</div>
									</div>
                </div>
                <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bed"></i></div>
										<div class="pr-desc">
											<span>{{$t('bed_rooms')}}</span>
											<p class="pr-des-title m-0" >  {{bedroom}}</p>

										</div>
									</div>
                </div>

            </div>





<div class="row mt-3  font-weight-bold">
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-utensils"></i></div>
										<div class="pr-desc">
											<span>{{$t('kitchen')}}</span>
											<p class="pr-des-title m-0" >  {{kitchens}}</p>

										</div>
									</div>
                </div>
                <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-couch"></i></div>
										<div class="pr-desc">
											<span>{{$t('majlis')}}</span>
											<p class="pr-des-title m-0" >  {{majlis}}</p>

										</div>
									</div>
                </div>

            </div>


            <div class="row mt-3  font-weight-bold">
                 <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-hamburger"></i></div>
										<div class="pr-desc">
											<span>{{$t('dining')}}</span>
											<p class="pr-des-title m-0" >  {{dining_room}}</p>

										</div>
									</div>
                </div>
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bath"></i></div>
										<div class="pr-desc">
											<span>{{$t('bathroom')}}</span>
											<p class="pr-des-title m-0" >  {{bathroom}}</p>

										</div>
									</div>
                </div>


            </div>


            <div class="row mt-3  font-weight-bold">
                 <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-map-marked"></i></div>
										<div class="pr-desc">
											<span> {{$t('Service_room_placement')}}</span>
											<p class="pr-des-title m-0" >  {{position=="inside" ? $t('inside'): $t('outside')}}</p>

										</div>
									</div>
                </div>
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class='bx bxs-location-plus'></i></div>
										<div class="pr-desc">
											<span>{{$t('Emirates')}}</span>
											<p class="pr-des-title m-0" >  <all-uae :emirates="emirats" ></all-uae></p>

										</div>
									</div>
                </div>


            </div>

            <div class="row mt-3  font-weight-bold">
                 <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-tv"></i></div>
										<div class="pr-desc">
											<span> {{$t('living room')}}</span>
											<p class="pr-des-title m-0" >  {{living_room}}</p>

										</div>
									</div>
                </div>



            </div>

            <hr>

            <div  class="text-dark text-right" >
                هل مطلوب سرداب ؟
                <div v-show="crypt==1" class="text-success">
                  نعم
                </div>

                 <div v-show="crypt==0" class="text-success">
                  لا
                </div>


            </div>
            <hr>
            <div class="text-right">
<div class="text-right"> شكل الفيلا المطلوب</div>
             <div class="form-group shapeVilla " style="display: flex;">
              
    <h4  v-if="villaShape=='H'" class="checked"> H</h4>
   <h4 v-show="villaShape=='L'" class='checked'> L</h4>
   <h4 v-show="villaShape=='U'" class='checked'> U</h4>
   <h4 v-show="villaShape=='F'" class='checked'> F</h4>
   <h4 v-show="villaShape=='square'" class="checked"
   ><p class="square checked"></p></h4>
   <br>

             </div>

             <div>ملف فحص التربة </div>
             <a class="btn btn-success" :href="soil" target="_blank"> 
               <i class="fa fa-eye"></i>
               عرض </a>


               <div class="mt-2">ملف خارطة الارض  </div>
             <a class="btn btn-success" :href="mapPath" target="_blank"> 
               <i class="fa fa-eye"></i>
               عرض </a>
  
  </div>















            <!-- <div class="row mt-4  font-weight-bold">
                <div class="col-6">
                    <img src="assets/img/maps-and-flags.svg" width="22" class="mr-1"> Emirats
                </div>
                <div class="col-6 text-center main-color">
                   <all-uae :emirates="emirats" ></all-uae>
                    <!-- <select  name="emirats" v-if="edit==1">
                   <option value=7>{{$t('abu_dabhi')}}</option>
                <option value=1 v>{{$t('dubai')}}</option>
                <option value=5>{{$t('sharja')}}</option>
                <option value=6>{{$t('ajman')}}</option>
                <option value=4>{{$t('um_alqwin')}}</option>
                <option value=3>{{$t('ras_alkhima')}}</option>
                <option value=2>{{$t('fujairah')}}</option>
                    </select> -->

        <!-- <button class="btn get-start" v-if="edit==1" @click="save(id)">حفظ</button> -->






        </li>
  </ul>
</div>
</template>
<script>
import AllUae from '../auth/AllUae.vue';
export default {
  components: { AllUae },
props:{bathroom:Number,dining_room:Number,bedroom:Number,
emirats:Number,floors:Number,kitchens:Number,
living_room:Number,majlis:Number,min:String,max:String,finishing:Number,
note:String,position:String,room_mastar:Number,soil:String,mapPath:String,
stage:Number,status:Number,title:String,villa_type:String,id:Number,edit:Number,sqft:Number,crypt:Number,villaShape:String} ,


     mounted() {
            console.log(this.title);
        },
        methods:{

               save(event){


 let mins = document.querySelector("input[name=min]").value;
 let max = document.querySelector("input[name=max]").value;
 let dining_room = document.querySelector("input[name=dining_room]").value;
 let bedroom = document.querySelector("input[name=bedroom]").value;
 let emirats = document.querySelector("select[name=emirats]").value;
 let floors = document.querySelector("input[name=floors]").value;
 let kitchens = document.querySelector("input[name=kitchens]").value;
 let majlis = document.querySelector("input[name=majlis]").value;
 let position = document.querySelector("select[name=position]").value;
 let room_mastar = document.querySelector("input[name=room_mastar]").value;
 let bathroom = document.querySelector("input[name=bathroom]").value;


 let data = new FormData();

 data.append('min',mins)
 data.append('max',max)
 data.append('dining_room',dining_room)
 data.append('bedroom',bedroom)
 data.append('emirats',emirats)
 data.append('floors',floors)
 data.append('kitchens',kitchens)
 data.append('majlis',majlis)
 data.append('position',position)
 data.append('bathroom',bathroom)
 data.append('room_mastar',room_mastar)
 data.append('id',event)

 axios.post('edit/consulte/part',data).then(res=>{
         this.title = res.data.title;
         this.min = res.data.min;
         this.max = res.data.max;
         this.dining_room = res.data.dining_room;
         this.floors = res.data.floors;
         this.kitchens = res.data.kitchens;
         this.position = res.data.position;
         this.bathroom = res.data.bathroom;
         this.room_mastar = res.data.room_mastar;
         this.emirats = res.data.emirats;
         this.status=0;
           this.edit=0;
        //    this.Message="تم تحديث البيانات"
     })


    },
            edtipart(event){
                if(this.IsUser==10 && this.status==0 ||this.status==6  ){
                if(event==1){


                this.edit=1;
                 }

                  if(event==0){


                this.edit=0;
                 }
                }
            }
        },
        computed: {

     IsUser(){
            return this.$store.getters.IsUser
        },

  },
}
</script>

<style scoped>
*{
    font-weight: bold !important;
}
img{
    width: 17px;
}

.shapeVilla h4{
  
  padding: 5px;
  margin-left: 5px;
  margin-right: 5px;
  border:1px solid rgb(155, 155, 155);
  background: #fff;
  border-radius: 10px;
  cursor: pointer;
}
.shapeVilla h4.checked , p.checked{

  border:1px #0ed678 solid;
  color: #0ed678;

}
.square {

    height: 20px;
    width: 20px;
    border: 2px solid black;
    border-radius: 5px;

}

</style>
