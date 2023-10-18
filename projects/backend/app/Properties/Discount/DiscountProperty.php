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
     * @param $order
     * @return array
     */
    public function getDiscounts($order)
    {
        $discounts = [];
        $ruleTypeNamespaces = config('rule-types')["namespaces"];
        foreach ($ruleTypeNamespaces as $ruleTypeNamespace){
            $ruleClass = new $ruleTypeNamespace();
            $discountsForRuleType = $ruleClass->getDiscounts($order);
            if ($discountsForRuleType){
                $discounts[] = [
                    $ruleClass->type => $discountsForRuleType
                ];
            }
        }return $discounts;
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
