

<template>
<div v-if="!isadminLoggedIn"  class="centeral ">


<form class="c-form-inner" style="width:500px">

<div class="p-descrip-box">
   <div class="h3 text-center ">لوحة دخول  المدير </div>
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
           <!-- <v-errors :errors="errorFor('password')"></v-errors> -->
           <div class="alert alert-danger mt-2" v-if="errors!=''">{{$t('errors')}} </div> 

        </div>
        <!-- <a class="text-muted font-weight-bold forgot-your-password mt-3 mb-3 mr-2 float-right" href="/password/reset">

                                               Forgot Your Password?



                                            </a> -->

        <button type="submit" class=" btn btn-download d-bloc mx-auto btn-lg" :disabled="loading || 
        email==null || password==null " @click="login">
        {{loading==false?
            'دخول'
              :
            '... انتظر'
            }}
        </button>

        <!-- <p class=" container mt-5 mx-auto text-center font-weight-bold">Don't have an account? <a href="/register" class="main-color"> Create an account</a></p> -->

 </form>
</div>
</form>

</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import { logAdminIn } from "./../shared/utils/auth";




export default {
  components: {  ValidationErrors },
    mixins:[validationErrors],

data() {

    return {
      email: null,
      password:null,
      loading: false,
      errors:''

    };

  },
  mounted() {

           

             
                // $('.header-inner').removeClass('d-none');
                $('.header-inner').addClass('d-none');
        },
  computed: {
    ...mapState({

      isadminLoggedIn: "isAdminLoggedIn",

    }),
    ...mapGetters({

    }),

  },
   methods: {
        ifAdminLogin(){
          if(this.isadminLoggedIn==true){
            this.$router.push({ name: "admin" });

          }
        },
        
    async login() {
      this.loading = true;
      this.errors = '';
      
      

         await axios.get("/sanctum/csrf-cookie");
       await axios.post("/checkAdminLogin", {email: this.email,password: this.password}).then((response) => {
      logAdminIn();
        this.$store.dispatch("loadAdmin");
        this.$store.dispatch("loadStoredAdminState");

        
       this.$router.push({ name: "admin" })

      })
      .catch((error) => {
        this.errors = error.response.data.erorrs  

      });
this.loading=false;

       


    
    }
  },
  created() {
      this.ifAdminLogin();

      
           

             
                $('.header-inner').addClass('d-none');
                // $('.header-inner').addClass('d-block');
      
  },
};


</script>

<style scoped>

.centeral {
   margin: auto;
   justify-content: center;
  display: flex;
  align-items: center
}
.c-form-inner{
  background: #fff;
}
</style>
