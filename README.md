### 省市区县乡镇四级城市数据

>数据源 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov>

>更新数据 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov/tree/master/src/%E9%87%87%E9%9B%86%E5%88%B0%E7%9A%84%E6%95%B0%E6%8D%AE/ok_data_level4.csv>

### DEMO

<http://yourhost/admin/areacity/index>

```php
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

        $form->fields('省/市/区')->size(2, 10);

        $form->select('province', '省份', 4)
            ->optionsData($selectP, 'ext_name')
            ->dataUrl(url('api/areacity/province'), 'ext_name')
            ->size(3, 9)
            ->withNext(
                $form->select('city', '城市', 4)
                    ->optionsData($selectC, 'ext_name')
                    ->dataUrl(url('api/areacity/city'), 'ext_name')
                    ->size(3, 9)
                    ->withNext(
                        $form->select('area', '区域', 4)
                            ->optionsData($selectA, 'ext_name')
                            ->dataUrl(url('api/areacity/area'), 'ext_name')
                            ->size(3, 9)
                    )
            );
        $form->fieldsEnd();

        $form->fields('省/市/区2')->size(2, 10);//每个下拉隐藏label

        $form->select('province1', '', 3)
            ->optionsData($selectP, 'ext_name')
            ->showLabel(false)
            ->dataUrl(url('api/areacity/province'), 'ext_name')
            ->size(0, 12)
            ->withNext(
                $form->select('city1', '', 3)
                    ->optionsData($selectC, 'ext_name')
                    ->showLabel(false)
                    ->dataUrl(url('api/areacity/city'), 'ext_name')
                    ->size(0, 12)
                    ->withNext(
                        $form->select('area1', '', 3)
                            ->optionsData($selectA, 'ext_name')
                            ->showLabel(false)
                            ->dataUrl(url('api/areacity/area'), 'ext_name')
                            ->size(0, 12)
                    )
            );
        $form->fieldsEnd();

        $form->fields('省/市/区/镇')->size(2, 10);
        $form->select('province2', '省份', 3)->optionsData($selectP, 'ext_name')->dataUrl(url('api/areacity/province'), 'ext_name')->size(4, 8)->withNext(
            $form->select('city2', '城市', 3)->optionsData($selectC, 'ext_name')->dataUrl(url('api/areacity/city'), 'ext_name')->size(4, 8)->withNext(
                $form->select('area2', '区域', 3)->optionsData($selectA, 'ext_name')->dataUrl(url('api/areacity/area'), 'ext_name')->size(4, 8)->withNext(
                    $form->select('town2', '乡镇', 3)->optionsData($selectT, 'ext_name')->dataUrl(url('api/areacity/town'), 'ext_name')
                )
            )
        );

        return $builder->render();
    }
```