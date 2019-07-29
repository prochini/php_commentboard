<?php 
require_once('./conn.php');
session_start();
if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
            $content = htmlspecialchars($_POST['content'],ENT_QUOTES);
            $nickname = $_POST['nickname'];
            $parent_id = $_POST['parent_id'];
            if(empty($content)){echo"請輸入資料";exit();}            
            $selectUserName = "SELECT username FROM prochini_users WHERE nickname ='$nickname'";
            $result = $conn->query($selectUserName);
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $addMessage ="INSERT INTO prochini_comment(username, content, parent_id) VALUES(?, ?, ?)";
            $stmt = $conn ->stmt_init();
            if (!$stmt->prepare($addMessage)){
                echo"SQL statement failed";
            }else{
                $stmt->bind_param("ssi", $username, $content,$parent_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $commentInfo = 
                "SELECT c.parent_id, c.content, c.id, c.created_at, u.nickname , u.username
                FROM prochini_comment as c
                JOIN prochini_users as u
                ON c.username = u.username 
                WHERE nickname = ? 
                order by id DESC
                Limit 1
                ";
                $stmt = $conn ->stmt_init();
                if (!$stmt->prepare($commentInfo)){
                    echo"getComment failed";
                }else{
                    $stmt->bind_param("s", $nickname);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $arr = array( 
                        'nickname' => $row['nickname'],
                        'created_at' => $row['created_at'],
                        'content' => $row['content'], 
                        'id'=> $row['id'],
                        'username'=> $row['username'],
                        'parent_id' => $row['parent_id']
                        );                 
                        $json_string = json_encode($arr); 
                        echo "$json_string"; 
            }
            }            
        } else {
            echo "請登入留言";
        }

;


?>

