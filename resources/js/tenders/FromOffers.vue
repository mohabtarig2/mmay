
<template>
  <div class="container text-right" :dir="$t('directions')">
  
   <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="text-center"><i class='bx bxs-check-circle text-success'></i></div>
        <div class="text-center font-weight-bold">.تم ارسال طلبك بنجاح سيتم التواصل معكم قريباُ </div>

      </div>

    </div>
  </div>
</div>

    

             <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="text-center font-weight-bold">  ملاحظة : اي زيادة او نقصان في المواصفات سوف يتم تعديل على تكلفة البناء
             </div>

      </div>

    </div>
  </div>
</div>
 <h1 class=" text-muted text-center"> {{$t('tender_request')}}  </h1>
    <div class="row mt-4">
         <div class="offset-md-2" >


      </div>
      <div class="col-md-8" >
        <div class="contact-form">
          <div class="card-body"  v-for="offer ,index in offers " :key="index">

            	<div class="modal fade" id="DesignrRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      	<div class=" m-b-30 model-contact">
							<h4 class="p-sidebar-title">طلب التصميم</h4>
							<form class="p-schedule-tour">
								<div class="row">


									<div class="col-12">


<div v-if='success!=null'>
<div class="alert alert-success">
{{$t('request')}} <i class="fa fa-check-circle-o"></i>
</div>
</div>
      <div class="card-body">
        <form >


<div class="form-group">
<p class="theme-color text-right font-weight-bold">     اضف ملاحظات</p>
<textarea v-model="notes" placeholder="ملاحظاتك" required="required"></textarea>
</div>
<div class="form-group">
    <p class="theme-color text-right font-weight-bold">       رقم الموبايل</p>

  <input type="text" class="form-control" placeholder="Mob : (971) - XXX-XXXXXX" v-model="phone" dir="ltr">
                
</div>

<div class="form-group">
    <p class="theme-color text-right font-weight-bold">       رقم الواتساب</p>

  <input type="text" class="form-control" placeholder="Whatsapp : (971) - XXX-XXXXXX" v-model="whatsapp" dir="ltr">
                
</div>
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
      <div class="text-right form-group" dir="rtl">
            <p class="font-weight-bold theme-color"> {{$t('build_by')}}</p>

        <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="1" name="typeBuild"  v-model="typeBuild">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Loan')}}</span>
         </label>
             <label class="checkbox d-bolck" :dir="$t('directions')" >
            
           <input type="radio" value="Grant"  name="typeBuild"  v-model="typeBuild">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Grant')}}</span>
             </label>
</div>
            

            <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
أذكر  قيمة القرض
<sup class="text-danger"> (اختياري)</sup>
                </div>
  <input type="text" class="form-control" placeholder="" v-model="priceGrant">
                
</div>

        <div class="text-right form-group" dir="rtl">
<p class=" font-weight-bold theme-color">الجهة المقدمة للمنحة </p>

             
    <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="1" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ زايد للاسكان</span>
    </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="2" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ محمد بن راشد للاسكان</span>
     </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="3" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج ابوظبي للاسكان</span>
     </label>
      <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="4" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان</span>
      </label>

      <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="5" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان اسناد</span>
      </label>
   <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="6" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">  الديوان</span>
   </label>

        </div>

        <div class="text-right">

    <p class="theme-color font-weight-bold">البنك الممول اللمنحة  
<sup class="text-danger"> (اختياري)</sup>
    </p>
<div class="form-group">
<input type="text" class="form-control" placeholder="" v-model="BankProvider">
</div>
        </div>




            <div>




            </div>



        </form>
      </div>

	<div class="schedule-tour-btn">
				<button class="theme-btn" @click.prevent="payForm(offer)"
			>ارسال</button>
			</div>
		</div>
	</div>
</form>
</div>

    </div>
  </div>
</div>

           

           


            
            <form   class="c-form-inner" v-if="o_form">

              <div class="text-right form-group " dir="rtl">

                <label for=" h6"><span class=" h6 font-weight-bold thm-color">
                  
                    العنوان
                    </span>
                    </label>
                    <p>
             {{offer.title}}
                    </p>
              </div>
              
              <div class="form-group">
                  <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1"><span class="thm-color">الوصف</span></label>
              <p>{{offer.Description}}</p>
                </div>
              </div>

