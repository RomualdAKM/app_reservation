<script setup>
import Base from "./../../components/base.vue";
import { ref, onMounted } from "vue";

const motivations = ref([]);

const getMotivations = () => {
    axios.get("/api/motivations").then((response) => {
        motivations.value = response.data.motivations;
        console.log("motivations", response.data.motivations);
    });
};

const deleteMotivation =  (motivationId) => {
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
                axios.get("/api/delete_motivation/" + motivationId).then(() => {
                    Swal.fire("Delete", "Motivation delete successfully", "success");
                    //getCustomers(pagination.value.currentPage);
                    getMotivations()
                });
            }
        });
}

onMounted(() => {
    getMotivations();
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
                            <!-- <div class="card-header pb-4">
                  <div class="flex gap-2 justify-between items-center 3sm:flex-col 3sm:items-end"> 
                    <div class="flex item-center gap-2"> 
                      <div class="dropdown">
                        <button class="btn border border-border-light flex gap-1 text-content items-center !p-[0.7rem] dark:border-border-dark">Action
                          <svg class="w-[20px] h-[20px] stroke-content"> 
                            <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Arrow-Down-2"> </use>
                          </svg>
                        </button>
                        <div class="dropdown-menu !w-36 !top-11 left-0 rtl:!right-0 rtl:!left-unset !p-2">
                          <ul class="flex flex-col cursor-pointer !gap-0">
                            <li class="px-2 py-1 rounded hover:bg-gray-light dark:hover:bg-sidebar-dark2">Select All</li>
                            <li class="px-2 py-1 rounded hover:bg-gray-light dark:hover:bg-sidebar-dark2">Edit</li>
                            <li class="px-2 py-1 rounded hover:bg-gray-light dark:hover:bg-sidebar-dark2">Move to trash</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center m-0">
                      <input class="py-[11px] px-[25px] dark:bg-sidebar-dark2 dark:border-border-dark dark:text-white rtl:rounded-bl-none  rtl:rounded-tl-none border rounded w-full text-xs text-Gray-darker rounded-tr-none rounded-br-none" type="Search" placeholder="Search">
                      <button class="bg-primary text-white rounded border-none p-3 rounded-tl-none rounded-bl-none rtl:rounded-bl-5 rtl:rounded-br-none rtl:rounded-tr-none rtl:rounded-tl-5">
                        <svg class="w-[20px] h-[20px] stroke-white"> 
                          <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Search"> </use>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div> -->
                            <div class="card-body">
                                <div class="overflow-auto custom-scroll">
                                    <table
                                        class="table equal-space table-action invoice"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>text</th>
                                                <th>Date de Publication</th>
                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="hover:bg-gray-light dark:hover:bg-sidebar-dark2 invoice-item"
                                                v-for="motivation in motivations"
                                                :key="motivation.id"
                                            >
                                                <td class="min-w-[210px]">
                                                    <div
                                                        class="flex items-center gap-2"
                                                    >
                                                        <div
                                                            class="flex items-center gap-[.5625rem]"
                                                        >
                                                            <img
                                                                class="w-10 h-10 rounded-full"
                                                                :src="
                                                                    '/images/motivation/' +
                                                                    motivation.image
                                                                "
                                                                alt="Samsung TV"
                                                            />
                                                        </div>
                        

                                                    </div>
                                                </td>
                                                <td class="min-w-[7.5rem]">
                                                    <h4
                                                        class="text-xs font-semibold text-title"
                                                    >
                                                        {{ motivation.text }}
                                                    </h4>
                                                </td>
                                                <td class="min-w-[7.5rem]">
                                                    <h4
                                                        class="text-xs font-semibold text-content"
                                                    >
                                                        {{
                                                            motivation.publication_date
                                                        }}
                                                    </h4>
                                                </td>
                                                <td class="min-w-[5.5rem]">
                                                    <h4
                                                        class="text-xs font-semibold capitalize text-warning"
                                                    >
                                                        {{ motivation.status }}
                                                    </h4>
                                                </td>

                                                <td
                                                    class="min-w-[3.125rem] text-right"
                                                >
                                                    <div
                                                        class="items-center gap-3 flex 2lg:hidden"
                                                    >
                                                        <router-link :to="{name: 'motivationEdit',params:{motivationId:motivation.id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                        </router-link>
                                                        <button type="button" @click="deleteMotivation(motivation.id)">
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
                                                                    <router-link :to="{name: 'motivationEdit',params:{motivationId:motivation.id}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                        </svg>
                                                                    </router-link>
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
                            <!-- <div class="card-footer">
                            <div class="flex justify-between items-center flex-wrap sm:flex-col sm:items-end">
                                <div class="flex items-center"> 
                                <button class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"> 
                                    <svg class="w-4 h-4 stroke-title group-hover:stroke-white"> 
                                    <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Arrow-Left-2"> </use>
                                    </svg><span class="sm:hidden">Preview</span>
                                </button>
                                <button class="btn border border-border-light rounded-none text-title hover:bg-primary dark:border-border-dark hover:text-white">1</button>
                                <button class="btn btn-active text-white border border-border-light bg-primary rounded-none hover:bg-primary dark:border-border-dark hover:text-white">2</button>
                                <button class="btn border border-border-light rounded-none text-title hover:bg-primary dark:border-border-dark hover:text-white">3</button>
                                <button class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"> <span class="sm:hidden">Next</span>
                                    <svg class="w-4 h-4 stroke-title group-hover:stroke-white"> 
                                    <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Arrow-Right-2"> </use>
                                    </svg>
                                </button>
                                </div>
                                <div class="sm:mt-3"><img src="/assets/images/ecommerce/paypal2.png" alt="paypal-img"></div>
                            </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Body End  -->
        </div>
    </div>
</template>
