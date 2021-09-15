  

<template v-for="table">
 <section class="content"> 
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <header>Discaj</header>
    
          <form class="user" @submit.prevent="discaj"  ref="data" > 
                    <div class="form-group" >
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="Name" v-model="form.name" 
                      disabled>
                     </b-col>
                        <b-col>
                      <label>RN</label>
                        <input type="text" class="form-control" id="ICnumber" v-model="form.reg_number" disabled >
                  </b-col>
                    <b-col>
                      <label>Nombor K/P atau Passport</label>
                       <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>
                  </b-col>
                      </b-row>
                      <b-row>
                            <b-col>
                      <label>Tarikh Keluar Ward</label>
                      <input type="date" class="form-control" id="datedc" v-model="form.date_dc">
                         <small class="text-danger" v-if="errors.date_dc">{{errors.date_dc[0]}}</small>
                   </b-col>
                     <b-col>
                       <label>Masa Tinggal (Hari)</label>
                      <input type="number" class="form-control" id="duration" v-model="form.duration">
                         <small class="text-danger" v-if="errors.duration">{{errors.duration[0]}}</small>
                   </b-col>
                   <b-col>
                      <label>Jenis Discaj</label>
                        <select class="form-control" id="type dc" v-model="form.type_dc">                  
                        <option >Balik ke Rumah</option>
                        <option >Ditukar ke Hospital Lain</option>
                        <option >Mati</option>
                        <option >Keluar Hospital dengan Risiko Sendiri</option>
                        <option >Keluar Hospital Tanpa Kebenaran</option>
                        <option >Home Quarantine</option>
                        <option >Step Down PKRC</option>
                        </select>
                    </b-col>
                  
                    </b-row>
                  <b-row>
                     <b-col>
                      <label>Diagnosis</label>
                      <input type="text" class="form-control" id="diagnosis" v-model="form.diagnosis">
                         <small class="text-danger" v-if="errors.diagnosis">{{errors.diagnosis[0]}}</small>
                   </b-col>
                  </b-row>
                      <b-row>
                     <b-col>
                      <label>Nota</label>
                      <textarea type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                   </b-col>
                 
                    </b-row>
               
                    <br>
                 
                         <div class="form-group">
              <div class="card-footer  bg-white">      
          <button  class="btn btn-outline-alternate " @click="goBack(id)">Back</button>     
          <button type="submit" id="myBtn" class="btn btn-primary " @click="discajUpdate()">Kemaskini</button>
             </div>
                         </div>
               
                  </form> 

          </div>

              </div>
            </div>
      
          <!--Row-->

 </section>
</template>



<script type="text/javascript">
         

  export default {
       methods:{
         cases(){

        axios.get('/api/admissions/'+this.$route.params.id+ '?token='+ localStorage.getItem('token'))
        .then(({data}) => (this.form = data[0]))
       
        },

           discajUpdate(){
          axios.patch('/api/discharge/'+ this.form.reg_number + '?token='+ localStorage.getItem('token'), this.form)
          .then(() => {
       
   
        this.$router.push({ path : '/discharge' });
              Toast.fire(
                      'Berjaya!',
                      'Telah direkodkan.',
                      'success'
                    )
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        }, 
             goBack() {
          let $id = this.form.kp_passport;
       this.$router.push({name: 'details', params: { id: $id } })
    },
       }, 
  

   
 
      
     data(){
      return{
        
          rn:null,
          admission:[],
          form:{
           name:null,
           kp_passport:null,
           reg_number: null,
           date_dc:null ,
           duration: null,
           diagnosis: null,
           type_dc: null,
           notes: null,
          },
              
       
        errors:{},     
        
        itemize: [
          {
            text: 'PKRC',
            href: '/active'
          },
          {
            text: 'Discaj',
            active: true
          },
        ],
      
      }
 


    },
    mounted: function(){
      this.cases();
       
    }, 
   


  }
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>