<div class="row">
    <div class="col-6">
              <div class="font-weight-bold h6 mt-3 text-right thm-color">اختار نوع الفيلا</div>

              <div class="form-group text-right ">

 {{offer.type_villa==1 ? $t('classic') : null}}
 {{offer.type_villa==2 ? $t('modern') : null}}
                                </div>

    </div>

    <div class="col-6">

 <div class="font-weight-bold h6 mt-3 text-right thm-color">الطوابق</div>

              <div class="form-group text-right">
                  {{offer.floors==1 ? 'طابق + طابق ارضي' : null}}
                  {{offer.floors==2 ? 'طابق + طابق ارضي' : null}}
 {{offer.floors==3 ? 'طابقين + طابق ارضي' : null}}
 {{offer.floors==4 ? '3 طوابق + طابق ارضي' : null}}
                                </div>
    </div>
</div>




              <!-- ---------End Type floors-------------------------------------!-->

              <div class="rooms">
                <div class="row text-right" >
                  <div class="col-6 " >
                    <div class="form-group">
                    <label for="customRange3">
                       <span class="h6 thm-color font-weight-bold"> عدد غرف ماستر</span>
                        </label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="offer.room_master"
                      name="masterRoom"
                      :class="[{'is-invalid': errorFor('mastar_room')}]"
                       placeholder="مثال : 5" min="0"

                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('mastar_room')"
                      :key="'mastar_room' + index"
                    >{{ error }}</div>
                  </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                    <label for="customRange3">
                         <span class="h6 thm-color font-weight-bold">
                        عدد غرف النوم </span></label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="offer.rooms"
                      name="rooms"
                      :class="[{'is-invalid': errorFor('bedroom')}]"
                       placeholder="مثال : 5" min="0"
                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('bedroom')"
                      :key="'bedroom' + index"
                    >{{ error }}</div>
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-4">
                    <label for="customRange3"> <span class="h6 thm-color font-weight-bold"> عدد غرف المعيشة</span></label>
                    <input
                      type="number"
                      class=" form-group form-control"
                      v-model="offer.living_room"
                      name="living_room"
                      :class="[{'is-invalid': errorFor('living_room')}]"
                       placeholder="مثال : 5" min="0"
                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('living_room')"
                      :key="'living_room' + index"
                    >{{ error }}</div>
                  </div>

                  <div class=" form-group col-4">
                    <label for="customRange3"> <span class="h6 thm-color font-weight-bold">
                        عدد المجالس
                        </span>
                        </label>
                    <input
                      type="number"
                      class="form-group form-control"
                      v-model="offer.majlis"
                      name="majlis"
                      :class="[{'is-invalid': errorFor('majlis')}]"
                      placeholder="مثال : 5" min="0"

                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('majlis')"
                      :key="'majlis' + index"
                    >{{ error }}</div>
                  </div>
                  <div class="form-group  col-4">
                    <label for="customRange3">
                         <span class="h6 thm-color font-weight-bold">
                        عدد المطابخ
                         </span>
                        </label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="offer.kitchen"
                      name="kitchen"
                      :class="[{'is-invalid': errorFor('kitchens')}]"
                      placeholder="مثال : 5" min="0"

                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('kitchens')"
                      :key="'kitchens' + index"
                    >{{ error }}</div>
                  </div>
                </div>

                <div class="row">
                  <div class=" form-group   col-6">
                    <label for="customRange3"> <span class="h6 thm-color font-weight-bold">
                        عدد غرف الطعام
                        </span>
                         </label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="offer.dining"
                      name="dining"
                      :class="[{'is-invalid': errorFor('dining_room')}]"
                     placeholder="مثال : 5" min="0"

                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('dining_room')"
                      :key="'dining_room' + index"
                    >{{ error }}</div>
                  </div>
                  <div class=" form-group col-6">
                    <label for="customRange3">
                         <span class="h6 thm-color font-weight-bold">
                        الحمام
                         </span>
                        </label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="offer.bathroom"
                       name="bathroom"
                      :class="[{'is-invalid': errorFor('bathroom')}]"
                     placeholder="مثال : 5" min="0"

                    />
                    <div
                      class="invalid-feedback"
                      v-for="(error, index) in errorFor('bathroom')"
                      :key="'bathroom' + index"
                      placeholder="مثال : 5" min="0"

                    >{{ error }}</div>
                  </div>
                </div>


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

  <input type="radio" name="replacement"   value="outside"
                    v-model="position">
  <span class="check" style="border-radius:10px"></span>
  <span class="mr-4 ml-4 ">
      خارج الفيلا

      </span>
