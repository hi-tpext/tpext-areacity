### 省市区县乡镇四级城市数据

>数据源 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov>

>更新数据 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov/tree/master/src/%E9%87%87%E9%9B%86%E5%88%B0%E7%9A%84%E6%95%B0%E6%8D%AE/ok_data_level4.csv>

### DEMO

<http://yourhost/admin/areacity/index>

```php
   $form->fields('省/市/区');
        $form->select('province', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/province'), 'ext_name')->withNext(
            $form->select('city', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/city'), 'ext_name')->withNext(
                $form->select('area', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/area'), 'ext_name')
            )
        );
        $form->fieldsEnd();
```