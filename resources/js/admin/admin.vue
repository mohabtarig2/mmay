<template>
<div>
 <div>

    <div class=" " v-show="$route.name!=='home'" >
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">

        <img
          class="animation__shake"
          src="dist/img/AdminLTELogo.png"
          alt="AdminLTELogo"
          height="60"
          width="60"
        />
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
        <!-- Left navbar links -->
        <div class="container-fluid">
        <ul class="navbar-nav " >
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
              <i class="fas fa-bars"></i>
            </a>
          </li>
           <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" @click="logAdminout" style="cursor:pointer">     <i class="fa fa-power-off mr-1"></i> Logout</a>
        </li>


          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
        </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input
                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="dist/img/user1-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 mr-3 img-circle"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger">
                        <i class="fas fa-star"></i>
                      </span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="dist/img/user8-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted">
                        <i class="fas fa-star"></i>
                      </span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    src="dist/img/user3-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 img-circle mr-3"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning">
                        <i class="fas fa-star"></i>
                      </span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{notificationlist.length}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">{{notificationlist.length}} Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-bell            mr-2"></i> {{notificationlist.length}} new Notifications
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>


              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>

             <router-link :to="{name:'notificationsAdmin'}" class="dropdown-item dropdown-footer">See All Notifications</router-link>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              data-widget="control-sidebar"
              data-slide="true"
              href="#"
              role="button"
            >
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
          />
          <span class="brand-text font-weight-light">Amb Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
              <a href="#" class="d-block">{{admin.name}}</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
                <li class="nav-header font-wieght-bold ">Tenders</li>
              <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library-->
              <li class="nav-item menu-open">
                <router-link :to="{name:'adminDashboard'}" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </router-link>

              </li>

              <!-- <li class="nav-item" :class="{ 'menu-is-opening menu-open': isActive}"  @click="myFilter('consulte')"> -->
              <li class="nav-item"  @click="myFilter('consulte')">
                <router-link :to="{name:'ConsluteTender'}" class="nav-link">

                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Tender Consulte
                    <i class="consulte fas fa-angle-left right"></i>
                    <span class="badge badge-info right">{{data.AllTendersConsulate}}</span>
                  </p>

                </router-link>

                <ul class="nav nav-treeview" >
                <!-- <ul class="nav nav-treeview" :class="{ 'd-block': isActive}"> -->
                  <li class="nav-item">
<a href="pages/layout/top-nav.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>completed</p>
                    <span class="badge badge-success right">{{data.ConsluteComplete}}</span>

                    </a>
                  </li>

                   <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Open</p>
 <span class="badge badge-success right">{{data.ConsluteOpen}}</span>

                    </a>
                  </li>

                      <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Under Review</p>
 <span class="badge badge-warning right">{{data.ConsluteReview}}</span>

                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                      <i class="far fa-circle text-light nav-icon"></i>
                      <p>Draft</p>
 <span class="badge badge-light right">{{data.ConsluteDraft}}</span>

                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                      <i class="far text-warning fa-circle nav-icon"></i>
                     <p>Under Executed</p>
 <span class="badge badge-primary right">{{data.ConsluteExcuted}}</span>
                    </a>
                  </li>

                      <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                      <i class="far fa-circle  text-secondary nav-icon"></i>
                     <p>Closed</p>
 <span class="badge badge-secondary right">{{data.ConsluteClosed}}</span>
                    </a>
                  </li>



                </ul>
              </li>
              <li class="nav-item">
               <router-link :to="{name:'ConsrTender'}" class="nav-link">
                  <i class="nav-icon fas fa-hard-hat"></i>
                  <p>
                    Constructions

                    <i class="right fas fa-angle-left"></i>
                     <span class="badge badge-info right">{{data.AllTenderConsr}}</span>


                  </p>
               </router-link>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/charts/chartjs.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>ChartJS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/charts/flot.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Flot</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/charts/inline.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inline</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/charts/uplot.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>uPlot</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <router-link :to="{name:'HvacTender'}" class="nav-link">
                  <i class="nav-icon fas fa-fan"></i>
                  <p>
                      Hvac Tender
                  <i class="right fas fa-angle-left"></i>
                     <span class="badge badge-info right">{{data.AllTenderhvac}}</span>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </router-link>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/UI/general.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>General</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/icons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Icons</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/buttons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Buttons</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/sliders.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sliders</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/modals.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Modals & Alerts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/navbar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Navbar & Tabs</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/timeline.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Timeline</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/UI/ribbons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Ribbons</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                                <router-link :to="{name:'tenderStone'}" class="nav-link">
                  <i class="nav-icon fas fa-dungeon"></i>
                  <p>
                    Stone
                             <i class="right fas fa-angle-left"></i>
                     <span class="badge badge-info right">{{data.AllTenderstone}}</span>
                  </p>
                                </router-link>

              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-pen-nib"></i>
                  <p>
                    Interior Desgin
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>

              </li>
              <li class="nav-header">Offers  </li>
              <li class="nav-item">


                    <router-link :to="{name:'AdminConsultingOffer'}" class="nav-link">

                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                    Consulting offers
                    <span class="badge badge-info right">2</span>
                  </p>
                    </router-link>
              </li>
                <li class="nav-item">


                    <router-link :to="{name:'ConstructionsAdminAds'}" class="nav-link">

                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                    constructions offers
                    <span class="badge badge-info right">2</span>
                  </p>
                    </router-link>
              </li>
               <li class="nav-header">subscribes  </li>

      <li class="nav-item">
                <router-link :to="{name:'admins'}" class="nav-link">
                  <i class="nav-icon fas fa-hard-hat"></i>
                  <p>
                   Admins

                    <i class="fas fa-angle-left right"></i>
 <span class="badge badge-info right">{{data.countAdmin}}</span>

                  </p>
                </router-link>

              </li>
                <li class="nav-item">
                <router-link :to="{name:'users'}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                   Users

                    <i class="fas fa-angle-left right"></i>
 <span class="badge badge-info right">{{data.user}}</span>

                  </p>
                </router-link>

              </li>
              <li class="nav-item">
                <router-link :to="{name:'AdminConstruction'}" class="nav-link">
                  <i class="nav-icon fas fa-hard-hat"></i>
                  <p>
                   Constructions

                    <i class="fas fa-angle-left right"></i>
 <span class="badge badge-info right">{{data.Construction}}</span>

                  </p>
                </router-link>

              </li>
              <li class="nav-item">
                <router-link :to="{name:'AdminConsulte'}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Consulting


            <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">{{data.Consulte}}</span>
                  </p>
                </router-link>

              </li>
                 <li class="nav-item">
               <router-link :to="{name:'AdminStone'}" class="nav-link">
                  <i class="nav-icon fas fa-columns"></i>
                  <p> Stones
  <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right">{{data.countStone}}</span>
                  </p>


               </router-link>
              </li>
              <li class="nav-item">
                  <router-link :to="{name:'AdminHvac'}" class="nav-link">
                  <i class="nav-icon fas fa-search"></i>
                  <p>
                    Hvac

                    <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right">{{data.countHvac}}</span>

                  </p>
                  </router-link>

              </li>
              <li class="nav-header">MISCELLANEOUS</li>
              <li class="nav-item">
                <a href="iframe.html" class="nav-link">
                  <i class="nav-icon fas fa-ellipsis-h"></i>
                  <p>Tabbed IFrame Plugin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Documentation</p>
                </a>
              </li>
              <li class="nav-header">MULTI LEVEL EXAMPLE</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Level 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Level 2
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-dot-circle nav-icon"></i>
                          <p>Level 3</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level 2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Level 1</p>
                </a>
              </li>
              <li class="nav-header">LABELS</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Important</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Warning</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Informational</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->

      <!-- /.content-wrapper -->


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>

      <router-view></router-view>
      <!-- /.control-sidebar -->
