<template>
     <div class="   container mt-5" >

<constructions-ads v-if="IsUser==6 || IsUser==4 || IsUser==3 || IsUser==5"></constructions-ads>

<!-- <hvac-ads v-if="IsUser==4"> </hvac-ads> -->

<div v-if="IsUser==1">
<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<div class="modal-dialog" role="document" >

   <div href="#"  class="alert alert-successs alert-dismissible" :class="$t('text_align')" :dir="$t('directions')" >
       <h1 class="fa fa-check-circle mr-2 ml-2"></h1>
         {{$t('New_offer_add')}}

         <span aria-hidden="true" class="close" data-dismiss="modal" aria-label="close" v-if="lang=='ar'" style="left: 0; right: revert">&times;</span>
         <span aria-hidden="true" class="close" data-dismiss="modal" aria-label="close" v-if="lang=='en'" style="right:0">&times;</span>
       </div    >

</div>


</div>




         <h1 class="text-center font-weight-bold text-muted mb-5 mt-5">{{$t('New_Offers')}}</h1>
<div class="row" :dir="$t('directions')" :class="$t('text_align')">



           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('rooms')" :key="'rooms' + index" >{{ error }}</div>

<div class="col-md-6 col-sm-12">
                            <div class="c-form-inner container">


                                <form @submit.prevent="submit" enctype="multipart/form-data" >
                                



    <div class="form-group">
    <label for="exampleFormControlInput1"  >{{$t('title')}}</label>

    <input type="text" v-model="form.title" name="title" class="form-control" id="exampleFormControlInput1" placeholder="" :class="[{'is-invalid':this.errorFor('title')}]">
                 <div class="invalid-feedback" v-for="(error, index) in this.errorFor('title')" :key="'title' + index" >{{ error }}</div>

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">{{$t('Desription')}}</label>
    <textarea class="form-control" name="desc"  v-model="form.desc" id="exampleFormControlTextarea1" rows="4" :class="[{'is-invalid':this.errorFor('desc')}]"></textarea>
                     <div class="invalid-feedback" v-for="(error, index) in this.errorFor('desc')" :key="'desc' + index" >{{ error }}</div>


  </div>

  <div class="form-group row">
 <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect">{{$t('bed_rooms')}}</label>
    <select  class="form-control" id="exampleFormControlSelect  " name="villa" v-model="form.rooms" :class="[{'is-invalid':this.errorFor('rooms')}]">

     <option value="1">1 {{$t('rooms')}}</option>
      <option value="2">2 {{$t('rooms')}}</option>
      <option value="3">3 {{$t('rooms')}}</option>
      <option value="4">4 {{$t('rooms')}}</option>
      <option value="5">5 {{$t('rooms')}}</option>
      <option value="6">6 {{$t('rooms')}}</option>
      <option value="7">7 {{$t('rooms')}}</option>
      <option value="8">8 {{$t('rooms')}}</option>

    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('rooms')" :key="'rooms' + index" >{{ error }}</div>
      </div>

      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect2">{{$t('Type_Of_Villa')}}</label>
    <select  class="form-control" id="exampleFormControlSelect2" name="villa" v-model="form.villa" :class="[{'is-invalid':this.errorFor('villa')}]">
      <option value="1">{{$t('classic')}}</option>
            <option value="2">{{$t('modern')}}</option>


    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('villa')" :key="'villa' + index" >{{ error }}</div>
      </div>


      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect3">{{$t('floors')}}</label>
    <select  class="form-control" id="exampleFormControlSelect3" name="floors" v-model="form.floors" :class="[{'is-invalid':this.errorFor('floors')}]">

     <option value="1">1 {{$t('floors')}}</option>
      <option value="2">2 {{$t('floors')}}</option>
      <option value="3">3 {{$t('floors')}}</option>
      <option value="4">4 {{$t('floors')}}</option>


    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('floors')" :key="'floors' + index" >{{ error }}</div>
      </div>


  </div>
    <div class="form-group row">


      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1"> {{$t('master_rooms')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="villa" v-model="form.room_master" :class="[{'is-invalid':this.errorFor('room_master')}]">

     <option value="1">1 {{$t('master_rooms')}}</option>
      <option value="2">2 {{$t('master_rooms')}}</option>
      <option value="3">3 {{$t('master_rooms')}}</option>
      <option value="4">4 {{$t('master_rooms')}}</option>
      <option value="5">5 {{$t('master_rooms')}}</option>
      <option value="6">6 {{$t('master_rooms')}}</option>
      <option value="7">7 {{$t('master_rooms')}}</option>
      <option value="8">8 {{$t('master_rooms')}}</option>

    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('room_master')" :key="'room_master' + index" >{{ error }}</div>
      </div>


      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('majlis')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="floors" v-model="form.majlis" :class="[{'is-invalid':this.errorFor('majlis')}]">
          <option value="0">0</option>
     <option value="1">1 {{$t('majlis')}}</option>
      <option value="2">2 {{$t('majlis')}}</option>
      <option value="3">3 {{$t('majlis')}}</option>
      <option value="4">4 {{$t('majlis')}}</option>


    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('majlis')" :key="'majlis' + index" >{{ error }}</div>
      </div>


      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('living room')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="floors" v-model="form.living_room" :class="[{'is-invalid':this.errorFor('majlis')}]">
          <option value="0">0</option>
     <option value="1">1 {{$t('living room')}}</option>
      <option value="2">2 {{$t('living room')}}</option>
      <option value="3">3 {{$t('living room')}}</option>
      <option value="4">4 {{$t('living room')}}</option>


    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('majlis')" :key="'majlis' + index" >{{ error }}</div>
      </div>

  </div>

   <div class="form-group row">
 <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('kitchen')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="villa" v-model="form.kitchen" :class="[{'is-invalid':this.errorFor('kitchen')}]">
      <option value="1">1 {{$t('kitchen')}}</option>
      <option value="2">2 {{$t('kitchen')}}</option>
      <option value="3">3 {{$t('kitchen')}}</option>
      <option value="4">4 {{$t('kitchen')}}</option>


    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('kitchen')" :key="'kitchen' + index" >{{ error }}</div>
      </div>

      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('dining')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="villa" v-model="form.dining" :class="[{'is-invalid':this.errorFor('dining')}]">
       <option value="1">1 {{$t('dining')}}</option>
      <option value="2">2 {{$t('dining')}}</option>
      <option value="3">3 {{$t('dining')}}</option>
      <option value="4">4 {{$t('dining')}}</option>
    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('dining')" :key="'dining' + index" >{{ error }}</div>
      </div>


      <div class="col-md-4 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('bathroom')}}</label>
    <select  class="form-control" id="exampleFormControlSelect1" name="bathroom" v-model="form.bathroom" :class="[{'is-invalid':this.errorFor('bathroom')}]">
        <option value="1">1 {{$t('bathroom')}}</option>
      <option value="2">2 {{$t('bathroom')}}</option>
      <option value="3">3 {{$t('bathroom')}}</option>
      <option value="4">4 {{$t('bathroom')}}</option>

    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('bathroom')" :key="'bathroom' + index" >{{ error }}</div>
      </div>


  </div>

  <div class="form-group row">


      <div class="col-md-6 col-sm-12">
    <label for="exampleFormControlSelect1">{{$t('Service_room_placement')}}  </label>
    <select  class="form-control" id="exampleFormControlSelect1" name="villa" v-model="form.Service_room_placement" :class="[{'is-invalid':this.errorFor('Service_room_placement')}]">
      <option value="1">{{$t('inside')}}</option>
      <option value="2">{{$t('outside')}}</option>

    </select>

           <div class="invalid-feedback" v-for="(error, index) in this.errorFor('Service_room_placement')" :key="'Service_room_placement' + index" >{{ error }}</div>
      </div>
      <div class="col-md-6 col-sm-12">
