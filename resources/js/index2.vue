<template>

<div >

<div class="" v-if="$route.name=='home' ">
<nav class="navbar" id="navbar_top">
        <div class="navbar-container container-fluid" >
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items" dir="rtl">





                                    <li v-if="isLoggedIn">
                                        <a>
                                        <div class="dropdown show visible-xs">


                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" :dir="$t('directions')"
                                        :class="$t('text_align')">
                                            <a class="dropdown-item" href="#">
                                                <span   v-if="users.avatar">    <img :src="users.avatar" class="profile-user-x"> </span>
                                                <span class="profile-user-x"  v-else>   {{users.name.substr(0,1 )}} </span>
                                                <span class="">{{$t('Myprofile')}}</span>
                                            </a>


                           <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"></a>
                                            <a class="dropdown-item fa fa-fw fa-sliders" href="#"> {{$t('settings')}} </a>
                                            <a class="dropdown-item  fa fa-fw fa-edit" href="#"> {{$t('Edit_Account')}} </a>


                                            <div class="dropdown-divider"></div>
                                             <a class="dropdown-item fa fa-sign-out " @click="logout()">  {{$t('Logout')}} </a>
                                        </div>

                                        <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <span class="profile-user" v-if="users.avatar">   <img :src="users.avatar" class="profile-user"></span>
                                            <span class="profile-user" v-else>   {{users.name.substr(0,1)}}</span>
                                        </a>
                                        </div>
                                        </a>
                                    </li>








       <!-- <li v-if="isLoggedIn" class="visible-xs">  <router-link to="/dashboard" class="visible-xs">


        <img src="assets/img/dashboard(2).svg" width="17" class="mr-2" v-if="$route.path=='/dashboard'">


        <img src="assets/img/dashboard.svg" width="17" class="mr-2" v-else >


        <span class="visible">dashboard</span>
        </router-link>
       </li>

               <li v-if="isLoggedIn" class="visible-xs"><router-link :to="{name:'Projects'}" v-if="IsUser!=10">
                   <img src="assets/img/list(1).svg" width="17" class="mr-2"  v-if="$route.path=='/Projects' ">
                   <img src="assets/img/list.svg" width="17" class="mr-2"  v-else>
                   Projects</router-link>
               </li>


                     <li v-if="isLoggedIn" class="visible"> <router-link :to="{name:'mytenders'}" v-if="IsUser==10">
                   <img src="assets/img/list(1).svg" width="17" class="mr-2"  v-if="$route.path=='/Projects' ">
                   <img src="assets/img/list.svg" width="17" class="mr-2"  v-else>
                   Projects</router-link>
                     </li>
               <li v-if="isLoggedIn"> <router-link :to="{name:'alloffers'}" v-if="IsUser!=10">
                   <img src="assets/img/plus2.svg" width="17" class="mr-2" v-if="$route.name=='alloffers'">
                   <img src="assets/img/plus.svg" width="17" class="mr-2" v-else>
                   myads</router-link>
               </li>

                     <li v-if="isLoggedIn"><router-link :to="{name:'request'}">
                   <img src="assets/img/shopping-cart (1).svg" width="17" class="mr-2" v-if="$route.name=='request'">
                   <img src="assets/img/shopping-cart.svg" width="17" class="mr-2" v-else>
                   request</router-link>
                     </li>

                    <li v-if="isLoggedIn"> <router-link :to="{name:'Settings'}">
                   <i class="fas fa-sliders mr-2" width="17" v-if="$route.name=='Settings'"></i>
                   <i class="fa fa-sliders mr-2" width="17"   style="color:#c5cbdd" v-else></i>
                   settings</router-link>
                    </li>
 -->






                                    <li v-if="!isLoggedIn">
                                        <router-link :to="'register'" class="btn-register"  >
                                        {{ $t('register') }}

                                        </router-link>

                     <li v-if="!isLoggedIn">
                        <router-link :to="'/login'" class="btn-login" >

                {{ $t('login') }}
                        </router-link></li>




               <!-- <li><a href="#how" class="font-weight-bold">{{$t('How_it_works')}}</a></li> -->
                                <!-- <li><a href="#Become-Partner" class="font-weight-bold">{{$t('join')}}</a></li> -->
                                <li v-if="isLoggedIn"> <router-link to="/dashboard" class="font-weight-bold"  >
                                                {{ $t('dashboard') }} </router-link></li>

         <!-- <li><select class="custom-select" v-model="lang" @change="handlechange($event)">
                        <option value="en" >
                         english </option>
                        <option value="ar"> عربي </option>
                    </select></li> -->

        <div class="btn-group dropdown">
  <!-- <a type="button" class=" " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="assets/img/globe.svg" width="15"> -->



           <a v-if="lang=='ar'" @click="handlechange('en')" style="cursor:pointer">english</a>
           <a v-if="lang=='en'" @click="handlechange('ar')" style="cursor:pointer">عربي</a>

  <!-- <div class="dropdown-menu" style="   border-radius: 20px !important;border: none !important;
  box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%) !important;">
    <a class="dropdown-item" @click="handlechange('en')">english</a>
    <a class="dropdown-item" @click="handlechange('ar')">ar</a>
  </div> -->