</div>
  </div>
</div>

</template>

<script>
import { mapState, mapGetters } from "vuex";
import AdminDashboard from './AdminDashboard.vue';
export default {
  components: { AdminDashboard },


    data(){
        return{
            data:null,
            isActive:false

        }
    },
      mounted() {

           

             
                // $('.header-inner').removeClass('d-none');
                $('.header-inner').addClass('d-none');
        },
   computed: {
    ...mapState({

    isAdminLoggedIn: "isAdminLoggedIn"
    }),
    ...mapGetters({

    }),
    IsAdmin(){
            return this.$store.getters.IsAdmin
        },
         admin(){
            return this.$store.getters.admin
        },
         notificationlist(){
        return this.$store.state.notificationAdminlist;

    }
    },
   beforeCreate() {

        // this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadStoredAdminState");

        // this.$store.dispatch("loadUser");
        this.$store.dispatch("loadAdmin");


    },
    created(){
        this.logoHide();
        this.ifNotLogin();
        this.GeTCounter();

     this.getUnreadNotificatons();
    },

  methods: {

      myFilter(even){
          if(even=="consulte"){
              this.isActive = !this.isActive;
              if(this.isActive ==true){
                $('.consulte.fa-angle-left ').css('transform','rotate(-90deg)');
                $('.nav-sidebar .nav-item>.nav-link .right').css('transition','ease-in-out .3s,');
              }

               if(this.isActive ==false){
                $('.fa-angle-left ').css('transform','none');
              }



          }

      },
      ifNotLogin(){
          if(this.isAdminLoggedIn==false){
            this.$router.push({ name: "adminLogin" });

          }

      },
      GeTCounter(){
          axios.get('CounterOfTenders').then(res=>{
              this.data = res.data;
          })

      },
        logAdminout() {
      try {

        axios.post("admin/logout");

        this.$store.dispatch("logAdminout");
      } catch (error) {
        this.$store.dispatch("logAdminout");
      }
         location.reload();
    },
    logoHide() {
      setInterval(function () { $('.preloader ').css('display','none');}, 3000);
    },
    getUnreadNotificatons(){
            axios.get('/AdmingetLastTenNotifications').then(res=>{
                console.log(res.data);
               this.$store.state.notificationAdminlist = res.data;

            }).catch(err=>{
                console.log(err);
            })

}
}

}


</script>

<style scoped >
/* @import '/dist/css/adminlte.css'; */
@import '/assets/css/adminlite.css';


 a.router-link-exact-active{
        background-color: #007bff !important;
    color: #fff;
}


.dropdown-item {
    line-height: 2.5 !important;
    font-weight: bold !important;
}
.navbar a:hover {
    color: #e43a15;
    text-decoration: none;
}
</style>