<label for="exampleFormControlSelect1">مساحة البناء  </label>
          <input class="form-control"  v-model="tab" placeholder="2150 Sqft"  :class="[{'is-invalid':this.errorFor('sqft')}]">
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('sqft')" :key="'sqft' + index" >{{ error }}</div>

      </div>



  </div>
 <div class="form-group row">

    <div class="col-md-6 col-sm-12">
    <label for="exampleFormControlSelect2">{{$t('Emirates')}}</label>
    <select  class="form-control" id="exampleFormControlSelect2" name="Emirates" v-model="form.Emirates" :class="[{'is-invalid':this.errorFor('Emirates')}]">
      <option value=7>{{$t('abu_dabhi')}}</option>
                <option value=1>{{$t('dubai')}}</option>
                <option value=5>{{$t('sharja')}}</option>
                <option value=6>{{$t('ajman')}}</option>
                <option value=4>{{$t('um_alqwin')}}</option>
                <option value=3>{{$t('ras_alkhima')}}</option>
                <option value=2>{{$t('fujairah')}}</option>


    </select>
     <div class="invalid-feedback" v-for="(error, index) in this.errorFor('Emirates')" :key="'Emirates' + index" >{{ error }}</div>
    </div>
     <div class="col-md-6 col-sm-12">
    <label for="exampleFormControlSelect2">{{$t('price')}}</label>
     <input class="form-control"   v-model="price" :class="[{'is-invalid':this.errorFor('price')}]">


     <div class="invalid-feedback" v-for="(error, index) in this.errorFor('price')" :key="'price' + index" >{{ error }}</div>
    </div>

  </div>

    <div class="form-group row">

      <div class="col-md-12 col-sm-12">
