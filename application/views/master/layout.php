<?php 
	$data1['url'] = base_url();
	$this->parser->parse('master/header',$data1);
	$this->parser->parse($template,$data);
	$this->parser->parse('master/footer',$data1);
 ?>