<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected  $autoWriteTimestamp = true;//设置这个属性就是把create_time设置成当前时间，所以可以把那行注释掉
    public function add($data) {
        $data['status'] = 1;
        //$data['create_time'] = time();
        $result =  $this->save($data);
        //echo $this->getLastSql();exit;
        return $result;
    }

    public function getNormalFirstCategory() {
        //获取一级栏目的条件
        $data = [
            'status' => 1,
            'parent_id' => 0,
        ];

        $order = [
            'id' => 'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }

    public function getFirstCategorys($parentId = 0) {
        $data = [
            'parent_id' => $parentId,
            'status' => ['neq',-1],
        ];

        $order =[
            'listorder' => 'desc',
            'id' => 'desc',
        ];
        $result = $this->where($data)
            ->order($order)
            ->paginate();
        //echo $this->getLastSql();

        return $result;

    }

    public function getNormalCategoryByParentId($parentId=0) {
        $data = [
            'status' => 1,
            'parent_id' => $parentId,
        ];

        $order = [
            'id' => 'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }

    public function getNormalRecommendCategoryByParentId($id=0, $limit=5) {
        $data = [
            'parent_id' => $id,
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)
            ->order($order);
        if($limit) {
            $result = $result->limit($limit);
        }

        return $result->select();

    }

    public function getNormalCategoryIdParentId($ids) {
        $data = [
            'parent_id' => ['in', implode(',', $ids)],
            'status' => 1,
        ];

        $order = [
            'listorder' => 'desc',
            'id' => 'desc',
        ];

        $result = $this->where($data)
            ->order($order)
            ->select();

        return $result;
    }
}