<template>
    <div>

<div >

<div v-if="users.email_verified_at!=null">

<div v-if="users.roles.name =='consulte'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">


<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">


         <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Dashboard'}">
             <img :src="'assets/img/dashboard.svg'" width="20" > <span class="font-weight-bold  ml-3"> Dashboard</span>
             </router-link>
              <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'profile'}">
             <img :src="'assets/img/avatar.svg'" width="20" > <span class="font-weight-bold  ml-3"> {{users.name}}</span>
             </router-link>
 <router-link :to="{name: 'Projects'}" class="list-group-item list-group-item-action bg-light">
     <i class="fa fa-cubes main-color" style="font-size:20px"></i>  <span class="font-weight-bold  ml-3">Projects</span>  </router-link>

     <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'constructionTender'}">
             <img :src="'assets/img/plus.svg'" width="20" > <span class="font-weight-bold  ml-3"> New Tender</span>
             </router-link>




          <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'mytenders'}">
             <img :src="'assets/img/tickets.svg'" width="20" > <span class="font-weight-bold  ml-3"> My Tender</span>
             </router-link>


         <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'MyOffer'}">
             <img :src="'assets/img/tag.svg'" width="20" > <span class="font-weight-bold  ml-3"> My ads</span>
             </router-link>

              <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Settings'}">
             <img :src="'assets/img/Settings.svg'" width="20" > <span class="font-weight-bold  ml-3">Settings</span>
             </router-link>

              <!-- <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'showAllOfferClient'}">
             <i class="fa fa-tag main-color" style="font-size:22px " ></i> <span class="font-weight-bold  ml-3">All offers</span>
             </router-link> -->

 <a class="list-group-item list-group-item-action bg-light" href="" @click="logout">     <i class="fa fa-power-off mr-1  main-color"></i>
 <span class="font-weight-bold  ml-3">Log out</span></a>




      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" v-if="users.roles.name !='admin'">


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <notification-bar></notification-bar>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>
              <li class="nav-item" v-if="isLoggedIn">



            </li>
              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

             <img src="https://www.bhsu.edu/directory/_files/images/no-image-directory.png" width="30" class="rounded-circle ">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.name"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>

                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>
<div v-if="users.roles.name =='Furnitur'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">

Furnitur
<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Dashboard'}">
             <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i> Dashboard
             </router-link>
              <button class="list-group-item list-group-item-action bg-light" @click="AdsToggle = !AdsToggle" v-if="users.roles.name !=='user'">My Ads </button>


         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'MyOffer'}">My Ads</router-link>

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Settings'}">Settings</router-link>



      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" >


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>
              <li class="nav-item" v-if="isLoggedIn">

          <router-link :to="{name: 'Projects'}" class="nav-link"> <i class="fa fa-cubes"></i> Projects  </router-link>

            </li>
              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <user-profile
     :name="users.name"
      >

                </user-profile>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.email"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>


                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>
<div v-if="users.roles.name =='Stone'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">
Stone

<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Dashboard'}">
             <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i> Dashboard
             </router-link>
              <button class="list-group-item list-group-item-action bg-light" @click="AdsToggle = !AdsToggle" v-if="users.roles.name !=='user'">My Ads </button>


         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'MyOffer'}">My Offer</router-link>
         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Settings'}">Settings</router-link>



      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" >


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>
              <li class="nav-item" v-if="isLoggedIn">

          <router-link :to="{name: 'Projects'}" class="nav-link"> <i class="fa fa-cubes"></i> Projects  </router-link>

            </li>
              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <user-profile
     :name="users.name"
      >

                </user-profile>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.email"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>

                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>
<div v-if="users.roles.name =='Havc'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">

Havc
<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Dashboard'}">
             <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i> Dashboard
             </router-link>
              <button class="list-group-item list-group-item-action bg-light" @click="AdsToggle = !AdsToggle" v-if="users.roles.name !=='user'">My Ads </button>

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'MyOffer'}">My Offer</router-link>
         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Settings'}">Settings</router-link>



      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" >


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>
              <li class="nav-item" v-if="isLoggedIn">

          <router-link :to="{name: 'Projects'}" class="nav-link"> <i class="fa fa-cubes"></i> Projects  </router-link>

            </li>
              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <user-profile
     :name="users.name"
      >

                </user-profile>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.email"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>

                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>
