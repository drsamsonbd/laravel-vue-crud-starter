  

<template>
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <section class="content">  


 <hr>
   <div class="container-fluid">
 <div class="row">
   <div class="col-lg-12 mb-4">
  
  <!--Insert Modal-->
      <!--category-->
    <b-modal ref="category-insert-modal" hide-footer title="Tetapan">
    
            <form class="user" @submit.prevent="categoryInsert">
              <b-row>
                  <b-col>
                      <label>Wad</label>
                        <select class="form-control" id="district" v-model="form.ward_id" required>
                        <option v-for="ward in wards" v-bind:key="ward.id"  v-bind:value="ward.id">{{ward.ward }} </option>
                        
                        </select>
                    </b-col>
                <b-col>
                  <label for=""><b>Katil</b></label>
              <input type="number" min="1" class="form-control"  placeholder="Sila nombor katil" v-model="form.bed_number" required>
               
                </b-col>
            </b-row>
            
                      <br>
               <b-row>
                <b-col>
                  <label for=""><b>Kod</b></label>
              <input type="text" class="form-control"  placeholder="Kod Panggilan" v-model="form.bed_code" required>
             
                </b-col>
            <b-col>
                      <label>Kelas</label>
                        <select class="form-control" id="district" v-model="form.bed_class" required>
                        <option value="1"  >1 </option>
                        <option value="2"  >2 </option>
                        <option value="3"  >3 </option>
                        </select>
                    </b-col>
            </b-row>
                            <br>
               <b-row>
                <b-col>
      
                  <label for=""><b>Catatan</b></label>
              <input type="text" class="form-control"  placeholder="" v-model="form.notes" >
 
                </b-col>
            </b-row>
                      <br>
            <b-row>
              <b-col>
            <b-button type="submit" id="insert-btn" class="btn-outline btn-primary btn-block">Simpan</b-button>
              </b-col>
            </b-row>
              
        
      </form>      
               
          
      </b-modal>
 
  <!--Update Modal-->
  <div>
  <!--category-->
  <b-modal ref="update-modal" hide-footer title="Kemaskini Kod Peruntukan">     
           <form class="user" @submit.prevent="categoryUpdate">
        <b-row> 
                  <b-col>
                      <label>Wad</label>
                        <select class="form-control" id="district" v-model="forms.ward_id" required>
                        <option v-for="ward in wards" v-bind:key="ward.id" v-bind:value="ward.id" >{{ward.ward }} </option>
                        
                        </select>
                    </b-col>
                <b-col>
                  <label for=""><b>Katil</b></label>
              <input type="number" min="1" class="form-control"  placeholder="Sila nombor katil" v-model="forms.bed_number" required>
               
                </b-col>
            </b-row>
            
                      <br>
               <b-row>
                <b-col>
                  <label for=""><b>Kod</b></label>
              <input type="text" class="form-control"  placeholder="Kod Panggilan" v-model="forms.bed_code" required>
             
                </b-col>
                 <b-col>
                      <label>Kelas</label>
                        <select class="form-control" id="district" v-model="forms.bed_class" required>
                        <option value="1"  >1 </option>
                        <option value="2"  >2 </option>
                        <option value="3"  >3 </option>
                        </select>
                    </b-col>
            </b-row>
                            <br>
               <b-row>
                <b-col>
      
                  <label for=""><b>Catatan</b></label>
              <input type="text" class="form-control"  placeholder="" v-model="forms.notes" >
 
                </b-col>
            </b-row> <br>
            <b-row>
              <b-col>
            <b-button type="submit" id="update-btn" class="btn-outline btn-primary btn-block">Kemaskini</b-button>
              </b-col>
            </b-row>
          
      </form>
           
   </b-modal>


   </div>



 
<!--kategori table-->


