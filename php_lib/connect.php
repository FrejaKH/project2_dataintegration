<?php

$connect = mysqli_connect("localhost", "root", "root", "fortidsminderdb");

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
