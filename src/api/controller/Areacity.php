<?php
namespace tpext\areacity\api\controller;

use think\Controller;
use tpext\areacity\api\model\Areacity as AreacityModel;

class Areacity extends Controller
{
    protected $dataModel;

    protected function initialize()
    {
        $this->dataModel = new AreacityModel;
    }

    public function province()
    {
        return json(
            [
                'data' => $this->dataModel->where(['deep' => 0])->select(),
            ]
        );
    }

    public function city()
    {
        $pid = input('q/d');
        return json(
            [
                'data' => $this->dataModel->where(['pid' => $pid, 'deep' => 1])->select(),
            ]
        );
    }

    public function area()
    {
        $pid = input('q/d');
        return json(
            [
                'data' => $this->dataModel->where(['pid' => $pid, 'deep' => 2])->select(),
            ]
        );
    }

    public function town()
    {
        $pid = input('q/d');
        return json(
            [
                'data' => $this->dataModel->where(['pid' => $pid, 'deep' => 3])->select(),
            ]
        );
    }

    public function cities()
    {
        $q = input('q');
        $page = input('page/d');

        $page = $page < 1 ? 1 : $page;
        $pagesize = 100;

        if ($q) {
            return json(
                [
                    'data' => $this->dataModel->where(['pinyin_prefix' => ['like', '%' . $q . '%'], 'deep' => 1])->order('pinyin_prefix')->limit(($page - 1) * $pagesize, $pagesize)->select(),
                ]
            );
        }
        return json(
            [
                'data' => $this->dataModel->where(['deep' => 1])->order('pinyin_prefix')->limit(($page - 1) * $pagesize, $pagesize)->select(),
            ]
        );
    }
}
