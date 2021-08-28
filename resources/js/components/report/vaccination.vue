<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   
<!------Insert Data-------->
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
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="form.male">
      
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="form.female" >
      
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="form.paeds_male">
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="form.paeds_female">
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
      
    </div>
  </div>
                   
       
                    <div class="form-group">
                      <button type="submit"  class="btn btn-primary btn-block">Hantar</button>
                    </div>
                    <hr>
                 
                  </form>            
               
          
      </b-modal>
  
  <!--------------------------upadate data Modal-------------------------->
  <div>
  <b-modal ref="edit-modal" size="xl" hide-footer title="Kemaskini Laporan">     
          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="forms.date">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="forms.time">
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>

                           <b-col>
                      <label>PKRC</label>
                      <select class="form-control" id="pkrc" v-model="forms.pkrc">
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                   </b-col>
                     </b-row>
                           <br>  <hr>
                            <h6><b>Bilangan Pesakit</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.male">
      
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.female" >
      
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.paeds_male">
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="forms.paeds_female">
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
      
    </div>
  </div>
                   
       <hr>
                            <h6><b>Staging</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_1">
                         <small class="text-danger" v-if="errors.stage_1">{{errors.stage_1[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Stage 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_2">
                         <small class="text-danger" v-if="errors.stage_2">{{errors.stage_2[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Stage 3 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_3">
                         <small class="text-danger" v-if="errors.stage_3">{{errors.stage_3[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Stage 4</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_4">
                         <small class="text-danger" v-if="errors.stage_4">{{errors.stage_4[0]}}</small>
    </div>
  </div>
  
<hr>
    <h6><b>Bilangan kes</b></h6>
                           <div class="form-group row">
     <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.new_admission">
                         <small class="text-danger" v-if="errors.new_admission">{{errors.new_admission[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Step Up </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.step_up">
                         <small class="text-danger" v-if="errors.step_up">{{errors.step_up[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b> Discaj </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.discharged">
                         <small class="text-danger" v-if="errors.discharged">{{errors.discharged[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"> <code>*</code> <b>Home Quarantine </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.home_q">
                         <small class="text-danger" v-if="errors.home_q">{{errors.home_q[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm"><code>*</code> <b>Pending Admission</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.pending">
                         <small class="text-danger" v-if="errors.pending">{{errors.pending[0]}}</small>
    </div>
  </div>

    <h6><b>Jumlah</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Warganegara </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.local">
                         <small class="text-danger" v-if="errors.local">{{errors.local[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> BWN </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.non_local">
                         <small class="text-danger" v-if="errors.non_local">{{errors.non_local[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Penjaga </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.carer">
                         <small class="text-danger" v-if="errors.carer">{{errors.carer[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>BOR</b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.bor">
                         <small class="text-danger" v-if="errors.bor">{{errors.bor[0]}}</small>
    </div>
  </div>
 <hr>
  <h6><b><u>Bilangan Pesakit Menerima Vaksin </u></b></h6>
                     <h6> Pesakit Stage 1</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_1_1">
                         <small class="text-danger" v-if="errors.stage_1_1">{{errors.stage_1_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_1_2">
                         <small class="text-danger" v-if="errors.stage_1_2">{{errors.stage_1_2[0]}}</small>
    </div>
       
  </div>        

              <h6> Pesakit Stage 2</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_2_1">
                         <small class="text-danger" v-if="errors.stage_2_1">{{errors.stage_2_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>

   
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_2_2">
                         <small class="text-danger" v-if="errors.stage_2_2">{{errors.stage_2_2[0]}}</small>
    </div>
       
  </div>        
                    <h6> Pesakit Stage 3</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_3_1">
                         <small class="text-danger" v-if="errors.stage_3_1">{{errors.stage_3_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_3_2">
                         <small class="text-danger" v-if="errors.stage_3_2">{{errors.stage_3_2[0]}}</small>
    </div>
       
  </div>    
   <h6> Pesakit Stage 4</h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dos 1 </b> </label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_4_1">
                         <small class="text-danger" v-if="errors.stage_4_1">{{errors.stage_4_1[0]}}</small>
    </div> <div class="col-sm-1">
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b> Dos 2 </b></label>
    <div class="col-sm-1">
   <input type="number" class="form-control form-control-sm" id="s1" v-model="forms.stage_4_2">
                         <small class="text-danger" v-if="errors.stage_4_2">{{errors.stage_4_2[0]}}</small>
    </div>
       
  </div>   

  <hr>
                            <h6><b>Pesakit PUI</b></h6>
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Dewasa Lelaki </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.pui_adult_male">
      
                         <small class="text-danger" v-if="errors.pui_adult_male">{{errors.pui_adult_male[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Dewasa Perempuan </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.pui_adult_female" >
      
                         <small class="text-danger" v-if="errors.pui_adult_female">{{errors.pui_adult_female[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kanak-kanak Lelaki </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.pui_paeds_male">
                         <small class="text-danger" v-if="errors.pui_paeds_male">{{errors.pui_paeds_male[0]}}</small>
      
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Kanak-kanak Perempuan </b></label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pfemale" v-model="forms.pui_paeds_female">
                         <small class="text-danger" v-if="errors.pui_paeds_female">{{errors.pui_paeds_female[0]}}</small>
      
    </div>
  </div> 

                         
                           <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kemasukan Baru </b> </label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm"  id="male" v-model="forms.pui_new">
      
                         <small class="text-danger" v-if="errors.pui_new">{{errors.pui_new[0]}}</small>
    </div>
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><code>*</code> <b>Discaj </b></label>
    <div class="col-sm-1">
      <input type="number" class="form-control form-control-sm" id="female" v-model="forms.pui_discharged" >
      
                         <small class="text-danger" v-if="errors.pui_discharged">{{errors.pui_discharged[0]}}</small>
    </div>
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> <code>*</code> <b>Kematian </b> </label>
    <div class="col-sm-1">
       <input type="number" class="form-control form-control-sm" id="pmale" v-model="forms.pui_death">
                         <small class="text-danger" v-if="errors.pui_death">{{errors.pui_death[0]}}</small>
      
    </div>

  </div> 
<hr>
               <div class="form-group row">
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
  
  <!--viewModal-->
  <div>
  <b-modal ref="view-modal" size="xl" hide-footer title="Data Pesakit">     
          <form class="patient" > 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="views.id">
                     
                    </div>  
                 
                                         <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="views.date" disabled>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="views.time" disabled>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>

                           <b-col>
                      <label>PKRC</label>
                      <select class="form-control" id="pkrc" v-model="views.pkrc" disabled>
                        <option v-for="pkrc in pkrcs" v-bind:key="pkrc.pkrc" >{{pkrc.pkrc }} </option>
                        
                        </select>
                   </b-col>
                     </b-row>
                           <br>  
                    <b-row>
                      <h5>Pesakit Dewasa</h5>
                      <b-col>
                      <label>Lelaki</label>
                      <input type="number" class="form-control" id="male" v-model="views.male" disabled>
                         <small class="text-danger" v-if="errors.male">{{errors.male[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Perempuan</label>
                      <input type="number" class="form-control" id="female" v-model="views.female" disabled>
                         <small class="text-danger" v-if="errors.female">{{errors.female[0]}}</small>
                  </b-col>                
                    </b-row>
                  <br>
                   <b-row>
                      <h5>Pesakit Kanak-kanak</h5>
                      <b-col>
                      <label>Lelaki</label>
                      <input type="number" class="form-control" id="pmale" v-model="views.paeds_male" disabled>
                         <small class="text-danger" v-if="errors.paeds_male">{{errors.paeds_male[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Perempuan</label>
                      <input type="number" class="form-control" id="pfemale" v-model="views.paeds_female" disabled>
                         <small class="text-danger" v-if="errors.paeds_female">{{errors.paeds_female[0]}}</small>
                  </b-col>                
                    </b-row>
                    <br>
  
                               <b-row>
                                  <h5>Staging</h5>
                       <b-col>
                      <label>Stage 1</label>
                      <input type="number" class="form-control" id="s1" v-model="views.stage_1" disabled>
                         <small class="text-danger" v-if="errors.stage_1">{{errors.stage_1[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Stage 2</label>
                      <input type="number" class="form-control" id="s2" v-model="views.stage_2" disabled>
                         <small class="text-danger" v-if="errors.stage_2">{{errors.stage_2[0]}}</small>
                  </b-col>                
                    </b-row>
                    <br>
                        
                  <b-row>
                       <b-col>
                      <label>Jumlah Warganegara</label>
                      <input type="number" class="form-control" id="local" v-model="views.local" disabled>
                         <small class="text-danger" v-if="errors.local">{{errors.local[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Jumlah BWN</label>
                      <input type="number" class="form-control" id="non_local" v-model="views.non_local" disabled>
                         <small class="text-danger" v-if="errors.non_local">{{errors.non_local[0]}}</small>
                  </b-col>     
                       <b-col>
                    <label>BOR</label>
                      <input type="text" class="form-control" id="bor" v-model="views.bor" disabled
                         <small class="text-danger" v-if="errors.bor">{{errors.bor[0]}}</small>
                  </b-col>            
                    </b-row>
                    <br>
                   <b-row>
                       <b-col>
                      <label>Bilangan Penjaga</label>
                      <input type="number" class="form-control" id="carer" v-model="views.carer" disabled>
                         <small class="text-danger" v-if="errors.carer">{{errors.carer[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Bilangan Staf</label>
                      <input type="number" class="form-control" id="staff" v-model="views.staff" disabled>
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>
                  </b-col>                
                   </b-row>
              
                    <div class="form-group">
                      <label>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="views.notes" disabled></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    
                    <hr>
                 
                  </form> 
   </b-modal>
  
   </div>
<!--viewModal-->


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
           <b-button pill size="sm" variant="outline-secondary" id="show-btn" @click="showModal"> <i class="fas fa-plus"></i>&nbsp;Tambah</b-button>
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
     let roles = localStorage.getItem('roles');
      if(roles.includes("user")-1){
      this.$router.push({name: 'home'})
      Notification.unauthorized()
    }
 

        this.allPatient();
        this.race();
        this.area(),
        this.pkrc();
      },

      
     data(){
      return{
          views:[], 
          races: [],
          pkrcs:[],
          areas:[], 
          form:{
date: null, 
time: null, 
pkrc: null, 
male: null, 
female: null, 
paeds_male: null, 
paeds_female: null, 
new_adm: null, 
step_up: null, 
discharged: null, 
home_q: null, 
pending: null, 
carer: null, 
local: null, 
non_local: null, 
bor: null, 
stage_1: null, 
stage_2: null, 
stage_3: null, 
stage_4: null, 
stage_5: null, 
stage_1_1: null, 
stage_1_2: null, 
stage_2_1: null, 
stage_2_2: null, 
stage_3_1: null, 
stage_3_2: null, 
stage_4_1: null, 
stage_4_2: null, 
stage_5_1: null, 
stage_5_2: null, 
staff: null, 
pui_adult_male: null, 
pui_adult_female: null, 
pui_paeds_male: null, 
pui_paeds_female: null, 
pui_new: null, 
pui_discharged: null, 
pui_death: null, 
notes: null, 
          
        },
          forms:{
     date: null, 
time: null, 
pkrc: null, 
male: null, 
female: null, 
paeds_male: null, 
paeds_female: null, 
new_adm: null, 
step_up: null, 
discharged: null, 
home_q: null, 
pending: null, 
carer: null, 
local: null, 
non_local: null, 
bor: null, 
stage_1: null, 
stage_2: null, 
stage_3: null, 
stage_4: null, 
stage_5: null, 
stage_1_1: null, 
stage_1_2: null, 
stage_2_1: null, 
stage_2_2: null, 
stage_3_1: null, 
stage_3_2: null, 
stage_4_1: null, 
stage_4_2: null, 
stage_5_1: null, 
stage_5_2: null, 
staff: null, 
pui_adult_male: null, 
pui_adult_female: null, 
pui_paeds_male: null, 
pui_paeds_female: null, 
pui_new: null, 
pui_discharged: null, 
pui_death: null, 
notes: null, 
      
        },
        formr:{
       
          icno: null,
         
        },
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/'
          },
          {
            text: 'Laporan',
           href:'#'
          },
          {
           text: 'Vaccination',
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
          { key: 'male', label: 'Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'female', label: 'Perempuan', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_male', label: 'Kanak-kanak Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_female', label: 'Kanak-kanak Perempuan', sortable: true, sortDirection: 'desc' },
       
        { key: 'notes', label: 'Nota', sortable: true, sortDirection: 'desc' },
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
     axios.get('/api/reports/')
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
     race(){
    let self = this;
     axios.get('/api/race/')
      .then(function (response) {
        self.races = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
       area(){
    let self = this;
     axios.get('/api/area/')
      .then(function (response) {
        self.areas = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
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
         axios.get('/api/reports/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    
   
       register(){
          axios.post('/api/reports', this.form)
          .then(() => {
        window.location.reload()
        Notification.success()
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/reports/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/reports/')
       .then(function (response) {
        self.items = response.data;
        })
         this.$refs['edit-modal'].hide(); 
        Notification.success();
    
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },

         viewModal(record) {
          let self = this;
            axios.get('/api/reports/'+record.id)
  	     .then(function (response) {
        self.views = response.data;
        })
        this.$refs['view-modal'].toggle('#toggle-btn')
   
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