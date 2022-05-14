<template>
<div >

<div v-if=" isLoggedIn">



    <div v-if="user.roles.name !='user'">
     <div v-if="user.company == null || user.companyfile==null || user.achivement_file==null">
            <complete  ></complete>

        </div>
        <div v-else-if="user.companyfile.branchstatus==0">
            <branch>
            </branch>
        

        </div>
        <div v-else >
     
            <div class="sidebar MainSidebar " :class="open" v-show="$route.name!=='home'" >
    <div class="logo-details">
      <!-- <i class='bx bx-user'></i> -->
        <div class="logo_name">{{user.name}}</div>
        <i class='bx bx-menu' id="btn" @click="slide"></i>
    </div>
    <ul class="nav-list">

      <li>
         <router-link to="/dashboard"  href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">{{$t('dashboard')}}</span>
         </router-link>
         <span class="tooltip">{{$t('dashboard')}}</span>
      </li>


      <li>
         <router-link :to="{name:'Projects'}" v-if="IsUser!=10" >
         <i class='bx bx-home-smile' ></i>
         <span class="links_name">{{$t('Projects')}}</span>
         </router-link>
       <span class="tooltip">{{$t('Projects')}}</span>
     </li>
        <li>
         <router-link :to="{name:'AllNotification'}" >
         <i class='bx bx-bell'></i>
         <span class="badge badge-danger" v-if="notificationlist.length>0"> {{notificationlist.length}}</span>
         <span class="links_name">{{$t('notification')}}</span>
         </router-link>
       <span class="tooltip">{{$t('notification')}}</span>
     </li>
     <li>
               <router-link :to="{name:'alloffers'}" v-if="IsUser!=10" >
    <i class='bx bx-purchase-tag-alt'></i>
         <span class="links_name">{{$t('my_ads')}}</span>
               </router-link>
       <span class="tooltip">{{$t('my_ads')}}</span>
     </li>

 

       <li>
            <router-link :to="{name:'constrtenders'}" class="visible-xs" v-if="IsUser==1">
         <i class='fas fa-hard-hat' ></i>
         <span class="links_name"> {{$t('consr_tender')}}</span>
            </router-link>
       <span class="tooltip">{{$t('consr_tender')}}</span>
     </li>

         <li>
            <router-link :to="{name:'TenderRequest'}" >
       <i class='bx bx-collection'></i>
         <span class="links_name">{{$t('Requests')}}</span>
            </router-link>
       <span class="tooltip">{{$t('Requests')}}</span>
     </li>


     <li>
       <router-link :to="{name:'Settings'}">
         <i class='bx bx-cog' ></i>
         <span class="links_name">{{$t('settings')}}</span>
       </router-link>
       <span class="tooltip">{{$t('settings')}}</span>
     </li>
  <li >
         <a @click="logout()">
    <i class='bx bx-log-out' id="log_out" ></i>
             <span class="links_name">تسجيل خروج</span>
         </a>
         <span class="tooltip">{{$t('logout')}}</span>
     </li>
    </ul>
  </div>
<div class="home-section">

<a class="mt-5 ml-3" href="\"><i class="fa fa-eye"></i> Home</a>


<router-view></router-view>
</div>

    </div>

    </div>




    <!-- For User -->
       <div v-if="user.roles.name =='user'">


          <div class="  sidebar " :class="open" v-show="$route.name!=='home'" >
    <div class="logo-details">

        <div class="h6 logo_name">{{user.name}}</div>
        <i class='bx bx-menu' id="btn" @click="slide()"></i>
    </div>
    <ul class="nav-list">
        <li>
         <a  href="/">
          <i class='bx bx-home-circle'></i>
          <span class="links_name">{{$t('home')}}</span>
         </a>
         <span class="tooltip">{{$t('home')}}</span>
      </li>

      <li>
         <router-link to="/dashboard"  href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">{{$t('dashboard')}}</span>
         </router-link>
         <span class="tooltip">{{$t('dashboard')}}</span>
      </li>
      <li>
         <router-link :to="{name:'mytenders'}" v-if="IsUser==10" >
<i class='bx bx-list-ul'></i>     
    <span class="links_name">مشاريعي</span>
         </router-link>
       <span class="tooltip">مشاريعي </span>
     </li>

     <li>
         <router-link :to="{name:'AllNotification'}" >
         <i class='bx bx-bell'></i>
         <span class="badge badge-danger" v-if="notificationlist.length>0"> {{notificationlist.length}}</span>
         <span class="links_name">{{$t('notification')}}</span>
         </router-link>
       <span class="tooltip">{{$t('notification')}}</span>
     </li>





      

     <li>
        <router-link :to="{name:'tenders'}" >
<i class='bx bx-message-alt-add'></i>
   <span class="links_name">{{$t('Add_tender')}}</span>
        </router-link>
       <span class="tooltip">{{$t('Add_tender')}}</span>
     </li>

     <!-- <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">File Manager</span>
       </a>
       <span class="tooltip">Files</span>
     </li> -->

     <li>
        <router-link :to="{name:'saved'}" >
         <i class='bx bx-heart' ></i>
         <span class="links_name">{{$t('watchlist')}}</span>
        </router-link>
       <span class="tooltip">{{$t('saved')}}</span>
     </li>
     <li>
       <router-link :to="{name:'Settings'}">
         <i class='bx bx-cog' ></i>
         <span class="links_name">{{$t('Settings')}}</span>
       </router-link>
       <span class="tooltip">{{$t('Settings')}}</span>
     </li>
     <li >
         <a @click="logout()">
    <i class='bx bx-log-out' id="log_out" ></i>
             <span class="links_name">تسجيل خروج</span>
         </a>
         <span class="tooltip">{{$t('logout')}}</span>
     </li>
    </ul>
  </div>










