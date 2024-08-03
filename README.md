# tpextbuilder select 多级联动-省市区县乡镇四级城市数据

## 安装

### 方式1 composer 安装

```bash
composer require ichynul/tpextareacity
```

### 方式2 extend 安装

[tpext.core] 自`1.6.4|3.3.2|4.0.7`起，支持`extend`方式在线安装。

- 数据源 <https://github.com/xiangyuecn/AreaCity-JsSpider-StatsGov> | <https://gitee.com/xiangyuecn/AreaCity-JsSpider-StatsGov>

- 本扩展不会经常更新数据，需要的请自行下载[ok_data_level4.csv]文件导入。

- [phpmyadmin] 导入方法：选择 [tp_areacity] 表，点 [操作] 菜单，`将数据表复制到(数据库名.数据表名)`，填个新表名如`tp_areacity1` [执行] 备份。

- [操作] 菜单-清空数据表 (TRUNCATE)，清空表数据。

- [导入] 菜单上传下载的 [ok_data_level4.csv] ，点 [执行] ，导入后删除第一行表头字段。

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