</div>

            </ul>

            <router-link :to="{name:'home'}"> <h1 class="logo visible-xs"><img src="assets/img/AMB-LOGO-web.svg" width="200"></h1> </router-link>

             <h1 v-if="isLoggedIn" class="logo">
                                        <a>
                                        <div class="dropdown show hidden-xs">


                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" :dir="directions" :class="text_align">
                                            <a class="dropdown-item" href="#">
                                                <span class="profile-user-x">   M </span>
                                                <span class="">الملف الشخصي</span>
                                            </a>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"></a>
                                            <a class="dropdown-item fa fa-fw fa-sliders" href="#"> الاعدادات </a>
                                            <a class="dropdown-item  fa fa-fw fa-edit" href="#"> تعديل الحساب </a>
                                            <div class="dropdown-divider"></div>
                                             <a class="dropdown-item fa fa-sign-out " @click="logout()"> تسجيل خروج </a>
                                        </div>

                                        <a class=" " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <span class="profile-user">   M </span>
                                        </a>
                                        </div>
                                        </a>
                                    </h1>
                                      <h1 class=" logo2 hidden-xs" v-if="isLoggedIn">

                                       <notification-bar ></notification-bar>
                                    </h1>

        </div>
    </nav>
</div>

<keep-alive>
<router-view></router-view>
</keep-alive>


<div class="footer" >


    <div class="d-flex justify-content-center mt-2">
        <div class="footer-links" style="font-size:1rem">
        <a class="text-light mr-3 fa-2x"><i class="fa fa-facebook"></i></a>
        <a class="text-light mr-3  fa-2x "><i class="fa fa-twitter"></i></a>
        <a class="text-light mr-3  fa-2x "><i class="fa fa-instagram"></i></a>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <div class="footer-links" style="font-size:1rem">
        <a class="text-light mr-3">privacy</a>
        <a class="text-light mr-3   ">About us</a>
        <a class="text-light mr-3   ">Terms of Service</a>
        </div>

    </div>


</div>

</div>

</template>

<script>
import ValidationErrors from './shared/components/ValidationErrors.vue';
import validationErrors from "./shared/mixins/validationErrors";
import { mapState, mapGetters } from "vuex";
import Admin from './admin/admin.vue';
import Achive from './auth/achive.vue';
import Complete from './auth/complete.vue';
import FileUpload from './auth/FileUpload.vue';
import Navbar from './auth/navbar.vue';
import NotificationBar from './notificationBar.vue';
import userProfile from './v-dash/users.vue';
import Home from './home.vue';




export default {
     props:{email:String} ,
   components: {
    userProfile,
      Complete,
      FileUpload,
      Achive,
      NotificationBar,
      Admin,
      Navbar,
      ValidationErrors,
      Home,







  },
     mixins:[validationErrors],

     data() {
          const lang = localStorage.getItem('lang') || 'ar';
     return{
         lang:lang,
        seen : true,
        users:null,
        toggled:true,
        AdsToggle:'d-none',
        StatusUser:null,
        link:null,
      loading: false,
      errors:'',
      email:null,
            footer:false,
            namePaths:null,
            //  shortName: this.users.name.split(' ').map(x => x[0].toUpperCase()).join('')

        };

  },




mounted:{
loadFooter(){
    this.footer=true;
    console.log('from footer true')
}

},

   methods: {
          handlechange(event){
          localStorage.setItem('lang',event);
          location.reload();
          },
        notVisbile(){
            namePaths="admin" || "admin/login"
        },


     logout() {
      try {

        axios.post("/logout");

        this.$store.dispatch("logout");

        this.$router.push({ name: "home"});
      } catch (error) {
        this.$store.dispatch("logout");
      }
         location.reload();
    }
  },
  beforeCreate(){
console.log('hi');
  },
    async created() {
        if(this.isLoggedIn){

        const  request = axios.get('/user').then(response=>{
        this.users= response.data;

        });

  this.companies = (await axios.get('/company/complete')).data;

    console.log(this.companies);
        }



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

  },

};

</script>




<style    >
.card{
    border-radius: 20px;
    border: none;


    box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%);
    -webkit-box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%);
}

