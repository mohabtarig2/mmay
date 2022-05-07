<template>
<div class="container" :dir="$t('directions')" :class="$t('text_align')" >
    <div class="row  mt-4">
        <div class="col-md-8 col-sm-12 ">






    <h2 class="text-center text-muted">{{$t('interior_decoration')}} </h2>

   <div class="contact-form w-100 mb-4">

                            <div class="">


<form  class="c-form-inner">
   <div class=" ">
   <!-- <label for="exampleFormControlInput1">Photo</label></div>
    <input type="file" @change="newPhoto($event)" class="form-control" id="photo" name="photo">
    !-->
<div class="form-group">
    <input class="form-control mb-2" type="text" placeholder="عنوان مناسب"  v-model="title" :class="[{'is-invalid': errorFor('title')}]">
    <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('title')"
          :key="'title' + index"
        >{{ error }}</div>
</div>



  <div class=" form-group mt-3">
                  <div for="exampleFormControlTextarea1">الوصف</div>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    v-model="notes"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل وصفاً مفصلاً لمشروعك   "

                  ></textarea>
                  <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div>
                </div>


        			<div class="row">
                                                            <div class="col-12">
                    <div class="single-property-details">

																	<label> {{$t('Emirates')}}
                                                                    <div class="nice-select " :class="open_select" tabindex="0" @click="open('emirates')">
                                                                        <span class="current">
                                                                            <all-uae :emirates="emirates_selected"></all-uae></span>
                                                                            <ul class="list">
                                                                            <li data-value="1" class="option " @click="emiratesFunction(7)">{{$t('abu_dabhi')}}</li>
                                                                             <li data-value="2" class="option" @click="emiratesFunction(1)">{{$t('dubai')}} </li>
                                                                             <li data-value="3" class="option"  @click="emiratesFunction(5)">{{$t('sharja')}}</li>
                                                                             <li data-value="3" class="option"  @click="emiratesFunction(6)">{{$t('ajman')}}</li>
                                                                             <li data-value="3" class="option"  @click="emiratesFunction(4)">{{$t('um_alqwin')}} </li>
                                                                             <li data-value="3" class="option"  @click="emiratesFunction(3)"> {{$t('ras_alkhima')}}</li>
                                                                             <li data-value="3" class="option"  @click="emiratesFunction(2)">{{$t('fujairah')}} </li>
                                                                                        </ul>
                                                                                </div>
                                                                                </label>

																</div>
                                                            </div>
                                                        </div>
<div class="form-group">
         <input class="form-control mb-4 mt-3" type="text" placeholder="اسم الاستشاري"  v-model="company_name" :class="[{'is-invalid': errorFor('company_name')}]" dir="rtl">
    <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('company_name')"
          :key="'company_name' + index"
        >{{ error }}</div>
</div>
<h5 class="text-right mt-3   mb-3 text-muted">الملفات المطلوبة </h5>
<div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="file-style"><label class="d-block ">

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">  تصميم الفيلا</span>
          <span class=""> 3D </span>
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDAllowd!=null">{{FileNotthreeDAllowd}}</small>
                <input type="file" class="form-control"  @change="threedFile" style="display:none" ref="threeD">





            </label></div>
<span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>
<span v-if="resultthreeDSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultthreeDName}}</span>
<span v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</span>


</div>


<div class="form-group">
    <small class="text-muted"> Pdf , dwg (autocad file)</small>
    <small class=" float-right text-danger font-weight-bold">إجباري</small>
             <div class="file-style"><label class="d-block ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="Architect==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><span class="fa fa-paperclip" ></span> </span>
              <span class=""> الملف المخططات المعماري </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="ArchitectFile" style="display:none" ref="fileinput2" >





            </label></div>
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultSize" @click="RemoveFile('Architect')"></span>

<span v-if="resultSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>


</div>



<div class="form-group">
        <small class="text-muted">Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.structure" v-if="Structure==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.structure" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">  الملف الانشائي</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotStructureAllowd!=null">{{FileNotStructureAllowd}}</small>

                <input type="file" class="form-control"  @change="StructureFile" style="display:none" ref="structure">





            </label></div>
<span v-if="progress3" class="">{{progress3}}</span>
<div class="progress" v-if="progress3" style="hieght:10px !important">

  <div  v-if="progress3 !='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress3 =='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress3+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultStructureSize" @click="RemoveFile('Structure')"></span>

