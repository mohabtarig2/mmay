<template>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">

      <!-- Default box -->
      <div class="">
        <div class="card-body pb-0" >
          <div class="row" >
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column"  v-for="user , index in users.data" :key="index">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  data create : {{user.added_at}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{user.name}}</b></h2>
                      <p class="badge badge-danger" v-if="user.email_verified_at==null"><b>Not Verfied </b> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> email: {{user.email}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{user.mobile}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center" v-if="user.avatar==''">
                      <img src="dist/img/AdminLTELogo.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                    <div class="col-5 text-center" v-else>
                      <img :src="user.avatar" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <router-link :to="{name:'HvacProfile',params:{id:user.id}}" class="btn btn-sm get-start">
                      <i class="fas fa-user"></i> View Profile
                    </router-link>
                  </div>
                </div>
              </div>
            </div>





            </div>
          </div>
        </div>
        <!-- /.card-body -->
<div class="card-footer">
<pagination :data="users" @pagination-change-page="getUsers"></pagination>
</div>


        <!-- /.card-footer -->

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
data(){
    return{
        users:null,
    }
},
methods: {
    getUsers(page =1 ){

        axios.get('getUsers/'+4+'?page='+page).then(res=>{
            this.users=res.data;
        })
    },
    },
    created(){
            this.getUsers();
    }

}
</script>
