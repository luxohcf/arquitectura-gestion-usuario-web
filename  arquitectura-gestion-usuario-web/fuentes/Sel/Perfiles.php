<?php
require("../../config/parametros.php");
@session_start();
$idCli = $_SESSION['id_Cliente'];
$id = (isset($_POST['FormRegUsuIDUsu']))?$_POST['FormRegUsuIDUsu']:NULL;
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

//http://www.designchemical.com/blog/index.php/jquery/create-add-remove-select-lists-using-jquery/

$html = "<script type='text/javascript'>
            $(document).ready(function() {
             
                $('#btn-add').click(function(){
                    $('#PerAsignados option:selected').each( function() {
                            $('#PerListado').append(\"<option value='\"+$(this).val()+\"'>\"+$(this).text()+\"</option>\");
                        $(this).remove();
                    });
                });
                $('#btn-remove').click(function(){
                    $('#PerListado option:selected').each( function() {
                        $('#PerAsignados').append(\"<option value='\"+$(this).val()+\"'>\"+$(this).text()+\"</option>\");
                        $(this).remove();
                    });
                });
             
            });
         </script>
         <fieldset>
            <legend>Perfiles</legend>
            <select name='PerAsignados' id='PerAsignados' multiple size='5'>
              <option value='1'>Item 1</option>
              <option value='2'>Item 2</option>
              <option value='3'>Item 3</option>
              <option value='4'>Item 4</option>
            </select>
         
            <a href='JavaScript:void(0);' id='btn-add'>Add &raquo;</a>
            <a href='JavaScript:void(0);' id='btn-remove'>&laquo; Remove</a>
         
            <select name='PerListado' id='PerListado' multiple size='5'>
              <option value='5'>Item 5</option>
              <option value='6'>Item 6</option>
              <option value='7'>Item 7</option>
            </select>
         </fieldset>";

$data["html"] = "$html";
echo json_encode($data);

?>