<span v-if="resultStructureSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultStructureName}}</span>
<span v-if="resultStructureSize!=null"  class="float-right">{{resultStructureSize}}</span>


</div>
<div class="form-group">
            <small class="text-muted">(pdf, xlsx)</small>
                        <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.specifications" v-if="Specifications==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.specifications" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">    جدول المواصفات</span>
                <input type="file" class="form-control"  @change="SpecificationsFile" style="display:none" ref="specifications">

               <div class=" text-danger" v-if="FileNotSpecificationsAllowd!=null">{{FileNotSpecificationsAllowd}}</div>



            </label></div>
<span v-if="progress4" class="">{{progress4}}</span>
<div class="progress" v-if="progress4" style="hieght:10px !important">


  <div v-if="progress4!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress4=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress4+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultSpecificationsSize" @click="RemoveFile('Specifications')"></span>
<span v-if="resultSpecificationsSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultSpecificationsName}}</span>
<span v-if="resultSpecificationsSize!=null"  class="float-right">{{resultSpecificationsSize}}</span>


</div>






<div class="form-group">
        <small class="text-muted">(pdf, xlsx)</small>
            <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.idfile" v-if="identity==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn btn-primary " @click="$refs.idfile" v-else><span class="fa fa-paperclip" ></span> </span>
          <span class="">     الهوية</span>
                <input type="file" class="form-control"  @change="idFile" style="display:none" ref="idfile">

               <div class=" text-danger" v-if="FileNotidentityAllowd!=null">{{FileNotidentityAllowd}}</div>



            </label></div>
<span v-if="progress6" class="">{{progress6}}</span>
<div class="progress" v-if="progress6" style="hieght:10px !important">


  <div v-if="progress6!='100%'"  class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progress6=='100%'"  class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress6+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultidentitySize" @click="RemoveFile('identity')"></span>
<span v-if="resultidentitySize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultidentityName}}</span>
<span v-if="resultidentitySize!=null"  class="float-right">{{resultidentitySize}}</span>


</div>
<div class="form-group">
        <small class="text-muted"> Pdf , dwg (autocad file)</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.ele" v-if="map==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.ele" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="">   خارطة الارض  </span>
                <input type="file" class="form-control"  @change="mapFile" style="display:none" ref="ele">

               <div class=" text-danger" v-if="FileNotmapAllowd!=null">{{FileNotmapAllowd}}</div>



            </label></div>
<span v-if="progress5" class="">{{progress5}}</span>
<div class="progress" v-if="progress5" style="hieght:10px !important">

  <div   v-if="progress5!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div   v-if="progress5=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress5+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultmapSize" @click="RemoveFile('map')"></span>

<span v-if="resultmapSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultmapName}}</span>
<span v-if="resultmapSize!=null"  class="float-right">{{resultmapSize}}</span>


</div>








<div class="form-group">
     <strong v-if="FileNotAllowd" class="text-danger">{{FileNotAllowd}}</strong>
        <div class="image-preview" v-show="images.length">
            <div class="image-wrapper " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">

                <span v-if="progressbar[i]" class="">{{progressbar[i]}}</span>
<div class="progress" v-if="progressbar[i]" style="hieght:10px !important">
  <div v-if="progressbar[i]!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressbar[i]+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressbar[i]=='100%'" class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progressbar[i]+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
<span class="fa fa-close" v-if="resultAnotherSize" @click.prevent='removeImage(i)'></span>

<span v-if="resultAnotherSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{files[i].name}}</span>

                   <span class="text-muted  float-right" v-if="files[i].size"> {{files[i].size}} KB </span>
                </span>



            </div>
        </div>




        <small class="text-muted">Pdf , dwg (autocad file) , jpg , png)</small>
             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.ete" v-if="Another==null"><span class=" fa fa-plus" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.ete" v-else><span class="fa fa-plus" ></span> </span>
           <span class="">   اضافة ملفات اخرى</span>
                <input type="file" class="form-control"  @change="AnotherFile" style="display:none" ref="ete" @change.prevent="onImageChanged" id="file" multiple>





            </label></div>

</div>




<!-- <div class="form-group">
        <small class="text-muted"> Pdf , dwg (autocad file)</small>
             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.dra" v-if="drainage==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.dra" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="float-right">  الصرف الصحي </span>
                <input type="file" class="form-control"  @change="DrainageFile" style="display:none" ref="dra">

               <div class=" text-danger" v-if="FileNotdrainageAllowd!=null">{{FileNotdrainageAllowd}}</div>



            </label></div>
