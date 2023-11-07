<script setup>
import Base from "./../../components/base.vue";
import { ref, onMounted } from "vue";

const services = ref([]);

const getServices = () => {
    axios.get("/api/services").then((response) => {
        services.value = response.data.services;
        console.log("services", response.data.services);
    });
};
const deleteService =  (serviceId) => {
    //console.log('id',motivationId)
    Swal.fire({
            title: "Are you sure ?",
            text: "You can't go back",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it !",
        }).then((result) => {
            if (result.value) {
                axios.get("/api/delete_service/" + serviceId).then(() => {
                    Swal.fire("Delete", "service delete successfully", "success");
                    //getCustomers(pagination.value.currentPage);
                    getServices()
                });
            }
        });
}
onMounted(() => {
    getServices();
});
</script>

<template>
    <div>
        <div
            class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300"
        >
            <Base />
            <!-- Page Body Start -->
            <div class="page-body">
                <div class="grid grid-cols-12 gap-card-gap">
                    <div class="col-span-12">
                        <div class="card">
                         
                            <div class="card-body">
                                <div class="overflow-auto custom-scroll">
                                    <table
                                        class="table equal-space table-action invoice"
                                    >
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="hover:bg-gray-light dark:hover:bg-sidebar-dark2 invoice-item"
                                                v-for="service in services"
                                                :key="service.id"
                                            >
                                                
                                                <td class="min-w-[7.5rem]">
                                                    <h4
                                                        class="text-xs font-semibold text-content"
                                                    >
                                                        {{
                                                            service.nom
                                                        }}
                                                    </h4>
                                                </td>
                                                <td class="min-w-[5.5rem]">
                                                    <h4
                                                        class="text-xs font-semibold capitalize text-warning"
                                                    >
                                                        {{ service.prix }}
                                                    </h4>
                                                </td>

                                                <td
                                                    class="min-w-[3.125rem] text-right"
                                                >
                                                    <div
                                                        class="items-center gap-3 flex 2lg:hidden"
                                                    >
                                                    <router-link :to="{name: 'serviceEdit',params:{serviceId:service.id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                    </router-link>
                                                    <button type="button" @click="deleteService(service.id)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                            </svg>

                                                    </button>
                                                        <a
                                                            href="https://admin.pixelstrap.com/govo/assets/chat-doc/invoice.pdf"
                                                            Download
                                                        >
                                                            <svg
                                                                class="w-[1.125rem] h-[1.125rem] stroke-title hover:stroke-primary"
                                                            >
                                                                <use
                                                                    href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Arrow-Down"
                                                                ></use></svg
                                                        ></a>
                                                    </div>
                                                    <div
                                                        class="dropdown dropdown-bottom on-hover-show inline-flex justify-end hidden 2lg:block"
                                                    >
                                                        <button>
                                                            <svg
                                                                class="w-[1.125rem] h-[1.125rem] stroke-title"
                                                            >
                                                                <use
                                                                    href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Dote-v"
                                                                ></use>
                                                            </svg>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu !right-0 !left-unset"
                                                        >
                                                            <ul>
                                                                <li>
                                                                    <a
                                                                        href="invoice-create.html"
                                                                    >
                                                                        <svg
                                                                            class="hover:stroke-primary w-[1.125rem] h-[1.125rem] stroke-title"
                                                                        >
                                                                            <use
                                                                                href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Edit-Square"
                                                                            ></use></svg
                                                                    ></a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="javascript:void(0)"
                                                                    >
                                                                        <svg
                                                                            class="hover:stroke-primary w-[1.125rem] remove-invoice h-[1.125rem] stroke-title"
                                                                        >
                                                                            <use
                                                                                href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Delete"
                                                                            ></use></svg
                                                                    ></a>
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="https://admin.pixelstrap.com/govo/assets/chat-doc/invoice.pdf"
                                                                        Download
                                                                    >
                                                                        <svg
                                                                            class="hover:stroke-primary w-[1.125rem] h-[1.125rem] stroke-title"
                                                                        >
                                                                            <use
                                                                                href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Arrow-Down"
                                                                            ></use></svg
                                                                    ></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Body End  -->
        </div>
    </div>
</template>
