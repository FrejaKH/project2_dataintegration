<?php

$connect = mysqli_connect("127.0.0.1", "reneseebach", "hvu2375", "fortidsminderdb");

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
