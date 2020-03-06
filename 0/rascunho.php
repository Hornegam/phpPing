<?php 
              include '../controller/newfunctions.php';
              include '../model/conecta.inc';                  
              $escolas = getSchool();

              //Para pegar os nomes da escolas
              while($row = $escolas->fetch_assoc()) {
                echo  '<div class="column" style="padding-top: 25px;">
                <div class="ui cards">
                  <div class="card">
                    <div class="content">
                      <div class="center align header">
                          <form action="../view/school.php" method="post">
                                  <input type="hidden" name="teste" value="'.$row['nome'].'"/>
                                  <a class="white item" value="'.$row['nome'].'" name="teste" onclick="this.parentNode.submit()" style="text-align: center;">
                                      '.$row['nome'].'
                                  </a>
                                  <i class="right floated green circle icon" id="status" onclick="change("status")" name="status" style=""></i>
                          </form>
                       </div>
                    </div>
                </div>
            </div>  
         </div>';

               };?>