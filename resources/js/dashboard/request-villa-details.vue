<template>
<div>
        <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="text-center"><i class='bx bxs-check-circle text-success'></i></div>
        <div class="text-center font-weight-bold">تم نشر اعلانك بنجاح </div>

      </div>

    </div>
  </div>
</div>
<div class="container"  :dir="$t('directions')" :class="$t('text_align')" v-for="request , index in requests" :key="index">
    <div class="" >

      <div class="modal fade" id="successBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

   <div class="alert alert-info alert-dismissible fade show" role="alert">
تم رفع الملف بنجاح
  <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  </div>
</div>

      
 
     <h1>المرحلة الاولى</h1>
            <h4 class="theme-color">
              
      <i class="fas fa-check-circle text-success" ></i>
         الطلب 
      </h4>

                    <div class="p-descrip-box">
                                   

  <div class=" h5 mb-3 title">
              <router-link class="theme-color h4 " target="_blank" 
           :to="{name:'pageDetails',params:{id:request.ads_id}}" >
            {{request.title}}
            <i class="fas fa-external-link-alt grey"></i>
           
           </router-link>
           
        </div>
        <div class="list-item">
        <span class="text-dark"><i  class="fa fa-bookmark grey"></i>   رقم الطلب : {{request.id}}</span>
        <span class="text-dark"><i  class="fa fa-user grey"></i>  
        <span v-if="IsUser==1">
               المشتري : {{request.user.name}}

          </span>
              <span v-if="IsUser==10" >
 البائع :
<router-link  class="theme-color" :to="{name:'CompanyProfile',params:{id:request.company.id,type:'consulting'}}" target="_blank">

                {{request.company.company.company_ar}}
</router-link>


          </span>
        </span>

        <span class="text-dark" v-if="request.offer.budget"><i  class="fa fa-money grey"></i>  الفيلا : {{request.offer.budget}}{{$t('aed')}}</span>
        <span class="text-dark"> <i  class="fa fa-clock grey"></i>وقت الطلب :{{request.added_at}}</span>
        </div>
                </div>
  
        <div class="row">
            <div class="col-md-8">