<label for="exampleFormControlSelect1">سعر التصميم  </label>
          <input class="form-control"  v-model="design" 
           placeholder=""  :class="[{'is-invalid':this.errorFor('design')}]">
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('design')" :key="'design' + index" >{{ error }}</div>


      </div>

    

  </div>

  
    <div class="form-group row">

    

           <div class="col-md-12 col-sm-12">
<label for="exampleFormControlSelect1">سعر الاشراف / شهرياً </label>
          <input class="form-control"  v-model="supervision" placeholder=""  :class="[{'is-invalid':this.errorFor('supervision')}]">
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('supervision ')" :key="'supervision ' + index" >{{ error }}</div>

      </div>

  </div>

     <div class="form-group row">

      <div class="col-md-6 col-sm-12">
<label for="exampleFormControlSelect1"> اسم المشرف(المهندس)  </label>
          <input class="form-control" type="text" v-model="NameEng" placeholder=""  :class="[{'is-invalid':this.errorFor('tab')}]">
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('tab')" :key="'tab' + index" >{{ error }}</div>


      </div>

           <div class="col-md-6 col-sm-12">
<label for="exampleFormControlSelect1">رقم هاتف المشرف </label>
          <input class="form-control"  v-model="PhoneEng" placeholder="" dir="ltr" 
          :class="[{'is-invalid':this.errorFor('supervision')}]">
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('supervision ')" :key="'supervision ' + index" >{{ error }}</div>

      </div>

  </div>




</form>

                            </div>
</div>
<div class="col-md-6 col-sm-12">


     <div class="form-group">



              <div class="form-group ">




 <div class="form-group mt-3 mb-3 ml-3 mr-3">
   <!-- <label for="exampleFormControlInput1">Photo</label>
    <input type="file" @change="newPhoto($event)" class="form-control" id="photo" name="photo">
    !-->


        <div class="uploader-container mb-2"
          @dragenter.prevent="OnDragEnter"
         @dragleave.prevent="OnDragLeave"
         @dragover.prevent


         :class="{dragging:isDragging} "
         >
            <i class="fa fa-image" aria-hidden="true"></i>
            <p> Add Some Photos</p>
            <div class="file-input">
                <label for="file">Choose file</label>
                <input type="file" name="file[]"   @change.prevent="onImageChanged" id="file" multiple >

        </div>
  <div class="image-preview" v-show="images.length" style="display: flex;">
            <span class="image-wrapper mr-3 " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">



                    <span v-if="files[i]['type']==='image/jpeg' || files[i]['type']==='image/png' ">

                     <img :src="image" :alt='`image ${i}`' width="50"  >

                      <a class="  text-center" @click.prevent='removeImage(i)' ><i class="close fa fa-close"> </i> </a>


                     </span>




                </span>

            </span>
        </div>
        </div>
        <strong v-if="FileNotAllowd" class="text-danger">{{FileNotAllowd}}</strong>



 </div>



        </div>