</label>
                                </div>
                <!-- <div class="form-check">
                  <label class="form-check-label" for="flexRadioDefault3">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="flexRadioDefault3"
                      id="flexRadioDefault3 "
                      value="inside"
                      v-model="tenders.position"
                    />
                    inside villa
                    <sub>
                      <i class="text-muted">MAID ROOM + MAIN KITCHEN + STORE</i>
                    </sub>
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault3"
                    id="flexRadioDefault3"
                    value="outside"
                    v-model="tenders.position"
                  />
                  <label class="form-check-label" for="flexRadioDefault3">Outside villa</label>
                  <div
                    class="invalid-feedback"
                    v-for="(error, index) in errorFor('position')"
                    :key="'position' + index"
                  >{{ error }}</div>
                </div> -->

                <!--<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3" value="both" v-model="tenders.position">
  <label class="form-check-label" for="flexRadioDefault3">
    Both
  </label>
</div>
                -->




                <!-- <div for="points"> ( الف {{Minval}} -  مليون {{Maxval}} ): الميزانية</div> -->
<!-- <input type="range" id="points" name="points" min="800" max="5000" v-model="Minval">


<input type="range" id="points" name="points" min="5000" max="5000" v-model="Maxval"> -->

              


                <div class="  mb-3">


											<!-- Property Tab One -->


														<div class="row">
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




        
                </div>


           <div  class="container-image">
             <div v-for="image , index in offer.villa_image" :key="index">

                 <img :src="image.path" class="image-flex">
                 <!-- <a :href="image.path" download="download" class="text-right btn btn-light mr-2 ml-2">تحميل</a>
                     <a @click="openImageToDelete(image.id,image.path)"  class="text-right btn btn-danger mr-2 ml-2"
                     data-toggle="modal" data-target="#openImageToDelete">ازالة</a> -->

             </div>

           </div>

           <div class="includes">
<h3 class="mt-3 mb-3 text-muted h5" :class="$t('text_align')">العرض يشمل </h3>
 <div class="form-group row ">
<div class="col-6">
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="Consultant_fee">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> رسوم الاستشارات</span>
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
  <span class="mr-4 ml-4"> العلقات الكهربائية</span>
</label>


<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="Kitchen_Cabinets">
  <span class="check"></span>
  <span class="mr-4 ml-4"> خزائن المطبخ</span>
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

  <input type="checkbox" v-model="garden_design">
  <span class="check"></span>
  <span class="mr-4 ml-4"> تصميم الحدائق</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="gypsum" :checked="offer.gypsum">
  <span class="check"></span>
  <span class="mr-4 ml-4">  الجبس</span>
</label>
  </div>
 </div>
 </div>
           

        <!-- <button class=" theme-btn mx-auto btn-block 
        mt-3 font-weight-bold" data-toggle="modal"
         data-target="#DesignrRequest"
         >
          
            
        </button> -->

        <button type="button" class="theme-btn" data-toggle="modal" data-target="#DesignrRequest">
  {{loading == false ? 'ارسال الطلب ': "انتظر قليل..."}}
    </button>
                          <!-- @click.prevent="formSubmit(offer,'update')"> -->


              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="offset-md-2">

      </div>
    </div>

  </div>

</template>

<script>
import conditions from "./conditions.vue";
import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";
import AllUae from '../auth/AllUae.vue';

