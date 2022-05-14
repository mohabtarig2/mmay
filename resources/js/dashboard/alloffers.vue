<template>
     <div class="  mb-4 container mt-5"    >

         <all-offers-constructions v-if="IsUser==6 || IsUser==4 || IsUser==3 || IsUser==5" ></all-offers-constructions>
<div class="row" v-if="IsUser==1">





<div class="col-md-12 col-sm-12" :dir="$t('directions')" :class="$t('text_align')">


<h1 class="  mb-2 text-center mt-3  mb-0">اخر اعلانات تمت اضافتها  </h1>
       <div >



    <!-- <a @click="$router.go(-1)" style="cursor:pointer" class="text-dark"><i class="fa fa-arrow-left  mb-3 fa-1x"></i></a> -->




       <router-link class="theme-btn primary  mb-3" :to="{name:'Myoffer'}"> {{$t('add_Your_ads')}} </router-link>

 <div class=" mb-4 row" :dir="$t('directions')" :class="$t('text_align')">
      <div v-for="(offer,index) in recents.data" :key="index" v-bind="recent" class="col-md-4 col-sm-12">

<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
										<img :src="image.path" alt="#"  class="image_villa"  v-if="i==0">
									</div>
									<div class="property-for-sale">
                                        <status :status="offer.confirmed"></status>
										<ul class="list-none">
											<li><a >{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
											<li class="unique "  ><a href="#" >{{$t('unique')}}</a></li>

										</ul>
									</div>
									<!-- Property Ratting -->
									<div class="property-ratting">
										<div class="property-ratting-left">
											<span class="p-ratting-point">4.5</span>
											<div class="p-ratting-details">
												<ul class="ratting-details-star list-none">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-half-alt"></i></li>
												</ul>
												<span>2 Comment</span>
											</div>
										</div>
										<div class="property-ratting-save" >
											<a @click="saved(offer.id)"><i class="fa fa-heart"></i>Save</a>
										</div>
									</div>
								</div>
								<!-- Single Recent Content -->
								<div class="s-property-content">
									<h3 class="srp-title hs-4"><router-link :to="{name:'offerdetails',params:{id:offer.id}}">{{offer.title}}</router-link></h3>
									<p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i>
                                    <all-uae :emirates="offer.Emirates"></all-uae></p>

									<div class="single-r-property-bed">
										<ul class="single-bed-property list-none">
											<li>
                                                <a @click="Singlefillter('room',offer.type_villa)">
                                                <b>{{offer.rooms}}</b>
                                                <span><i class="bx bxs-bed"></i></span>
                                                </a>
                                                 </li>
											<li><a @click="Singlefillter('bath',offer.bathroom)"><b>{{offer.bathroom}}</b>
                                            <span><i class="bx bxs-bath"></i></span>
                                            </a>
                                            </li>
											<li><b>{{offer.sqft}}</b><span><i class="fas fa-arrows-alt"></i></span></li>
										</ul>
									</div>
									<!-- Property User -->
									<div class="property-user"  v-for="company , index in offer.company "
                                                :key="index">
										<div class="property-user-left">
											<img :src="company.avatar" alt="#" class="rounded-circle" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6"><a href="#">{{company.name}}</a></p>
												<span>company</span>
											</div>
										</div>
										<div class="property-user-price">
											<small><p>{{offer.price}}</p></small>
										</div>
									</div>
								</div>
							</div>

       </div>

       </div>



 </div>
   <div  ><pagination :data="recents" @pagination-change-page="detailsTender" ></pagination></div>
</div>
</div>
                            </div>
</template>


<script>
import recent from '../v-dash/recent.vue';
import AllOffersConstructions from './allOffersConstructions.vue';
import Listproject from './listproject.vue';
export default {
  components: { recent, Listproject, AllOffersConstructions },

    data () {
            return {
            form:{
                title: '',
                desc: '',
                Emirates: '',
                villa: '',


              },

              photo:'',
              loading:false,
              ret:null,
              status:null,
              errors:null,
              recents:null,
             successPost: false,
             alert:'d-none',
             isDragging:false,
             counter:0,
            files:[],
            images:[],
            FileNotAllowd:'',
            Post:'Post',
            }
    },
    created(){

        this.detailsTender();


    },
    methods:{
        directTo(id){

 this.$router.push({ path: `/myads/details/${id}`});
        },

 detailsTender(page ){
     if(this.IsUser==1){
          axios.get("/api/Ads?page="+page).then(response=>{
        this.recents = response.data;
        this.loading = false;
         })
     }
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
                   this.FileNotAllowd =`Not Allowd ${file.type} `;
                    return ;
                }

                this.files.push(file); //upload
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)



                reader.readAsDataURL(file);
                 this.progressbar = "w-100";
                 this.FileNotAllowd ='';
            },
        onImageChanged(e){
               const files = e.target.files;
               Array.from(files).forEach(file => this.addImage(file))
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

            removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);



            },
        async submit()
        {


        this.loading=true;
       // this.ret='spinner-grow text-light';


    let data = new FormData();



        //data.append('imageAds', this.photo);
     this.files.forEach((file) => {
        data.append("images[]", file, file.name);
      });


        data.append('title', this.form.title);
        data.append('Emirates', this.form.Emirates);
        data.append('desc', this.form.desc);
        data.append('villa', this.form.villa);


            axios.post(`/api/Ads/new`,data).then(response=>{
            if(200===response.status){
                this.recents = response.data.data;
                this.form.title =" "
                this.form.Emirates =" "
                this.form.desc =" "
                this.form.villa =" "
                // let filelength =this.files.length
                //   let files = this.files;


                //      files.splice(0,this.files.length)
                //      this.files=" "


           this.alert="alert alert-success alert-dismissible"
            }


       })
       .catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       })
       .then(()=>(this.loading=false,this.ret=" "));

    },
    errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    }
},computed: {
    hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
 IsUser(){
            return this.$store.getters.IsUser
        },


    }
}
</script>
<style scoped>
.page-link {
    z-index: 2;
    color: #dc3545;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

</style>

<style lang="scss" scoped>
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
        border:3px dashed #1adf65;
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
<style  scoped>
    .links{
        cursor:pointer;
        padding: 20px;
    }
    .links:hover{
        background: #eee;
        cursor:pointer;
        width: 100%;
    }
       .badge-success {

    background-color: #38c172;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}
   .badge-danger {

    background-color: #e91919;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}

 .badge-warning {

    background-color: #fda430;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}
</style>
