<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <header>Kemaskini Admission</header>
    
            <form class="user" @submit.prevent="register">
                  
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                       <input class="form-control" id="name" v-model="form.name" disabled>
                    
                     </b-col>
                     <b-col >
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                     </b-row>
                             
                    <b-row>
                       <b-col>
                      <label>Agama</label>
                        <select class="form-control" id="religion" v-model="form.religion">                  
                        <option >Islam</option>
                        <option >Kristian</option>
                        <option>Buddha</option>
                        <option >Hindu</option>
                        </select>
                    </b-col>
                   <b-col>
                      <label>Taraf Perkahwinan</label>
                        <select class="form-control" id="marriage" v-model="form.marriage">                  
                        <option >Bujang</option>
                        <option >Kahwin</option>
                        <option>Duda</option>
                        <option >Janda/Balu</option>
                        </select>
                    </b-col>                  
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Nama Waris</label>
                      <input type="text" class="form-control" id="kin" v-model="form.kin">
                  </b-col>
                   <b-col>
                      <label>Hubungan</label>
                      <input type="text" class="form-control" id="kinrelation" v-model="form.kin_relation">
                  </b-col>
                  </b-row>
                   <b-row>
                  <b-col>
                      <label>Alamat Waris</label>
                      <input type="text" class="form-control" id="kinaddress" v-model="form.kin_address">
                  </b-col>
                   <b-col>
                      <label>No. Telefon Waris</label>
                      <input type="text" class="form-control" id="kinPhone" v-model="form.kin_phone">
                  </b-col>
                  </b-row>
                  <b-row>
                  <b-col>
                      <label>Tarikh Masuk</label>
                      <input type="date" class="form-control" id="date_report" v-model="form.date">
                         <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                  </b-col>
                    <b-col>
                      <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="form.time">
                         <small class="text-danger" v-if="errors.time">{{errors.time[0]}}</small>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Berat Pesakit</label>
                      <input type="text" class="form-control" id="daily_number" v-model="form.weight">
                   </b-col>
                    <b-col>
                      <label>PKRC</label>
                        <select class="form-control" id="district" v-model="form.pkrc">
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                    </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Register Number</label>
                       <input type="text" class="form-control" id="rn" v-model="form.reg_number">
                     
                   </b-col>                 
                    </b-row>
                           <b-row>
                     <b-col>
                      <label>Nota</label>
                       <input type="text" class="form-control" id="note" v-model="form.note">
                          <small class="text-danger" v-if="errors.note">{{errors.note[0]}}</small>
                     
                   </b-col>                 
                    </b-row>
                    <br>
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Kemaskini</button>
                    </div>
                    <hr>
                 
                  </form>    

          </div>

              </div>
            </div>
      
          <!--Row-->


</template>



<script type="text/javascript">

         

  export default {
       methods:{
         cases(){
      
    
        axios.get('/api/admissions/'+this.$route.params.id)
        .then(({data}) => (this.form = data[0]))
      },
           discaj(){
          axios.post('/api/discharge', this.form)
          .then(() => {
       
        Notification.success()
        this.$router.push({ path : '/pkrclist' });
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        }, 
         pkrc(){
    let self = this;
     axios.get('/api/pkrc/')
      .then(function (response) {
        self.pkrcs = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
          register(){
           let id = this.form.id
       axios.patch('/api/admission/'+id, this.form)
       .then(() => {    
     
        Notification.success();
        this.$router.push({ path : '/pkrclist' });
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        }
       }, 
  

   
     mounted(){
  


      },

      
     data(){
      return{
             pkrcs:[],
        
          form:{
           name:null,
            kp_passport: null,
          reg_number: null,
          kp_passport: null,
          pkrc: null,
          marriage: null,
          religion: null,
          kin: null,
          kin_address: null,
          kin_relation: null,
          kin_phone: null,
          date: null,
          time: null,
          weight: null,
          note: null
          },
              
       
        errors:{},     
        
        itemize: [
          {
            text: 'PKRC',
            href: '/#/pkrclist'
          },
          {
            text: 'Kemaskini Admission',
            active: true
          },
        ],
      
      }
 


    },
    mounted: function(){
      this.cases();
         this.pkrc();
    }, 
   


  }
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>