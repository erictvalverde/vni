<?php
include('db.php');

$chave = '526534252';

$res = @db_existe_chave($chave);

if($res){
	print 'Existe! ' . $chave;
}
else{
	@db_insert($chave, 'rafael2reis@gmail.com', '13');
}

?>