body{
    background-color: #eee;

}
.btn-bus {background-image: linear-gradient(to right, #1d67cb 0%, #1d67cb  51%, #1d67cb  100%)}
.btn-bus {
   margin: 10px;

   text-align: center;
    font-size: 14px;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
       margin-top: 1.5rem!important;
   border-radius: 10px;
   display: block;
 }

 .btn-bus:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
 }
.main-color{
    color:#1d67cb
}

 #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

.list-group-flush>.list-group-item {
    border-width: 0px 0 0px;
        margin-top: 1rem;
}
@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}
.progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 24%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: #3490dc;
  }
  .progressbar li.active:before {
      border-color: #3490dc;
  }
  .progressbar li.active + li:after {
      background-color: #3490dc;
  }

/* a.router-link-exact-active{
    color:#e74c3c !important;
    background: #ddd !important;
}
a.router-link-active{
    color:#e74c3c !important;
     background: #ddd !important;
} */

.badge-custom{
    background: #cef2ef;
    color:#292929;
}
 .badge-custom-orange {
    background: #f1f3f6;

 }
 .btn-register{
     background-color: #1E5DA8;
     color: #fff !important;
     font-size: 12px !important;
     padding:10px 20px;
     border-radius: 12px;
 }
.main-btn{
     background-color: #1E5DA8;
     color: #fff !important;
     font-size: 12px !important;
     padding:10px 20px;
     border-radius: 12px;
}

 .btn-register:hover{

  box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%) !important;;
 }

 .btn-login{
      border:2px solid #292929;
     color: #292929 !important;
     font-size: 12px  !important;
     padding:10px 20px;
     border-radius: 12px;
 }
</style>

<style scoped >
.navbar{



    background: #fff;

    z-index: 100;

}

.nav{
    width: 100%;
    height:72px;

    line-height: 65px;
    text-align: center;
    background: linear-gradient(to right, #ffffff 52%, #dddddd 96%);

    /* box-shadow: 1px 3px 16px -10px; */
    z-index: 99;
}

.nav div.logo{
    width: 180px;
    height: 10px;
    font-size: 25px;
    font-weight: bold;

}

.nav div.logo a{
    text-decoration: none;
    color: #fff;
    font-size: 1.8em;
    text-transform: uppercase;
}

.nav div.logo a:hover {
    color: #c0c0c0;
}

.nav div.main_list{
    width: 30rem;
    height: 65px;
    float: right;
}

.nav div.main_list ul{
    width:100%;
    height: 65px;
    display: flex;
    list-style: none;
}

.nav div.main_list ul li{
    width: 110px;
    height: 65px;

}

.nav div.main_list ul li a{
    text-decoration: none;
    line-height: 65px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 12px;
    color:rgb(37, 37, 37);
}

.nav div.main_list ul li a:hover{
    color: #2c2c2c;

}

.nav div.media_button {
    width: 40px;
    height: 40px;
    background-color: transparent;
    position: absolute;
    right: 15px;
    top: 12px;
    display: none;
}

.nav div.media_button button.main_media_button {
    width: 100%;
    height: 100%;
    background-color: transparent;;
    outline: 0;
    border: none;
    cursor: pointer;
}

.nav div.media_button button.main_media_button span{
    width: 98%;
    height: 3px;
    border-radius: 5px;
    display: block;
    background-color: #2e2d2d;
    margin-top: 9px;
    margin-bottom: 10px;

}

.nav div.media_button button.main_media_button:hover span:nth-of-type(1){
    transform: rotateY(180deg);
    transition: all 0.5s;
    background-color: #2e2d2d;
    height: 2px;
}

.nav div.media_button button.main_media_button:hover span:nth-of-type(2){
    transform: rotateY(180deg);
    transition: all 0.4s;
    height: 2px;
    background-color: #2e2d2d;
}

.nav div.media_button button.main_media_button:hover span:nth-of-type(3){
    transform: rotateY(180deg);
    transition: all 0.3s;
    height: 2px;
    background-color: #2e2d2d;
}

.nav div.media_button button.active span:nth-of-type(1) {
    transform: rotate3d(0, 0, 1, 45deg);
    position: absolute;
    margin: 0;
}

.nav div.media_button button.active span:nth-of-type(2) {
    display: none;
}

.nav div.media_button button.active span:nth-of-type(3) {
    transform: rotate3d(0, 0, 1, -45deg);
    position: absolute;
    margin: 0;
}

.nav div.media_button button.active:hover span:nth-of-type(1) {
    transform: rotate3d(0, 0, 1, 20deg);
}

.nav div.media_button button.active:hover span:nth-of-type(3) {
    transform: rotate3d(0, 0, 1, -20deg);
}

.nav-link {
    font-size: 16px !important;
    font-weight: 500;


}
</style>



