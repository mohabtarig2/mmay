<template>
  <div>
<div class="modal fade" id="successBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

   <div class="alert alert-info alert-dismissible fade show" role="alert">
تم تحديث البيانات بنجاح
  <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  </div>
</div>


<div class="modal fade" id="DeletedBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

   <div class="alert alert-danger alert-dismissible fade show" role="alert">
تم مسح الصورة بنجاح

</div>

  </div>
</div>

<!-- {{tenders}} -->
    <title-tender

    @update:data="getNewTenders"
      v-for="(tender, index) in tenders"
      :key="index"
      v-bind="tender"
      :edit="edit"

    ></title-tender>



    <div class="container" v-for="(tender, index) in tenders"
            :key="index"
            v-bind="tender">
            

     <div class="alert alert-danger" v-if="tender.status==6">
            {{tender.reason_reject}}
           <b> يرجي تعديل المناقصة</b>
             </div>

    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <stages
            v-for="(tender, index) in tenders"
            :key="index"
            v-bind="tender"
          ></stages>

          <div class="p-descrip-box mt-2">
            <h5 class=" text-right font-weight-bold">وصف</h5>
            <div
              v-for="(tender, index) in tenders"
              :key="index"
              v-bind="tender"
            >
              <aboutTender class="text-right" :note="tender.note" ></aboutTender>
            </div>
          </div>

          <div class="p-descrip-box mt-2" :dir="$t('direactions')" :class="$t('text_align')">
            <ul class="list-group list-group-flush">
              <li class="list-group-item ">
              <h5>  العروض</h5>
                <small
                  class="text-muted"
                  v-for="(tender, index) in tenders"
                  :key="index"
                  v-bind="tender"
                  >({{ tender.comments.length }})</small
                >
              </li>
            </ul>


     
         
      
            <span v-for="(tender, index) in tenders" :key="index">


                <div class="container" dir="rtl">
                  <span v-for="comment, index in tender.comments" :key="index">

                      <span
                      class="h5 text-primary font-weight-bold">
                          <img :src="comment.user.avatar" width="50" height="50" class="rounded-circle">
                          {{comment.user.name}}
                          </span> <sup class="font-weight-bold"> <router-link :to="{name:'CompanyProfile',
                      params:{id:comment.user.id,type:'consulting'}}">
                        ملف الشركة
                        <i class="fas fa-external-link-alt grey">

                        </i>
                    </router-link>
                      
                      </sup>
                      <small class="text-muted d-block">{{
                        comment.Commented_at
                      }}</small>

                    <div class=" mb-2 ">
                     <p> {{ comment.comment }}</p>
                      <div class="files">
                      <div class="h5  font-weight-bold thm-color text-right mt-3">تفاصيل العرض </div>

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col ">

                   <div class="pr-single m-0">
										<div class="pr-icon">
                     <i class='bx bxs-pencil'></i>
                    </div>
										<div class="pr-desc">
											<span>{{$t('desgin')}}</span>
											<p class="pr-des-title m-0" v-if="edit==0">
                                                {{comment.design}}</p>

										</div>
                   </div>

                                   </th>







                              <th scope="col ">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class='bx bxs-briefcase-alt-2'></i></div>
										<div class="pr-desc">
											<span>{{$t('Supervisor')}}</span>
											<p class="pr-des-title m-0" >
                                                {{comment.Supervisor}}</p>

										</div>
                   </div>

                                   </th>




                            </tr>

               <tr>
                              <th scope="col ">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-home"></i></div>
										<div class="pr-desc">
											<span> إجمالي مساحة البناء</span>
											<p class="pr-des-title m-0" >
                                                {{comment.TotalAreaBuild}}</p>

										</div>
                   </div>

                                   </th>







                              <th scope="col ">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class='bx bx-money'></i></div>
										<div class="pr-desc">
											<span>تكلفة بناء المشروع</span>
											<p class="pr-des-title m-0" >
                                                {{comment.budget}} {{$t('aed')}}</p>

										</div>
                   </div>

                                   </th>




                            </tr>








                          </thead>

                          <tbody>

                          </tbody>
                        </table>

                         <div class="p-descrip-box pro-features">
						<h4 class="pr-d-title">{{$t('price_include')}}</h4>
						<ul class="single-pro-f list-none">
							<li>
								<i class="fas fa-check" :class="{'text-muted':comment.Consultant_fee!='true'}">
								</i>{{$t('Consultant_fee')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':comment.conditioning!='true'}"></i>{{$t('conditioning')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':comment.gypsum!='true'}"></i>{{$t('gypsum')}}</li>
							


						</ul>
						<ul class="single-pro-f list-none">
              <li><i class="fas fa-check" :class="{'text-muted':comment.electric_pendants!='true'}">
                </i>{{$t('electric_pendants')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':comment.Bedroom_wardrobes!='true'}"></i>{{$t('Bedroom_wardrobes')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':comment.Kitchen_Cabinets!='true'}"></i>{{$t('Kitchen_Cabinets')}}</li>

						</ul>
						<ul class="single-pro-f list-none">
							<li><i class="fas fa-check" :class="{'text-muted':comment.the_elevator!='true'}"></i>{{$t('the_elevator')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':comment.interior_decoration!='true'}"></i>{{$t('interior_decoration')}}</li>
                    <li><i class="fas fa-check" :class="{'text-muted':comment.garden_design!='true'}"></i>{{$t('garden_design')}}</li>

						</ul>
					
					</div>

                        <div class="p-descrip-box">
                            <div class="thm-color">تصاميم العرض </div>

                            <div class="d-flex flex-row">
  <div class="p-2">تصميم الواجهة<img :src="comment.faced_path" width="100" height="100"></div>
  <div class="p-2">التوزيعات الداخلية<img :src="comment.dis_path" width="100" height="100"> </div>

</div>
                              
                                

                        </div>


                      </div>
                    </div>

<div class="mb-5 mt-5 pb-2">
            <button class="btn btn-success text-light rounden-circle confirm" @click="confirm(comment.id,comment.user.name,comment.user.id)"
             data-toggle="modal" data-target="#exampleModal"  v-if="IsUser == 10 && tender.stage==0 ">
             <i class="fa fa-check-circle"></i>
              اختيار
             
               </button>


<span v-for="confirm,i in comment.confirmd" :key="i" >
<span v-if="IsUser == 10">
             <button class="btn btn-light float-right confirm" data-toggle="tooltip" data-placement="top"  type="button"
             id="contact"
             title="سوف يتم التواصل معكم عن طريق الشركة لتوقيع عقد الاستشاري"
             v-if="user_ID==tender.user_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
             <i class="fa fa-check-circle " ></i> {{comment.comment!=null ? 'تم اختيار هذا العرض' : 'في انتظار الرد '}}</button>

              <router-link :to="{name:'RequesttenderDetails',params:{type:confirm.type,id:confirm.id}}"
              class="btn mr-2 btn btn-success float-right confirm"
             v-if="user_ID==tender.user_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
             <i class='bx bx-log-out'></i>
           قم بالدخول لمتابعة الطلب</router-link>
</span>

<span v-if="IsUser == 1">
             <button class="btn btn-light float-right confirm" 
             v-if="user_ID==confirm.com_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
             <i class="fa fa-check-circle-o" ></i> تم اختيار العرض الذي قدمته 
                  

             </button>
              <router-link :to="{name:'RequesttenderDetails',params:{type:confirm.type,id:confirm.id}}"
               class="btn mr-2 btn btn-success float-right confirm"
             v-if="user_ID==confirm.com_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
             <i class='bx bx-log-out'></i>
           قم بالدخول لمتابعة الطلب</router-link>
</span>


</span>
</div>
                  </span>
                </div>




<!-- Modal -->
<div class="modal fade text-right" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
v-if="IsUser == 10" dir="rtl">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
         <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">تأكيد الشركة </h5>
    
         </div>
      <div class="">
        هل انت متاكد تريد اختيار
        <span class="font-weight-bold">{{userOffer}}</span>
      </div>
      <div class="mt-3">
          <button type="button" class="btn btn-success confirm text-light"
           @click="confirmOffer(offerid)" :disabled="loading">نعم انا متأكد </button>
        <button type="button" class="btn btn-light confirm mr-3" data-dismiss="modal">لا</button>

      </div>
    </div>
  </div>
</div>

            </span>





                <span v-show="MyofferIsset!=1 && IsUser == 1  ">
                         <form  enctype="multipart/form-data" class="c-form-inner">
                <div class="row container mt-5 c-form-inner">
                  <div class="col-md-6 form-group col-sm-12">
                    <div class="container theme-color font-weight-bold">التصميم </div>
                    <input
                      class="form-control"
                      placeholder="1,000"
                      
                      v-model="design"
                      :class="[{ 'is-invalid': errorFor('design')   
                        ,'is-valid':checkDesign=='true'
                      ,'is-invalid':checkDesign =='false'}]"
                    />
                     <div v-if="checkDesign=='false'"   
            class="invalid-feedback text-danger" > 
            عليك كتابة سعر التصميم    :
            <b> 12,000  </b>
            
             </div>
                    

                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('design')"
                      :key="'design' + index"
                    >
                      {{ error }}
                    </div> -->
                  </div>

                  <div class="col-md-6 form-group col-sm-12">
                    <div class="container theme-color font-weight-bold">الأشراف/ شهرياٌ
                    </div>

                    <input
                      class="form-control"
                        placeholder="1,000"
                      v-model="Supervisor"
                    
                      :class="[{ 'is-invalid': errorFor('Supervisor') 
                       ,'is-valid':CheckSuper=='true'
                      ,'is-invalid':CheckSuper =='false'}]"
                    />
                     <div v-if="CheckSuper=='false'"   
            class="invalid-feedback text-danger" > 
            عليك كتابة سعر الاشراف البناء  مثال :
            <b> 1,000  </b>
         
             </div>
                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('Supervisor')"
                      :key="'Supervisor' + index"
                    >
                      {{ error }}
                    </div> -->
                  </div>
                  
                </div>
                     <div class="row container mt-5">
                  <div class="col-md-6 form-group col-sm-12">
                    <div class="container theme-color font-weight-bold">مساحة البناء  </div>
                    <input
                      class="form-control"
                      placeholder="3000 Sqft"
                    
