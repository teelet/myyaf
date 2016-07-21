<?php
/**
 * Index 模块下，所有controller的父类
 */

class AbstractController extends Yaf_Controller_Abstract {
    
    /*模版文件*/
    protected $tpl = '';
    
    /*模版渲染*/
    public function assign(&$data, $return_string = FALSE){
        try {
            $view = new Yaf_View_Simple(TPL_PATH);
            $view->assign($data);
            $html = $view->render($this->tpl);
            if($return_string){
                return $html;
            }else{
                echo $html;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /*输出json串*/
    public function jsonResult(&$data, $json_encode = TRUE) {
        try {
            if($json_encode){
                header('Content-type:text/json; charset=utf-8');
                echo json_encode($data);
            }else{
                return json_decode($data);
            }
        }catch (Exception $e) {
            echo $e->getMessage();
        } 
    }
    
    public function end() {
        //关闭自动渲染
        return FALSE;
    }
}