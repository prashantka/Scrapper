<?php

	$value = "400,000 €";
echo filter_var($value, FILTER_SANITIZE_NUMBER_INT);
?>