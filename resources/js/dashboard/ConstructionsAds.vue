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
<!-- <span v-for="branch, index in User.branch" :key="index">
{{branch.emirates}}
</span> -->
         <h1 class="text-center">أضف اعلانك </h1>
  <div class="row mt-4">

       <div class="offset-md-2">

      </div>
      <div class="col-md-8">
        <div class="contact-form">
          <div class="card-body">
            <form @submit.prevent="formSubmit" enctype="multipart/form-data" class="c-form-inner">

              <div class="text-right form-group " dir="rtl">

                <label for=" h6"><span class=" h6 font-weight-bold thm-color">
                    العنوان
                    </span>
                    </label>
                <input

                  v-model="tenders.title"
                  :class="[{'is-invalid': errorFor('title')}]"
                  placeholder="وصف مختصر للمشروع"
                />
                <div
                  class="invalid-feedback"
                  v-for="(error, index) in this.errorFor('title')"
                  :key="'title' + index"
                >{{ error }}</div>
              </div>




              <!-- ---------End Type floors-------------------------------------!-->







        <div class="row text-right">
            <div class="col-12">
<div class="single-property-details ">
                    <label dir="rtl">{{$t('Emirates')}}
                    <div class="nice-select " :class="open_select" tabindex="0" @click="open('emirates')">
                        <span class="current">
                            <all-uae :emirates="emirates_selected"></all-uae></span>
                            <ul class="list">
                            <li data-value="1" class="option " v-show="TypeEmirates7" @click="emirates(7)">{{$t('abu_dabhi')}}</li>
                            <li data-value="2" v-show="TypeEmirates1" class="option" @click="emirates(1)">{{$t('dubai')}} </li>
                                <li data-value="3" v-show="TypeEmirates5"  class="option"  @click="emirates(5)">{{$t('sharja')}}</li>
                                <li data-value="3" v-show="TypeEmirates6" class="option"  @click="emirates(6)">{{$t('ajman')}}</li>
                                <li data-value="3" v-show="TypeEmirates4" class="option"  @click="emirates(4)">{{$t('um_alqwin')}} </li>
                                <li data-value="3" v-show="TypeEmirates3" class="option"  @click="emirates(3)"> {{$t('ras_alkhima')}}</li>
                                <li data-value="3" v-show="TypeEmirates2" class="option"  @click="emirates(2)">{{$t('fujairah')}} </li>
                                        </ul>
                                                <ul class="list" v-if="IsUser!=6">
                            <li data-value="1" class="option "  @click="emirates(7)">{{$t('abu_dabhi')}}</li>
                            <li data-value="2"  class="option" @click="emirates(1)">{{$t('dubai')}} </li>
                                <li data-value="3"   class="option"  @click="emirates(5)">{{$t('sharja')}}</li>
                                <li data-value="3"  class="option"  @click="emirates(6)">{{$t('ajman')}}</li>
                                <li data-value="3"  class="option"  @click="emirates(4)">{{$t('um_alqwin')}} </li>
                                <li data-value="3"  class="option"  @click="emirates(3)"> {{$t('ras_alkhima')}}</li>
                                <li data-value="3"  class="option"  @click="emirates(2)">{{$t('fujairah')}} </li>
                              </ul>
                                </div>
                                </label>

                </div>
            </div>

                    <div class="col-12">
<div class="single-property-details">
                    <label>{{$t('Type Services')}}
                    <div class="nice-select " :class="open_services_select" tabindex="0" @click="open('services')">
                        <span class="current">
                              {{TypeServices==1? $t('Services') : $t('Gallary')}}
                        </span>
                            <ul class="list">
                            <li data-value="1" class="option " @click="ChooseServices(1)">{{$t('Services')}}</li>
                                <li data-value="2" class="option" @click="ChooseServices(2)">{{$t('Gallary')}} </li>
                             
                                        </ul>
                                </div>
                                </label>

                </div>
            </div>
        </div>







                <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1" class="thm-color">الوصف</label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="4"
                    v-model="tenders.Notes"
                    :class="[{'is-invalid': errorFor('Notes')}]"
                      placeholder=" أدخل وصفاً مفصلاً لمشروعك   "

                  ></textarea>
                    <small> {{tenders.Notes.length}} /100</small>
                  <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('Notes')"
                    :key="'Notes' + index"
                  >{{ error }}</div>
                </div>


                        <label>

                             <span class="ttm-color">
                                 أرفق أمثلة لما تريد ان أمكن.
                                  </span>
                                  <small> (اختياري )</small>
                                  </label>
                <div class="form-group container file-style" >

                    <label class=" mt-2 ">

                 <span class="btn btn-light " @click="$refs.ete" v-if="files==''"  style="background: #3454d1; !importnat; color:#fff">
                        <span class=" fa fa-paperclip"></span>
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


                    <button class=" btn btn-download btn-block mt-3 font-weight-bold" :disabled="
                    tenders.Notes.length <=99 || tenders.title.length<=4 ||   loading == true"
                  >

                  {{loading ? 'انتظر قليلا ..': "نشر الان"}}

                  </button>





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

