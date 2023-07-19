<?php
    session_start();

    if(!isset($_SESSION['user_id'])){

        header("location: ../login.php");
    }

    include_once "db.php";

    $self_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    
    $output = "";
    
    $fetchMsgQuery = "SELECT * FROM messages
                      LEFT JOIN users ON users.user_id = messages.sender_id
                      WHERE (target_id = ? OR target_id = ?) 
                          AND (sender_id = ? OR sender_id = ?) ORDER BY msg_id";

    $msgSql = mysqli_execute_query($conn, $fetchMsgQuery, [$self_id, $incoming_id, $self_id, $incoming_id]);

    if (mysqli_num_rows($msgSql) > 0) {
        while ($row = mysqli_fetch_assoc($msgSql)) {
            if ($row["sender_id"] == $self_id) {
                $output .= '<div class="chat outgoing">
                            <div class="details">
                            <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                            <img src="api/'.$row['img'].'" alt="">
                            <div class="details">
                            <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            }
        }
    }
    exit($output);
?>
