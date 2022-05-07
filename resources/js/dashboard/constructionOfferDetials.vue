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
  <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  </div>
</div>
  <div class="add-image">
      				<div class="p-descrip-box" v-for="ads ,index in adss" :key="index">
						<div class="p-des-box-title">
							<h4 class="pr-d-title">{{ads.title}} <status :status="ads.status"></status></h4>
							<span class="request-view theme-color"><i class="fa fa-check-circle"></i>Request Viewing</span>
						</div>
						<p>
                            {{ads.description}}
    </p>

                        <div  class="container-image">
             <div v-for="image , index in ads.image" :key="index">

                 <img :src="image.path" class="image-flex">
                 <a :href="image.path" download="download" class="text-right btn btn-light mr-2 ml-2">تحميل</a>
                     <a @click="openImageToDelete(image.id,image.path)"  class="text-right btn btn-danger mr-2 ml-2"
                     data-toggle="modal" data-target="#openImageToDelete">ازالة</a>

             </div>
             </div>





                      <div class="modal fade" id="openImageToDelete" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">هل أنت متأكد تريد حذف هذه الصورة ؟</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img :src="imgPATH"  width="500"  height="500"  class="little-rounded " />
      </div>
      <div class="modal-footer">

        <button type="button" class="btn theme-btn" style="background: #4caf50" @click="deleteThisImage(imgID)">تـأكيد </button>

      </div>
    </div>
  </div>
</div>

             </div>

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
</template>


<script>
import status from '../admin/status.vue';


export default {
  components: { status },
data(){
    return{
     ads_Id :this.$route.params.id,
     adss:null,
     src:null,
      files: [],
      images: [],
       progressbar:[],
         FileNotAllowd: "",
      errors: null,
      status: null,
      imgPATH:null,
      imgID:null,
    }
},
methods:{
        saveImage(){
          let data = new FormData();
          data.append('id',this.ads_Id)


      if(this.files!=''){
      this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });
      }
          axios.post('insert/ads/construction/image',data).then(res=>{

              this.getTender();

               this.files = []
               this.images= []

          });
      },
      deleteThisImage(id){
          let data = new FormData();
          data.append('id',id)
          axios.post('delete/myads/Consruction/',data).then(res=>{
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
                getTender(){
                    if(this.IsUser==6){
axios.get(`myads/Consruction/${this.$route.params.id}`)
      .then((response) =>
      ( this.adss =  response.data));
    }
                     if(this.IsUser==4){
axios.get(`myads/Hvac/${this.$route.params.id}`)
      .then((response) =>
      ( this.adss =  response.data));
    }
                         if(this.IsUser==3){
axios.get(`myads/Stone/${this.$route.params.id}`)
      .then((response) =>
      ( this.adss =  response.data));
    }
                             if(this.IsUser==5){
axios.get(`myads/interior/${this.$route.params.id}`)
      .then((response) =>
      ( this.adss =  response.data));
    }
                }
},
    created() {
        this.getTender();
    },
    computed: {

     IsUser(){
            return this.$store.getters.IsUser
        },

  },
}
</script>

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