<div v-if="users.roles.name =='interior'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">
interior

<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Dashboard'}">
             <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i> Dashboard
             </router-link>
              <button class="list-group-item list-group-item-action bg-light" @click="AdsToggle = !AdsToggle" v-if="users.roles.name !=='user'">My Ads </button>
              <div :class="AdsToggle" class="ml-3">
         <router-link class="list-group-item list-group-item-action " :to="{name:'CoastVilla'}">
             <i class="fa fa-home fa-1x" aria-hidden="true"></i>
             villa with coast</router-link>

         <router-link class="list-group-item list-group-item-action " :to="{name:'FacedVilla'}"> <i class="fa fa-home fa-1x" aria-hidden="true"></i> Faced Villas </router-link>
</div>

         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'MyOffer'}">My Offer</router-link>
         <router-link class="list-group-item list-group-item-action bg-light" :to="{name:'Settings'}">Settings</router-link>



      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" >


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>
              <li class="nav-item" v-if="isLoggedIn">

          <router-link :to="{name: 'Projects'}" class="nav-link"> <i class="fa fa-cubes"></i> Projects  </router-link>

            </li>
              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <user-profile
     :name="users.name"
      >

                </user-profile>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.email"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>

                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>

<div v-if="users.roles.name =='construction'">
    <div v-if="users.company !== null">
  <div v-if="users.companyfile!==null">
      <div v-if="users.achivement_file!==null">


<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Dashboard'}">
             <img :src="'assets/img/dashboard.svg'" width="20" > <span class="font-weight-bold  ml-3"> Dashboard</span>
             </router-link>
             <router-link :to="{name: 'Projects'}" class="list-group-item list-group-item-action bg-light">
     <i class="fa fa-cubes main-color" style="font-size:20px"></i>  <span class="font-weight-bold  ml-3">Projects</span>  </router-link>



         <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'MyOffer'}">
             <i class="fa fa-tag main-color" style="font-size:22px " ></i> <span class="font-weight-bold  ml-3"> My offers</span>
             </router-link>
          <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Settings'}">
             <img :src="'assets/img/Settings.svg'" width="20" > <span class="font-weight-bold  ml-3">Settings</span>
             </router-link>

              <!-- <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'showAllOfferClient'}">
             <i class="fa fa-tag main-color" style="font-size:22px " ></i> <span class="font-weight-bold  ml-3">All offers</span>
             </router-link> -->

 <a class="list-group-item list-group-item-action bg-light" href="" @click="logout">     <i class="fa fa-power-off mr-1  main-color"></i>
 <span class="font-weight-bold  ml-3">Log out</span></a>
د



      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" >


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-bell text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active"  v-if="isLoggedIn">
              <a class="nav-link" href="#"><i class="fa fa-envelope text-light"></i> <span class="sr-only">(current)</span></a>
            </li>
             <span class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </span>
            <li class="nav-item" v-if="!isLoggedIn">

          <router-link :to="{name: 'Register'}" class="nav-link">Register</router-link>

            </li>

              <span class="nav-item" v-if="isLoggedIn">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <user-profile
     :name="users.name"
      >

                </user-profile>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">
                 <user-profile
     :name="users.email"
      >

                </user-profile>
                   </a>
                 <router-link class="dropdown-item" :to="{name:'profile'}"><i class="fa fa-user mr-1 "></i> profile</router-link>



                 <router-link class="dropdown-item" :to="{name:'Settings'}"><i class="fa fa-cog mr-1"></i> Settings</router-link>
                <div class="dropdown-divider"></div>

                 <a class="dropdown-item" href="" @click="logout">     <i class="fa fa-power-off mr-1"></i> Logout</a>
              </div>
            </li>
              </span>
          </ul>
        </div>
        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
  </div>
  <div v-else>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">File achivement </h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li class="active">licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<achive></achive>

  </div>
  </div>
  <div v-else>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 "> Upload licence </h2>
   <ul class="progressbar">
          <li class="active">Rigester</li>
          <li class="active">Complete Your Account</li>
          <li >licence Files</li>
          <li >achivement Files</li>

  </ul>




      </div>
