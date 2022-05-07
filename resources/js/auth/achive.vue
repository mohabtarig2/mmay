


<template>

<div class="container contact-form">






                <div class="c-form-inner mt-5">
                      <h2 class="text-center mb-5 ">ارفق الانجازات  للشركة </h2>
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li class="active">رخصة الشركة </li>
              <li >الانجازات </li>
          </ul> -->

<div class="row mb-3">
    <div class="col-6">
        <h5 class="text-right">انجازات اخر 3 سنين </h5>
<input type="number" v-model="AchiveThreeYears" class="form-control">
    </div>
        <div class="col-6">
                    <h5 class="text-right">انجازات منذ التأسيس </h5>

<input type="number" v-model="AchiveSinceCreate" class="form-control">
    </div>

</div>
                    <div>

                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <h5 class="text-right">  ملف الانجازات  </h5>
                            <div class="upload-file">
                             <label class="d-block  ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">     الانجازات </span>
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

        <button type="submit" class="   mt-3 btn btn-download" :disabled="loading" ><img  src="assets/img/right.svg" class="pl-2 pr-2" style="width: 2rem;"><b>التالي </b> </button>

                        </form>
                    </div>
                </div>

</div>

</template>

<script>
    export default {
        data() {
            return {
                file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,
                AchiveThreeYears:null,
                AchiveSinceCreate:null,
            };
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
                data.append('AchiveSinceCreate', this.AchiveSinceCreate);
                data.append('AchiveThreeYears', this.AchiveThreeYears);



                axios.post('/Achivementfile', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;

        location.reload();

        this.$router.push({ name: "Dashboard" });
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
background: #fff;
    border: 2px dotted #eee;
cursor: pointer;
}
.progress {
    height: 10px !important;
}
</style>