</div>
<h3 class="mt-3 mb-3 text-muted h5" :class="$t('text_align')"> {{$t('Type_of_Ads')}} </h3>
 <div class="form-group">
    <label class="checkbox d-bolck" :dir="$t('directions')" >

  <input type="radio" name="flexRadioDefault" v-model="ads" value="0" checked>
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4"> {{$t('ads')}}</span>
</label>

 <label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="radio" name="flexRadioDefault" v-model="ads" value="1">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4"> {{$t('offer')}}</span>
</label>
                                </div>

 <div class="includes">
<h3 class="mt-3 mb-3 text-muted h5" :class="$t('text_align')">العرض يشمل </h3>
 <div class="form-group row ">
<div class="col-6">
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="Consultant_fee">
  <span class="check" ></span>
  <span class="mr-4 ml-4">رسوم الاستشارات   </span>
</label>
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="CostGov">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> رسوم الدوائر الحكومية</span>
</label>
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="tabCos">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> تكلفة البناء</span>
</label>


<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="conditioning">
  <span class="check"></span>
  <span class="mr-4 ml-4"> التكييف</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="the_fence">
  <span class="check"></span>
  <span class="mr-4 ml-4"> السور</span>
</label>
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="electric_pendants">
  <span class="check"></span>
  <span class="mr-4 ml-4"> المعلقات الكهربائية</span>
</label>



</div>
<div class="col-6">
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox"  v-model="Bedroom_wardrobes">
  <span class="check"></span>
  <span class="mr-4 ml-4">  خزائن غرف النوم</span>
</label>
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="the_elevator">
  <span class="check"></span>
  <span class="mr-4 ml-4"> المصعد</span>
</label>



     <label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="pelvis">
  <span class="check"></span>
  <span class="mr-4 ml-4"> الحوض</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="interior_decoration">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> الديكور الداخلي</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="Kitchen_Cabinets">
  <span class="check"></span>
  <span class="mr-4 ml-4"> خزائن المطبخ</span>
</label>
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="garden_design">
  <span class="check"></span>
  <span class="mr-4 ml-4"> تصميم الحدائق</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="gypsum">
  <span class="check"></span>
  <span class="mr-4 ml-4">  الجبس</span>
</label>
  </div>
 </div>
 </div>


   <a @click.prevent="submit" class="theme-btn  mx-auto" v-if="isLoggedIn"  >
      {{$t('post')}}</a>
      <a href="/login"  class="btn btn-dark" v-else>
       <i class="fa fa-sign-in"></i>
        قم بتسجيل الدخول اولا

      </a>

</div>
</div>
</div>
                            </div>
</template>


