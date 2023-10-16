<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleTypeSetting;

class AaaRule extends RuleTypeSetting {

    /**
     * @var string
     */
    protected $type = "Aaa";
    /**
     * @var string
     */
    protected $description = "Toplam x TL ve üzerinde alışveriş yapan bir müşteri, siparişin tamamından %y indirim kazanır";

    /**
     * @param $order
     * @return mixed
     */
    public function detectDiscountAndBindRule($order)
    {
        $rules = $this->getRules();
        foreach ($rules as $rule){
            //$this->ruleDefinition($order->id, $rule->id);
        }

        return null;
    }
}
