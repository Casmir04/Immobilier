<?php

function getCategory($db,$id){
    $query="SELECT * FROM category WHERE id=$id";
    $run=mysqli_query($db,$query);
    $data = mysqli_fetch_assoc($run);
    return$data['name'];
}

function getAllCategory($db){
    $query="SELECT * FROM category";
    $run=mysqli_query($db,$query);
    $data = array();
    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}

function getImagesByPost($db,$appart_id){
    $query="SELECT * FROM images WHERE appart_id=$appart_id";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}


function getAvis($db,$post_id){
    $query="SELECT * FROM clients WHERE post_id=$post_id ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}


// function getSubMenu($db,$menu_id){
//     $query="SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
//     $run=mysqli_query($db,$query);
//     $data = array();

//     while($d= mysqli_fetch_assoc($run)){
//         $data[]=$d;
//     }
//     return $data;
// }

// function getSuMenuNo($db,$menu_id){
//     $query="SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
//     $run=mysqli_query($db,$query);
//     return mysqli_num_rows($run);
// } 

function getAdminInfo($db,$email){
    $query="SELECT * FROM admin WHERE email='$email'";
    $run=mysqli_query($db,$query);
    $data = mysqli_fetch_assoc($run);
    return $data;
}
function getMembre($db){
    $query="SELECT * FROM membre";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}

function getclients($db){
    $query="SELECT * FROM clients";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}
// function getAllSubMenu($db){
//     $query="SELECT * FROM submenu";
//     $run=mysqli_query($db,$query);
//     $data = array();

//     while($d= mysqli_fetch_assoc($run)){
//         $data[]=$d;
//     }
//     return $data;
// }

// function getAllMenu($db){
//     $query="SELECT * FROM membre";
//     $run=mysqli_query($db,$query);
//     $data = array();

//     while($d= mysqli_fetch_assoc($run)){
//         $data[]=$d;
//     }
//     return $data;
// }
// function getMenuName($db,$id){
//     $query="SELECT * FROM menu WHERE id=$id";
//     $run=mysqli_query($db,$query);
//     $data = mysqli_fetch_assoc($run);
//     return $data['name'];
// }

function getAllPost($db){
    $query="SELECT * FROM appartement ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data;
}

function getPostThumb($db,$id){
    $query="SELECT * FROM images WHERE appart_id=$id";
    $run=mysqli_query($db,$query);
    $data = mysqli_fetch_assoc($run);
    return $data['images'];
}

?>

