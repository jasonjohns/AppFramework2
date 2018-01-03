<?php
//require_once $basr_dir . '/lib/Smarty.class.php';

define('FLASH_INFO', 'info');
define('FLASH_SUCCESS', 'success');
define('FLASH_ERROR', 'error');

class Application{
    protected $sm;
    protected $_errors;
    protected $_error_fields;
    protected $_success;
    protected $_info;
    protected $_config;
    protected $_crumbs;
    protected $_header_nav;
    protected $_left_nav;
    protected $_pages;
    protected $_page;
    protected $_app;
    private $_levels;
    protected $date_fields;
    protected $time_fields;

    public function __construct(){
      global $base_dir;
        $this->sm = new Smarty;
        $this->sm->addPluginsDir($base_dir . 'lib/helpers');
        $this->levels = array('info', 'error', 'success');
        foreach($this->levels as $level){
            if(is_array($_SESSION[$level])){
                foreach($_SESSION[$level] as $message){
                    $this->{$level}($message);
                }
                $_SESSION[$level] = '';
            }
        }


    }
    public function flash($message, $level = FLASH_INFO){
        if(in_array($level, $this->levels)){
            $_SESSION[$level][]=$message;
        }
    }
    public function page($key, $val=''){
        if($val == ''){
            return $this->_page[$key];
        }else{
            $this->_page[$key]=$val;
        }
    }

    public function set($var,$val){
        $this->sm->assign($var, $val);
    }


    public function error(){

        if(func_num_args() == 0){
            return count($this->_errors);
        }elseif(func_num_args() == 1){
            $this->_errors[]=func_get_arg(0);
        }else{
            $this->_error_fields[func_get_arg(0)]=true;
            $this->_errors[]=func_get_arg(1);
        }
    }

    public function errorField($field){
        $this->_error_fields[$field] = true;
    }

    public function success($message = ''){
        if($message == ''){
            return count($this->_success);
        }else{
            $this->_success[]=$message;
        }
    }
    public function info($message = ''){
        if($message == ''){
            return count($this->_info);
        }else{
            $this->_info[]=$message;
        }
    }

    public function pages($pages = ''){
        if($pages == ''){
            return count($this->_pages);
        }else{
            $this->_pages = $pages;
        }
    }

    public function config($var, $val=''){
        if(func_num_args() == 1){
            return $this->_app[$var];
        }else{
            $this->_app[$var]=$val;
        }
    }

    public function crumb($title, $url=''){
        $this->_crumbs[]=array('title'=>$title,'url'=>$url);
    }

    public function header_nav($title, $url='', $subnav=''){
        if(is_array($subnav)){
            $this->_header_nav[]=array('title'=>$title,'url'=>$url, 'dropdown'=>true, 'subnav'=>$subnav);
        }else{
            if(substr($url,0,1) != '/'){
                $url = '/'.$url;
            }
            if($url == $_SERVER['SCRIPT_NAME']){
                $active = true;
            }else{
                $active = false;
            }
            $this->_header_nav[]=array('title'=>$title,'url'=>$url, 'dropdown'=>false, 'active' => $active);
        }

    }
    public function left_nav($title, $url=''){
        $this->_left_nav[]=array('title'=>$title, 'url'=>$url);
    }

    public function render($template, $layout='layout'){
        global $notes;
        if($this->error()){
            $this->set('_errors', $this->_errors);
            foreach($_REQUEST as $key => $val){
                $this->sm->assign($key,$val);
            }
        }
        if(count($this->_crumbs)>1){
            $this->sm->assign('_crumbs', $this->_crumbs);
        }

        if($this->pages()){
            $this->sm->assign('_pages', $this->_pages);
            $this->sm->assign('_needs_pagination', true);
        }
        $this->sm->assign('error_fields', $this->_error_fields);
        $this->sm->assign('_page', $this->_page);
        $this->sm->assign('_app', $this->_app);
        $this->sm->assign('_crumbs', $this->_crumbs);
        $this->sm->assign('_header_nav', $this->_header_nav);
        $this->sm->assign('_left_nav', $this->_left_nav);
        $this->sm->assign('_info', $this->_info);
        $this->sm->assign('_success', $this->_success);
        $this->sm->assign('_config',$this->_config);
        $tpl = $template.'.tpl';
        $this->sm->assign('_template', $tpl);
       // $this->sm->assign('_notes', $notes->get($tpl));
        echo $this->sm->fetch($layout.'.tpl');
        if($_GET['_debug'] == 'true'){
            echo "<h2>Smarty</h2>";
            dump($this->sm->getTemplateVars());
            echo "<h2>SESSION</h2>";
            dump($_SESSION);
            echo "<h2>REQUEST</h2>";
            dump($_REQUEST);
            echo "<h2>SERVER</h2>";
            dump($_SERVER);
            echo "<h2>OTHER</h2>";
            echo "<h3>Plugins Dir(s)</h3>";
            dump($this->sm->getPluginsDir());
        }
    }
}

function dump($array){
    print "<pre>"; print_r($array); print "</pre>";
}
?>