<span v-if="progress9" class="">{{progress9}}</span>
<div class="progress" v-if="progress9" style="hieght:10px !important">

  <div class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress9+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultdrainageSize" @click="RemoveFile('drainage')"></span>

<span v-if="resultdrainageSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultdrainageName}}</span>
<span v-if="resultdrainageSize!=null"  class="float-right">{{resultdrainageSize}}</span>


</div> -->

<!-- <div class="form-group">
        <small class="text-muted"> Pdf , dwg (autocad file)</small>
             <div class="file-style"><label class="d-block ">
                 <span class="btn btn-light" @click="$refs.water" v-if="Water==null"><span class=" fa fa-paperclip" ></span> </span>

                <span class="btn  btn-primary " @click="$refs.water" v-else><span class="fa fa-paperclip" ></span> </span>
           <span class="float-right">  ملف الماء</span>
                <input type="file" class="form-control"  @change="WaterFile" style="display:none" ref="water">

               <div class=" text-danger" v-if="FileNotWaterAllow    !=null">{{FileNotWaterAllowd}}</div>



            </label></div>
<span v-if="progress7" class="">{{progress7}}</span>
<div class="progress" v-if="progress7" style="hieght:10px !important">

  <div class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress7+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<span class="fa fa-close" v-if="resultWaterSize" @click="RemoveFile('Water')"></span>

<span v-if="resultWaterSize!=null" ><span class="fa fa-file" style="color:#ebeef2"  ></span>  {{resultWaterName}}</span>
<span v-if="resultWaterSize!=null"  class="float-right">{{resultWaterSize}}</span>


</div> -->

<!--
  <div class="form-group mt-3">
        <div class="uploader-container"
          @dragenter.prevent="OnDragEnter"
         @dragleave.prevent="OnDragLeave"
         @dragover.prevent

         :class="{dragging:isDragging}"
         >
            <span class="fa fa-image" aria-hidden="true"></span>
            <p> Drag Or Drop </p>
            <div class="file-input">
                <label for="file">Choose file</label></div>
                <input type="file" name="file[]"   @change.prevent="onImageChanged" id="file" multiple>
            </div>
        </div> -->







         <button @click.prevent="submit('post')" class="btn theme-btn  mt-3 font-weight-bold"
         :disabled="threeD==null || Structure==null ||Architect==null
        || Specifications==null|| identity==null || map==null || company_name==null || notes==null || emirates_selected==null">نشر الان</button>


         <button @click.prevent="submit('draft')" class="btn theme-btn primary mt-3 font-weight-bold"
         :disabled="threeD==null || Structure==null ||Architect==null
           || Specifications==null|| identity==null || map==null || company_name==null || notes==null || emirates_selected==null">نشر لاحقا </button>





 </div>
</form>

                            </div>
                            </div>
            <!-- /.card -->
<FileStyle></FileStyle>
        </div>
         <div class=" col-md-4 col-sm-12">
<conditions></conditions>
  </div>
    </div>
</div>
</template>



<script>


import conditions from './conditions.vue'
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import FileStyle from './style.vue';
import AllUae from '../auth/AllUae.vue';

