<?php
try {
    session_start();
    session_start();
    session_unset();

    echo json_encode(true);
} catch(\Throwable $th){
    echo json_encode(false);
}