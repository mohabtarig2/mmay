

<template>

<div v-if="!isLoggedIn" style="width:500px " class="mt-5">



<!-- <div class="d-flex w-100 mx-auto align-items-center" >

<div class="card card-body">
    <h1 class="text-center font-weight-bold " style="font-size:2rem">تسجيل دخول </h1>
    <form >


        <div class="form-group">

            <input type="text"
             name="email"
             placeholder="ادخل البريد الاكتروني"
              class="form-control"
              v-model="email"
             :class="[{'is-invalid': errorFor('email')},{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
          <v-errors :errors="errorFor('mobile')"></v-errors>

        </div>
        <div class="form-group">

            <input type="password"
             name="password"
             placeholder="إدخل كلمة السر"
              class="form-control"
              v-model="password"
             :class="[{'is-invalid': errorFor('password')}]"
          />
           <v-errors :errors="errorFor('password')"></v-errors>

        </div>
        <a class="text-muted font-weight-bold forgot-your-password mt-3 mb-3 mr-2 float-right" href="/password/reset">

                                               Forgot Your Password?



                                            </a>

        <button type="submit" class="btn get-start d-bloc mx-auto btn-lg" :disabled="loading" @click="login">دخول</button>

        <p class=" container mt-5 mx-auto text-center font-weight-bold">Don't have an account? <a href="/register" class="main-color"> Create an account</a></p>

 </form>
</div>
</div> -->
	<!-- Login Area -->
	<section class="login-area">
		<div class="login-area-bg" style="background-image:url('img/login-bg.jpg');"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-auto">
					<!-- Login Inner -->
					<div class="login-inner" data-aos="fade-right" data-aos-delay="200">
				
						<div class="login-form">
							<h1 class="login-form-title">Log <span>In</span></h1>

                            <div class="text-center alert alert-success" v-show="$route.query.redirect" >
                                        غير مصرح لك دخول هذه الصفحة عليك تسجيل الدخول اولاَ
                            </div>
							<form  class="login-form-inner">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
							<input name="email" class="form-control" type="email" placeholder="Email Address" v-model="email"
             :class="[{'is-invalid': errorFor('email')},{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
          <v-errors :errors="errorFor('mobile')" class="d-block"></v-errors>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input name="password" class="form-control" type="password" placeholder="Password"
                                             v-model="password"
             :class="[{'is-invalid': errorFor('password')}]"
          />
           <v-errors :errors="errorFor('password')"></v-errors>

										</div>
									</div>
									<div class="col-12">
										<div class="login-bottom-content login-c">
											<div class="login-c-left">
												<span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">Remember Me</span>
											</div>
											<div class="login-c-right">
												<a href="signup.html">Forgot Account?</a>
                        <div class="login-c-right">
												<p class="m-0">Don’t have an account? <router-link :to="{name:'Register'}">register</router-link></p>
											</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="login-form-btn">
											<button class="theme-btn" :disabled="loading" @click="login">Log In</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Login Inner -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Login Area -->
</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import { logIn } from "./../shared/utils/auth";
import navbar from './navbar.vue';



export default {
  components: { navbar, ValidationErrors },
    mixins:[validationErrors],

data() {

    return {
      email: null,
      password:null,
      loading: false,
      errors:'',
      linkPath : this.$route.query.redirect

    };

  },
  computed: {

     user_ID(){
                return this.$store.getters.userid
    },
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  },
      mounted() {

            this.getUnreadNotificatons();

                $('.header-inner').addClass('d-none');
                $('.footer-area').addClass('d-none');
  
        },
   methods: {
    async login() {
      this.loading = true;
      this.errors = null;
      try {

         await axios.get("/sanctum/csrf-cookie");
       await axios.post("login", {
                 identify: this.email,
                  password: this.password


        });


        logIn();
        this.$store.dispatch("loadUser");
        this.$store.dispatch("loadStoredState");


       this.$router.push(this.$route.query.redirect || '/');


        // location.reload()
      } catch (error) {

        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    }
  },

};


</script>

<style scoped>

.btn-bus {background-color:#1E5DA8}
.btn-bus {
   margin: 10px;
   padding: 12px 20px!important;
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
   text-decoration: none;
 }


.btn-user {background-image: linear-gradient(to right, #FF8008 0%, #FFC837  51%, #FF8008  100%)}
.btn-user {
   margin: 10px;
   padding: 15px 45px;
   text-align: center;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
   border-radius: 10px;
   display: block;
 }

 .btn-user:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }


</style>
