<?php
namespace App\Properties\Discount\Rules;

use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class AaaRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    public $type = "Aaa";
    /**
     * @var string
     */
    protected $description = "Toplam x TL ve üzerinde alışveriş yapan bir müşteri, siparişin tamamından %y indirim kazanır";

    /**
     * @var string[]
     */
    protected $valuesForRuleTable = [
        "[500,5]",
        "[1000,20]",
    ];

    /**
     * @param $order
     * @param $rule
     * @return void
     */
    public function checkForRule($order, $rule): void
    {
        /* x adet ve üzeri alışveriş */
        if (isset($rule->json_rule_values[0]) && $order->total >= $rule->json_rule_values[0]){
            $this->ruleDefinition($order->id, $rule->id);
        }
    }

    /**
     * @param $order
     * @param $rule
     * @param $discount
     * @return string
     */
    public function setMessage($order, $rule, $discount): string
    {
        return $order->id . " id'li sipariş'de toplam " . ($rule->json_rule_values[0] ?? "") . "TL ve üzeri alışveriş için %" . ($rule->json_rule_values[1] ?? "") . " indirim";
    }
}
