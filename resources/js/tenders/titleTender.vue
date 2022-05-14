<template>
<div class="container">



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
<div class="contact-form">

    <h1 class="text-center thm-color">  تحديث البيانات

    </h1>
    <p class="main-color font-weight-bold text-center">
        مناقصة رقم
        ({{tender_id}})
        </p>

            <form enctype="multipart/form-data" class="c-form-inner">

                <div class="text-right form-group " dir="rtl">

                <label for=" h6"><span class=" h6 font-weight-bold thm-color">
                    {{$t('title')}}
                    </span>
                    </label>
                <input
                  name="title"
                  :value="title"
                  :class="[{'is-invalid': errorFor('title')}]"
                  placeholder="وصف مختصر للمشروع"

                />
                <div
                  class="invalid-feedback"
                  v-for="(error, index) in this.errorFor('title')"
                  :key="'title' + index"
                >{{ error }}</div>
              </div>

               <div class=" form-group mt-3" :class="$t('text_align')" :dir="$t('direactions')">
                  <label for="exampleFormControlTextarea1 "><div class="thm-color">{{$t('description')}}</div></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    name="desc"
                    v-model="note"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل وصفاً مفصلاً لمشروعك   "

                  ></textarea>
                  <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('Notes')"
                    :key="'Notes' + index"
                  >{{ error }}</div>
                </div>

                <div class="budget" :class="$t('text_align')" :dir="$t('direactions')">
                  <div class="h6 mb-3 thm-color font-weight-bold">{{$t('budget')}}</div>
                  <div class="row">

                    <div class="  form-group col-6" dir="rtl">
                      <label >الي</label>
                      <div class="input-group mb-2">
                        <input
                          type="text"
                          id="max"
                          class="form-control "
                          placeholder="0.00 "
                          v-model="max"
                          :class="[{'is-invalid': errorFor('max')}]"
                        />

                        <!-- <div class="input-group-prepend">
                          <div class="input-group-text">{{$t('aed')}}</div>
                        </div> -->
                        <div
                          class="invalid-feedback"
                          v-for="(error, index) in this.errorFor('max')"
                          :key="'max' + index"
                        >{{ error }}</div>
                      </div>
                    </div>
                    <div class="  col-6" dir="rtl">
                      <div class="form-group mb-2">
                        <label  >من</label>

                        <input
                       
                          class="form-control osition-relative"
                          id="min"
                          placeholder="0.00 "
                          v-model="min"
                          :class="[{'is-invalid': errorFor('min')}]"
                        />
                        <!-- <div class="input-group-prepend">
                           <div class="input-group-text">{{$t('aed')}}</div>
                        </div> -->
                        <div
                          class="invalid-feedback"
                          v-for="(error, index) in this.errorFor('min')"
                          :key="'min' + index"
                        >{{ error }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="row mb-3" :dir="$t('direactiosn')">
 <div class="col-12">
                    <div class="single-property-details">
																	<label>{{$t('Emirates')}}
        <div class="nice-select " :class="open_select" tabindex="0" @click="open('emirates')">
            <span class="current">
                <all-uae :emirates="emirates_selected"></all-uae></span>
                <ul class="list">
                <li data-value="1" class="option " @click="emirates(7)">{{$t('abu_dabhi')}}</li>
                  <li data-value="2" class="option" @click="emirates(1)">{{$t('dubai')}} </li>
                  <li data-value="3" class="option"  @click="emirates(5)">{{$t('sharja')}}</li>
                  <li data-value="3" class="option"  @click="emirates(6)">{{$t('ajman')}}</li>
                  <li data-value="3" class="option"  @click="emirates(4)">{{$t('um_alqwin')}} </li>
                  <li data-value="3" class="option"  @click="emirates(3)"> {{$t('ras_alkhima')}}</li>
                  <li data-value="3" class="option"  @click="emirates(2)">{{$t('fujairah')}} </li>
                            </ul>
                    </div>
                    </label>

																</div>
                                                            </div>
                                                        </div>
              <div class="row">
      <div class="col-6">
              <div class="font-weight-bold h6 mt-3 text-right thm-color">اختار نوع الفيلا</div>

              <div class="form-group text-right ">
    <label class="checkbox d-bolck" :dir="$t('directions')" >

   <input type="radio" name="flexRadioDefault"  value="cassic" v-model="villa_type">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4 "> {{$t('classic')}}</span>
</label>

 <label class="checkbox d-bolck" :dir="$t('directions')" >

  <input type="radio" name="flexRadioDefault " value="modern" v-model="villa_type">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4"> {{$t('modern')}}</span>
</label>
                                </div>

    </div>

    <div class="col-6">

 <div class="font-weight-bold h6 mt-3 text-right thm-color">الطوابق</div>

              <div class="form-group text-right">
    <label class="checkbox d-bolck" :dir="$t('directions')" >

  <input type="radio" name="floors" value="1" v-model="floors">
  <span class="check" style="border-radius:10px"></span>
   <span class="mr-4 ml-4"> طابق + طابق ارضي </span>
</label>

 <label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="radio" name="floors" value="2"  v-model="floors">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4"> طابقين + طابق ارضي </span>
</label>
                                </div>
    </div>




</div>
<div class="row">
<div class="col-12">
 <div class="h6 font-weight-bold text-right thm-color">مكان غرفة الخدمات   </div>

                          <div class="form-group text-right">
    <label class="checkbox d-bolck" :dir="$t('directions')" >

  <input type="radio" name="replacement" value="inside"
                    v-model="position">
  <span class="check" style="border-radius:10px"></span>
   <span class="mr-4 ml-4">   داخل الفيلا
        <sub>
                      <span class="text-muted">غرفة خادمة + مطبخ رئيسي + مخزن</span>
                    </sub>
        </span>
</label>

 <label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="radio" name="replacement"   value="outside" v-model="position">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4 ">
      خارج الفيلا

      </span>
</label>
                                </div>
</div>
</div>
              <div class="row">


    <div class="col-6"  :dir="$t('directions')" >



<div  class=" text-center h6 font-weight-bold thm-color">{{$t('master_rooms')}}</div>
<div class="form-group text-center" >
     <button class="theme-btn" @click.prevent="disincrease('master')">-</button>
  <h5 class="fonr-weight-bold text-center d-inline">{{Masterincrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('master')">+</button>


              </div>
    </div>
       <div class="col-6"  :dir="$t('directions')" >



<div  class=" text-center h6 font-weight-bold thm-color">{{$t('bed_rooms')}}</div>
<div class="form-group text-center" >
   <button class="theme-btn" @click.prevent="disincrease('bedroom')">-</button>
     <h5 class="fonr-weight-bold text-center d-inline">{{Bedroomncrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('bedroom')">+</button>


              </div>
    </div>


</div>
             <div class="row mt-3">
    <div class="col-6"  :dir="$t('directions')" >



<div  class="text-center h6 font-weight-bold thm-color">{{$t('kitchen')}}</div>
<div class="form-group text-center">
   <button class="theme-btn" @click.prevent="disincrease('kitchen')">-</button>
     <h5 class="fonr-weight-bold text-center d-inline">{{kitchenincrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('kitchen')">+</button>


              </div>
    </div>

    <div class="col-6"  :dir="$t('directions')" >



<div  class=" text-center h6 font-weight-bold thm-color">{{$t('majlis')}}</div>
<div class="form-group text-center">
     <button class="theme-btn" @click.prevent="disincrease('majlis')">-</button>
  <h5 class="fonr-weight-bold text-center d-inline">{{majlisincrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('majlis')">+</button>


              </div>
    </div>



</div>

  <div class="row mt-3">
    <div class="col-6"  :dir="$t('directions')" >



<div  class="text-center h6 font-weight-bold thm-color">{{$t('bathroom')}}</div>
<div class="form-group text-center">
   <button class="theme-btn" @click.prevent="disincrease('bathroom')">-</button>
     <h5 class="fonr-weight-bold text-center d-inline">{{bathroomincrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('bathroom')">+</button>


              </div>
    </div>

    <div class="col-6"  :dir="$t('directions')" >



<div  class=" text-center h6 font-weight-bold thm-color">{{$t('dining')}}</div>
<div class="form-group text-center">
     <button class="theme-btn" @click.prevent="disincrease('dining_room')">-</button>
  <h5 class="fonr-weight-bold text-center d-inline">{{dining_room_ncrease}}</h5>
    <button class="theme-btn" @click.prevent="increase('dining_room')">+</button>


              </div>
    </div>



</div>

  <div class="row mt-3">
    <div class="col-6"  :dir="$t('directions')" >



<div  class="text-center h6 font-weight-bold thm-color">{{$t('living room')}}</div>
<div class="form-group text-center">
   <button class="theme-btn" @click.prevent="disincrease('living_room')">-</button>
     <h5 class="fonr-weight-bold text-center d-inline">{{living}}</h5>
    <button class="theme-btn" @click.prevent="increase('living_room')">+</button>


              </div>
    </div>





</div>

           <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
  رقم الواتساب 

                </div>
  <input type="text" class="form-control" placeholder="Whatsapp : (971) - XXX-XXXXXX" v-model="whatsapp" dir="ltr"
   name="whatsapp" >
                
</div>

          <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
  رقم الهاتف 

                </div>
  <input type="text" class="form-control" placeholder="Whatsapp : (971) - XXX-XXXXXX" v-model="phone" dir="ltr"
   name="phone" >
                
</div>

            <div class="text-right form-group" dir="rtl">
            <p class="font-weight-bold theme-color"> {{$t('build_by')}}</p>
 
        <label class="checkbox d-bolck" :dir="$t('directions')" >
        
              <input type="radio" name="typeBuild" value="1"  v-model="typeBuild">

            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Loan')}}</span>
         </label>
             <label class="checkbox d-bolck" :dir="$t('directions')" >
            
 <input type="radio" name="typeBuild" value="2"  v-model="typeBuild">

            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Grant')}}</span>
             </label>
</div>
            

            <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
أذكر  قيمة القرض
<sup class="text-danger"> (اختياري)</sup>
                </div>
  <input type="text" class="form-control" placeholder="" name="priceGrant" v-model="priceGrant">
                
</div>


        <div class="text-right form-group" dir="rtl">
<p class=" font-weight-bold theme-color">الجهة المقدمة للمنحة </p>

             
    <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="1"  v-model="Provider">

            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ زايد للاسكان</span>
    </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="2"  v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ محمد بن راشد للاسكان</span>
     </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="3"  v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج ابوظبي للاسكان</span>
     </label>
      <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="4"  v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان</span>
      </label>

      <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="5"  v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان اسناد</span>
      </label>
   <label class="checkbox d-bolck" :dir="$t('directions')" >
          <input type="radio" name="Provider" value="6"  v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">  الديوان</span>
   </label>

        </div>

        <div class="text-right">

    <p class="theme-color font-weight-bold">البنك الممول اللمنحة  
<sup class="text-danger"> (اختياري)</sup>
    </p>
<div class="form-group">
<input type="text" class="form-control" placeholder="" name="BankProvider" v-model="BankProvider">
</div>
        </div>


           <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
المبلغ المضاف التقريبي لطريقة التمويل
<sup class="text-danger"> (اختياري)</sup>
                </div>
  <input type="text" class="form-control" placeholder="" v-model="finance" name="finance">
         

           </div>


    <button class=" theme-btn"  @click.prevent="save()">حفظ</button>


            </form>
</div>
          </div>
</div>
</div>
     <a @click="$router.go(-1)" style="cursor:pointer" class="ml-3 text-dark mb-2 "><i class="fa fa-arrow-left  fa-1x"></i></a>
         <div class="p-descrip-box container mb-3" >


 <span><status :status="status" ></status></span>


<h4>

                 {{title}}
</h4>




           
                     <div class="d-flex float-right" v-if='IsUser==10 && this.status==0 || this.status==6'>
             <!-- <a class=" btn btn-light btn-lg" style="cursor:pointer" @click="editTitle(2)"><i class=" fa fa-edit"></i></a> -->
             <a class=" theme-btn btn-lg" v-if="edit==0" style="cursor:pointer" data-toggle="modal" data-target="#exampleModalCenter">
                 <i class=" bx bx-edit"></i>{{$t('Edit')}}</a>

</div>
        <input class=" h1 text-dark form-control"  name="title" v-if="edit==1 && IsUser==10" :value="title"  style="font-size:2rem">
        <div class="d-flex">

            <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="Message!=null">
  {{Message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <button class="btn get-start" v-if="edit==1 && IsUser==10" @click="save(id)">حفظ</button>
        </div>





        <div class="d-block ">

       <span > <i class="fa fa-clock-o text-muted mt-4" style="font-size:14px"></i> {{added_at}}</span>
        </div>
         </div>


</div>

</template>

<script>
import status from '../admin/status.vue'
import AllUae from '../auth/AllUae.vue';
import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";

export default {
  components: { status , ValidationErrors, AllUae },
  mixins: [validationErrors],
props:{title:String ,status:Number,added_at:String,id:
    Number,Message:String,edit:Number,testing:Number,floors:Number,
    villa_type:String,room_mastar:Number,
    min:String,max:String,
    bedroom:Number,kitchens:Number,majlis:Number,bathroom:Number,phone:String,whatsapp:String
    ,typeBuild:Number,priceGrant:Number,Provider:String,BankProvider:String,finance:String,
    dining_room:Number,living_room:Number,emirats:Number,note:String,position:String,getTenders:Function},

data() {
    return {
         files:[],
             images:[],
             progressbar:[],
        FileNotAllowd:'',
        errors: null,
       open_select:null,
       Masterincrease:this.room_mastar,
       Bedroomncrease:this.bedroom,
       kitchenincrease:this.kitchens,
       majlisincrease:this.majlis,
       bathroomincrease:this.bathroom,
       dining_room_ncrease:this.dining_room,
       emirates_selected:this.emirats,
       living:this.living_room,
     tender_id: this.$route.params.id,




    }
},
  watch: {
      
          min(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.min = result);
    },
       max(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.max = result);
    },
            finance(newValue){
            const result = newValue.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     this.finance = result;
    },
     phone() {
        var x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    },
	 whatsapp() {
        var x = this.whatsapp.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.whatsapp = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    },
    priceGrant(newValue){
            const result = newValue.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     this.priceGrant = result;
    },
   },

methods: {
  
       onImageChanged(event){
               const files = event.target.files;

               Array.from(files).forEach(file => this.addImage(file))


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



                if(!file.type.match('image.*')){
                   this.FileNotAllowd =`should be jpg , png `;
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)

            let data = new FormData();
          data.append("files",file,file.name);
                reader.readAsDataURL(file);
              console.log(file);
                 this.FileNotAllowd ='';



                // console.log('this file lenght '+i)
                     const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressbar =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }

                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotAllowd=null
                });
            },
            removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);




            },
    onChange(e) {
      this.file = e.target.files[0];
    },
     open(event){
         console.log('test here ')
        if(event=='emirates'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"

    }


    },
     emirates(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
    },
    increase(event){
        if(event=="living_room"){
             this.living = this.living + 1;
        }
        if(event=='master'){
             this.Masterincrease = this.Masterincrease + 1;
        }
        if(event=='bedroom'){
             this.Bedroomncrease = this.Bedroomncrease + 1;
        }

        if(event=='kitchen'){
             this.kitchenincrease = this.kitchenincrease + 1;
        }
        if(event=='majlis'){
             this.majlisincrease = this.majlisincrease + 1;
        }
        if(event=='bathroom'){
             this.bathroomincrease = this.bathroomincrease + 1;
        }
        if(event=='dining_room'){
             this.dining_room_ncrease = this.dining_room_ncrease + 1;
        }

    },

    disincrease(event){
         if(event=='master'){
        if(this.Masterincrease!=0){
            this.Masterincrease = this.Masterincrease - 1;
        }
         }
        if(event=='bedroom'){
            if(this.Bedroomncrease!=0){
             this.Bedroomncrease = this.Bedroomncrease - 1;
            }
        }

        if(event=='kitchen'){
            if(this.kitchenincrease!=0){
             this.kitchenincrease = this.kitchenincrease - 1;
            }
        }
        if(event=='majlis'){
            if(this.majlisincrease!=0){
             this.majlisincrease = this.majlisincrease - 1;
            }
        }
        if(event=='bathroom'){
            if(this.bathroomincrease!=0){
             this.bathroomincrease = this.bathroomincrease - 1;
            }
        }
        if(event=='dining_room'){
            if(this.dining_room_ncrease!=0){
             this.dining_room_ncrease = this.dining_room_ncrease - 1;
        }
        }
        if(event=="living_room"){
            if(this.living!=0){
             this.living = this.living -1;
            }
        }

    },
getTenders(data){
    console.log('new Tender in chiled'+ data )
},
    save(){


 if(this.files!=''){
      this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });
      }



 let Newtitle = document.querySelector("input[name=title]").value;

 let priceGrant = document.querySelector("input[name=priceGrant]").value;

 let BankProvider = document.querySelector("input[name=BankProvider]").value;

 let finance = document.querySelector("input[name=finance]").value;

 let phone = document.querySelector("input[name=phone]").value;
 let whatsapp = document.querySelector("input[name=whatsapp").value;
 

 
 let desc = document.querySelector("textarea[name=desc]").value;
  let min = document.querySelector("input[id=min]").value;
  let max = document.querySelector("input[id=max]").value;





 console.log('villatype ' + this.villa_type);
 console.log('floors '+this.floors);
 console.log('master room '+this.Masterincrease);
 console.log('position '+this.position);
 console.log('Bedroom '+this.Bedroomncrease);
 console.log('kitchen '+this.kitchenincrease);
 console.log('majlis '+this.majlisincrease);
 console.log('bathroom '+this.bathroomincrease);
 console.log('dining_room '+this.dining_room_ncrease);
 console.log('living '+this.living);
 console.log('typeBuild '+this.typeBuild);
 console.log('Provider '+this.Provider);


 let data = new FormData();

 data.append('title',Newtitle)
 data.append('desc',desc)
 data.append('min',min)
 data.append('max',max)
 data.append('floors',this.floors)
 data.append('master',this.Masterincrease)
 data.append('position',this.position)
 data.append('Bedroom',this.Bedroomncrease)
 data.append('kitchen',this.kitchenincrease)
 data.append('majlis',this.majlisincrease)
 data.append('bathroom',this.bathroomincrease)
 data.append('dining_room',this.dining_room_ncrease)
 data.append('living',this.living)
 data.append('villa_type',this.villa_type)
 data.append('id',this.tender_id)
 data.append('emirats',this.emirates_selected)
 data.append('typeBuild',this.typeBuild)
 data.append('priceGrant',priceGrant)
 data.append('Provider',this.Provider)
 data.append('BankProvider',BankProvider)
 data.append('finance',finance)
 data.append('whatsapp',whatsapp)
 data.append('phone',phone)

  // ,typeBuild:String,priceGrant:String,Provider:String,BankProvider:String,



     axios.post('edit/consulte/data',data).then(res=>{

         this.data = res.data;

        //    this.Message="تم تحديث العنوان"

          $("#exampleModalCenter").modal("hide");
          $(".modal-backdrop").css("display", "none");
      this.$emit('update:data',JSON.stringify(this.data))
        // this.getTenders();
     })


    },


 errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
  },
  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },


     IsUser(){
            return this.$store.getters.IsUser
        },

  },

}
</script>
<style scoped>
  .badge-success {

    background-color: #38c172;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}

</style>


<style lang="scss" scoped>
.btn-bus {background-image: linear-gradient(to right, #3454d1 0%, #3454d1  51%, #3454d1  100%)}

body {
  background-color: #eee;
  font-family: 'Nunito Sans', sans-serif;

  .checkbox ,radio {
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    /* this hide the default checkbox */
    input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;

      &:checked ~ .check {
        background-color: #3454d1;

        &:after {
          display: block;
        }
      }
    }

    .check {
      position: absolute;
      top: 10px;
      height: 14px;
      width: 14px;
      background-color: white;
      border: 2px solid #3454d1;
      border-radius:5px;

      &:after {
        content: "";
        position: absolute;
        display: none;

        left: 2;
        top: 1px;
        width: 4px;
        height: 8px;
        border: 3px solid white;
        border-width: 0 1.5px 1.5px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
    }
  }
}
.file-style{
    border:2px dotted #eee;
    background: #fff;
    border-radius: 10px;

}
.thm-color{
    color:#000;
}
.input-group-text{
    position: absolute; left: 0; top: 0 px ; height: 100%;
}
.progress {
    box-shadow: none;
    height: 8px;
    border-radius: 10px;
    background-color: #f0f0f0 !important;
}
.c-form-inner {

    border: 1px solid #eee !important;
}
.c-form-inner .form-group input {
    width: 100%;
    height: 45px;
    border: 2px solid  #E8E8E8;
    border-radius: 10px;
    padding: 15px 30px;
    font-weight: 400;
    transition: all 0.4s ease;
    background: #fff;
}
.theme-btn {

    padding: 7px 16px !important;
}
.c-form-inner {
     background: #fff;
    padding: 9px;
    border: none !important;
}
.single-property-details .nice-select {
box-shadow: none        ;
}
.alert-success
{
  background: #34d195 !important;
}
</style>
