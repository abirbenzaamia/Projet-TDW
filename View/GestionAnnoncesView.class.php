<?php

class GestionAnnoncesView{

    function diplayAnnoncesValid($res){
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
                    <span>'.$res[$i]['id_utilisateur'].'</span>
                </div>
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['type_transp'].'
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['tarif'].' DA
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['date_ajout'].'
            </td>';
            if ($res[$i]['etat'] == null) {
               echo' <td class="py-3 px-6 text-center">
               <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">En attente</span>
           </td><td class="py-3 px-6 text-center">
           /
          </td>';
            } else {
                echo '<td class="py-3 px-6 text-center">
                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">'.$res[$i]['etat'].'</span>
            </td>';
                echo' <td class="py-3 px-6 text-center">
                '.$res[$i]['idTC'].' '.$res[$i]['idTNC'].'
               </td>';
            }
            
            echo'<td class="py-3 px-6 text-center">
             <a href="GestionTransporteurs.php?bannir='.$res[$i]['id'].'"class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Annuler</a>
            </td>
        </tr>';
        }
    }
    function diplayAnnoncesNonValid($res){
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
                    <span>'.$res[$i]['id_utilisateur'].'</span>
                </div>
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['type_transp'].'
            </td>
            <td class="py-3 px-6 text-center">
            '.$res[$i]['date_ajout'].'
            </td>';
        
            
            echo'<td class="py-3 px-6 text-center">
             <a href="GestionAnnonces.php?valider='.$res[$i]['id'].'&dep='.$res[$i]['wilaya_dep'].'&arv='.$res[$i]['wilaya_arv'].'"class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Valider</a>
             <a href="GestionTransporteurs.php?bannir='.$res[$i]['id'].'"class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Annuler</a>

            </td>
        </tr>';
        }
    }
    
}

?>