# tpextbuilder select 多级联动-省市区县乡镇四级城市数据

## 安装

### 方式1 composer 安装

```bash
composer require ichynul/tpextareacity
```

### 方式2 extend 安装

[tpext.core] 自`1.6.4|3.3.2|4.0.7`起，支持`extend`方式在线安装。

- 数据源 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov>

- 更新数据 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov/tree/master/src/%E9%87%87%E9%9B%86%E5%88%B0%E7%9A%84%E6%95%B0%E6%8D%AE/ok_data_level4.csv>

## DEMO

```php
   $form->fields('省/市/区');
   $form->select('province', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/province'), 'ext_name')->withNext(
            $form->select('city', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/city'), 'ext_name')->withNext(
                $form->select('area', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/area'), 'ext_name')
            )
        );
   $form->fieldsEnd();
   
   //或者
   $form->fields('省/市/区')->with(
       $form->select('province', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/province'), 'ext_name')->withNext(
            $form->select('city', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/city'), 'ext_name')->withNext(
                $form->select('area', ' ', 4)->size(0, 12)->showLabel(false)->dataUrl(url('api/areacity/area'), 'ext_name')
            )
        );
   );
```
