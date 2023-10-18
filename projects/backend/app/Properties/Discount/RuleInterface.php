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

    /**
     * @param $order
     * @param $rule
     * @param $discount
     * @return string
     */
    public function setMessage($order, $rule, $discount): string;
}
