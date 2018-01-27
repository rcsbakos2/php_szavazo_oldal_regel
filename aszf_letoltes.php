<?php
header("Content-disposition: attachment; filename=aszf.txt");
header("Content-type: application/pdf");
readfile("aszf.txt");?>