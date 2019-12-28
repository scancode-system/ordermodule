<?php

namespace Modules\Order\Services;

use Modules\Order\Repositories\SettingOrderRepository;

class ImportService {

    public function setting($data)
    {
        SettingOrderRepository::update($data);
    }

    public function records()
    {

    }

}
