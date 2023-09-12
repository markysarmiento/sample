<?php

class usermodel {
    public function getUserByUsername($conn, $username) {
        $query = "SELECT * FROM user1
        INNER JOIN role ON user1.RoleID = role.RoleID
        INNER JOIN privileges ON role.PrivilegesID = privileges.PrivilegesID
        WHERE user1.username='$username'";
        $result = $conn->query($query);
        return ($result->num_rows == 1) ? $result->fetch_assoc() : null;
    }
}
?>