<script>
import recent from '../v-dash/recent.vue';
import { mapState, mapGetters } from "vuex";
import ConstructionsAds from './ConstructionsAds.vue';
import HvacAds from './hvac-ads.vue';
export default {
  components: { recent, ConstructionsAds, HvacAds },

    data () {
          const lang = localStorage.getItem('lang') || 'ar';
            return {
                lang:lang,
            form:{
                title: '',
                desc: '',
                Emirates: '',
                villa: '',
                floors:'',
                rooms:'',
                 room_master:'',
                 living_room:'',
                majlis:'',
                bathroom:'',
                dining:'',
                kitchen:'',
                Service_room_placement:'',
              },
               price:'',
              PhoneEng:null,
              NameEng	:null,
              supervision:null,
              tab:null,
              design:null,

              photo:'',
              loading:false,
              ret:null,
              status:null,
              errors:null,
              recents:null,
             successPost: false,
             alert:'d-none',
             isDragging:false,
             counter:0,
            files:[],
            images:[],
            FileNotAllowd:'',
            Post:'Post',
            
            Consultant_fee:'',
            conditioning:'',
            gypsum:'',
            electric_pendants:'',
            Bedroom_wardrobes:'',
            Kitchen_Cabinets:'',
            the_elevator:'',
            pelvis:'',
            interior_decoration:'',
            garden_design:'',
            the_fence:'',
            CostGov:'',
            tabCos:'',
            
            ads:'',
         
            number:'',


            }
    },


    created(){

        this.detailsTender();


    },
    watch: {
        PhoneEng() {
        var x = this.PhoneEng.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.PhoneEng = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  

    },
          tab(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.tab = result);
    },
       price(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.price = result);
    },
    design(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.design = result);
    },
     supervision(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.supervision = result);
    }
    },
   
    methods:{

 designString(){

        
           this.design =  Number(this.design).toLocaleString();
      
        
      },

 detailsTender(page ){
          axios.get("/api/Ads?page="+page).then(response=>{
        this.recents = response.data;
        this.loading = false;
         })
         },
  addImage(file){

    function getFileExtension(filename){

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

// passing the filename
const result1 = getFileExtension(file.name);
console.log(result1);



                if(!file.type.match('image.*') ){
                   this.FileNotAllowd =`should be Jpg Or Png `;
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)



                reader.readAsDataURL(file);
                 this.progressbar = "w-100";
                 this.FileNotAllowd ='';
            },
        onImageChanged(e){
               const files = e.target.files;
               Array.from(files).forEach(file => this.addImage(file))
            },
            OnDragEnter(){
                  this.isDragging = true;
                  this.counter++;

            },
            OnDragLeave(){
                  this.counter--;
                  if(this.counter <=0){
                      this.isDragging = false;
                  }

            },
            onDrop(e){
             this.isDragging = false;
               const files = e.dataTransfer.files;
               Array.from(files).forEach(file => this.addImage(file))
            },

            removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);




            },
                directTo(id){

 this.$router.push({ path: `/myads/details/${id}`});
        },

         submit()
        {


        this.loading=true;
       // this.ret='spinner-grow text-light';


    let data = new FormData();



        //data.append('imageAds', this.photo);
     this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });

data.append('Consultant_fee', this.Consultant_fee);
data.append('conditioning', this.conditioning);
data.append('gypsum', this.gypsum);
data.append('electric_pendants', this.electric_pendants);
data.append('Bedroom_wardrobes', this.Bedroom_wardrobes);
data.append('Kitchen_Cabinets', this.Kitchen_Cabinets);
data.append('the_elevator', this.the_elevator);
data.append('pelvis', this.pelvis);
data.append('interior_decoration', this.interior_decoration);
data.append('garden_design', this.garden_design);
data.append('the_fence', this.the_fence);
data.append('CostGov', this.CostGov);
data.append('tabCos', this.tabCos);

  data.append('ads', this.ads);





        data.append('title', this.form.title);
        data.append('Emirates', this.form.Emirates);
        data.append('desc', this.form.desc);
        data.append('villa', this.form.villa);
        data.append('price', this.price);
        data.append('floors', this.form.floors);
        data.append('rooms', this.form.rooms);
        data.append('room_master', this.form.room_master);
        data.append('majlis', this.form.majlis);
        data.append('bathroom', this.form.bathroom);
        data.append('dining', this.form.dining);
        data.append('kitchen', this.form.kitchen);
        data.append('living_room', this.form.living_room);  

        data.append('PhoneEng', this.PhoneEng);
        data.append('NameEng', this.NameEng);
        data.append('supervision', this.supervision);
        data.append('sqft', this.tab);
        data.append('design', this.design);

        
        

        data.append('Service_room_placement', this.form.Service_room_placement);

            axios.post(`/api/Ads/new`,data).then(response=>{
            if(200===response.status){
                // this.recents = response.data.data;


                   $('#exampleModal').modal('show');
                $('.modal-backdrop').css('display','block');


                this.form.title =" "
                this.form.Emirates =" "
                this.form.desc =" "
                this.form.villa =" "
                this.price =" "
                this.form.floors =" "
                this.form.rooms =" "
                this.form.kitchen =" "
                this.form.majlis =" "
                this.form.bathroom =" "
                this.form.dining =" "
           
                this.form.Service_room_placement =" "
                this.files=" "
                this.images=" "




                this.Consultant_fee=false
                this.conditioning=false
                this.gypsum=false
                this.electric_pendants=false
                this.Bedroom_wardrobes=false
                this.Kitchen_Cabinets=false
                this.the_elevator=false
                this.pelvis=false
                this.interior_decoration=false
                this.garden_design=false
                this.the_fence=false
                 this.ads=false
                this.the_fence=false
                this.tab =false
                this.CostGov=false
                this.tabCos=false;



                //      files.splice(0,this.files.length)
                //      this.files=" "




            }


       })
       .catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       })
       .then(()=>(this.loading=false,this.ret=" "));

    },
    errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    }
},computed: {
    hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
     ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  IsUser(){
            return this.$store.getters.IsUser
        },


    }
}
</script>
<style scoped>

