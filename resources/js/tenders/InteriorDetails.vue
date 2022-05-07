<template>
  <div class="container">


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

<span v-if="IsUser==10">
<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
<div class="contact-form" v-for="(tender,index0) in tenders" :key="index0">

    <h1 class="text-center thm-color">  تحديث البيانات</h1>
         <form enctype="multipart/form-data" class="c-form-inner">

                <div class="text-right form-group " dir="rtl">

                <label for=" h6">
                    <span class=" h6 font-weight-bold theme-color">
                    {{$t('title')}}
                    </span>
                    </label>
                <input
                  name="title"
                  :value="tender.title"
                  :class="[{'is-invalid': errorFor('title')}]"
                  placeholder="وصف مختصر للمشروع"

                />
                <div
                  class="invalid-feedback"
                  v-for="(error, index) in errorFor('title')"
                  :key="'title' + index"
                >{{ error }}</div>

              </div>

               <div class=" form-group mt-3" :class="$t('text_align')" :dir="$t('direactions')">
                  <label for="exampleFormControlTextarea1 "><div class="theme-color">{{$t('description')}}</div></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    name="desc"
                    :value="tender.notes"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل وصفاً مفصلاً لمشروعك   "

                  ></textarea>
                   <!-- class="invalid-feedback" -->
                  <div
                    class="text-danger"
                    v-for="(error, index) in errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div>
                </div>

                   <button class="btn theme-btn" @click.prevent="UpdateTitle">حفظ</button>

         </form>
</div>

    </div>
</div>
</div>


  <!-- <div class="modal fade" id="AdditionalFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة ملف الخدمات </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 <strong v-if="FileNotAllowd2" class="text-danger">{{FileNotAllowd2}}</strong>
        <div class="image-preview" v-show="images2.length">
            <div class="image-wrapper " v-for="(image,i) in images" :key="i">
                <span v-if="files2[i].name!=null">

                <span v-if="progressbar2[i]" class="">{{progressbar2[i]}}</span>
<div class="progress" v-if="progressbar2[i]" style="hieght:10px !important">
  <div v-if="progressbar2[i]!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressbar2[i]+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressbar2[i]=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressbar2[i]+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultadditionalSize" @click.prevent='removeImage2(i)'></span>

