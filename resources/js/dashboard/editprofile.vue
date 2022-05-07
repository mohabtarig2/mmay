

<template>
<div class="container">



<div  v-if="IsUser!=10">


<div class="mx-auto align-items-center" >

<div class="p-descrip-box card-body" v-for="file,index in data" :key="index" style="font-size:20px">
    <!-- <a href="#editPostModal" class="edit text-muted text-right d-block" data-toggle="modal" >
        <i class="fa fa-edit"
                  data-toggle="tooltip"
                  title="Edit"
                  @click="editPost(file,$event)"></i>

     </a> -->
    <h1 class="text-center font-weight-bold " style="font-size:2rem">Edit Profile </h1>

<div class="alert alert-success" v-if="success!=null">{{success}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="" >

  <ul class="list-group list-group-flush">


    <div class="list-group-item form-group">
         <span class="h5 mb-5">Company name <sup> (arabic)</sup> </span>
        <input class="pr-5 mt-2 form-control " required type="text" name="company_ar" :value="file.company_ar" :class="[{'is-invalid': errorFor('company_ar')}]" >
            <div  class="invalid-feedback" v-for="(error, index) in errorFor('company_ar')" :key="'company_ar' + index" >{{ error }}</div>




        </div>




    <div class="list-group-item mt-2 form-group">


         <span class="h5 mb-5">Company name <sup> (english)</sup> </span>
        <input class="pr-5 mt-2 form-control" name="company_en" :value="file.company_en" :class="[{'is-invalid': errorFor('company_en')}]">
                    <div  class="invalid-feedback" v-for="(error, index) in errorFor('company_en')" :key="'company_en' + index" >{{ error }}</div>



            </div>

            <li class="list-group-item mt-3 form-group">


         <span class="h5 mb-5">manager  name <sup> (arabic)</sup> </span>
        <input class="pr-5 mt-3 form-control" name="manager_ar" :value="file.manager_ar" :class="[{'is-invalid': errorFor('manager_ar')}]">
            <div  class="invalid-feedback" v-for="(error, index) in errorFor('manager_ar')" :key="'manager_ar' + index" >{{ error }}</div>


            </li>

             <li class="list-group-item mt-3 form-group">


         <span class="h5 mb-5">manager  name <sup> (english)</sup> </span>

        <input class="pr-5 mt-3 form-control" type="text" name="manager_en"  :value="file.manager_en" :class="[{'is-invalid': errorFor('manager_en')}]">
                    <div  class="invalid-feedback" v-for="(error, index) in errorFor('manager_en')" :key="'manager_en' + index" >{{ error }}</div>



            </li>

            <li class="list-group-item mt-3 form-group">
                <span class="h5 mb-5">about Us </span>
                <textarea  :value="file.about_us"  name="about_us" class="form-control" :class="[{'is-invalid': errorFor('about_us')}]">


                </textarea>
                   <div  class="invalid-feedback" v-for="(error, index) in errorFor('about_us')" :key="'about_us' + index" >{{ error }}</div>
            </li>

            <button @click="savedata()" class="btn btn-bus" :disabled="disabled">save</button>



  </ul>
</div>


</div>
</div>

</div>

<v v-else>
<div class="card card-body">
    <!-- <a href="#editPostModal" class="edit text-muted text-right d-block" data-toggle="modal" >
        <i class="fa fa-edit"
                  data-toggle="tooltip"
                  title="Edit"
                  @click="editPost(file,$event)"></i>

     </a> -->
    <h1 class="text-center font-weight-bold " style="font-size:2rem">Edit Profile </h1>


<div class="" >

  <ul class="list-group list-group-flush">


    <div class="list-group-item form-group">
         <span class="h5 mb-5">full name <sup></sup> </span>
        <input class="pr-5 mt-2 form-control " required type="text" name="name" :value="Currentuser.name" :class="[{'is-invalid': errorFor('name')}]" >
            <div  class="invalid-feedback" v-for="(error, index) in errorFor('name')" :key="'name' + index" >{{ error }}</div>




        </div>




    <div class="list-group-item mt-2 form-group">


         <span class="h5 mb-5">Email  </span>
        <input class="pr-5 mt-2 form-control" name="email" :value="Currentuser.email"  :class="[{'is-invalid': errorFor('email')}]">
                    <div  class="invalid-feedback" v-for="(error, index) in errorFor('email')" :key="'email' + index" >{{ error }}</div>



            </div>

    <div class="list-group-item mt-2 form-group">


         <span class="h5 mb-5">mobile <sup> </sup> </span>
        <input class="pr-5 mt-2 form-control" name="mobile" :value="Currentuser.mobile" :class="[{'is-invalid': errorFor('mobile')}]">
                    <div  class="invalid-feedback" v-for="(error, index) in errorFor('mobile')" :key="'mobile' + index" >{{ error }}</div>



            </div>

<div class="alert alert-success" v-if="success!=null">{{success}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
            <button @click="usersavedata()" class="theme-btn" :disabled="disabled">save</button>



  </ul>
</div>


</div>
</v>

</div>




</template>

<script>
import { mapState, mapGetters } from "vuex";
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";



export default {
  components: {  ValidationErrors },
    mixins:[validationErrors],

data() {

    return {

      password:null,
      loading: false,
      success:null,
      errors:null,
       status:null,
    //    disabled:false,
      data:'',

        //   about_us:null,
        //   company_ar:'hi',
        //   company_en:null,
        //   manager_en:null,
        //   manager_ar:null,
        //   phone:null,


    };

  },


  created(){
this.getdata();
  },

   methods: {
        editPost(data) {
      this.$store.commit("EditPost",data);
    },


  getdata(){


     axios.get(`gatdatacompany`).then(response=>{
        this.data = response.data;

});
  },

    usersavedata(){

 let name = document.querySelector("input[name=name]").value

         let email = document.querySelector("input[name=email]").value

         let mobile = document.querySelector("input[name=mobile]").value

          let datas = new FormData();

      datas.append("name", name);
      datas.append("email", email);
      datas.append("mobile", mobile);

       axios.post(`savedatauser`,datas).then(response=>{
    this.success= response.data.success;

       }).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       });
    },

    savedata(){

        let company_ar = document.querySelector("input[name=company_ar]").value
        console.log(company_ar)
         let company_en = document.querySelector("input[name=company_en]").value
        console.log(company_en)
         let manager_ar = document.querySelector("input[name=manager_ar]").value
        console.log(manager_ar)
         let manager_en = document.querySelector("input[name=manager_en]").value
        console.log(manager_en)
          let about_us = document.querySelector("textarea[name=about_us]").value
        console.log(about_us)

 let datas = new FormData();

      datas.append("company_ar", company_ar);
      datas.append("company_en", company_en);
      datas.append("manager_ar", manager_ar);
      datas.append("manager_en", manager_en);
      datas.append("about_us", about_us);

//  this.disabled=true;
   axios.post(`savedatacompany`,datas).then(response=>{



  this.data = response.data;


                // console.log(error.response.data.errors);
              this.success= response.data.success;

// this.disabled=false

        //location.reload();


}).catch(error=>{
            if(422===error.response.status){
                // console.log(error.response.data.errors);
                this.errors=error.response.data.errors
            }
            this.status=error.response.status
       });
  },
  errorFor(field){
        return this.hasErrors && this.errors[field] ? this.errors[field] :null;
    },
   },
    computed: {
        hasErrors() {
        return 422 === this.status && this.errors !== null;
    },
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),
  PostToEdit() {
      return this.$store.getters.PostToEdit;
    },
     IsUser(){
            return this.$store.getters.IsUser
        },
        Currentuser(){
             return this.$store.getters.user;
        }
  },
};



</script>

<style scoped>
*{
font-size: 14px;
}

.btn-bus {background-image: linear-gradient(to right, #EB3349 0%, #F45C43  51%, #EB3349  100%)}
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
