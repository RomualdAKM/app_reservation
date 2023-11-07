<script setup>
import Base from "./../../components/base.vue";
import { ref,reactive,onMounted } from 'vue'
import router from "./../../../router/index.js"
import { useRoute } from 'vue-router'

const route = useRoute()

const motivationId = ref(route.params.motivationId)

const motivation = ref({
       text: "",
       publication_date: "",
       image: "",
})

const getMotivation = async () => {
    let response = await axios.get(`/api/get_motivation/${motivationId.value}`)
    motivation.value = response.data.motivation
    console.log('motivation',response.data.motivation)
}

const changePhoto = (e) => {
    const file = e.target.files[0];
    const limit = 4024 * 4024 * 7; // Limite de taille en octets (7 Mo dans cet exemple)

    if (file.size > limit) {
        swal({
            icon: "error",
            title: "Ooops...",
            text: "Vous téléchargez un fichier trop volumineux.",
        });
        return false;
    }

    // Stockez le fichier image dans la propriété "image"
    motivation.image = file;
}

const editMotivation = async () => {
    const formData = new FormData();

    // Ajoutez les autres champs au formulaire
    formData.append("text", motivation.value.text);
    formData.append("publication_date", motivation.value.publication_date);
   
    
   // Ajoutez le fichier image s'il est défini
   if (motivation.value.image) {
        formData.append("image", motivation.value.image);
    }

   
  await axios.post("/api/edit_motivation/" + motivation.value.id,formData).then((response) => {
    if(response.data.success){

                 router.push("/motivations")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "Motivation modifier avec success",
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

    getMotivation()

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
                                Créer un Motivation {{ motivation }}
                            </h5> 
                            <form
                                class="flex flex-col gap-4 m-0 sm:gap-3 theme-form"
                            >
                                <div>
                                    <label for="description">Contenu </label>
                                    <textarea v-model="motivation.text"
                                        class="p-[11px] dark:border-border-dark focus:!border-border-light w-full border border-border-light rounded-5 text-xs text-content"
                                        
                                    ></textarea>
                                </div>

                                <div>
                                    <label for="productImage"
                                        >Date de Publication</label
                                    >
                                    <input v-model="motivation.publication_date"
                                        class="cursor-pointer show-preview"
                                        type="date"
                                        id="productImage"
                                    />
                                </div>
                                <div>
                                    <label for="productImage">Image</label>
                                    <input
                                        class="cursor-pointer show-preview"
                                        type="file"
                                        id="productImage"
                                        @change="changePhoto"
                                    />
                                </div>
                                <div
                                    class="flex flex-wrap gap-2 items-center justify-end"
                                >
                                    <button type="button"
                                        class="btn btn-success py-1 text-white text-xs  gap-2 items-center"
                                        @click="editMotivation()"
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