import ValidationErrors from "../shared/components/ValidationErrors.vue";
import validationErrors from "../shared/mixins/validationErrors";
import AllUae from '../auth/AllUae.vue';

export default {
  components: {  ValidationErrors, AllUae },
  mixins: [validationErrors],

  data() {
    return {


             images:[],
        progressbar:[],
        FileNotAllowd:'',
      tenders: {
        emirates: null,
        Notes: '',
        title: null,
      },
      files: [],
      success: "",
      errors: null,
      status: null,
    open_select:null,
    open_services_select:null,

    TypeServices:1,
    emirates_selected:null,
    open_type_select:null,
    destination:null,
    loading:false,

    TypeEmirates1:null,
    TypeEmirates2:null,
    TypeEmirates3:null,
    TypeEmirates4:null,
    TypeEmirates5:null,
    TypeEmirates6:null,
    TypeEmirates7:null,
    
    };
  },

  methods: {
       open(event){
        if(event=='emirates'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"
         
    }
           if(event=='services'){

          this.open_services_select=="open" ? this.open_services_select='' : this.open_services_select="open"
         
    }
    },

    succesAlert(){
        $('#success').modal('show');
                $('.modal-backdrop').css('display','block');
                
    },
     emirates(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
    },
        ChooseServices(e){
        this.TypeServices=e;
         $(this.open_services_select).remove();
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
  let Images = this.images;
  files.splice(i,1,'');
  Images.splice(i,1,'');
    console.log(files);




            },
    onChange(e) {
      this.file = e.target.files[0];
    },
    formSubmit() {
      this.errors = null;

      //data.append('imageAds', this.photo);

      let data = new FormData();

      if(this.files!=''){
      this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });
      }
      /*
        this.files.forEach(file =>{
            data.append('images[]',file,file.name)
        })
        */

      data.append("title", this.tenders.title);
      data.append("description", this.tenders.Notes);
      data.append("emirates", this.emirates_selected);
      data.append("TypeServices", this.TypeServices);



      if(this.IsUser==6){
          this.destination="/service/ads/construction"
      }
       if(this.IsUser==4){
          this.destination="/service/ads/hvac"

      }

          if(this.IsUser==3){
          this.destination="/service/ads/stone"

      }
       if(this.IsUser==5){
          this.destination="/service/ads/interior"

      }


      this.loading=true;

      axios.post(this.destination, data)
        .then(response=>{
          this.status = response.data;

          this.tenders.title = ''
          this.tenders.Notes = ''
           this.files=" "
          this.images=" "
          this.emirates_selected =" "
            this.loading=false;
            this.succesAlert();

        })
        .catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status

        })
        .then(() => ((this.loading = false), (this.ret = false)));


    },
    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
    GetBranch(){
      
         this.User.branch.forEach((branch) => {

           if(branch.emirates=='7'){
        
              this.TypeEmirates7=branch.emirates;
           }

           if(branch.emirates=='1'){
             
              this.TypeEmirates1=branch.emirates;
           }
            if(branch.emirates=='5'){
              
             this.TypeEmirates5=branch.emirates;
           }
             if(branch.emirates=='6'){
                
              this.TypeEmirates6=branch.emirates;
           }
               if(branch.emirates=='4'){
                
              this.TypeEmirates4=branch.emirates;
           }
               if(branch.emirates=='3'){
                
              this.TypeEmirates3=branch.emirates;
           }
                if(branch.emirates=='2'){
                
              this.TypeEmirates2=branch.emirates;
           }
         

      });
    }
  },
  created(){
    if(this.IsUser==6){
this.GetBranch();
    }

  },
  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },
       IsUser(){
            return this.$store.getters.IsUser
        },
         User(){
            return this.$store.getters.user
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
.bx{
    font-size: 4rem;
    margin-bottom: 5px;
}
</style>
