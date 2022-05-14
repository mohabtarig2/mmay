


<template>
<div class="container">



 <!-- <div class="card mt-2">
            <div class="h5 text-right">وصف</div>
            <div
              v-for="(tender, index) in tenders"
              :key="index"
              v-bind="tender"
            >
              <aboutTender class="text-right" :note="tender.note"></aboutTender>
            </div>
          </div> -->


<div class="mt-5 mx-auto contact-form" style="width:50rem" v-if="completeData==''" dir="rtl" >


    <h2 class="text-center mb-4 " >اكمل حسابك  </h2>
          <!-- <ul class="progressbar" dir="">
              <li class="active">تم تسجيل حساب</li>
              <li>اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul>  -->
    <form class="c-form-inner" >
<!-- <div class="form-group">
  <span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>

<span v-if="resultthreeDSize!=null"  class="float-right"><img :src="url1" style="width:50px;height:50px"></span>
<div v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</div>
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



</div> -->
          <div class="bg-white-card" :class="statusVisible">
<div class="loader"></div>
</div>






  <div class="row">
             <div class="col-6  mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم المدير <sup class="text-muted"> (باللغة العربية)</sup> </div>
            <input type="text"
             name="manger_ar"

              class="form-control"
              pattern="[a-z]"
              v-model="complete.manger_ar"
             :class="[{'is-invalid': errorFor('manger_ar')},{'is-valid':limitMangerAr>=5}]"

             @input="ontype('mgrAr')"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_ar')" :key="'manger_ar' + index" >{{ error }}</div>

        </div>

        <div class="col-6  mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم المدير <sup class="text-muted"> (باللغة الانجليزية)</sup> </div>
            <input type="text"
             name="manger_en"

              class="form-control"
              v-model="complete.manger_en"
             :class="[{'is-invalid': errorFor('manger_en')},{'is-valid':limitMangerEn>=5}]"
             @input="ontype('mgrEn')"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_en')" :key="'manger_en' + index" >{{ error }}</div>
        </div>

  </div>
  <div class="row">
        <div class="col-6  mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم الشركة <sup class="text-muted"> (باللغة العربية)</sup> </div>
            <input type="text"
             name="Company_ar"
              class="form-control"
              v-model="complete.Company_ar"
             :class="[{'is-invalid': errorFor('Company_ar')}]"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('Company_ar')" 
:key="'Company_ar' + index" >{{ error }}</div>
        </div>
        <div class="col-6  mt-3">
            <div class="h5" :class="$t('text_align')"> اسم الشركة باللغة الانجليزية</div>
            <input type="Company_en"
             name="Company_en"

              class="form-control"
              v-model="complete.Company_en"
             :class="[{'is-invalid': errorFor('Company_en')}]"
          />
          <v-errors :errors="errorFor('Company_en')"></v-errors>
        </div>

  </div>

  <div class=" mt-3">
            <div class="h5" :class="$t('text_align')">تاريخ تأسيس الشركة
            </div>
            <input type="date"
             name="date_create"

              class="form-control"
              v-model="complete.date_create"
             :class="[{'is-invalid': errorFor('date_create')}]"
          />
          <v-errors :errors="errorFor('date_create')"></v-errors>
          <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('date')"
          :key="'date' + index"
        >{{ error }}</div>
        </div>
        <div class="form-group mt-3">
            <div class="h5" :class="$t('text_align')">رقم الجوال</div>
            <input type="text"
            name="phone"
              class="form-control"
              v-model="phone"
              dir="ltr"


             :class="[{'is-invalid': this.errorFor('phone')},{'is-invalid':isAvailble==1}]"

          />
           <small >{{ error_phone}} </small>
           <div v-if="isAvailble==1" class="text-danger text-right">هذا الرقم مسجل باسم شركة اخرى</div>

          <v-errors :errors="errorFor('phone')"></v-errors>


        </div>
         <div class="form-group mt-3">
                        <div class="h5" :class="$t('text_align')">الامارة </div>

        <select class="form-control " v-model="complete.emirates " :class="$t('text_align')">
  <option value="1">dubai</option>
  <option value="2">Fujira</option>
  <option value="3">Ras Alkhima</option>
  <option value="4">um alqwain</option>
  <option value="5">sharjah</option>
  <option value="6">ajman</option>
  <option value="7">Abudabhi</option>

