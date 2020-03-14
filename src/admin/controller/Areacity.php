<?php
namespace tpext\areacity\admin\controller;

use think\Controller;
use tpext\areacity\api\model\Areacity as AreacityModel;
use tpext\builder\common\Builder;

class Areacity extends Controller
{
    protected $dataModel;

    protected function initialize()
    {
        $this->dataModel = new AreacityModel;
    }

    public function index()
    {
        $builder = Builder::getInstance('Demo', 'Areacity');
        $form = $builder->form();

        //假设已保存的数据为以下
        $p = 53;
        $c = 5301;
        $a = 530102;
        $t = 530102008;

        //查询
        $selectP = $this->dataModel->where(['id' => $p])->select();
        $selectC = $this->dataModel->where(['id' => $c])->select();
        $selectA = $this->dataModel->where(['id' => $a])->select();
        $selectT = $this->dataModel->where(['id' => $t])->select();

        $form->divider('', '')->value('省/市/区');

        $form->select('province', '省份', 4)
            ->optionsData($selectP, 'ext_name')
            ->dataUrl(url('api/areacity/province'), 'ext_name')
            ->withNext(

                $form->select('city', '城市', 4)
                    ->optionsData($selectC, 'ext_name')
                    ->dataUrl(url('api/areacity/city'), 'ext_name')->withNext(

                    $form->select('area', '区域', 4)
                        ->optionsData($selectA, 'ext_name')
                        ->dataUrl(url('api/areacity/area'), 'ext_name')
                )
            );

        $form->divider('', '')->value('省市区');
        $form->select('province1', '省市区', 4)
            ->size(2, 9)
            ->optionsData($selectP, 'ext_name')
            ->dataUrl(url('api/areacity/province'), 'ext_name')
            ->withNext(

                $form->select('city1', '城市', 4)
                    ->size(0, 11)
                    ->optionsData($selectC, 'ext_name')
                    ->showLabel(false)
                    ->dataUrl(url('api/areacity/city'), 'ext_name')
                    ->withNext(

                        $form->select('area1', '区域', 4)
                            ->size(0, 11)
                            ->optionsData($selectA, 'ext_name')
                            ->showLabel(false)
                            ->dataUrl(url('api/areacity/area'), 'ext_name')
                    )
            );

        $form->divider('', '')->value('省/市/区/镇');
        $form->select('province2', '省份', 3)->optionsData($selectP, 'ext_name')->dataUrl(url('api/areacity/province'), 'ext_name')->withNext(
            $form->select('city2', '城市', 3)->optionsData($selectC, 'ext_name')->dataUrl(url('api/areacity/city'), 'ext_name')->withNext(
                $form->select('area2', '区域', 3)->optionsData($selectA, 'ext_name')->dataUrl(url('api/areacity/area'), 'ext_name')->withNext(
                    $form->select('town2', '乡镇', 3)->optionsData($selectT, 'ext_name')->dataUrl(url('api/areacity/town'), 'ext_name')
                )
            )
        );

        return $builder->render();
    }
}
