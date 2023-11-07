<script setup>
import { reactive, ref } from "vue";
import router from "./../../../router/index.js"


let form = reactive({
    name: "",
    email: "",
    password: "",
    c_password: "",
});


const register = async () => {
    await axios.post("/api/register", form).then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
             router.push("/login");
            toast.fire({
            icon: "success",
            title: "Compte créé avec succé",
        });
        } else {
          console.log('error',response.data.message)
           toast.fire({
            icon: "error",
            title: "!!!! Remplissez tout les champs et assurez vous que les passwords correspondent",
        });
        }
    });
};

</script>

<template>
     <!-- Page Body Start -->
     <div class="page-body h-[100vh] !mt-0 bg-cover bg-no-repeat  bg-[url('../../assets/images/dotsbg.jpg')]">
        <div class="!flex items-center justify-center h-full p-[15px] common-animate-main ratio_asos">
          <div class=" grid grid-cols-12 gap-0 mx-auto w-full max-w-[70%] xl:max-w-[50%] md:max-w-[70%] sm:max-w-[80%] 2sm:max-w-[100%] xl:flex xl:justify-center lg:grid items-center">
            <div class="relative col-span-5 bg-white 2xl:col-span-6 z-1 xl:col-span-12 rounded-xl max-w-[470px] min-w-[300px] sm:min-w-[22.75rem] 2sm:min-w-[18.75rem] max-h-max">
              <form class="theme-form flex flex-col gap-3 !m-0 p-8 2sm:p-4" @submit.prevent="register()">
                <h3>Créer un Compte</h3>
                <p>Enter your detail for registration</p>
                <div>
                  <input type="text" placeholder="Nom" v-model="form.name">
                </div>
               
                <div>
                  <input type="email" placeholder="Email administrateur" v-model="form.email">
                </div>
                <div class="relative">
                  <input type="password" id="password" name="password" placeholder="Mot de Passe" v-model="form.password">
                  <div class="password-icon"><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye"> </i><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye-off"> </i></div>
                </div>
                <div class="relative">
                  <input type="password" id="password" name="password" placeholder="Confirmer votre Mot de pass" v-model="form.c_password">
                  <div class="password-icon"><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye"> </i><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye-off"> </i></div>
                </div>
                <div class="flex items-center gap-2">
                  <label class="checkbox cursor-pointer w-4 h-4"> 
                    <input class="peer" type="checkbox"><span class="checkbox-indicator peer-checked:!bg-primary !border peer-checked:!border-primary"> <i data-feather="check"></i></span>
                  </label><span class="!text-title">Accept terms & condition</span>
                </div>
                <a class="btn btn-primary !text-white hover:drop-shadow-lg my-2 py-1" href="#">

                  <button type="submit" >Inscription</button>
                </a>
                <div class="text-center"><span>Vous Avez deja un compte?   <router-link to="/login">Connection</router-link></span></div>
               
              </form>
            </div>
            <div class="col-span-7 rounded-lg 4xl:col-span-6 z-1 xl:col-span-12 xl:hidden">
              <div class="relative flex items-center justify-center object-contain"><img class="w-[100%]" src="https://admin.pixelstrap.com/govo/assets/images/svg/register1.svg" alt="register vector"><img class="common-animate animate-ping top-[6%] 4xl:top-[-3%] 2xl:top-[-6%] 4xl:right-[37%] absolute right-[41%] animate__animated animate__infinite animate__shakeY animate__slower" src="https://admin.pixelstrap.com/govo/assets/images/svg/register.svg" alt="register vector"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Body End-->

</template>