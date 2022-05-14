<template>
    <div >
      

                 <div v-if="user.email_verified_at==null" >
             

    <div class="container mt-5">
   

  <div class="alert alert-danger">




    <div class="mx-auto">
     

    <a class="btn btn-bus mx-auto" style="display:table;"
    :disabled="loading" @click.prevent="reset(user.email)">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    
    {{$t('Resend_Email_verification')}}</a>
    </div>


</div>
  </div>

</div>
    <div class=" " >
 <h1 class="text-muted text-center mt-5 " style="font-size: 2.25rem !important">{{$t('dashboard')}} </h1>



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">


<img :src="avatars" width="500" class="d-block  mx-auto mr-2">

  </div>


</div> -->

<div class="container mt-5">
  <h2 class="text-right">مناقصات </h2>
        <div class="row " >





     <div class="col-md-12"  >

         <slick v-bind="settings" class="tenders" v-if="IsUser==10">


              <!-- small box -->
              <div class="small-box BoxNumber1 " style="padding-left: 15px !important;
    padding-right: 16px !important;">
                <div class="inner">
                  <h3 class="text-light" v-if="counts">{{counts.AllTendersConsulate}}</h3>

                  <p class="text-light">  الاستشارات  </p>
                </div>
                <div class="icon">
<i class='bx bx-building-house'></i>                </div>

                <router-link :to="{name:'ConslTenders'}" class="small-box-footer">
                 اكثر
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>

            <!-- ./col -->

              <!-- small box -->
              <div class="small-box  BoxNumber2 ">
                    <div class="inner">
                  <h3 class="text-light" v-if="counts">{{counts.AllTenderConsr}}</h3>

                  <p class="text-light">
                      مقاولات
                       </p>
                </div>



                <div class="icon">
                  <i class=" fas fa-hard-hat "></i>
                </div>
                <router-link :to="{name:'constrtenders'}" class="small-box-footer">
                    اكثر 
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>

            <!-- ./col -->

              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="text-light" v-if="counts">{{counts.AllTenderhvac}}</h3>

                  <p class="text-light">تكييف</p>
                </div>
                <div class="icon">
                  <i class="fas fa-fan"></i>
                </div>
                <router-link :to="{name:'HvacTenders'}" class="small-box-footer">
                 أكثر
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>

            <!-- ./col -->

              <!-- small box -->
              <div class="small-box bg-danger">
                      <div class="inner">
                  <h3 class="text-light">
                  {{counts.AllTenderstone}}
                  </h3>

                  <p class="text-light">حجر</p>
                </div>

                <div class="icon">
                  <i class='bx bx-cylinder' ></i>
                </div>
                <router-link :to="{name:'StoneTenders'}" class="small-box-footer">
                  اكثر
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>


                   <div class="small-box bg-light">
                      <div class="inner">
                  <h3 class="text-dark">
                  {{counts.AllTenderInterior}}
                  </h3>

                  <p class="text-dark">ديكور</p>
                </div>

                <div class="icon">
                  <i class='fas fa-couch' ></i>
                </div>
                <router-link :to="{name:'InteriorTenders'}" class="small-box-footer">
                  اكثر
                  <i class="fas fa-arrow-circle-right"></i>
                </router-link>
              </div>

            <!-- ./col -->


        </slick>

     </div>


    <div class="col-md-12"  >


<h2 class=" thm-color text-right"> حالة الطلبات </h2>
<div v-if="IsUser==1 || IsUser==6 || IsUser==4 || IsUser==3 || IsUser==5" class="row">

 <div class="col-md-4 col-sm-12">

              <div class="small-box BoxNumber1 " style="padding-left: 15px !important;
    padding-right: 16px !important;">
                <div class="inner">
                  <h3 class="text-light">{{countsAds.active}}</h3>

                  <p class="text-light">Active Ads</p>
                </div>
                <div class="icon">
  <i class="far fa-check-circle"></i>
  </div>

              </div>
</div>
<div class="col-md-4 col-sm-12">
              <div class="small-box  BoxNumber2 ">
                    <div class="inner">
                  <h3 class="text-light">{{countsAds.pending}}</h3>

                  <p class="text-light">
                      pending
                       </p>
                </div>



                <div class="icon">
                  <i class="fas fa-hourglass-half"></i>
                </div>



              </div>
</div>

    <div class="col-md-4 col-sm-12">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="text-light">{{countsAds.draft}}</h3>

                  <p class="text-light">Draft</p>
                </div>
                <div class="icon">
                 <i class='bx bxs-folder-minus'></i>
                </div>

              </div>
    </div>
</div>
   <router-link to="dashboard/myads" class="theme-btn primary    mt-2 mb-2  " v-if="IsUser!=10">
   اضف اعلان جديد  <i class="fa fa-plus fa-fw "></i>
   </router-link>