v-model="tab"
 :class="[{ 'is-invalid': errorFor('tab')
   ,'is-valid':checkTab=='true'
,'is-invalid':checkTab =='false',},
                      ]"
                    />

        <div v-if="checkTab=='false'"   
            class="invalid-feedback text-danger" > 
            عليك كتابة مساحة البناء  مثال :
            <b> 3000  </b>
            قدم مربع
             </div>
                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('tab')"
                      :key="'tab' + index"
                    >
                      {{ error }}
                    </div> -->
                  </div>

                  <div class="col-md-6 form-group col-sm-12">
                    <div class="container theme-color font-weight-bold">تكلفة بناء المشروع</div>

                    <input
                      class="form-control"
                       placeholder="1,000,000"
                      v-model="budget"
                    
                      :class="[{ 'is-invalid': errorFor('budget')
                        ,'is-valid':checkBudget=='true'
                      ,'is-invalid':checkBudget =='false'}]"
                    />
                    <div v-if="checkBudget=='false'"   
            class="invalid-feedback text-danger" > 
            عليك كتابة الميزانية التقريبية للبناء  مثال :
            <b> 1,000,000   </b>
             درهم
             </div>
                    <!-- <d
                    iv
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('budget')"
                      :key="'budget' + index"
                    >
                      {{ error }}
                    </div> -->
                  </div>
                </div>
                <div class="form-group container">
                  <div class="container theme-color font-weight-bold">االمقترح </div>
                  <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                  
                    v-model="notes"
                    :class="[{ 'is-invalid': errorFor('notes') 
                     ,'is-valid':checkNote=='true'
                      ,'is-invalid':checkNote =='false',}]"
                  >
                  </textarea>
                  {{notes.length==''? 0: notes.length }} / 100

                          <div v-if="checkNote=='false'"   
            class="invalid-feedback text-danger" > 
        عليك كتابة الوصف ليس اقل من 100 حرف :
         
             </div>

                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >
                    {{ error }}
                  </div> -->
                </div>
               
                
             
