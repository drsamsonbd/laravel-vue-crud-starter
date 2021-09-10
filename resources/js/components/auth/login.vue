<template>

<div id="form" class="row justify-content-center" align="center">
      <div class=" col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" @submit.prevent="login">
                    <div class="form-group">
                      <div class="col">
                      <input type="text" class="form-control" id="ICnumber"
                        placeholder="Sila isi nombor kad pengenalan tanpa '-'"  v-model="form.ic">
                       
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Kata laluan"  v-model="form.password">
                   
                    </div>
                  </div>
                    <div class="form-group">
                      <button id="button" type="submit" class="btn btn-primary btn-sm">Login</button>
                    </div>    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small">Sila hubungi admin untuk bantuan.</a>
                  </div>                
                
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  


   
</template>


<script type="text/javascript">
export default{

data(){
  return{
        form:{
          ic: null,
          password: null
        },
        errors:{}
      }
} ,
      methods:{
        login(){
          axios.post('/api/auth/login', this.form)
          .then(res=> {
            User.responseAfterLogin(res)
            Toast.fire({
              icon: 'success',
              title: 'Signed in successfully'
})
            this.$router.push({name:'home'})            
              window.location.reload() 
            })
           .catch(()=>{
            Toast.fire({
              icon: 'warning',
              title: 'Invalid email or password!'
            });  
           })
        }
      }
  }


</script>
<style type="text/css">
#form {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

</style>