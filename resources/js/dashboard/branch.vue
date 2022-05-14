<template>
  <div class="container mt-3 text-right" dir="rtl">
    <h1 class="text-center">فروع أخرى</h1>
    <div class="c-form-inner">
      <h4>في اي امارة تقع فروعكم الأخرى ؟</h4>
      <label class="checkbox d-block" :dir="$t('directions')" v-show="user.company.emirates!=7">
        <input type="checkbox" v-model="Abudabhi" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> ابوظبي</span>
      </label>

       <div class="" v-if="Abudabhi==true" v-show="user.company.emirates!=7">
        <h5 class="text-right"> رخصة ابوظبي </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': ADFile != null }"
              @click="$refs.adfile"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotADFileAllowd != null"
              >{{ FileNotADFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onAdChange"
              style="display: none"
              ref="adfile"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressAD" class="">{{ progressAD }}</span>
          <div
            class="progress"
            v-if="progressAD"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressAD != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressAD + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressAD == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressAD + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultADSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resulADtName }}</span
          >
          <span v-if="resultADSize != null" class="float-right">
            {{ resultADSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=1">
        <input type="checkbox" v-model="dubai" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> دبي</span>
      </label>
      <div class="" v-if="dubai==true" v-show="user.company.emirates!=1">
        <h5 class="text-right"> رخصة دبي </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': DubaiFile != null }"
              @click="$refs.fileinput2"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotDubaiFileAllowd != null"
              >{{ FileNotDubaiFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="ondubaiChange"
              style="display: none"
              ref="fileinput2"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progress2" class="">{{ progress2 }}</span>
          <div
            class="progress"
            v-if="progress2"
            style="hieght: 10px !important"
          >
            <div
              v-if="progress2 != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progress2 + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progress2 == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progress2 + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultName }}</span
          >
          <span v-if="resultSize != null" class="float-right">
            {{ resultSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=5">
        <input type="checkbox" v-model="sharjah" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> الشارقة</span>
      </label>
       <div class="" v-if="sharjah==true" v-show="user.company.emirates!=5">
        <h5 class="text-right"> رخصة الشارقة </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': SHFile != null }"
              @click="$refs.fileinputSH"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotSHFileAllowd != null"
              >{{ FileNotSHFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onSHChange"
              style="display: none"
              ref="fileinputSH"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressSH" class="">{{ progressSH }}</span>
          <div
            class="progress"
            v-if="progressSH"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressSH != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressSH + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressSH == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressSH + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultSHSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultSHName }}</span
          >
          <span v-if="resultSHSize != null" class="float-right">
            {{ resultSHSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=6">
        <input type="checkbox" v-model="ajman" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> عجمان</span>
      </label>

       <div class="" v-if="ajman==true" v-show="user.company.emirates!=6">
        <h5 class="text-right"> رخصة عجمان </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': AJFile != null }"
              @click="$refs.fileinputAJ"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotAJFileAllowd != null"
              >{{ FileNotAJFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onAJChange"
              style="display: none"
              ref="fileinputAJ"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressAJ" class="">{{ progressAJ }}</span>
          <div
            class="progress"
            v-if="progressAJ"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressAJ != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressAJ + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressAJ == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressAJ + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultAJSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultAJName }}</span
          >
          <span v-if="resultAJSize != null" class="float-right">
            {{ resultAJSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=4">
        <input type="checkbox" v-model="um_alqwin" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> {{ $t("um_alqwin") }}</span>
      </label>


 <div class="" v-if="um_alqwin==true" v-show="user.company.emirates!=4">
        <h5 class="text-right"> رخصة أم القيوين </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': UMFile != null }"
              @click="$refs.fileinputUM"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotUMFileAllowd != null"
              >{{ FileNotUMFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onUMChange"
              style="display: none"
              ref="fileinputUM"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressUM" class="">{{ progressUM }}</span>
          <div
            class="progress"
            v-if="progressUM"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressUM != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressUM + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressUM == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressUM + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultUMSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultUMName }}</span
          >
          <span v-if="resultUMSize != null" class="float-right">
            {{ resultUMSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=3">
        <input type="checkbox" v-model="ras_alkhima" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> {{ $t("ras_alkhima") }}</span>
      </label>

      
 <div class="" v-if="ras_alkhima==true" v-show="user.company.emirates!=3">
        <h5 class="text-right"> رخصة راس الخيمة  </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': RASFile != null }"
              @click="$refs.fileinputRAS"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotRASFileAllowd != null"
              >{{ FileNotRASFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onRASChange"
              style="display: none"
              ref="fileinputRAS"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressRAS" class="">{{ progressRAS }}</span>
          <div
            class="progress"
            v-if="progressRAS"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressRAS != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressRAS + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressRAS == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressRAS + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultRASSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultRASName }}</span
          >
          <span v-if="resultRASSize != null" class="float-right">
            {{ resultRASSize }}</span
          >
        </div>
      </div>

      <label class="checkbox d-block" :dir="$t('directions')" v-if="user.company.emirates!=2">
        <input type="checkbox" v-model="fujairah" />
        <span class="check"></span>
        <span class="mr-4 ml-4"> {{ $t("fujairah") }}</span>
      </label>

       <div class="" v-if="fujairah==true" v-show="user.company.emirates!=2">
        <h5 class="text-right"> رخصة راس الفجيرة  </h5>
        <div class="">
          <label class="d-block">
            <span
              class="btn btn-secondary"
              :class="{ 'btn btn-success': FUJFile != null }"
              @click="$refs.fileinputFUJ"
              >ملف <i class="fa fa-paperclip"></i
            ></span>

            <small
              class="font-weight-bold text-danger"
              v-if="FileNotFUJFileAllowd != null"
              >{{ FileNotFUJFileAllowd }}</small
            >
            <input
              type="file"
              class="form-control"
              @change="onFUJChange"
              style="display: none"
              ref="fileinputFUJ"
            />
          </label>
        </div>
        <div class="container">
          <span v-if="progressFUJ" class="">{{ progressFUJ }}</span>
          <div
            class="progress"
            v-if="progressFUJ"
            style="hieght: 10px !important"
          >
            <div
              v-if="progressFUJ != '100%'"
              class="progress-bar progress-bar-striped bg-primary"
              role="progressbar"
              :style="'width:' + progressFUJ + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
            <div
              v-if="progressFUJ == '100%'"
              class="progress-bar progress-bar-striped bg-success"
              role="progressbar"
              :style="'width:' + progressFUJ + ';hieght:10px !important'"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>


          <span v-if="resultFUJSize != null"
            ><i class="fa fa-file" style="color: #ebeef2"></i>
            {{ resultFUJName }}</span
          >
          <span v-if="resultFUJSize != null" class="float-right">
            {{ resultFUJSize }}</span
          >
        </div>
      </div>
      <div>
        <button @click="SetBranch" class="btn btn-download" :disabled="lodaing">
          حفظ
        </button>
        <button @click="skip" class="btn btn-success" :disabled="lodaing">
          تخطى
        </button>
      </div>

      <!-- <div v-show="dubai==true">
                            <div class="upload-file">
                             <label class="d-block  ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">     رخصة دبي </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="onChange" style="display:none" ref="fileinput2" >





            </label>
</div>

</div> -->
    </div>
  </div>
</template>


<script>
import AllUae from "../auth/AllUae.vue";
export default {
  components: { AllUae },
  name: "AddRemove",
  data() {
    return {
      //  emirates_selected:'',
     
      dubai: false,
      Abudabhi: false,
      sharjah: false,
      ajman: false,
      um_alqwin: false,
      ras_alkhima: false,
      fujairah: false,
      file: null,
      success: "",
      FileNotMapAllowd: null,
      resultSize: null,
      resultName: null,
      // progress2: null,
      AchiveThreeYears: null,
      AchiveSinceCreate: null,
      lodaing: false,
      
     

        DubaiFile:null,
        progress2 :null,
        FileNotDubaiFileAllowd:null,
        resultsoilSize :null,
        resultsoilName :null,

        ADFile:null,
        progressAD :null,
        FileNotADFileAllowd:null,
        resultADSize :null,
        resultADName :null,


        SHFile:null,
        progressSH :null,
        FileNotSHFileAllowd:null,
        resultSHSize :null,
        resultSHName :null,


        FUJFile:null,
        progressFUJ :null,
        FileNotFUJFileAllowd:null,
        resultFUJSize :null,
        resultFUJName :null,

         UMFile:null,
        progressUM :null,
        FileNotUMFileAllowd:null,
        resultUMSize :null,
        resultUMName :null,

             RASFile:null,
        progressRAS :null,
        FileNotRASFileAllowd:null,
        resultRASSize :null,
        resultRASName :null,


           AJFile:null,
        progressAJ :null,
        FileNotaAJFileAllowd:null,
        resultAJSize :null,
        resultAJName :null,

    };
  },
   computed:{
 
        user(){
             return this.$store.getters.user
        },
   },
  methods: {

onAdChange(event){
        
                       
                                 this.ADFile=event.target.files[0];


const result1 = getFileExtension(this.ADFile.name);

             if(!this.ADFile.type.match('application/pdf') ){
                   this.FileNotADFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.ADFile.size < 1048576){
let size = Math.floor(this.ADFile.size/1024);
this.resultADName = this.ADFile.name   ;
this.resultADSize = size+' KB' ;


             }
if(this.ADFile.size > 1048576){
let size = Math.floor(this.ADFile.size/1024);
this.resultADName = this.ADFile.name   ;
this.resultADSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.ADFile);

                 let data = new FormData();
          data.append("ADFile",this.ADFile,this.ADFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressAD =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotADFileAllowd=null
                    this.ADFile=res.data;
                  
                });
                               
},

onAJChange(event){
        
                       
                                 this.AJFile=event.target.files[0];


const result1 = getFileExtension(this.AJFile.name);

             if(!this.AJFile.type.match('application/pdf') ){
                   this.FileNotAJFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.AJFile.size < 1048576){
let size = Math.floor(this.AJFile.size/1024);
this.resultAJName = this.AJFile.name   ;
this.resultAJSize = size+' KB' ;


             }
if(this.AJFile.size > 1048576){
let size = Math.floor(this.AJFile.size/1024);
this.resultAJName = this.AJFile.name   ;
this.resultAJSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.AJFile);

                 let data = new FormData();
          data.append("AJFile",this.AJFile,this.AJFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressAJ =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotAJFileAllowd=null
                    this.AJFile=res.data;
                  
                });
                               
},
onSHChange(event){
        
                       
                                 this.SHFile=event.target.files[0];


const result1 = getFileExtension(this.SHFile.name);

             if(!this.SHFile.type.match('application/pdf') ){
                   this.FileNotSHFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.SHFile.size < 1048576){
let size = Math.floor(this.SHFile.size/1024);
this.resultSHName = this.SHFile.name   ;
this.resultSHSize = size+' KB' ;


             }
if(this.SHFile.size > 1048576){
let size = Math.floor(this.SHFile.size/1024);
this.resultSHName = this.SHFile.name   ;
this.resultSHSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.SHFile);

                 let data = new FormData();
          data.append("SHFile",this.SHFile,this.SHFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressSH =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotSHFileAllowd=null
                    this.SHFile=res.data;
                  
                });
                               
},

onUMChange(event){
        
                       
                                 this.UMFile=event.target.files[0];


const result1 = getFileExtension(this.UMFile.name);

             if(!this.UMFile.type.match('application/pdf') ){
                   this.FileNotUMFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.UMFile.size < 1048576){
let size = Math.floor(this.UMFile.size/1024);
this.resultUMName = this.UMFile.name   ;
this.resultUMSize = size+' KB' ;


             }
if(this.UMFile.size > 1048576){
let size = Math.floor(this.UMFile.size/1024);
this.resultUMName = this.UMFile.name   ;
this.resultUMSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.UMFile);

                 let data = new FormData();
          data.append("UMFile",this.UMFile,this.UMFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressUM =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotUMFileAllowd=null
                    this.UMFile=res.data;
                  
                });
                               
},
onFUJChange(event){
        
                       
                                 this.FUJFile=event.target.files[0];


const result1 = getFileExtension(this.FUJFile.name);

             if(!this.FUJFile.type.match('application/pdf') ){
                   this.FileNotFUJFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.FUJFile.size < 1048576){
let size = Math.floor(this.FUJFile.size/1024);
this.resultFUJName = this.FUJFile.name   ;
this.resultFUJSize = size+' KB' ;


             }
if(this.FUJFile.size > 1048576){
let size = Math.floor(this.FUJFile.size/1024);
this.resultFUJName = this.FUJFile.name   ;
this.resultFUJSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.FUJFile);

                 let data = new FormData();
          data.append("FUJFile",this.FUJFile,this.FUJFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressFUJ =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotFUJFileAllowd=null
                    this.FUJFile=res.data;
                  
                });
                               
},
onRASChange(event){
        
                       
                                 this.RASFile=event.target.files[0];


const result1 = getFileExtension(this.RASFile.name);

             if(!this.RASFile.type.match('application/pdf') ){
                   this.FileNotRASFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.RASFile.size < 1048576){
let size = Math.floor(this.RASFile.size/1024);
this.resultRASName = this.RASFile.name   ;
this.resultRASSize = size+' KB' ;


             }
if(this.RASFile.size > 1048576){
let size = Math.floor(this.RASFile.size/1024);
this.resultRASName = this.RASFile.name   ;
this.resultRASSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.RASFile);

                 let data = new FormData();
          data.append("RASFile",this.RASFile,this.RASFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressRAS =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotRASFileAllowd=null
                    this.RASFile=res.data;
                  
                });
                               
},
ondubaiChange(event){
               
                                this.DubaiFile=event.target.files[0];


const result1 = getFileExtension(this.DubaiFile.name);

             if(!this.DubaiFile.type.match('application/pdf') ){
                   this.FileNotDubaiFileAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.DubaiFile.size < 1048576){
let size = Math.floor(this.DubaiFile.size/1024);
this.resultName = this.DubaiFile.name   ;
this.resultSize = size+' KB' ;


             }
if(this.DubaiFile.size > 1048576){
let size = Math.floor(this.DubaiFile.size/1024);
this.resultName = this.DubaiFile.name   ;
this.resultSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.DubaiFile);

                 let data = new FormData();
          data.append("DubaiFile",this.DubaiFile,this.DubaiFile.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('BranchiFile',data,config).then(res=>{
                    this.FileNotDubaiFileAllowd=null
                    this.DubaiFile=res.data;
                  
                });
                     
           




       },
    SetBranch() {
      this.lodaing = true;
      let data = new FormData();
      if(this.dubai==true){
      data.append("dubai", this.dubai);
      data.append("DubaiFile",this.DubaiFile)
      }

      if(this.Abudabhi==true){
      data.append("Abudabhi", this.Abudabhi);
      data.append("ADFile", this.ADFile);
      }

      if(this.sharjah==true){
      data.append("sharjah", this.sharjah);
        data.append("SHFile", this.SHFile);
      }

      
      if(this.ajman==true){
      data.append("ajam", this.ajman);
        data.append("AJFile", this.AJFile);
      }

          if(this.um_alqwin==true){
      data.append("um_alqwin", this.um_alqwin);
        data.append("UMFile", this.UMFile);
      }

       


      if(this.ras_alkhima==true){
      data.append("ras_alkhima", this.ras_alkhima);
        data.append("RASFile", this.RASFile);
      }

           if(this.fujairah==true){
      data.append("fujairah", this.fujairah);
        data.append("FUJFile", this.FUJFile);
      }



     


      console.log("submit emirates");
      axios.post("SetBranch", data).then((res) => {
        location.reload();
      });
    },
    skip() {
      axios.post("skip").then((res) => {
        location.reload();
      });
    },
    onChange(event) {
      this.file = event.target.files[0];

      const result1 = getFileExtension(this.file.name);

      if (!this.file.type.match("application/pdf")) {
        this.FileNotMapAllowd = `should be Pdf  `;
        return;
      }

      if (this.file.size < 1048576) {
        let size = Math.floor(this.file.size / 1024);
        this.resultName = this.file.name;
        this.resultSize = size + " KB";
      }
      if (this.file.size > 1048576) {
        let size = Math.floor(this.file.size / 1024);
        this.resultName = this.file.name;
        this.resultSize = size + " MB";
      }
      function getFileExtension(filename) {
        const extension = filename.split(".").pop();
        return extension;
      }

      // passing the filename

      this.url2 = URL.createObjectURL(this.file);

      let data = new FormData();
      data.append("file", this.file, this.file.name);

      const config = {
        onUploadProgress: (uploadEvent) => {
          this.progress2 =
            Math.round((uploadEvent.loaded / uploadEvent.total) * 100) + "%";
          // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
        },
      };

      axios.post("sucess", data, config).then((res) => {
        this.FileNotMapAllowd = null;
      });
    },
    RemoveFile(event) {
      if (event == "file") {
        this.file = null;
        this.progress2 = null;
        this.resultName = null;
        this.resultSize = null;
      }
    },
    formSubmit(e) {
      e.preventDefault();
      let existingObj = this;

      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      let data = new FormData();
      data.append("file", this.file);
      data.append("AchiveSinceCreate", this.AchiveSinceCreate);
      data.append("AchiveThreeYears", this.AchiveThreeYears);

      axios
        .post("/Achivementfile", data, config)
        .then(function (res) {
          existingObj.success = res.data.success;

          location.reload();

          this.$router.push({ name: "Dashboard" });
        })
        .catch(function (err) {
          existingObj.output = err;
        });
    },
  },
};
</script>

<style scoped>
.upload-file {
  padding: 20px;
  background: #fff;
  border: 2px dotted #eee;
  cursor: pointer;
}
.progress {
  height: 10px !important;
}
</style>