<FileUpload></FileUpload>

  </div>
    </div>

    <div v-else>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
               <a class="nav-link text-light" href="" @click="logout"><i class="fa fa-power-off"></i>  Logout</a>
        </div>
      </nav>
      <div class="container text-center mt-5 mx-auto">
        <h2 class="text-center mb-4 ">Complete Your Account</h2>
      <ul class="progressbar">
          <li class="active">Rigester</li>
          <li>Complete Your Account</li>
          <li>Upload Files</li>
          <li >achivement Files</li>


  </ul>




      </div>
        <complete></complete>

    </div>



    </div>
 <div v-else-if="users.roles.name =='admin'">

            <Admin></Admin>
            <router-view></router-view>
                 <footer class="main-footer">
        <strong>
          Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0
        </div>
      </footer>
        </div>
    <div v-else-if="users.roles.name =='user'">


<div class="d-flex" id="wrapper" :class="{toggled : !toggled}" >

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" v-if="isLoggedIn">
      <div class="sidebar-heading">AMb</div>
      <div class="list-group list-group-flush">

         <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Dashboard'}">
             <img :src="'assets/img/dashboard.svg'" width="20" > <span class="font-weight-bold  ml-3"> Dashboard</span>
             </router-link>


             <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'tenders'}">
             <img :src="'assets/img/plus.svg'" width="20" > <span class="font-weight-bold  ml-3"> New Tender</span>
             </router-link>




          <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'mytenders'}">
             <img :src="'assets/img/tickets.svg'" width="20" > <span class="font-weight-bold  ml-3"> My Tender</span>
             </router-link>

          <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'showAllOfferClient'}">
             <i class="fa fa-tag main-color" style="font-size:22px " ></i> <span class="font-weight-bold  ml-3"> offers</span>
             </router-link>

              <router-link class="list-group-item list-group-item-action bg-light " :to="{name:'Settings'}">
             <img :src="'assets/img/Settings.svg'" width="20" > <span class="font-weight-bold  ml-3">Settings</span>
             </router-link>


      </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" v-if="users.roles.name !=='admin'">


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
          <div class="container">
        <button class="btn text-light" id="menu-toggle" @click="toggled = !toggled" v-if="isLoggedIn"><i class="fa fa-bars "></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        </div>
      </nav>

      <router-view>

        </router-view>

    </div>







</div>
        </div>


</div>
<div v-else-if="users.email_verified_at==null" class="container">
<a  href="" @click="logout" class="main-color font-weight-bold">     <i class="fa fa-power-off main-color  mt-3 mr-1"></i> Logout</a>
    <div class="card mt-5">
        <div class="card-header font-weight-bold text-center">
    email verification
  </div>

  <div class="card-body">
      <img :src="'assets/img/no-entry.svg'" width="80" class="d-block mx-auto">
      <h2 class="text-center">Verify Your Email </h2>

      <p class="text-center">{{users.email}}</p>


          <v-errors :errors="errorFor('email')"></v-errors>
    <div class="mx-auto">
    <button class="btn btn-bus mx-auto" style="display:table;" :disabled="loading" @click.prevent="reset(users.email)">Resend Email verification</button>
    </div>


</div>
  </div>

</div>
</div>






