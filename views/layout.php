<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $data = $agents[];
        ?>
        
        <table>
            
            <thead>
            <th>Agent ID</th>
            <th>Event</th>
            <th>Time Created</th>
            <th>Event Description</th>
            </thead>
            
            <?php
            
                foreach($data as $agent)
                {         
            ?>           
                    <tr>
                        <td><?php $agent->AgentOID_usr ?></td>
                        <td><?php $agent->EventTypeOID_eve ?></td>
                        <td><?php $agent->EventDescription_ahe ?></td>
                    </tr>
            
            <?php            
                }
                
            ?>
            
        </table>
        
        
    </body>
</html>
