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
        $selected = input('selected');
        if ($selected) {
            return json(
                [
                    'data' => $this->dataModel->where('id', 'in', $selected)->select(),
                ]
            );
        }

        $q = input('q');

        $where = [
            ['deep', '=', 0],
        ];

        if ($q) {
            $where[] = ['ext_name|name|pinyin_prefix', 'like', "%$q%"];
        }

        return json(
            [
                'data' => $this->dataModel->where($where)->select(),
            ]
        );
    }

    public function city()
    {
        $selected = input('selected');
        if ($selected) {
            return json(
                [
                    'data' => $this->dataModel->where('id', 'in', $selected)->select(),
                ]
            );
        }
        $q = input('q');
        $prev_val = input('prev_val/d');

        $where = [
            ['deep', '=', 1],
        ];

        if ($prev_val) {
            $where[] = ['pid', '=', $prev_val];
            if ($q) {
                $where[] = ['ext_name|name|pinyin_prefix', 'like', "%$q%"];
            }
        } else {
            if (is_numeric($q)) {
                $where = ['pid', '=', $q];
            } else {
                return json(
                    [
                        'data' => [],
                    ]
                );
            }
        }

        return json(
            [
                'data' => $this->dataModel->where($where)->select(),
            ]
        );
    }

    public function area()
    {
        $selected = input('selected');
        if ($selected) {
            return json(
                [
                    'data' => $this->dataModel->where('id', 'in', $selected)->select(),
                ]
            );
        }

        $q = input('q');
        $prev_val = input('prev_val/d');

        $where = [
            ['deep', '=', 2],
        ];

        if ($prev_val) {
            $where[] = ['pid', '=', $prev_val];
            if ($q) {
                $where[] = ['ext_name|name|pinyin_prefix', 'like', "%$q%"];
            }
        } else {
            if (is_numeric($q)) {
                $where[] = ['pid', '=', $prev_val];
            } else {
                return json(
                    [
                        'data' => [],
                    ]
                );
            }
        }

        return json(
            [
                'data' => $this->dataModel->where($where)->select(),
            ]
        );
    }

    public function town()
    {
        $selected = input('selected');
        if ($selected) {
            return json(
                [
                    'data' => $this->dataModel->where('id', 'in', $selected)->select(),
                ]
            );
        }

        $q = input('q');
        $prev_val = input('prev_val/d');

        $where = [
            ['deep', '=', 3],
        ];

        if ($prev_val) {
            $where[] = ['pid', '=', $prev_val];
            if ($q) {
                $where[] = ['ext_name|name|pinyin_prefix', 'like', "%$q%"];
            }
        } else {
            if (is_numeric($q)) {
                $where = ['pid', '=', $prev_val];
            } else {
                return json(
                    [
                        'data' => [],
                    ]
                );
            }
        }

        return json(
            [
                'data' => $this->dataModel->where($where)->select(),
            ]
        );
    }

    public function cities()
    {
        $q = input('q');
        $page = input('page/d');

        $page = $page < 1 ? 1 : $page;
        $pagesize = 30;

        if ($q) {
            $data = $this->dataModel->where([['deep', '=', 1], ['pinyin_prefix|ext_name|name', 'like', "%$q%"]])->order('pinyin_prefix')->limit(($page - 1) * $pagesize, $pagesize)->select();
            return json(
                [
                    'data' => $data,
                    'has_more' => count($data) == $pagesize,
                ]
            );
        }
        $data = $this->dataModel->where(['deep' => 1])->order('pinyin_prefix')->limit(($page - 1) * $pagesize, $pagesize)->select();
        return json(
            [
                'data' => $data,
                'has_more' => count($data) == $pagesize,
            ]
        );
    }
}
