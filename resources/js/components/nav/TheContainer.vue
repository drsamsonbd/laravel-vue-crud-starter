<template>
<div>
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" v-show="$route.path === '/login' ? false : true ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/dashboard" class="brand-link">
      <img v-bind:src="('/images/hblnlogov2.png')"  alt="The Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> {{APPNAME}}</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
        <router-link to="/profile">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- Photo -->
         <!--<div class="image">
                <img src="{{ auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
              </div>-->
              <div class="info" >

            <div id='User'><span   class="text-white small"><b>{{user}} </b> </span> </div>
                  <span class="d-block text-muted">
                 {{roles}}
                  </span>
              </div>
          </div>
        </router-link>

      <!-- Sidebar Menu -->
       <vue-navbar ></vue-navbar>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Main content -->
    


    <!-- Main content -->
    <router-view></router-view>
    
   
    <vue-progress-bar></vue-progress-bar>

    <!-- /.content -->

  <!-- /.content-wrapper -->
</div>
  <!-- Main Footer -->
  <vue-footer></vue-footer>
 
</div>
<!--/wrapper -->


</template>

<script>


export default {
  created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
  },

         data(){
         return{
         roles: '',
         user: localStorage.getItem('user'),
         logohbln:'',
         APPNAME: 'CPRC HBLN',
    

      }
         },

        methods: {
       
    userRoles() {
        let self = this;
        axios.post('/api/auth/me' + '?token='+ localStorage.getItem('token'))
        .then(({data}) => (self.roles = data.roles)).catch(function (error) {
        console.log(error);    
          localStorage.removeItem('token');
           localStorage.removeItem('user');
         self.$router.push({ path: '/login' });
      });
    }

  
    },
 

  mounted(){
    this.userRoles();

  }
}
         



</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.User {
  overflow-wrap: break-word;
}
</style>