img {
    width: 50px;
    height: 50px;
    border-radius: 10px;

}
   .alert-successs {
    color: #fff;
    background-color: #4ea255;

    }

.badge-custom{
    background: #cef2ef;
    color:#00998c;
}
.page-link {
    z-index: 2;
    color: #dc3545;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}
.bg-orange{
    background:#dc3545 ;
    border-radius: unset;
    padding: 10px
}

</style>

<style lang="scss" scoped>
 .image-preview{
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        margin-top: 4rem;
         border-radius: 30px;
        position: absolute;
         bottom: 2px;
        }
 .uploader-container{
        background: #ffffff;
   text-align: center;
    font-size: 25px;
    border: 2px dashed #f1f1f1;
    padding: 1rem 2rem;
    position: relative;
    color: #c3c3c3;
    &.dragging{
        background: #fff;
        color: #797979;
        border:3px dashed #1adf65;
        .file-input label{
            background: #909090;
            color:#fff;
        }
    }

    i{
            font-size: 1rem;
    margin-top: 1rem;
    }
     .close{
        cursor: pointer;
        margin: auto;
    display: contents;

    }
    .file-input{
        width: 250px;
        margin: auto;
        height: 71px;
        position: relative;
        input,label{
               background: #fff;
    color: #e74c3c;
    padding: 0.5rem;
    position: absolute;
    margin-top: -15px;
    font-size: 16px;
    left: 0;
    top: 0;
    width: 100%;
    cursor: pointer;
    border-radius: 5px;
        }
        input{
            opacity: 0;
            z-index: 2;

        }

        .image-wrapper{
        display: flex;
        flex-direction: column;
        background: #fff;
        color: #000;
        justify-content: space-between;
        align-items: self-start;
        padding: 3px;
        margin-bottom: 2rem;
        box-shadow: 1px 0px 10px snow;
            width: 100px;


        }
        img{
            width:50px;
            height:50px;
            border-radius: 10px;
        }

    }

 }
</style>

<style  scoped>
    .links{
        cursor:pointer;
        padding: 10px;
    }
    .links:hover{
        background: #eee;
        cursor:pointer;
        width: 100%;
    }


</style>
<style lang="scss" scoped>

 

//   .checkbox ,radio {
//     display: block;
//     position: relative;
//     padding-left: 30px;
//     margin-bottom: 12px;
//     cursor: pointer;
//     font-size: 14px;
//     -webkit-user-select: none;
//     -moz-user-select: none;
//     -ms-user-select: none;
//     user-select: none;

//     /* this hide the default checkbox */
//     input {
//       position: absolute;
//       opacity: 0;
//       cursor: pointer;
//       height: 0;
//       width: 0;

//       &:checked ~ .check {
//         background-color: #0f2396;

//         &:after {
//           display: block;
//         }
//       }
//     }

//     .check {
//       position: absolute;
//       top: 10px;
//       height: 14px;
//       width: 14px;
//       background-color: white;
//       border: 2px solid #0f2396;
//       border-radius:5px;

//       &:after {
//         content: "";
//         position: absolute;
//         display: none;

//         left: 3px;
//         top: 1px;
//         width: 4px;
//         height: 8px;
//         border: 3px solid white;
//         border-width: 0 1.5px 1.5px 0;
//         -webkit-transform: rotate(45deg);
//         -ms-transform: rotate(45deg);
//         transform: rotate(45deg);
//       }
//     }
//   }




</style>
