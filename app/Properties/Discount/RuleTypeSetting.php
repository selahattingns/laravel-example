<?php
namespace App\Properties\Discount;

use App\Models\OrderDiscount;
use App\Models\Rule;
use App\Models\RuleType;

class RuleTypeSetting {
    /**
     * @var string
     */
    public $type = "";
    /**
     * @var string
     */
    protected $description = "";

    /**
     * @var array
     */
    protected $valuesForRuleTable = [];

    /**
     * @return $this
     */
    public function firstOrCreateForTypeTable()
    {
        RuleType::firstOrCreate([
            "type" => $this->type
        ],[
            "description" => $this->description,
        ]);
        return $this;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        $ruleType = $this->getRuleType();
        return $ruleType ? Rule::where('rule_type_id',$ruleType->id)->get() : [];
    }

    /**
     * @return mixed
     */
    public function getRuleType()
    {
        return RuleType::where('type', $this->type)->first();
    }

    /**
     * @param $orderId
     * @param $ruleId
     * @return void
     */
    public function ruleDefinition($orderId, $ruleId)
    {
        OrderDiscount::firstOrCreate([
            "order_id" => $orderId,
            "rule_id" => $ruleId
        ]);
    }

    /**
     * @return void
     */
    public function createRules()
    {
        $ruleType = $this->getRuleType();
        if ($ruleType){
            foreach ($this->valuesForRuleTable as $value){
                Rule::firstOrCreate([
                    "rule_type_id" => $ruleType->id,
                    "rule_values" => $value
                ]);
            }
        }
    }

    /**
     * @param $order
     * @return void
     */
    public function detectDiscountAndBindRule($order)
    {
        $rules = $this->getRules();
        foreach ($rules as $rule){
            $this->checkForRule($order, $rule);
        }
    }

    /**
     * @param $order
     * @return array|null
     */
    public function getDiscounts($order)
    {
        foreach ($this->getRules() as $rule){
            $discounts = $order->discounts()->where('rule_id', $rule->id)->get();
            foreach ($discounts as $discount){
                $data[] = [
                    "message" => $this->setMessage($order, $rule, $discount),
                    "rule_id" => $rule->id
                ];
            }
        }return $data ?? null;
    }
}
