<?php

include 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../login.php");

?>