<div class="includes">
<h3 class="mt-3 mb-3 theme-color font-weight-bold h5" :class="$t('text_align')">العرض يشمل </h3>
 <div class="form-group row " dir="rtl">
<div class="col-6">
<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="Consultant_fee">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> رسوم الاستشارات + رسوم الدوائر الحكومية </span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="the_fence">
  <span class="check"></span>
  <span class="mr-4 ml-4"> السور</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="interior_decoration">
  <span class="check" ></span>
  <span class="mr-4 ml-4"> الديكور الداخلي</span>
</label>

<label class="checkbox d-bolck" :dir="$t('directions')">

  <input type="checkbox" v-model="conditioning">
  <span class="check"></span>
  <span class="mr-4 ml-4"> التكييف</span>
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
        
<div class="row">

  <div class="col-md-6">
                
<div class="form-group">
        <small class="text-muted">jpg , png </small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structure" v-if="Structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structure" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  تصميم الواجهة </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotStructureAllowd!=null">{{FileNotStructureAllowd}}</small>

                <input type="file" class="form-control"  @change="StructureFile" style="display:none" ref="structure">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress3}}</span>
<div class="progress" v-if="progress3" style="hieght:10px !important">

  <div  v-if="progress3 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress3 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultStructureSize" @click="RemoveFile('Structure')"></span>

