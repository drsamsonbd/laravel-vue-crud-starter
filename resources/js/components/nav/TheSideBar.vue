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

       
     
      <li  class="nav-item has-treeview"   v-if="roles=='admin'">
        <a class="nav-link" href="#">
          <i class="nav-icon fas fa-user-cog yellow"></i>
          <p>Pentadbir
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/user" class="nav-link">
            
              <p id="submenu">
                Pengguna
              </p>
            </router-link>
          </li>
          <li class="nav-item">
         <router-link to="/department" class="nav-link">
              <p id="submenu">
                Jabatan
              </p>
            </router-link>
          </li>
        </ul>
      </li>

        <li  class="nav-item has-treeview"  v-if="roles=='admin'||'hospital'">
        <a class="nav-link" href="#">
          <i class="nav-icon fas fa-scroll "></i>
          <p>Laporan
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/nursingreport" class="nav-link">
             
              <p id="submenu">
                Nursing
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/dailyreport" class="nav-link">
           
              <p id="submenu">
                PKRC
              </p>
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview"  v-if="roles=='hospital'||'admin'" >
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Tetapan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/race" class="nav-link">
              <p id="submenu">
                Bangsa
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/area" class="nav-link">
              <p id="submenu">
                Mukim
              </p>
            </router-link>
          </li>
          
            <li class="nav-item">
              <router-link to="/district" class="nav-link">
                  
                  <p id="submenu">
                   Daerah
                  </p>
              </router-link>
            </li>
              <li class="nav-item">
              <router-link to="/nationality" class="nav-link">
                 
                  <p id="submenu">
                   Warganegara
                  </p>
              </router-link>
            </li>
                 <li class="nav-item">
              <router-link to="/locality" class="nav-link">
                  
                  <p id="submenu">
                     Lokaliti
                  </p>
              </router-link>
            </li>

                 
            <li class="nav-item">
              <router-link to="/hospital" class="nav-link">
                 
                  <p id="submenu">
                      Hospital
                  </p>
              </router-link>
            </li>
       
            <li class="nav-item">
              <router-link to="/pkrc" class="nav-link">
                  
                  <p id="submenu">
                   PKRC
                  </p>
              </router-link>
            </li>
               <li class="nav-item">
              <router-link to="/vaccine" class="nav-link">
                
                  <p id="submenu">
                   Vaksin
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
<style>
#submenu{
  margin-left: 40px;
  color: rgb(168, 208, 218);
   font-style: italic;

}
</style>