export default {
  components: { conditions, ValidationErrors, AllUae },
  mixins: [validationErrors],

  data() {
    return {
      
      o_form:true,
      com_id:null,
        loading:false,
        offers:null,
             images:[],
        Minval:800,
        Maxval:1,
        progressbar:[],
        FileNotAllowd:'',

        villa: null,
        floor: null,
        position: null,
        mastar_room: null,
        bedroom: null,
        living_room: null,
        majlis: null,
        kitchens: null,
        dining_room: null,
        bathroom: null,
        both: null,
        min: null,
        max: null,

        Notes: null,


      files: [],
      success: "",
      errors: null,
      status: null,
    open_select:null,
    emirates_selected:null,
    open_type_select:null,
       passport:null,
        map:null,
      progress:0,
        progress2:0,
        bank:null,
        mbr:null,
        szp:null,
        Special_grant:null,
        other:null,
        success:null,
        FileNotMapAllowd:null,
        FileNotpassportAllowd:null,
        filePassportName:null,
      phone:null,
        whatsapp:null,
         priceGrant:null,
         BankProvider:null,
         Provider:null,
         grant:null,
         typeBuild:null,
        notes:null,

         
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
    };
  },
  watch:{
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
    }
},

  methods: {
    edito(){
      if(this.o_form==true){
        this.o_form=false
           $('#warning').modal('show');
        $('.modal-backdrop').css('display','block');
      }
         else{
        this.o_form=true
        this.getOfferForTender();
      }
    },
       open(event){
        if(event=='emirates'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"
          $('.')
    }



    },
     emirates(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
    },
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
    done(){
        $('#success').modal('hide');
        $('.modal-backdrop').css('display','none');

        

        
    },
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
           succesAlert(){
        $('#success').modal('show');
                $('.modal-backdrop').css('display','block');
                
    },
      payForm(offer){
      
        
          console.log('hi Frm Pay Offr');
		 

      
        let  title =  offer.title;
        let  masterRoom = document.querySelector("input[name=masterRoom]").value;
          let rooms = document.querySelector("input[name=rooms]").value;
         let living_room = document.querySelector("input[name=living_room]").value;
         let majlis = document.querySelector("input[name=majlis]").value;
         let kitchen = document.querySelector("input[name=kitchen]").value;
         let dining	 = document.querySelector("input[name=dining]").value;
        let bathroom	 = document.querySelector("input[name=bathroom]").value;
        let TypeVilla	 = offer.type_villa;
        let Description	 = offer.Description;
        let floors	 = offer.floors;
        let Emirates	 = this.emirates_selected;
        let supervision	 = offer.supervision;
        let design	 = offer.design;

        let images = offer.villa_image;

let data = new FormData();
//  images.forEach(image =>{
//             data.append('images[]',image.name)
//         })


      data.append("com_id", this.com_id);
      data.append("villa_type", TypeVilla);
      data.append("floor", floors);
      data.append("position", this.position);
      data.append("mastar_room", masterRoom);
      data.append("bedroom", rooms);
      data.append("living_room", living_room);
      data.append("majlis", majlis);
      data.append("kitchens", kitchen);
      data.append("bathroom", bathroom);
      data.append("dining_room", dining);
      data.append("emirates", Emirates);
      data.append("title",title);
      data.append("Description", Description);
      data.append("supervision", supervision);
      data.append("design", design);
   

      

		  //additional info 
      
       

		   let	phone_Eng =offer.phone;
		 let	name_eng = offer.name_eng;
		

      let Consultant_fee	 = this.Consultant_fee;
     let conditioning	 = this.conditioning;
     let gypsum	 = this.gypsum;
      let electric_pendants = this.electric_pendants
      let Bedroom_wardrobes	 = this.Bedroom_wardrobes;
     let Kitchen_Cabinets	 = this.Kitchen_Cabinets;
      let the_elevator	 = this.the_elevator;
      let pelvis	 = this.pelvis;
      let interior_decoration		 = this.interior_decoration	;
      let garden_design		 = this.garden_design	;
      let the_fence		 = this.the_fence	;

      data.append("Consultant_fee", Consultant_fee);
      data.append("conditioning", conditioning);
      data.append("gypsum", gypsum);
      data.append("electric_pendants", electric_pendants);
      data.append("Bedroom_wardrobes", Bedroom_wardrobes);
      data.append("Kitchen_Cabinets", Kitchen_Cabinets);
      data.append("the_elevator", the_elevator);
      data.append("interior_decoration", interior_decoration);
      data.append("garden_design", garden_design);
      data.append("the_fence", the_fence);
      data.append("pelvis", pelvis);
     
     

      data.append("phones", phone_Eng);
      data.append("Name_eng", name_eng);
    


      data.append("rooms", offer.rooms);
      data.append("kitchen", offer.kitchen);
      data.append("c_id", offer.c_id);
      data.append("sqft", offer.sqft);
		  data.append("position", offer.Service_room_placement);
	

	  

      
      data.append("notes", this.notes);
   data.append("priceGrant", this.priceGrant);
      data.append("BankProvider", this.BankProvider);
      data.append("Provider", this.Provider);
  
      data.append("typeBuild", this.typeBuild);
      data.append("phone", this.phone);
      data.append("whatsapp", this.whatsapp);

      data.append("Special_grant", this.Special_grant);
      data.append("ads_id", offer.id);
      data.append("passport",this.passport,this.passport.name);
      data.append("map",this.map,this.map.name);
      data.append("Isupdated",'yes');


      
      

 axios.post('paymentOffer',data).then(res=>{

$('#exampleModalCenter').modal('hide');
   $('.modal-backdrop').css('display','block');

   this.succesAlert();
 this.success = res.data;



        this.bank=false;
        this.mbr=false;
        this.szp=false
        this.other=false
        this.success=false
        this.passport=null
        this.Special_grant=false;
        this.map=null
        this.url1=null
        this.url2=null
        this.progress=null
        this.progress2=null
        this.notes=null
        this.phone=null
        this.whatsapp=null


                })
		
        
	  },

//     formSubmit(offer , type) {

//          let title = '';
//          let masterRoom = '';
//          let rooms ='';
//          let living_room = '';
//          let majlis = '';
//          let kitchen = '';
//          let dining	 = '';
//          let bathroom	 = '';
//          let Description	 = '';
//          let floors	 = '';
//          let TypeVilla	 = '';
//          let Emirates	 = '';
         
          


  


//     //   this.errors = null;

//       //data.append('imageAds', this.photo);


//       /*
//         this.files.forEach(file =>{
//             data.append('images[]',file,file.name)
//         })
//         */


      



//           title = document.querySelector("input[name=title]").value;
//           masterRoom = document.querySelector("input[name=masterRoom]").value;
//           rooms = document.querySelector("input[name=rooms]").value;


//           living_room = document.querySelector("input[name=living_room]").value;
//           majlis = document.querySelector("input[name=majlis]").value;
//           kitchen = document.querySelector("input[name=kitchen]").value;
//           dining	 = document.querySelector("input[name=dining]").value;
//           bathroom	 = document.querySelector("input[name=bathroom]").value;
//            TypeVilla	 = offer.type_villa;
//           Description	 = document.querySelector("textarea[name=Description]").value;
//                     floors	 = offer.floors;
//                     Emirates	 = this.emirates_selected;

// let images = offer.villa_image;

// let data = new FormData();
//  images.forEach(image =>{
//             data.append('images[]',image.name)
//         })


//       data.append("com_id", this.com_id);
//       data.append("villa_type", TypeVilla);
//       data.append("floor", floors);
//       data.append("position", this.position);

//       data.append("mastar_room", masterRoom);
//       data.append("bedroom", rooms);
//       data.append("living_room", living_room);
//       data.append("majlis", majlis);
//       data.append("kitchens", kitchen);
//       data.append("bathroom", bathroom);
//       data.append("dining_room", dining);
//       data.append("emirates", Emirates);
//       data.append("title",title);
//       data.append("Notes", Description);
//       data.append("typePost", type);

      
      
//     this.loading=true;

//       axios
//         .post(`/tendersFromOffers`, data)
//         .then(response=>{
//               $('#success').modal('show');
//                 $('.modal-backdrop').css('display','block');

//               this.loading=false;
//               this.TenderID = response.data;



//                       setInterval(()=>{

//              $('#success').modal('hide');
//                 $('.modal-backdrop').css('display','none');

//         },5000 );
//         })
//         .catch(error=>{
//             if(422===error.response.status){
//                 // console.log(error.response.data.errors);
//                 this.errors=error.response.data.errors
//             }
//             this.status=error.response.status

//         })
//         .then(() => ((this.loading = false), (this.ret = false)));
//     },
        getOfferForTender(){
            axios.get('/api/ads/details/'+this.$route.params.id).then(res=>{
            this.offers = res.data;
            

              this.offers.forEach(offer =>{
                this.com_id = offer.c_id;
           
        })
        

            

        })
    },
    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
  },
  created() {
      this.getOfferForTender();
  },
  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },
  },
};
</script>
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
    input  {
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


</style>


<style scoped>
.container-image {
 display: flex;
     flex-wrap: wrap;
     padding: 5px;
     justify-content: flex-end;
}

.image-flex{
    width: 100px !important;
    height: 100px !important;
     margin: 5px;
}
</style>

<style lang="scss" scoped>

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
        background-color: #0f2396;

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
      border: 2px solid #0f2396;
      border-radius:5px;

      &:after {
        content: "";
        position: absolute;
        display: none;

        left: 3px;
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
  </style>

  
  
<style lang="scss" scoped>

 

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
        background-color: #2343f8;

        &:after {
          display: block;
        }
      }
    }

    .check {
      position: absolute;
      top: 7px;
      height: 14px;
      width: 14px;
      background-color: white;
      border: 2px solid #2343f8;
      border-radius:5px;

      &:after {
        content: "";
        position: absolute;
        display: none;

        left: 3px;
        top: 1px;
        width: 4px;
        height: 7px;
        border: 3px solid white;
        border-width: 0 1.5px 1.5px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
    }
  }




</style>