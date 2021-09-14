  
<template>
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <header>Review {{currentDate()}} </header>
    
          <form class="user" @submit.prevent="review"   > 
                    <div class="form-group" >
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="Name" v-model="admission.name" 
                      disabled>
                     </b-col>
                        <b-col>
                      <label>RN</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="admission.reg_number" disabled>
                       <input type="text" class="form-control" id="ICnumber"  v-model="form.reg_number" disabled hidden>
                    </b-col>
                    <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="admission.kp_passport" disabled >
                      <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled hidden >
                     
                  </b-col>
                      </b-row>
                      <b-row>
                            <b-col>
                      <label>Tarikh </label>
                      <input type="date" class="form-control" id="date" v-model="form.date_review" >
                         <small class="text-danger" v-if="errors.date_review">{{errors.date_review[0]}}</small>
                   </b-col>
                     <b-col>
                        <label>Masa </label>
                      <input type="time" class="form-control" id="time" v-model="form.time_review">
                         <small class="text-danger" v-if="errors.time-review">{{errors.time_review[0]}}</small>
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
                      <label>Warning Signs</label>
                        <select class="form-control" id="typedc" v-model="select" @change="selected">                  
                        <option v-for="option in options" v-bind:key="option.value" :value="option.value" > {{ option.text }}</option>
                                       
                        </select>
                    </b-col>
                    </b-row> <br>
                    <b-row>
                  <b-col>
               
                   <template v-if="select === 'No'">    
                       <div id="checkboxesno" disabled style="display: none">
                      
                      <label for="dyspnea">Exertional dyspnoea</label>
                      <input type="checkbox" id="dyspnea" value="Exertional dyspnoea" v-model="form.warning_sign" disabled>  
                     <label for="fever">Persistent or new onset fever</label>
                      <input type="checkbox" id="fever" value="Persistent or new onset fever" v-model="form.warning_sign" disabled>
                        <label for="symptoms">Persistent symptoms - cough/lethargy/anorexia</label>
                      <input type="checkbox" id="sypmtoms" value="Persistent symptoms - cough/lethargy/anorexia" v-model="form.warning_sign" disabled>
                     <label for="spo2">SPO2 under RA less 95% </label>
                       <input type="checkbox" id="spo2" value="SPO2 under RA <95%" v-model="form.warning_sign" disabled>
                             
                      
                      <label for="resp">Respirtory rate more 25</label>
                       <input type="checkbox" id="resp" value="Respirtory rate > 25" v-model="form.warning_sign" disabled>                       
                        <label for="crp">A rising CPR value or single CRP > 5mg/dl</label>
                      <input type="checkbox" id="crp" value="A rising CPR value or single CRP > 5mg/dl" v-model="form.warning_sign" disabled>                       
                      <label for="alc">Dropping ALC</label>
                      <input type="checkbox" id="alc" value="Dropping ALC" v-model="form.warning_sign" disabled>                       
                      

                                        
                      </div>
                   
                   </template>
                     <template v-else> 
                     <div id="checkboxes" style="display: none" >
                      
                      <label for="dyspnea">Exertional dyspnoea</label>
                      <input type="checkbox" id="dyspnea" value="Exertional dyspnoea" v-model="form.warning_sign">  
                     <label for="fever">Persistent or new onset fever</label>
                      <input type="checkbox" id="fever" value="Persistent or new onset fever" v-model="form.warning_sign">
                        <label for="symptoms">Persistent symptoms - cough/lethargy/anorexia</label>
                      <input type="checkbox" id="sypmtoms" value="Persistent symptoms - cough/lethargy/anorexia" v-model="form.warning_sign">
                     <label for="spo2">SPO2 under RA less 95% </label>
                       <input type="checkbox" id="spo2" value="SPO2 under RA <95%" v-model="form.warning_sign">
                             
                      
                      <label for="resp">Respirtory rate more 25</label>
                       <input type="checkbox" id="resp" value="Respirtory rate > 25" v-model="form.warning_sign">                       
                        <label for="crp">A rising CPR value or single CRP > 5mg/dl</label>
                      <input type="checkbox" id="crp" value="A rising CPR value or single CRP > 5mg/dl" v-model="form.warning_sign">                       
                      <label for="alc">Dropping ALC</label>
                      <input type="checkbox" id="alc" value="Dropping ALC" v-model="form.warning_sign">                       
                      

                                        
                      </div>
                     </template>
                     </b-col>
                    </b-row> <br>
                  <b-row>
                     <b-col>
                      <label>Temperature</label>
                      <input type="text" class="form-control" id="temp" v-model="form.temp">
                         <small class="text-danger" v-if="errors.temp">{{errors.temp[0]}}</small>
                   </b-col>
                        <b-col>
                      <label>BP</label>
                      <input type="text" class="form-control" id="pulse" v-model="form.bp">
                         <small class="text-danger" v-if="errors.bp">{{errors.bp[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Pulse</label>
                      <input type="text" class="form-control" id="pulse" v-model="form.pulse">
                         <small class="text-danger" v-if="errors.pulse">{{errors.pulse[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Resp. rate</label>
                      <input type="text" class="form-control" id="diagnosis" v-model="form.resp">
                         <small class="text-danger" v-if="errors.resp">{{errors.resp[0]}}</small>
                   </b-col>
                
                         
                     <b-col>
                      <label>Spo2</label>
                      <input type="text" class="form-control" id="spo2" v-model="form.spo2">
                         <small class="text-danger" v-if="errors.spo2">{{errors.spo2[0]}}</small>
                   </b-col>
                       <b-col>
                      <label>Pre EDT Spo2</label>
                      <input type="text" class="form-control" id="prespo2" v-model="form.pre_spo2">
                         <small class="text-danger" v-if="errors.pre_spo2">{{errors.pre_spo2[0]}}</small>
                   </b-col>
                      <b-col>
                      <label>Post EDTSpo2</label>
                      <input type="text" class="form-control" id="postspo2" v-model="form.post_spo2">
                         <small class="text-danger" v-if="errors.post_spo2">{{errors.post_spo2[0]}}</small>
                   </b-col>
                  </b-row>
                      <b-row>
                     <b-col>
                      <label>Review Notes</label>
                      <textarea type="text" class="form-control" id="notes" v-model="form.reviewnotes"></textarea>
                   </b-col>
                 
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Plan</label>
                      <textarea type="text" class="form-control" id="notes" v-model="form.plan"></textarea>
                   </b-col>
                 
                    </b-row>
                    <b-row>
                      <b-col>
                        <label >Reviewing MO</label>                        
                      <input type="text" class="form-control" id="mo" v-model="form.reviewing_mo" disabled>
                      </b-col>

                    </b-row>
               
                    <br>
                    <div class="form-group">
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" >Submit</button>
               
                    </div>
               
                  </form> 

          </div>

              </div>
            </div>
      
          <!--Row-->


</template>



<script type="text/javascript">

         

  export default {

         mounted(){
      let roles = localStorage.getItem('roles');
       if(roles.toLowerCase().indexOf("medical")===-1){
      this.$router.push({name: 'home'})
      Notification.mo()
      
  
    }


      },
       methods:{
         cases(){      
        axios.get('/api/admissions/'+this.$route.params.id)
       .then(({data}) => (this.admission = data[0] , this.form.reg_number = data[0].reg_number, this.form.kp_passport = data[0].kp_passport))
 
      },
           review(){
          axios.post('/api/review', this.form)
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
      currentDate() {
      const current = new Date();
      const date = current.getDate()+'/'+(current.getMonth()+1)+'/'+current.getFullYear();
      return date;
    },
    selected: function(){
      $("#checkboxes").css("display","");  
       $("#checkboxesno").css("display",""); 
    },

    user(){
      let loggeduser = localStorage.getItem('user')
      this.form.reviewing_mo = loggeduser;
    }, 
      dated(){
      let reviewdate= new Date().toISOString().substr(0, 10);
      this.form.date = reviewdate
      ;
    }, 
        timed(){
      let reviewtime= new Date().toJSON().slice(0,10).replace(/-/g,'/');
      this.form.time = reviewtime;
    }, 
       },
  

   


      
     data(){
      return{
          admission:[],
          select: null,
           options: [
            { text: 'Yes', value: 'Yes' },
            { text: 'No', value: 'No' },
          ],
          form:{
          reg_number : null,
          kp_passport : null,
          date_review : null,
          time_review : null,
          diagnosis : null,
          warning_sign : [],
          temp : null,
          pulse : null,
          resp : null,
          bp : null,
          spo2 : null,
          pre_spo2 : null,
          post_spo2 : null,
          reviewnotes: null,
          plan : null,
          reviewing_mo : null,
          },
              
       
        errors:{},     
        
        itemize: [
          {
            text: 'PKRC',
            href: '#/pkrclist'
          },
          {
            text: 'Review',
            active: true
          },
        ],
      
      }
 


    },
    mounted: function(){
      this.cases();
      this.user();
      this.dated();
      this.timed();
     
    }, 
   


  }
</script>ad


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
  #checkboxes input {
    display: inline-block;
    margin-right: 20px;
  }
  #checboxes label{
    display: inline-block;
  }
  #checkboxesno input {
    display: inline-block;
    margin-right: 20px;
  }
  #checboxesno label{
    display: inline-flex;
  }
</style>