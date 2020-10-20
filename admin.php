<?php $page_selected = 'admin'; 
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>chat - admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/admin.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<header>
    <?php
    include("includes/header.php");

    $list_users = $admin->all_users(); // class admin -> methode pour récupérer la liste des utilisateurs
    $list_channels = $channel->channel(); // class channel -> methode pour récupérer la liste des channels
   ?>
   <?php if(isset ($_SESSION['user']) && ($_SESSION['user']['droits'] == 1)){ ?>
   <nav>
        <div class="nav-wrapper chan-nav">
            <p class="brand-logo center title_panel">PANEL ADMIN</p>
            <ul class=nav_admin>
                <li><a href="#channels">#CHANNELS</a></li>
                <li><a href="#users">#UTILISATEURS</a></li>
            </ul>
        </div>
    </nav>
   <?php } ?>
</header>
<main> 
    <?php if(isset ($_SESSION['user']) && ($_SESSION['user']['droits'] == 1)){ ?>
        <section class="pg_section" id="channels" >
        <p class="pg_section_title">#CHANNELS</p>
        <table class="striped table_channel channel_tab">
			<thead>
			    <tr>
                    <th>id</td>
				    <th>nom channel</td>
                    <th>modifier</td>
                    <th>supprimer</td> 
			    </tr>
            </thead>
            <tbody class="channel_body">
                <?php foreach ($list_channels as $channel){
                $id_channel = $channel['id_channel'];
                $name_channel = $channel['name_channel'];
                ?>
                <tr id="chan<?php echo $id_channel;?>">
                    <td><?= $id_channel?></td>
                    <td id="name_channel<?php echo $id_channel;?>"><?= $name_channel?></td>
                    <td>
                        <form class="rename" action="" method="POST">
                            <input type="hidden" name="id_channel" id="id_channel" value="<?= $id_channel ?>">
                            <input type="text" id="rename_channel<?php echo $id_channel;?>" name="rename_channel" placeholder="renommer" size="30">
                            <button type="submit" id="rename_button" name="rename" value='<?= $id_channel ?>'></button> 
                        </form>                           
                    </td>
                        <td>
                            <form class="delete_form" method='post' action =''>
                                <input class='deletebutton' id='<?= $id_channel ?>' type='submit' value='<?= $id_channel ?>' name='delete1'>
                            </form>
                        </td>  
                    </tr>
                <?php };?>
                </tbody>
            </table>
            <form id="create_chan" action="" method="POST">
                <label>créer un channel</label>
                <input type="text" id="create_channel" name="create_channel" placeholder="nouveau channel" size="30"></br>
                <button class="waves-effect waves-red btn black" type="submit" id="create" name="create">CRÉER</button>
            </form>     
    </section>
    <section class="pg_section" id="users">
        <p class="pg_section_title"># UTILISATEURS</p>
        <table class="striped table_channel">
			<thead>
			    <tr>
                    <th>id</td>
                    <th>login</td>
                    <th>statut</td>
                    <th>modif. statut</td>
                    <th>supprimer</td> 
			    </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($list_users as $users){
                        $id_user = $users['id'];
                        $login = $users['login'];
                        $status = $users['droits'];
                ?>
                <tr id="row<?php echo $id_user;?>">
                    <td><?= $id_user?></td>
                    <td><?= $login?></td>
                    <td id="status<?php echo $id_user;?>"><?= $status?></td>
                    <td>
                        <form class="user" action="" method="POST">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $id_user ?>"/>
                            <input type="text" id="change_status" name="change_status" placeholder="statut" size="10"/>
                            <button type="submit" id="submit_status" name="submit_status" value='<?= $id_user ?>'></button>
                        </form>
                    </td>
                    <td>
                        <form class="delete_user" action="" method='POST'>
                            <input type='submit' value='<?= $id_user ?>' id='<?= $id_user ?>' name='delete2' class='deletebutton'/>
                        </form>
                    </td>  
                </tr>
                <?php };?>
            </tbody>
        </table>
    </section>
    <?php }; ?>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>