<h2 class=" thm-color text-right" v-if="IsUser==1"> المناقصات </h2>





         <statstic-user :counts="counts"></statstic-user>

         <mini-offer v-if="IsUser==1"> </mini-offer>

  <offers v-if="IsUser ==1 || IsUser ==6  || IsUser ==4 || IsUser ==3 || IsUser ==5"  > </offers>



                        <leatest-tenders v-if="IsUser==10"></leatest-tenders>







     </div>



                            </div>
                    </div>




















</div>
    </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import offers from '../v-dash/offers.vue'  ;

import NewAds from '../v-dash/NewAds.vue';
import recentAds from '../v-dash/recent.vue'  ;

import Slick from 'vue-slick-carousel';

import Login from '../auth/login.vue';
import Tenders from './tenders.vue';
import AdminDashboard from '../admin/AdminDashboard.vue';
import FilePondDemo from './FilePondDemo.vue'
import LeatestTenders from './LeatestTenders.vue';
import StatsticUser from './statsticUser.vue';
import MiniOffer from './miniOffer.vue';



export default {
    components:{
        offers,
        NewAds,
        recentAds,
        FilePondDemo,
        Login,
        Tenders,
        AdminDashboard,
        LeatestTenders,
        StatsticUser,
        Slick,
        MiniOffer,


    },
 props:{AllTendersConsulate:Number},

  data() {

    return {
         settings:{

prevArrow: false,
    nextArrow: false,
  infinite: true,
  speed: 500,
  slidesToShow: 5,

 arrows:true,

responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        initialSlide: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  },
      recents:null,
      photo:null,
      loading: false,
      users:null,
      userid:null,
      url1:null,
      FileNotMapAllowd:null,
      avatar:null,
       progress:0,
        progress2:0,
        counts:null,
        countsAds:null


    };
  },
    computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),
    IsUser(){
            return this.$store.getters.IsUser
        },
           user(){
             return this.$store.getters.user
        },
    },

methods:{
    getCountAds(){

        let ads =null;
        if(this.IsUser==5){

            ads = 'api/CountAll/interior'
        }

        if(this.IsUser==1){

            ads = 'api/CountAll/conulte'
        }

         if(this.IsUser==6){

            ads = 'api/CountAll/Construction/Ads'
        }

         if(this.IsUser==4){

            ads = 'api/CountAll/hvac/Ads'
        }

         if(this.IsUser==3){

            ads = 'api/CountAll/stone/Ads'
        }
     axios.get(ads).then(response=>{
        this.countsAds = response.data;


});

    },
      GetCounts() {
           if(this.IsUser==10){
      axios.get("countUserTenders").then((res) => {
        this.counts = res.data;

        this.AllTendersConsulate = this.counts.AllTendersConsulate;
      });
           }
    },

 fileAvatar(event){
         this.avatar=event.target.files[0];
         this.filePassportName = this.avatar.name;
          if(!this.avatar.type.match('image.*') ){
              this.avatar=null
              this.progress=null
              this.progres2=null
                   this.FileNotMapAllowd =`should be Jpg Or Png `;
                    return ;
                }

          let data = new FormData();
          data.append("avatar",this.avatar,this.avatar.name);
         this.url1 = URL.createObjectURL(this.avatar);
  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('avatar',data,config).then(res=>{
                    this.FileNotMapAllowd=null
                    this.avatars = res.data;
                });




       },
},

 async created() {

         this.GetCounts();


     this.getCountAds();
$('.slick-arrow').empty();

const isuser = this.$store.getters.IsUser

this.loading = true;
  await  axios.get('/user').then(response=>{
        this.users= response.data;
        this.userid = this.users.id;
        this.avatars=this.users.avatar;

        });
// if(this.IsUser==6){

//     const  request = axios.get('/api/Ads/'+this.userid).then(response=>{
//         this.recents = response.data;
//         this.loading = false;


// });

// }


//const photo = (await axios.get(`/api/Ads/images/${this.recents.id}`)).data;


}
}
</script>

<style scoped>

.avatar{
 border-radius: 50%;

    /* max-width: 55px; */
    border-width: 4px;
    border-color: rgb(230 230 230);
    border-style: solid;

}
.image-container .after {
 position: absolute;
  display: none;
    justify-content: center;
    align-items: center;
      top: 0;
    left: 0;
    right: 0;
  margin-left: auto;
  margin-right: auto;
    border-radius: 50%;
    color: #FFF;
    transition: all 0.5s ease-in-out ;
}
.avatar , .image-container .after
{
      width: 5rem;
    height: 5rem !important;
}

.fa{
    color:#c5cbdd !important;
    padding: auto;
}
.table thead th {
    vertical-align: bottom;
    border-bottom:none !important;
}

.table th, .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: none !important;
}
.btn-oranger{
    background: #fc7651;
    color: #fff;
    border-radius: 20px;
}
.image-container {

display: block;
position: relative;




}

.image-container:hover .after {
    display: flex;
    background: rgba(86, 71, 71, 0.5);
    transition: all 0.5s ease-in-out ;
    cursor: pointer;

}
.BoxNumber1{
    background-color:#3454d1;
}
.BoxNumber2{
     background-color:#34d19b ;
}
.BoxNumber3{
     background-color:#ff5722 ;
}



</style>
