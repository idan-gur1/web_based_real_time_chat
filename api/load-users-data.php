<?php
    while($row = mysqli_fetch_assoc($sql)){
        $fetchMsgQuery = "SELECT * FROM messages WHERE (target_id = ? OR target_id = ?) 
                          AND (sender_id = ? OR sender_id = ?) ORDER BY msg_id DESC LIMIT 1";
        $msgSql = mysqli_execute_query($conn, $fetchMsgQuery, [$outgoing_id, $row['user_id'], $outgoing_id, $row['user_id']]);

        if (mysqli_num_rows($msgSql) > 0) {
            $msgRow = mysqli_fetch_assoc($msgSql);
            $result = $msgRow['msg'];

            $msg = strlen($result) > 20 ? substr($result, 0, 20).'...' : $result;
            if ($msgRow['sender_id'] == $outgoing_id) {
                $msg = "You: " . $msg;
            } else {
                $msg =  $row['fname']. ": " . $msg;
            }
        } else {
            $msg = "No messages Yet";
        }

        $offline = $row['status'] == "Offline now" ? "offline" : "";

        $output .= '<a href="chat.php?user_id='. $row['user_id'] . '">
                    <div class="content">
                    <img src="api/' . $row['img'] . '" alt="">
                    <div class="details">
                        <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        <p>' . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle ' . $offline . '"></i></div>
                </a>';
    }
?>