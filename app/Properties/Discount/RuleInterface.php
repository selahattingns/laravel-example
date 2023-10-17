<?php
namespace App\Properties\Discount;

interface RuleInterface {

    /**
     * $this->ruleDefinition($order->id, $rule->id)
     *
     * @param $order
     * @param $rule
     * @return void
     */
    public function checkForRule($order, $rule);
}
