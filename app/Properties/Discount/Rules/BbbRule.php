<?php
namespace App\Properties\Discount\Rules;

use App\Enumerations\ProductEnumeration;
use App\Properties\Discount\RuleInterface;
use App\Properties\Discount\RuleTypeSetting;

class BbbRule extends RuleTypeSetting implements RuleInterface {

    /**
     * @var string
     */
    protected $type = "Bbb";
    /**
     * @var string
     */
    protected $description = "x ID'li kategoriye ait bir üründen y adet satın alındığında, z tanesi ücretsiz olarak verilir.";

    /**
     * @var string[]
     */
    protected $valuesForRuleTable = [
        "[2,6,1]"
    ];

    /**
     * @param $order
     * @param $rule
     * @return void
     */
    public function checkForRule($order, $rule): void
    {
        if (isset($rule->json_rule_values[0], $rule->json_rule_values[1])){
            foreach ($order->items as $item){
                /* x id li kategori */
                if (optional($item->product)->category === $rule->json_rule_values[0]){
                    /* y adet satın almak */
                    if($item->quantity === $rule->json_rule_values[1]){
                        $this->ruleDefinition($order->id, $rule->id);
                    }
                }
            }
        }
    }
}
