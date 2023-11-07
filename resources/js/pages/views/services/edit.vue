<script setup>
import Base from "./../../components/base.vue";
import { ref,reactive,onMounted } from 'vue'
import router from "./../../../router/index.js"
import { useRoute } from 'vue-router'

const route = useRoute()

const serviceId = ref(route.params.serviceId)

const service = ref({
       nom: "",
       prix: "",   
})

const getService = async () => {
    let response = await axios.get(`/api/get_service/${serviceId.value}`)
    service.value = response.data.service
    console.log('service',response.data.service)
}

const editService = async () => {
    const formData = new FormData();

    // Ajoutez les autres champs au formulaire
    formData.append("nom", service.value.nom);
    formData.append("prix", service.value.prix);

   
  await axios.post("/api/edit_service/" + service.value.id,formData).then((response) => {
    if(response.data.success){

                 router.push("/services")

                    console.log('ok')
                    toast.fire({
                        icon: "success",
                        title: "Service modifier avec success",
                    });

                }
                 
              else{
                toast.fire({
                      icon: "error",
                      title: "Remplissez correctement tout les champs",
                  });
                console.log('error',response.data.message)
              } 
   
  })

}
onMounted ( async() => {

getService()

})
</script>

<template>
    <div>
        <div
            class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300"
        >
            <Base />
            <!-- Page Body Start-->
            <div class="page-body">
                <div class="grid grid-cols-12 gap-4 add-product card">
                    <div
                        class="col-span-12 pr-4 border-r dark:border-r rtl:!border-r-0 rtl:!pr-4 dark:border-border-dark 2lg:col-span-12 2lg:border-b 2lg:pb-4 2lg:border-r-0 border-border-light rtl:border-l rtl:2lg:border-l-0 rtl:pl-4"
                    >
                        <div>
                            <h5 class="text-title font-semibold mb-3">
                                Modifier un Service
                            </h5>
                            <form
                                class="flex flex-col gap-4 m-0 sm:gap-3 theme-form"
                            >
                                <div>
                                    <label for="description">Nom </label>
                                    <textarea v-model="service.nom"
                                        class="p-[11px] dark:border-border-dark focus:!border-border-light w-full border border-border-light rounded-5 text-xs text-content"
                                        
                                    ></textarea>
                                </div>

                                <div>
                                    <label for="productImage"
                                        >Prix</label
                                    >
                                    <input v-model="service.prix"
                                        class="cursor-pointer show-preview"
                                        type="number"
                                        id="productImage"
                                    />
                                </div>
                                
                                <div
                                    class="flex flex-wrap gap-2 items-center justify-end"
                                >
                                    <button type="button"
                                        class="btn btn-success py-1 text-white text-xs gap-2 items-center"
                                        @click="editService()"
                                        >Edit</button
                                    >
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Body End  -->
        </div>
    </div>
</template>