<div class="home-section">

<a class="mt-3 ml-3" href="\"><i class="fa fa-eye"></i> Home</a>


  {{windowWidth}}

<router-view></router-view>
</div>



    </div>






</div>


</div>
</template>


<script>
import {mapState ,mapGetters} from 'vuex';
import Achive from '../auth/achive.vue'
import complete from '../auth/complete.vue'
import FileUpload from '../auth/FileUpload.vue'
import Login from '../auth/login.vue';
import NotificationBar from '../notificationBar.vue'
import StatsticUser from './statsticUser.vue'
import branch from './branch.vue'
export default {
  components: { complete, Achive, FileUpload, StatsticUser, NotificationBar, Login ,branch},
    data(){
        return{
        users:null,
        seen:false,
        status_upload:0,
        ContentWrapper:'content-wrapper',
        open:'',
        windowWidth: window.innerWidth,
        txt:'', 
        }
    },
    watch:{
    windowWidth(newHeight, oldHeight) {
            this.txt = `it changed to ${newHeight} from ${oldHeight}`;
        }
    },
      mounted() {

            this.getUnreadNotificatons();

                $('.header-inner').addClass('d-none');
                $('.footer-area').addClass('d-none');
                 this.$nextTick(() => {
            window.addEventListener('resize', this.onResize);
        })
        },
           beforeDestroy() { 
        window.removeEventListener('resize', this.onResize); 
    },
      computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
        user(){
             return this.$store.getters.user
        },
         ...mapState({

      isLoggedIn: "isLoggedIn",

    }),
    ...mapGetters({

    }),
    notificationlist(){
        return this.$store.state.notificationlist
    },

    },
  

    methods: {
        onResize() {
            this.windowWidth = window.innerWidth
                 if(this.windowWidth >=1000)
            {
              this.open='open'
            }else  if(this.windowWidth <=1000){
              this.open=''
            }
        },
            getUnreadNotificatons(){

            axios.get('/getLastTenNotifications').then(res=>{
                console.log(res.data);
               this.$store.state.notificationlist = res.data;


            }).catch(err=>{
                console.log(err);
            })

        },
         slide(){
        

           if(this.open=='open'){
             this.open=''
             this.ContentWrapper='';
            
           }else{
              this.open='open'
              this.ContentWrapper='content-wrapper';

           }



    },
     logout() {
     

        axios.post("/logout").then((response) => {
             this.$store.dispatch("logout");
           this.$router.push({ name: "login"});
        })
        .catch((error) => {
        this.$store.dispatch("logout");
          // location.reload();
        })
       
    },
   
              reset(resendemail) {
      this.loading = true;
      this.errors = null;
this.email=resendemail;


       try {
         axios.post("/password/email", {
                        email:this.email

                }).then(res=>{
                    this.link=res.data.message;
                });

      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    },

      
    

    },
    created(){
    this.onResize();

    
    }

}
</script>



<style scoped>
a i:hover {
color: #e43a15 ;
cursor: pointer;
}
.dropdown{
    padding: 0 5px;
    font-size: 12px;




}


.dropdown .dropdown-item  {
color: #e43a15 ;
cursor: pointer;
    font-size: 12px;



}
.dropdown-menu.show{
    width: 20rem;
    height: 31rem;
    overflow-y: scroll;
}
.badge-danger {
      color: #fff;
    background-color: #e3342f;
    position: absolute;
    left: 25px;
    top: 7px;
    border-radius: 16px;
    font-size: 9px;
}
.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 65px;
	background: #fff;
	overflow-y: scroll;
	margin-bottom: 25px;
}


/*
 *  STYLE 2
 */

#style-4::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar
{
	width: 12px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar-thumb
{
	border-radius: 10px;

	background-color: #ced0d4;
}

/*
 *  STYLE 3
 */
</style>

<style scoped>
.MainSidebar{
  position: fixed  !important;
}
:root{
    --sidebar-bg-color:#ffffff;
    --sidebar-item-hover:#38a169;
    --sidebar-item-active:#276749;
}
.btn-oranger{
    background: #5192fc;
    color: #fff;
    border-radius: 20px;
}
.btn-outline-oranger{
    border: #5192fc;
    color: #5192fc;
    border-radius: 20px;
}

</style>

<style lang="scss" scoped>

.sidebarHome {
    color:rgb(34, 34, 34);
    /* background-color: var(--sidebar-bg-color); */
    float: left;
    position: fixed;
    z-index: 1;
    top:86px;
    left: 0;
    bottom: 0;
        padding: 1.5em;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
}
.sidebarHome > a{
    padding: 10px;
     color: rgb(42, 41, 41);
     margin-top:12px;
      text-decoration:none;
}
.sidebarHome > a:hover{
    background: #eee;
    border-radius: 20px;
    cursor: pointer;

}



 a.router-link-exact-active{
     font-weight: bold;
     background: #fff !important;
      border-radius: 20px;
     text-decoration:none;
     color: rgb(42, 41, 41) !important;


   i{
         color: rgb(12, 12, 12) !important;
 }
 .links_name{
    color: rgb(12, 12, 12) !important;
 }
}

.sidebarHome .drop-menu{

    -webkit-box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%) !important;
}
</style>


<style scoped>
/* Google Font Link */

.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #3454d1;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #3454d1;
}

.sidebar li a{
  display: flex;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #3454d1;
  color: #fff;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #3454d1;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
 
}


.home-section .text{
  display: inline-block;
  color: #3454d1;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}


@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
  
 

}



</style>


<style scoped>
@import 'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css';


</style>
