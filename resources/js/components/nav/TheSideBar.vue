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

       
     
      <li  class="nav-item has-treeview"   v-if="roles.includes('admin') ">
        <a class="nav-link" >
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
      <!--Pesakit Dalam-->
        <li  class="nav-item has-treeview"  v-if="roles.includes('superadmin')    || roles.includes('hospital') "  >
        <a class="nav-link" >
          <i class="nav-icon fas fa-h-square purple "></i>
          <p>WAD
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/inpatientactive" class="nav-link">
             
              <p id="submenu">
                Bed Manager
              </p>
            </router-link>
          </li>
      <!--    <li class="nav-item">
            <router-link to="/inpatientadmission" class="nav-link">
           
              <p id="submenu">
                Senarai 
              </p>
            </router-link>
          </li>
           <li class="nav-item">
            <router-link to="/inpatientdischarge" class="nav-link">
           
              <p id="submenu">
                Discaj
              </p>
            </router-link>
          </li>-->
               <li class="nav-item">
            <router-link to="/InpatientnewPatient" class="nav-link">
           
              <p id="submenu">
                Pesakit Baru
              </p>
            </router-link>
          </li>
              <li class="nav-item">
            <router-link to="/inpatientsearch" class="nav-link">
           
              <p id="submenu">
                Carian
              </p>
            </router-link>
          </li>
            <li class="nav-item">
            <router-link to="/inpatientCensus" class="nav-link">
           
              <p id="submenu">
                Census Harian
              </p>
            </router-link>
          </li>
                    <li class="nav-item">
            <router-link to="/inpatientdischargelist" class="nav-link">
           
              <p id="submenu">
                Senarai Discaj
              </p>
            </router-link>
          </li>
        </ul>
      </li> 
  <!--    PKRC --->
        <li  class="nav-item has-treeview" v-if="roles.includes('superadmin')    || roles.includes('pkrc') " >
        <a class="nav-link" >
          <i class="nav-icon fas fa-school pink"></i>
          <p>PKRC
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/active" class="nav-link">
             
              <p id="submenu">
                Bed Manager
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admission" class="nav-link">
           
              <p id="submenu">
                Senarai 
              </p>
            </router-link>
          </li>
           <li class="nav-item">
            <router-link to="/discharge" class="nav-link">
           
              <p id="submenu">
                Discaj
              </p>
            </router-link>
          </li>
               <li class="nav-item">
            <router-link to="/newPatient" class="nav-link">
           
              <p id="submenu">
                Pesakit Baru
              </p>
            </router-link>
          </li>
              <li class="nav-item">
            <router-link to="#" class="nav-link">
           
              <p id="submenu">
                Carian
              </p>
            </router-link>
          </li>
       <li  class="nav-item has-treeview" >
        <a class="nav-link" >
          <p  id="submenu"><b>LAPORAN</b>
           <i class="right fas fa-angle-left"></i>
           </p>
         </a>
    
           <ul class="nav nav-treeview">
            <li class="nav-item">
            <router-link to="/pkrcReport" class="nav-link">
           
              <p id="submenu">
                Census
              </p>
            </router-link>
          </li>
               <li class="nav-item">
            <router-link  to="/pkrcManual" class="nav-link">
           
              <p id="submenu">
                PKRC
              </p>
            </router-link>
          </li>
           </ul>
       </li>
        </ul>
      </li> 
     <!--LAPORAN-->
        <li  class="nav-item has-treeview" v-if="roles.includes('superadmin')    || roles.includes('hospital') " >
        <a class="nav-link" >
          <i class="nav-icon fas fa-clipboard "></i>
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
            <router-link to="/NursingCensus" class="nav-link">
             
              <p id="submenu">
                Nursing Census
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/pkrcManual" class="nav-link">
           
              <p id="submenu">
                PKRC
              </p>
            </router-link>
          </li>
       <li  class="nav-item has-treeview"  v-if="roles.includes('superadmin')    || roles.includes('hospital') " >
        <a class="nav-link" >
          <i class="nav-icon fas fa-chart-bar "></i>
          <p>Census
           <i class="right fas fa-angle-left"></i>
           </p>
         </a>
    
           <ul class="nav nav-treeview">
            <li class="nav-item">
            <router-link to="/InpatientReport" class="nav-link">
           
              <p id="submenu">
                Pesakit Dalam
              </p>
            </router-link>
          </li>
               <li class="nav-item">
            <router-link to="/pkrcReport" class="nav-link">
           
              <p id="submenu">
                PKRC
              </p>
            </router-link>
          </li>
           </ul>
       </li>
        </ul>
      </li> 

      <!-- TETAPAN -->
      <li class="nav-item has-treeview"  v-if=" roles.includes('superadmin')    ||roles.includes('pkrc')    || roles.includes('hospital') "  >
        <a  class="nav-link">
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
               <li class="nav-item">
              <router-link to="/ward" class="nav-link">
                
                  <p id="submenu">
                   Wad
                  </p>
              </router-link>
            </li>    
                <li class="nav-item">
              <router-link to="/bed" class="nav-link">
                
                  <p id="submenu">
                   Katil
                  </p>
              </router-link>
            </li> 
                     <li class="nav-item">
              <router-link to="/discipline" class="nav-link">
                
                  <p id="submenu">
                   Disiplin
                  </p>
              </router-link>
            </li>      
        </ul>
      </li>

<!--JKNS VIEW-->
           <!--Pesakit Dalam-->
        <li  class="nav-item has-treeview"  v-if="roles.includes('jkns')    || roles.includes('kesihatan')  || roles.includes('admin')" >
        <a class="nav-link" >
          <i class="nav-icon fas fa-h-square purple "></i>
          <p>WAD
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/jkns/inpatient/active" class="nav-link">
           
              <p id="submenu">
                Senarai Aktif
              </p>
            </router-link>
          </li>
           <li class="nav-item">
            <router-link to="/jkns/inpatient/discharge" class="nav-link">
           
              <p id="submenu">
               Senarai Discaj
              </p>
            </router-link>
          </li>

        </ul>
      </li> 
      <!--PKRC-->
        <li  class="nav-item has-treeview"  v-if="roles.includes('jkns')    || roles.includes('kesihatan')     || roles.includes('admin')" >
        <a class="nav-link" >
          <i class="nav-icon fas fa-school pink"></i>
          <p>PKRC
           <i class="right fas fa-angle-left"></i>
           </p>
        </a>
    
           <ul class="nav nav-treeview">
          <li class="nav-item">
            <router-link to="/jkns/pkrc/active"  class="nav-link">
           
              <p id="submenu">
                Senarai 
              </p>
            </router-link>
          </li>
           <li class="nav-item">
            <router-link to="/jkns/pkrc/discharge"  class="nav-link">
           
              <p id="submenu">
                Discaj
              </p>
            </router-link>
          </li>


            <li class="nav-item">
            <router-link to="/pkrcReport" class="nav-link">
           
              <p id="submenu">
                Census
              </p>
            </router-link>
                      </li>

          
   
        </ul>
      </li> 
<!-- jkns end-->

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
       roles: '',
       current_team_id:'',
    }
  },
  methods: {

    userRoles() {
        let self = this;
        axios.post('/api/auth/me'+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (self.roles = data.roles, self.current_team_id = data.current_team_id))
        
        .catch(function (error) {
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