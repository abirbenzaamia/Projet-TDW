<?php
include_once("Controller/GestionUtilisateursController.class.php");
class GestionUtilisateursview{

    function displayNavBar($page){
        echo '<nav class="absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-400" :class="{';echo '-translate-x-full' ; echo ': !navOpen}">';
        echo'<div class="flex flex-col justify-between h-full">';
           echo' <div class="p-4">
                <!-- LOGO -->
                <a class="flex items-center text-white space-x-4" href="">
                    <svg class="w-7 h-7 bg-indigo-600 rounded-lg p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    <span class="text-2xl font-bold">Better Code</span>
                </a>
              

                <!-- NAV LINKS -->
                <div class="py-4 text-gray-400 space-y-1">
                    <!-- BASIC LINK -->
                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>'.$page.'</span>
                    </a>
                    <!-- DROPDOWN LINK -->
                    <div class="block" x-data="{open: false}">
                        <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                            <div class="flex items-center space-x-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <span>Gérer les utilisateurs</span>
                            </div>
                        </div>
                        <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                            <a href="GestionClients.php" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                gérer les clients
                            </a>
                            <a href="GestionTransporteurs.php" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                Gérer les transporteurs
                            </a>
                           
                        </div>
                    </div>
                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 hover:bg-gray-800 hover:text-white rounded">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Gestion des annonces</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 hover:bg-gray-800 hover:text-white rounded">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Gestion des news</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 hover:bg-gray-800 hover:text-white rounded">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Gestion du contenu</span>
                    </a>
                </div>
            </div>

            <!-- PROFILE -->
            <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
                <div class="flex items-center space-x-2">
                    <!-- AVATAR IMAGE BY FIRST LETTER OF NAME -->
                    <img src="https://ui-avatars.com/api/?name=Habib+Mhamadi&size=128&background=ff4433&color=fff" class="w-7 w-7 rounded-full" alt="Profile">
                    <h1>Habib Mhamadi</h1>
                </div>';
                echo '<a onclick="event.preventDefault(); document.getElementById(';echo'logoutForm';echo').submit()" href="#" class="hover:bg-gray-800 hover:text-white p-2 rounded">';
                   echo' <form id="logoutForm" action="" method="POST"></form>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>            
                    </form>
                </a>
            </div>

        </div>
    </nav>'; ;

    }

    function getListeClients(){
        $gestionCtrl = new GestionUtilisateursController();
        $res = $gestionCtrl->getListeClients();
        for ($i=0; $i <sizeof($res) ; $i++) { 
            echo '<tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">
                    '.$res[$i]['idt'].'
                </div>
            </td>
            <td class="py-3 px-6 text-left">
                <div class="flex items-center">
                    <div class="mr-2">
                        <img class="w-6 h-6 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwkmQMfn7k7MnrQ9GhzbrFFDo_OmvIdwrmQw&usqp=CAU"/>
                    </div>
                    <span>'.$res[$i]['nom'].' '.$res[$i]['prenom'].'</span>
                </div>
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['email'].'
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['tel'].'
            </td>
            <td class="py-3 px-6 text-center">
             <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Visiter le profil </button>
             <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Bannir</button>
            </td>
        </tr>';
        }
    }
}

?>