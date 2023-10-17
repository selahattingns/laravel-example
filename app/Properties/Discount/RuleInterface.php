<?php
namespace App\Properties\Discount;

interface RuleInterface {

    /**
     * $this->ruleDefinition($order->id, $rule->id)
     *
     * @param $order
     * @return mixed
     */
    public function detectDiscountAndBindRule($order);
}
