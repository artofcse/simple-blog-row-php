<?php

function connectBD() {
	$con = mysqli_connect('localhost', 'root', 'root', 'class__blog');
	return $con;
}