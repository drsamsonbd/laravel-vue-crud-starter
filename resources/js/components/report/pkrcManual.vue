  

<template v-for="table">
  <section class="content"> 
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <b-modal ref="my-modal" size="xl" hide-footer title="Laporan PKRC">
    
           <form class="user" @submit.prevent="register">
                  
                      <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="form.date">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="form.time">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>

                           <b-col>
                      <label>PKRC</label>
                      <select class="form-control" id="pkrc" v-model="form.pkrc">
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                   </b-col>
                     </b-row>
                        
 <hr>

               <div class="form-group row">
                   <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Penjaga </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="form.carer">
                         <small class="text-danger" v-if="errors.carer">{{errors.carer[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <code>*</code> <b>Bilangan Staf Bertugas </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.staff">
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>
    </div>
   

  </div> <hr>
              
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--userUpdate Modal-->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Laporan">     
          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     </div>
                                  <div class="form-group row">
                   <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Penjaga </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.carer">
                         <small class="text-danger" v-if="errors.carer">{{errors.carer[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> <code>*</code> <b>Bilangan Staf Bertugas </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.staff">
      
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>
    </div>
   

  </div> <hr>
              
                    <div class="form-group">
                      <label> <code>*</code>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="forms.notes"></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
   </div>
<!--userUpdate Modal-->
  
 


 </div>
 </div>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian PKRC</h6>
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

      <b-table  responsive 
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
     
      flex 
      striped 
      hover
      @row-clicked="viewModal"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-user-edit"></i>
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
          </div>
          <!--Row-->

  </section>
</template>



<script type="text/javascript">
 
  export default {
      created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})

    
      }
  
      let token = localStorage.getItem('token');
    if(!token){
      this.$router.push({name: '/'})
      }
    },
      
     mounted(){


        this.allPatient();

        this.area(),
        this.pkrc();
      },

      
     data(){
      return{

          pkrcs:[],
          areas:[], 
          form:{
date: null, 
time: null, 
pkrc: null, 
carer: null, 
staff: null, 
notes: null, 
          
        },
          forms:{
date: null, 
time: null, 
pkrc: null, 
carer: null, 
staff: null, 
notes: null, 
      
        },
 
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/'
          },
          {
            text: 'Laporan',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
     sortBy: 'date',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'asc' },
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'desc' },
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
         { key: 'carer', label: 'Penjaga', sortable: true, sortDirection: 'desc' },
       
         {  key: 'staff', label: 'Staf', sortable: true, sortDirection: 'desc' },
        { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'desc' },
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
      allPatient(){
    let self = this;
     axios.get('/api/reports/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       area(){
    let self = this;
     axios.get('/api/area/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.areas = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       pkrc(){
    let self = this;
     axios.get('/api/pkrc/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.pkrcs = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

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
                    axios.delete('/api/reports/'+id)
                  .then(() => {
                    window.location.reload()
                
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
         axios.get('/api/reports/'+id+ '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    
   
       register(){
          axios.post('/api/reports'+ '?token='+ localStorage.getItem('token'), this.form)
          .then(() => {
            this.$refs['my-modal'].hide()
            this.allPatient();
              Toast.fire({
              icon: 'success',
              title: 'Laporan telah dihantar!'
                  })
         })
        .catch(()=>{
            Toast.fire({
              icon: 'warning',
              title: 'Pastikan tarikh dan masa telah diisi!'
            });
              })
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/reports/'+id+ '?token='+ localStorage.getItem('token'), this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/reports/'+ '?token='+ localStorage.getItem('token'))
       .then(function (response) {
        self.items = response.data;
        })
            this.$refs['edit-modal'].hide(); 
            this.allPatient();
          Toast.fire(
                      'Berjaya!',
                      'Telah dikemaskini.',
                      'success'
                    )
    
       })
    
     },



 },
  }   
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>