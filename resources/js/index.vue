<template>

<div >

<div class=" "   >
    <div class="modal offcanvas-modal e" id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
      
                <!-- offcanvas-menu start -->
                <nav id="offcanvas-menu" class="offcanvas-menu">
                    <ul class="list-none">
<li class=" "><router-link :to="{name:'home'}" >{{$t('home')}}</router-link >
<li v-if="!isLoggedIn"><router-link :to="'/login'"> {{ $t('login') }}</router-link></li>
<li v-if="!isLoggedIn"><router-link :to="'register'"   > {{ $t('register') }} </router-link>
  <li v-if="isLoggedIn"> <router-link to="/dashboard"  class="font-weight-bold" >{{ $t('dashboard') }} </router-link></li>

 

					
                      
						<!-- <li class="menu-arrow" :class="{ 'active' : active1}">
                            <a href="#" @click="active('tender')">{{$t('tenders')}}</a>
								<ul class="sub-menu">
														<li>
                                                            <router-link :to="{name:'consultances'}">
                                                                {{$t('consulting_company')}}
                                                                </router-link>

                                                            </li>
                                                           <li>
                                                            <router-link :to="{name:'constructionTender'}">
                                                                {{$t('construcion_company')}}
                                                                </router-link>
                                                            </li>

                                                            <li>
                                                              <router-link :to="{name:'hvac'}">
                                                                {{$t('HVAC_companies')}}
                                                                </router-link>
                                                            </li>

                                                             <li>
                                                            <router-link :to="{name:'StoneTender'}">
                                                                {{$t('Stone_companies')}}
                                                                </router-link>


                                                            </li>


													</ul>
						</li> -->
						<li class="menu-arrow" :class="{ 'active' : active2}">
                            <a href="#"  @click="active('agents')">الشركات</a>
								<ul class="sub-menu">
														<li>
                                                            <router-link :to="{name:'agents',params:{type:'consulting'}}">
                                                                {{$t('consulting_company')}}
                                                                </router-link>

                                                            </li>
                                                           <li>
                                                            <router-link :to="{name:'agents',params:{type:'construction'}}">
                                                                {{$t('construcion_company')}}
                                                                </router-link>
                                                            </li>

                                                            <li>
                                                              <router-link :to="{name:'agents',params:{type:'hvac'}}">
                                                                {{$t('HVAC_companies')}}
                                                                </router-link>
                                                            </li>

                                                             <li>
                                                            <router-link :to="{name:'agents',params:{type:'stone'}}">
                                                                {{$t('Stone_companies')}}
                                                                </router-link>


                                                                 <router-link :to="{name:'agents',params:{type:'interior'}}">
                                                                {{$t('interior_companies')}}
                                                                </router-link>


                                                            </li>


													</ul>
						</li> 
                       <!-- <li class="menu-arrow" :class="{ 'active' : active3}">
                           <a href="#" @click="active('villa')">{{$t('villa_design')}}</a>
													<ul class="sub-menu">
														<li><router-link :to="{name:'property',
                                                            params: {type:1,emirats:'all',bed:'all',bath:'all'}}">
                                                            {{$t('classic')}}
                                                            </router-link>
                                                            </li>
														<li><router-link :to="{name:'property',
                                                        params: {type:2,emirats:'all',bed:'all',bath:'all'}
                                                        
                                                        }">{{$t('modern')}}</router-link></li>

													</ul>
						</li> -->
                        <div class="header-btn">
									<router-link :to="{name:'tenders'}" class="theme-btn">{{$t('add_tender')}}</router-link>
								</div>
                     
                    </ul>
                    <div class="mt-5">
                         <small> <a class="" @click="switchLang('ar')" v-show="lang=='en'"><img src="https://img.icons8.com/color/20/000000/united-arab-emirates.png"/>عربي</a></small>
                                        <small><a @click="switchLang('en')" v-show="lang=='ar'">
                                           <img src="https://img.icons8.com/color/20/000000/usa.png"/> English
                                            </a></small>
                    </div>
                    <!-- <div class="offcanvas-social">
						<h4 class="follow-title">Follow Us:</h4>
                        <ul class="list-none">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div> -->
                </nav>
                <!-- offcanvas-menu end -->
            </div>
        </div>
    </div>
	<!-- End Mobile Menu Modal -->



	<!-- Header Area -->
	<header class="header-area" id="active-sticky" >
		<div class="container-fluid">
			<div class="header-inner">
				<div class="row g-0 justify-content-between align-items-center">
					<div class="col-auto">
						<!-- Logo -->
						<div class="logo">
							<a href="/"><img src="img/logo.png" alt="#"></a>
						</div>
					</div>
					<div class="col-auto">
						<div class="row gx-60 justify-content-between align-items-center">
							<button type="button" class="offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal" @click="OpenMenu">
								<span class="line"></span>
								<span class="line"></span>
								<span class="line"></span>
							</button>
					
                    	
                                         
	<div class="col-auto">
								<div class="main-menu">
									<div class="navbar">
										<div class="nav-item">
											<!-- Main Menu -->
											<ul class="nav-menu navigation list-none">
											
												
										

                                                   		<!-- <li class="menu-item-has-children"><a href="#">{{$t('tenders')}}</a>
													<ul class="sub-menu">
														<li>
                                                            <router-link :to="{name:'consultances'}">
                                                                {{$t('consulting_company')}}
                                                                </router-link>

                                                            </li>
                                                           <li>
                                                            <router-link :to="{name:'constructionTender'}">
                                                                {{$t('construcion_company')}}
                                                                </router-link>
                                                            </li>

                                                            <li>
                                                              <router-link :to="{name:'hvac'}">
                                                                {{$t('HVAC_companies')}}
                                                                </router-link>
                                                            </li>

                                                             <li>
                                                            <router-link :to="{name:'StoneTender'}">
                                                                {{$t('Stone_companies')}}
                                                                </router-link>


                                                            </li>


													</ul>
												</li> -->

                                             




												<!-- <li><a href="contact.html">{{$t('contact')}}</a></li> -->
											</ul>
											<!-- End Main Menu -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="header-btn">
									<router-link :to="{name:'tenders'}" class="theme-btn">{{$t('add_tender')}}</router-link>
								</div>
							</div>
							<div class="col-auto">
								<div class="main-menu">
									<div class="navbar">
										<div class="nav-item">
											<!-- Main Menu -->
											<ul class="nav-menu navigation list-none">
												
												
												<li class="menu-item-has-children"><a href="#">{{$t('villa_design')}}</a>
													<ul class="sub-menu">
														<li>
                                                            <!-- <router-link :to="{name:'property',
                                                            params: {type:1,emirats:'all',bed:'all',}}">
                                                            {{$t('classic')}}
                                                            </router-link> -->
                                                            <a @click="Singlefillter('type',1)">كلاسيك </a>
                                                            </li>
                                                            	
                                                            	
                                                            
												<li><a @click="Singlefillter('type',2)">حديث </a>
                                                        </li>

													</ul>
												</li>

                                                   		<li class="menu-item-has-children"><a href="#">{{$t('companies')}}</a>
													<ul class="sub-menu">
														<li>
                                                            <router-link :to="{name:'agents',params:{type:'consulting'}}">
                                                                {{$t('consulting_company')}}
                                                                </router-link>

                                                            </li>
                                                           <li>
                                                            <router-link :to="{name:'agents',params:{type:'construction'}}">
                                                                {{$t('construcion_company')}}
                                                                </router-link>
                                                            </li>

                                                            <li>
                                                              <router-link :to="{name:'agents',params:{type:'hvac'}}">
                                                                {{$t('HVAC_companies')}}
                                                                </router-link>
                                                            </li>

                                                             <li>
                                                            <router-link :to="{name:'agents',params:{type:'stone'}}">
                                                                {{$t('Stone_companies')}}
                                                                </router-link>

                                                                <router-link :to="{name:'agents',params:{type:'interior'}}">
                                                                {{$t('interior_companies')}}
                                                                </router-link>


                                                            </li>


													</ul>
												</li>

                                                <li class=" "><router-link :to="{name:'home'}">{{$t('home')}}</router-link >

												</li>

                                             




												<!-- <li><a href="contact.html">{{$t('contact')}}</a></li> -->
											</ul>
											<!-- End Main Menu -->
										</div>
									</div>
								</div>
							</div>
                            		<div class="col-auto">
								<!-- Header Details -->
								<div class="header-details style-1">
									<ul class="header-details-inner list-none">
                                    <li v-if="!isLoggedIn"><router-link :to="'/login'"> {{ $t('login') }}</router-link></li>
									<li v-if="!isLoggedIn"><router-link :to="'register'"   > {{ $t('register') }} </router-link>
                                    <li v-if="isLoggedIn"> <router-link to="/dashboard"  class="font-weight-bold" >{{ $t('dashboard') }} </router-link></li>
                                    <li class="" style="cursor:pointer"> 
                                     <small> <a class="" @click="switchLang('ar')" v-show="lang=='en'"><img src="https://img.icons8.com/color/20/000000/united-arab-emirates.png"/>عربي</a></small>
                                        <small><a @click="switchLang('en')" v-show="lang=='ar'">
                                           <img src="https://img.icons8.com/color/20/000000/usa.png"/> English
                                            </a></small>
                                        </li>

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    </div>