<span v-if="resultStructureSize!=null" >
    <img :src="url1" style="width:100px; height:100px">
</span>
<span v-if="resultStructureSize!=null"  class="float-right">{{resultStructureSize}}</span>


</div>
  </div>
  <div class="col-md-6">
  
                <div class="form-group">
    <small class="text-muted"> jpg , png</small>
    <small class=" float-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style">

                 <label>
                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="Architect==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.fileinput2" v-else><span class="fa fa-paperclip" ></span></span>
              <span class="">  التوزيع الداخلي  </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectFile" style="display:none" ref="fileinput2" >




                 </label>
            </div>
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultSize" @click="RemoveFile('Architect')"></span>

<span v-if="resultSize!=null" >
<img :src="url2" style="width:100px; height:100px">
</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>


</div>
  </div>
</div>
                

                <div class="container">
                  <!-- <ul>
                    <li>
                      <small>Do not use external means of communication</small>
                    </li>
                    <li><small>Do not post external links</small></li>
                  </ul> -->
                  <button
                    class="
                      theme-btn


                    "
                    :disabled="btntender" @click.prevent="formSubmit"
                  >
                    اضف عرضك
                  </button>
                </div>
              </form>
                </span>






            <div
              class="modal fade success-modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="mySmallModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <span class="text-success"
                    ><i class="fa fa-check" aria-hidden="true"></i>
                    {{ success }}</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <partsconsl
            v-for="(tender, index) in tenders"
            :key="index"
            v-bind="tender"
            :edit="edit"
          ></partsconsl>

              

          <div v-for="(tender, index) in tenders" :key="index">
        
           

                            <div class="text-right h5 mt-3 mb-3">صور وامثلة</div>
  
              <div v-for="(image, index) in tender.image" :key="index" v-if="tender.image" class="p-descrip-box">
                <div v-if="image.path" class="mx-auto">




                    <span class="float-left">
                     <a :href="image.path" download="download" class="text-right btn btn-light mr-2 ml-2">تحميل</a>
                     <a @click="openImageToDelete(image.id,image.path)"  class="text-right btn btn-danger mr-2 ml-2"
                      data-toggle="modal" data-target="#openImageToDelete" v-if="IsUser==10">ازالة</a>

                      <div class="modal fade" id="openImageToDelete" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalCenterTitle" aria-hidden="true" v-if="IsUser==10">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">هل أنت متأكد تريد حذف هذه الصورة ؟</h5>
     
      </div>
      <div class="modal-body">
          <img :src="imgPATH"  width="500"  height="500"  class="little-rounded " />
      </div>
      <div class="modal-footer">

        <button type="button" class="btn theme-btn" style="background: #4caf50" @click="deleteThisImage(imgID)">Save changes</button>

      </div>
    </div>
  </div>
</div>
                    </span>
                    <span class="">
                     <img :src="image.path"  width="100"  height="100"  class="little-rounded " />
                    </span>

                </div>

              </div>
           
            <div v-else>

                    لم تتم إضافة صور
                </div>
    <div class="add-image" v-if="IsUser==10">

                <div class="form-group container file-style" >

                    <label class=" mt-2 ">

                 <span class="btn btn-light " @click="$refs.ete" v-if="files==''"  style="background: #3454d1; !importnat; color:#fff">
                        <span class=" fa fa-plus"></span>
                      </span>

                <span class="btn  btn-light " @click="$refs.ete" v-else style="background: #3454d1; !importnat; color:#fff"><span class=" fa fa-paperclip" ></span></span>

                <input type="file" class="form-control"   style="display:none" ref="ete" @change.prevent="onImageChanged" id="file" multiple>








            </label>

                                <span class="ttm-color">     اضافة صور  . </span>

                </div>

<div class="form-group">
     <strong v-if="FileNotAllowd" class="text-danger">{{FileNotAllowd}}</strong>
        <div class="image-preview" v-show="images.length">
            <div class="image-wrapper mt-3 " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">

                <span v-if="progressbar" class="">
                   <span class=""> {{progressbar}}</span>
                    </span>
<div class="progress" v-if="progressbar" style="hieght:10px !important">
  <div v-if="progressbar!='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progressbar+';hieght:10px !important; '" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressbar=='100%'" class="progress-bar   bg-success" role="progressbar"
   :style="'width:'+progressbar+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>


