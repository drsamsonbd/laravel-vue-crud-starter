<template> 
<nav  id="sidebar" class="mt-2" >
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <router-link to="/home" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt blue"></i>
          <p>
            Dashboard
          </p>
        </router-link>
      </li>

      <li  class="nav-item has-treeview"   v-if="roles==='admin'">
        <a class="nav-link" href="#">
          <i class="nav-icon fas fa-user-cog"></i>
          <p>Pentadbir
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/user" class="nav-link">
              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                Pengguna
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/department" class="nav-link">
              <i class="nav-icon fas fa-tags green"></i>
              <p>
                Jabatan
              </p>
            </router-link>
          </li>
        </ul>
      </li>
     
      <li class="nav-item has-treeview"    v-if="roles==='admin'">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Settings
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/product/category" class="nav-link">
              <i class="nav-icon fas fa-list-ol green"></i>
              <p>
                Category
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/product/tag" class="nav-link">
              <i class="nav-icon fas fa-tags green"></i>
              <p>
                Tags
              </p>
            </router-link>
          </li>
          
            <li class="nav-item">
              <router-link to="/developer" class="nav-link">
                  <i class="nav-icon fas fa-cogs white"></i>
                  <p>
                      Developer
                  </p>
              </router-link>
            </li>
        </ul>
      </li>

      <li class="nav-item" v-show="$route.path === '/login' ? false : true ">
              <router-link to="/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt white"></i>
                  <p>
                      Logout
                  </p>
              </router-link>
        </li>
      
 
    </ul>
  </nav>
</template>
<script>

export default {

  data() {
    return{
       roles:'',
    }
  },
  methods: {

    userRoles() {
        let self = this;
        axios.get('/api/auth/me/roles/'+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (self.roles = data.roles)).catch(function (error) {
        console.log(error); 

      });    
     
      },

      
      
      
  },
  

  mounted(){
    this.userRoles();

   
  }

}
</script>