<router-view :key="$route.path"></router-view>



	<footer class="footer-area " > 
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-12">
				
						<div class="footer-card-inner">
							<div class="row">
								<div class="col-lg-4 col-12">
								
									<div class="single-f-widget">
										<h3 class="widget_title">About Us</h3>
										<p class="mb-0">Corporate leadership skills through installed base niches. Phosfluo rescently onceptualize integrated models whereas multidisciplinary web services offer limited</p>
										<ul class="footer-social list-none">
											<li class="active"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
											<li><a href="#"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">
								
									<div class="single-f-widget f-services-widget">
										<h3 class="widget_title">Services</h3>
										<ul class="footer-services list-none">
											<li><a href="index.html">Home</a></li>
											<li><a href="about-us.html">About</a></li>
											<li><a href="contact.html">Contact</a></li>
											<li><a href="property-grid.html">Portfolio</a></li>
											<li><a href="blog-list.html">Blog</a></li>
											<li><a href="blog-details.html">News</a></li>
											<li><a href="agents-list.html">Team</a></li>
											<li><a href="property-list.html">Property</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="signup.html">Sign Up</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-12">	
								
									<div class="single-f-widget">
										<h3 class="widget_title">News Feed</h3>
										<div class="f-news-feed">
											<img src="img/feed-1.png" alt="#">
											<div class="f-news-content">
												<div class="n-feed-meta"><a href="blog-list.html"><i class="fa fa-clock"></i>10 June, 2021</a></div>
												<p class="footer-n-title m-0"><a href="blog-details.html">Losing never felt so good energy everything</a></p>
											</div>
										</div>
										<div class="f-news-feed">
											<img src="img/feed-2.png" alt="#">
											<div class="f-news-content">
												<div class="n-feed-meta"><a href="blog-list.html"><i class="fa fa-clock"></i>4 May, 2021</a></div>
												<p class="footer-n-title m-0"><a href="blog-details.html">5 Essential Steps for Buying an Investment</a></p>
											</div>
										</div>
									</div>
								
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<p class="mb-0">© {{new Date().getFullYear()}} <a href="index.html">AmbTenders</a> By <a href="https://twitter.com/MohabTarig">mohab tarig</a>. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>  

	<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>

	<!-- Jquery JS -->

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
     const lang = localStorage.getItem('lang') || localStorage.setItem('lang','ar') ;

