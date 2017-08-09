<?php
/**
 * Created by PhpStorm.
 * User: guo
 * Date: 2017/7/31
 * Time: 10:30
 */
namespace app\admin\controller;
use think\Controller;

Class City extends Controller
{
    private $obj;
    public function _initialize(){
        $this->obj = model("City");
    }

    public function index(){
        $citys =$this->obj->getCity();
        return $this->fetch('',[
            'citys'=>$citys,
        ]);
    }
}