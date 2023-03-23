<?php

namespace tpext\areacity\common;

use tpext\common\Module as baseModule;

class Module extends baseModule
{
    protected $version = '1.0.3';

    protected $name = 'tpext.areacity';

    protected $title = '中国省市区县乡镇';

    protected $description = '省市区县乡镇四级城市数据，带拼音首字母。数据较多，安装时间稍长。';

    protected $root = __DIR__ . '/../';

    protected $modules = [
        'api' => ['areacity'],
    ];
}
