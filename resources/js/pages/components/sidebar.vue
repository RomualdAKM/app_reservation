<script setup>

</script>


<template>
      <!-- Sidebar Start -->
      <div class="page-sidebar sidebar-dark unique-sidebar">
          <aside class="sidebar"> 
            <div class="logo-wrapper"><a href="index.html"> <img class="w-full full-sidebar" src="/assets/images/qrcode2.png" alt="logo"></a>
              <button class="sidebar-btn">
                <svg class="w-6 h-6"> 
                  <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Category"> </use>
                </svg>
              </button>
            </div>
            <div class="search-wrapper">
              <div class="search-box"> 
                <input class="search" placeholder="Search" type="search">
                <svg class="w-5 h-5 cursor-pointer"> 
                  <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Search"> </use>
                </svg>
              </div>
            </div>
            <nav class="sidebar-main"> 
              <ul class="sidebar-links custom-scroll"> 
                <li class="title">Motivation</li>
                
                <li class="sidebar-list"> <router-link to="/create-motivation" class="sidebar-link sidebar-title" href="#"><span> 
                      <svg> 
                        <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Graph"> </use>
                      </svg><span class="sidebar-name">Ajouter </span></span></router-link>
                </li>
                <li class="sidebar-list"> <router-link to="/motivations" class="sidebar-link sidebar-title" href="#"><span> 
                      <svg> 
                        <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Graph"> </use>
                      </svg><span class="sidebar-name">Listes</span></span></router-link>
                </li>
                <li class="title">Service</li>
                
                <li class="sidebar-list"> <router-link to="/create-service" class="sidebar-link sidebar-title" href="#"><span> 
                      <svg> 
                        <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Graph"> </use>
                      </svg><span class="sidebar-name">Ajouter </span></span></router-link>
                </li>
                <li class="sidebar-list"> <router-link to="/services" class="sidebar-link sidebar-title" href="#"><span> 
                      <svg> 
                        <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Graph"> </use>
                      </svg><span class="sidebar-name">Listes</span></span></router-link>
                </li>
               
               
                
              </ul>
            </nav>
          </aside>
        </div>
        <!-- Sidebar End -->
</template>