<?php
/**
 * Created by PhpStorm.
 * User: guo
 * Date: 2017/8/3
 * Time: 16:59
 */
namespace app\bis\validate;
use think\Validate;
class Deal extends Validate{
    protected $rule = [
        ['name', 'require|max:5','名称必须传递|分类名不能超过20个字符'],
        ['total_count' , 'number','库存数必须是数字'],
        ['origin_price' , 'number','原价必须是数字'],
        ['current_price' , 'number'],
        ['description' , 'max:200','描述不超过200个字符'],
        ['notes' , 'max:50','购买须知不超过50个字符']
    ];
}