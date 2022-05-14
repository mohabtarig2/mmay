

<template>


  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Offers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Offers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          id
                      </th>
                      <th style="width: 20%">
                           title
                      </th>
                      <th style="width: 30%">
                          added by
                      </th>
                      <th>
                          Poster
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                          control
                      </th>
                  </tr>
              </thead>
              <tbody>






                  <tr v-for="(data,index) in details.data" :key="index">
                      <td>
                          {{data.id}}
                      </td>
                      <td>
                          <a>
                              {{data.title}}
                          </a>
                          <br/>
                          <small >

                          </small>
                      </td>
                      <td>
                             Created {{data.added_at}}

                      </td>



<td>
         <ul class="list-inline">
                             <div class="post">
                      <div class="user-block" li v-for="user , index in data.company" :key="index" >
                        <img class="img-circle img-bordered-sm" :src="user.avatar" alt="user image">

                        <span class="username" >
                          <a href="text-dark">
 {{user.name}}
                    </a>
                        </span>

                      </div>
                      <!-- /.user-block -->

                    </div>

                          </ul>
</td>

                         <td class="project-state" >
                          <status :status="data.status"></status>
                      </td>

                      <td class="project-actions text-right">

                          <router-link class="btn btn-primary btn-sm" :to="{name:'AdminOfferConsluteDetails',params: { id: data.id }}" target="_blank">


                              <i class="fas fa-folder">
                              </i>
                              View
                          </router-link>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>

              </tbody>
          </table>
    <div class="card"> <pagination :data="details" @pagination-change-page="detailsTender"></pagination></div>
        </div>
        <!-- /.card-body -->

      </div>

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</template>

<script>

import Status from './status.vue';
export default {
    components: {Status},
    data(){

        return{
            details:'',
        }
    },
    created(){
        this.detailsTender();
    },
    methods: {
            detailsTender(page =1){
                axios.get('/admin/detailsTenderOfferVilla?page=' + page).then(res=>{
                    this.details = res.data;
                })
            },
          /*  ShowTender(){
              $('.success-modal').modal('show');
                $('.modal-backdrop').css('display','show');
            }
            */
    },
}
</script>



<style scoped>
  .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
</style>
