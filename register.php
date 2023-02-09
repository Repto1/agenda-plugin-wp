<?php 


    function registro_render_page(){
        ?>
<html>
<link rel="stylesheet" href="./style.css">
<div class="container1">
    <h1>Inserir Colaborador</h1>
    <form method="post">
        <div class="input-group">
            <label>Nome</label>
            <input method="post" type="text" name="fullname" id="fullname" class="form-control"
                placeholder="Insira o nome aqui">
        </div>
        <br>
        <div class="input-group">
            <label>Email</label>
            <input method="post" type="text" name="email" id="email" class="form-control"
                placeholder="exemplo@email.com">
        </div>
        <br>
        <div class="input-group0">
            <input type="submit" name="botao_collaborator" value="registrar" class="form-control btn btn-danger">
        </div>
    </form>
</div>


<div class="container">
    <h1>Colaboradores</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <?php 
        
                global $wpdb;
                $table_collaborator = $wpdb->prefix.'collaborator'; 
                $collaborator = $wpdb->get_results("SELECT * FROM $table_collaborator ORDER BY id ASC");       
        ?>
        <tbody>
            <?php foreach ($collaborator as $valor_collaborator): ?>

            <tr>
                <td><?php echo $valor_collaborator->fullname; ?></td>
                <td><?php echo $valor_collaborator->email; ?></td>
                <td>
                    <button onclick="location.href='?apagar_id=<?php echo $valor_collaborator->id;?>'">Excluir</button>
                    <button onclick="getLinkForUpdateCollaborator()">Atualizar</button>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>


<div class="container1">
    <h1>Inserir Unidade Organizacional</h1>
    <form method="post">
        <div class="input-group">
            <label>Nome</label>
            <input method="post" type="text" name="uorg_name" id="uorg_name" class="form-control" placeholder="Insira o nome aqui">
        </div>
        <br>
        <div class="input-group">
            <label>Email</label>
            <input method="post" type="text" name="email" id="uorg_email" class="form-control" placeholder="exemplo@email.com">
        </div>
        <br>

        <div class="input-group">
            <label>Uorg Mãe</label>
            <select id="uorg_parent_id" name="uorg_parent_id">
                <?php 
                global $wpdb;
                $table_uorg = $wpdb->prefix.'uorg'; 
                $uorg = $wpdb->get_results("SELECT * FROM $table_uorg ORDER BY id ASC");
                ?>
                <?php foreach ($uorg as $valor): ?>
                <option value="<?php echo $valor->id ?>"><?php echo $valor->uorg_name?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <div class="input-group">
            <label>Responsável</label>
            <select id="responsible_id" name="responsible_id">
                <?php 
                global $wpdb;
                $table_collaborator = $wpdb->prefix.'collaborator'; 
                $collaborator = $wpdb->get_results("SELECT * FROM $table_collaborator ORDER BY id ASC");
                ?>
                <?php foreach ($collaborator as $valor): ?>
                <option value="<?php echo $valor->id ?>"><?php echo $valor->fullname?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="input-group">
            <label>Substituto</label>
            <select id="substitute_id" name="substitute_id">
                <?php 
            global $wpdb;
            $table_collaborator = $wpdb->prefix.'collaborator'; 
            $collaborator = $wpdb->get_results("SELECT * FROM $table_collaborator ORDER BY id ASC");
            ?>
                <?php foreach ($collaborator as $valor): ?>
                <option value="<?php echo $valor->id ?>"><?php echo $valor->fullname?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="input-group0">
            <input type="submit" name="botao_uorg" value="registrar" class="form-control btn btn-danger">
        </div>
    </form>
</div>

<div class="container">
    <h1>Unidades Organizacionais</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Uorg Mãe</th>
                <th scope="col">Responsável</th>
                <th scope="col">Substituto</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <?php 
                global $wpdb;
                $table_uorg = $wpdb->prefix.'uorg'; 
                $uorg = $wpdb->get_results("SELECT * FROM $table_uorg ORDER BY id ASC");
                $table_collaborator = $wpdb->prefix.'collaborator'; 
                $collaborator = $wpdb->get_results("SELECT * FROM $table_collaborator ORDER BY id ASC");

        ?>
        <tbody>
            <?php foreach ($uorg as $valor_uorg): ?>

            <tr>
                <td><?php echo $valor_uorg->uorg_name; ?></td>
                <td><?php echo $valor_uorg->email; ?></td>
                <td>
                    <?php foreach($uorg as $aux): ?>
                    <?php if($valor_uorg->uorg_parent_id == $aux->id) echo $aux->uorg_name; ?>
                    <?php endforeach ?>
                </td>
                <td>
                    <?php foreach($collaborator as $aux): ?>
                    <?php if($valor_uorg->responsible_id == $aux->id) echo $aux->fullname; ?>
                    <?php endforeach ?>
                </td>
                <td>
                    <?php foreach($collaborator as $aux): ?>
                    <?php if($valor_uorg->substitute_id == $aux->id) echo $aux->fullname; ?>
                    <?php endforeach ?>
                </td>
                <td>
                    <button onclick="location.href='?apagar_id=<?php echo $valor_uorg->id;?>'">Excluir</button>
                    <button onclick="getLinkForUpdateUorg()">Atualizar</button>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<div class="container1">
    <h1>Inserir Sala</h1>
    <form method="post">
        <div class="input-group">
            <label>Numero</label>
            <input type="text" name="room_number" id="room_number" class="form-control"
                placeholder="Insira o nome aqui">
        </div>
        <br>
        <div class="input-group">
            <label>Predio</label>
            <input type="text" name="predio" id="predio" class="form-control" placeholder="exemplo@email.com">
        </div>
        <br>
        <div class="input-group">
            <label>Andar</label>
            <input type="text" name="andar" id="andar" class="form-control" placeholder="exemplo@email.com">
        </div>
        <br>
        <div class="input-group">
            <label>Unidade Organizacional</label>
            <select id="uorg_id" name="uorg_id">
                <?php 
            global $wpdb;
            $table_uorg = $wpdb->prefix.'uorg'; 
            $uorg = $wpdb->get_results("SELECT * FROM $table_uorg ORDER BY id ASC");
            ?>
                <?php foreach ($uorg as $valor): ?>
                <option value="<?php echo $valor->id ?>"><?php echo $valor->uorg_name?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <div class="input-group0">
            <input type="submit" name="botao_room" value="registrar" class="form-control btn btn-danger">
        </div>
    </form>
</div>

<div class="container">
    <h1>Salas</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Predio</th>
                <th scope="col">Andar</th>
                <th scope="col">Unidade Organizacional</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <?php 
                global $wpdb;
                $table_room = $wpdb->prefix.'room'; 
                $room = $wpdb->get_results("SELECT * FROM $table_room ORDER BY id ASC");
                $table_uorg = $wpdb->prefix.'uorg'; 
                $uorg = $wpdb->get_results("SELECT * FROM $table_uorg ORDER BY id ASC");
                $table_uorg_room = $wpdb->prefix.'uorg_room'; 
                $uorg_room = $wpdb->get_results("SELECT * FROM $table_uorg_room ORDER BY id ASC");


        ?>
        <tbody>
            <?php foreach ($room as $valor_room): ?>

            <tr>
                <td><?php echo $valor_room->room_number; ?></td>
                <td><?php echo $valor_room->predio; ?></td>
                <td><?php echo $valor_room->andar; ?></td>
                <td>
                    <?php foreach($uorg_room as $uorg_room_value): ?>
                    <?php if($uorg_room_value->id == $valor_room->id)
                            {
                               foreach($uorg as $uorg_value):
                                    if($uorg_value->id == $uorg_room_value->uorg_id) echo $uorg_value->uorg_name;
                               endforeach;
                            }; ?>
                    <?php endforeach ?>
                </td>
                <td>
                    <button onclick="location.href='?apagar_id=<?php echo $valor_room->id;?>'">Excluir</button>
                    <button onclick="getLinkForUpdate()">Atualizar</button>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<script>
const fullnameInput = document.querySelector("input#fullname");
const emailInput = document.querySelector("input#email");

function getLinkForUpdateCollaborator() {
    location.href =
        `?update_collaborator_row=<?php echo $valor_collaborator->id;?>&fullname=${fullnameInput.value}&email=${emailInput.value}`;
};



const uorgNameInput = document.querySelector("input#uorg_name");
const uorgEmailInput = document.querySelector("input#uorg_email");

function getLinkForUpdateUorg() {
    location.href =
        `?update_uorg_row=<?php echo $valor_uorg->id;?>&uorgName=${uorgNameInput.value}&uorgEmail=${uorgEmailInput.value}`;
};



const roomNumberInput = document.querySelector("input#room_number");
const uorgRoomIdInput = document.querySelector("input#uorg_room_id");

function getLinkForUpdateRoom() {
    location.href =`?update_room_row=<?php echo $valor_room->id;?>&uorgName=${uorgNameInput.value}&uorgEmail=${uorgEmailInput.value}`;
};
</script>

</html>

<!-- COLLABORATOR -->

<?php
    }
    
    $table_collaborator = $wpdb->prefix.'collaborator'; 
 
    if(!empty($_POST['botao_collaborator'])){
        if(!empty($_POST['fullname']) AND !empty($_POST['email'])){
            $fullname = sanitize_text_field($_POST['fullname']);
            $email = sanitize_text_field($_POST['email']);

            global $wpdb;

            $wpdb->insert("$table_collaborator", array(
                'fullname' => $fullname,
                'email' => $email,
            ));

        }else{
            echo '<h1>Todos os campos são obrigatórios</h1>';
        }
    }
    if(!empty($_GET['apagar_id'])){
        global $wpdb;
        $id = sanitize_text_field($_GET['apagar_id']);
        $delete_collaborator = $wpdb->delete("$table_collaborator", array('id' => $id));
    };

    if (isset($_GET['update_collaborator_row'])) {
        $fullname = $_GET['fullname'];
        $email = $_GET['email'];
        global $wpdb;
        
        $id = intval( $_GET['update_collaborator_row'] );
        $table_collaborator = $wpdb->prefix.'collaborator'; 
        
        $data = array(
            'fullname' => $fullname,
        'email' => $email
        );
            
        $where = array(
            'id' => $id
        );

        $update_person = $wpdb->update(
            $table_collaborator, 
            $data,
            array( 'id' => $id ),
            array( '%s', '%s' ),
            array( '%d' )
        );

        if ( false === $update_person ) {
            // Erro na atualização
            echo '<script> alert("nao funcionou")</script>' . $wpdb->last_error;
            
        } else {
            // Atualização realizada com sucesso
            echo '<script> alert("nao funcionou")</script>';
        }
    }