<div style="background: #fff">





                <nav class="nav">
                    <div class="container">
                        <div class="logo   ">
                        AMB <span class="main-color">TENDERS</span>
                        </div>
                        <div class="main_list" id="mainListDiv">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#offers">offers</a></li>

                                <li><a href="#how">How it works</a></li>
                                <li><a href="#Become-Partner">join us</a></li>

                                <li><a href="/register"  class="visible-xs">
                                    <span class="btn btn-grad text-light ">register


                                    </span></a></li>

                                <li><a href="/login" class="visible-xs">

                                    <span class="btn btn-dark">login
                                        <i class="fa fa-sign-in"></i>
                                    </span>
                                    </a></li>

                            </ul>
                        </div>
                        <div class="media_button">
                            <button class="main_media_button" id="mediaButton">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>



                        </div>

                    </div>
                </nav>

                <section class="home visible-xs" id="home">
                    <div class="text-center header-text">
                    <h2 class="text-uppercase font-weight-bold text-dark" > Build your home easily and quickly </h2>
                        <p class=" text-uppercase text-dark" style="font-size: 12px">Get the best companies to build your project</p>
                        <a href="#tenders" class="btn btn-grad text-light" style="padding:20px 50px;" ><b>GET START </b><i class="fa fa-long-arrow-right pl-4"></i> </a>
                    </div>




                </section>
<div>
                     <div class="container">
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img :src="'assets/img/ADS.jpg'" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img :src="'assets/img/ADS.jpg'" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img :src="'assets/img/ADS.jpg'" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>




</div>




<show-offers></show-offers>







  <!-- Modal -->
  <div class="modal fade" id="construction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">consurctions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
         Beatae assumenda vel quis nesciunt! Unde, facere. Vel sequi commodi vitae! Et doloribus error magni expedita nam consequatur quis architecto at explicabo!
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="consulte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Engineering consultances</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
         Beatae assumenda vel quis nesciunt! Unde, facere. Vel sequi commodi vitae! Et doloribus error magni expedita nam consequatur quis architecto at explicabo!
        </div>

      </div>
    </div>
  </div>
<section class="work-with-us ng-scope">



            <div class="container">
                <h2 class="section-heading">
                    Categories Tenders
                </h2>



                <div class="flex flex-wrap-centered">

                    <div class="col-md-8 col-lg-6 col-sm-12 work-col">
                        <div class="img-card">
                            <div class="img-section consulting">
                            </div>
                            <div class="details-section">
                                <div class="heading"> Engineering Consultancy </div>
                                <div class="card-desc">
                                    Join the dynamic team that makes it all happen
                                </div>
                                <a class=" main-color  float-right" data-toggle="modal" data-target="#consulte"> Explore <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-6 col-sm-12 work-col ">
                         <div class="img-card">
                             <div class="img-section construction"   style=" "></div>
                             <div class="details-section">
                                 <div class="heading"> consurction </div>
                                 <div class="card-desc">
                                     Reach more customers and achieve growth with us
                                 </div>
                                 <a class=" text-light float-right main-color " data-toggle="modal" data-target="#construction"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div><!-- end ngIf: model.country.id !== 2 -->


                 </div>



                <div class="flex flex-wrap-centered">



                    <div class="col-md-8 col-lg-6 col-sm-12 work-col ">
                         <div class="img-card">
                             <div class="img-section  decoration">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> Interior decoration </div>
                                 <div class="card-desc">
                                     Reach more customers and achieve growth with us
                                 </div>
                                 <a class=" text-light float-right main-color " data-toggle="modal" data-target="#construction"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div><!-- end ngIf: model.country.id !== 2 -->

                     <div class="col-md-8 col-lg-6 col-sm-12 work-col">
                         <div class="img-card">
                             <div class="img-section havc">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> HVAC companies </div>
                                 <div class="card-desc">
                                     Join the dynamic team that makes it all happen
                                 </div>
                                 <a class=" main-color  float-right" data-toggle="modal" data-target="#consulte"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>




                <div class="flex flex-wrap-centered">



                    <div class="col-md-8 col-lg-6 col-sm-12 work-col ">
                         <div class="img-card">
                             <div class="img-section stone ">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> Stone companies </div>
                                 <div class="card-desc">
                                     Reach more customers and achieve growth with us
                                 </div>
                                 <a class=" text-light float-right main-color " data-toggle="modal" data-target="#construction"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div><!-- end ngIf: model.country.id !== 2 -->

                     <div class="col-md-8 col-lg-6 col-sm-12 work-col">
                         <div class="img-card">
                             <div class="img-section furniture  ">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> Furniture </div>
                                 <div class="card-desc">
                                     Join the dynamic team that makes it all happen
                                 </div>
                                 <a class=" main-color  float-right" data-toggle="modal" data-target="#consulte"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>



                <div class="flex flex-wrap-centered">



                    <div class="col-md-8 col-lg-6 col-sm-12 work-col ">
                         <div class="img-card">
                             <div class="img-section swimming">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> swimming pool </div>
                                 <div class="card-desc">
                                     Reach more customers and achieve growth with us
                                 </div>
                                 <a class=" text-light float-right main-color " data-toggle="modal" data-target="#construction"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div><!-- end ngIf: model.country.id !== 2 -->

                     <div class="col-md-8 col-lg-6 col-sm-12 work-col">
                         <div class="img-card">
                             <div class="img-section garden">
                             </div>
                             <div class="details-section">
                                 <div class="heading"> Oragnazition garden </div>
                                 <div class="card-desc">
                                     Join the dynamic team that makes it all happen
                                 </div>
                                 <a class=" main-color  float-right" data-toggle="modal" data-target="#consulte"> Explore <i class="fa fa-arrow-right"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>




            </div>