return{
         lang:lang,
        seen : true,
        users:null,
        toggled:true,
        AdsToggle:'d-none',
        StatusUser:null,
        link:null,
        active1:false,
        active2:false,
        active3:false,
      loading: false,
      errors:'',
      email:null,
            footer:false,
            namePaths:null,
            //  shortName: this.users.name.split(' ').map(x => x[0].toUpperCase()).join('')

        };

  },





    
        
    


   methods: {
 
       switchLang(event){
           localStorage.setItem('lang',event)
           location.reload();
       },
       Singlefillter(type,value){
             

                       this.$router.push({ name:'property',params:{
                           location:'all',
                           type:value,
                           bed:'all',
                           }
                        });
       },

       active(event){

           if(event=="tender"){
               if(this.active1==false){
                   this.active1=true;
                   this.active2=false;
                   this.active3=false;
               }else{
                     this.active1=false
               }
             
           }
                 if(event=="agents"){
               if(this.active2==false){
                     this.active1=false;
                   this.active2=true;
                   this.active3=false;

                   
               }else{
                     this.active2=false
               }
             
           }
                   if(event=="villa"){
               if(this.active3==false){
                     this.active1=false;
                   this.active2=false;
                   this.active3=true;
               }else{
                     this.active3=false
               }
             
           }
           
       },
       NextPage(event){
           if(event=='conculance'){

               this.$router.push({name:'agents',params:{type:'consulting'}} );

           }

              if(event=='construcion'){
                                 this.$router.push({name:'agents',params:{type:'construcion'}})
            console.log('construcion')
           }




       },
       OpenMenu(){

 $('#offcanvas-modal').modal('show');
                $('.modal-backdrop').css('display','block');
},
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




<style >
.unique a{
color:#fff !important; background:#fc7651 !important;
}

.image_villa{
    width:370px !important;  height:280px !important;
}

.nice-select {
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    border-radius: 5px;
    border: solid 1px #e8e8e8;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 15px;
    font-weight: normal;
    height: 42px;
    line-height: 27px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
    margin-bottom: 16px;
}

.nice-select:hover {
    border-color: #0779E4;
}

.nice-select:active,
.nice-select.open,
.nice-select:focus {
    border-color: #999;
}

.nice-select:after {
    border-bottom: 2px solid #252841;
    border-right: 2px solid #252841;
    content: '';
    display: block;
    height: 8px;
    margin-top: -4px;
    pointer-events: none;
    position: absolute;
    right: 12px;
    top: 50%;
    -webkit-transform-origin: 66% 66%;
    -ms-transform-origin: 66% 66%;
    transform-origin: 66% 66%;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
    width: 8px;
}

.nice-select.open:after {
    -webkit-transform: rotate(-135deg);
    -ms-transform: rotate(-135deg);
    transform: rotate(-135deg);
}

.nice-select.open .list {
    opacity: 1;
    pointer-events: auto;
    -webkit-transform: scale(1) translateY(0);
    -ms-transform: scale(1) translateY(0);
    transform: scale(1) translateY(0);
}

.nice-select.disabled {
    border-color: #ededed;
    color: #999;
    pointer-events: none;
}

.nice-select.disabled:after {
    border-color: #cccccc;
}

.nice-select.wide {
    width: 100%;
}

.nice-select.wide .list {
    left: 0 !important;
    right: 0 !important;
}

.nice-select.right {
    float: right;
}

.nice-select.right .list {
    left: auto;
    right: 0;
}

.nice-select.small {
    font-size: 12px;
    height: 36px;
    line-height: 34px;
}

.nice-select.small:after {
    height: 4px;
    width: 4px;
}

.nice-select.small .option {
    line-height: 34px;
    min-height: 34px;
}

.nice-select .list {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 0 1px rgba(68, 68, 68, 0.11);
    box-sizing: border-box;
    margin-top: 4px;
    opacity: 0;
    overflow: hidden;
    padding: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    left: 0;
    -webkit-transform-origin: 50% 0;
    -ms-transform-origin: 50% 0;
    transform-origin: 50% 0;
    -webkit-transform: scale(0.75) translateY(-21px);
    -ms-transform: scale(0.75) translateY(-21px);
    transform: scale(0.75) translateY(-21px);
    -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
    transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
    z-index: 9;
}

.nice-select .list:hover .option:not(:hover) {
    background-color: transparent !important;
}

.nice-select .option {
	cursor: pointer;
	font-weight: 400;
	line-height: 40px;
	list-style: none;
	min-height: 40px;
	outline: none;
	padding-left: 18px;
	padding-right: 29px;
	text-align: left;
	-webkit-transition: all 0.2s;
	transition: all 0.2s;
	display: inherit;
}

.nice-select .option:hover {
    background-color: #0779E4;
    color: #fff;
}

.nice-select .option.selected {
    font-weight: bold;
}

.nice-select .option.disabled {
    background-color: transparent;
    color: #999;
    cursor: default;
}

.no-csspointerevents .nice-select .list {
    display: none;
}

.no-csspointerevents .nice-select.open .list {
    display: block;
}

.contact-form-wrapper .list {
    background: #2f3341 none repeat scroll 0 0;
    border-radius: 0;
}
.item-center{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center
}
.call-action-inner {
    border: none;
    position: relative;
    overflow: hidden;
}

.p-btm-150 {
    padding: 150px;
    background: rgb(243, 243, 243);

}
.property-ratting-save a {
    color: #fff;
    cursor: pointer;
}
.property-ratting-save a:hover {
    color: #3454d1;
}
.file-style{
    border:2px dotted #eee;
    background: #fff;
    border-radius: 10px;

}

</style>

<style lang="scss" >

 

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
        background-color: #2343f8;

        &:after {
          display: block;
        }
      }
    }

    .check {
      position: absolute;
      top: 7px;
      height: 14px;
      width: 14px;
      background-color: white;
      border: 2px solid #2343f8;
      border-radius:5px;

      &:after {
        content: "";
        position: absolute;
        display: none;

        left: 3px;
        top: 1px;
        width: 4px;
        height: 7px;
        border: 3px solid white;
        border-width: 0 1.5px 1.5px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
    }
  }




</style>


<style >
/* @import '/./dist/css/reset.css'; */

@import '/./dist/css/reset.css';
@import '/./dist/css/responsive.css';

@import '/./assets/css/immolax.css';
@import '/./dist/css/maginific-popup.min.css';





/* @import 'vue-select/dist/vue-select.css'; */


</style>


