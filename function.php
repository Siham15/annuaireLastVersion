<?php

function validateEmail($email)
{
  $regex = "/^([a-zA-Z0-9.]+@+[a-zA-Z]+(.)+[a-zA-Z]{2,3})$/";
  if (!preg_match($regex, $email)) {
    echo "<div class='alert alert-danger'>Ceci n'est pas une adresse mail !</div>";
    echo "<a href='#' onclick='history.back();' class='btn btn-primary m-2'>Back</a>";
    exit;
  }
}
  