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
                    <a href="GestionAnnonces.php" class="block py-2.5 px-4 flex items-center space-x-2 hover:bg-gray-800 hover:text-white rounded">
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
            <a href="ProfilClient.php?profil='.$res[$i]['idt'].'" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Voir le profil </a>
            <a href="GestionClients.php?bannir='.$res[$i]['idt'].'"class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Bannir</a>
            </td>
        </tr>';
        }
    }
    function getListeTransporteursVerif(){
        $gestionCtrl = new GestionUtilisateursController();
        $res = $gestionCtrl->getListeTransporteursVerif();
        for ($i=0; $i <sizeof($res) ; $i++) { 
            echo '<tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">
                    '.$res[$i]['id'].'
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
            </td>';
            if ($res[$i]['statut_demande'] == NULL) {
               echo' <td class="py-3 px-6 text-center">
                NON
               </td><td class="py-3 px-6 text-center">
               /
           </td>';
            } else {
                echo' <td class="py-3 px-6 text-center">
                OUI
               </td><td class="py-3 px-6 text-center">
               <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">'.$res[$i]['statut_demande'].'</span>
           </td>';
            }
            
            echo'<td class="py-3 px-6 text-center">
             <a href="ProfilClient.php?profil='.$res[$i]['id'].'" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Voir le profil </a>
             <a href="GestionTransporteurs.php?bannir='.$res[$i]['id'].'"class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Bannir</a>
            </td>
        </tr>';
        }
    }
    function getListeTransporteursNonVerif(){
        $gestionCtrl = new GestionUtilisateursController();
        $res = $gestionCtrl->getListeTransporteursNonVerif();
        for ($i=0; $i <sizeof($res) ; $i++) { 
            echo '<tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">
                    '.$res[$i]['id'].'
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
            </td>';
            if ($res[$i]['statut_demande'] == NULL) {
               echo' <td class="py-3 px-6 text-center">
                NON
               </td><td class="py-3 px-6 text-center">
               <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">/</span>
           </td>';
            } else {
                echo' <td class="py-3 px-6 text-center">
                OUI
               </td><td class="py-3 px-6 text-center">
               <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">'.$res[$i]['statut_demande'].'</span>
           </td>';
            }          
            echo'<td class="py-3 px-6 text-center">
             <a href="ProfilClient.php?profil='.$res[$i]['id'].'" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Voir le profil </a>
             <a href="GestionTransporteurs.php?valid='.$res[$i]['id'].'" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Valider</a>
             <a href="GestionTransporteurs.php?bannir='.$res[$i]['id'].'"class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Bannir</a>
            </td>
        </tr>';
        }
    }
    function displayProfilClient($res){
        echo'   <div class="container bootdey flex-grow-1 container-p-y">

        <div class="media align-items-center py-3 mb-3">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwkmQMfn7k7MnrQ9GhzbrFFDo_OmvIdwrmQw&usqp=CAU" alt="" class="d-block ui-w-100 rounded-circle">
          <div class="media-body ml-4">
            <h4 class="font-weight-bold mb-0">'.$res[0]['nom'].' '.$res[0]['prenom'].' </h4>
            <div class="text-muted mb-2">ID:'.$res[0]['id'].'</div>
            <button type="button" class="btn btn-outline-success">Valider</button>
            <button type="button" class="btn btn-outline-danger">Bannir</button>
           
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <table class="table user-view-table m-0">
              <tbody>
                <tr>
                  <td>rejoiné le </td>
                  <td>'.$res[0]['date_insc'].'</td>
                </tr>
                
                <tr>
                  <td>Vérifié</td>
                  <td><span class="fa fa-check text-primary"></span>&nbsp; ';
                  if ($res[0]['statut'] ==TRUE) {
                    echo 'OUI';
                  } else {
                    echo 'NON';
                  }
                  
                  echo '</td>
                </tr>
                <tr>
                  <td>Type du compte</td>
                  <td>';
                  if ($res[0]['statut_demande']== NULL) {
                    echo 'transporteur non certifié'.$res[0]['statut_demande'].' ';

                  } else {
                    echo 'transporteur certifié <tr><td>Etat de la demande de certification </td><td>'.$res[0]['statut_demande'].'</td></tr>';
                  }
                  
                  echo'</td>
                </tr>
                <tr><td>Email</td><td>'.$res[0]['email'].'</td></tr>
                <tr><td>N° téléphone</td><td>'.$res[0]['tel'].'</td></tr>
              </tbody>
            </table>
          </div>
          <hr class="border-light m-0">
          <div class="table-responsive">
            <table class="table card-table m-0">
              <tbody>
                <tr>
                  <th>Annonce publié</th>
                  <th>Type de transport</th>
                  <th>Statut</th>
                  <th>Valider</th>
                  <th>Consulter</th>
                </tr>
                <tr>
                  <td>Users</td>
                  <td><span class="fa fa-check text-primary"></span></td>
                  <td><span class="fa fa-times text-light"></span></td>
                  <td><span class="fa fa-times text-light"></span></td>
                  <td><span class="fa fa-times text-light"></span></td>
                </tr>
             
              </tbody>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="row no-gutters row-bordered">
            <div class="d-flex col-md align-items-center">
              <a href="javascript:void(0)" class="card-body d-block text-body">
                <div class="text-muted small line-height-1">Posts</div>
                <div class="text-xlarge">125</div>
              </a>
            </div>
            <div class="d-flex col-md align-items-center">
              <a href="javascript:void(0)" class="card-body d-block text-body">
                <div class="text-muted small line-height-1">Followers</div>
                <div class="text-xlarge">534</div>
              </a>
            </div>
            <div class="d-flex col-md align-items-center">
              <a href="javascript:void(0)" class="card-body d-block text-body">
                <div class="text-muted small line-height-1">Following</div>
                <div class="text-xlarge">236</div>
              </a>
            </div>
          </div>
          <hr class="border-light m-0">
       
          
        </div>

      </div>';
    }
}

?>