</section>



    <h1 class="text-center text-weight-bold main-color mt-5" id="how"><b>how it work</b></h1>
    <div class="how_it_work mt-5" style="position: relative">

            <div class="row mt-5">
                <div class="col-md-6 col-sm-12" >
                    <div class="">
                    <img :src="'assets/img/phonebg.png'" class="img-fluid mx-auto d-block" width="80%" style="position: absolute;bottom:0">
                    </div>

                </div>
                <div class="col-md-6 col-sm-12 steps" >

                   <h1 class="h4 main-color mt-5"> <i class="fa fa-check-circle"></i> Add Project </h1>

            <p class="text-muted">Add the details of your project and the skills required to complete it and start receiving companies' offers </p>

            <h1 class="h4 main-color"> <i class="fa fa-check-circle"></i> Choose the right offer </h1>

            <p class="text-muted">
                Among the proposals submitted for your project, choose the proposal that best suits the
                 requirements of the project and then start the implementation phase.

            </p>

            <h1 class="h4 main-color"> <i class="fa fa-check-circle"></i> Add Project </h1>

            <p class="text-muted">Add the details of your
                project and the skills required to complete it and start receiving companies' offers </p>



                </div>

            </div>



    </div>


    <section class="area-seaction mt-5 mb-5" id="Become-Partner">
         <div class="container">

                     <h1 class="text-center "><b class="main-color" >
           join us

            </b></h1>
        <p class="text-center">

          Be a part of the Amb story
        </p>


        <div class="row">
            <div class="col-md-6 text-center">
                    <div class="mx-auto bus-icon mt-5 mb-2">
                    <i class="fa fa-briefcase fa-2x text-light"></i>
                    </div>
                    <h1 class=" h3 font-weight-bold">
                     Become Partner
                    </h1>
                    <p class="text-muted">
                        Reach more customers and achieve growth with us
                    </p>
                        <a  href="/partner" class="btn btn-bus    text-light" style="padding:20px 50px; " target="_blank">

                        <span class="font-weight-bold"> Join Us</span>

                        </a>



            </div>


            <div class="col-md-6 text-center">
                <div class="mx-auto user-icon mt-5 mb-2">
                <i class="fa fa-user fa-2x text-light"></i>
                </div>
                <h1 class=" h3 font-weight-bold">
                    Build your Design
                </h1>
                <p class="text-muted">
                    Join the dynamic team that makes it all happen
                </p>
                    <a  href="/register" class="btn btn-user text-light" style="padding:20px 50px;">

                    <span class="font-weight-bold">    Add Tender</span>

                    </a>



        </div>


        </div>
         </div>

    </section>



<div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Collapsible Group Item #1
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Collapsible Group Item #2
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Some placeholder content for the second accordion panel. This panel is hidden by default.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Collapsible Group Item #3
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
        </div>
      </div>
    </div>
  </div>

</div>


<footer></footer>
    </div>
    </div>
</template>
