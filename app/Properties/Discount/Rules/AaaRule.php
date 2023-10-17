<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class AaaRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    protected $type = "Aaa";
    /**
     * @var string
     */
    protected $description = "Toplam x TL ve üzerinde alışveriş yapan bir müşteri, siparişin tamamından %y indirim kazanır";

    /**
     * @var string[]
     */
    protected $valuesForRuleTable = [
        "[1000,10]",
    ];

    /**
     * @param $order
     * @param $rule
     * @return void
     */
    public function checkForRule($order, $rule): void
    {
        /* x adet ve üzeri alışveriş */
        if (isset($rule->json_rule_values[0]) && $order->price >= $rule->json_rule_values[0]){
            $this->ruleDefinition($order->id, $rule->id);
        }
    }
}