<span v-if="progressbar!=null"  class="main-color"> {{files[i].name}}
    <small class="text-muted  " v-if="files[i].size"> ({{files[i].size}} KB) </small>
</span>
<span class="btn btn-light float-left"  v-if="progressbar">

<span class="fa fa-close    " @click.prevent='removeImage(i)'></span>
</span>


                </span>



            </div>
        </div>

</div>
                <button class="theme-btn" v-if="files.length > 0" @click="saveImage">حفظ </button>

        </div>
          </div>

  <div   v-for="(tender, index) in tenders" :key="index" class="p-descrip-box text-right" dir="rtl">
           <provider 
              :Provider="tender.Provider"
              :typeBuild="tender.typeBuild"
              :priceGrant="tender.priceGrant"
              :BankProvider="tender.BankProvider"
              :finance="tender.finance"
              ></provider>

  </div>


        </div>
      </div>
    </div>
    
  </div>
</template>




<script>
import { mapState, mapGetters } from "vuex";

import AboutTender from "../tenders/aboutTender.vue";
import OfferTender from "../tenders/offerTender.vue";
import Partsconsl from "../tenders/partsconsl.vue";
import Stages from "../tenders/stages.vue";
import titleTender from "../tenders/titleTender.vue";
import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";
import VueHtml2pdf from 'vue-html2pdf'
import Provider from './provider.vue';
export default {
  components: {
    titleTender,
    Stages,
    AboutTender,
    Partsconsl,
    OfferTender,
    ValidationErrors,
    VueHtml2pdf,
    Provider
  },
  mixins: [validationErrors],

  data() {
    return {
      tender_id: this.$route.params.id,
      isDragging: false,
              Architect:null, progress2:null, resultName:null,resultSize:null,
              FileNotStructureAllowd:null,
              Structure:null,
                 progress3:0,
                    resultStructureName:null,
                    resultStructureSize:null,

      files: [],
      images: [],
       progressbar:[],
      tenders: null,

      myoffer: {
        text: null,
      },
      FileNotAllowd: "",
      errors: null,
      status: null,
      notes: '',
      btntender: false,
      item: null,
      budget: null,
      design: null,
      Supervisor: null,
      id: this.$route.params.id,
      show: "d-block",
      isset: null,
      MyofferIsset: null,
      success: null,
      url1:null,
      url2:null,
      file: "",
      title: null,
      CommentTender: null,
      tab: null,
      count: null,
      Myoffers: [],
      output: null,
      statusError: null,
      userOffer:null,
      offerid:null,
      userid:null,
      edit:0,
      testing:0,
      newTenders:null,
      imgID:null,
      imgPATH:null,


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
            checkTab:'',
            checkBudget:'',
            checkDesign:'',
            CheckSuper:'',
            checkNote:'',
            loading:false,
           
           
    }
  },
   watch: {
     
     
        notes(value){
          this.CheckVal(value,'note')
        },
          tab(newValue) {
            this.CheckVal(newValue,'tab')
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.tab = result);
    },
       budget(newValue) {
            this.CheckVal(newValue,'budget')

      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.budget = result);
    },
    design(newValue) {
       this.CheckVal(newValue,'design')
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.design = result);
    },
     Supervisor(newValue) {
              this.CheckVal(newValue,'super')

      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.Supervisor = result);
    }
    },

  methods: {
     generateReport () {
            this.$refs.html2Pdf.generatePdf()
        },
      CheckVal(value , value2){

        if(value2=='note'){
           if(value.length <= 0 || value.length <=100  ){
               this.checkNote= 'false'
        }else{
              this.checkNote= 'true'
        }
      }
        
      if(value2=='tab'){
       
        if(value.length <= 0){
           console.log('false')
           this.checkTab= 'false'
          
         
        }else{
          console.log('true Ftom')
          this.checkTab= 'true'
           
           
        } 
      }
            if(value2=='design'){
       
        if(value.length <= 0){
           console.log('false')
           this.checkDesign= 'false'
          
         
        }else{
          console.log('true Ftom')
          this.checkDesign= 'true'
           
           
        } 
      }
           if(value2=='super'){
       
        if(value.length <= 0){
           console.log('false')
           this.CheckSuper= 'false'
          
         
        }else{
          console.log('true Ftom')
          this.CheckSuper= 'true'
           
           
        } 
      }
       if(value2=='budget'){
       
        if(value.length <= 0){
           console.log('false')
           this.checkBudget= 'false'
          
         
        }else{
          console.log('true Ftom')
          this.checkBudget= 'true'
           
           
        } 
      }

      },
      saveImage(){
          let data = new FormData();
          data.append('id',this.id)


      if(this.files!=''){
      this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });
      }
          axios.post('insert/consulting/image',data).then(res=>{

              this.getTender();

               this.files = []
               this.images= []

          });
      },
      deleteThisImage(id){
          let data = new FormData();
          data.append('id',id)
          axios.post('delete/consulting/image/',data).then(res=>{
              $('#openImageToDelete').modal('hide');
                $('.modal-backdrop').css('display','none');

           this.getTender();
       $('#DeletedBox').modal('show');
                $('.modal-backdrop').css('display','block');
          })
      },
      openImageToDelete(id , img){
        this.imgID = id;
        this.imgPATH = img
      },
      getNewTenders(data){
        // this.tender.unshift(data)
$('#successBox').modal('show');
                $('.modal-backdrop').css('display','block');
       this.getTender();

      },
      test(){
         this.testing=1
      },
      editpart(event){
          this.edit=event;
      },
      confirm(offerid,username,userid){
          this.offerid=offerid;
          this.userOffer=username;
          this.userid=userid;

      },
        confirmOffer(){


  let data = new FormData();
          data.append('offer_id', this.offerid);
        data.append('tender_id', this.tender_id);
        data.append('com_id', this.userid);
      this.loading=true;
        axios.post('confirmTender',data).then(res=>{
            this.loading=false;

             $('#exampleModal').modal('hide');
                $('.modal-backdrop').css('display','none');
            this.getTender();

        })

      },
                   ArchitectFile(event){
           this.Architect=event.target.files[0];


const result1 = getFileExtension(this.Architect.name);

             if(!this.Architect.type.match('image.*') ){
                   this.FileNotMapAllowd =`Jpg  , Png  `;
                    return ;
                }

                if(this.Architect.size < 1048576){
let size = Math.floor(this.Architect.size/1024);
this.resultName = this.Architect.name   ;
this.resultSize = size+' KB' ;


             }
if(this.Architect.size > 1048576){
let size = Math.floor(this.Architect.size/1024);
this.resultName = this.Architect.name   ;
this.resultSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.Architect);

                 let data = new FormData();
          data.append("Architect",this.Architect,this.Architect.name);

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
          StructureFile(event){

        this.Structure=event.target.files[0];


const result2 = getFileExtension(this.Structure.name);

             if(!this.Structure.type.match('image.*')  ){
                   this.FileNotStructureAllowd =`Jpg , Png `;
                    return ;
                }

                if(this.Structure.size < 1048576){
let size = Math.floor(this.Structure.size/1024);
this.resultStructureName = this.Structure.name   ;
this.resultStructureSize = size+' KB' ;


             }
if(this.Structure.size > 1048576){
let size = Math.floor(this.Structure.size/1024);
this.resultStructureName = this.Structure.name   ;
this.resultStructureSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url1= URL.createObjectURL(this.Structure);

                 let data = new FormData();
          data.append("Structure",this.Structure,this.Structure.name);
           this.FileNotStructureAllowd=null

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{

                });




       },
       RemoveFile(event){
          if(event =='Architect'){
this.Architect =null
this.progress2=null
this.resultName=null
this.resultSize=null
       }
       if(event =='Structure'){
this.Structure =null
this.progress3=null
this.resultStructureName=null
this.resultStructureSize=null
       }
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
  let images = this.images;
  files.splice(i,1,'');
  images.splice(i,1,'');
    console.log(files);




            },
            // for consulting
    // addImage(file) {
    //   function getFileExtension(filename) {
    //     // get file extension
    //     const extension = filename.split(".").pop();
    //     return extension;
    //   }

    //   // passing the filename
    //   const result1 = getFileExtension(file.name);
    //   console.log(result1);

    //   if (!file.type.match("image.*")) {
    //     this.FileNotAllowd = `Not Allowd ${file.type} `;
    //     return;
    //   }

    //   this.files.push(file); //upload
    //   //preview of image
    //   const reader = new FileReader();
    //   reader.onload = (e) => this.images.push(e.target.result);

    //   reader.readAsDataURL(file);
    //   this.progressbar = "w-100";
    //   this.FileNotAllowd = "";
    // },
    // onImageChanged(e) {
    //   const files = e.target.files;
    //   Array.from(files).forEach((file) => this.addImage(file));
    // },




    // removeImage(i) {
    //   let files = this.files;
    //   files.splice(i, 1, "");
    //   console.log(files);
    // },

    initializedListner() {
      Echo.private(`newComment.${this.id}`).listen("NewComment", (e) => {
        console.log(e);
        this.Myoffers.unshift(e.myoffer);
        console.log("lisiten To new Comment");
      });
    },


    onChange(e) {
      this.file = e.target.files[0];
    },
    getTender(){
      console.log('this role user '+ this.IsUser)
      if(this.IsUser==1){
        axios.get(`/mytenders/eng/ConslTender/${this.$route.params.id}`).then(response=>{
            
         this.tenders =  response.data

               this.tenders.forEach((tender) => {
          this.MyofferIsset = tender.count;
      });
       
        }) 
      
      }

       if(this.IsUser==10){
axios.get(`/mytenders/ConslTender/${this.$route.params.id}`)
      .then((response) =>
      (
         this.tenders =  response.data
      
      ));
      }

    },



    formSubmit(e) {
   console.log('im in')
      this.loading = true;
      this.errors = null;

      let data = new FormData();
      // this.files.forEach((file) => {
      //   data.append("images[]", file, file.name);
      // });

      this.btntender = true;
      data.append("notes", this.notes);
              data.append("Architect",this.Architect,this.Architect.name);
              data.append("Structure",this.Structure,this.Structure.name);

              

      data.append("budget", this.budget);
      data.append("Supervisor", this.Supervisor);
      data.append("design", this.design);
      data.append("tab", this.tab);
      data.append("tender_id", this.id);

      
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

      axios
        .post("/offer_consulte", data)
        .then((response) => {
             this.getTender();
    
        //   this.Myoffers.unshift(response.data);
        //   this.MyofferIsset = 1;
     
        })
        .catch((error) => {
          if (422 === error.response.status) {
            // console.log(error.response.data.errors);
            this.errors = error.response.data.errors;
          }
          this.status = error.response.status;
        })
        .then(() => ((this.loading = false), (this.btntender = false)));
    },
    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
  },

  created() {

     
      this.getTender();
  $('#contact').tooltip('toggle')


  },
  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },
    IsUser() {
      return this.$store.getters.IsUser;
    },
     user_ID(){
                return this.$store.getters.userid
    },
  },
};
</script>


