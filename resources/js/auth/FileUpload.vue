


<template>

<div class="container">





                <div class="c-form-inner mt-5 mb-5" v-if="datas==''">
                     <h2 class="text-center mb-5 ">ارفق شعار و  رخصة التجارية للشركة </h2>
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul> -->


                    <div>


                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" 
                 fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">   صورة بروفايل</span>
        
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

<span v-if="resultthreeDSize!=null"  class="float-right"><img :src="url1" style="width:50px;height:50px"></span>
<div v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</div>


</div>
<div class="upload-file">
                             <label class="d-block  ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">   رخصة  الشركة </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="onChange" style="display:none" ref="fileinput2" >





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
                            <!-- <button class="btn btn-primary btn-block">Upload</button> -->
                                    <button type="submit" class="   mt-3 btn btn-download" :disabled="progress2!='100%'"><img  src="assets/img/right.svg"
                                     class="pl-2 pr-2" style="width: 2rem;" ><b>التالي </b> </button>


                        </form>
                    </div>
                </div>

            <achive v-if="datas!=''"></achive>

</div>

</template>

<script>
import achive from './achive.vue';
    export default {
  components: { achive },
        data() {
            return {
                file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,
                datas:'',


                    FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,
        url1:null,


            };
        },
        created() {
            this.getlicence();
        },
        methods: {
                  onChange(event){
           this.file=event.target.files[0];


const result1 = getFileExtension(this.file.name);

             if(!this.file.type.match('application/pdf') ){
                   this.FileNotMapAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.file.size < 1048576){
let size = Math.floor(this.file.size/1024);
this.resultName = this.file.name   ;
this.resultSize = size+' KB' ;


             }
if(this.file.size > 1048576){
let size = Math.floor(this.file.size/1024);
this.resultName = this.file.name   ;
this.resultSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.file);

                 let data = new FormData();
          data.append("file",this.file,this.file.name);

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
       RemoveFile(event){
           if(event =='file'){
this.file =null
this.progress2=null
this.resultName=null
this.resultSize=null
       }
       
        if(event =='threeD'){
this.threeD =null
this.progress11=null
this.url1=null
 this.FileNotthreeDAllowd=null,
this.resultthreeDame=null
this.resultthreeDSize=null
       }

       },

       
                      threedFile(event){ //check

          
            this.threeD=event.target.files[0];


        const result3 = getFileExtension(this.threeD.name);
                 
                 
                    if(!this.threeD.type.match('image.*')){
                        this.FileNotthreeDAllowd =`jpg or png`;
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
                            this.url1 = URL.createObjectURL(this.threeD);

                    

                
                            



            },

                 



                       
            getlicence(){
                axios.get('getlicence').then(res=>{
                    this.datas = res.data;
                })
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);
                data.append('avatar', this.threeD,this.threeD.name);



                axios.post('/licencefile', data).then( res=> {
                        // existingObj.success = res.data.success;
                           this.datas.unshift(res.data);



                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }


</script>

<style scoped>
.upload-file{
padding: 20px;
    border: 2px dotted rgb(255, 255, 255);
cursor: pointer;
}
.progress {
    height: 10px !important;
}
</style>