?>

<!-- UORG -->

<?php
    
    $table_uorg = $wpdb->prefix.'uorg'; 

 
    if(!empty($_POST['botao_uorg'])){
        if(!empty($_POST['uorg_name']) AND !empty($_POST['email']) AND !empty($_POST['responsible_id']) AND !empty($_POST['substitute_id'])){
            $uorg_name = sanitize_text_field($_POST['uorg_name']);
            $email = sanitize_text_field($_POST['email']);
            $uorg_parent_id = sanitize_text_field($_POST['uorg_parent_id']);
            $responsible_id = sanitize_text_field($_POST['responsible_id']);
            $substitute_id = sanitize_text_field($_POST['substitute_id']);
            
            global $wpdb;

            $wpdb->insert("$table_uorg", array(
                'uorg_name' => $uorg_name,
                'email' => $email,
                'uorg_parent_id' => $uorg_parent_id,
                'responsible_id' => $responsible_id,
                'substitute_id' => $substitute_id,
            ));

        }else{
            echo '<h1>Todos os campos são obrigatórios</h1>';
        }
    }
    if(!empty($_GET['apagar_id'])){
        global $wpdb;
        $id = sanitize_text_field($_GET['apagar_id']);
        $delete_person = $wpdb->delete("$table_uorg", array('id' => $id));
    }

    if (isset($_GET['update_uorg_row'])) {
        $uorg_name = $_GET['uorg_name'];
        $uorg_email = $_GET['uorg_email'];
        global $wpdb;
        
        $id = intval( $_GET['update_uorg_row'] );
        $table_uorg = $wpdb->prefix.'uorg'; 
        
        $data = array(
            'uorg_name' => $uorg_name,
        'email' => $uorg_email
        );
            
        $where = array(
            'id' => $id
        );

        $update_uorg = $wpdb->update(
            $table_uorg, 
            $data,
            array( 'id' => $id ),
            array( '%s', '%s' ),
            array( '%d' )
        );

        if ( false === $update_uorg ) {
            // Erro na atualização
            echo '<script> alert("nao funcionou")</script>' . $wpdb->last_error;
            
        } else {
            // Atualização realizada com sucesso
            echo '<script> alert("nao funcionou")</script>';
        }
    }


    