<style  scoped>

.modal{
    padding: 20px;
}

.btn-bus:hover {
  background-position: right center; /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.overlay {
  position: fixed; /* Sit on top of the page content */ /* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: white; /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
.spinner-border {
  display: block;
  position: absolute;
  left: 50%;
  top: 50%;
}
.is-invalid {
  border-color: #b22222;
  background-image: none;
}
/* generated by https://loading.io/ */
</style>


<style lang="scss" scoped>
.confirm{
    border-radius: 16px !important;
    font-weight: bold !important;
    padding: 12px 30px;
    font-weight: bold;
    float: right;
}
.uploader-container {
  background: rgb(240, 240, 240);
  text-align: center;
  font-size: 22px;
  border: 3px dashed #a2a2a2;
  padding: 1rem 2rem;
  position: relative;
  color: #797979;
  &.dragging {
    background: #fff;
    color: #797979;
    border: 3px dashed #0c66d6;
    .file-input label {
      background: #909090;
      color: #fff;
    }
  }

  i {
    font-size: 2rem;
    margin-bottom: 1rem;
  }
  .file-input {
    width: 250px;
    margin: auto;
    height: 71px;
    position: relative;
    input,
    label {
      background: #fff;
      color: #0c66d6;
      padding: 0.5rem;
      position: absolute;
      margin-top: 10px;
      left: 0;
      top: 0;
      width: 100%;
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0px 1px 4px #797979;
    }
    input {
      opacity: 0;
      z-index: 2;
    }
    .image-preview {
      display: flex;
      justify-content: space-evenly;
      flex-wrap: wrap;
      margin-top: 4rem;
      .image-wrapper {
        display: flex;
        flex-direction: column;
        width: 30%;
        height: 190px;
        background: #fff;
        color: #000;
        justify-content: space-between;
        align-items: self-start;
        padding: 3px;
        margin-bottom: 2rem;
        box-shadow: 1px 0px 10px snow;
      }
    }
    img {
      width: 100%;
      height: 60%;
    }
  }
}
</style>

}
<style scoped>
.little-rounded {
  border-radius: 10px;
}
.idownload {
  position: relative;
}

.overlay {
  position: absolute; /* Sit on top of the page content */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 1;
  left: 0;
  bottom: 0;
  right: 0;

  background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
  z-index: 1;
}

.btn-bus:hover {
  background-position: right center; /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.btn-user {
  background-image: linear-gradient(
    to right,
    #ff8008 0%,
    #ffc837 51%,
    #ff8008 100%
  );
}
.btn-user {
  margin: 10px;
  padding: 15px 45px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  box-shadow: 0 0 20px #eee;
  border-radius: 10px;
  display: block;
}

.btn-user:hover {
  background-position: right center; /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}


</style>


<style scoped>
.lb-grid {
  position: relative;
  display: block;
}
.lb-item {
  position: absolute;
  background-position: 50%;
  background-repeat: no-repeat;
  background-size: cover;
  border-top: 2px solid #fff;
  border-right: 2px solid #fff;
  cursor: pointer;
}
.lb-grid-1 .lb-item {
  width: 100%;
  height: 100%;
}
.lb-grid-2 .lb-item,
.lb-grid-3 .lb-item,
.lb-grid-4 .lb-item,
.lb-grid-5 .lb-item {
  width: 50%;
}
.lb-grid-2 .lb-item,
.lb-grid-3 .lb-item:first-child,
.lb-grid-4 .lb-item:first-child {
  height: 100%;
}
.lb-grid-3 .lb-item:nth-child(2),
.lb-grid-3 .lb-item:nth-child(3),
.lb-grid-5 .lb-item:first-child,
.lb-grid-5 .lb-item:nth-child(2) {
  height: 100%;
}
.lb-grid-2 .lb-item:nth-child(2),
.lb-grid-3 .lb-item:nth-child(2),
.lb-grid-3 .lb-item:nth-child(3),
.lb-grid-4 .lb-item:nth-child(2),
.lb-grid-4 .lb-item:nth-child(3),
.lb-grid-4 .lb-item:nth-child(4),
.lb-grid-5 .lb-item:nth-child(3),
.lb-grid-5 .lb-item:nth-child(4),
.lb-grid-5 .lb-item:nth-child(5),
.lb-item:last-child {
  left: auto;
  right: 0;
  border-right: 0;
}
.lb-grid-3 .lb-item:nth-child(3),
.lb-grid-4 .lb-item:nth-child(4),
.lb-grid-5 .lb-item:nth-child(2),
.lb-grid-5 .lb-item:nth-child(5) {
  bottom: 0;
  top: auto;
}
.lb-grid-4 .lb-item:nth-child(3),
.lb-grid-5 .lb-item:nth-child(4) {
  top: 33.333333333333336%;
}
.lb-grid-4 .lb-item:nth-child(2),
.lb-grid-4 .lb-item:nth-child(3),
.lb-grid-4 .lb-item:nth-child(4),
.lb-grid-5 .lb-item:nth-child(3),
.lb-grid-5 .lb-item:nth-child(4),
.lb-grid-5 .lb-item:nth-child(5) {
  height: 33.333333333333336%;
}
.lb-more {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  color: #fff;
  font-size: 3rem;
  background-color: rgba(0, 0, 0, 0.4);
}
.lb-more:before {
  display: inline-block;
  content: "";
  vertical-align: middle;
  height: 100%;
}
.lb-modal {
  transition: opacity 0.2s ease;
  position: fixed;
  z-index: 99999;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  min-height: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.8);
  display: block;
  -webkit-user-select: none;
  -moz-user-select: -moz-none;
  -o-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.lb-modal-close {
  position: absolute;
  right: 20px;
  top: 20px;
  color: #fff;
}
.lb-modal-next,
.lb-modal-prev {
  position: absolute;
  top: 50%;
  left: 20px;
  margin-top: -25px;
  z-index: 999;
  cursor: pointer;
  color: #fff;
  background-color: transparent;
  border: none;
}
.lb-modal-next {
  left: auto;
  right: 20px;
}
.lb-modal-img {
  position: absolute;
  top: 10px;
  left: 70px;
  right: 70px;
  bottom: 10px;
  text-align: center;
}
.lb-modal-img:before {
  display: inline-block;
  content: "";
  vertical-align: middle;
  height: 100%;
}
.lb-modal-img img {
  max-width: 100%;
  max-height: 100%;
  vertical-align: middle;
  -o-object-fit: contain;
  object-fit: contain;
}
.lb-modal-img .spinner {
  width: 150px;
  position: absolute;
  margin-left: -75px;
  top: 50%;
  left: 50%;
  z-index: 1;
}
</style>
<style scoped>
  .badge-success {

    background-color: #38c172;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}
.table{
    height: auto !important;
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
