<?php
namespace app\common\model;

use think\Model;

class BisLocation extends BaseModel
{

    public function getNormalLocationByBisId($bisId) {
        $data = [
            'bis_id' => $bisId,
            'status' => 1,
        ];

        $result = $this->where($data)
            ->order('id', 'desc')
            ->select();
        return $result;
    }

    public function getNormalLocationsInId($ids) {
        $data = [
            'id' => ['in', $ids],
            'status' => 1,
        ];
        return $this->where($data)
            ->select();
    }

    public function getLocation(){
        //获取的条件
        $data = [
            'status' => ['neq',-1],
        ];
        //排序，按id倒序排列
        $order = [
            'id' => 'desc',
         ];
        $result = $this->where($data)
            ->order($order)
            ->select();
        return $result;
    }

}