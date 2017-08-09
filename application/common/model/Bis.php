<?php
namespace app\common\model;

use think\Model;

class Bis extends BaseModel
{
    /**
     * 通过状态获取商家数据
     * @param $status
     */
    public function getBisByStatus($status=0) {
//        $order = [
//            'id' => 'desc',
//        ];
        $order= [
            'id' => 'desc',
        ];
        $data = [
            'status' => $status,
        ];
        $result = $this->where($data)
            ->order($order)
            ->paginate();
        return $result;
    }
    public function getBisId(){
        $data = [
            'status '=> ['eq',1],
        ];
        $order = [
            'id' => 'desc',
        ];
        $result = $this->where($data)
            ->order($order)
            ->select();
        return $result;
    }
}