<div class="p-descrip-box">
    <h3> الوصف</h3>
{{request.Description}}
</div>
  <div class="p-descrip-box pro-features">
						<h4 class="pr-d-title">{{$t('price_include')}}</h4>
						<ul class="single-pro-f list-none">
							<li>
								<i class="fas fa-check" :class="{'text-muted':request.Consultant_fee!='true'}">
								</i>{{$t('Consultant_fee')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':request.conditioning!='true'}"></i>{{$t('conditioning')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':request.gypsum!='true'}"></i>{{$t('gypsum')}}</li>
							


						</ul>
						<ul class="single-pro-f list-none">
              <li><i class="fas fa-check" :class="{'text-muted':request.electric_pendants!='true'}">
                </i>{{$t('electric_pendants')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':request.Bedroom_wardrobes!='true'}"></i>{{$t('Bedroom_wardrobes')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':request.Kitchen_Cabinets!='true'}"></i>{{$t('Kitchen_Cabinets')}}</li>

						</ul>
						<ul class="single-pro-f list-none">
							<li><i class="fas fa-check" :class="{'text-muted':request.the_elevator!='true'}"></i>{{$t('the_elevator')}}</li>
							<li><i class="fas fa-check" :class="{'text-muted':request.interior_decoration!='true'}"></i>{{$t('interior_decoration')}}</li>
                    <li><i class="fas fa-check" :class="{'text-muted':request.garden_design!='true'}"></i>{{$t('garden_design')}}</li>

						</ul>
					
					</div>
<div class="p-descrip-box">
   
    <div class="">
       <h1>المرحلة الثانية </h1>
    <h4 class=theme-color>
      <i class="fas fa-check-circle text-dark" v-if="request.offer==null"></i>
      <i class="fas fa-check-circle text-success" v-else></i>
       عرض الاستشاري 
    </h4>
      
        

          <div  v-if="request.offer">
                 <div class="row container mt-5" >
                 
                    <div class="col-md-6 form-group col-sm-12" v-if=" request.offer.budget==null &&IsUser==1">
                    <div class="container theme-color">  تكلفة البناء التقريبية : </div>
                   
                    <input
                      class="form-control"
                      placeholder="total Area Build"
                  
                      v-model="budget"
                      :class="[{ 'is-invalid': errorFor('tab') }]"
                    />
                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('tab')"
                      :key="'tab' + index"
                    >
                      {{ error }}
                    </div> -->
                
               
              
        
                  </div>
                  <div v-else>
                    <div class="alert alert-success" ><i  class="fa fa-money grey"></i>
             تكلفة البناء التقريبية : {{request.offer.budget}}{{$t('aed')}}</div> 
          </div>
                   
                
                  <div class="col-md-6 form-group col-sm-12" v-if=" request.offer.sqft==null && IsUser==1">
                    <div class="container theme-color"> *مساحة البناء  </div>
                   
                    <input
                      class="form-control"
                      placeholder="total Area Build"
                  
                      v-model="tab"
                      :class="[{ 'is-invalid': errorFor('tab') }]"
                    />
                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('tab')"
                      :key="'tab' + index"
                    >
                      {{ error }}
                    </div> -->
                
               
              
        
                  </div>
                      <div v-else>
                    <div class=" alert alert-success" ><i  class="fa fa-money grey"></i>
             مساحة البناء : {{request.offer.sqft}}{{$t('sqft')}}</div> 
          
                 </div>
                
                  <div class="col-md-6 form-group col-sm-12"  v-if=" request.offer.design==null && IsUser==1">
                    <div class="container theme-color">  *سعر التصميم</div>

     
      
                    <input
                      class="form-control"
                      
                      v-model="design"
                      placeholder="design"
                      :class="[{ 'is-invalid': errorFor('budget') }]"
                    />
                    <!-- <div
                      class="invalid-feedback"
                      v-for="(error, index) in this.errorFor('budget')"
                      :key="'budget' + index"
                    >
                      {{ error }}
                    </div> -->
               
                
                  </div>
                      <div v-else>
                    <div class="alert alert-success" ><i  class="fa fa-money grey"></i>
             سعر التصميم : {{request.offer.design}}{{$t('aed')}}</div> 
          </div>
                 
                    <div class="col-md-6 form-group col-sm-12" 
                     v-if="  request.offer.supervison==null && IsUser==1">
                         <div class="container theme-color">   * سعر الاشراف /شهرياً</div>
                         
                    <input
                      class="form-control"
                     
                      v-model="Supervisor"
                      placeholder="الاشراف"
                      :class="[{ 'is-invalid': errorFor('budget') }]"
                    />
                 
                 
                    </div>
                     <div v-else>
                    <div class=" alert alert-success" ><i  class="fa fa-money grey"></i>
             الاشراف /شهرياً: {{request.offer.supervison}}{{$t('aed')}}</div> 
          </div>
                    
                

                     <button class="btn btn-download" v-if="request.offer.supervison==null && IsUser==1"
                             @click="OfferEng(request)"
                              :disabled="tab.length <  4  || design.length <  4 ||   Supervisor.length <  4 
                              ||  budget.length  <  4">
                  
                  ارسال العرض

                  </button>
                </div>
                  <div v-if="request.offer.agree==0 && request.offer.supervison" class="alert alert-warning" v-show="IsUser==1">
                  في انتظار موافقة  العميل ...
                </div>
                <div v-if="request.offer.agree==0 && request.offer.supervison && request.offer.design " v-show="IsUser==10">
                   <button class="btn btn-download" data-toggle="modal" data-target="#agree" @click="HandleAgree(1)">
                     <i class="fa fa-check"></i>
                        موافق علي العرض
                   </button>

                   <button class="btn btn-light" data-toggle="modal" data-target="#agree" @click="HandleAgree(0)">
                      x
                      غير موافق
                   </button>
                </div>

                <div v-else  v-show="IsUser==10 " >
                  <div class="alert alert-warning" v-if="request.offer.agree!=1">
                  في انتظار عرض الاستشاري ...
                  </div>
                  <div class=" text-success" v-if="request.offer.agree==1">
                    <i class="fas fa-check-circle "> </i>
                 تمت الموافقة علي العرض
                  </div>
                </div>


                <div class="modal fade text-right" id="agree" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
v-if="IsUser == 10" dir="rtl">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <h5 class="modal-title" id="exampleModalLongTitle">
          {{agree==0?'    رفض الطلب':'تأكيد الطلب'}}
           </h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

      <div class="">
        {{agree==0?'هل اانت متأكد تريد الرفض؟':'هل انت متاكد تريد الموافقة'}}
        
      </div>
      <div class="mt-3">
          <button type="button" class="theme-btn" @click="confirmOffer(agree)">نعم انا متأكد </button>
        <button type="button" class="theme-btn primary" data-dismiss="modal">لا</button>

      </div>
    </div>
  </div>
</div>

                
              
        </div>

        <div >
         
<hr>
          <div class="form-group second-stage"  v-if="request.offer.supervison && request.offer.agree==1 &&
          request.offer.budget &&
          request.offer.design &&
          request.offer.sqft">
            <h1>المرحلة الثالثة</h1>
            <h4 class="theme-color">
               <i class="fas fa-check-circle text-secondary" v-if="request.offer.contract==null"></i>
      <i class="fas fa-check-circle text-success" v-else></i> عقد الاستشاري </h4>

           <span v-if="request.offer.contract==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png )</small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="request.offer.contract==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الاستشاري</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted"> xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الاستشاري</span>
                <input type="file" class="form-control"  @change="ContaractFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contract',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && request.offer.contract==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else>
        

            <p class="alert alert-light" v-if="request.offer.contract"> 
              <a :href="request.offer.contract.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
              عقد الاستشاري
              </a>
              </p>
              <hr>

              <h1>المرحلة الرابعة</h1>

            <h4 class="theme-color">
               <!-- <i class="fas fa-check-circle text-secondary" v-if="request.offer.filesBuliding==null"></i> -->
      <i class="fas fa-check-circle text-success" ></i>
        مراحل البناء 
      </h4>
                      <table class="table table-bordered font-weight-bold" dir="rtl">
                          <thead>
    <tr class="text-center">
     
      <th scope="col">الملف</th>
      <th scope="col">pdf</th>
      <th scope="col">autocad / Excel</th>
    </tr>
  </thead>

  <tbody >
    
    <tr>
      <td class="text-center">
      <div class="theme-color">
          <i class="fas fa-check-circle theme-color" v-if="request.offer.offersfiles.threeDPath" ></i>
        3d


      </div>
      </td>

      <td class="text-center"  >
          
          <span v-if="request.offer.offersfiles.threeDPath==null">
             <span v-if="IsUser==1" class="btn btn-danger"  
             data-toggle="modal" data-target="#editFile" @click="TypeUpload('Pdf')">
            <i class='fas fa-file-pdf'   style="font-size:10px"></i>
            <small > تحميل ملف الpdf  </small>
            </span>
               <span v-else-if="IsUser==10">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span> 
          </span>
          <span v-else>

            <a :href="request.offer.offersfiles.threeDPath" target="_blank" class="text-dark">
              <i class="fa fa-file-pdf fa-2x text-danger"  ></i>
              </a>

          </span>

  

      </td>
      
      <td class="text-center"  >
        <span v-if="request.offer.offersfiles.ThreeDDWG==null">
                <span v-if="IsUser==1" class="btn btn-light"  data-toggle="modal" data-target="#editFileExcel" 
             @click="TypeUpload('Excel')">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل ملف الاوتوكاد </small>
            </span>

               <span v-if="IsUser==10">
            <small class="text-danger font-weight-bold">  اانتظار رفع الملف الاوتوكاد </small>
            </span> 
          </span>
          <span v-else class="margin-left">
                <a :href="request.offer.offersfiles.ThreeDDWG" target="_blank" class="text-dark">
              <i class="fa fa-file fa-2x text-success"  ></i>
              </a>
          </span>

</td>     
    
    </tr>


       <tr :class="{'alert alert-light':request.offer.offersfiles.ArchitectPath}">
      <td class="theme-color">
        <i class="fas fa-check-circle theme-color" v-if="request.offer.offersfiles.ArchitectPath" ></i>
        المخطط المعماري
        </td>


        <td class="text-center" >

            <span v-if="request.offer.offersfiles.ArchitectPath==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileArch" >
            <i class='fas fa-file-pdf'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button>
            <span v-else-if="IsUser==10 &&   request.offer.offersfiles.ArchitectPath==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span> 
        </span>
              <span class="text-center" v-else>
 
   <a :href="request.offer.offersfiles.ArchitectPath" target="_blank" class="text-dark">
              <i class="fa fa-file-pdf fa-2x text-danger"  ></i>
              </a>
              
              </span>
        </td>

        <td class="text-center">

                     <span v-if="request.offer.offersfiles.ArchitectDWG==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileArchDWG">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small>
   
               تحميل ملف الاوتوكاد 
            </small>
            </button>

            <span v-else-if="IsUser==10 &&   request.offer.offersfiles.ArchitectDWG==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span> 
        </span>
              <span class="text-center" v-else>
 <p > 
   <a :href="request.offer.offersfiles.ArchitectDWG" target="_blank" class="text-dark">
              <i class="fa fa-file fa-2x text-success"  ></i>
              </a>
              </p>
              </span>
             
      </td>
    </tr>

  
         <tr :class="{'alert alert-light':request.offer.offersfiles.servicesPath}">

      <td class="theme-color"> 
        <i class="fas fa-check-circle theme-color" v-if="request.offer.offersfiles.servicesPath" >

        </i>
        الخدمات</td>
          <td class="text-center" >
              <span v-if="request.offer.offersfiles.servicesPath==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileServic">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button>
            <span v-else-if="IsUser==10 &&   request.offer.offersfiles.servicesPath==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span>
              </span>
               <span class="text-center" v-else>
 <p > 
   <a :href="request.offer.offersfiles.servicesPath" target="_blank" class="text-dark">
              <i class="fa fa-file-pdf fa-2x text-danger"  ></i>
              </a>
              </p>
               </span>
        </td>
              <td class="text-center" >
              <span v-if="request.offer.offersfiles.servicesDWG==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileSErvicesDwg">
            <i class='fas fa-file'   style="font-size:10px"></i>
            <small class=""> تحميل ملف الاوتوكاد</small>
            </button>
            <span v-else-if="IsUser==10 &&   request.offer.offersfiles.servicesDWG==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span>
              </span>
               <span class="text-center" v-else>
 <p > 
   <a :href="request.offer.offersfiles.servicesDWG" target="_blank" class="text-dark">
              <i class="fa fa-file fa-2x text-success"  ></i>
              </a>
              </p>
               </span>
        </td>

    </tr>


    <tr>


      <td class="theme-color"> الملف الانشائي</td>
        <td class="text-center" >

          <span v-if="request.offer.offersfiles.StructurePath==null">
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFilestructure">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button>

              <span v-else-if="IsUser==10 &&   request.offer.offersfiles.StructurePath==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span>
          </span>
          <span v-else>
 <p > 
   <a :href="request.offer.offersfiles.StructurePath" target="_blank" class="text-dark">
              <i class="fa fa-file-pdf fa-2x text-danger"  ></i>
              </a>
              </p>

          </span>
        </td>
         <td class="text-center" >

          <span v-if="request.offer.offersfiles.StructureDWG==null">
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFilestructureDWG">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class=""> تحميل ملف الاوتوكاد</small>
            </button>

              <span v-else-if="IsUser==10 &&   request.offer.offersfiles.StructureDWG==null">
            <small class="text-danger font-weight-bold"> انتظار رفع الملف</small>
            </span>
          </span>
          <span v-else>
 <p > 
   <a :href="request.offer.offersfiles.StructureDWG" target="_blank" class="text-dark">
              <i class="fa fa-file fa-2x text-success"  ></i>
              </a>
              </p>

          </span>
        </td>
    </tr>
          <tr>

      <td class="theme-color">جدول المواصفات</td>
        <td class="text-center">
            <span  v-if="request.offer.offersfiles.SpecificationsPath==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileSpec">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button>

            </span>

            <span v-else>

 <p > 
   <a :href="request.offer.offersfiles.SpecificationsPath" target="_blank" class="text-dark">
              <i class="fa fa-file-pdf fa-2x text-danger"  ></i>
              </a>
              </p>
            </span>
        </td>
        <td class="text-center">
            <span  v-if="request.offer.offersfiles.SpecificationsEXCEL==null">
          
                 <button v-if="IsUser==1"   class="btn btn-light"  data-toggle="modal" data-target="#editFileSpecDWG">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class=""> تحميل ملف الاكسل</small>
            </button>

            </span>

            <span v-else>

 <p > 
   <a :href="request.offer.offersfiles.SpecificationsEXCEL" target="_blank" class="text-dark">
              <i class="fa fa-file-excel fa-2x text-success"  ></i>
              </a>
              </p>
            </span>
        </td>
    </tr>
    
   
  
  

     

   
  </tbody>
</table>

<h5 class="text-right">  ملف فحص التربة  </h5>



              <div v-if="request.offer.offersfiles.soil">
                    <a class="btn btn-success" target="_blank" :href="request.offer.offersfiles.soil">
                    ملف فحص التربة
                    </a>
              </div>
                            <div class="" v-else >
                              
                             <label class="d-block  ">


                 <span class="btn btn-secondary" :class="{'btn btn-success':soil!=null}"
                  @click="$refs.fileinput2" >ملف 
                   <i class=" fa fa-paperclip" ></i></span>

             
            
              <small class=" font-weight-bold text-danger" v-if="FileNotSoilAllowd">{{FileNotSoilAllowd}}</small>
                <input type="file" class="form-control"  @change="onSoilChange" style="display:none" ref="fileinput2" >


                <button class="btn btn-success" v-if="progress2" @click.prevent="soilConfirm">تأكيد </button>
                





            </label>
</div>
<div class="container">
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<i class="fa fa-close btn" v-if="resultSize" @click="RemoveFile('file')"></i>

<span v-if="resultSize!=null" ><i class="fa fa-file" style="color:#ebeef2"  ></i> {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>
</div>



<div class="tender-btn" v-if="request.offer.offersfiles.threeDPath &&request.offer.offersfiles.ArchitectPath &&
request.offer.offersfiles.servicesPath && request.offer.offersfiles.StructurePath
 && request.offer.offersfiles.SpecificationsPath">
    <h1>المرحلة الخامسة </h1>
    <h5>تحويل المناقصة </h5>

<div v-if="IsUser==10">
  
    <div class="form-group container file-style " v-if="TypeTender1==null" >
 <label class=" mt-2 ">
    <button class="btn btn-download"  @click="sendTender(1,request) ">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('construcion_company')}}   </span>

  </div>
  <div v-else-if="TypeTender1" class="mt-3">

      <router-link :to="{name:'consrDetails',params:{id:TypeTenderId1}}" class="theme-btn " >
                            الذهاب الي مناقصة المقاولات
                            </router-link>
  </div>

      <div class="form-group container file-style"  v-if="TypeTender2==null" >
 <label class=" mt-2 ">
    <button class="btn btn-download " @click="sendTender(2,request)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('HVAC_companies')}}   </span>

  </div>
  <div v-else-if="TypeTender2" class="mt-3">

      <router-link :to="{name:'HvacDetails',params:{id:TypeTenderId2}}" class="theme-btn " >
            الذهاب الي مناقصة التكييف
            </router-link>

  </div>

   <div class="form-group container file-style" v-if="TypeTender3==null"> 
 <label class=" mt-2 ">
    <button class="btn btn-download"  @click="sendTender(3,request)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('Stone_companies')}}   </span>

  </div>
   <div v-else-if="TypeTender3" class="mt-3">
    
      <router-link :to="{name:'StoneDetails',params:{id:TypeTenderId3}}" class="theme-btn " >
            الذهاب الي مناقصة الحجر
            </router-link>

  </div>
    <div class="form-group container file-style" v-if="TypeTender4==null"> 
 <label class=" mt-2 ">
    <button class="btn btn-download"  @click="sendTender(4,request)">
      نشر 
    </button>
</label>
<span class="ttm-color">    {{$t('interior_decoration')}}   </span>

  </div>

     <div v-else-if="TypeTender4" class="mt-3">

           <router-link :to="{name:'InteriorDetails',params:{id:TypeTenderId4}}" class="theme-btn " >
            الذهاب الي مناقصة الديكور الداخلي
            </router-link>
     </div>
  
</div>
<div v-else>
<p class=" text-success">تحويل المناقصات من قبل العميل </p>
</div>

  




<div class="">
<h1>المرحلة السادسة </h1>
    <h5>عقود المناقصات </h5>
   
<h6>
   <i :class="{'fas fa-check-circle text-success':request.offer.contracts_consrcution!=null}"></i>
  عقد المقاول
  </h6>
             <span v-if="request.offer.contracts_consrcution==null && IsUser==1" >
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="request.offer.contracts_consrcution==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد المقاول</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد المقاول</span>
                <input type="file" class="form-control"  @change="ContaractFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contractConstr',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && request.offer.contracts_consrcution==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="request.offer.contracts_consrcution">
        

            <p class="alert alert-light"> 
              <a :href="request.offer.contracts_consrcution.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
            عقد المقاول
              </a>
              </p>
              <hr>
        </span>
        <h6>
   <i :class="{'fas fa-check-circle text-success':request.offer.contracts_stone!=null}"></i>
  عقد الحجر
  </h6>
                <span v-if="request.offer.contracts_stone==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="request.offer.contracts_stone==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الاستشاري</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الاستشاري</span>
                <input type="file" class="form-control"  @change="ContaractFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contractStone',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && request.offer.contracts_stone==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="request.offer.contracts_stone">
        

            <p class="alert alert-light"> 
              <a :href="request.offer.contracts_stone.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
            عقد الحجر
              </a>
              </p>
              <hr>
        </span>
<h6>
           <i :class="{'fas fa-check-circle text-success':request.offer.contracts_hvac!=null}"></i>
  عقد الحجر
  </h6>
                <span v-if="request.offer.contracts_hvac==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="request.offer.contracts_hvac==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد التكييف</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الاستشاري</span>
                <input type="file" class="form-control"  @change="ContaractFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contractHvac',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && request.offer.contracts_hvac==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="request.offer.contracts_hvac">
        

            <p class="alert alert-light"> 
              <a :href="request.offer.contracts_hvac.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
            عقد التكييف
              </a>
              </p>
              <hr>
        </span>

        <h6>
           <i :class="{'fas fa-check-circle text-success':request.offer.contracts_interior!=null}"></i>
  عقد الديكور الداخلي
  </h6>
                <span v-if="request.offer.contracts_interior==null">
        <small class="text-muted" v-if="IsUser==1">(pdf, jpg , png ) </small>
        <small class=" float-right text-danger font-weight-bold" v-if="IsUser==1">إجباري</small>
                <div class="modal fade" id="Contractfile"
         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
         v-if="request.offer.contracts_interior==null">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
        <span >   عقد الديكور الداخلي</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     عقد الديكور الداخلي</span>
                <input type="file" class="form-control"  @change="ContaractFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('contractInterior',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

  <button v-if="IsUser==1 && request.offer.contracts_interior==null"  class="btn btn-light"
                data-toggle="modal" data-target="#contractFile">
            <i class='fas fa-folder-open'   style="font-size:10px"></i>
            <small class="text-muted"> تحميل</small>
            </button> 
          
        </span>
        <span v-else-if="request.offer.contracts_interior">
        

            <p class="alert alert-light"> 
              <a :href="request.offer.contracts_interior.ContractPath" target="_blank" class="btn btn-success">
                <i class="fa fa-eye"></i>
            عقد الديكور الداخلي
              </a>
              </p>
              <hr>
        </span>


</div>

<div class="">
<h1>المرحلة السابعة  </h1>
    <h5> متابعة مرحلة البناء </h5>

    <div class="row c-form-inner" v-if="IsUser==1">
      <div class="col-md-6">
       <div class="file-style " style="height:60; border: 2px solid #E8E8E8">
                 <label>
                 <span class="btn btn-light" @click="$refs.Flowup" v-if="Flowup==null" 
                 style="margin-top: 10px; margin-right: 10px">
                   <span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.Flowup" v-else  style="margin-top: 10px; margin-right: 10px">
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">     صور البناء</span>
                <input type="file" class="form-control"  @change="FlowupFile" style="display:none" ref="Flowup">

               <div class=" text-danger" v-if="FileNotFlowupAllowd!=null">{{FileNotFlowupAllowd}}</div>
            </label>
             </div>
             <span v-if="progressFollow" class="">{{progressFollow}}</span>
<div class="progress" v-if="progressFollow" style="hieght:10px !important">


  <div v-if="progressFollow!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressFollow=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultFlowupSize" @click="RemoveFile('Flowup')"></span>
<span v-if="resultFlowupSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultFlowupName}}</span>
<span v-if="resultFlowupSize!=null"  class="float-right">{{resultFlowupSize}}</span>

      </div>
      <div class="col-md-6">
        <div class="form-group">
        <input type="date" v-model="dateFlow" placeholder="تاريخ الانجاز">
        </div>

      </div>
              <button type="button" class="btn btn-download" @click="UpdateFile('FlowUp',request.offer.id)" :disabled="loading || dateFlow==null">
                 {{loading==true ? 'انتظر ..':'حفظ'}}
                 </button>

</div>
<table class="table">
  <thead>
    <tr>
 
      
      <th scope="col"> #</th>
      <th scope="col"> صورة البناء</th>
      <th scope="col">تاريخ الانجاز</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="files , index in request.offer.constfollowup" :key="index">
    
      <td>{{index+1}}</td>
      <td>
        <a :href="files.path" target="_blank">
        <img :src="files.path" width="50" height="50">
        </a>
        
  
        </td>
      <td>{{files.date}}</td>
  
    </tr>
  </tbody>
</table>
</div>
            <div class="">

<h1>المرحلة الثامنة </h1>
 

    <div class="" v-if="IsUser==10">
     
                  <div class="text-right form-group" dir="rtl">
            <p class="font-weight-bold theme-color"> هل تم الانتهاء من البناء بالشكل المطلوب ؟</p>
<span v-if="request.status_project==0">
<div class="badge badge-primary">
لا
</div>
</span>
<span v-else-if="request.status_project==1">
<div class="badge badge-primary">
نعم
</div>
</span>
<span v-else>
        <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="yes" name="done"  v-model="done">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">نعم</span>
         </label>
             <label class="checkbox d-bolck" :dir="$t('directions')" >
            
           <input type="radio" value="no"  name="done"  v-model="done">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">لا</span>
             </label>
</span>


 
</div>


            <div class="form-group ">

              <span v-if="request.notesstatus">
                                                <label for="exampleFormControlTextarea1"> ملاحظات</label>

<div class="alert alert-primary">
{{request.notesstatus}}
</div>
</span>
<span v-else>
                                <label for="exampleFormControlTextarea1">أضافة ملاحظات</label>

 <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    v-model="notesdone"
                    rows="4">
 </textarea>
</span>
 <button class="btn btn-success mt-3" @click="DoneOrNo"
  :disabled="notesdone==null
   || done==null||
    loading" v-show="request.notesstatus==null ||request.status_project==null ">ارسال </button>
</div>


    </div>
</div>

</div>


                                       <div v-if="request.review==null && IsUser==10" >
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review" @click="handleReview(1)" ><i class="bx bxs-star" ></i>  
   اضف تقييم الاستشارات</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1,TypeReview)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2,TypeReview)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3,TypeReview)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4,TypeReview)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5,TypeReview)"></i>


          </div>
          
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(request.ads_id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-if="request.review"  >
  	<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">التقييم والمراجعات </h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20"> Review</h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="request.review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{request.review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="request.review.rating" ></review>

											</div>
										</div>
										<p>{{request.review.content}}</p>
										<span v-if="request.review_added_at">{{request.review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>

<span v-if="request.construction_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة المقاولات</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:request.construction_review.company.id,type:'construction'}}" class="theme-color">
									{{request.construction_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="request.construction_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{request.construction_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="request.construction_review.rating"></review>

											</div>
										</div>
										<p v-show="request.construction_review.content">{{request.construction_review.content}}</p>
										<!-- <span v-if="offer.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>


<span v-else>
<button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(6)"
 v-show="TypeTenderId1"
 ><i class="bx bxs-star" ></i>     اضف تقييم المقاولات </button>

</span>


<span v-if="request.stone_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة الحجر</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:request.stone_review.company.id,type:'stone'}}" class="theme-color">
									{{request.stone_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="request.stone_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{request.stone_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="request.stone_review.rating"></review>

											</div>
										</div>
										<p v-show="request.stone_review.content">{{request.stone_review.content}}</p>
										<!-- <span v-if="request.review_added_at">{{request.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>

<span v-else>


<button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(3)"
 v-show="TypeTenderId3"
 ><i class="bx bxs-star" ></i>     اضف تقييم الحجر </button>


</span>

<span v-if="request.hvac_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة التكييف</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:request.hvac_review.company.id,type:'hvac'}}" class="theme-color">
									{{request.hvac_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="request.hvac_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{request.hvac_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="request.hvac_review.rating"></review>

											</div>
										</div>
										<p v-show="request.hvac_review.content">{{request.hvac_review.content}}</p>
										<!-- <span v-if="request.review_added_at">{{request.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>
<span v-else>
 <button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(4)"
 v-show="TypeTenderId2"
 ><i class="bx bxs-star" ></i>     اضف تقييم التكييف </button>

 </span>

<span v-if="request.interior_review">
<div class="p-descrip-box rating" >
						<h4 class="pr-d-title">:تقييم شركة الديكور الداخلي</h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">

<router-link :to="{name:'CompanyProfile',params:{id:request.interior_review.company.id,type:'interior'}}" class="theme-color">
									{{request.interior_review.company.name}}

                    </router-link>

                  
                </h4>
								<div class="review-add-main">
									<div class="review-img">
										<img :src="request.interior_review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{request.interior_review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="request.interior_review.rating"></review>

											</div>
										</div>
										<p v-show="request.interior_review.content">{{request.interior_review.content}}</p>
										<!-- <span v-if="request.review_added_at">{{offer.review_added_at}}</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>

</span>
<span v-else>
 <button    class="theme-btn  text-right confirm" data-toggle="modal"
 data-target="#Review" @click="handleReview(5)"
 v-show="TypeTenderId4"
 ><i class="bx bxs-star" ></i>     اضف تقييم الديكور الداخلي </button>



</span>



        </span>

        



<div class="modal fade" id="editFileSpec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
              ملف المواصفات
    



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="SpecFile">{{SpecFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else>
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label>
             </div>
<span v-if="progressFollow" class="">{{progressFollow}}</span>
<div class="progress" v-if="progressFollow" style="hieght:10px !important">


  <div v-if="progressFollow!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressFollow=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressFollow+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('spec',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>









<div class="modal fade" id="editFilestructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             ملف الانشائي
  



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structure" v-if="structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structure" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotstructureAllowd!=null">{{FileNotstructureAllowd}}</small>

                <input type="file" class="form-control"  @change="structureFile" style="display:none" ref="structure">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress3}}</span>
<div class="progress" v-if="progress3" style="hieght:10px !important">

  <div  v-if="progress3 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress3 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultstructureSize" @click="RemoveFile('structure')"></span>

<span v-if="resultstructureSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultstructureName}}</span>
<span v-if="resultstructureSize!=null"  class="float-right">{{resultstructureSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structure',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFilestructureDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             ملف الانشائي
  



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structureDWG" v-if="structureDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structureDWG" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotstructureDWGAllowd!=null">{{FileNotstructureDWGAllowd}}</small>

                <input type="file" class="form-control"  @change="structureDWGFile" style="display:none" ref="structureDWG">



                 </label>

            </div>
<span v-if="progress3" class="">{{progress333}}</span>
<div class="progress" v-if="progress333" style="hieght:10px !important">

  <div  v-if="progress333 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress333 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultstructureDWGSize" @click="RemoveFile('structureDWG')"></span>

<span v-if="resultstructureDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultstructureDWGName}}</span>
<span v-if="resultstructureDWGSize!=null"  class="float-right">{{resultstructureDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structureDWG',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFilestructureDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             ملف الخدمات
  



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">autocad (dwg)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structureDWG" v-if="structureDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structureDWG" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotstructureDWGAllowd!=null">{{FileNotstructureDWGAllowd}}</small>

                <input type="file" class="form-control"  @change="structureDWGFile" style="display:none" ref="structureDWG">



                 </label>

            </div>
<span v-if="progress333" class="">{{progress333}}</span>
<div class="progress" v-if="progress333" style="hieght:10px !important">

  <div  v-if="progress333 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress333 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress333+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultstructureDWGSize" @click="RemoveFile('structureDWG')"></span>

<span v-if="resultstructureDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultstructureDWGName}}</span>
<span v-if="resultstructureDWGSize!=null"  class="float-right">{{resultstructureDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structureDWG',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editFileSpecDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
            
              ملف المواصفات (اكسل)
    



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
            <small class="text-muted">( xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.SpecificationsDWG" v-if="SpecificationsDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.SpecificationsDWG" v-else>
                  <span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsDWGFile" style="display:none" ref="SpecificationsDWG">

               <div class=" text-danger" v-if="FileNotSpecificationsDWGAllowd!=null">{{FileNotSpecificationsDWGAllowd}}</div>



            </label>
             </div>
<span v-if="progress444" class="">{{progress444}}</span>
<div class="progress" v-if="progress444" style="hieght:10px !important">


  <div v-if="progress444!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress444+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress444=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress444+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsDWGSize" @click="RemoveFile('SpecificationsDWG')"></span>
<span v-if="resultSpecificationsDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsDWGName}}</span>
<span v-if="resultSpecificationsDWGSize!=null"  class="float-right">{{resultSpecificationsDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('SpecificationsDWG',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="editFileServic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
           
        ملف الخدمات



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.services" v-if="services==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.services" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   ملف الخدمات</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotservicesAllowd!=null">{{FileNotservicesAllowd}}</small>

                <input type="file" class="form-control"  @change="ServicesFile" style="display:none" ref="services">



                 </label>
            </div>
<span v-if="progress8" class="">{{progress8}}</span>
<div class="progress" v-if="progress8" style="hieght:10px !important">

  <div  v-if="progress8 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress8 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress8+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultservicesSize" @click="RemoveFile('services')"></span>

<span v-if="resultservicesSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultservicesName}}</span>
<span v-if="resultservicesSize!=null"  class="float-right">{{resultservicesSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('services',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editFileSErvicesDwg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
           
        ملف الخدمات 
اوتوكاد
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted"> dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.servicesDWG" v-if="servicesDWG==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.servicesDWG" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   ملف الخدمات</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotservicesDWGAllowd!=null">{{FileNotservicesDWGAllowd}}</small>

                <input type="file" class="form-control"  @change="servicesDWGFile" style="display:none" ref="servicesDWG">



                 </label>
            </div>
<span v-if="progress888" class="">{{progress888}}</span>
<div class="progress" v-if="progress888" style="hieght:10px !important">

  <div  v-if="progress888 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress888+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress888 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress888+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultservicesDWGSize" @click="RemoveFile('servicesDWG')"></span>

<span v-if="resultservicesDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultservicesDWGName}}</span>
<span v-if="resultservicesDWGSize!=null"  class="float-right">{{resultservicesDWGSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('servicesDWG',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editFileArch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          
        <span >  مخطط المعماري</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
    <small class="text-muted"> Pdf , dwg (autocad file)</small>
    <small class=" float-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style">

                 <label>
                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="Architect==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.fileinput2" v-else><span class="fa fa-paperclip" ></span></span>
              <span class=""> الملف المخططات المعماري </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectFile" style="display:none" ref="fileinput2" >




                 </label>
            </div>
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultSize" @click="RemoveFile('Architect')"></span>

<span v-if="resultSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span> {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('arch',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileArchDWG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          
        <span >   مخطط المعماري اوتوكاد</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
    <small class="text-muted">  dwg (autocad file)</small>
    <small class=" float-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style">

                 <label>
                 <span class="btn btn-light" @click="$refs.ArchitectdWG" v-if="ArchitectDWG==null"><span class=" fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.ArchitectdWG" v-else><span class="fa fa-paperclip" ></span></span>
              <span class=""> الملف المخططات المعماري </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotArchitectDWGAllowd!=null">
                {{FileNotArchitectDWGAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectDwgFile" style="display:none" ref="ArchitectdWG" >




                 </label>
            </div>
<span v-if="progress222" class="">{{progress222}}</span>
<div class="progress" v-if="progress222" style="hieght:10px !important">

  <div  v-if="progress222!='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress222+';hieght:10px !important'" aria-valuenow="25" 
   aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress222=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" 
  :style="'width:'+progress2222+';hieght:10px !important;background-color:#3454d1 !important'"
   aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultArchitectDWGSize" @click="RemoveFile('ArchitectDWG')"></span>

<span v-if="resultArchitectDWGSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span> 
{{resultArchitectDWGName}}</span>
<span v-if="resultArchitectDWGSize!=null"  class="float-right"> {{resultArchitectDWGSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('archDWG',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          ملف 
        <span >  3d</span>
    



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" 
                 fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDAllowd!=null">{{FileNotthreeDAllowd}}</small>
                <input type="file" class="form-control"  @change="threedFile" style="display:none" ref="threeD">



                 </label>

            </div>
<span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>

<span v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDName}}</span>
<span v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeD',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="editFileExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
          ملف 
        <span >  3d</span>
        <super class="text-danger">{{TypeFile}}</super>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(Excel)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.Excel" v-if="threeDExcel==null"><span class=" 
                 fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.Excel" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDExcelAllowd!=null">{{FileNotthreeDExcelAllowd}}</small>
                <input type="file" class="form-control"  @change="threedExcelFile" style="display:none" ref="Excel">



                 </label>

            </div>
<span v-if="progress111" class="">{{progress111}}</span>
<div class="progress" v-if="progress111" style="hieght:10px !important">


  <div  v-if="progress111 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress111+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress111=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress111+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDExcelSize" @click="RemoveFile('threeDExcel')"></span>

<span v-if="resultthreeDExcelSize!=null"  class="float-right">{{resultthreeDExcelName}}</span>
<span v-if="resultthreeDExcelSize!=null"  class="float-right">{{resultthreeDExcelSize}}</span>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeDExcel',request.offer.id)"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>





          </div>



          

          
        </div>
                  
    </div>

</div>


<div class="p-descrip-box">


            <chat-messages :messages="messages"></chat-messages>
  <div class="message">
    
                            <chat-form v-on:messagesent="addMessage" :user="user" :offer_id="request_id" :type="typeMessage"></chat-form>


  </div>
</div>


   



        </div>

            <div class="col-md-4">
    <div class="p-descrip-box">
       <h3> تفاصيل العرض</h3>

<!-- fas fa-utensils -->
                 <div class="row   font-weight-bold">
                <div class="col-6">
                   <div class="pr-single m-0">

										<div class="pr-icon"><i class="fa fa-home"></i></div>
										<div class="pr-desc">
											<span>{{$t('Type_Of_Villa')}}</span>
											<p class="pr-des-title m-0" v-if="request.type_villa ==1" > 
                                                  {{$t('classic')}}
                                            </p>
                                                 <p class="pr-des-title m-0" v-if="request.type_villa ==2" > 
                                                  {{$t('modern')}}
                                                 </p>

										</div>
									</div>
                </div>
                   <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-warehouse"></i></div>
										<div class="pr-desc">
											<span>{{$t('floors')}}</span>
											<p class="pr-des-title m-0" >  {{request.floors}}</p>
                                       
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
											<p class="pr-des-title m-0" v-if="request.room_mastar" >  {{request.room_mastar}}</p>

										</div>
									</div>
                </div>
                <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bed"></i></div>
										<div class="pr-desc">
											<span>{{$t('bed_rooms')}}</span>
											<p class="pr-des-title m-0" >  {{request.rooms}}</p>

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
											<p class="pr-des-title m-0" >  {{request.kitchen}}</p>

										</div>
									</div>
                </div>
                <div class="col-6">

                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fas fa-couch"></i></div>
										<div class="pr-desc">
											<span>{{$t('majlis')}}</span>
											<p class="pr-des-title m-0" >  {{request.majlis}}</p>

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
											<p class="pr-des-title m-0" >  {{request.dining}}</p>

										</div>
									</div>
                </div>
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bath"></i></div>
										<div class="pr-desc">
											<span>{{$t('bathroom')}}</span>
											<p class="pr-des-title m-0" >  {{request.bathroom}}</p>

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
											<p class="pr-des-title m-0" >  {{request.Service_room_placement=="inside" ?
                                                 $t('inside'): $t('outside')}}</p>

										</div>
									</div>
                </div>
                  <div class="col-6 ">
                   <div class="pr-single m-0">
										<div class="pr-icon"><i class='bx bxs-location-plus'></i></div>
										<div class="pr-desc">
											<span>{{$t('Emirates')}}</span>
											<p class="pr-des-title m-0" >  <all-uae :emirates="request.Emirates" ></all-uae></p>

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
											<p class="pr-des-title m-0" >  {{request.living_room}}</p>
										</div>
									</div>
                </div>
                     
                
             

            </div>


        </div>
          <div class=" p-descrip-box">

               

              <div class="h5">   <h3> ملاحظات العميل</h3> </div>
            <span class="">i
                {{request.notes}}
            </span>

            <h3 class="">الملفات </h3>
            <span class="image-container">
                   
           
            <a  class="btn btn-success" :href="'/consulting/requestOffer/'+request.passport_path" download>
            الهوية
             <i class="fa fa-arrow-down"></i> </a>

             
         
            <a :href="request.map_path" download class="btn btn-success"> خارطة الارض<i class="fa fa-arrow-down"></i> </a>

            </span>

         
        
              <provider 
              :Provider="request.Provider"
              :typeBuild="request.typeBuild"
              :priceGrant="request.priceGrant"
              :BankProvider="request.BankProvider"
              ></provider>
      
            
              

              <div class="h5 mt-4">  التواصل</div>
              <div class="contact">
                  <span class="btn btn-light" v-if="IsUser==1">{{request.user.email}}</span>
                  <a class="btn btn-light" :href="'tel:'+request.phone"  dir="ltr" v-show="IsUser==1" >
                      <i class="fas fa-phone-alt"></i>
                      {{request.phone}}
                      </a>
                  <a class="btn btn-success" :href="'http://wa.me/'+request.whatsapp" dir="ltr">
                     <i class="fab fa-whatsapp"></i>
                     <span v-show="IsUser==1">
         {{request.whatsapp}}
                     </span>
                     <span v-show="IsUser==10">
         {{request.Phone_eng}}
                     </span>
                      </a>

              </div>


        </div> 
     
        
        

            </div>

        </div>

      

            </div>

           
    
  
</div>
</div>
</template>

<script>
import AllUae from '../auth/AllUae.vue';
import partsconsl from '../tenders/partsconsl.vue';
import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";
import ChatMessages from './ChatMessages.vue';
import ChatForm from './ChatForm.vue';
import review from './review.vue';
import provider from './provider.vue';

export default {
  components: { partsconsl, AllUae ,ValidationErrors, ChatMessages, ChatForm, review,provider},
    mixins: [validationErrors],
    
data(){
  
    return{
      loading:false,
        messages: [],
        typeMessage:'villa',
        request_id :this.$route.params.id,
        requests:null,
        tab:'',
        budget:'',
        design: '',
        Supervisor: '',
        TypeFile:'',
      
        
         threeDfile:null,
        Archictfile:null,
        serviceFile:null,
        StrutureFile:null,
        SpecFile:null,
        IdentFile:null,
        MapFile:null,

        // 3d file vraible
         FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,

        FileNotthreeDExcelAllowd:null,
         threeDExcel:null,
         resultthreeDExcelSize:null,
        resultthreeDExcelName:null,
        progress111:null,

        
        FilesID:null,


        //   Architect file
        resultSize:null,
        resultName:null,
        progress2:null,
        FileNotMapAllowd:null,
        Architect:null,


        
        //   Architect dWG file
        resultArchitectDWGSize:null,
        resultArchitectDWGName:null,
        progress222:null,
        FileNotArchitectDWGAllowd:null,
        ArchitectDWG:null,


        // Services File

        resultservicesSize :null,
        resultservicesName :null,
        progress8 :null,
        FileNotservicesAllowd:null,
        services:null,


        resultservicesDWGSize :null,
        resultservicesDWGName :null,
        progress888 :null,
        FileNotservicesDWGAllowd:null,
        servicesDWG:null,
        


        //structure Files
        resultstructureSize :null,
        resultstructureName :null,
        progress3 :null,
        FileNotstructureAllowd :null,
        structure:null,


             //structure dwg Files
        resultstructureDWGSize :null,
        resultstructureDWGName :null,
        progress333:null,
        FileNotstructureDWGAllowd :null,
        structureDWG:null,


        //specifcation file
        resultSpecificationsSize :null,
        resultSpecificationsName :null,
        progress4 :null,
        FileNotSpecificationsAllowd :null,
        Specifications:null,
        
       resultSpecificationsDWGSize :null,
        resultSpecificationsDWGName :null,
        progress444 :null,
        FileNotSpecificationsDWGAllowd :null,
        SpecificationsDWG:null,

        resultFlowupName :null,
        resultFlowupSize:null,
        FileNotFlowupAllowd :null,
        Flowup:null,
        progressFollow:null,
        dateFlow:null,


           


        //identifcation

        resultidentitySize:null,
        resultidentityName :null,
        progress6:null,
        FileNotidentityAllowd :null,
        identity:null,
        map :null,
        progress5:null,
        resultmapName:null,
        resultmapSize:null,
        open_select:null,
        Tender:null,
        agree:null,
         start1:null,
        start2:null,
        start3:null,
        start4:null,
        start5:null,
        reveiw:1,
        
        ReviewContent:null,

        TypeTender1:null,
        TypeTenderId1:'',

        TypeTender2:null,
          TypeTenderId2:'',

        TypeTender3:null,
        TypeTenderId3:'',

        TypeTender4:null,
        TypeTenderId4:'',
         done:null,
        notesdone:null,

         resultsoilSize :null,
        resultsoilName :null,
        progress888 :null,
        FileNotSoilAllowd:null,
        soil:null,
        resulSoilPath:null,
                TypeReview:null

    }
},
watch:{
  tab(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.tab = result);
    },
       budget(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.budget = result);
    },
    design(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.design = result);
    },
     Supervisor(newValue) {
      const result = newValue.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      Vue.nextTick(() => this.Supervisor = result);
    }
},
methods:{

soilConfirm(){
  this.loading=true;
  let data = new FormData()

  data.append("soil", this.resulSoilPath);
  data.append("offer_id", this.request_id);

  axios.post('soilFileVilla',data).then(res=>{
    this.getRequester();

  })
},
                       onSoilChange(event){
           this.soil=event.target.files[0];


const result1 = getFileExtension(this.soil.name);

             if(result1 !='pdf' ){
                   this.FileNotSoilAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.soil.size < 1048576){
let size = Math.floor(this.soil.size/1024);
this.resultName = this.soil.name   ;
this.resultSize = size+' KB' ;


             }
if(this.soil.size > 1048576){
let size = Math.floor(this.soil.size/1024);
this.resultName = this.soil.name   ;
this.resultSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.soil);

                 let data = new FormData();
          data.append("soil",this.soil,this.soil.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('soilFile',data,config).then(res=>{
                    this.FileNotSoilAllowd=null
                    this.resulSoilPath=res.data;
                  
                });




       },
  
    DoneOrNo(){
    this.loading=true
    console.log('this done '+this.done)
    console.log('this notesdone '+this.notesdone)
    
    let data = new FormData();

    data.append('status_project',this.done)
    data.append('notesstatus',this.notesdone)
    data.append('request_id',this.request_id)
    axios.post('doneornoInVillaReqquester',data).then(res=>{
      this.getRequester();
      this.loading=false
    })
    

  },
  TypeUpload(event){
    this.TypeFile = event;
  },
  HandleAgree(event){
this.agree=event;
  },
                handleReview(event){
    this.TypeReview=event

   

          this.start1=null
        this.start2=null
        this.start3=null
        this.start4=null
        this.start5=null
        this.ReviewContent=null
  },

     SubmiitReview(villa_id){
            let data = new FormData();

                  
            let post=null

         
            post ='review';
             data.append('TypeRequest', this.TypeRequest);

             if(this.TypeRequest==1){
                data.append('com_id', comid);
             }if(this.TypeRequest==6){
                data.append('tender_id', this.TypeTenderId1);
             }
              if(this.TypeRequest==4){
                data.append('tender_id', this.TypeTenderId2);
             }
               if(this.TypeRequest==3){
                data.append('tender_id', this.TypeTenderId3);
             }
              if(this.TypeRequest==5){
                data.append('tender_id', this.TypeTenderId4);
             }



            data.append('rating', this.reveiw);
            data.append('content', this.ReviewContent);
            data.append('request_id', this.request_id);
            data.append('villa_id', villa_id);


             axios.post('reviewVilla',data).then(res=>{
                         this.getRequester();
                //  $('#Review').modal('hide');
                //   $('.modal-backdrop').css('display','none');


             })


    },
      Rating(event,Number){

        if(event==1){

            this.start1='bxs-star text-warning'
        this.start2=null
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==2){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==3){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4=null
        this.start5=null
        }
         if(event==4){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5=null
        }
         if(event==5){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5='bxs-star text-warning'
        }

       this.reveiw=event;
       this.TypeRequest=Number;

       console.log(this.reveiw)

    },
    
  confirmOffer(event){
      let agree = event;
      let data = new FormData();

      data.append('agree',agree);
      data.append('request_id',this.request_id);

      axios.post('offer/agree',data).then(res=>{

         $('#agree').modal('hide');
         $('.modal-backdrop').css('display','none');
        this.getRequester();
      })
  },
     succesAlert(){
        $('#success').modal('show');
                $('.modal-backdrop').css('display','block');
    },
  sendTender(Tender,request){
      
    let data = new FormData();

      data.append('name_age',request.Name_eng);
      data.append('map_path',request.map_path);
      data.append('passport_path',request.passport_path);
      data.append('title',request.title);
      data.append('Description',request.Description);
      data.append('Emirates',request.Emirates);
      data.append('ArchitectPath',request.offer.offersfiles.ArchitectPath);
      data.append('SpecificationsPath',request.offer.offersfiles.SpecificationsPath);
      data.append('StructurePath',request.offer.offersfiles.StructurePath);
      data.append('servicesPath',request.offer.offersfiles.servicesPath);
      data.append('threeDPath',request.offer.offersfiles.threeDPath);
      data.append('soil',request.offer.offersfiles.soil);
      data.append('tenderNumber',Tender);
      data.append('request_id',this.request_id);
      
   

    axios.post('ConvertToTender',data).then(res=>{
     
      this.succesAlert();
      this.getRequester();
    })
  },
  open(event){
        if(event=='villa'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"
    }
  },
  tenderType(event){
    this.Tender=event;
  },
         fetchMessages() {
            //GET request to the messages route in our Laravel server to fetch all the messages
            axios.get(`/messages/${this.request_id}/${this.typeMessage}`).then(response => {
                //Save the response in the messages array to display on the chat view
                this.messages = response.data;
            });
        },
        //Receives the message that was emitted from the ChatForm Vue component
        addMessage(message) {
     


            this.messages.push(message);


            //POST request to the messages route with the message data in order for our Laravel server to broadcast it.
            axios.post('/messages', message).then(response => {
                console.log(response.data);
           
            });
        },
    
       ContaractFile(event){ //check

                this.Specifications=event.target.files[0];


        const result3 = getFileExtension(this.Specifications.name);

                    if(!this.Specifications.type.match('application/pdf')  && result3 !='xlsx'){
                        this.FileNotSpecificationsAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.Specifications.size < 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' KB' ;


                    }
        if(this.Specifications.size > 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Specifications);

                        let data = new FormData();
                data.append("Architect",this.Specifications,this.Specifications.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },

                      threedFile(event){ //check

          
            this.threeD=event.target.files[0];


        const result3 = getFileExtension(this.threeD.name);
                 
                    if(!this.threeD.type.match('application/pdf')){
                        this.FileNotthreeDAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                       
                  }
                  

                        if(this.threeD.size < 1048576){
        let size = Math.floor(this.threeD.size/1024);
        this.resultthreeDName = this.threeD.name   ;
        this.resultthreeDSize = size+' KB' ;


                    }
        if(this.threeD.size > 1048576){
        let size = Math.floor(this.threeD.size/1024);
        this.resultthreeDName = this.threeD.name   ;
        this.resultthreeDSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }


            },
                        threedExcelFile(event){ //check

          
            this.threeDExcel=event.target.files[0];
   


        const result3 = getFileExtension(this.threeDExcel.name);
              
                    console.log(result3);
          if(result3 !='dwg'){
              this.FileNotthreeDExcelAllowd =`should Be Dwg (autocad file) `;
                  return ;
              }
                  

                        if(this.threeDExcel.size < 1048576){
        let size = Math.floor(this.threeDExcel.size/1024);
        this.resultthreeDExcelName = this.threeDExcel.name   ;
        this.resultthreeDExcelSize = size+' KB' ;


                    }
        if(this.threeDExcel.size > 1048576){
        let size = Math.floor(this.threeDExcel.size/1024);
        this.resultthreeDExcelName = this.threeDExcel.name   ;
        this.resultthreeDExcelSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }


            },

                ArchitectFile(event){
                this.Architect=event.target.files[0];


        const result1 = getFileExtension(this.Architect.name);

                    if(!this.Architect.type.match('application/pdf') && result1 !='dwg'){
                        this.FileNotMapAllowd =`should Pdf Or Dwg (autocad file) `;
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

        //                let data = new FormData();
        //         data.append("Architect",this.Architect,this.Architect.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotMapAllowd=null
        //               });




            },
                   ArchitectDwgFile(event){
                this.ArchitectDWG=event.target.files[0];


        const result1 = getFileExtension(this.ArchitectDWG.name);

                    if(result1 !='dwg'){
                        this.FileNotArchitectDWGAllowd =`Dwg (autocad file) `;
                            return ;
                        }else{
                        this.FileNotArchitectDWGAllowd ='';

                        }

                        if(this.ArchitectDWG.size < 1048576){
        let size = Math.floor(this.ArchitectDWG.size/1024);
        this.resultArchitectDWGName = this.ArchitectDWG.name   ;
        this.resultArchitectDWGSize = size+' KB' ;


                    }
        if(this.ArchitectDWG.size > 1048576){
        let size = Math.floor(this.ArchitectDWG.size/1024);
        this.resultArchitectDWGName = this.ArchitectDWG.name   ;
        this.resultArchitectDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                // this.url2 = URL.createObjectURL(this.Architect);

        //                let data = new FormData();
        //         data.append("Architect",this.Architect,this.Architect.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotMapAllowd=null
        //               });




            },
           
                  servicesDWGFile(event){

                this.servicesDWG=event.target.files[0];


        const result2 = getFileExtension(this.servicesDWG.name);

                    if(result2 !='dwg' ){
                        this.FileNotservicesDWGAllowd =` should be  Dwg (autocad file) `;
                            return ;
                        }else{
                          this.FileNotservicesDWGAllowd=null
                        }

                        if(this.servicesDWG.size < 1048576){
        let size = Math.floor(this.servicesDWG.size/1024);
        this.resultservicesDWGName = this.servicesDWG.name   ;
        this.resultservicesDWGSize = size+' KB' ;


                    }
        if(this.servicesDWG.size > 1048576){
        let size = Math.floor(this.servicesDWG.size/1024);
        this.resultservicesDWGName = this.servicesDWG.name   ;
        this.resultservicesDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.services);

        //                let data = new FormData();
        //         data.append("Architect",this.services,this.services.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotservicesAllowd=null
        //               });




            },
         

                    structureDWGFile(event){

                this.structureDWG=event.target.files[0];


        const result2 = getFileExtension(this.structureDWG.name);

                    if( result2 !='dwg' ){
                        this.FileNotstructureDWGAllowd =`should be Dwg (autocad file) `;
                            return ;
                        }

                        if(this.structureDWG.size < 1048576){
        let size = Math.floor(this.structureDWG.size/1024);
        this.resultstructureDWGName = this.structureDWG.name   ;
        this.resultstructureDWGSize = size+' KB' ;


                    }
        if(this.structureDWG.size > 1048576){
        let size = Math.floor(this.structureDWG.size/1024);
        this.resultstructureDWGName = this.structureDWG.name   ;
        this.resultstructureDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.FileNotstructureDWGAllowd=null

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{

        //               });




            },
        

                 SpecificationsDWGFile(event){ //check
                 console.log('hi specfiction')

                this.SpecificationsDWG=event.target.files[0];


        const result3 = getFileExtension(this.SpecificationsDWG.name);
 
                    if(result3 !='xlsx'){
                        this.FileNotSpecificationsDWGAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }else{
                          this.FileNotSpecificationsDWGAllowd=null
                        }

                        if(this.SpecificationsDWG.size < 1048576){
        let size = Math.floor(this.SpecificationsDWG.size/1024);
        this.resultSpecificationsDWGName = this.SpecificationsDWG.name   ;
        this.resultSpecificationsDWGSize = size+' KB' ;


                    }
        if(this.SpecificationsDWG.size > 1048576){
        let size = Math.floor(this.SpecificationsDWG.size/1024);
        this.resultSpecificationsDWGName = this.SpecificationsDWG.name   ;
        this.resultSpecificationsDWGSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


            

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },

                 ServicesFile(event){

                this.services=event.target.files[0];


        const result2 = getFileExtension(this.services.name);

                    if(!this.services.type.match('application/pdf') && result2 !='dwg' ){
                        this.FileNotservicesAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.services.size < 1048576){
        let size = Math.floor(this.services.size/1024);
        this.resultservicesName = this.services.name   ;
        this.resultservicesSize = size+' KB' ;


                    }
        if(this.services.size > 1048576){
        let size = Math.floor(this.services.size/1024);
        this.resultservicesName = this.services.name   ;
        this.resultservicesSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.services);

        //                let data = new FormData();
        //         data.append("Architect",this.services,this.services.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotservicesAllowd=null
        //               });




            },

                   structureFile(event){

                this.structure=event.target.files[0];


        const result2 = getFileExtension(this.structure.name);

                    if(!this.structure.type.match('application/pdf') ){
                        this.FileNotstructureAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.structure.size < 1048576){
        let size = Math.floor(this.structure.size/1024);
        this.resultstructureName = this.structure.name   ;
        this.resultstructureSize = size+' KB' ;


                    }
        if(this.structure.size > 1048576){
        let size = Math.floor(this.structure.size/1024);
        this.resultstructureName = this.structure.name   ;
        this.resultstructureSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.structure);

                        let data = new FormData();
                data.append("structure",this.structure,this.structure.name);
                this.FileNotstructureAllowd=null

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{

        //               });




            },

                    SpecificationsFile(event){ //check

                this.Specifications=event.target.files[0];


        const result3 = getFileExtension(this.Specifications.name);

                    if(!this.Specifications.type.match('application/pdf')  && result3 !='xlsx'){
                        this.FileNotSpecificationsAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.Specifications.size < 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' KB' ;


                    }
        if(this.Specifications.size > 1048576){
        let size = Math.floor(this.Specifications.size/1024);
        this.resultSpecificationsName = this.Specifications.name   ;
        this.resultSpecificationsSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Specifications);

                        let data = new FormData();
                data.append("Specifications",this.Specifications,this.Specifications.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },
                FlowupFile(event){ //check

                this.Flowup=event.target.files[0];


        const result3 = getFileExtension(this.Flowup.name);

                    if(!this.Flowup.type.match('image.*') ){
                        this.FileNotFlowupAllowd =`should Jpg Or Png `;
                            return ;
                        }

                        if(this.Flowup.size < 1048576){
        let size = Math.floor(this.Flowup.size/1024);
        this.resultFlowupName = this.Flowup.name   ;
        this.resultFlowupSize = size+' KB' ;


                    }
        if(this.Flowup.size > 1048576){
        let size = Math.floor(this.Flowup.size/1024);
        this.resultFlowupName = this.Flowup.name   ;
        this.resultFlowupSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                this.url2 = URL.createObjectURL(this.Flowup);

                        let data = new FormData();
                data.append("Flowup",this.Flowup,this.Flowup.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotSpecificationsAllowd=null
                        // });




            },
               
                idFile(event){
            this.identity=event.target.files[0];


        const result3 = getFileExtension(this.identity.name);

                    if(!this.identity.type.match('application/pdf') && result3 !='xlsx'){
                        this.FileNotidentityAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.identity.size < 1048576){
        let size = Math.floor(this.identity.size/1024);
        this.resultidentityName = this.identity.name   ;
        this.resultidentitySize = size+' KB' ;


                    }
        if(this.identity.size > 1048576){
        let size = Math.floor(this.identity.size/1024);
        this.resultidentityName = this.identity.name   ;
        this.resultidentitySize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                //    this.url2 = URL.createObjectURL(this.identity);

                        let data = new FormData();
                data.append("identity",this.identity,this.identity.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress6 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotidentityAllowd=null
        //               });



            },
          
       UpdateFile(event,id){

                    let data = new FormData();
             
          data.append('offer_id', id);

               if(event == 'FlowUp'){
                 this.loading=true;
                                data.append('dateFlow', this.dateFlow);
                                data.append('Flow', this.Flowup,this.Flowup.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progressFollow =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('request/flowup',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultFlowupSize   =null
                        this.resultFlowupName    =null
                        this.progressFollow   =null
                        this.FileNotFlowupAllowd    =null
                        this.Flowup  =null,
                        this.dateFlow=null,
                        this.loading=false;
                        this.succesAlert();
                        this.Companyrequester();
                        })
                }

                
               
             if(event == 'contractInterior'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/Interior',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        // this.successAlert();
                        this.Companyrequester();
                        })
                }
               

           if(event == 'contractHvac'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/Hvac',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }
               

              if(event == 'contractStone'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/stone',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }
               
            if(event == 'contractConstr'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/Construction',data,config).then(res=>{
                    $('#Contractfile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }
               
                if(event == 'contract'){
                                data.append('contract', this.Specifications,this.Specifications.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('conracts/consulting',data,config).then(res=>{
                    $('#contractFile').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }

                   if(event == 'threeD'){
                    data.append('threeD', this.threeD,this.threeD.name);
                                const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

                    axios.post('consulting/offer/files',data,config).then(res=>{



                            $('#editFile').modal('hide');
                           $('.modal-backdrop').css('display','none');

                        this.FileNotthreeDAllowd=null;
                        this.threeD=null;
                        this.resultthreeDSize=null;
                        this.resultthreeDName=null;
                        this.progress11=null;
                        this.successAlert();
                        this.Companyrequester();
                    })

                }

                
                 if(event == 'threeDExcel'){
                 this.loading=true;
                                data.append('ThreeDDWG', this.threeDExcel,this.threeDExcel.name);
                      

                                

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress111 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('consulting/offer/files',data,config).then(res=>{
                    $('#editFileExcel').modal('hide');
                       $('.modal-backdrop').css('display','none');
                        console.log('success');
                        this.resultthreeDExcelSize   =null
                        this.resultthreeDExcelName    =null
                        this.progress111   =null
                        this.FileNotthreeDExcelAllowd    =null
                        this.threeDExcel  =null,
                      
                        this.loading=false;

                        this.successAlert();
                        this.Companyrequester();
                        })
                }

                
                        if(event == 'arch'){
                    data.append("Architect",this.Architect,this.Architect.name);

                        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }




                    axios.post('consulting/offer/files',data ,config).then(res=>{



                            $('#editFileArch').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultSize=null
                        this.resultName=null
                        this.progress2=null
                        this.FileNotMapAllowd=null
                        this.Architect=null
                        this.successAlert();
                        this.Companyrequester();
                    })
                        }

   if(event == 'archDWG'){
                    data.append("archDWG",this.ArchitectDWG,this.ArchitectDWG.name);

                        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress222 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }




                    axios.post('consulting/offer/files',data ,config).then(res=>{



                            $('#editFileArchDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultArchitectDWGSize=null
                        this.resultArchitectDWGName=null
                        this.progress222=null
                        this.FileNotArchitectDWGAllowd=null
                        this.ArchitectDWG=null
                        this.successAlert();
                        this.Companyrequester();
                    })
                        }
                        


                        if(event == 'services'){
                        data.append('services', this.services,this.services.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('consulting/offer/files',data,config).then(res=>{



                            $('#editFileServic').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesSize =null
                        this.resultservicesName =null
                        this.progress8 =null
                        this.FileNotservicesAllowd =null
                        this.services =null
                        this.successAlert();
                        this.Companyrequester();
                    })

                }

                       if(event == 'servicesDWG'){
                        data.append('servicesDWG', this.servicesDWG,this.servicesDWG.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress888 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('consulting/offer/files',data,config).then(res=>{



                            $('#editFileSErvicesDwg').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesDWGSize =null
                        this.resultservicesDWGName =null
                        this.progress888 =null
                        this.FileNotservicesDWGAllowd =null
                        this.servicesDWG =null
                        this.successAlert();
                        this.Companyrequester();

                    })

                }
                if(event == 'structure'){
                            data.append('structure', this.structure,this.structure.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }
                      

            axios.post('consulting/offer/files',data,config).then(res=>{
                    $('#editFilestructure').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultstructureSize  =null
                        this.resultstructureName  =null
                        this.progress3  =null
                        this.FileNotstructureAllowd  =null
                        this.structure =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }


    if(event == 'structureDWG'){
                            data.append('structureDWG', this.structureDWG,this.structureDWG.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress333 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }
                      

            axios.post('consulting/offer/files',data,config).then(res=>{
                    $('#editFilestructureDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultstructureDWGSize  =null
                        this.resultstructureDWGName  =null
                        this.progress333  =null
                        this.FileNotstructureDWGAllowd  =null
                        this.structureDWG =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }

                if(event == 'SpecificationsDWG'){
                                data.append('SpecificationsDWG', this.SpecificationsDWG,this.SpecificationsDWG.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress444 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('consulting/offer/files',data,config).then(res=>{
                    $('#editFileSpecDWG').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsDWGSize   =null
                        this.resultSpecificationsDWGName   =null
                        this.progress444   =null
                        this.FileNotSpecificationsDWGDwgAllowd   =null
                        this.SpecificationsDWG  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }

                    if(event == 'spec'){
                                data.append('Specifications', this.Specifications,this.Specifications.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('consulting/offer/files',data,config).then(res=>{
                    $('#editFileSpec').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.Companyrequester();
                        })
                }
          

           
            },
                 successAlert(){
              $('#successBox').modal('show');
                $('.modal-backdrop').css('display','block');
                },
    OfferEng(requests){
       
       let datas = new FormData();
      // this.files.forEach((file) => {
      //   datas.append("images[]", file, file.name);
      // });

      
      datas.append("budget", this.budget);
      datas.append("Supervisor", this.Supervisor);
      datas.append("design", this.design);
      datas.append("tab", this.tab);
      datas.append("request_id", this.request_id);
      datas.append("id", requests.offer.id);
    

      axios
        .post("request/villa", datas)
        .then((response) => {
        this.Companyrequester();
        })
        .catch((error) => {
          if (422 === error.response.status) {
            // console.log(error.response.data.errors);
            this.errors = error.response.data.errors;
          }
          this.status = error.response.status;
        })

    },
                     RemoveFile(event){
                        if(event =='Flowup'){
this.Flowup =null
this.progressFollow=null
this.resultFlowupName =null
this.resultFlowupSize=null
       }


        if(event =='threeD'){
this.threeD =null
this.progress11=null

this.resultthreeDame=null
this.resultthreeDSize=null
       }

               if(event =='threeDExcel'){
  this.FileNotthreeDExcelAllowd=null
this.threeDExcel=null
 this.resultthreeDExcelSize=null
  this.resultthreeDExcelName=null
  this.progress111=null
       }

 if(event =='Another'){
this.Another =null
this.progress10=null
this.resultAnotherName=null
this.resultAnotherSize=null
       }
        if(event =='services'){
this.services =null
this.progress8=null
this.resultservicesName=null
this.resultservicesSize=null
       }
                  if(event =='identity'){
this.identity =null
this.progress6=null
this.resultidentityName=null
this.resultidentitySize=null
       }
if(event =='map'){
this.map =null
this.progress5=null
this.resultmapName=null
this.resultmapSize=null
       }

       if(event =='Water'){
this.Water =null
this.progress7=null
this.resultWaterName=null
this.resultWaterSize=null
       }

            if(event =='Specifications'){
this.Specifications =null
this.progress4=null
this.resultSpecificationsName=null
this.resultSpecificationsSize=null
       }
       if(event =='structure'){
this.structure =null
this.progress3=null
this.resultstructureName=null
this.resultstructureSize=null
       }
  
if(event =='Architect'){
this.Architect =null
this.progress2=null
this.resultName=null
this.resultSize=null
       }








       },
    visible(number,id){


      let datas = new FormData();

      datas.append("number", number);
      datas.append("request_id", this.request_id);
      datas.append("user", id);

        axios.post('click/mobile',datas).then(res=>{
             this.number = number;
        })
    },
    getRequester(){
      
        axios.get('requester/'+this.request_id).then(res=>{
        this.requests = res.data;

         this.requests.forEach((request) => {

         
         request.converted.forEach((converted) => {
          //  console.log(converted.type);

           if(converted.type=='construction'){
          //     this.TypeTender1 = converted.type;
          //     this.TypeTenderId1 = converted.tender_id;
              this.TypeTender1=converted.type;
              this.TypeTenderId1=converted.tender_id;
          
           }

           if(converted.type=='hvac'){
              this.TypeTender2 = converted.type;
              this.TypeTenderId2 = converted.tender_id;
           }
            if(converted.type=='stone'){
               this.TypeTender3 = converted.type;
              this.TypeTenderId3= converted.tender_id;
           }
             if(converted.type=='interior'){
                this.TypeTender4 = converted.type;
              this.TypeTenderId4= converted.tender_id;
           }
         

      });
      });

     
        })
    },
      Companyrequester(){
        axios.get('Companyrequester/'+this.request_id).then(res=>{
        this.requests = res.data;
        })
    }

    
},
created(){
  
  Echo.private(`chat.this.${this.request_id}`)
  .listen('MessageSent', (e) => {
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
  });

    //  Echo.private(`newComment.${this.id}`).listen("NewComment", (e) => {
    //     console.log(e);
    //     this.Myoffers.unshift(e.myoffer);
    //     console.log("lisiten To new Comment");
    //   });
    // },

  


  this.fetchMessages();

        if(this.IsUser==10){
            this.getRequester();
    }


      if(this.IsUser==1){
        this.Companyrequester();
    }
},
   computed: {
     user(){
                   return this.$store.getters.user
     },
 
     IsUser(){
            return this.$store.getters.IsUser
        },
         hasErrors() {
        return 422 === this.status && this.errors !== null;
    },

  },
}
</script>

<style scoped>




.card{
    padding: 20px;
}
.grey{
    color: #ccd1e1;
}
.list-item span{
padding: 10;
}

.image-container {

display: block;
position: relative;
border: 1px solid #eee;





}
.image-container img{
     width: 6.25rem;
    height: 6.25rem;
    overflow: hidden;

}
.green-badge{
background: rgba(37, 181, 121,0.1);
    color: #25b579;
}
.star-rating .bx-star{
    font-size: 2rem;
    cursor: pointer;
    margin: 5px;
}
/* .image-container .after {
 position: absolute;
  display: none;
    justify-content: center;
    align-items: center;
      top: 0;
    left: 0;
    right: 0;

    width: 6.25rem;
    height: 6.25rem;

    color: #FFF;
    transition: all 0.5s ease-in-out ;
}
.image-container:hover .after {
    display: flex;
    background: rgba(86, 71, 71, 0.5);
    transition: all 0.5s ease-in-out ;
    cursor: pointer;

} */
</style>