export default {
  components: { conditions ,ValidationErrors, FileStyle, AllUae},
  mixins:[validationErrors],

    data () {
            return {

             title:'',
              notes:'',
              company_name:'',
              terms: false,
              afterSend:false,
              emirates:null,
              photo:'',
              loading:false,
              additional:null,
              ret:null,
              status:null,
              errors:null,
             successPost: false,
             alert:'d-none',
             isDragging:false,
             counter:0,
             files:[],
             images:[],
             files2:[],
             images2:[],
             FileNotAllowd:'',
             FileNotAllowd2:'',
               FileNotMapAllowd:null,
               FileNotservicesAllowd:null,
               FileNotStructureAllowd:null,
               FileNotSpecificationsAllowd:null,
               FileNotmapAllowd:null,
                  FileNotWaterAllowd:null,
               FileNotidentityAllowd:null,
               FileNotdrainageAllowd:null,
               FileNotAnotherAllowd:null,
                FileNotAnotherAllowd:null,
               FileNotthreeDAllowd:null,


          Architect:null,
          Structure:null,
          threeD:null,
          Specifications:null,
          map:null,
          Water:null,
          identity:null,
          services:null,
        //   drainage:null,
          Another :null,
            progressbar:[],
            progressbar2:[],
           progress2:0,
           progress3:0,
           progress4:0,
           progress5:0,
           progress6:0,
           progress7:0,
           progress8:0,
           progress9:0,
           progress10:0,

           progress11:0,

           resultSize:null,
           resultName:null,

             resultservicesName:null,
           resultservicesSize:null,

           resultStructureName:null,
           resultStructureSize:null,

           resultthreeDSize:null,
           resultthreeDName:null,


           resultSpecificationsName:null,
           resultSpecificationsSize:null,

           resultmapName:null,
           resultmapSize:null,


            resultWaterName:null,
           resultWaterSize:null,

           resultidentityName:null,
           resultidentitySize:null,

           resultAnotherName:null,
           resultAnothersize:null,

              resultdrainageName:null,
           resultdrainageSize:null,

            resultadditionalName:null,

           resultadditionalSize:null,

           openService : 0,


             message :'YouR  Tender Is successfuly Upload',
             type_post:null,
  open_select:null,
    emirates_selected:null,
    open_type_select:null,


            }
    },


    methods:{
     open(event){
        if(event=='emirates'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"

    }

    },
     emiratesFunction(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
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

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress4 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotSpecificationsAllowd=null
                    this.Specifications=res.data
                });




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

                 let data = new FormData();
          data.append("threeD",this.threeD,this.threeD.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress11 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotthreeDAllowd=null
                    this.threeD=res.data
                });



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

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress6 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotidentityAllowd=null
                    this.identity=res.data
                });



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

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress5 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotmapAllowd=null
                    this.map=res.data
                });



       },
       DrainageFile(event){
    this.drainage=event.target.files[0];


const result3 = getFileExtension(this.drainage.name);

             if(!this.drainage.type.match('application/pdf') && result3 !='dwg'){
                   this.FileNotdrainageAllowd =`should Pdf Or Dwg (autocad file) `;
                    return ;
                }

                if(this.drainage.size < 1048576){
let size = Math.floor(this.drainage.size/1024);
this.resultdrainageName = this.drainage.name   ;
this.resultdrainageSize = size+' KB' ;


             }
if(this.drainage.size > 1048576){
let size = Math.floor(this.drainage.size/1024);
this.resultdrainageName = this.drainage.name   ;
this.resultdrainageSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


        //    this.url2 = URL.createObjectURL(this.drainage);

                 let data = new FormData();
          data.append("drainage",this.drainage,this.drainage.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress9 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotdrainageAllowd=null

                });



       },
        AnotherFile(event){
    this.Another=event.target.files[0];


const result3 = getFileExtension(this.Another.name);

             if(!this.Another.type.match('application/pdf|image.*') && result3 !='dwg'){
                   this.FileNotAnotherAllowd =`should Pdf Or Dwg (autocad file) `;
                    return ;
                }

                if(this.Another.size < 1048576){
let size = Math.floor(this.Another.size/1024);
this.resultAnotherName = this.Another.name   ;
this.resultAnotherSize = size+' KB' ;


             }
if(this.Another.size > 1048576){
let size = Math.floor(this.Another.size/1024);
this.resultAnotherName = this.Another.name   ;
this.resultAnotherSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


        //    this.url2 = URL.createObjectURL(this.Another);

                 let data = new FormData();
          data.append("Another",this.Another,this.Another.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress10 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotAnotherAllowd=null
                });



       },
        WaterFile(event){
    this.Water=event.target.files[0];


const result3 = getFileExtension(this.Water.name);

             if(!this.Water.type.match('application/pdf') && result3 !='dwg'){
                   this.FileNotWaterAllowd =`should Pdf Or Dwg (autocad file) `;
                    return ;
                }

                if(this.Water.size < 1048576){
let size = Math.floor(this.Water.size/1024);
this.resultWaterName = this.Water.name   ;
this.resultWaterSize = size+' KB' ;


             }
if(this.Water.size > 1048576){
let size = Math.floor(this.Water.size/1024);
this.resultWaterName = this.Water.name   ;
this.resultWaterSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


        //    this.url2 = URL.createObjectURL(this.Water);

                 let data = new FormData();
          data.append("Water",this.Water,this.Water.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress7 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotWaterAllowd=null
                });



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

                 let data = new FormData();
          data.append("services",this.services,this.services.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress8 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotservicesAllowd=null
                });




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

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress3 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                  this.Structure=res.data

                });




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

                 let data = new FormData();
          data.append("Architect",this.Architect,this.Architect.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotMapAllowd=null
                });




       },
              RemoveFile(event){

 if(event =='drainage'){
this.drainage =null
this.progress9=null
this.resultdrainageName=null
this.resultdrainageSize=null
       }
        if(event =='threeD'){
this.threeD =null
this.progress11=null

this.resultthreeDame=null
this.resultthreeDSize=null
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
if(event =='Structure'){
this.Structure =null
this.progress3=null
this.resultStructureName=null
this.resultStructureSize=null
       }
if(event =='Architect'){
this.Architect =null
this.progress2=null
this.resultName=null
this.resultSize=null
       }




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



                if(!file.type.match('image.*|application.*') && result1 !="dwg"){
                   this.FileNotAllowd =`Not Allowd ${file.type} `;
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)

            let data = new FormData();
          data.append("another",file,file.name);
                reader.readAsDataURL(file);
              console.log(file);
                 this.FileNotAllowd ='';

                let i = this.files.length - 1
                if(i ==0){
                    i=0
                }

                console.log('this file lenght '+i)
                     const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressbar[i] =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }

                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotservicesAllowd=null
                });
            },
            removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);




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
          data.append("another",file,file.name);
                reader.readAsDataURL(file);
              console.log(file);
                 this.FileNotAllowd2 ='';

                     const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressbar2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('InteriorFilES',data,config).then(res=>{
                    this.FileNotservicesAllowd=null
                });
            },
            removeImage2(i){
  let files = this.files2;
  files.splice(i,1,'');
    console.log(files);




            },



         submit(event)
        {

this.terms = false;
this.afterSend=true;
 this.loading=true;
        this.ret='spinner-grow text-light';

if(event =='post'){
    this.type_post =0
}
if(event =='draft'){
    this.type_post =4

}
console.log(this.type_post);
    let data = new FormData();


        data.append('imageAds', this.photo);
        this.files.forEach(file =>{
            data.append('images[]',file,file.name);


        })
      this.files2.forEach(file2 =>{
            data.append('images2[]',file2,file2.name);


        })
    this.emirates = this.emirates_selected

        data.append('type_post',this.type_post)
        data.append('title', this.title);
        data.append('emirates', this.emirates);
        data.append('notes', this.notes);
        data.append('company_name', this.company_name);

        data.append('Architect', this.Architect);
        data.append('Structure', this.Structure);
        data.append('threeD', this.threeD);
        data.append('Specifications', this.Specifications);
        data.append('map', this.map);
        // data.append('services', this.services, this.services.name);

        data.append('identity', this.identity);





            axios.post(`TInterior`,data).then(response=>{


                console.log('client side success');
           this.status=response.data
           let id = this.status;

          this.$router.push({name: 'InteriorDetails', params: {id}})
            // localStorage.setItem('messageTender',JSON.stringify(this.message));

        this.terms =true;

       })
       .catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       })
       .then(()=>(this.loading=false,this.ret=false,this.alert="alert alert-success alert-dismissible"));

    },
    errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    },
    },
computed: {
    hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
   /* isDisabled: function(){

    	return !this.terms;
    },*/

},


}
</script>

<style lang="scss">
  .dropbox {
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -10px;
    background: lightcyan;
    color: dimgray;
    padding: 10px 10px;
    min-height: 200px; /* minimum height */
    position: relative;
    cursor: pointer;
  }

  .input-file {
    opacity: 0; /* invisible but it's there! */
    width: 100%;
    height: 200px;
    position: absolute;
    cursor: pointer;
  }

  .dropbox:hover {
    background: lightblue; /* when mouse over to the drop zone, change color */
  }

  .dropbox p {
    font-size: 1.2em;
    text-align: center;
    padding: 50px 0;
  }
</style>

<style lang="scss" scoped>
.btn-bus {background-image: linear-gradient(to right, #1d67cb 0%, #1d67cb  51%, #1d67cb  100%)}
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
 .btn-light{
   background: #3454d1 !important; color:#fff;
}
.progress{
    height:10px !important;
}
.bg-success{
    height:10px !important;
    background-color:#3454d1 !important;


}

</style>



