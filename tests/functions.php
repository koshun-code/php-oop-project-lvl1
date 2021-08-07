<?php 

function str_starts_with($value, $start)
{
	return substr($value, 0, 1) === $start;
}