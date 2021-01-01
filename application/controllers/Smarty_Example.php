<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smarty_Example extends CI_Controller{

            public function __construct()
            {
                parent::__construct();
            }

            public function index()
            {
                $data = array(
                	'title' => 'Smarty_Example',
                    'body' => 'This is body text to show that the Smarty Parser works!'
                );
                $this->parser->parse('index', $data);
            }
    }