?>


<!-- ROOM -->

<?php
    
    $table_room = $wpdb->prefix.'room'; 
    $table_uorg_room = $wpdb->prefix.'uorg_room'; 
    $room = $wpdb->get_results("SELECT MAX(id) as last_id FROM $table_room");
    foreach($room as $valor):
        $room_id = $valor->last_id+1;
    endforeach;


    
 
    if(!empty($_POST['botao_room'])){
        if(!empty($_POST['room_number']) AND !empty($_POST['predio']) AND !empty($_POST['andar']) AND !empty($_POST['uorg_id'])){
            $room_number = sanitize_text_field($_POST['room_number']);
            $predio = sanitize_text_field($_POST['predio']);
            $andar = sanitize_text_field($_POST['andar']);
            $uorg_id = sanitize_text_field($_POST['uorg_id']);
                 

            global $wpdb;

            $wpdb->insert("$table_room", array(
                'room_number' => $room_number,
                'predio' => $predio,
                'andar' => $andar,
            ));
            $wpdb->insert("$table_uorg_room", array(
                'uorg_id' => $uorg_id,
                'room_id' => $room_id,
            ));

        }else{
            echo '<h1>Todos os campos são obrigatórios</h1>';
        }
    }
    if(!empty($_GET['apagar_room_id'])){
        global $wpdb;
        $id_uorg_room = sanitize_text_field($_GET['apagar_room_id']);
        $id_room = sanitize_text_field($_GET['apagar_room_id']);
        $delete_uorg_room = $wpdb->delete("$table_uorg_room", array('id' => $id_uorg_room));
        $delete_room = $wpdb->delete("$table_room", array('id' => $id_room));
    }
?>