<b-row>
   <div class="col">
              <!-- Simple Tables -->
              <div class="card">
    <b-col class="shadow-sm  bg-white">
           <caption><h5><b>Katil</b></h5></caption>  
 
      <b-row>
       <b-col sm="3" class="my-1">
  
        <b-button pill size="sm" variant="outline-secondary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i>&nbsp;Tambah</b-button>
        </b-col>
        <b-col sm="6" class="my-1">
        <b-form-group
          label=""
          label-for="categoryfilter-input"
          label-cols-sm="0"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="categoryfilter-input"
              v-model="categoryfilter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>

            <b-input-group-append>
              <b-button :disabled="!categoryfilter" @click="categoryfilter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
       </b-col>

        <b-col sm="3"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
            v-model="categoryperPage"
            :options="categorypageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
        </b-col>

   
      </b-row>

      <b-table head-variant
      :items="categoryitems"
      :fields="categoryfields"
      :current-page="categorycurrentPage"
      :per-page="categoryperPage"
      :filter="categoryfilter"
      :filter-included-fields="categoryfilterOn"
      :sort-by.sync="categorysortBy"
      :sort-desc.sync="categorysortDesc"
      :sort-direction="categorysortDirection"
      stacked="md"
      show-empty
      small
    
        >
        <template #cell(index)="data">
            {{ data.index + 1 }}
        </template>
        <template #cell(categoryitems)="row">
            {{ row.value.first }} {{ row.value.last }}
        </template>

        <template #cell(actions)="row">
            <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1" v-b-tooltip.hover title="Edit">
           <i class="fas fa-edit"></i>
            </b-button>
            <b-button size="sm" class="
            
            
            btn btn-sm btn-danger" @click="deleteCategory(row.item.id)" v-b-tooltip.hover title="Delete">
            <i class="fas fa-trash-alt"></i>
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
               
                       

                    
                
                   <p class="mt-6" align="center" style="font-size:0.8em;">Current Page: {{ categorycurrentPage }} | Total Data: {{ categoryrows }}</p>
                      <b-pagination
                      v-model="categorycurrentPage"
                      :total-rows="categoryrows"
                      :per-page="categoryperPage"
                      aria-controls="category-table"
                      style="sm"
                      align="center"
                    ></b-pagination>

              </b-col>

   </div>
   
   
    </div>
    </b-row>
          </div>
 
  </div>       
  </div>
 </section>
  </div>
</template>



<script type="text/javascript">
 
 


  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'});

   

      }
    },
   mounted(){ 
    this.allCategory();
    this.ward();
  
    },
  
    
  	
  
   
     data(){
      return{
          wards:[],
          form:{
          ward_id: null,
          bed_number: null,
          bed_code: null,
          bed_class: null,
          notes: null,
          
      
        },
          forms:{          
               ward_id: null,
          bed_number: null,
          bed_code: null,
                bed_class: null,
          notes: null,
      
        },
        errors:{},     
        
        itemize: [
          {
            text: 'Tetapan',
            href: '/'
          },         
           {
            text: 'Katil',
            active: true
          },
        ],
          modalShow: false,
//category
        categoryperPage: 15,
        categorycurrentPage: 1,
        categorypageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        categorysortBy: 'bed',
        categorysortDesc: false,
        categorysortDirection: 'asc',
        categoryfilter: null,
        categoryfilterOn: [],
        categoryitems: [],
        categoryfields: [
          { key: 'ward', label: 'Wad', sortable: true, sortDirection: 'asc' },
          { key: 'bed_code', label: 'Kod', sortable: true, sortDirection: 'asc' },
          { key: 'bed_number', label: 'Nombor Katil', sortable: true, sortDirection: 'asc' },
           { key: 'bed_class', label: 'Kelas', sortable: true, sortDirection: 'asc' },
          { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'asc' },
          { key: 'actions', label: '' },

        ],

  
   
      }
 





    },
    computed:{
    
      categoryrows() {
        return this.categoryitems.length
      },
      
    },
 
  methods:{

 //all   
    allCategory(){
    let self = this;
     axios.get('/api/wardbed/'+ '?token='+ localStorage.getItem('token'))
      .then(function (response) {
        self.categoryitems = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

         ward(){
    let self = this;
     axios.get('/api/ward'+'?token='+  localStorage.getItem('token'))
      .then(function (response) {
        self.wards = response.data;
      })
    },


//delete

       deleteCategory(id){
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
                axios.delete('/api/bed/'+id+ '?token='+ localStorage.getItem('token'))
               .then(() => {
                this.allCategory();
                      
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



// show insert modal

      showModal() {
        this.$refs['category-insert-modal'].show()
      },


       hideModal() {
        this.$refs['update-modal'].hide()
      },
 // show update modal
       toggleModal(id) {
         axios.get('/api/bed/'+id+ '?token='+ localStorage.getItem('token'))
  	    .then(({data}) => (this.forms = data))
        this.$refs['update-modal'].toggle('#toggle-btn')       
      },
      
   
  	    
 //insert  
       categoryInsert(){
       axios.post('/api/bed'+ '?token='+ localStorage.getItem('token'),this.form)
       .then(() => { 
       this.$refs['category-insert-modal'].hide('#insert-btn')  
         this.allCategory();
        Notification.success()
       })
          .catch(error=> this.errors = error.response.data.errors)
      
        },

 
 //update       
     categoryUpdate(){
  	  let id = this.forms.id
       axios.patch('/api/bed/'+id+ '?token='+ localStorage.getItem('token'),this.forms)
       .then(() => { 
         this.$refs['update-modal'].hide('#update-btn')
         this.allCategory();
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },

   
  }
  
  }
   
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>