<span v-if="resultadditionalSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{files2[i].name}}</span>

                   <span class="text-muted  float-right" v-if="files[i].size"> {{files2[i].size}} KB </span>
                </span>



            </div>
        </div>

          <small class="text-muted">Pdf , dwg (autocad file) , jpg , png)</small>
             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.add" v-if="additional==null"><span class=" fa fa-plus" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.add" v-else><span class="fa fa-plus" ></span> </span>
           <span class="">   اضافة ملفات خدمات اخرى</span>
                <input type="file" class="form-control"  style="display:none" ref="add" @change.prevent="onImageChanged2" id="file" multiple>


            </label>
             </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

 <div class="modal fade" id="editFileSpec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
             تبديل الملف
        <span v-if="SpecFile">  ملف المواصفات</span>



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

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsFile" style="display:none" ref="specifications">

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
        <button type="button" class="btn theme-btn" @click="UpdateFile('spec')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="editFileMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
             تبديل
        <span v-if="MapFile">   خارطة الارض</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="MapFile">{{MapFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted"> Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

            <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.ele" v-if="map==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.ele" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   خارطة الارض  </span>
                <input type="file" class="form-control"  @change="mapFile" style="display:none" ref="ele">

               <div class=" text-danger" v-if="FileNotmapAllowd!=null">{{FileNotmapAllowd}}</div>



            </label>
            </div>
<span v-if="progress5" class="">{{progress5}}</span>
<div class="progress" v-if="progress5" style="hieght:10px !important">

  <div   v-if="progress5!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div   v-if="progress5=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultmapSize" @click="RemoveFile('map')"></span>

<span v-if="resultmapSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultmapName}}</span>
<span v-if="resultmapSize!=null"  class="float-right">{{resultmapSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('map')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editFileIdent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color " id="exampleModalLabel">
             تبديل
        <span v-if="IdentFile"> الهوية </span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="IdentFile">{{IdentFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, xlsx)</small>
            <small class=" float-right text-danger font-weight-bold">إجباري</small>

            <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.idfile" v-if="identity==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.idfile" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     الهوية</span>
                <input type="file" class="form-control"  @change="idFile" style="display:none" ref="idfile">

               <div class=" text-danger" v-if="FileNotidentityAllowd!=null">{{FileNotidentityAllowd}}</div>



            </label>
            </div>
<span v-if="progress6" class="">{{progress6}}</span>
<div class="progress" v-if="progress6" style="hieght:10px !important">


  <div v-if="progress6!='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress6=='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultidentitySize" @click="RemoveFile('identity')"></span>
<span v-if="resultidentitySize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultidentityName}}</span>
<span v-if="resultidentitySize!=null"  class="float-right">{{resultidentitySize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('ident')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editFileStructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="contact-form ">
      <div class="modal-header">
        <h5 class="modal-title theme-color" id="exampleModalLabel">
             تبديل الملف
        <span v-if="StrutureFile">  الملف الانشائي</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="StrutureFile">{{StrutureFile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style ">
                 <label>
                 <span class="btn btn-light" @click="$refs.structure" v-if="Structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structure" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
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

<span v-if="resultStructureSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultStructureName}}</span>
<span v-if="resultStructureSize!=null"  class="float-right">{{resultStructureSize}}</span>


</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn theme-btn primary" data-dismiss="modal">إلغاء</button>
        <button type="button" class="btn theme-btn" @click="UpdateFile('structure')"> حفظ</button>
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
             تبديل الملف
        <span v-if="ArchitectFile">  مخطط المعماري</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="Archictfile">{{Archictfile}}</span>

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
        <button type="button" class="btn theme-btn" @click="UpdateFile('arch')"> حفظ</button>
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
             تبديل الملف
        <span v-if="threeDfile">  3d</span>



        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <span v-if="threeDfile">{{threeDfile}}</span>

        <h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" fa fa-paperclip" ></span></span>

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
        <button type="button" class="btn theme-btn" @click="UpdateFile('threeD')"> حفظ</button>
      </div>
    </div>
    </div>
  </div>
</div>
</span>





<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
          هل انت متأكد انك تريد اختيار
 <strong>{{company_name}}</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary " data-dismiss="modal">Close</button>
        <button type="button" class="theme-btn" @click="confirmOffer(Ifconfirm,com_id)">تأكيد</button>
      </div>
    </div>
  </div>
</div>
    <span v-for="(tender,index0) in tenders" :key="index0" >

      <div class="p-descrip-box container mb-5">

        <ul class="list-group list-group-flush">
          <li class="list-group-item container">



            <a class="h1 text-dark"  >{{tender.title}}</a>
            <br>
             <status :status=" tender.status"></status>
                    <div class="d-flex float-right" v-if='IsUser==10 && tender.status==0 || tender.status==6'>
             <!-- <a class=" btn btn-light btn-lg" style="cursor:pointer" @click="editTitle(2)"><i class=" fa fa-edit"></i></a> -->
             <a class=" theme-btn btn-lg"  style="cursor:pointer" data-toggle="modal" data-target="#update">
                 <i class=" bx bx-edit"></i>{{$t('Edit')}}</a>

</div>





            <div class="d-block mt-3">
                 <span > <i class="fa fa-clock-o text-muted mt-4" style="font-size:14px"></i> {{tender.added_at}}</span>
                 <span > <i class="fa fa-circle text-success  mt-4" style="font-size:14px"></i>

             <all-uae :emirates="TheUAe ==null ?tender.emirates: TheUAe"></all-uae>
                  </span>



                         
     
            </div>
       <router-link v-if="tender.tenderPoster" v-show="IsUser==10" :to="{name:'RequesttenderDetails',params:{type:'consulting',id:tender.tenderPoster.request_id}}"
              class="btn mr-2 btn btn-success float-right confirm">
             <i class='bx bx-log-out'></i>
        الدخول لمتابعة طلب الاستشاري

            </router-link>   
               <router-link v-show="IsUser==10" v-if="tender.VillaPoster" 
                :to="{name:'requestDetails',params:{id:tender.VillaPoster.request_id}}"
              class="btn mr-2 btn btn-success float-right confirm">
             <i class='bx bx-log-out'></i>
        الدخول لمتابعة طلب الاستشاري

            </router-link>
          </li>
        </ul>
      </div>
       <div class="container alert alert-danger" v-if="tender.reaject_reason && tender.status==6">{{tender.reaject_reason}}</div>
    </span>


<div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-7" >
        <stages v-for="(tender,b) in tenders" :key="b" v-bind="tender" ></stages>

    <div class="p-descrip-box container mt-3">


        <div class="text-right" v-for="(tender,index) in tenders" :key="index" >
            <div class="h5 "> وصف المشروع  </div>
            {{tender.notes}}</div>

    </div>

<!-- Start show Offer  -->

    <div v-for="tender,index2 in tenders" :key="index2" class=" mt-3 p-descrip-box">
 <div class="h5 text-right"> ({{tender.comments.length}}) عدد العروض </div>
                <div v-if="tender.comments.length>0">

                <span v-for="comment,ie in tender.comments" :key="ie" v-bind="comment" class=" mt-3">

                    <div class=" mt-3 ">
                        <p><img :src="comment.user.avatar" class="rounded-circle ml-2 mr-2" width="40" height="40"><b class="mr-2">{{comment.user.name}}</b>
                        <small class="">{{comment.added_at}}</small>
                        </p>
                        <div class="text-right h4 text-dark ">المقترح</div>
                        <p class="text-right">{{comment.textOffer}}</p>
                        <div class="text-right h4 text-dark">البنود الغير مشمولة</div>
                        <p class="text-right">{{comment.items}}</p>
<!--
                            <div class="text-right h5">هل اعتمدت جدول مواصفات الاستشاري</div>
                            <p v-if="comment.Approval==0" class="text-right">لا </p>
                            <p v-if="comment.Approval==1" class="text-right">نعم </p> -->

                    </div>

                     <div class="h4 text-dark text-right">ملف المقترح</div>


          <div v-for="image , i in comment.image " :key="i"  class="p-descrip-box">

                   <!-- <a :href="image.path"  class="text-dark mt-3 font-weight-bold" download="download" v-if="image.extension=='jpg' || image.extension=='png'" >
                     <p class=" mt-3 h6"><i class="fas fa-image text-info" ></i> {{image.name}}</p>
                   </a> -->

                     <a :href="image.path" class="btn btn-danger font-weight-bold" download="download"
                      v-if="image.extension=='pdf' || image.extension== 'dwg'"  >
                   <i class="fas fa-file-pdf"></i> عرض ملف المقترح
                   </a>

          </div>
<div dir="rtl" class="text-right ">
<button class="btn btn-download  confirm" @click.prevent="confirm(comment.id,comment.user.name,comment.user.id)"
             v-if="userid==tender.user_id && tender.stage==0 " data-toggle="modal" data-target="#exampleModalCenter">
             <i class="fa fa-check-circle" ></i> اختار</button>
        <span v-for="confirm,i in comment.confirmd" :key="i">




          <span v-if="IsUser == 10">
                 
          

             <div class="alert alert-success"  v-if="userid==tender.user_id && tender.stage==1  && confirm.offer_id ==comment.id">        
               تم إختيار هذا العرض , سوف يتم التواصل معك في اقرب وقت 
             </div>
</span>

<span v-if="IsUser ==5 ">

<table class="table table-striped" v-if="user_ID==confirm.com_id && tender.stage==1  && confirm.offer_id ==comment.id">
  <thead>
    <tr>
      <th scope="col"> العميل</th>
      <th scope="col">{{tender.user.name}}</th>
      
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row">موبايل</th>
      <td>{{tender.user.mobile}}</td>
     
    </tr>

  </tbody>
</table>
             <button class="theme-btn primary  confirm"
             v-if="user_ID==confirm.com_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
             <i class="fa fa-check-circle-o" ></i> تم اختيار العرض الذي قدمته </button>
              <!-- <router-link :to="{name:'RequesttenderDetails',params:{type:confirm.type,id:confirm.id}}"
               class="btn mr-2 theme-btn  confirm"
             v-if="user_ID==confirm.com_id && tender.stage==1  && confirm.offer_id ==comment.id" disabled >
           قم بالدخول لمتابعة الطلب</router-link> -->
</span>
        </span>
</div>

                </span>

                </div>

                <div v-else class="text-right mt-3">
!ليس هنالك عروض بعد
                </div>



    </div>



<!-- End Show Offer -->
    <!-- Comments Offeمتrs -->



<span v-for="tender , index2 in tenders " :key="index2">

<span v-if="tender.comments>0">
<div v-for="comment , index in tender.comments" :key="index">

<span :v-model="vendor(comment)"></span>
</div>
</span>
    <div class="p-descrip-box mt-3" v-if="IsUser!=10 && tender.stage==0">


<form @submit.prevent="SubmitOffer" enctype="multipart/form-data">

 <div class=" mt-3 mb-3 ml-3 mr-3">
   <!-- <label for="exampleFormControlInput1">Photo</label>
    <input type="file" @change="newPhoto($event)" class="form-control" id="photo" name="photo">
    !-->
    <div class=" h5 text-right">البنود المشمولة</div>
     <small class="  text-danger font-weight-bold">إجباري</small>
    <textarea rows="4" class="mb-3 form-control" v-model="items"></textarea>

       <div class=" h5 text-right"> المقترح</div>
                           <small class="  text-danger font-weight-bold">إجباري</small>

    <textarea rows="4" class="form-control"  v-model="CommentText" :class="[{'is-invalid': errorFor('textOffer')}]"></textarea>
     <div class="invalid-feedback"
          v-for="(error, index) in errorFor('textOffer')"
          :key="'textOffer' + index"
        >{{ error }}</div>

  <div class="invalid-feedback"
          v-for="(error, index) in errorFor('com_id')"
          :key="'com_id' + index"
        >{{ error }}</div>
 </div>





 <div class="f mt-3 mb-3 ml-3 mr-3">
<div class="">
        <small class="text-muted"> Pdf</small>
                    <small class="  text-danger font-weight-bold">إجباري</small>

             <label class="d-block form-control ">
                 <span class="btn btn-light" @click="$refs.ele" v-if="map==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn  btn-primary " @click="$refs.ele" v-else><i class="fa fa-paperclip" ></i></span>
                               <span class=" text-danger font-weight-bold" v-if="FileNotAllowd!=null">{{FileNotAllowd}}</span>

           <span class="float-right">    الكوتيشن      </span>
                <input type="file" class="form-control"  @change="onImageChanged" style="display:none" ref="ele">




            </label>
<span v-if="progress5" class="">{{progress5}}</span>
<div class="progress" v-if="progress5" style="hieght:10px !important">

  <div   v-if="progress5!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div   v-if="progress5=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
          <div class="image-wrapper " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">




<a class="btn btn-light" @click.prevent='removeImage(i)' ><i class="fa fa-close"> </i> </a>
                    {{files[i].name}}

                   <sup class="text-muted " v-if="files[i].size"> {{files[i].size}} KB </sup>


                </span>
            </div>



</div>
        <!-- <div class="uploader-container mb-2"
          @dragenter.prevent="OnDragEnter"
         @dragleave.prevent="OnDragLeave"
         @dragover.prevent

         :class="{dragging:isDragging}"
         >
            <i class="fa fa-image" aria-hidden="true"></i>
            <p> Drag Or Drop </p>
            <div class="file-input">
                <label for="file">Choose file</label>
                <input type="file" name="file[]"   @change.prevent="onImageChanged" id="file" multiple :class="[{'is-invalid': errorFor('image')}]">

<div class="invalid-feedback" style="    top: 56px; position: absolute;"
          v-for="(error, index) in errorFor('image')"
          :key="'image' + index"
        >{{ error }}</div>
            </div>
        </div>

        <strong v-if="FileNotAllowd" class="text-danger">{{FileNotAllowd}}</strong>

         <div class="image-preview" v-show="images.length">
            <div class="image-wrapper " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">





                    <span v-if="files[i]['type']==='image/jpeg' || files[i]['type']==='image/jpg' ">
                     <img :src="image" :alt='`image ${i}`' width="50"  >
                     <br>

                     </span>


                          <span v-else-if=" files[i].type=='application/pdf'">
                    <i class="fa fa-file-pdf text-danger"></i>
                     </span>

                         <span v-else-if=" files[i].type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'">
                    <i class="fa fa-file-csv text-success"></i>
                     </span>


                         <span v-else-if=" files[i].type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'">
                    <i class="fa fa-file-word text-primary"></i>
                     </span>




                    {{files[i].type}}

                   <sup class="text-muted " v-if="files[i].size"> {{files[i].size}} KB </sup>
                    <div class="progress" >
  <div class="progress-bar " :class="progressbar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<a class="btn btn-light" @click.prevent='removeImage(i)' ><i class="fa fa-close"> </i> Remove</a>
                </span>
            </div>
        </div> -->




 </div>
<!-- <label for="points">Points (between {{rangeval}} and 5000 ):</label>
<input type="range" id="points" name="points" min="1000" max="5000" v-model="rangeval"> -->



         <button type="submit" class="ml-3 mx-auto text-light btn btn-download mt-3"
          :disabled="CommentText==null || items==null || progress5!='100%'">اضافة العرض  </button>




</form>
    </div>

</span>

  </div>







      <div class="col-md-5 col-sm-12 container">
        <div class="p-descrip-box">
          <div class="">
            <h5 class="text-muted text-right">ملفات المناقصة </h5>
          </div>

          <ul class="list-unstyled ml-2">
            <span v-for="tender,ind in tenders" :key="ind">

                <table class="table table-bordered font-weight-bold" dir="rtl">

  <tbody>
    <tr>
         <td>  3D </td>
        <td class="text-center">
            <a :href="tender.interior_files.threeDPath"  target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
                 <a v-if="tender.interior_files.ThreeDDWG" :href="tender.interior_files.ThreeDDWG" class="btn btn-success">
                <i class="bx bxs-down-arrow-circle"></i> ملف الاوتوكاد 
            </a>
            
             <button v-else-if="IsUser==10"  @click="HandleFile('threed',tender.interior_files.threeDName,tender.interior_files.id)"
              class="btn btn-light"  data-toggle="modal" data-target="#editFile">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>
    <tr>
      <td>المخطط المعماري</td>
        <td class="text-center"><a :href="tender.interior_files.ArchitectPath" target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
                   <a v-if="tender.interior_files.ArchitectDWG" :href="tender.interior_files.ArchitectDWG" class="btn btn-success">
                <i class="bx bxs-down-arrow-circle"></i> ملف الاوتوكاد 
            </a>
                <button v-else-if="IsUser==10"  @click="HandleFile('Architect',tender.interior_files.ArchitectName,tender.interior_files.id)
                " class="btn btn-light"  data-toggle="modal" data-target="#editFileArch">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>


    <tr>

      <td> الملف الانشائي</td>
        <td class="text-center"><a :href="tender.interior_files.StructurePath" target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
                 <a v-if="tender.interior_files.StructureDWG" :href="tender.interior_files.StructureDWG" class="btn btn-success">
                <i class="bx bxs-down-arrow-circle"></i> ملف الاوتوكاد 
            </a>
               <button v-else-if="IsUser==10"  @click="HandleFile('Structure',tender.interior_files.StructureName,tender.interior_files.id)" class="btn btn-light"
                data-toggle="modal" data-target="#editFileStructure">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>
        <tr>

      <td>جدول المواصفات</td>
        <td class="text-center"><a :href="tender.interior_files.SpecificationsPath" target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
                <a v-if="tender.interior_files.SpecificationsEXCEL"
                 :href="tender.interior_files.SpecificationsEXCEL" class="btn btn-success">
                <i class="bx bxs-down-arrow-circle"></i> ملف الإكسل 
            </a>
                <button v-else-if="IsUser==10"  @click="HandleFile('spec',tender.interior_files.SpecificationsName,tender.interior_files.id)" class="btn btn-light"
                data-toggle="modal" data-target="#editFileSpec">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>

     <tr>

      <td> الهوية</td>
        <td class="text-center"><a :href="tender.interior_files.identityPath" target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
             <button v-if="IsUser==10"  @click="HandleFile('ident',tender.interior_files.identityName,tender.interior_files.id)" class="btn btn-light"
                data-toggle="modal" data-target="#editFileIdent">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>

      <tr>

      <td> خارطة الارض</td>
        <td class="text-center"><a :href="tender.interior_files.mapPath" target="_blank" class="btn btn-download">
           <i class=" fas fa-eye" style="font-size:10px"></i>
            <small class="">مشاهدة </small>
            </a>
            <button v-if="IsUser==10"  @click="HandleFile('map',tender.interior_files.mapName,tender.interior_files.id)" class="btn btn-light"
                data-toggle="modal" data-target="#editFileMap">
            <i class='fas fa-sliders-h'   style="font-size:10px"></i>
            <small class="text-muted"> تعديل</small>
            </button>
        </td>
    </tr>

    <tr>

      <td colspan="4"> <div class="text-center ">الاستشاري : {{tender.company_name}}</div></td>

    </tr>
  </tbody>
</table>






<h5 class="text-muted text-right">ملفات اضافية </h5>

              <li v-for="file,indimg in tender.tcimg" :key="indimg" v-bind="file">
                <span v-if="file.extension=='jpg'">
                  <a :href="'Construction/image/'+ file.name" download class="btn-link text-dark">
                    <i class="far fa-fw fa-image btn-link text-primary"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='xlsx'">
                  <a :href="'Construction/Excel/'+ file.name" download class="btn-link text-dark">
                    <i class="fa fa-fw fa-file-csv text-success"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='pdf'">
                  <a :href="'Construction/pdf/'+ file.name" download class="text-dark btn-link">
                    <i class="text-danger far fa-fw fa-file-pdf"></i>
                    {{file.name}}
                  </a>
                </span>
                <span v-else-if="file.extension=='dwg'">
                  <a :href="'Construction/autocad/'+ file.name" download class="text-dark btn-link">
                    <i class="text-info far fa-fw fa-file"></i>
                    {{file.name}}
                  </a>
                </span>


              </li>
            </span>


            <!-- <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="fa fa-fw  fa-file-csv"></i> Contract-10_12_2014.docx</a>
            </li>-->
          </ul>
        </div>
      </div>
    </div>
</div>
    <div id="editPostModal" class="modal fade"  v-if="IsUser==10">
      <div class="modal-dialog">
        <div class="modal-content">
          <form enctype="multipart/form-data">

            <div class="modal-header">
              <h4 class="modal-title">تعديل المناقصة </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>العنوان</label>
                <input type="text" class="form-control" name="title" required :value="PostToEdit.title" :class="[{'is-invalid': errorFor('title')}]">
                   <div
          class="invalid-feedback"
          v-for="(error, index) in errorFor('title')"
          :key="'title' + index"
        >{{ error }}</div>
              </div>
              <div class="form-group">
                <label>الوصف</label>
                <textarea  cols="30" class="form-control" rows="10" name="notes" :value="PostToEdit.notes"
                :class="[{'is-invalid': errorFor('notes')}]">></textarea>
                <div
          class="invalid-feedback"
          v-for="(error, index) in errorFor('notes')"
          :key="'notes' + index"
        >{{ error }}</div>
              </div>
              <div class="form-group">


                <select class="form-control" name="emirates" :value="PostToEdit.emirates" :class="[{'is-invalid': errorFor('emirates')}]">
                    <option value="2">Duabi</option>
                    <option value="2">Fujira</option>
                    <option value="3">Ras Alkhima</option>
                    <option value="4">um alqwain</option>
                    <option value="5">sharja</option>
                    <option value="6">ajman</option>
                    <option value="7">Abudabhi</option>
                </select>
                <div class="invalid-feedback"
          v-for="(error, index) in errorFor('emirates')"
          :key="'emirates' + index"
        >{{ error }}</div>

              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
              <input type="submit" class="btn btn-success" @click.prevent="UpdatePost" value="save" />

            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import Status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';
import stages from "./stages.vue";
import TitleTender from "./titleTender.vue";
export default {
  components: { stages, TitleTender, Status, AllUae },
  data() {
    return {

      tenders: null,
      isDragging:false,
      mohab:'',
      exist:null,
       files:[],
       images:[],
       rangeval:1000,
       progress5:null,
       FileNotAllowd:'',
      messageTender: null,
      messageUpdateTender: null,
        CommentText:null,
      showTender:[],
      tender_id :this.$route.params.id,
      errors:null,
      status:null,
      Ifconfirm:'',
      company_name:'',

      comments:'',
      test:'',
      com_id:'',
      items:null,
      approval:null,
      quran:null,
      edit:0,
      title_replace:null,
      notes_replace:null,
      TheUAe:null,

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
        FilesID:null,


        //   Architect file
        resultSize:null,
        resultName:null,
        progress2:null,
        FileNotMapAllowd:null,
        Architect:null,


        // Services File

        resultservicesSize :null,
        resultservicesName :null,
        progress8 :null,
        FileNotservicesAllowd:null,
        services:null,


        //structure Files
        resultStructureSize :null,
        resultStructureName :null,
        progress3 :null,
        FileNotStructureAllowd :null,
        structure:null,

        //specifcation file
        resultSpecificationsSize :null,
        resultSpecificationsName :null,
        progress4 :null,
        FileNotSpecificationsAllowd :null,
        specifications:null,


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


    };
  },



  created() {

    $(".carousel").carousel();
    this.getDetails();
    this.getMessageTender();
    // this.UpdatePost();

  },


      methods:{
successAlert(){
              $('#successBox').modal('show');
                $('.modal-backdrop').css('display','block');
                },
                threedFile(event){ //check
            this.threeD=event.target.files[0];


        const result3 = getFileExtension(this.threeD.name);

                    if(!this.threeD.type.match('application/pdf|image.*')){
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

        // passing the filename


                //    this.url2 = URL.createObjectURL(this.threeD);

        //                let data = new FormData();
        //         data.append("threeD",this.threeD,this.threeD.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


        //                }
        //               }


        //               axios.post('sucess',data,config).then(res=>{
        //                   this.FileNotthreeDAllowd=null
        //               });



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
                StructureFile(event){

                this.Structure=event.target.files[0];


        const result2 = getFileExtension(this.Structure.name);

                    if(!this.Structure.type.match('application/pdf') && result2 !='dwg' ){
                        this.FileNotStructureAllowd =`should Pdf Or Dwg (autocad file) `;
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


                this.url2 = URL.createObjectURL(this.Structure);

                        let data = new FormData();
                data.append("Structure",this.Structure,this.Structure.name);
                this.FileNotStructureAllowd=null

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
                mapFile(event){
            this.map=event.target.files[0];


        const result3 = getFileExtension(this.map.name);

                    if(!this.map.type.match('application/pdf') && result3 !='dwg'){
                        this.FileNotmapAllowd =`should Pdf Or Dwg (autocad file) `;
                            return ;
                        }

                        if(this.map.size < 1048576){
        let size = Math.floor(this.map.size/1024);
        this.resultmapName = this.map.name   ;
        this.resultmapSize = size+' KB' ;


                    }
        if(this.map.size > 1048576){
        let size = Math.floor(this.map.size/1024);
        this.resultmapName = this.map.name   ;
        this.resultmapSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }

        // passing the filename


                //    this.url2 = URL.createObjectURL(this.map);

                        let data = new FormData();
                data.append("map",this.map,this.map.name);

        // const config = {
        //                   onUploadProgress:uploadEvent=>{
        //                   this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        //                   // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

        //                }
        //               }


                        // axios.post('sucess',data,config).then(res=>{
                        //     this.FileNotmapAllowd=null
                        // });



            },
                HandleFile(event,value ,id){
                    this.FilesID=id;
                    if(event=='threed'){
                    this.threeDfile=value

                    }

                    if(event=='Architect'){
                    this.Archictfile=value

                    }
                    if(event=='Services'){
                    this.serviceFile=value

                    }

                    if(event=='Structure'){
                    this.StrutureFile=value

                    }

                    if(event=='spec'){
                    this.SpecFile=value

                    }

                        if(event=='ident'){
                    this.IdentFile=value

                    }

                    if(event=='map'){
                    this.MapFile=value

                    }


                },
                UpdateFile(event){

                    let data = new FormData();
                    data.append('FilesID', this.FilesID);
                if(event == 'threeD'){
                    data.append('threeD', this.threeD,this.threeD.name);
                                const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

                    axios.post('update/interior/threedFile',data,config).then(res=>{



                            $('#editFile').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.FileNotthreeDAllowd=null;
                        this.threeD=null;
                        this.resultthreeDSize=null;
                        this.resultthreeDName=null;
                        this.progress11=null;
                        this.successAlert();
                        this.getDetails();
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




                    axios.post('update/interior/threedFile',data ,config).then(res=>{



                            $('#editFileArch').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultSize=null
                        this.resultName=null
                        this.progress2=null
                        this.FileNotMapAllowd=null
                        this.Architect=null
                        this.successAlert();
                        this.getDetails();
                    })
                        }


                        if(event == 'services'){
                        data.append('services', this.services,this.services.name);

                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

                    axios.post('update/interior/threedFile',data,config).then(res=>{



                            $('#editFileServic').modal('hide');
                        $('.modal-backdrop').css('display','none');

                        this.resultservicesSize =null
                        this.resultservicesName =null
                        this.progress8 =null
                        this.FileNotservicesAllowd =null
                        this.services =null
                        this.successAlert();
                        this.getDetails();
                    })

                }
                if(event == 'structure'){
                            data.append('Structure', this.Structure,this.Structure.name);
                            const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }

            axios.post('update/interior/threedFile',data,config).then(res=>{
                    $('#editFileStructure').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultStructureSize  =null
                        this.resultStructureName  =null
                        this.progress3  =null
                        this.FileNotStructureAllowd  =null
                        this.structure =null
                        this.successAlert();
                        this.getDetails();
                        })
                }
                if(event == 'spec'){
                                data.append('Specifications', this.Specifications,this.Specifications.name);

        const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';


                        }
                        }



            axios.post('update/interior/threedFile',data,config).then(res=>{
                    $('#editFileSpec').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultSpecificationsSize   =null
                        this.resultSpecificationsName   =null
                        this.progress4   =null
                        this.FileNotSpecificationsAllowd   =null
                        this.specifications  =null
                        this.successAlert();
                        this.getDetails();
                        })
                }
            if(event == 'ident'){
        data.append('identity', this.identity,this.identity.name);

                    const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress6 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }

            axios.post('update/interior/threedFile',data,config).then(res=>{
                    $('#editFileIdent').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.resultidentitySize   =null
                        this.resultidentityName   =null
                        this.progress6   =null
                        this.FileNotidentityAllowd   =null
                        this.identity  =null
                        this.successAlert();
                        this.getDetails();
                        })
                }

                                if(event =='map'){
                                    data.append('map', this.map,this.map.name);
                                    const config = {
                            onUploadProgress:uploadEvent=>{
                            this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                            // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                        }
                        }
                                    axios.post('update/interior/threedFile',data , config).then(res=>{
                        $('#editFileMap').modal('hide');
                        $('.modal-backdrop').css('display','none');
                        this.map =null
                        this.progress5=null
                        this.resultmapName=null
                        this.resultmapSize=null
                        this.successAlert();
                        this.getDetails();
                        })
                            }



        // IdentFile

            },
           onImageChanged2(event){
               const files2 = event.target.files;


               Array.from(files2).forEach(file => this.addImage2(file))


            },
            addImage2(file){




    function getFileExtension(filename){

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

// passing the filename
const result1 = getFileExtension(file.name);
console.log(result1);



                if(!file.type.match('image.*|application.*') && result1 !="dwg"){
                   this.FileNotAllowd2 =`Not Allowd ${file.type} `;
                    return ;
                }

                this.files2.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images2.push(e.target.result)

            let data = new FormData();
          data.append("anotherone",file,file.name);
                reader.readAsDataURL(file);
              console.log(file);
                 this.FileNotAllowd2 ='';

                     const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressbar2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotservicesAllowd=null
                });
            },
            removeImage2(i){
  let files = this.files2;
  files.splice(i,1,'');
    console.log(files);

            },
          editTender(number){
              this.edit=number;
          },
            UpdateTitle(){
               let data = new FormData();

                  let UpdateNotes = document.querySelector("textarea[name=desc]").value
                   let Updatetitle = document.querySelector("input[name=title]").value;



                    data.append('title',Updatetitle)
                    data.append('notes',UpdateNotes)
                    data.append('id',this.tender_id);
t

                    axios.post('UpdateTenderInteriorTitle',data).then(res=>{
                    this.title_replace=res.data;


                    $('#Update').modal('hide');
                $('.modal-backdrop').css('display','none');
                 this.successAlert();
                this.getDetails();


              }).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status

        })



          },
          vendor(comment){
              this.comments=comment;
          },

          confirm(id,name,com_id){
              console.log(id);
              this.Ifconfirm = id;
              this.com_id = com_id;
              this.company_name=name;

          },

          confirmOffer(offrerid,com_id ){

                  let data = new FormData();



        data.append('offer_id', offrerid);
        data.append('tender_id', this.tender_id);
        data.append('com_id', this.com_id);
        axios.post('confirm/interior/offer',data).then(res=>{
            this.getDetails();
            $('#exampleModalCenter').modal('hide')
           $('.modal-backdrop').css('display','none');
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



                if(!file.type.match('application/pdf')){
                   this.FileNotAllowd ="يجب ان يكون الملف pdf";
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)


                reader.readAsDataURL(file);

                 let data = new FormData();
          data.append("file",file,file.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotAllowd=null
                });

                 this.FileNotAllowd ='';
            },
        onImageChanged(e){
               const files = e.target.files;
               Array.from(files).forEach(file => this.addImage(file))
            },


            removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);
    this.progress5=0;



            },

              initializedListner(){
          Echo.private(`CommentConsr.${this.tender_id}`)
          .listen('commentConsr',(e)=>{
              console.log(e);
              console.log('You have new Offer Comment ');
            // this.test.unshift(e.comments);

          })
      },


      SubmitOffer(){

    let data = new FormData();


             this.files.forEach(file =>{
            data.append('images[]',file,file.name);

        })
      if(this.approval==false){
            this.approval=0;
        }
 if(this.approval==true){
            this.approval=1;
        }



        data.append('textOffer', this.CommentText);
        data.append('construction_id', this.tender_id);
        data.append('items', this.items);

        data.append('com_id', this.userid);
        console.log(this.files);
        let insert = ''

            if(this.IsUser==5){
                    insert = 'insertInteriorOffer'
            }


            axios.post(insert,data).then(res=>{


            this.CommentText =" ";
            this.items =" ";
            this.approval =false;
            this.progress5 =null;
            this.files =" ";
            this.getDetails();
            this.initializedListner();


            }).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
                this.exist=error.response.data.exist
            }
            this.status=error.response.status
       })
       .then(()=>(this.loading=false,this.ret=false,this.alert="alert alert-success alert-dismissible"));

      },
    editPost(tender) {
      this.$store.commit("EditPost", tender);
    },
    UpdatePost() {
      /* let config ={
                header : {"content-type": 'multipart/form-data'}
            }*/

            let IsUser = this.$store.getters.IsUser

            if(IsUser==10){
                console.log(this.IsUser);
      let formdata = new FormData();
        let title = document.querySelector("input[name=title]").value;
        let notes = document.querySelector("textarea[name=notes]").value;
        let emirates = document.querySelector("select[name=emirates]").value;

      formdata.append("id", this.PostToEdit.id);
      formdata.append("title", title);
      formdata.append("notes", notes);
      formdata.append("emirates",emirates);






      axios
        .post("/UpdateTenderInteriorTitle", formdata /*config*/)
        .then(res => {

          $("#editPostModal").modal("hide");
          $(".modal-backdrop").css("display", "none");

           this.title_replace=res.data.title
           this.notes_replace=res.data.notes
           this.TheUAe=res.data.emirates;



        //   location.reload();
        }).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       })
       .then(()=>(this.loading=false,this.ret=false,this.alert="alert alert-success alert-dismissible"));

    }



    },
    getDetails() {
      axios
        .get(`/showInteriorTender/${this.$route.params.id}`)
        .then(
          (response) => (
            (this.tenders = response.data )

          )
        );
    },
    errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    },
    },
computed: {
    hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
     PostToEdit() {
      return this.$store.getters.PostToEdit;
    },
    IsUser(){
                return this.$store.getters.IsUser
    },
     userid(){
                return this.$store.getters.userid
    },
      user_ID(){
                return this.$store.getters.userid
    },

}

};
</script>


<style lang="scss" scoped>
.card{
    padding:20px;
}
.confirm{
        padding: 13px 20px;
    border-radius: 28px;
    box-shadow: 0px 0px 0px 5px rgb(255 255 255 / 20%);
    -webkit-box-shadow: 0px 0px 0px 5px rgb(255 255 255 / 20%);

}
.confirm:hover{
        padding: 13px 20px;
    border-radius: 28px;
    box-shadow: 0px 0px 0px 5px rgb(14 14 14 / 20%);
    -webkit-box-shadow: 0px 0px 0px 5px rgb(179 174 174 / 20%)
}
 .uploader-container{
      background: rgb(240,240,240);
    text-align: center;
    font-size: 22px;
    border: 3px dashed #a2a2a2;
    padding: 1rem 2rem;
    position: relative;
    color: #797979;
    &.dragging{
        background: #fff;
        color: #797979;
        border:3px dashed #0c66d6;
        .file-input label{
            background: #909090;
            color:#fff;
        }

    }

    i{
            font-size: 2rem;
    margin-bottom: 1rem;
    }
    .file-input{
        width: 250px;
        margin: auto;
        height: 71px;
        position: relative;
        input,label{
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
        input{
            opacity: 0;
            z-index: 2;

        }
        .image-preview{
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        margin-top: 4rem;
        .image-wrapper{
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
        img{
            width:100%;
            height:60%;
        }
    }
 }
</style>

}