</select>
         </div>
             <div   class="h5 text-right mt-3"><span class="font-weight-bold">حول الشركة </span></div>
    <small class="text-muted">
    <span v-if="complete.about">{{complete.about.length }}</span>
    <span v-else>0</span>/100
    </small>
    <textarea class="form-control "  id="exampleFormControlTextarea1" rows="6" style="font-size:18px" v-model="complete.about"
    :class="[{'is-valid':limitComplete>=100}]" @input="ontype('About')" ></textarea>



        <button type="submit" class="   mt-3 theme-btn" :disabled="complete.about.length == '' || complete.manger_ar==''
        || complete.manger_en=='' ||  complete.Company_ar == '' || complete.Company_en == ''
        || phone == '' ||complete.emirates == '' || complete.date_create=='' || isAvailble==1 || limitComplete<=100
        " @click.prevent="continues">
          <b>التالي </b>   <img  src="assets/img/right.svg" class="pl-2 pr-2" style="width: 2rem;"></button>

 </form>
</div>


 <file-upload v-if="completeData!=''"></file-upload>

</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import validationErrors from "../shared/mixins/validationErrors";
import FileUpload from './FileUpload.vue';
import navbar from './navbar.vue';


export default {
  components: { navbar, FileUpload },
    mixins:[validationErrors],

data() {
    return {
        complete:{
      about: '',
      phone: '',
      Company_ar:'',
      Company_en: '',
      manger_ar: '',
      manger_en: '',
      date_create: '',
      emirates: '',
      
        },
        phone: '',
    loading : false,
    status:null,
    errors:null,
    error_phone : "",
    res:null,
    status_text:null,
    limitComplete:null,
    limitMangerAr:null,
    limitMangerEn:null,
    completeData:"",
    statusVisible:'d-flex ',
    isAvailble:null,

            // 3d file vraible
         FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,
        url1:null,





    };

  },
  watch:{
  phone() {
        var x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  
             let data = new FormData();
data.append('mobile', this.phone);

           axios.post('thisPhoneIsAvailble',data).then(res=>{
                this.isAvailble=res.data;
           })
  
    },
  },
   methods: {
   


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

                       RemoveFile(event){



        if(event =='threeD'){
this.threeD =null
this.progress11=null
this.url1=null
 this.FileNotthreeDAllowd=null,
this.resultthreeDame=null
this.resultthreeDSize=null
       }
                       },

       ontype(event){

         if(this.complete.about.length >= 99){
             this.limitComplete=this.complete.about.length;
             console.log( this.limitComplete)
         }
         if(this.complete.about.length < 99){
             this.limitComplete=0;
             console.log( this.limitComplete)
         }

               if(this.complete.manger_ar.length >= 5){
             this.limitMangerAr=this.complete.manger_ar.length;
             console.log( this.limitMangerAr)
         }
         if(this.complete.manger_ar.length < 5){
             this.limitMangerAr=0;
             console.log( this.limitMangerAr)
         }


       if(this.complete.manger_en.length >= 5){
             this.limitMangerEn=this.complete.manger_en.length;
             console.log( this.limitMangerEn)
         }
         if(this.complete.manger_en.length < 5){
             this.limitMangerEn=0;
             console.log( this.limitMangerEn)
         }





    },
    Getcomplete(){
        axios.get('Getcomplete').then(res=>{
            this.completeData = res.data;
        })
    },

 continues() {

// this.statusVisible="d-block"
this.complete.phone = this.phone;

       const response =axios.post("complete", this.complete).then(res=>{


  this.completeData.unshift(res.data);


 }).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
                this.statusVisible='d-none'
            }
            this.status=error.response.status

       })
       .then(()=>(this.statusVisible='d-none'));

    },
    errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    }
},
  computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),
     hasErrors() {
        return 422 === this.status && this.errors !== null;
    },

  },
  mounted(){


  },
  created() {
      setInterval(function(){
        this.statusVisible="d-none d"
    }.bind(this), 3000);
      this.Getcomplete();
      $('#exampleModalCenter').modal('show');
                $('.modal-backdrop').css('display','block');

  },




};
</script>


<style scoped>
label {
    font-size:0.7rem;
    text-transform:uppercase;
    color: gray;
    font-weight: bolder;
}
.is-invalid{
border-color: #b22222;
background-image: none;
}

 .bg-white-card{
    position: fixed; /* Sit on top of the page content */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%;/* Full height (cover the whole page) */

        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255); /* Black background with opacity */
        z-index: 2;
     flex-wrap: wrap;
     justify-content: center;
    align-items: center;
    transition: all .5s ease-in-out;
}
.loader {
  margin: auto;
  border: 20px solid #EAF0F6;
  border-radius: 50%;
  border-top: 20px solid #1E5DA8;
  width: 200px;
  height: 200px;
  animation: spinner 4s linear infinite;
}

@keyframes spinner {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

