<?php
namespace App\Properties\Discount;

class DiscountProperty {

    /**
     * @param $order
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function detectDiscount($order)
    {
        $ruleTypeNamespaces = config('rule-types')["namespaces"];
        foreach ($ruleTypeNamespaces as $ruleTypeNamespace){
            (new $ruleTypeNamespace())->detectDiscountAndBindRule($order);
        }
    }

    /**
     * @return void
     */
    public function ruleTypeSeeder()
    {
        $ruleTypeNamespaces = config('rule-types')["namespaces"];
        foreach ($ruleTypeNamespaces as $ruleTypeNamespace){
            (new $ruleTypeNamespace())->firstOrCreateForTypeTable()->createRules();
        }
    }
}
