  

<template v-for="table">
 <section class="content">


 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 mb-4">
   

    <b-modal ref="my-modal" hide-footer title="Daftar Pengguna">
    
           <form class="user" @submit.prevent="register">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="form.name">
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>            
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" v-model="form.email" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder="Alamat email rasmi"> 
                      <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                    </div>
                     <div class="form-group">
                      <label>Nombor K/P</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.ic">
                         <small class="text-danger" v-if="errors.ic">{{errors.ic[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                   <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputPasswordRepeat" placeholder="Confirm Password" v-model="form.password_confirmation">
                         <small class="text-danger" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</small>
                    </div>
                  
                   <div class="form-group">
                      <label>Role(s):</label>
                     
                        <input type="text" class="form-control" placeholder="Roles: admin, finance, head, user" v-model="form.roles">
                     
                    </div>
                        
                  <div class="form-group">
                      <label>Jabatan:</label>
                      <select class="form-control" id="Jabatan" v-model="form.current_team_id">
                        <option v-for="department in departments "   v-bind:key="department.id" :value="department.id"> {{department.name_department}}</option>
                        
                        </select>
                     
                    </div>
                     
                 
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Daftar</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" hide-footer title="Kemaskini Pengguna">     
          <form class="user" @submit.prevent="userUpdate"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                    <div class="form-group">
                      <label>Nama Penuh</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama penuh" v-model="forms.name">
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>            
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Alamat email" v-model="forms.email">
                         <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                    </div>
                     <div class="form-group">
                      <label>IC Number</label>
                      <input type="text" class="form-control" id="InputIC" aria-describedby="IClHelp"
                        placeholder="Nombor Kad Pengenalan" v-model="forms.ic">
                         <small class="text-danger" v-if="errors.ic">{{errors.ic[0]}}</small>
                    </div>              
                    <div class="form-group">
                      <label>Role(s):</label>
                     
                        <input type="text" class="form-control" v-model="forms.roles">
                     
                    </div>

                    <div class="form-group">
                      <label>Jabatan:</label>
                      <select class="form-control" id="Jabatan" v-model="forms.current_team_id">
                        <option v-for="department in departments "   v-bind:key="department.id" :value="department.id"> {{department.name_department}}</option>
                        
                        </select>
                     
                    </div>
                    <div class="form-group">
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" @click="UpdateUser(user.id)">Kemaskini</button>
               
                    </div>
               
                  </form> 
   </b-modal>
   </div>
<!--userUpdate Modal-->



  <!--userReset Modal-->
  <div>
  <b-modal ref="reset-modal" hide-footer title="Tetapkan semula kata laluan">     
          <form class="user" @submit.prevent="ResetUser"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="text" class="form-control" id="exampleInputID" placeholder="ID" v-model="formr.id">
                     
                    </div>  
                    <div class="form-group">
                      <label></label>
                      <input type="text"  class="form-control border-0"  id="exampleInputFirstName" placeholder="Enter Full Name" v-model="formr.name">
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>            
                  
                      <div class="form-group" >
                      <label> &nbsp;&nbsp; Ada pasti?</label>
                       </div>      

                     <div class="form-group" hidden >
                      <label>IC Number</label>
                      <input type="text" class="form-control" id="InputIC" aria-describedby="IClHelp"
                        placeholder="IC No" v-model="formr.ic">
                    </div>              
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" >Tetapkan semula</button>
               
                    </div>
               
                  </form> 
   </b-modal>
   </div>
<!--userReset Modal-->

 </div>
 </div>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Senarai Pengguna</h6>
                </div>


<b-row>
   <b-col sm="1" class="my-1" align="right">
           <b-button size="sm" variant="outline-primary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i></b-button>
        </b-col>
        <b-col sm="6" class="my-1">
        <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Carian"
            ></b-form-input>

            <b-input-group-append>
              <b-button variant="outline-secondary" :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col sm="4"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="6"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
             v-model="perPage"
            :options="pageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
      </b-col>

   
    </b-row>

      <b-table  
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
 
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.ic }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-user-edit"></i>
        </b-button>
        <b-button size="sm" id="toggle-btnreset" class="btn btn-sm btn-success" @click="toggleModal2(row.item.id)">
         <i class="fas fa-key"></i>
        </b-button>
        <b-button size="sm" class="btn btn-sm btn-danger" @click="deleteUser(row.item.id)">
         <i class="fas fa-user-times"></i>
        </b-button>
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
                </div>
               <div class="card-footer">
                   <p class="mt-3"  align="center">Current Page: {{ currentPage }}</p>
                      <b-pagination  align="center"
                      v-model="currentPage"
                      :total-rows="rows"
                      :per-page="perPage"
                      
                       last-number
                      aria-controls="my-table"
                    ></b-pagination>
                </div>
              </div>
            </div>
          
 </section>
          <!--Row-->


</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/login'})

    
      }
  
    },
      
     mounted(){
        this.getRoles();
        this.allUser();
        this.allDept();    
      },

      
     data(){
      return{
        departments:[],
        users:[],
        wards:[],
        searchTerm:'',
        
          form:{
          name: null,
          email: null,
          ic: null,
          password: null,
          current_team_id: null,
          roles: null,
      
        },
          forms:{
          name: null,
          email: null,
          ic: null,
          roles: null,
          current_team_id: null,
        },
        formr:{
       
          ic: null,
         
        },
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/home'
          },
          {
            text: 'Pengguna',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'name',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'ic', label: 'No. Kad Pengenalan', sortable: true, sortDirection: 'desc' },
          { key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
          { key: 'roles', label: 'Roles', sortable: true, sortDirection: 'desc' },
          { key: 'name_department', label: 'Team', sortable: true, sortDirection: 'desc' },
          { key: 'actions', label: 'Actions' },
        ],
        table:'',
      }
 





    },
    computed:{
      filtersearch(){
      return this.users.filter(user => {
         return user.name.match(this.searchTerm)
      }) 
      },
      rows() {
        return this.items.length
      }
    },
 
  methods:{
      allDept(){
    let self = this;
     axios.get('/api/department/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.departments = response.data;
      }).catch(function (error) {
        console.log(error);
       Notification.unauthorized() 
      });
    },


    allUser(){
    let self = this;
     axios.get('/api/user/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
       self.$router.push({ path: '/login' });
      });
    }
    ,
      deleteUser(id){
                Swal.fire({
                  title: 'Anda pasti?',
                  text: "Tindakan ini memadamkan data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Teruskan'
                }).then((result) => {
                  if (result.value) {
                    axios.delete('/api/user/'+id + '?token='+ localStorage.getItem('token'))
                  .then(() => {
                    window.location.reload()
                    this.users = this.users.filter(user => {
                      return user.id != id
                    })
                  })
                  .catch(() => {
                  
                  })
                    Swal.fire(
                      'Deleted!',
                      'Telah dipadamkan.',
                      'success'
                    )
                  }
                })

      },
           
      showModal() {
        this.$refs['my-modal'].show()
      },
       hideModal() {
        this.$refs['edit-modal'].hide()



        
      },
       toggleModal(id) {
         axios.get('/api/user/'+id + '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
      toggleModal2(id) {
         axios.get('/api/user/'+id + '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.formr = data))
        this.$refs['reset-modal'].toggle('#toggle-btnreset')
       
      },
   
       register(){
          axios.post('/api/auth/register'+ '?token='+ localStorage.getItem('token'), this.form)
          .then(() => {
        window.location.reload()
        Notification.success()
         })
          .catch(()=> {
        
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            });
          })
        },
      userUpdate(){
       let id = this.forms.id
       axios.patch('/api/user/'+id + '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/user/')
       .then(function (response) {
        self.items = response.data;
        })
        this.$refs['edit-modal'].hide(); 
            this.allUser();
          Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    )
    
       })
       
     },
       ResetUser(){
       let id = this.formr.id
       axios.post('/api/password/update/'+id + '?token='+ localStorage.getItem('token'), this.formr)
       .then(() => {

        this.$refs['reset-modal'].hide()
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },
         getRoles(){
       let roles = axios.get('/api/auth/me/roles/'+ '?token='+ localStorage.getItem('token'));
      if(roles == "admin"){
      this.$router.push({name: 'home'})
      Notification.unauthorized() };
    }
   
   
  },


  }   
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>